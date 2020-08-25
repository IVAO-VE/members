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

//Perfil traslator
$lang['connected'] = 'connected';
$lang['online'] = 'online';
$lang['perfilmember'] = 'Perfil data';
$lang['membersarea'] = 'Members area';
$lang['range_FL'] = 'Flight range';
$lang['range_CL'] = 'Controller range';
$lang['logout'] = 'Logout';
$lang['profile'] = 'Profile';
$lang['hours'] = 'Total hours';
$lang['fullhours'] = 'Total number of flight and control hours';
$lang['about'] = 'About';
$lang['ginfo'] = 'General information';
$lang['country'] = 'Country';
$lang['division'] = 'Division';
$lang['flights'] = 'Flights';
$lang['radars'] = 'Radars';
$lang['callsing'] = 'Callsing';
$lang['type'] = 'Type';
$lang['from'] = 'From';
$lang['to'] = 'To';
$lang['server'] = 'Server';
$lang['transponder'] = 'Transponder';

//Menu traslators
$lang['renderpage'] = 'Page rendered in';
$lang['seconds'] = 'seconds';
$lang['selectlang'] = 'Languaje';
$lang['lang_ES'] = 'Spanish';
$lang['lang_EN'] = 'English';
$lang['menutitle'] = 'MAIN NAVIGATION';
$lang['dpto00'] = 'General status';
$lang['dpto01'] = 'Directive HQ';
$lang['dpto02'] = 'Flight operations';
$lang['dpto02_VAS'] = 'Virtual airlines';
$lang['dpto02_CHR'] = 'Navigation charts';
$lang['dpto02_MET'] = 'Meteorologic systems';
$lang['dpto02_INF'] = 'Aeronautic information';
$lang['dpto02_VSC'] = 'Virtual sceneries';
$lang['dpto02_NTM'] = 'Notams';
$lang['dpto03'] = 'Controller operations';
$lang['dpto03_SEC'] = 'Sector files';
$lang['dpto03_TSP'] = 'Transponders codes';
$lang['dpto03_GCA'] = 'Guest controllers';
$lang['dpto03_FRA'] = 'Facility ratings';
$lang['dpto04'] = 'Special operations';
$lang['dpto05'] = 'Training';
$lang['dpto05_DOC'] = 'Training documents';
$lang['dpto06'] = 'Members and affiliation';
$lang['dpto07'] = 'Events';
$lang['dpto07_CAL'] = 'Events calendar';
$lang['dpto08'] = 'Public relations';
$lang['dpto08_FOR'] = 'Venezuelan forums';
$lang['dpto08_FAC'] = 'Social Facebook';
$lang['dpto08_INS'] = 'Social Instagram';
$lang['dpto08_TWI'] = 'Social Twitter';
$lang['dpto08_YOU'] = 'Social Youtube';
$lang['dpto08_DIS'] = 'Voice for Discord';
$lang['dpto09'] = 'Web and systems';
$lang['dpto09_SUP'] = 'Support request';
$lang['dpto10'] = 'FIR'; 
$lang['staff'] = 'Staff';

//Only STAFF
$lang['staff_title'] = 'STAFF OPERATIONS';
$lang['staff_dpto01_index'] = 'Staff options for HQ';
$lang['staff_dpto02_index'] = 'Staff options for flight operations';
$lang['staff_dpto03_index'] = 'Staff options for controller operations';
$lang['staff_dpto04_index'] = 'Staff options for special operations';
$lang['staff_dpto05_index'] = 'Staff options for training';
$lang['staff_dpto06_index'] = 'Staff options for members and affiliation';
$lang['staff_dpto07_index'] = 'Staff options for events';
$lang['staff_dpto08_index'] = 'Staff options for public relations';
$lang['staff_dpto09_index'] = 'Staff options for web and systems';
$lang['staff_dpto10_index'] = 'Staff options for FIR';
$lang['staff_HQ_0001'] = 'Access levels'; 

//Main conten traslator
$lang['mainpage'] = 'Members zone';
$lang['mainversion'] = 'Version v2.0';
$lang['main_tflight'] = 'Flight estimated time';
$lang['main_tcontrol'] = 'Controller estimated time';
$lang['main_country'] = 'Registred in';
$lang['main_division'] = 'Your division';
$lang['main_reportFL'] = 'Flight report';
$lang['main_activityFL'] = 'Your flight activities';
$lang['main_reportCT'] = 'ATC report';
$lang['main_activityCT'] = 'Your atc activities';
$lang['main_activityG'] = 'Venezuelan activities register';
$lang['main_lastaccess'] = 'Last access';
$lang['main_DATE'] = 'Date';
$lang['main_IP'] = 'IP';
$lang['main_NODATA'] = 'Out of login information';


//Virtual airlines
$lang['airlines_title'] = 'Virtual airlines';
$lang['airlines_system'] = 'VA systems';

//Charts
$lang['charts_title'] = 'Navigation charts';
$lang['charts_system'] = 'Charts';
$lang['charts_IFR'] = 'Instrument navigation charts';
$lang['charts_VFR'] = 'Visual navigation charts';

//Meteorologic
$lang['meteorologic_title'] = 'Meteorologic information';
$lang['meteorologic_system'] = 'Metars';
$lang['meteorologic_CAR'] = 'Infrared Satellite CAR';
$lang['meteorologic_WX'] = 'Tropical Surface WX chart';
$lang['meteorologic_SAM'] = 'Infrared Satellite SAM';
$lang['meteorologic_WIND'] = 'Interactive winds';
$lang['meteorologic_PRES'] = 'Atmospheric pressure';

//Information
$lang['information_title'] = 'General information';
$lang['information_system'] = 'Information';

//Virtual sceneries
$lang['sceneries_title'] = 'Virtual sceneries';
$lang['sceneries_system'] = 'Venezuelans sceneries';
$lang['sceneries_download'] = 'Download scenery';

//Notams
$lang['notams_title'] = 'Notams';
$lang['notams_system'] = 'Notams';

//Sector files
$lang['sectors_title'] = 'Sectors files';
$lang['sectors_system'] = 'Profiles sectors';

//Transponders codes
$lang['transponders_title'] = 'Transponders codes';
$lang['transponders_system'] = 'C mode systems';

//Guest controllers
$lang['guests_title'] = 'Guests approvals controllers';
$lang['guests_system'] = 'Foreigner controllers';

//Facility ratings
$lang['facility_title'] = 'Facility rating assignments';
$lang['facility_system'] = 'FRAs access';

//Discord
$lang['discord_title'] = 'Venezuelan discord voice server';
$lang['discord_system'] = 'Discord';

//Training
$lang['training_title'] = 'Training documents';
$lang['training_system'] = 'Training';

//Support tickets
$lang['support_title'] = 'Support tickets';
$lang['support_system'] = 'Help';

?>