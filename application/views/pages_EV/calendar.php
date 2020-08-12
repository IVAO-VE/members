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
        start:'prev,next',
        center:'title',
        end:'today,listWeek'
    },
    editable: true,
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: 'All Day Event',
        start: '2020-06-01'
      },
      {
        title: 'Long Event',
        start: '2020-06-07',
        end: '2020-06-10'
      },
      {
        groupId: 999,
        title: 'Repeating Event',
        start: '2020-06-09T16:00:00'
      },
      {
        groupId: 999,
        title: 'Repeating Event',
        start: '2020-06-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2020-06-11',
        end: '2020-06-13'
      },
      {
        title: 'Meeting',
        start: '2020-06-12T10:30:00',
        end: '2020-06-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2020-06-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2020-06-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2020-06-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2020-06-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2020-06-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2020-06-28'
      }
    ]
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