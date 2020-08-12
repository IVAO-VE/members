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
            eventClick: function(info) {
                    Metro.dialog.create({
                        title: info.event.title,
                        content: info.event.start,
                        actions: [{
                                caption: "Agree",
                                cls: "js-dialog-close alert",
                                onclick: function() {
                                    alert("You clicked Agree action");
                                }
                            },
                            {
                                caption: "Disagree",
                                cls: "js-dialog-close",
                                onclick: function() {
                                    alert("You clicked Disagree action");
                                }
                            }
                        ]
                    });
                
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

<div id='calendar'></div>


<?php
$this->load->view("_lib/lib.footer.php");
?>