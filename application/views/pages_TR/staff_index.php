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
                <li><a href="#gca">GCA</a></li>
                <li><a href="#profile-activity">Activity</a></li>
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Projects</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="gca">
                    <br>
                    <table class="table striped" data-role="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>VID</th>
                                <th>Fecha solicitud</th>
                                <th>Encargado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $q = $this->db->get("gca");
                            if ($q->result() > 0) {
                                foreach ($q->result() as $fila) {
                            ?>
                            <tr>
                                <td><?php echo $fila->id; ?></td>
                                <td><?php echo $fila->vid; ?></td>
                                <td><?php echo $fila->date; ?></td>
                                <td>
                                    <?php
                                        if($fila->encargado == NULL){
                                            echo 'No asignado';
                                        }else{
                                            echo $fila->encargado;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href=""><span class="mif-apps"></span></a>
                                    <a href=""><span class="mif-apps"></span></a>
                                </td>
                            </tr>
                            <?php }
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
        </div>



    </div>
</div>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>