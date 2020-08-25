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
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('sceneries_title'); ?></br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
        <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="#" class="page-link"><?php echo $this->lang->line('sceneries_system'); ?></a></li>
        </ul>
    </div>
</div>



<div class="row">
        <div class="cell-lg-4">
            <div class="card image-header">
                <div class="card-header fg-white" style="background-image: url(http://lorempixel.com/1000/600/abstract/)">

                    <div class="avatar">
                        <img src="https://lorempixel.com/68/68/people/">
                    </div>

                    Journey To Mountains
                </div>
                <div class="card-content p-2">
                    <p class="fg-gray">Posted on January 21, 2015</p>
                    Quisque eget vestibulum nulla. Quisque quis dui quis ex
                    ultricies efficitur vitae non felis. Phasellus quis nibh
                    hendrerit...
                </div>
                <div class="card-footer">
                    <button class="button secondary">Read More</button>
                </div>
            </div>
        </div>

        <div class="cell-lg-4">
            <div class="card image-header">
                <div class="card-header fg-white" style="background-image: url(http://lorempixel.com/1000/600/abstract/)">

                    <div class="avatar">
                        <img src="https://lorempixel.com/68/68/people/">
                    </div>

                    Journey To Mountains
                </div>
                <div class="card-content p-2">
                    <p class="fg-gray">Posted on January 21, 2015</p>
                    Quisque eget vestibulum nulla. Quisque quis dui quis ex
                    ultricies efficitur vitae non felis. Phasellus quis nibh
                    hendrerit...
                </div>
                <div class="card-footer">
                    <button class="button secondary">Read More</button>
                </div>
            </div>
        </div>

        <div class="cell-lg-4">
            <div class="card image-header">
                <div class="card-header fg-white" style="background-image: url(http://lorempixel.com/1000/600/abstract/)">

                    <div class="avatar">
                        <img src="https://lorempixel.com/68/68/people/">
                    </div>

                    Journey To Mountains
                </div>
                <div class="card-content p-2">
                    <p class="fg-gray">Posted on January 21, 2015</p>
                    Quisque eget vestibulum nulla. Quisque quis dui quis ex
                    ultricies efficitur vitae non felis. Phasellus quis nibh
                    hendrerit...
                </div>
                <div class="card-footer">
                    <button class="button secondary">Read More</button>
                </div>
            </div>
        </div>
</div>




<?php
	$this->load->view("_lib/lib.footer.php");
?>
