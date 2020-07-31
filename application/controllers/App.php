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
    }

	public function index() {
        //Validando el acceso en IVAO
        $xMIEMBRO = $this->myfunctions->valida_API();
        if(($xMIEMBRO->result == 1) && (!empty($xMIEMBRO->vid))){
            //Consultado con la DB
            $query  = $this->db->select('*')
                               ->from('paises')
                               ->where('code', $xMIEMBRO->country) //Código de país 
                               ->get();
            $country_name = $query->result();            
            $this->phpdebug->debug($country_name); 
            //Generando arreglo con datos del miembro detectado
            $arraymember = array(
                    'result'        => $xMIEMBRO->result,
                    'vid'           => $xMIEMBRO->vid,
                    'firstname'     => utf8_decode($xMIEMBRO->firstname),
                    'lastname'      => utf8_decode($xMIEMBRO->lastname),
                    'fullname'      => utf8_decode($xMIEMBRO->firstname.' '.$xMIEMBRO->lastname),
                    'rating'        => $xMIEMBRO->rating,
                    'ratingatc'     => $xMIEMBRO->ratingatc,
                    'ratingpilot'   => $xMIEMBRO->ratingpilot,
                    'division_code' => $xMIEMBRO->division,
                    'division_name' => $xMIEMBRO->division,
                    'country_code'  => $xMIEMBRO->country,
                    'country_name'  => $xMIEMBRO->country,
                    'skype'         => $xMIEMBRO->skype,
                    'hours_atc'     => $xMIEMBRO->hours_atc,
                    'hours_pilot'   => $xMIEMBRO->hours_pilot,
                    'fullhours'     => ($xMIEMBRO->hours_pilot + $xMIEMBRO->hours_atc),
                    'staff'         => $xMIEMBRO->staff,
                    'va_staff_ids'  => $xMIEMBRO->va_staff_ids,
                    'va_staff'      => $xMIEMBRO->va_staff,
                    'va_staff_icaos'=> $xMIEMBRO->va_staff_icaos,
                    'isNpoMember'   => $xMIEMBRO->isNpoMember,
                    'va_member_ids' => $xMIEMBRO->va_member_ids,
                    'hq_pilot'      => $xMIEMBRO->hq_pilot
                    
            );
            //Cargando los datos de sesión
            $this->session->set_userdata($arraymember);
            //Cargando la vista inicial            
            $this->load->view('app_start');
        }
		
	}
}
