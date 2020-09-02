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
        <h3 class="dashboard-section-title text-center text-left-md w-100">Administración de eventos</br><small>Versión v2.0</small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link">Área de miembros</a></li>
            <li class="page-item"><a href="" class="page-link">Operaciones de eventos</a></li>
            <li class="page-item"><a href="" class="page-link">Administración de eventos</a></li>
        </ul>
    </div>
</div>
<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto01_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#permisos">Calendario</a></li>
                <li><a href="#profile-activity">Administrador de eventos</a></li>
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Projects</a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="calendar">
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
                            }

                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                timeZone: 'UTC',
                                locale: 'es',
                                selectable: true,
                                customButtons: {
                                    EventAdmin: {
                                        text: 'Administrador Eventos',
                                        click: function() {
                                            window.location.href = "<?php echo base_url('staff/Events') ?>";
                                        }
                                    }
                                },
                                headerToolbar: {
                                    start: 'prev,next',
                                    center: 'title',
                                    end: 'EventAdmin,today,dayGridMonth,listWeek'
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
                                    LimpiarForm();
                                    $('#tituloDate').html(info.event.title);
                                    $('#txtTitle').val(info.event.title);
                                    $('#eventID').val(info.event.extendedProps.event);
                                    $('#id').val(info.event.extendedProps.event);
                                    var FechaCompleta = info.event.startStr;
                                    //console.log(FechaCompleta);
                                    var Start = FechaCompleta.split("T");
                                    $('#txtStart').val(Start[0]);
                                    $('#TimeStart').val(Start[1]);
                                    var EndCompleto = info.event.endStr;
                                    var End = EndCompleto.split("T");
                                    $('#txtEnd').val(End[0]);
                                    $('#TimeEnd').val(End[1]);
                                    $('#txtDescription').val(info.event.extendedProps.description);
                                    $('#img').attr('src', info.event.extendedProps.img);
                                    $('#foro').attr('href', info.event.extendedProps.foro);
                                    $('#URLimg').val(info.event.extendedProps.img);
                                    $('#URLforo').val(info.event.extendedProps.foro);
                                    Metro.dialog.open('#click');

                                },
                                dateClick: function(info) {
                                    LimpiarForm();
                                    $('#txtStart').prop('disabled', true);
                                    $('#start').val(info.dateStr);
                                    $('#end').val(info.dateStr);
                                    $('#tituloDates').html(info.dateStr);
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
                                        <img id="img" src="https://ve.ivao.aero/images/Banner/img4.png" width="350px" height="150px" style="display: block;">
                                    </div>
                                    <input type="hidden" id="id" name="id" readonly>
                                </div>
                                <div class="row">
                                    <div class="cell">
                                        <label>Titulo</label>
                                        <input type="text" name="txtTitle" id="txtTitle" class="fg-black">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Fecha inicio</label>
                                            <input type="text" class="fg-black" name="txtStart" id="txtStart">
                                        </div>
                                    </div>
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Hora inicio</label>
                                            <input type="text" name="TimeStart" id="TimeStart" class="fg-black">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell-6">
                                            <div class="form-group">
                                                <label>Fecha final</label>
                                                <input type="text" class="fg-black" name="txtEnd" id="txtEnd">
                                            </div>
                                        </div>
                                        <div class="cell-6">
                                            <div class="form-group">
                                                <label>Hora final</label>
                                                <input type="text" name="TimeEnd" id="TimeEnd" class="fg-black">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell">
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <input type="text" class="fg-black" name="txtDescription" id="txtDescription">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Url Imagen</label>
                                            <input id="URLimg" name="URLimg" class="fg-black" type="text">
                                        </div>
                                    </div>
                                    <div class="cell-6">
                                        <div class="form-group">
                                            <label>Url Foro</label>
                                            <input type="text" class="fg-black" name="URLforo" id="URLforo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dialog-actions">
                            <div class="gird">
                                <div class="row">
                                    <input type="submit" id="btnModificar" value="Modificar" class="button primary">
                                    <?php echo form_close() ?>
                                    <?php echo form_open('staff/EVdelete') ?>
                                    <input type="hidden" id="eventID" name="eventID" readonly>
                                    <input type="submit" value="Eliminar" class="button alert">
                                    <?php echo form_close() ?>
                                    <button class="button js-dialog-close">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Dialog eventclick -->

                    <!-- Inicio Dialog DateClick -->
                    <div class="dialog" data-role="dialog" id="date">
                        <div class="dialog-title text-center" id="tituloDates">Nuevo evento</div>
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
                                        <input type="text" data-role="calendarpicker" id="end" name="end" class="fg-black">
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
                                <div class="row">
                                    <div class="cell-4">
                                        <input type="checkbox" name="noticia" data-role="switch" data-caption="Noticia">
                                    </div>
                                    <div class="cell-4">
                                        <input type="checkbox" name="reportable" value="1" data-role="switch" data-caption="Reportable">
                                    </div>
                                    <div class="cell-4">
                                        <input type="checkbox" name="publico" data-role="switch" data-caption="Publico">
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
                    <div class="bg-white p-4">
                        <div id='calendar'></div>
                    </div>
                </div>
                <div id="admin">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="bg-white p-4">
    <?php if ($this->session->flashdata('info')) : ?>
        <div class="remark primary">
            <?php echo $this->session->flashdata('info'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="remark primary">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <div class="gird">
        <div class="row">
            <div class="cell-11"></div>
            <div class="cell-1">
                <a href="<?php echo base_url('staff/EVcalendar') ?>" class="button success">Calendario</a>
            </div>
        </div>
    </div>
    <table class="table striped" data-role="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Inicio</th>
                <th>Reportable</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $q = $this->db->get("events");
            if ($q->result() > 0) {
                foreach ($q->result() as $fila) {
            ?>
                    <tr>
                        <td><?php echo $fila->event; ?></td>
                        <td><?php echo $fila->title; ?></td>
                        <td><?php echo $fila->start; ?></td>
                        <td>
                            <?php
                            switch ($fila->reportable) {
                                case '0':
                                    echo '<a href="' . base_url("staff/ReportStatus/" . $fila->event) . '"><span class="mif-not fg-red"></span> No reportable</a>';
                                    break;
                                case '1':
                                    echo '<a href="' . base_url("staff/ReportStatus/" . $fila->event) . '"><span class="mif-checkmark fg-green"></span> Reportable</a>';
                            };
                            ?>
                        </td>
                        <td>
                            <?php
                            switch ($fila->status) {
                                case '0':
                                    echo '<a href="' . base_url("staff/EvStatus/" . $fila->event) . '"><span class="mif-not fg-red"></span> Oculto</a>';
                                    break;
                                case '1':
                                    echo '<a href="' . base_url("staff/EvStatus/" . $fila->event) . '"><span class="mif-checkmark fg-green"></span> Publicado</a>';
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>