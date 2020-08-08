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

<div class="fg-dark container-fluid start-screen h-100">
    <h1 class="mb-15 start-screen-title"><?php echo $this->lang->line('staff_dpto01_index'); ?></h1>

    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto01_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">
            <ul data-role="tabs" data-expand="true" data-tabs-position="vertical left" class="w-25">
                <li><a href="#"><?php echo $this->lang->line('staff_HQ_0001'); ?></a></li>
                <li><a href="#">[ModuloX]</a></li>
                <li><a href="#">[ModuloX]</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
	$this->load->view("_lib/lib.footer.php");
?>
