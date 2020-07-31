<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{

        $MyUSER = array($this->myfunctions->valida_API());
        if($MyUSER['firstname'] != ''){
            $this->load->helper('url');
            $this->load->view('app_start');
        }
		
	}
}
