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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('transponders_title'); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto03'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('transponders_system'); ?></a></li>
        </ul>
    </div>
</div>

<div class="m-3">
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('charts_IFR'); ?>" data-collapsible="true" data-title-icon="<span class='mif-clipboard'></span>" class="mt-4">
        <div class="row">
            <div class="bg-white p-4">
                <div class="container">
                    <iframe class="responsive-iframe" src="https://squawk.scumari.nl/"></iframe>
                </div>
            </div>            
        </div>
    </div>
</div>

<style>
    .container {
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
    padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }

    .responsive-iframe {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    border: none;
    }
</style>


<?php
	$this->load->view("_lib/lib.footer.php");
?>
