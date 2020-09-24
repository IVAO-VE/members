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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('sceneries_title'); ?></br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
        <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('sceneries_system'); ?></a></li>
        </ul>
    </div>
</div>



<div class="row">

    <?php
        //Consultando datos de escenarios en el directorio
        try {
            
            $xARRAY_FILES = array();
            $dir = opendir(FCPATH.'uploads/sceneries/'); //creamos el objeto directorio
            while($elemento = readdir($dir)){ //recorremos todos los elementos del objeto
                if(($elemento != ".") && ($elemento != "..")){ //no es control de directorios
                    if(!is_dir(FCPATH.'uploads/sceneries/'.$elemento)){ //es un archivo
                        $MyFILE_INFO = pathinfo(FCPATH.'uploads/sceneries/'.$elemento);
                        array_push($xARRAY_FILES, $MyFILE_INFO['basename']);
                    }
                }
            }

            $xESCENARIOS_J = array();
            foreach($xARRAY_FILES as $archivo) {
                $nom = substr($archivo, 0, strrpos($archivo, '_'));
                isset($xESCENARIOS_J[$nom]) ? 
                  $xESCENARIOS_J[$nom].= '-'.$archivo 
                  : $xESCENARIOS_J[$nom]=$archivo;
            }

            $xICAO = array_keys($xESCENARIOS_J);
            for($i = 0; $i < count($xESCENARIOS_J); $i++) {
                $this->phpdebug->debug('[DEBUG]: '.$xICAO[$i]);
                $query = $this->db->query('SELECT * FROM nav_airports WHERE icao = "'.$xICAO[$i].'"');
                
                foreach ($query->result() as $row){ //El escenario existe en la base de datos
                    echo '
                        <div class="cell-lg-4">
                        <div class="card image-header">
                            <div class="card-header fg-white" style="background-image: url('.base_url('_include/images/scenery')."/".rand(0, 30).'.jpg)">
            
                                <div class="avatar">
                                    <img src="'.base_url('_include/images/perfiles').'/ve.png">
                                </div>
            
                                '.$row->icao.'
                            </div>
                            <div class="card-content p-2">
                                <p class="fg-gray">'.$row->name.'</p>
                                Quisque '.$row->latitude.' eget '.$row->longitude.' vestibulum nulla.
                                Quisque '.$row->elevation.' quis dui quis exultricies efficitur vitae non felis.
                                Phasellus quis nibh hendrerit...
                            </div>
                            <div class="card-footer">';
                            
                            print_r($xESCENARIOS_J[$xICAO[$i]]);

                            echo '<button class="shortcut info outline rounded mt-1">
                                    <span class="caption">FS2004</span>
                                    <span class="mif-document-file-zip icon"></span>
                                </button>
                                <button class="shortcut info outline rounded mt-1">
                                    <span class="caption">FSX</span>
                                    <span class="mif-document-file-zip icon"></span>
                                </button>
                                <button class="shortcut info outline rounded mt-1">
                                    <span class="caption">P3D</span>
                                    <span class="mif-document-file-zip icon"></span>
                                </button>
                                <button class="disable shortcut info outline rounded mt-1">
                                    <span class="caption">X-Plane</span>
                                    <span class="mif-document-file-zip icon"></span>
                                </button>
                                <button class="shortcut info outline rounded mt-1">
                                    <span class="caption">FS2020</span>
                                    <span class="mif-document-file-zip icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>';
                }
            }







        } catch (Exception $e) {
            //Problema detetado
            $this->phpdebug->debug('[DEBUG] -> Excepción: '.$e->getMessage());
            $this->myfunctions->showDIALOG(false, "Control de errores", $e->getMessage(), 5);
        }                                                    
    ?>  

</div>




<?php
	$this->load->view("_lib/lib.footer.php");
?>
