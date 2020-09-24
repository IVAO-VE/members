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
                    $this->myfunctions->showNOTIFY(true, $xNOTIFY['title'], $xNOTIFY['message'], $xNOTIFY['type']);
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
                    <div data-role="panel" data-title-caption="Cartas de navegación aéreas." data-title-icon="<span class='mif-info'>" data-collapsible="true">

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
                                                try {
                                                    $dir = opendir(FCPATH.'uploads/charts/'); //creamos el objeto directorio
                                                    while($elemento = readdir($dir)){ //recorremos todos los elementos del objeto
                                                        if(($elemento != ".") && ($elemento != "..")){ //no es control de directorios
                                                            if(!is_dir(FCPATH.'uploads/charts/'.$elemento)){ //es un archivo
                                                                $MyFILE_INFO = pathinfo(FCPATH.'uploads/charts/'.$elemento);
                                                                $MyFILE_PART = explode("_", $MyFILE_INFO['filename']);
                                                                $MyREGLA = end($MyFILE_PART);
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
                                                                        <td>'.$MyFILE_PART[0].'</td>
                                                                        <td>'.$xREGLA.'</td>
                                                                        <td>'.date('d/m/Y H:i:s', filectime(FCPATH.'uploads/charts/'.$elemento)).'</td>
                                                                        <td>xx</td>
                                                                    </tr>
                                                                ';
                                                            }
                                                        }
                                                    }
                                                } catch (Exception $e) {
                                                    //Problema detetado
                                                    $this->phpdebug->debug('[DEBUG] -> Excepción: '.$e->getMessage());
                                                    $this->myfunctions->showDIALOG(false, "Control de errores", $e->getMessage(), 5);
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
                    <div data-role="panel" data-title-caption="Administración de escenarios virtuales." data-title-icon="<span class='mif-info'>" data-collapsible="true">

                        <div class="row">
                                <div class="cell-md-6">

                                    <div data-role="panel" data-title-caption="Escenarios existentes" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
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
                                                    <th data-cls-column="fg-green" >SIM</th>
                                                    <th >FECHA</th>
                                                    <th >OPCIÓN</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    //Consultando datos de escenarios en el directorio
                                                    try {
                                                        $xARRAY_FILES = array();
                                                        $dir = opendir(FCPATH.'uploads/sceneries/'); //creamos el objeto directorio
                                                        while($elemento = readdir($dir)){ //recorremos todos los elementos del objeto
                                                            if(($elemento != ".") && ($elemento != "..")){ //no es control de directorios
                                                                if(!is_dir(FCPATH.'uploads/sceneries/'.$elemento)){ //es un archivo
                                                                    $MyFILE_INFO = pathinfo(FCPATH.'uploads/sceneries/'.$elemento);
                                                                    $MyFILE_PART = explode("_", $MyFILE_INFO['filename']);
                                                                    $MySIM = end($MyFILE_PART);
                                                                    switch (strtoupper($MySIM)){ 
                                                                        case "FS2004": //es una carta por instrumentos
                                                                            $xSIM = "FS2004";
                                                                        break;
                                                                        case "FSX": //es una carta visual
                                                                            $xSIM = "FSX";
                                                                        break;
                                                                        case "P3D": //es una carta visual
                                                                            $xSIM = "Prepar3D";
                                                                        break;
                                                                        case "XPLANE": //es una carta visual
                                                                            $xSIM = "X-Plane";
                                                                        break;
                                                                        case "FS2020": //es una carta visual
                                                                            $xSIM = "FS2020";
                                                                        break;

                                                                    }
                                                                    echo '
                                                                        <tr>
                                                                            <td>'.$MyFILE_PART[0].'</td>
                                                                            <td>'.$xSIM.'</td>
                                                                            <td>'.date('d/m/Y H:i:s', filectime(FCPATH.'uploads/sceneries/'.$elemento)).'</td>
                                                                            <td>xx</td>
                                                                        </tr>
                                                                    ';

                                                                }
                                                            }
                                                        }
                                                    } catch (Exception $e) {
                                                        //Problema detetado
                                                        $this->phpdebug->debug('[DEBUG] -> Excepción: '.$e->getMessage());
                                                        $this->myfunctions->showDIALOG(false, "Control de errores", $e->getMessage(), 5);
                                                    }                                                    
                                                ?>  

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>


                                
                                </div>

                                <div class="cell-md-6">
                                    <div class="bg-white p-4 m-2">
                                        <h4>Agregar ó actualizar escenarios</h4>

                                        <form data-role="validator" action="/staff/FO_addSceneries" method="POST" enctype="multipart/form-data">

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
                                                <label>Selecciona el sistema de simulación.</label>
                                                <select id="sim" name="sim" data-role="select" data-validate="required not=-1">
                                                    <option value="-1" class="d-none"></option>
                                                    <option value="FS2004">Microsoft Flight Simulator 2004</option>
                                                    <option value="FSX">Microsoft Flight Simulator X</option>
                                                    <option value="P3D">Lockheed Martin Prepar3D</option>
                                                    <option value="XPLANE">X-Plane Flight Simulator</option>
                                                    <option value="FS2020">Microsoft Flight Simulator 2020</option>
                                                </select>
                                                <span class="invalid_feedback">Debes de seleccionar un simulador!</span>
                                            </div>


                                            <div class="row mb-2">
                                                <label>Archivo de escenario a subir (solo ZIP).</label>
                                                <input 
                                                    id="fileZIP" 
                                                    name="fileZIP" 
                                                    type="file" 
                                                    accept=".zip"
                                                    data-role="file" 
                                                    data-mode="drop" 
                                                    data-button-title="Elija o arrastre el archivo" 
                                                    data-validate="required not=-1" 
                                                >
                                                <span class="invalid_feedback">Debes de cargar un escenario!</span>
                                            </div>

                                            <button class="button primary">Agregar archivo</button>
                                        </form>


                                    </div>
                                </div>


                            </div>


                        </div>

                </div>
                <div id="notams">
                    <br>
                    <div data-role="panel" data-title-caption="Envío de NOTAMs a todos los usuarios" data-title-icon="<span class='mif-info'>" data-collapsible="true">


                        <div class="p-1 p-6-lg bg-white">
                            <h4>Envíar nuevo correo NOTAM</h4>
                            <form class="mt-3">
                                <div class="row m-0">
                                    <div class="cell-lg-8 bg-light p-1 p-6-lg">
                                        <div class="form-group">
                                            <input type="text" data-role="input" data-prepend="Título:">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="cell-lg-4 d-none d-block-lg">
                                        <input class="h-50" type="file" data-role="file" data-mode="drop" data-drop-icon="<span class='mif-attachment mif-4x text-center'>" data-on-select="
                                                $('#selected-files').html('');
                                                $.each(arguments[0], function(){
                                                    $('#selected-files').append('<div>'+this.name+'</div>');
                                                });
                                            ">
                                        <div id="selected-files" class="bg-light p-2 overflow reduce-1" style="height: 270px;"></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-actions d-flex flex-wrap flex-justify-center flex-justify-start-lg">
                                    <button class="button" type="button"><span class="mif-cancel"></span> Discard</button>
                                    <div class="ml-auto-lg">
                                        <button class="button info"><span class="mif-paper-plane"></span> Envíar</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <br>
                </div>


            </div>



        </div>
    </div>
</div>

<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( function(error){
            console.log(error)
        });
</script>


<?php
	$this->load->view("_lib/lib.footer.php");
?>
