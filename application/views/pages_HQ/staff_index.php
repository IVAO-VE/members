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
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');
    //echo BASEPATH; 
    //Cargando la estructura del HEADER
    $this->load->view("_lib/lib.header.php");
    //Cargando la estructura del MENU
    $this->load->view("_lib/lib.menu.php");
?>

<div class="fg-dark container-fluid start-screen h-100">
    
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto01_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

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

                        <div class="text-bold mt-2">Locations</div>
                        <address>
                            Khreschatyk str, Suite 1<br>
                            Kiev, Ukraine 01001<br>
                            <abbr title="primary phone number">Phone:</abbr> (123) 456-7890
                        </address>

                        <div class="text-bold mt-2">About Me</div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget pharetra felis, sed ullamcorper dui. Sed et elementum neque. Vestibulum pellente viverra ultrices. Etiam justo augue, vehicula ac gravida a, interdum sit amet nisl. Integer vitae nisi id nibh dictum mollis in vitae tortor.</div>
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
