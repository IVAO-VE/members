<?php
/**
 * @autor Rixio Iguarán y Simón Cardona.
 * @Departamento Sistemas y Webmaster
 * @Licencia Exclusivo sistemas IVAO.AERO
 * @Licencia División Venezuela.
 * @Correo ve-web@ivao.aero
 * 
 * NNNOOOOOTTTAAAAAA IMPORTANTE
 * Es estrictamente mandatorio generar las variables en los mismos numeros de linea para todos los archivos de lenguaje
 * Es decir; los archivos de lenguajes deben de mantener integridad de valiables por numero de línea. 
 **/

    //Asegurando el acceso directo al script
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');

//Traducciones para Perfil
$lang['connected'] = 'conectado';
$lang['online'] = 'en línea';
$lang['perfilmember'] = 'Datos del perfil';
$lang['membersarea'] = 'Área de miembros';
$lang['range_FL'] = 'Rango piloto';
$lang['range_CL'] = 'Rango controlador';
$lang['logout'] = 'Cerrar sesión';
$lang['profile'] = 'Perfil';
$lang['hours'] = 'Horas totales';
$lang['fullhours'] = 'Numero total de horas de vuelo y control';
$lang['about'] = 'Sobre';
$lang['ginfo'] = 'Información general';
$lang['country'] = 'Pais';
$lang['division'] = 'Division';
$lang['flights'] = 'Vuelos';
$lang['radars'] = 'Radares';
$lang['callsing'] = 'Callsing';
$lang['type'] = 'Reglas';
$lang['from'] = 'Origen';
$lang['to'] = 'Destino';
$lang['server'] = 'Servidor';
$lang['transponder'] = 'Transponder';

//Traducciones para MENU
$lang['renderpage'] = 'Página generada en';
$lang['seconds'] = 'segundos';
$lang['selectlang'] = 'Idioma';
$lang['lang_ES'] = 'Español';
$lang['lang_EN'] = 'Ingles';
$lang['menutitle'] = 'OPCIONES DE NAVEGACIÓN';
$lang['dpto00'] = 'Estado general';
$lang['dpto01'] = 'Dirección HQ';
$lang['dpto02'] = 'Operaciones de vuelo';
$lang['dpto02_VAS'] = 'Aerolineas virtuales';
$lang['dpto02_CHR'] = 'Cartas de navegación';
$lang['dpto02_MET'] = 'Sistema meteorológico';
$lang['dpto02_INF'] = 'Información aeronautica';
$lang['dpto02_VSC'] = 'Escenarios virtuales';
$lang['dpto02_NTM'] = 'Notams';
$lang['dpto03'] = 'Operaciones de control';
$lang['dpto03_SEC'] = 'Archivos de sector';
$lang['dpto03_TSP'] = 'Códigos transponders';
$lang['dpto03_GCA'] = 'Controladores invitados';
$lang['dpto03_FRA'] = 'Factivilidad de rangos';
$lang['dpto04'] = 'Operaciones especiales';
$lang['dpto05'] = 'Entrenamiento';
$lang['dpto05_DOC'] = 'Documentos de entrenamiento';
$lang['dpto06'] = 'Miembros y afiliación';
$lang['dpto07'] = 'Eventos';
$lang['dpto07_CAL'] = 'Calendario de eventos';
$lang['dpto08'] = 'Relaciones públicas';
$lang['dpto08_FOR'] = 'Foros de Venezuela';
$lang['dpto08_FAC'] = 'Social Facebook';
$lang['dpto08_INS'] = 'Social Instagram';
$lang['dpto08_TWI'] = 'Social Twitter';
$lang['dpto08_YOU'] = 'Social Youtube';
$lang['dpto08_DIS'] = 'Voz via Discord';
$lang['dpto09'] = 'Sistemas y web';
$lang['dpto09_SUP'] = 'Solicitud de ayuda';
$lang['dpto10'] = 'FIR'; 
$lang['staff'] = 'Staff';

