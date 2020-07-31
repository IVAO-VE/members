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
        if(!empty($xMIEMBRO->vid)){
            //Generando arreglo con datos del miembro detectado
            $arraymember = array(
                    'vid'           => $xMIEMBRO->vid,
                    'firstname'     => utf8_decode($xMIEMBRO->firstname),
                    'lastname'      => utf8_decode($xMIEMBRO->lastname),
                    'fullname'      => utf8_decode($xMIEMBRO->firstname.' '.$xMIEMBRO->lastname)
            );
            //Cargando los datos de sesión
            $this->session->set_userdata($arraymember);
            //Cargando la vista inicial            
            $this->load->view('app_start');
        }
		
	}
}
