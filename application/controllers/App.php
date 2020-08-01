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
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');


class App extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Cargando la librería de sesiones
        $this->load->library('session');
        //Cargando ayudante de redirecciones
        $this->load->helper('url');
        //Cargando el archivo de idioma correspondiente
        $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if (strtoupper(substr($lang, 0, 2)) == 'ES') { //es_ES, en_US
            $this->lang->load('website', 'spanish');
        }else{
            $this->lang->load('website', 'english');
        }
        
    }

	public function index() {
        //Validando el acceso en IVAO
        $xMIEMBRO = $this->myfunctions->valida_API();
        if(($xMIEMBRO->result == 1) && (!empty($xMIEMBRO->vid))){
            
            //Verificando los permisos de usuario
            $query_permisos  = $this->db->select('*')
                               ->from('permisos')
                               ->where('vid', $xMIEMBRO->vid) //Código de país 
                               ->get();
            $xPermisos = $query_permisos->row_array();
            if($xPermisos['access_HQ'] == false){ //Tiene permisos para access_HQ
                exit('Usted no tiene permisos para acceder a este sitio.');
            }
            
            
            
            
            //Consultado con la DB
            $query  = $this->db->select('*')
                               ->from('paises')
                               ->where('code', $xMIEMBRO->country) //Código de país 
                               ->get();
            $country_name = $query->row_array();
            $query  = $this->db->select('*')
                               ->from('paises')
                               ->where('code', $xMIEMBRO->division) //Código de país 
                               ->get();
            $division_name = $query->row_array(); 
            //Analizando el rango del miembro piloto           
            switch ($xMIEMBRO->ratingpilot){ 
            	case 1: //
                    $pilot_rating = 'Newbie Pilot';
            	break;
            	case 2: //
                    $pilot_rating = 'Basic Flight Student';
            	break;
            	case 3: //
                    $pilot_rating = 'Flight Student';
            	break;
            	case 4: //
                    $pilot_rating = 'Advanced Flight Student';
            	break;
            	case 5: //
                    $pilot_rating = 'Private Pilot';
            	break;
            	case 6: //
                    $pilot_rating = 'Senior Private Pilot';
            	break;
            	case 7: //
                    $pilot_rating = 'Commercial Pilot';
            	break;
            	case 8: //
                    $pilot_rating = 'Airline Transport Pilot';
            	break;
            	case 9: //
                    $pilot_rating = 'Senior Flight Instructor';
            	break;
            	case 10: //
                    $pilot_rating = 'Chief Flight Instructor';
            	break;
            
            }
            $pilot_rating_image = 'https://ivao.aero/data/images/ratings/atc/'.$xMIEMBRO->ratingpilot.'.gif';
            //Analizando el rango del miembro controlador           
            switch ($xMIEMBRO->ratingatc){ 
            	case 1: //
                    $atc_rating = 'Newbie Controller';
            	break;
            	case 2: //
                    $atc_rating = 'ATC Applicant';
            	break;
            	case 3: //
                    $atc_rating = 'ATC Trainee';
            	break;
            	case 4: //
                    $atc_rating = 'Advanced ATC Trainee';
            	break;
            	case 5: //
                    $atc_rating = 'Aerodrome Controller';
            	break;
            	case 6: //
                    $atc_rating = 'Approach Controller';
            	break;
            	case 7: //
                    $atc_rating = 'Center Controller';
            	break;
            	case 8: //
                    $atc_rating = 'Senior Controller';
            	break;
            	case 9: //
                    $atc_rating = 'Senior ATC Instructor';
            	break;
            	case 10: //
                    $atc_rating = 'Chief ATC Instructor';
            	break;
            
            }
            $atc_rating_image = 'https://ivao.aero/data/images/ratings/atc/'.$xMIEMBRO->ratingatc.'.gif';
            
            //Generando arreglo con datos del miembro detectado
            $arraymember = array(
                    'result'            => $xMIEMBRO->result,
                    'vid'               => $xMIEMBRO->vid,
                    'firstname'         => $xMIEMBRO->firstname,
                    'lastname'          => $xMIEMBRO->lastname,
                    'fullname'          => $xMIEMBRO->firstname.' '.$xMIEMBRO->lastname,
                    'rating'            => $xMIEMBRO->rating,
                    'ratingatc'         => $xMIEMBRO->ratingatc,
                    'ratingatc_name'    => $atc_rating,
                    'ratingatc_img'     => $atc_rating_image,
                    'ratingpilot'       => $xMIEMBRO->ratingpilot,
                    'ratingpilot_name'  => $pilot_rating,
                    'ratingpilot_img'   => $pilot_rating_image,
                    'division_code'     => $xMIEMBRO->division,
                    'division_name'     => $division_name['pais'],
                    'country_code'      => $xMIEMBRO->country,
                    'country_name'      => $country_name['pais'],
                    'skype'             => $xMIEMBRO->skype,
                    'hours_atc'         => $xMIEMBRO->hours_atc,
                    'hours_pilot'       => $xMIEMBRO->hours_pilot,
                    'fullhours'         => ($xMIEMBRO->hours_pilot + $xMIEMBRO->hours_atc), //Solo tiempo de vuelo y control ([ OJO ])
                    'staff'             => $xMIEMBRO->staff,
                    'va_staff_ids'      => $xMIEMBRO->va_staff_ids,
                    'va_staff'          => $xMIEMBRO->va_staff,
                    'va_staff_icaos'    => $xMIEMBRO->va_staff_icaos,
                    'isNpoMember'       => $xMIEMBRO->isNpoMember,
                    'va_member_ids'     => $xMIEMBRO->va_member_ids,
                    'hq_pilot'          => $xMIEMBRO->hq_pilot
                    
            );
            
            //print_r($arraymember);
            
            //Cargando los datos de sesión
            $this->session->set_userdata($arraymember);
            //Cargando la vista inicial            
            $this->load->view('app_start');
        }
		
	}
}
