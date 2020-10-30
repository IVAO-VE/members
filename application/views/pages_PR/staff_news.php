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
function GetName($vid)
{
    if ($vid) {
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

        <div class="fg-dark container-fluid start-screen h-100">
            <div class="mb-15"></div>
            <div data-role="panel" data-title-caption="Administracion relaciones publicas" data-title-icon="<span class='mif-apps'></span>">
                <div class="bg-white h-100">

                    <ul data-role="tabs" data-expand="true">
                        <li><a href="#news">Administracion de noticias</a></li>
                    </ul>

                    <div id="user-profile-tabs-content">
                        <div id="news">
                            
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

    <div class="bg-white p-6 text-center text-leader">
        Panel de noticias
        <p class="text-leader2">
            En este panel podras ver las noticias creadas y publicadas.
        </p>
    </div>
    <br>

</div>
</div>

<?php
$this->load->view("_lib/lib.footer.php");
?>