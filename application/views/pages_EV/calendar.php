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
?>
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo $this->lang->line('airlines_title'); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('membersarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('airlines_system'); ?></a></li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = <?php echo json_encode($data) ?>;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',
            locale: 'es',
            headerToolbar: {
                start: 'prev,next',
                center: 'title',
                end: 'today,dayGridMonth,listWeek'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Dia',
                list: 'Lista'
            },
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events,
            /*events: [
                {
                    title: 'Manual Test',
                    start: '2020-08-14',
                    end: '2020-08-16',
                    description: 'Descripcion manual'
                }
            ],*/
            eventClick: function(info) {
                $('#tituloEvento').html(info.event.title);
                var FechaCompleta = info.event.startStr;
                //console.log(FechaCompleta);
                var Start = FechaCompleta.split("T");
                $('#txtStart').val(Start[0]);
                $('#TimeStart').val(Start[1]);
                var EndCompleto = info.event.endStr;
                console.log(info.event.endStr);
                var End = EndCompleto.split("T");
                $('#txtEnd').val(End[0]);
                $('#TimeEnd').val(End[1]);
                $('#txtDescription').val(info.event.extendedProps.description);
                $('#img').attr('src', info.event.extendedProps.img);
                $('#foro').attr('href', info.event.extendedProps.foro);
                Metro.dialog.open('#click');

            }
        });

        calendar.render();
    });
</script>
<style>
    #calendar {
        max-width: 1100px;
        margin: 3 auto;
    }
</style>
<!-- Dialog Eventclick -->
<div class="dialog" data-role="dialog" id="click">
    <div class="dialog-title text-center" id="tituloEvento">Event 1</div>
    <div class="dialog-content">
        <div class="grid">
            <div class="row">
                <div class="cell d-flex flex-justify-center">
                    <img id="img" src="https://ve.ivao.aero/images/Banner/img4.png" width="350px" height="150px">
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('event_startd'); ?></label>
                        <input type="text" class="fg-black" id="txtStart" disabled>
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('event_startt'); ?></label>
                        <input type="text" class="fg-black" id="TimeStart" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('event_endd'); ?></label>
                        <input type="text" class="fg-black" id="txtEnd" disabled>
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('event_endt'); ?></label>
                        <input type="text" class="fg-black" id="TimeEnd" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('event_des'); ?></label>
                        <input type="text" class="fg-black" id="txtDescription" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog-actions">
        <a id="foro" href="" class="button primary"><?php echo $this->lang->line('event_forum'); ?></a>
        <button class="button js-dialog-close"><?php echo $this->lang->line('event_close'); ?></button>
    </div>
</div>

<!-- Fin Dialog eventclick -->

<div id='calendar'></div>

<?php
$this->load->view("_lib/lib.footer.php");
?>