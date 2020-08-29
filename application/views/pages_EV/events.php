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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('airlines_title'); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('airlines_system'); ?></a></li>
        </ul>
    </div>
</div>
<div class="bg-white p-4">
    <?php
    $this->db->where('reportable', 1);
    $q = $this->db->get('events');
    if ($q->result() > 0) {
        foreach ($q->result() as $fila) {
    ?>
            <div class="card image-header">
                <div class="card-header fg-white" style="background-image: url(<?php echo $fila->img; ?>)">
                    <?php echo $fila->title ?>
                </div>
                <div class="card-content p-2">
                    <?php echo $fila->description ?>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $fila->foro ?>" class="button secondary">Foro</a>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>