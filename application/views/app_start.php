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

    $query_member = $this->db->query("SELECT * FROM members_data WHERE vid=".$this->session->userdata('vid'));
    $row_member = $query_member->row();
    $this->phpdebug->debug('[DEBUG] -> '.$row_member->mail);

?>

<script type="text/javascript">
<!--

window.onload = function() {
    var member_emal = '<?php echo $row_member->mail; ?>';
    if(member_emal == ''){
        Metro.dialog.create({
            title: "Email para <?php echo $row_member->name; ?>",
            content: "<label>Ingresa tu correo oficial</label><form id='mail_form' action='javascript:' data-role='validator'><input type='text' data-validate='email'><span class='invalid_feedback'>Debes de introducir un correo válido</span></form>",
            closeButton: false,
            actions: [
                {
                    caption: "Confirmar",
                    cls: "js-dialog-close alert",
                    onclick: function(){
                        $("mail_form").submit();
                    }
                }
            ]
        });        
    }
};

-->
</script>


<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title  text-center text-left-md w-100"><?php echo $this->lang->line('mainpage'); ?></br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="#" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('dpto00'); ?></a></li>
        </ul>
    </div>
</div>

<div class="m-3">
<div class="row mt-2">
    <div class="cell-lg-3 cell-sm-6 mt-2">
        <div class="icon-box border bd-cyan">
            <div class="icon bg-cyan fg-white"><span class="mif-local-airport"></span></div>
            <div class="content p-4">
                <div class="text-upper"><?php echo $this->lang->line('main_tflight'); ?></div>
                <div class="text-upper text-bold text-lead"><?php echo $this->myfunctions->segundos_a_horas($this->session->userdata('hours_pilot')); ?></div>
            </div>
        </div>
    </div>
    <div class="cell-lg-3 cell-sm-6 mt-2">
        <div class="icon-box border bd-red">
            <div class="icon bg-red fg-white"><span class="mif-headphones"></span></div>
            <div class="content p-4">
                <div class="text-upper"><?php echo $this->lang->line('main_tcontrol'); ?></div>
                <div class="text-upper text-bold text-lead"><?php echo $this->myfunctions->segundos_a_horas($this->session->userdata('hours_atc')); ?></div>
            </div>
        </div>
    </div>
    <div class="cell-lg-3 cell-sm-6 mt-2">
        <div class="icon-box border bd-green">
            <div class="icon bg-green fg-white"><span class="mif-location"></span></div>
            <div class="content p-4">
                <div class="text-upper"><?php echo $this->lang->line('main_division'); ?></div>
                <div class="text-upper text-bold text-lead"><?php echo $this->session->userdata('division_name'); ?></div>
            </div>
        </div>
    </div>
    <div class="cell-lg-3 cell-sm-6 mt-2">
        <div class="icon-box border bd-orange">
            <div class="icon bg-orange fg-white"><span class="mif-flag"></span></div>
            <div class="content p-4">
                <div class="text-upper"><?php echo $this->lang->line('main_country'); ?></div>
                <div class="text-upper text-bold text-lead"><?php echo $this->session->userdata('country_name'); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="cell-lg-3 cell-md-6 mt-2">
        <div class="more-info-box bg-cyan fg-white">
            <div class="content">
                <?php
                    $query = $this->db->query("SELECT * FROM whazzup_log WHERE client_type='PILOT' AND vid=".$this->session->userdata('vid'));
                    echo '<h2 class="text-bold mb-0">'.$query->num_rows().' '.$this->lang->line('flights').'</h2>';
                ?>            
                <div><?php echo $this->lang->line('main_activityFL'); ?></div>
            </div>
            <div class="icon">
                <span class="mif-local-airport"></span>
            </div>
            <a href="#" class="more"> <?php echo $this->lang->line('main_reportFL'); ?> <span class="mif-arrow-right"></span></a>
        </div>
    </div>
    <div class="cell-lg-3 cell-md-6 mt-2">
        <div class="more-info-box bg-green fg-white">
            <div class="content">
                <?php
                    $query = $this->db->query("SELECT * FROM whazzup_log WHERE client_type='ATC' AND vid=".$this->session->userdata('vid'));
                    echo '<h2 class="text-bold mb-0">'.$query->num_rows().' '.$this->lang->line('radars').'</h2>';
                ?>            
                <div><?php echo $this->lang->line('main_activityCT'); ?></div>
            </div>
            <div class="icon">
                <span class="mif-headphones"></span>
            </div>
            <a href="#" class="more"> <?php echo $this->lang->line('main_reportCT'); ?> <span class="mif-arrow-right"></span></a>
        </div>
    </div>
    <div class="cell-lg-3 cell-md-6 mt-2">
        <div class="more-info-box bg-orange fg-white">
            <div class="content">
                <h2 class="text-bold mb-0"><?php echo $this->lang->line('main_lastaccess'); ?></h2>
                <?php
                    //Consultando datos del miembro en la DB
                    $query = $this->db->query('SELECT * FROM members_data WHERE vid='.$this->session->userdata('vid'));
                    $row = $query->row();
                    if(isset($row)){ //El miembro está en la lista de la división
                        if((isset($row->ip_access)) && (isset($row->time_access))){
                            /** MOSTRAMOS FECHA Y HORA + IP DE CONEXION **/
                            echo ' <div>'.$this->lang->line("main_DATE").' '.date("d/m/Y H:m:s", $row->time_access).'</br>'.$this->lang->line("main_IP").' '.$row->ip_access.'</div>';
                        }else{
                            /** MOSTRAMOS SOLO VERSION **/
                            echo '<div>'.$this->lang->line("main_NODATA").'</div>';
                        }
                    }

                ?>  
            </div>
            <div class="icon">
                <span class="mif-security"></span>
            </div>
            <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
        </div>
    </div>
    <div class="cell-lg-3 cell-md-6 mt-2">
        <div class="more-info-box bg-red fg-white">
            <div class="content">
                <?php
                    $query = $this->db->query("SELECT * FROM whazzup_log");
                    echo '<h2 class="text-bold mb-0">'.$query->num_rows().'</h2>';
                ?>            
                <div><?php echo $this->lang->line('main_activityG'); ?></div>
            </div>
            <div class="icon">
                <span class="mif-user-check"></span>
            </div>
            <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
        </div>
    </div>
