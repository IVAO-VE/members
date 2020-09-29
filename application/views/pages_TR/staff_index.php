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
defined('BASEPATH') or exit('El acceso directo al código no está permitido.');
//echo BASEPATH; 
//Cargando la estructura del HEADER
$this->load->view("_lib/lib.header.php");
//Cargando la estructura del MENU
$this->load->view("_lib/lib.menu.php");
?>
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo ucfirst(strtolower($this->lang->line('staff_dpto05_index'))); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('staffarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto05'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('training_system'); ?></a></li>
        </ul>
    </div>
</div>


<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto05_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#gca">GCA</a></li>
                <li><a href="#profile-activity">Documentos de entrenamiento</a></li>
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Projects</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="gca">
                    <br>
                    <table class="table striped" data-role="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>VID</th>
                                <th>Fecha solicitud</th>
                                <th>Encargado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $q = $this->db->get("gca");
                            if ($q->result() > 0) {
                                foreach ($q->result() as $fila) {
                            ?>
                            <tr>
                                <td><a href="<?php echo base_url("staff/asignargca/" . $fila->id  ) ?>"><?php echo $fila->id; ?></a></td>
                                <td><a href="https://www.ivao.aero/Member.aspx?Id=<?php echo $fila->vid; ?>"><?php echo $fila->vid; ?></a></td>
                                <td><?php echo $fila->date; ?></td>
                                <td>
                                    <?php
                                        if($fila->encargado == NULL){
                                            echo 'No asignado';
                                        }else{
                                            $CI =& get_instance();
                                           $CI->load->model('Model_access');
                                           $Model = $CI->Model_access->getname($fila->encargado);
                                           foreach($Model as $row){
                                               echo $row->name .' ('.$fila->encargado.')' ;
                                           }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        switch($fila->status){
                                            case '0':
                                                echo 'Pendiente';
                                            break;
                                            case '1':
                                                echo 'En proceso';
                                            break;
                                            case '2':
                                                echo 'Aceptado';
                                            break;
                                            case '3':
                                                echo 'Denegado';
                                            break;
                                        }
                                    ?>

                                </td>
                                <td>
                                    <a href="<?php echo base_url("staff/pendientegca/" . $fila->id  ) ?>"><i class="fa fa-flag-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url("staff/aceptadogca/" . $fila->id  ) ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url("staff/denegadogca/" . $fila->id  ) ?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <br>
            </div>
            <div id="profile-activity">
                <br>
                <div data-role="panel" data-title-caption="Administración de documentos" data-title-icon="<span class='mif-chart-line'>" data-collapsible="true">

                        <div class="row">
                                <div class="cell-md-6">

                                    <div data-role="panel" data-title-caption="Documentos existentes" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
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
                                                        $dir = opendir(FCPATH.'uploads/documents/'); //creamos el objeto directorio
                                                        while($elemento = readdir($dir)){ //recorremos todos los elementos del objeto
                                                            if(($elemento != ".") && ($elemento != "..")){ //no es control de directorios
                                                                if(!is_dir(FCPATH.'uploads/documents/'.$elemento)){ //es un archivo
                                                                    $MyFILE_INFO = pathinfo(FCPATH.'uploads/documents/'.$elemento);
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
                                                                            <td>'.date('d/m/Y H:i:s', filectime(FCPATH.'uploads/documents/'.$elemento)).'</td>
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
                                        <h4>Agregar ó actualizar documentos</h4>

                                        <form data-role="validator" action="/staff/FO_addSceneries" method="POST" enctype="multipart/form-data">

                                            <div class="mt-2 mb-2">
                                                <label>Selecciona la categoría.</label>
                                                <select id="sim" name="sim" data-role="select" data-validate="required not=-1">
                                                    <option value="-1" class="d-none"></option>
                                                    <option value="CON">Conexión y red</option>
                                                    <option value="FRA">Fraseología y radios</option>
                                                    <option value="AER">Aeronaves y equipos</option>
                                                    <option value="MET">Tiempo y meteorología</option>
                                                    <option value="REG">Reglamentación y normatividad</option>
                                                    <option value="SOF">Software y herramientas</option>
                                                    <option value="PRA">Prácticas y ejercicios de vuelo</option>
                                                    <option value="OTR">Otras categorías</option>
                                                </select>
                                                <span class="invalid_feedback">Debes de seleccionar una categoría!</span>
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
                                                    data-button-title="Elija o arrastre el archivo" 
                                                    data-validate="required not=-1" 
                                                >
                                                <span class="invalid_feedback">Debes de cargar un documento!</span>
                                            </div>

                                            <button class="button primary">Agregar documento</button>
                                        </form>


                                    </div>
                                </div>


                            </div>

                        </div>
            </div>
        </div>



    </div>
</div>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>