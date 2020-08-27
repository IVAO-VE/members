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
    <div class="bg-white p-4">
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
                                        echo '<span class="mif-not fg-red"></span> Oculto';
                                        break;
                                    case '1':
                                        echo '<span class="mif-checkmark fg-green"></span> Publicado';
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
                <script>
                    $(document).ready(function() {
                        $('#Buttons').hide();
                    });
                </script>
                <div class="dialog">
                    <div class="dialog-title">Use Windows location service?</div>
                    <div class="dialog-content">
                        Bassus abactors ducunt ad triticum.
                        A fraternal form of manifestation is the bliss.
                    </div>
                    <div class="dialog-actions">
                        <button class="button">Disagree</button>
                        <button class="button primary">Agree</button>
                    </div>
                </div>
                <div class="row">
                    <div class="cell-4"></div>
                    <div class="cell-4">
                        <?php foreach ($New as $News) { ?>
                            <?php echo form_open('staff/EditNew') ?>
                            <div class="card">
                                <div class="card-header">
                                    Editar Noticia
                                </div>
                                <div class="card-content p-2">
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
                                                    <textarea name="descripcion" data-role="textarea" cols="10" rows="10"><?php echo $News->description ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="button primary" value="Editar">
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        <?php } ?>
                    </div>
                    <div class="cell-4"></div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="cel">
                        <h2>No se ha encontrado resultados disponibles.</h2>
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