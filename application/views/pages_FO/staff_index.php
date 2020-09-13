<?php
/**
 * @autor Rixio Iguarán y Simón Cardona.
 * @Departamento Sistemas y Webmaster
 * @Licencia Exclusivo sistemas IVAO.AERO
 * @Licencia División Venezuela.
 * @Correo ve-web@ivao.aero
 * 
 **/

    //Asegurando el acceso directo al script
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');
    //echo BASEPATH; 
    //Cargando la estructura del HEADER
    $this->load->view("_lib/lib.header.php");
    //Cargando la estructura del MENU
    $this->load->view("_lib/lib.menu.php");
?>
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo ucfirst(strtolower($this->lang->line('staff_dpto02_index'))); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('staffarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('airlines_title'); ?></a></li>
        </ul>
    </div>
</div>


<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>   
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto02_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#airlines"><?php echo $this->lang->line('airlines_title'); ?></a></li>
                <li><a href="#charts"><?php echo $this->lang->line('charts_title'); ?></a></li>
                <li><a href="#meteorologic"><?php echo $this->lang->line('meteorologic_title'); ?></a></li>
                <li><a href="#information"><?php echo $this->lang->line('information_title'); ?></a></li>
                <li><a href="#sceneries"><?php echo $this->lang->line('sceneries_title'); ?></a></li>
                <li><a href="#notams"><?php echo $this->lang->line('notams_title'); ?></a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="airlines">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="charts">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                        <div class="row">
                            <div class="cell-md-6">

                                <div data-role="panel" data-title-caption="<?php echo $this->lang->line('main_yourcontrols'); ?>" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
                                    <div class="p-4">
                                        <table class="table striped table-border mt-4"
                                            data-role="table"
                                            data-cls-table-top="row"
                                            data-cls-search="cell-md-6"
                                            data-cls-rows-count="cell-md-6"
                                            data-rows="5"
                                            data-rows-steps="5, 10"
                                            data-show-activity="false"
                                            data-horizontal-scroll="true"
                                        >

                                            <thead>
                                            <tr>
                                                <th ><?php echo $this->lang->line('TBL002_colum1'); ?></th>
                                                <th ><?php echo $this->lang->line('TBL002_colum2'); ?></th>
                                                <th data-cls-column="fg-green" ><?php echo $this->lang->line('TBL002_colum3'); ?></th>
                                                <th ><?php echo $this->lang->line('TBL002_colum4'); ?></th>
                                                <th ><?php echo $this->lang->line('TBL002_colum5'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                //Consultando datos de vuelos realizados
                                                $xVUELOS = 0;
                                                $query = $this->db->query('SELECT * FROM whazzup_log WHERE client_type="ATC" AND vid='.$this->session->userdata('vid').' ORDER BY connection_time DESC LIMIT 15');
                                                foreach ($query->result() as $row) {
                                                    switch ($row->facility_type){ 
                                                        case "0":
                                                            $xTYPE = $this->lang->line('facility_0');
                                                        break;
                                                        case "1":
                                                            $xTYPE = $this->lang->line('facility_1');
                                                        break;
                                                        case "2":
                                                            $xTYPE = $this->lang->line('facility_2');
                                                        break;
                                                        case "3":
                                                            $xTYPE = $this->lang->line('facility_3');
                                                        break;
                                                        case "4":
                                                            $xTYPE = $this->lang->line('facility_4');
                                                        break;
                                                        case "5":
                                                            $xTYPE = $this->lang->line('facility_5');
                                                        break;
                                                        case "6":
                                                            $xTYPE = $this->lang->line('facility_6');
                                                        break;
                                                        case "7":
                                                            $xTYPE = $this->lang->line('facility_7');
                                                        break;
                                                        default :
                                                            $xTYPE = "";

                                                    }    
                                                                                
                                                    echo '
                                                        <tr>
                                                            <td>'.$row->callsign.'</td>
                                                            <td>'.date("d-m-Y H:i:s", $row->connection_time).'</td>
                                                            <td>'.$row->frequency.'</td>
                                                            <td>'.$xTYPE.'</td>
                                                            <td>'.$row->server.'</td>
                                                        </tr>
                                                    ';
                                                }
                                            ?>  

                                            </tbody>

                                        </table>
                                    </div>
                                </div>


                            
                            </div>

                            <div class="cell-md-6">
                                <div class="bg-white p-4 m-2">
                                    <h4>Agregar nueva carta</h4>

                                    <form data-role="Validator" action="javascript:" data-role-validator="true" novalidate="novalidate">
                                        <div class="row mb-2">
                                            <div class="cell-md-6">
                                                <label>First name</label>
                                                <input type="text" data-validate="required minlength=6" placeholder="Enter first name" class="required invalid">
                                                <span class="invalid_feedback">
                                            Input correct name with min length 6 symbols
                                        </span>
                                            </div>
                                            <div class="cell-md-6">
                                                <label>Email</label>
                                                <div class="input required invalid"><input type="email" data-validate="required email" placeholder="Enter email" data-role="input" class="" data-role-input="true"><div class="button-group"><button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button></div></div>
                                                <span class="invalid_feedback">
                                            Input correct email address
                                        </span>
                                            </div>
                                        </div>

                                        <div class="mt-2 mb-2">
                                            <label>Select option</label>
                                            <label class="select required input-normal invalid" id="select-1599964182288248" for="select-focus-trigger-1599964182288978"><span class="dropdown-toggle"></span><select data-role="select" data-validate="required not=-1" class="required" data-role-select="true">
                                                <option value="-1" class="d-none"></option>
                                                <option value="1">Value 1</option>
                                                <option value="2">Value 2</option>
                                                <option value="3">Value 3</option>
                                            </select><div class="button-group d-none"></div><input type="checkbox" class="select-focus-trigger" id="select-focus-trigger-1599964182288978"><div class="select-input" name="__select-1599964182288248__"></div><div class="drop-container" data-role-dropdown="true" data-role="dropdown" style="display: none;"><div><div class="input"><input type="text" data-role="input" placeholder="" data-role-input="true" class=""><div class="button-group"><button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button></div></div></div><ul class="option-list" style="max-height: 200px;"><li data-text="" data-value="-1" class="d-none active"><a></a></li><li data-text="Value 1" data-value="1"><a>Value 1</a></li><li data-text="Value 2" data-value="2"><a>Value 2</a></li><li data-text="Value 3" data-value="3"><a>Value 3</a></li></ul></div></label>
                                            <span class="invalid_feedback">
                                        You must select a option!
                                    </span>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="cell-md-6">
                                                <label class="checkbox required transition-on invalid" for="checkbox-1599964182314487"><input type="checkbox" data-role="checkbox" data-caption="I accept the terms" data-validate="required" class="" data-role-checkbox="true" id="checkbox-1599964182314487"><span class="check"></span><span class="caption">I accept the terms</span></label>
                                                <span class="invalid_feedback">
                                            You must accept this!
                                        </span>
                                            </div>
                                            <div class="cell-md-6">
                                                <label class="radio required transition-on invalid"><input type="radio" name="__r1" data-role="radio" value="1" data-validate="required" data-caption="Type 1" class="" data-role-radio="true"><span class="check"></span><span class="caption">Type 1</span></label>
                                                <label class="radio required transition-on invalid"><input type="radio" name="__r1" data-role="radio" value="2" data-validate="required" data-caption="Type 2" class="" data-role-radio="true"><span class="check"></span><span class="caption">Type 2</span></label>
                                                <label class="radio required transition-on invalid"><input type="radio" name="__r1" data-role="radio" value="3" data-validate="required" data-caption="Type 3" class="" data-role-radio="true"><span class="check"></span><span class="caption">Type 3</span></label>
                                                <span class="invalid_feedback">You must select a option!
                                        </span>
                                            </div>
                                        </div>

                                        <button class="button primary">Submit</button>
                                    </form>

                                </div>
                            </div>


                        </div>

                    </div>
                    <br>
                </div>
                <div id="meteorologic">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="information">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="sceneries">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="notams">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>


            </div>



        </div>
    </div>
</div>

<?php
	$this->load->view("_lib/lib.footer.php");
?>
