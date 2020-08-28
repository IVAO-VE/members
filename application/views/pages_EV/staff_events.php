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
<div class="bg-white p-4">
<?php if ($this->session->flashdata('info')) : ?>
    <div class="remark primary">
        <?php echo $this->session->flashdata('info'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="remark primary">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="gird">
    <div class="row">
        <div class="cell-10"></div>
        <div class="cell-2">
            <a href="<?php echo base_url('staff/EVcalendar') ?>" class="button success">Calendario</a>
        </div>
    </div>
</div>
<table class="table" data-role="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Inicio</th>
            <th>Reportable</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $q = $this->db->get("events");
        if ($q->result() > 0) {
            foreach ($q->result() as $fila) {
        ?>
                <tr>
                    <td><?php echo $fila->event; ?></td>
                    <td><?php echo $fila->title; ?></td>
                    <td><?php echo $fila->start; ?></td>
                    <td>
                        <?php 
                            switch($fila->reportable){
                                case '0':
                                    echo '<a href="' . base_url("staff/NewStatus/" . $fila->event) . '"><span class="mif-not fg-red"></span> No reportable</a>';
                                break;
                                case '1':
                                    echo '<a href="' . base_url("staff/NewStatus/" . $fila->event) . '"><span class="mif-checkmark fg-green"></span> Reportable</a>';
                            };
                        ?>
                    </td>
                    <td>
                        <?php 
                            switch($fila->status){
                                case '0':
                                    echo '<a href="' . base_url("staff/NewStatus/" . $fila->event) . '"><span class="mif-not fg-red"></span> Oculto</a>';
                                break;
                                case '1':
                                    echo '<a href="' . base_url("staff/NewStatus/" . $fila->event) . '"><span class="mif-checkmark fg-green"></span> Publicado</a>';
                                break;
                            }
                        ?>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>