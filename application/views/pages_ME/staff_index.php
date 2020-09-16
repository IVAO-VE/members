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
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo ucfirst(strtolower($this->lang->line('staff_dpto06_index'))); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('staffarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto06'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('staff'); ?></a></li>
        </ul>
    </div>
</div>


<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto06_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#airlines"><?php echo $this->lang->line('dpto03_SEC'); ?></a></li>
                <li><a href="#charts"><?php echo $this->lang->line('dpto03_TSP'); ?></a></li>
                <li><a href="#meteorologic"><?php echo $this->lang->line('dpto03_GCA'); ?></a></li>
                <li><a href="#information"><?php echo $this->lang->line('dpto03_FRA'); ?></a></li>
                <li><a href="#medallas">Medallas</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="airlines">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>

                <div id="charts">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>

                <div id="meteorologic">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>

                <div id="information">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>

                <div id="medallas">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">
                        <div class="gird">
                            <div class="row">
                                <div class="cell-6">
                                    <div data-role="panel" data-title-caption="Medallas creadas" data-title-icon="<span class='mif-info'>" data-collapsible="true">
                                        <?php
                                        $q = $this->db->get('awards');
                                        if ($q->num_rows() > 0) {
                                        ?>
                                            <table class="table stripped" data-role="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Corto</th>
                                                        <th>Nombre</th>
                                                        <th>Maximos puntos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($q->result() as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row->id; ?></td>
                                                            <td><?php echo $row->short; ?></td>
                                                            <td><?php echo $row->name; ?></td>
                                                            <td><?php echo $row->max; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="remark alert">
                                                        Ninguna medalla creada.
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <div class="cell-6">
                                    <div data-role="panel" data-title-caption="Agregar nueva medalla" data-title-icon="<span class='mif-info'>" data-collapsible="true">
                                        <?php echo form_open('staff/addAward'); ?>
                                        <div class="row">
                                            <div class="cell">
                                                <div class="form-group">
                                                    <label>Corto</label>
                                                    <input type="text" name="short" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cell">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cell">
                                                <div class="form-group">
                                                    <label>Maximo puntos</label>
                                                    <input type="text" name="max" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cell">
                                                <input type="submit" class="button primary" value="Agregar">
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>



        </div>
    </div>
</div>

<?php
$this->load->view("_lib/lib.footer.php");
?>