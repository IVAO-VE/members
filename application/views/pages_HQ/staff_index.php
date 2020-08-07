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
<div class="bg-dark fg-white container-fluid start-screen h-100">
        <h1 class="mb-15 start-screen-title"><?php echo $this->lang->line('staff_dpto01_index'); ?></h1>

        <div class="tiles-area clear">
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">
                <a href="https://github.com/olton/Metro-UI-CSS" data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Github</span>
                    <span class="badge-bottom">30</span>
                </a>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-envelop icon"></span>
                    <span class="branding-bar">Email</span>
                    <span class="badge-bottom">10</span>
                </div>
                <div data-role="tile" class="bg-orange fg-white" data-size="wide">
                    <span class="mif-chrome icon"></span>
                    <span class="branding-bar">Chrome</span>
                </div>
                <div data-role="tile" data-size="small">
                    <span class="mif-apple icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-red fg-white">
                    <span class="mif-bell icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-teal fg-white col-1 row-6">
                    <span class="mif-windows icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-brown fg-white col-2 row-6">
                    <span class="mif-wind icon"></span>
                </div>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-table icon"></span>
                    <span class="branding-bar">Tables</span>
                </div>
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">
                <a href="https://github.com/olton/Metro-UI-CSS" data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Github</span>
                    <span class="badge-bottom">30</span>
                </a>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-envelop icon"></span>
                    <span class="branding-bar">Email</span>
                    <span class="badge-bottom">10</span>
                </div>
                <div data-role="tile" class="bg-orange fg-white" data-size="wide">
                    <span class="mif-chrome icon"></span>
                    <span class="branding-bar">Chrome</span>
                </div>
                <div data-role="tile" data-size="small">
                    <span class="mif-apple icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-red fg-white">
                    <span class="mif-bell icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-teal fg-white col-1 row-6">
                    <span class="mif-windows icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-brown fg-white col-2 row-6">
                    <span class="mif-wind icon"></span>
                </div>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-table icon"></span>
                    <span class="branding-bar">Tables</span>
                </div>
            </div>
        </div>
</div>
<?php
	$this->load->view("_lib/lib.footer.php");
?>
