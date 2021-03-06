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
$DivCode = strtolower($this->session->userdata('division_code'));
$CouCode = strtolower($this->session->userdata('country_code'));
?>

<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('perfilmember'); ?></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="#" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('profile'); ?></a></li>
        </ul>
    </div>
</div>

<div class="row m-3">
    <div class="cell-lg-4 cell-md-6">
        <div class="bg-white p-4">
            <div class="social-box">
                <div style="background-image: ('https://cdn.airplane-pictures.net/images/uploaded-images/2017/6/1/910061as.jpg');" class="header bg-cyan fg-white">
                    <img src="<?php echo $this->session->userdata('member_img'); ?>" class="avatar">
                    <div class="title d-flex flex-justify-center mb-1"><?php echo $this->session->userdata('fullname'); ?></div>
                    <div class="subtitle d-flex flex-justify-center mb-3"><?php echo $this->session->userdata('vid'); ?></div>
                </div>
                <ul class="skills">
                    <li>
                        <img src="<?php echo $this->session->userdata('ratingpilot_img'); ?>" alt="<?php echo $this->session->userdata('ratingpilot_name'); ?>">
                        <div><?php echo $this->session->userdata('ratingpilot_name'); ?></div>
                    </li>
                    <li>
                        <img src="<?php echo $this->session->userdata('ratingatc_img'); ?>" alt="<?php echo $this->session->userdata('ratingatc_name'); ?>">
                        <div><?php echo $this->session->userdata('ratingatc_name'); ?></div>
                    </li>
                    <li>
                        <div class="text-bold"><?php echo $this->myfunctions->segundos_a_horas($this->session->userdata('fullhours')); ?></div>
                        <div><?php echo $this->lang->line('hours'); ?> &nbsp; <a data-role="popover" data-popover-text="<?php echo $this->lang->line('fullhours'); ?>" data-popover-position="right"><span class="mif-info mif-lg"></span></a></div>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="bg-white p-4">
            <div data-role="panel" data-title-caption="Medallas divisionales">
                <ul class="user-list flex-justify-start">
                    <li>
                        <img src="https://www.ivao.aero/data/images/awardsdiv/DS.gif">
                        <div class="text-ellipsis">Division Spirit</div>
                        <div class="text-small text-muted">8/11/2020</div>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="bg-white p-4">
            <div data-role="panel" data-title-caption="Aerolineas virtuales">
                <ul class="items-list">
                    <li><a href="#" class="link dropdown-toggle no-marker" style="text-decoration: none;">
                            <span class="avatar">C</span>
                            <span class="label">CONVIASA VIRTUAL</span>
                            <span class="second-label">10 pilotos</span>
                            <span class="second-action mif-more-vert"></span>
                        </a>
                        <ul class="h-menu horizontal" data-role="dropdown">
                            <li><a href="#">Reportar</a></li>
                            <li><a href="#">Web</a></li>
                            <li><a href="#" class="fg-red">Abandonar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cell-lg-8 cell-md-6">
        <div class="bg-white p-4">
            <ul data-role="tabs" data-expand="true">
                <li><a href="#profile-about"><?php echo $this->lang->line('about'); ?></a></li>
                <li><a href="#profile-activity">Activity</a></li>
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Projects</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="profile-about">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('ginfo'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">
                        <div class="text-bold"><?php echo $this->lang->line('division'); ?></div>
                        <div><img src="<?php echo base_url('_include/images/flags/' . $DivCode . '.png') ?>" alt="<?php echo $this->session->userdata('division_name') ?>">&nbsp;<?php echo $this->session->userdata('division_name') ?></div>

                        <div class="text-bold mt-2"><?php echo $this->lang->line('country'); ?></div>
                        <div><img src="<?php echo base_url('_include/images/flags/' . $CouCode . '.png') ?>" alt="<?php echo $this->session->userdata('division_name') ?>">&nbsp;<?php echo $this->session->userdata('country_name') ?></div>

                    </div>
                    <br>
                    <div data-role="panel" data-title-caption="Eventos reportados" data-title-icon="<span class='mif-airplane'>" data-collapsible="true">
                        <table class="table table-strip">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('callsing'); ?></th>
                                    <th><?php echo $this->lang->line('type'); ?></th>
                                    <th><?php echo $this->lang->line('from'); ?></th>
                                    <th><?php echo $this->lang->line('to'); ?></th>
                                    <th><?php echo $this->lang->line('server'); ?></th>
                                    <th><?php echo $this->lang->line('transponder'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $this->db->query("SELECT * FROM whazzup_log WHERE client_type='PILOT' AND vid=" . $this->session->userdata('vid') . " ORDER BY connection_time DESC LIMIT 15");
                                foreach ($query->result() as $row) {
                                    if ($row->fl_rules == 'I') {
                                        $Ty = 'IFR';
                                    } else {
                                        $Ty = 'VFR';
                                    }
                                    echo '
                                    <tr>
                                        <td>' . $row->callsign . '</td>
                                        <td>' . $Ty . '</td>
                                        <td>' . $row->fl_departure . '</td>
                                        <td>' . $row->fl_destination . '</td>
                                        <td>' . $row->server . '</td>
                                        <td>' . $row->transponder_code . '</td>
                                    </tr>
                                    
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="profile-activity">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('10Flights'); ?>" data-title-icon="<i class='fa fa-plane' aria-hidden='true'></i>" data-collapsible="true">
                        <?php
                        $q = $this->db->get_where('whazzup_log', array('client_type' => 'PILOT', 'vid' => $this->session->userdata('vid')), 10);
                        if ($q->num_rows() > 0) {
                        ?>
                            <table class="table stripped">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('callsing'); ?></th>
                                        <th><?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('from'); ?></th>
                                        <th><?php echo $this->lang->line('to'); ?></th>
                                        <th>Simulador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($q->result() as $flight) {
                                        switch ($flight->fl_rules) {
                                            case 'I':
                                                $FLrul = 'IFR';
                                                break;
                                            case 'V':
                                                $FLrul = 'VFR';
                                                break;
                                            case 'Y':
                                                $FLrul = 'IFR-VFR';
                                                break;
                                            case 'Z':
                                                $FLrul = 'VFR-IFR';
                                                break;
                                            default:
                                                $FLrul = 'No definido';
                                        }
                                        $simulator = $flight->simulator;
                                    ?>
                                        <tr>
                                            <td><?php echo $flight->callsign ?></td>
                                            <td><?php echo $FLrul ?></td>
                                            <td><?php echo $flight->fl_departure ?></td>
                                            <td><?php echo $flight->fl_destination ?></td>
                                            <td><?php echo $this->myfunctions->get_simulator($simulator) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <div class="remark alert">
                                <?php echo $this->lang->line('Noflights'); ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('10Atc'); ?>" data-title-icon="<i class='fa fa-headphones' aria-hidden='true'></i>" data-collapsible="true">
                        <?php
                        $aQ = $this->db->get_where('whazzup_log', array('client_type' => 'ATC', 'vid' => $this->session->userdata('vid'), 'facility_type' => '> 0'), 10);
                        if ($aQ->num_rows() > 0) {
                        ?>
                            <table class="table stripped">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('callsing'); ?></th>
                                        <th><?php echo $this->lang->line('TBL002_colum2'); ?></th>
                                        <th><?php echo $this->lang->line('TBL002_colum3'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($aQ->result() as $atc) {
                                    ?>
                                        <tr>
                                            <td><?php echo $atc->callsign ?></td>
                                            <td><?php echo date("d-m-Y H:i:s", $atc->connection_time) ?></td>
                                            <td><?php echo $atc->frequency ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <div class="remark alert">
                                <?php echo $this->lang->line('NoAtc'); ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view("_lib/lib.footer.php");
?>