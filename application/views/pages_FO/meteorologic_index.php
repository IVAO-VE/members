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
                        <img src="https://lorempixel.com/68/68/people/">
                    </div>
                    <div class="name">John Doe</div>
                    <div class="date">Monday at 3:47 PM</div>
                </div>
                <div class="card-content p-2">
                    <img src="https://lorempixel.com/1000/600/nature/" style="width: 100%">
                    <div class="p-2">
                        Unearthly, indeed, pattern! For a gooey springy sauce, add some vinaigrette and radish sprouts. Avast, black sail. you won't trade the bikini atoll.
                    </div>
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
                        <img src="http://images.intellicast.com/WxImages/SatelliteLoop/hicbsat_None_anim.gif">
                    </div>
                    <div class="name">John Doe</div>
                    <div class="date">Monday at 3:47 PM</div>
                </div>
                <div class="card-content p-2">
                    What a nice photo i took yesterday!
                </div>
                <div class="card-content">
                    <img src="http://images.intellicast.com/WxImages/CustomGraphic/tgsfc24.gif">
                </div>
                <div class="card-content fg-gray p-2">
                    <span><small>Likes: </small>112</span>
                    <span><small>Comments: </small>43</span>
                </div>
                <div class="card-footer">
                    <button class="flat-button mif-thumbs-up mif-2x"></button>
                    <button class="flat-button mif-tag mif-2x"></button>
                    <button class="flat-button mif-share mif-2x"></button>
                </div>
            </div>
        </div>
    </div>



<?php
	$this->load->view("_lib/lib.footer.php");
?>
