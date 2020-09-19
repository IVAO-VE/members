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

<script type="text/javascript">
<!--
    window.onload = function() {
        <?php
            if(isset($showNOTIFY)){
                foreach ($showNOTIFY as $xNOTIFY) {
                    $this->myfunctions->showNOTIFY($xNOTIFY['message'], $xNOTIFY['title'], $xNOTIFY['type']);
                }        
            }
        ?>
    };
-->
</script>

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

                                <div data-role="panel" data-title-caption="Cartas aéreas existentes" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
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
                                                <th >ICAO</th>
                                                <th data-cls-column="fg-green" >REGLA</th>
                                                <th >FECHA</th>
                                                <th >OPCIÓN</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                //Consultando datos de cartas en el directorio
                                                $dir = opendir(FCPATH.'uploads/charts/'); //creamos el objeto directorio
                                                while($elemento = readdir($dir)){ //recorremos todos los elementos del objeto
                                                    if(($elemento != ".") && ($elemento != "..")){ //no es control de directorios
/*                                                        if(!is_dir(FCPATH.'uploads/charts/'.$elemento)){ //es un archivo
                                                            $MyFILE_INFO = pathinfo(FCPATH.'uploads/charts/'.$elemento);
                                                            $MyFILE_PART = explode("_", $MyFILE_INFO['filename']);
                                                            $MyREGLA = array_key_last($MyFILE_PART);
                                                            switch (strtoupper($MyREGLA)){ 
                                                                case "I": //es una carta por instrumentos
                                                                    $xREGLA = "Instrumental";
                                                                break;
                                                                case "V": //es una carta visual
                                                                    $xREGLA = "Visual";
                                                                break;
                                                            }    
                                                            echo '
                                                                <tr>
                                                                    <td>'.array_key_first($MyFILE_PART).'</td>
                                                                    <td>'.$xREGLA.'</td>
                                                                    <td>'.date('F d Y H:i:s.', filectime(FCPATH.'uploads/charts/'.$elemento)).'</td>
                                                                    <td>xx</td>
                                                                </tr>
                                                            ';
                                                        }*/
                                                    }
                                                }                                                
                                            ?>  

                                            </tbody>

                                        </table>
                                    </div>
                                </div>


                            
                            </div>

                            <div class="cell-md-6">
                                <div class="bg-white p-4 m-2">
                                    <h4>Agregar ó actualizar cartas aéreas</h4>

                                    <form data-role="validator" action="/staff/FO_addCharts" method="POST" enctype="multipart/form-data">

                                        <div class="mt-2 mb-2">
                                            <label>Selecciona el aeropuerto.</label>
                                            <select id="icao" name="icao" data-role="select" data-validate="required not=-1">
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

                                        <div class="mt-2 mb-2">
                                            <label>Selecciona la regla de navegación.</label>
                                            <select id="regla" name="regla" data-role="select" data-validate="required not=-1">
                                                <option value="-1" class="d-none"></option>
                                                <option value="I">I - Navegación por instrumentos</option>
                                                <option value="V">V - Navegación visual</option>
                                            </select>
                                            <span class="invalid_feedback">Debes de seleccionar una regla!</span>
                                        </div>


                                        <div class="row mb-2">
                                            <label>Documento a subir (solo PDF).</label>
                                            <input 
                                                id="filePDF" 
                                                name="filePDF" 
                                                type="file" 
                                                accept=".pdf"
                                                data-role="file" 
                                                data-mode="drop" 
                                                data-button-title="Elija o arrastre el documento" 
                                                data-validate="required not=-1" 
                                            >
                                            <span class="invalid_feedback">Debes de cargar una carta de vuelo!</span>
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
