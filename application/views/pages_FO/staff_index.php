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

                                    <form data-role="validator" action="javascript:">

                                        <div class="mt-2 mb-2">
                                            <label>Selecciona el aeropuerto</label>
                                            <select data-role="select" data-validate="required not=-1">
                                                <option value="-1" class="d-none"></option>
                                                <?php
                                                    $query = $this->db->query("SELECT * FROM nav_airports WHERE icao LIKE 'SV%'");
                                                    foreach ($query->result() as $row) {
                                                        echo '<option value="'.$row->icao.'">'.$row->icao.' - '.$row->name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <span class="invalid_feedback">Debes de seleccionar un aeropuerto!</span>
                                        </div>

                                        <div class="row mb-2">

                                        </div>

                                        <button class="button primary">Agregar documento</button>
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
