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
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('meteorologic_title'); ?></br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
        <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('meteorologic_system'); ?></a></li>
        </ul>
    </div>
</div>

<div class="row">
        <div class="cell-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img src="<?php echo base_url('_include/images/perfiles')."/ve.png"; ?>">
                    </div>
                    <div class="name">IVAO Venezuela</div>
                    <div class="date"><?php echo $this->lang->line('meteorologic_CAR'); ?></div>
                </div>
                <div class="card-content p-2">
                    <img src="http://images.intellicast.com/WxImages/SatelliteLoop/hicbsat_None_anim.gif" style="width: 100%">
                </div>
                <div class="card-footer">
                    <button class="flat-button mif-thumbs-up mif-2x"></button>
                    <button class="flat-button mif-tag mif-2x"></button>
                    <button class="flat-button mif-share mif-2x"></button>
                </div>
            </div>
        </div>

        <div class="cell-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img src="<?php echo base_url('_include/images/perfiles')."/ve.png"; ?>">
                    </div>
                    <div class="name">IVAO Venezuela</div>
                    <div class="date"><?php echo $this->lang->line('meteorologic_WX'); ?></div>
                </div>
                <div class="card-content  p-2">
                    <img src="http://images.intellicast.com/WxImages/CustomGraphic/tgsfc24.gif"  style="width: 100%">
                </div>
                <div class="card-footer">
                    <button class="flat-button mif-thumbs-up mif-2x"></button>
                    <button class="flat-button mif-tag mif-2x"></button>
                    <button class="flat-button mif-share mif-2x"></button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="cell-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img src="<?php echo base_url('_include/images/perfiles')."/ve.png"; ?>">
                    </div>
                    <div class="name">IVAO Venezuela</div>
                    <div class="date"><?php echo $this->lang->line('meteorologic_SAM'); ?></div>
                </div>
                <div class="card-content p-2">
                    <img src="http://images.intellicast.com/WxImages/SatelliteLoop/hisasat_None_anim.gif" style="width: 100%">
                </div>
                <div class="card-footer">
                    <button class="flat-button mif-thumbs-up mif-2x"></button>
                    <button class="flat-button mif-tag mif-2x"></button>
                    <button class="flat-button mif-share mif-2x"></button>
                </div>
            </div>
        </div>

        <div class="cell-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img src="<?php echo base_url('_include/images/perfiles')."/ve.png"; ?>">
                    </div>
                    <div class="name">IVAO Venezuela</div>
                    <div class="date"><?php echo $this->lang->line('meteorologic_PRES'); ?></div>
                </div>
                <div class="card-content  p-2">
                    <img src="https://www.nhc.noaa.gov/tafb_latest/WATL_latest.gif"  style="width: 100%">
                </div>
                <div class="card-footer">
                    <button class="flat-button mif-thumbs-up mif-2x"></button>
                    <button class="flat-button mif-tag mif-2x"></button>
                    <button class="flat-button mif-share mif-2x"></button>
                </div>
            </div>
        </div>
    </div>


<div class="m-3">
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('meteorologic_WIND'); ?>" data-collapsible="true" data-title-icon="<span class='mif-help'></span>" class="mt-4">
        <div class="row">

<p>
 </p><h4><b>Viento de altura</b></h4>
 <a href="http://aviationweather.gov/data/iffdp/2306.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL050</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2305.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL100</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2304.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL180</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2303.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL240</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2302.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL300</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2301.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL340</b></button></a>
<a href="http://aviationweather.gov/data/iffdp/2300.gif" target="_blank"><button type="button" class="btn btn-info"><b>FL390</b></button></a>
<br>       
<h4><b>Viento interactivo</b></h4>
<iframe class="" width="100%" height="800px" src="https://earth.nullschool.net/#current/wind/surface/level/orthographic=-64.19,11.10,1008/loc=-66.502,10.491"></iframe>





        </div>
    </div>
</div>


<?php
	$this->load->view("_lib/lib.footer.php");
?>
