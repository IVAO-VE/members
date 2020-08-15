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
        $('#btnNuevo').click(function() {
            RecolectarDatosGUI();
        });

        function RecolectarDatosGUI() {
            NuevoEvento = {
                title: $('#tituloEvento').val();
                start: $('#txtStart').val();
                end: $('#end').val();
            };
        }

        function EnviarInformacion(accion, ObjEvento) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('staff/EVinsert') ?>",
                data: ObjEvento,
                success: function() {
                    calendar.fullCalendar('refetchEvents');
                    alert("Evento agregado correctamente");
                }
            });
        }

        function LimpiarForm() {
            $('#txtStart').val(' ');
            //    $('#txtEnd').val('');
            //    $('#txtDescription').val('');
            //    $('#URLimg').val('');
            //    $('#URLforo').val('');
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
                LimpiarForm();
                $('#tituloEvento').html(info.dateStr);
                Metro.dialog.open('#click');
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
        <a id="btnNuevo" href="" class="button primary">Agregar</a>
        <a id="btnModificar" href="" class="button primary">Modificar</a>
        <a id="btnEliminar" href="" class="button danger">Eliminar</a>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<!-- Fin Dialog eventclick -->

<div id='calendar'></div>

<?php
$this->load->view("_lib/lib.footer.php");
?>