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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('notams_title'); ?></br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('notams_system'); ?></a></li>
        </ul>
    </div>
</div>
<div class="m-3">
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('charts_IFR'); ?>" data-collapsible="true" data-title-icon="<span class='mif-clipboard'></span>" class="mt-4">
        <div class="row">
            <div class="bg-white p-4">
                <?php
                $Qnotams = $this->db->get_where('notams', array('state' => '1'));
                $Rnotams = $Qnotams->num_rows();
                if ($Rnotams > 0) {
                ?>
                    <button class="shortcut">
                        <span class="caption">Rocket</span>
                        <span class="mif-rocket icon"></span>
                    </button>
                <?php
                } else {
                ?>
                    <div class="remark warning">
                        No hay NOTAMs para mostrar en este momento.
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>



<?php
$this->load->view("_lib/lib.footer.php");
?>