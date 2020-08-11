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
                    <li class=""><a href="#" class="dropdown-toggle no-marker">
                            <span class="avatar">A</span>
                            <span class="label">Android</span>
                            <span class="second-label">1.856.546 people</span>
                            <span class="second-action mif-more-vert"></span>
                        </a>
                        <ul class="t-menu horizontal" data-role="dropdown" data-role-dropdown="true" style="display: none; width: 180px;">
                            <li><a href="#">One</a></li>
                            <li><a href="#">Two</a></li>
                            <li><a href="#">Three</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="avatar">G</span>
                        <span class="label">Google</span>
                        <span class="second-label">1.226.546 people</span>
                        <span class="second-action mif-more-vert"></span>
                    </li>
                    <li>
                        <span class="avatar">F</span>
                        <span class="label">Fallout</span>
                        <span class="second-label">856.546 people</span>
                        <span class="second-action mif-more-vert"></span>
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
                        <div><?php echo $this->session->userdata('division_name') ?>&nbsp;<img src="<?php echo base_url('_include/images/flags/' . $DivCode . '.png') ?>" alt="<?php echo $this->session->userdata('division_name') ?>"></div>

                        <div class="text-bold mt-2"><?php echo $this->lang->line('country'); ?></div>
                        <div><?php echo $this->session->userdata('country_name') ?>&nbsp;<img src="<?php echo base_url('_include/images/flags/' . $CouCode . '.png') ?>" alt="<?php echo $this->session->userdata('division_name') ?>"></div>

                    </div>
                    <br>
                    <div data-role="panel" data-title-caption="Work info" data-title-icon="<span class='mif-library'>" data-collapsible="true">
                        <div class="text-bold">Occupation</div>
                        <div>Developer</div>

                        <div class="text-bold mt-2">Skills</div>
                        <code>C#</code>, <code>PHP</code>, <code>Javascript</code>, <code>Angular</code>, <code>JS</code>, <code>HTML</code>, <code>CSS</code>

                        <div class="text-bold mt-2">Jobs</div>
                        <table class="table striped">
                            <tr>
                                <td>Self-Employed</td>
                                <td>2010 - Now</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>Google</td>
                                <td>2008 - 2010</td>
                                <td><span class="mif-done fg-green"></span></td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td>2006 - 2008</td>
                                <td><span class="mif-done fg-green"></span></td>
                            </tr>
                        </table>
                    </div>
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