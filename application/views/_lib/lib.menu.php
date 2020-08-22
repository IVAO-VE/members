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

?>
        <!-- INICIO DEL MENU DE OPCIONES -->
        <ul class="navview-menu mt-4" id="side-menu">
            <li class="item-header"><?php echo $this->lang->line('menutitle'); ?></li>
            <li>
                <a href="/app/index">
                    <span class="icon"><span class="mif-meter"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto00'); ?></span>
                </a>
            </li>
            <li>
                <a href="#widgets">
                    <span class="icon"><span class="mif-widgets"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto01'); ?></span>
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-versions"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto02'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header"><?php echo $this->lang->line('dpto02'); ?></li>
                    <li><a href="/app/airlines">
                        <span class="icon"><span class="mif-airplane"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_VAS'); ?></span>
                    </a></li>
                    <li><a href="/app/charts">
                        <span class="icon"><span class="mif-map"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_CHR'); ?></span>
                    </a></li>
                    <li><a href="/app/meteorologic">
                        <span class="icon"><span class="mif-windy3"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_MET'); ?></span>
                    </a></li>
                    <li><a href="/app/information">
                        <span class="icon"><span class="mif-info"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_INF'); ?></span>
                    </a></li>
                    <li><a href="/app/sceneries">
                        <span class="icon"><span class="mif-file-picture"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_VSC'); ?></span>
                    </a></li>
                    <li><a href="/app/notams">
                        <span class="icon"><span class="mif-infinite"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto02_NTM'); ?></span>
                    </a></li>


                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-devices"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto03'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header"><?php echo $this->lang->line('dpto03'); ?></li>
                    <li><a href="/app/sectors">
                        <span class="icon"><span class="mif-file-text"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto03_SEC'); ?></span>
                    </a></li>
                    <li><a href="/app/transponders">
                        <span class="icon"><span class="mif-qrcode"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto03_TSP'); ?></span>
                    </a></li>
                    <li><a href="/app/guests">
                        <span class="icon"><span class="mif-users"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto03_GCA'); ?></span>
                    </a></li>
                    <li><a href="/app/facilitys">
                        <span class="icon"><span class="mif-calendar"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto03_FRA'); ?></span>
                    </a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-table"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto04'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">Tables</li>
                    <li><a href="#table-classes">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Table classes</span>
                    </a></li>
                    <li><a href="#table-component">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Table component</span>
                    </a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-air"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto05'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header">..</li>
                    <li>
                        <a href="/app/documents">
                            <span class="icon"><span class="mif-paint"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto05_DOC'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-play"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto06'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">Media</li>
                    <li><a href="#video">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Video player</span>
                    </a></li>
                    <li><a href="#audio">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Audio</span>
                    </a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-comment"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto07'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">..</li>
                    <li><a href="/app/calendar">
                        <span class="icon"><span class="mif-calendar"></span></span>
                        <span class="caption"><?php echo $this->lang->line('dpto07_CAL'); ?></span>
                    </a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-users"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto08'); ?></span>
                    <span class="badges ml-auto mr-3">
                        <span class="badge inline bg-cyan fg-white">0</span>
                        <span class="badge inline bg-red fg-white">0</span>
                        <span class="badge inline bg-green fg-white">0</span>
                        <span class="badge inline bg-orange fg-white">0</span>
                    </span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">..</li>
                    <li>
                        <a href="http://ve.forum.ivao.aero/index.php">
                            <span class="icon"><span class="mif-chat"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_FOR'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/IVAOVenezuela/">
                            <span class="icon"><span class="mif-facebook2"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_FAC'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ivaove/">
                            <span class="icon"><span class="mif-instagram"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_INS'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/ivaove">
                            <span class="icon"><span class="mif-twitter"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_TWI'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCqwcrgHWvLdvhuJdVEQBWZQ">
                            <span class="icon"><span class="mif-youtube"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_YOU'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="/app/discord">
                            <span class="icon"><span class="mif-phone-in-talk"></span></span>
                            <span class="caption"><?php echo $this->lang->line('dpto08_DIS'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#chat">
                    <span class="icon"><span class="mif-bubbles"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto09'); ?></span>
                    <span class="badges ml-auto mr-3">
                        <span class="badge inline bg-red fg-white">0</span>
                        <span class="badge inline bg-green fg-white">0</span>
                        <span class="badge inline bg-orange fg-white">0</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-magic-wand"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto10'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">Wizards</li>
                    <li><a href="#master">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Master</span>
                    </a></li>
                    <li><a href="#wizard">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Wizard</span>
                    </a></li>
                </ul>
            </li>

            <li class="item-header"><?php echo $this->lang->line('staff_title'); ?></li>
<?php
                //Consultado con la DB
                $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
                $query_access  = $this->db->select('*')
                    ->from('permisos')
                    ->where('vid', $this->session->userdata('vid')) //VID de usuario 
                    ->get();
                $access_nivel = $query_access->row_array();
                if(!empty($access_nivel)){ //El usuario está registrado en la db de permisos
                    //******************************
                    if($access_nivel['pages_HQ'] == 'true'){ //Tiene acceso a HQ
                        echo '
                            <li>
                                <a href="/staff/HQaccess">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto01').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_FO'] == 'true'){ //Tiene acceso a Operaciones de vuelo
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto02').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_AO'] == 'true'){ //Tiene acceso a Operaciones de control
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto03').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_SO'] == 'true'){ //Tiene acceso a Operaciones especiales
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto04').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_TR'] == 'true'){ //Tiene acceso a Entrenamiento
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto05').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_ME'] == 'true'){ //Tiene acceso a Miembros y afiliación
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto06').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_EV'] == 'true'){ //Tiene acceso a Eventos
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto07').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_PR'] == 'true'){ //Tiene acceso a Relaciones públicas
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto08').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_WE'] == 'true'){ //Tiene acceso a Sistemas y web
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto09').'</span>
                                </a>
                            </li>
                        ';
                    }
                    //******************************
                    if($access_nivel['pages_FR'] == 'true'){ //Tiene acceso a FIR
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">[ '.$this->lang->line('staff').' ] '.$this->lang->line('dpto10').'</span>
                                </a>
                            </li>
                        ';
                    }
                    
                    
                }
