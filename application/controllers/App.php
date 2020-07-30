<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
        $this->load->library('MyFunctions');
        $this->load->view('app_start');
	}
}
