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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo ucfirst(strtolower($this->lang->line('staff_dpto01_index'))); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('staffarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('staff_HQ_0001'); ?></a></li>
        </ul>
    </div>
</div>


<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto01_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#permisos"><?php echo $this->lang->line('staff_HQ_0001'); ?></a></li>
                <li><a href="#profile-activity">Activity</a></li>
                <li><a href="#stats">Timeline</a></li>
                <li><a href="#">Projects</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="permisos">
                    <div data-role="panel" data-title-caption="Agregar privilegios" data-title-icon="<span class='mif-info'>" data-collapsible="true">
                        <div class="gird">
                            <div class="row">
                                <div class="cell-4">
                                    <?php echo form_open('staff/AddAccess') ?>
                                    <div class="form-group">
                                        <input type="text" name="vid" placeholder="VID">
                                    </div>
                                </div>
                                <div class="cell-4">
                                    <div class="form-group">
                                        <input type="text" name="pos" placeholder="Posicion">
                                    </div>
                                </div>
                                <div class="cell-4">
                                    <div align="center" class="form-group">
                                        <input type="submit" class="button primary" value="Agregar">
                                    </div>
                                <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div data-role="panel" data-title-caption="Control de privilegios." data-title-icon="<span class='mif-info'>" data-collapsible="true">
                        <table class="table striped table-border mt-4" data-role="table" data-cls-table-top="row" data-cls-search="cell-md-6" data-cls-rows-count="cell-md-6" data-rows="5" data-rows-steps="5, 10" data-show-activity="false" data-horizontal-scroll="true">
                            <thead>
                                <tr class="flex-self-center">
                                    <th>VID</th>
                                    <th>Posicion</th>
                                    <th>HQ</th>
                                    <th>SO</th>
                                    <th>FO</th>
                                    <th>AO</th>
                                    <th>TR</th>
                                    <th>ME</th>
                                    <th>EV</th>
                                    <th>PR</th>
                                    <th>WE</th>
                                    <th>FR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rows = $this->db->get('permisos');
                                foreach ($rows->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->vid ?></td>
                                        <td><?php echo $row->posicion ?></td>
                                        <td>
                                            <?php if ($row->pages_HQ == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_HQ/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_HQ/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_SO == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_SO/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_SO/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_FO == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_FO/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_FO/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_AO == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_AO/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_AO/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_TR == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_TR/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_TR/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_ME == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_ME/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_ME/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_EV == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_EV/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_EV/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_PR == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_PR/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_PR/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_WE == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_WE/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_WE/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row->pages_FR == 'true') {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_FR/" . $row->vid) ?>"><span class="tally success">Permitido</span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url("staff/ChangeStatus/pages_FR/" . $row->vid) ?>"><span class="tally alert">Denegado</span></a>
                                            <?php
                                            } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <div id="profile-activity">
                    <br>
                    <div data-role="panel" data-title-caption="User activity" data-title-icon="<span class='mif-chart-line'>" data-collapsible="true">
                        <canvas id="profileChart1"></canvas>
                    </div>
                    <br>
                    <div data-role="panel" data-title-caption="Clients" data-title-icon="<span class='mif-users'>" data-collapsible="true">
                        <table class="table striped table-border mt-4" data-role="table" data-cls-table-top="row" data-cls-search="cell-md-6" data-cls-rows-count="cell-md-6" data-rows="5" data-rows-steps="5, 10" data-show-activity="false" data-source="<?php echo base_url('_include/'); ?>data/table.json" data-horizontal-scroll="true">
                        </table>
                    </div>
                </div>
                <div id="stats">
                    <canvas id="Simulator" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('Simulator').getContext('2d');
                        var Simulator = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['FSX', 'P3D'],
                                datasets: [{
                                    label: 'Vuelos',
                                    data: [120, 20],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options:{
                                scales: {
                                    yAxes: [{
                                        thicks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>



        </div>
    </div>
</div>

<?php
$this->load->view("_lib/lib.footer.php");
?>