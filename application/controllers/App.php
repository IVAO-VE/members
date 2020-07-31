<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{

        //Validando el acceso en IVAO
        //list($result, $vid, $firstname, $lastname, $rating, $ratingatc, $ratingpilot, $division, $country, $skype, $hours_atc, $hours_pilot, $staff, $va_staff_ids, $va_staff, $va_staff_icaos, $isNpoMember, $va_member_ids, $hq_pilot) = $this->myfunctions->valida_API();
        $xMIEMBRO = $this->myfunctions->valida_API();
        if($xMIEMBRO->vid != '0'){
            $this->load->helper('url');
            $this->load->view('app_start');
        }
		
	}
}
