<?php
/**
 * @autor Rixio Iguar�n y Sim�n Cardona.
 * @Departamento Sistemas y Webmaster
 * @Licencia Exclusivo sistemas IVAO.AERO
 * @Licencia Divisi�n Venezuela.
 * @Correo ve-web@ivao.aero
 * 
 **/

    //Asegurando el acceso directo al script
    defined('BASEPATH') OR exit('El acceso directo al c�digo no est� permitido.');

?>
        <!-- INICIO DEL MENU DE OPCIONES -->
        <ul class="navview-menu mt-4" id="side-menu">
            <li class="item-header"><?php echo $this->lang->line('menutitle'); ?></li>
            <li>
                <a href="#dashboard">
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
                    <li class="item-header">Pages</li>
                    <li><a href="login.html">
                        <span class="icon"><span class="mif-lock"></span></span>
                        <span class="caption">Login</span>
                    </a></li>
                    <li><a href="register.html">
                        <span class="icon"><span class="mif-user-plus"></span></span>
                        <span class="caption">Register</span>
                    </a></li>
                    <li><a href="lockscreen.html">
                        <span class="icon"><span class="mif-key"></span></span>
                        <span class="caption">Lock screen</span>
                    </a></li>
                    <li><a href="#profile">
                        <span class="icon"><span class="mif-profile"></span></span>
                        <span class="caption">Profile</span>
                    </a></li>
                    <li><a href="preloader.html">
                        <span class="icon"><span class="mif-spinner"></span></span>
                        <span class="caption">Preloader</span>
                    </a></li>
                    <li><a href="404.html">
                        <span class="icon"><span class="mif-cancel"></span></span>
                        <span class="caption">404 Page</span>
                    </a></li>
                    <li><a href="500.html">
                        <span class="icon"><span class="mif-warning"></span></span>
                        <span class="caption">500 Page</span>
                    </a></li>
                    <li><a href="#product-list">
                        <span class="icon"><span class="mif-featured-play-list"></span></span>
                        <span class="caption">Product list</span>
                    </a></li>
                    <li><a href="#product">
                        <span class="icon"><span class="mif-rocket"></span></span>
                        <span class="caption">Product page</span>
                    </a></li>
                    <li><a href="#invoice">
                        <span class="icon"><span class="mif-open-book"></span></span>
                        <span class="caption">Invoice</span>
                    </a></li>
                    <li><a href="#orders">
                        <span class="icon"><span class="mif-table"></span></span>
                        <span class="caption">Orders</span>
                    </a></li>
                    <li><a href="#order-details">
                        <span class="icon"><span class="mif-library"></span></span>
                        <span class="caption">Order details</span>
                    </a></li>
                    <li><a href="#price-table">
                        <span class="icon"><span class="mif-table"></span></span>
                        <span class="caption">Price table</span>
                    </a></li>
                    <li><a href="maintenance.html">
                        <span class="icon"><span class="mif-cogs"></span></span>
                        <span class="caption">Maintenance</span>
                    </a></li>
                    <li><a href="coming-soon.html">
                        <span class="icon"><span class="mif-watch"></span></span>
                        <span class="caption">Coming soon</span>
                    </a></li>
                    <li>
                        <a href="help-center.html">
                            <span class="icon"><span class="mif-help"></span></span>
                            <span class="caption">Help center</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-devices"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto03'); ?></span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">Forms</li>
                    <li><a href="#forms-basic">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Basic elements</span>
                    </a></li>
                    <li><a href="#forms-extended">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Extended elements</span>
                    </a></li>
                    <li><a href="#forms-layouts">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Layouts</span>
                    </a></li>
                    <li><a href="#forms-validating">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Validating</span>
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
                    <li class="item-header">UI Elements</li>
                    <li>
                        <a href="#colors">
                            <span class="icon"><span class="mif-paint"></span></span>
                            <span class="caption">Colors</span>
                        </a>
                    </li>
                    <li><a href="#typography">
                        <span class="icon"><span class="mif-bold"></span></span>
                        <span class="caption">Typography</span>
                    </a></li>
                    <li><a href="#buttons">
                        <span class="icon"><span class="mif-apps"></span></span>
                        <span class="caption">Buttons</span>
                    </a></li>
                    <li><a href="#tabs">
                        <span class="icon"><span class="mif-open-book"></span></span>
                        <span class="caption">Accordion &amp; Tabs</span>
                    </a></li>
                    <li><a href="#tiles">
                        <span class="icon"><span class="mif-dashboard"></span></span>
                        <span class="caption">Tiles</span>
                    </a></li>
                    <li><a href="#treeview">
                        <span class="icon"><span class="mif-tree"></span></span>
                        <span class="caption">TreeView</span>
                    </a></li>
                    <li><a href="#listview">
                        <span class="icon"><span class="mif-list"></span></span>
                        <span class="caption">ListView</span>
                    </a></li>
                    <li><a href="#progress">
                        <span class="icon"><span class="mif-spinner5"></span></span>
                        <span class="caption">Progress & activities</span>
                    </a></li>
                    <li><a href="#list">
                        <span class="icon"><span class="mif-list2"></span></span>
                        <span class="caption">List component</span>
                    </a></li>
                    <li><a href="#splitter">
                        <span class="icon"><span class="mif-table"></span></span>
                        <span class="caption">Splitter</span>
                    </a></li>
                    <li><a href="#calendar">
                        <span class="icon"><span class="mif-calendar"></span></span>
                        <span class="caption">Calendar</span>
                    </a></li>
                    <li><a href="#countdown">
                        <span class="icon"><span class="mif-watch"></span></span>
                        <span class="caption">Countdown</span>
                    </a></li>
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
                    <li class="item-header">Information</li>
                    <li><a href="#windows">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Windows</span>
                    </a></li>
                    <li><a href="#dialogs">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Dialogs</span>
                    </a></li>
                    <li><a href="#info-boxes">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">InfoBox</span>
                    </a></li>
                    <li><a href="#hints">
                        <span class="icon"><span class="mif-spinner2"></span></span>
                        <span class="caption">Hints</span>
                    </a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-envelop"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto08'); ?></span>
                    <span class="badges ml-auto mr-3">
                        <span class="badge inline bg-cyan fg-white">17</span>
                        <span class="badge inline bg-red fg-white">7</span>
                        <span class="badge inline bg-green fg-white">4</span>
                        <span class="badge inline bg-orange fg-white">3</span>
                    </span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li class="item-header">Mailbox</li>
                    <li>
                        <a href="#inbox">
                            <span class="icon"><span class="mif-mail"></span></span>
                            <span class="caption">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="#inbox2">
                            <span class="icon"><span class="mif-mail"></span></span>
                            <span class="caption">Inbox2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#compose">
                            <span class="icon"><span class="mif-mail-read"></span></span>
                            <span class="caption">Compose</span>
                        </a>
                    </li>
                    <li>
                        <a href="#read-email">
                            <span class="icon"><span class="mif-mail-read"></span></span>
                            <span class="caption">Read email</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#chat">
                    <span class="icon"><span class="mif-bubbles"></span></span>
                    <span class="caption"><?php echo $this->lang->line('dpto09'); ?></span>
                    <span class="badges ml-auto mr-3">
                        <span class="badge inline bg-red fg-white">7</span>
                        <span class="badge inline bg-green fg-white">4</span>
                        <span class="badge inline bg-orange fg-white">3</span>
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
                    if($access_nivel['pages_HQ'] == 'true'){ //Tiene acceso a la administración de HQ 
                        echo '
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="mif-brightness-auto fg-red"></span></span>
                                    <span class="caption">'.$this->lang->line('dpto01').'</span>
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
                            <a class="button fg-black mr-1" role="button" href="<?php echo base_url('app/profile') ?>"><?php echo $this->lang->line('profile'); ?></a>
                            <a class="button fg-black ml-1" role="button" href="<?php echo base_url('app/logout') ?>"><?php echo $this->lang->line('logout'); ?></a>
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
