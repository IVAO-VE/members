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
defined('BASEPATH') or exit('El acceso directo al c�digo no est� permitido.');

?>
<!DOCTYPE html>
<html lang="en" class=" scrollbar-type-1 sb-cyan">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Metro 4 -->
    <link rel="stylesheet" href="<?php echo base_url('_include/vendors/metro4/css/metro-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('_include/css/index.css'); ?>">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url('_include/fullcalendar/main.css') ?>" />
    <script src="<?php echo base_url('../lib/main.js') ?>"></script>



    <title>IVAO Venezuela | <?php echo $this->lang->line('membersarea'); ?></title>

    <script>
        window.on_page_functions = [];
    </script>
</head>

<body class="m4-cloak h-vh-100">
    <div data-role="navview" data-toggle="#paneToggle" data-expand="xl" data-compact="lg" data-active-state="true">
        <div class="navview-pane">
            <div class="bg-cyan d-flex flex-align-center">
                <button class="pull-button m-0 bg-darkCyan-hover">
                    <span class="mif-menu fg-white"></span>
                </button>
                <h2 class="text-light m-0 fg-white pl-7" style="line-height: 52px">IVAO-VE</h2>
            </div>

            <div class="suggest-box">
                <div class="data-box">
                    <img src="<?php echo $this->session->userdata('member_img'); ?>" class="avatar">
                    <div class="ml-4 avatar-title flex-column">
                        <a href="<?php echo base_url('app/profile') ?>" class="d-block fg-white text-medium no-decor"><span class="reduce-1"><?php echo $this->session->userdata('fullname'); ?></span></a>
                        <p class="m-0"><span class="fg-green mr-2">&#x25cf;</span><span class="text-small"><?php echo $this->session->userdata('vid') . ' : ' . $this->lang->line('online'); ?></span></p>
                    </div>
                </div>
                <img src="<?php echo $this->session->userdata('member_img'); ?>" class="avatar holder ml-2">
            </div>

            <div class="suggest-box">
                <input type="text" data-role="input" data-clear-button="false" data-search-button="true">
                <button class="holder">
                    <span class="mif-search fg-white"></span>
                </button>
            </div>

            <!-- FINAL DEL ENCABESADO -->