?>            
        </ul>

        <div class="w-100 text-center text-small data-box p-2 border-top bd-grayMouse" style="position: absolute; bottom: 0">
            <div>&copy; 2020 <a href="mailto:ve-web@ivao.aero" class="text-muted fg-white-hover no-decor">Webmasters Venezuela</a></div>
            <div><?php echo $this->lang->line('renderpage'); ?> <strong>{elapsed_time}</strong> <?php echo $this->lang->line('seconds'); ?>.</div>
        </div>
    </div>

    <div class="navview-content h-100">
        <div data-role="appbar" class="pos-absolute bg-darkCyan fg-white">

            <a href="#" class="app-bar-item d-block d-none-lg" id="paneToggle"><span class="mif-menu"></span></a>

            <div class="app-bar-container ml-auto">
                <a href="#" class="app-bar-item">
                    <span class="mif-envelop"></span>
                    <span class="badge bg-green fg-white mt-2 mr-1">4</span>
                </a>
                <a href="#" class="app-bar-item">
                    <span class="mif-bell"></span>
                    <span class="badge bg-orange fg-white mt-2 mr-1">10</span>
                </a>
                <a href="#" class="app-bar-item">
                    <span class="mif-flag"></span>
                    <span class="badge bg-red fg-white mt-2 mr-1">9</span>
                </a>
<!--             
                <select onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>><?php echo $this->lang->line('lang_EN'); ?></option>
                    <option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>><?php echo $this->lang->line('lang_ES'); ?></option>
                </select>                              
-->
                
                <div class="app-bar-container">
                    <a href="#" class="app-bar-item">
                        <img src="<?php echo $this->session->userdata('member_img'); ?>" class="avatar">
                        <span class="ml-2 app-bar-name"><?php echo $this->session->userdata('fullname'); ?></span>
                    </a>
                    <div class="user-block shadow-1" data-role="collapse" data-collapsed="true">
                        <div class="bg-darkCyan fg-white p-2 text-center">
                            <img src="<?php echo $this->session->userdata('member_img'); ?>" class="avatar">
                            <div class="h4 mb-0"><?php echo $this->session->userdata('fullname'); ?></div>
                            <div><?php echo $this->session->userdata('ratingpilot_name').'<br>'.$this->session->userdata('ratingatc_name'); ?></div>
                        </div>
                        <div class="bg-white d-flex flex-justify-between flex-equal-items p-2">
                            <button class="button flat-button">Followers</button>
                            <button class="button flat-button">Sales</button>
                            <button class="button flat-button">Friends</button>
                        </div>
                        <div class="bg-white d-flex flex-justify-between flex-equal-items p-2 bg-light">
                            <a class="button fg-black mr-1" role="button" href="/app/profile"><?php echo $this->lang->line('profile'); ?></a>
                            <a class="button fg-black ml-1" role="button" href="/app/logout"><?php echo $this->lang->line('logout'); ?></a>
                        </div>
                    </div>
                </div>
                <a href="#" class="app-bar-item">
                    <span class="mif-cogs"></span>
                </a>
            </div>
        </div>
        <!-- FINAL DEL MENU DE OPCIONES -->

        <!-- INICIO DEL CONTENIDO -->
        <div id="content-wrapper" class="content-inner h-100" style="overflow-y: auto">