//Opciones del STAFF
$lang['staff_title'] = 'OPCIONES DE ADMINISTRÁCION';
$lang['staff_dpto01_index'] = 'Opciones de administración para HQ';
$lang['staff_dpto02_index'] = 'Opciones de administración para operaciones de vuelo';
$lang['staff_dpto03_index'] = 'Opciones de administración para operaciones de control';
$lang['staff_dpto04_index'] = 'Opciones de administración para operaciones especiales';
$lang['staff_dpto05_index'] = 'Opciones de administración para entrenamiento';
$lang['staff_dpto06_index'] = 'Opciones de administración para miembros y afiliación';
$lang['staff_dpto07_index'] = 'Opciones de administración para eventos';
$lang['staff_dpto08_index'] = 'Opciones de administración para relaciones públicas';
$lang['staff_dpto09_index'] = 'Opciones de administración para sistemas y web';
$lang['staff_dpto10_index'] = 'Opciones de administración para FIR'; 
$lang['staff_HQ_0001'] = 'Niveles de acceso';
$lang['staffarea'] = 'Área administrativa'; 
$lang['staf_option'] = 'Gestionar '; 


//Traducciones del contenido principal
$lang['mainpage'] = 'Zona de miembros';
$lang['mainversion'] = 'Versión v2.0';
$lang['main_tflight'] = 'Tiempo estimado de vuelo';
$lang['main_tcontrol'] = 'Tiempo estimado de control';
$lang['main_country'] = 'Registrado en';
$lang['main_division'] = 'Tú división';
$lang['main_reportFL'] = 'Reportar un vuelo';
$lang['main_activityFL'] = 'Actividad de tus vuelos';
$lang['main_reportCT'] = 'Reportar control';
$lang['main_activityCT'] = 'Actividad de tus controles';    
$lang['main_activityG'] = 'Actividades venezolanas registradas';
$lang['main_lastaccess'] = 'Último acceso';
$lang['main_DATE'] = 'El día';
$lang['main_IP'] = 'IP';
$lang['main_NODATA'] = 'Sin información de acceso';

//Virtual airlines
$lang['airlines_title'] = 'Aerolineas virtuales';
$lang['airlines_system'] = 'VA systems';

//Charts
$lang['charts_title'] = 'Cartas de navegación';
$lang['charts_system'] = 'Cartas';
$lang['charts_IFR'] = 'Cartas de navegación por instrumentos';
$lang['charts_VFR'] = 'Cartas de navegación visual';

//Meteorologic
$lang['meteorologic_title'] = 'Información meteorológica';
$lang['meteorologic_system'] = 'Metars';
$lang['meteorologic_CAR'] = 'Satelite Infrarojo CAR';
$lang['meteorologic_WX'] = 'Gráfico WX de superficie tropical';
$lang['meteorologic_SAM'] = 'Satelite Infrarojo SAM';
$lang['meteorologic_WIND'] = 'Viento interactivo';
$lang['meteorologic_PRES'] = 'Presión atmosférica';

//Information
$lang['information_title'] = 'Información general';
$lang['information_system'] = 'Información';

//Virtual sceneries
$lang['sceneries_title'] = 'Escenarios virtuales';
$lang['sceneries_system'] = 'Escenarios venezolanos';
$lang['sceneries_download'] = 'Descargar escenario';

//Notams
$lang['notams_title'] = 'Notams';
$lang['notams_system'] = 'Notams';

//Sector files
$lang['sectors_title'] = 'Archivos de sector';
$lang['sectors_system'] = 'Personalizar sectores';

//Transponders codes
$lang['transponders_title'] = 'Códigos transponders';
$lang['transponders_system'] = 'Modo C';

//Guest controllers
$lang['guests_title'] = 'Controladores invitados';
$lang['guests_system'] = 'Control extranjero';

//Facility ratings
$lang['facility_title'] = 'Asignaciones de factivilidades';
$lang['facility_system'] = 'Accesos FRA';

//Discord
$lang['discord_title'] = 'Servidor de voz discord (Venezuela)';
$lang['discord_system'] = 'Discord';

//Training
$lang['training_title'] = 'Documentos de entrenamiento';
$lang['training_system'] = 'Entrenamientos';

//Support tickets
$lang['support_title'] = 'Solicitudes de ayuda';
$lang['support_system'] = 'Ayuda';

//Eventos
$lang['event_startd'] = 'Fecha inicio';
$lang['event_startt'] = 'Hora inicio';
$lang['event_endd'] = 'Fecha final';
$lang['event_endt'] = 'Hora final';
$lang['event_des'] = 'Descripción';
$lang['event_close'] = 'Cerrar';
$lang['event_forum'] = 'Foro';

?>