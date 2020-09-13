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
                                    <form class="custom-validation need-validation" novalidate="">
                                        <div class="row mb-3">
                                            <div class="cell-md-6">
                                                <label>ICAO</label>
                                                <label class="select input-normal" id="select-1599960366994508" for="select-focus-trigger-1599960366994484"><span class="dropdown-toggle"></span>
                                                <select data-role="select" data-role-select="true">
                                                    <option>Value 1</option>
                                                    <option>Value 2</option>
                                                    <option>Value 3</option>
                                                    <option>Value 4</option>
                                                    <option>Value 5</option>
                                                </select>
                                                <div class="button-group d-none"></div>
                                                <input type="checkbox" class="select-focus-trigger" id="select-focus-trigger-1599960366994484">
                                                <div class="select-input" name="__select-1599960366994508__">Value 1</div><div class="drop-container" data-role-dropdown="true" data-role="dropdown" style="display: none;"><div><div class="input"><input type="text" data-role="input" placeholder="" data-role-input="true" class=""><div class="button-group"><button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button></div></div></div><ul class="option-list" style="max-height: 200px;"><li data-text="Value 1" data-value="Value 1" class="active"><a>Value 1</a></li><li data-text="Value 2" data-value="Value 2"><a>Value 2</a></li><li data-text="Value 3" data-value="Value 3"><a>Value 3</a></li><li data-text="Value 4" data-value="Value 4"><a>Value 4</a></li><li data-text="Value 5" data-value="Value 5"><a>Value 5</a></li></ul></div></label>


                                            </div>
                                            <div class="cell-md-6">
                                                <label>Last name</label>
                                                <input type="text" required="" value="Gates" title="">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="cell-md-6">
                                                <label>City</label>
                                                <input type="text" required="" placeholder="City" title="">
                                                <div class="invalid_feedback">Please provide a valid city.</div>
                                            </div>
                                            <div class="cell-md-3">
                                                <label>State</label>
                                                <input type="text" required="" placeholder="State" title="">
                                                <div class="invalid_feedback">Please provide a valid state.</div>
                                            </div>
                                            <div class="cell-md-3">
                                                <label>Zip</label>
                                                <input type="text" required="" placeholder="Zip" title="">
                                                <div class="invalid_feedback">Please provide a valid zip.</div>
                                            </div>
                                        </div>
                                        <button class="button primary">Submit form</button>
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
