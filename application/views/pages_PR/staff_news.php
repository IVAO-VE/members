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
function GetName($vid){
    if($vid){
            $this->db->where('vid', $vid);
            $this->db->select('vid, name');
            $query = $this->db->get('members_data'); 

            $Name = $query->result_array()[0]['name'];
            echo $Name;
    }
}
?>
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100">Administración de noticias</br><small>Versión v2.0</small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link">Área de miembros</a></li>
            <li class="page-item"><a href="" class="page-link">Relaciones publicas</a></li>
            <li class="page-item"><a href="" class="page-link">Administración de noticias</a></li>
        </ul>
    </div>
</div>
<div class="bg-white p-4">
<div class="">
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

    <div class="bg-white p-6 text-center text-leader">
        Panel de noticias
        <p class="text-leader2">
            En este panel podras ver las noticias creadas y publicadas.
        </p>
    </div>
    <br>
        <table class="table" data-role="table">
            <thead>
                <tr>
                    <th data-sortable="true" data-sort-dir="asc">ID</th>
                    <th data-sortable="true">Titulo</th>
                    <th data-sortable="true">Descripcion</th>
                    <th data-sortable="true" data-format="date" data-format-mask="%d-%m-%y">Fecha creacion</th>
                    <th data-sortable="true">Creado por</th>
                    <th data-sortable="true">Estado</th>
                    <th data-sortable="true">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = $this->db->get("news");
                if ($q->result() > 0) {
                    foreach ($q->result() as $fila) {
                ?>
                        <tr>
                            <td><?php echo $fila->id; ?></td>
                            <td><?php echo $fila->title; ?></td>
                            <td><?php echo $fila->description; ?></td>
                            <td><?php echo $fila->date; ?></td>
                            <td><?php echo '<a href="https://www.ivao.aero/Member.aspx?Id=' . $fila->author . '">' . $fila->author . '</a>' ?></td>
                            <td><?php
                                switch ($fila->status) {
                                    case '0':
                                        echo '<a href="' . base_url("staff/NewStatus/" . $fila->id) . '"><span class="mif-not fg-red"></span> Oculto</a>';
                                        break;
                                    case '1':
                                        echo '<a href="' . base_url("staff/NewStatus/" . $fila->id) . '"><span class="mif-checkmark fg-green"></span> Publicado</a>';
                                        break;
                                }
                                ?></td>
                            <td>
                                <a href="<?php echo base_url("staff/DeleteNews/$fila->id") ?>"><span class="mif-bin"></span></a>
                                <a href="<?php echo base_url("staff/NewEdit/$fila->id") ?>"><span class="mif-pencil"></span></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex flex-column flex-justify-center">
            <div id="t1_info"></div>
            <div id="t1_pagination"></div>
        </div>
    </div>
    <div id="Buttons" class="gird">
        <div class="row">
            <div class="cell-11"></div>
            <div class="cell-1">
                <a class="button primary cycle " onclick="Metro.dialog.open('#add')">
                    <span class="mif-plus"></span>
                </a>
            </div>
        </div>
        <?php if (isset($New)) :
            if ($New != false) : ?>
                <div class="dialog" data-role="dialog" data-show="true">
                    <div class="dialog-title text-center">Editar Noticia</div>
                    <div class="dialog-content">
                        <?php foreach ($New as $News) { ?>
                            <?php echo form_open('staff/EditNew') ?>
                            <input type="hidden" name="id" value="<?php echo $News->id; ?>">
                            <div class="gird">
                                <div class="row">
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" value="<?php echo $News->title ?>" class="fg-black" name="title" required>
                                        </div>
                                    </div>
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <textarea name="description" data-role="textarea" cols="10" rows="10"><?php echo $News->description ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="dialog-actions">
                        <input type="submit" class="button primary" value="Editar">
                        <?php echo form_close() ?>
                        <a href="<?php echo base_url('staff/News') ?>" class="button">Cerrar</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<!-- Modal Agregar Noticia -->
<div id="add" class="dialog" data-role="dialog">
    <div class="dialog-title">Agregar nueva noticia</div>
    <div class="dialog-content">
        <?php echo form_open('staff/AddNew') ?>
        <div class="gird">
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" name="title" class="fg-black" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="description" data-role="textarea" cols="10" rows="10" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input type="checkbox" data-role="switch" data-caption="Publicar" name="status" data-caption-position="left">
                </div>
            </div>
        </div>
    </div>
    <div class="dialog-actions">
        <input type="submit" class="button success" value="Agregar">
        <?php echo form_close() ?>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>
<!-- Fin Modal Agregar Noticia -->
<?php
$this->load->view("_lib/lib.footer.php");
?>