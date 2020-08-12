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
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            //events: 'https://ve.ivao.aero/staff/event.php'
            //events:[{"id":"1","title":"Testing","start":"2020-08-13"}]
            eventSources: [{
                events: function() {
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/getEvents',
                        dataType: 'json',
                        data: {
                            // our hypothetical feed requires UNIX timestamps
                            start: start.unix(),
                            end: end.unix()
                        },
                        success: function(msg) {
                            var events = msg.events;
                            callback(events);
                        }
                    });
                }
            }, ]
        });

        calendar.render();
    });
</script>
<style>
    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
</style>

<div id='calendar'></div>


<?php
$this->load->view("_lib/lib.footer.php");
?>