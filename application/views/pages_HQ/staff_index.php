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
            <div class="tabs tabs-wrapper vertical left tabs-expand"><div class="expand-title">Home</div><ul data-role="tabs" data-expand="true" data-tabs-position="vertical left" class="w-50 tabs-list" data-role-tabs="true">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Links</a></li>
            </ul><button type="button" class="hamburger menu-down dark"><span class="line"></span><span class="line"></span><span class="line"></span></button></div>
        </div>
</div>

<?php
	$this->load->view("_lib/lib.footer.php");
?>
