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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = <?php echo json_encode($data) ?>;

        var NuevoEvento;
        //  $('#btnNuevo').click(function() {
        //    RecolectarDatosGUI();
        // EnviarInformacion(NuevoEvento)
        //});

        function RecolectarDatosGUI() {
            NuevoEvento = {
                start: $('#txtStart').val(),
                end: $('#end').val(),
            };
        }

        function LimpiarForm() {
            $('#txtStart').val(' ');
            $('#txtEnd').val(' ');
            $('#txtDescription').val(' ');
            $('#URLimg').val(' ');
            $('#URLforo').val(' ');
            $('#img').hide();
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',
            locale: 'es',
            selectable: true,
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
                $('#id').val(info.event.extendedProps.id);
                $('#txtStart').val(info.event.startStr);
                $('#txtEnd').val(info.event.endStr);
                $('#txtDescription').val(info.event.extendedProps.description);
                $('#img').attr('src', info.event.extendedProps.img);
                $('#foro').attr('href', info.event.extendedProps.foro);
                $('#btnNuevo').hide();
                $('#URLimg').val(info.event.extendedProps.img);
                $('#URLforo').val(info.event.extendedProps.foro);
                Metro.dialog.open('#click');

            },
            dateClick: function(info) {
                $('#btnModificar').hide();
                $('#btnEliminar').hide();
                $('#btnNuevo').show();
                LimpiarForm();
                $('#txtStart').prop('disabled', true);
                $('#start').val(info.dateStr);
                $('#tituloDate').html(info.dateStr);
                Metro.dialog.open('#date');
            },
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
    <div class="dialog-title text-center" id="tituloDate">Event 1</div>
    <div class="dialog-content">
        <?php echo form_open('staff/EVedit') ?>
        <div class="grid">
            <div class="row">
                <div class="cell d-flex flex-justify-center">
                    <img id="img" src="https://ve.ivao.aero/images/Banner/img4.png" width="350px" height="150px">
                </div>
                <input type="hidden" id="id" name="id" readonly>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label>Fecha inicio</label>
                        <input type="text" class="fg-black" id="txtStart">
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label>Fecha final</label>
                        <input type="text" class="fg-black" id="txtEnd">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="fg-black" id="txtDescription">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label>Url Imagen</label>
                        <input id="URLimg" class="fg-black" type="text">
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label>Url Foro</label>
                        <input type="text" class="fg-black" id="URLforo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog-actions">
        <input type="submit" id="btnModificar" value="Modificar" class="button primary">
        <?php echo form_close() ?>
        <a id="btnEliminar" href="" class="button danger">Eliminar</a>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<!-- Fin Dialog eventclick -->

<!-- Inicio Dialog DateClick -->
<div class="dialog" data-role="dialog" id="date">
    <div class="dialog-title text-center" id="tituloDate">Event 1</div>
    <div class="dialog-content">
        <?php echo form_open(base_url('staff/EVinsert')) ?>
        <div class="grid">
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label>Titulo evento</label>
                        <input type="text" name="title" class="fg-black" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label>Fecha inicio</label>
                        <input type="text" class="fg-black" data-role="calendarpicker" id="start" name="start" required>
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label>Hora inicio</label>
                        <input class="fg-black" data-role="timepicker" data-value="0" name="startTime">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <label>Fecha final</label>
                    <input type="text" data-role="calendarpicker" name="end" class="fg-black">
                </div>
                <div class="cell-6">
                    <label>Hora final</label>
                    <input class="fg-black" data-role="timepicker" data-value="0" name="endTime">
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="fg-black" name="Description" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="form-group">
                        <label>Url Imagen</label>
                        <input name="img" class="fg-black" type="text">
                    </div>
                </div>
                <div class="cell-6">
                    <div class="form-group">
                        <label>Url Foro</label>
                        <input type="text" class="fg-black" name="foro">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog-actions">
        <input type="submit" value="Agregar" class="button primary">
        <?php echo form_close() ?>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>
<!-- Fin Dialog DateClick -->

<div id='calendar'></div>

<?php
$this->load->view("_lib/lib.footer.php");
?>