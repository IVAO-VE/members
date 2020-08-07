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
<div class="container-fluid start-screen h-100">
        <h1 class="start-screen-title">Start</h1>

        <div class="tiles-area clear">
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">
                <a href="https://github.com/olton/Metro-UI-CSS" data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Github</span>
                    <span class="badge-bottom">30</span>
                </a>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-envelop icon"></span>
                    <span class="branding-bar">Email</span>
                    <span class="badge-bottom">10</span>
                </div>
                <div data-role="tile" class="bg-orange fg-white" data-size="wide">
                    <span class="mif-chrome icon"></span>
                    <span class="branding-bar">Chrome</span>
                </div>
                <div data-role="tile" data-size="small">
                    <span class="mif-apple icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-red fg-white">
                    <span class="mif-bell icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-teal fg-white col-1 row-6">
                    <span class="mif-windows icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-brown fg-white col-2 row-6">
                    <span class="mif-wind icon"></span>
                </div>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-table icon"></span>
                    <span class="branding-bar">Tables</span>
                </div>
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Images">
                <div data-role="tile" data-cover="../../images/me.jpg">
                    <span class="branding-bar">Sergey Pimenov</span>
                </div>
                <div data-role="tile" data-effect="animate-fade" data-effect-duration="1000">
                    <div class="slide" data-cover="../../images/me2.jpg"></div>
                    <div class="slide" data-cover="../../images/me.jpg"></div>
                    <div class="slide" data-cover="../../images/me3.jpg"></div>
                    <span class="branding-bar">Gallery</span>
                </div>
                <div data-role="tile" data-size="wide" data-effect="animate-slide-left">
                    <div class="slide" data-cover="../../images/1.jpg"></div>
                    <div class="slide" data-cover="../../images/2.jpg"></div>
                    <div class="slide" data-cover="../../images/3.jpg"></div>
                    <div class="slide" data-cover="../../images/4.jpg"></div>
                    <div class="slide" data-cover="../../images/5.jpg"></div>
                    <span class="branding-bar">Gallery</span>
                </div>
                <div data-role="tile" data-size="wide" data-effect="image-set">
                    <img src="../../images/jeki_chan.jpg">
                    <img src="../../images/shvarcenegger.jpg">
                    <img src="../../images/vin_d.jpg">
                    <img src="../../images/jolie.jpg">
                    <img src="../../images/jek_vorobey.jpg">
                </div>
            </div>

            <div class="tiles-grid tiles-group size-1 fg-white" data-group-title="Office">
                <div data-role="tile" data-size="small">
                    <img src="../../images/outlook.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-brown">
                    <img src="../../images/word.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-green">
                    <img src="../../images/excel.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-red">
                    <img src="../../images/access.png" class="icon">
                </div>
                <div data-role="tile" data-size="small" class="bg-teal">
                    <img src="../../images/powerpoint.png" class="icon">
                </div>
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Games">
                <div data-role="tile" data-cover="../../images/Battlefield_4_Icon.png">
                    <span class="branding-bar">Battlefield 4</span>
                </div>
                <div data-role="tile" class="bg-green">
                    <img src="../../images/x-box.png" class="icon">
                    <span class="branding-bar">XBOX ONE</span>
                </div>
                <div data-role="tile" data-size="wide" data-cover="../../images/x-box.png">
                    <span class="branding-bar">XBOX LIVE</span>
                    <span class="badge-top">5</span>
                </div>
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">
                <a href="https://github.com/olton/Metro-UI-CSS" data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Github</span>
                    <span class="badge-bottom">30</span>
                </a>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-envelop icon"></span>
                    <span class="branding-bar">Email</span>
                    <span class="badge-bottom">10</span>
                </div>
                <div data-role="tile" class="bg-orange fg-white" data-size="wide">
                    <span class="mif-chrome icon"></span>
                    <span class="branding-bar">Chrome</span>
                </div>
                <div data-role="tile" data-size="small">
                    <span class="mif-apple icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-red fg-white">
                    <span class="mif-bell icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-teal fg-white col-1 row-6">
                    <span class="mif-windows icon"></span>
                </div>
                <div data-role="tile" data-size="small" class="bg-brown fg-white col-2 row-6">
                    <span class="mif-wind icon"></span>
                </div>
                <div data-role="tile" class="bg-cyan fg-white">
                    <span class="mif-table icon"></span>
                    <span class="branding-bar">Tables</span>
                </div>
            </div>
        </div>
</div>
<?php
	$this->load->view("_lib/lib.footer.php");
?>