</div>

<div data-role="panel" data-title-caption="<?php echo $this->lang->line('main_yourflights'); ?>" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-4">
    <div class="row">
        <div class="cell-md-8 p-10">
            <h5 class="text-center">Sales: 1 Jan, 2014 - 30 Jul, 2014</h5>
            <canvas id="dashboardChart1"></canvas>
        </div>
        <div class="cell-md-4 p-10">
            <h5 class="text-center">Goal Completion</h5>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Add Products to Cart</div>
                    <div class="place-right"><strong>160</strong>/200</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-cyan"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Complete Purchase</div>
                    <div class="place-right"><strong>310</strong>/400</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-red"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Visit Premium Page</div>
                    <div class="place-right"><strong>480</strong>/800</div>
                </div>
                <div data-role="progress" data-value="35"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Send Inquiries</div>
                    <div class="place-right"><strong>250</strong>/500</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-orange"></div>
            </div>
            <div class="mt-6">
                <p class="text-small">Cum brodium resistere, omnes spatiies perdere varius, magnum lanistaes.</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-green"><span class="mif-arrow-drop-up"></span>17%</div>
            <div class="text-bold">$35,210.43</div>
            <div class="text-upper">TOTAL REVENUE</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-orange"><span class="">=</span>0</div>
            <div class="text-bold">$10,390.90</div>
            <div class="text-upper">TOTAL COST</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-green"><span class="mif-arrow-drop-up"></span>20%</div>
            <div class="text-bold">$24,813.53</div>
            <div class="text-upper">TOTAL PROFIT</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-red"><span class="mif-arrow-drop-down"></span>18%</div>
            <div class="text-bold">1,200</div>
            <div class="text-upper">GOAL COMPLETIONS</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="cell-md-6">
        <div data-role="panel" data-title-caption="<?php echo $this->lang->line('main_yourflights'); ?>" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
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
                        <th ><?php echo $this->lang->line('TBL001_colum1'); ?></th>
                        <th ><?php echo $this->lang->line('TBL001_colum2'); ?></th>
                        <th data-cls-column="fg-green" ><?php echo $this->lang->line('TBL001_colum3'); ?></th>
                        <th data-cls-column="fg-green" ><?php echo $this->lang->line('TBL001_colum4'); ?></th>
                        <th ><?php echo $this->lang->line('TBL001_colum5'); ?></th>
                        <th ><?php echo $this->lang->line('TBL001_colum6'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Consultando datos de vuelos realizados
                        $xVUELOS = 0;
                        $query = $this->db->query('SELECT * FROM whazzup_log WHERE client_type="PILOT" AND vid='.$this->session->userdata('vid').' ORDER BY connection_time DESC LIMIT 15');
                        foreach ($query->result() as $row) {
                            $xVUELOS++;
                            
                            $strAIRCRAFT = explode("/", $row->fl_aircraft);
                            if(isset($strAIRCRAFT[1])){
                                $query_model = $this->db->query('SELECT * FROM nav_aircraft WHERE icao="'.$strAIRCRAFT[1].'"');
                                $row_model = $query_model->row();
                                if(isset($row_model)){ //Tenemos el modelo de aeronave
                                    $xMODEL = $row_model->model;
                                }else{ //No tenemos el modelo y mostramos el ICAO
                                    $xMODEL = $strAIRCRAFT[1];
                                }
                            }else{
                                $xMODEL = "N/A";
                            }

                            if($row->fl_rules == "I"){
                                $xRULES = "IFR";
                            }else{
                                $xRULES = "VFR";
                            }
                            
                            echo '
                                <tr>
                                    <td>'.$row->callsign.'</td>
                                    <td>'.date("d-m-Y H:i:s", $row->connection_time).'</td>
                                    <td>'.$row->fl_departure.'</td>
                                    <td>'.$row->fl_destination.'</td>
                                    <td>'.$xRULES.'</td>
                                    <td>'.$xMODEL.'</td>
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


</div>
</div>


<?php
	$this->load->view("_lib/lib.footer.php");
?>
