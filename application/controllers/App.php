<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index() {
        //Validando el acceso en IVAO
        $xMIEMBRO = $this->myfunctions->valida_API();
        if(!empty($xMIEMBRO->vid)){
            $this->load->helper('url');
            $this->load->view('app_start');
        }
		
	}
}
