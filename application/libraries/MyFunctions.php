<?php
/**
 * @autor Rixio Iguarán y Simón Cardona.
 * @Licencia Exclusivo sistemas IVAO.AERO
 * Descripción general:
 *   Biblioteca de funciones generales para la aplicación.
 **/
defined('BASEPATH') OR exit('No direct script access allowed');

class MyFunctions {

    /** ***************************************************************************************************************************** **/
    /*public function valida_API($url_GOTO = null){
        auditar("Sistema validando la sesión API, Redirect to: ".$url_GOTO);
        define('cookie_name', 'ivao_token');
        define('login_url', 'http://login.ivao.aero/index.php');
        define('api_url', 'http://login.ivao.aero/api.php');
        define('url', get_HOSTPROTOCOL().$url_GOTO);
        
        function redirect() {
        	setcookie(cookie_name, '', time()-3600);
        	header('Location: '.login_url.'?url='.url);
        	exit;
        }
    
        $ref = 'https://ve.ivao.aero';
        
        if($_GET['IVAOTOKEN'] && $_GET['IVAOTOKEN'] !== 'error') {
        	//Generando la cookie
            setcookie(cookie_name, $_GET['IVAOTOKEN'], time()+3600);
            //Generando las variables de entorno de usuario
            auditar("Asignando las variables de sesión.");
            $this->session->set_userdata('SES-VID', $_SESSION['SES-WEB']['vid']);
            $this->session->set_userdata('SES-FIRSTNAME', $_SESSION['SES-WEB']['firstname']);
            /*$lastname       = $_SESSION['SES-WEB']['lastname'];
            $this->session->set_userdata('some_name', 'some_value');
            $rating         = $_SESSION['SES-WEB']['rating'];
            $this->session->set_userdata('some_name', 'some_value');
            $ratingatc      = $_SESSION['SES-WEB']['ratingatc'];
            $this->session->set_userdata('some_name', 'some_value');
            $ratingpilot    = $_SESSION['SES-WEB']['ratingpilot'];
            $this->session->set_userdata('some_name', 'some_value');
            $country        = $_SESSION['SES-WEB']['country'];
            $this->session->set_userdata('some_name', 'some_value');
            $division       = $_SESSION['SES-WEB']['division'];
            $this->session->set_userdata('some_name', 'some_value');
            $img            = 've.jpg';
            $_SESSION['IVAOTOKEN'] = $_GET['IVAOTOKEN'];
            $this->session->set_userdata('some_name', 'some_value'); */
            //Validando redirección a otra página
           /* if($url_GOTO){
               auditar("Redirigiendo a: ".url);
        	   header('Location: '.url);
            }
        	exit;
        } elseif($_GET['IVAOTOKEN'] == 'error') {
        	die('This domain is not allowed to use the Login API! Contact the System Adminstrator!');
            auditar("ERROR API: This domain is not allowed to use the Login API! Contact the System Adminstrator!");
        }
        
        if($_COOKIE[cookie_name]) {
        	$user_array = json_decode(file_get_contents(api_url.'?type=json&token='.$_COOKIE[cookie_name]));
        	if($user_array->result) {
                foreach($user_array as $key => $data){
                    $_SESSION['SES-WEB'][$key] = $data;
    			}
        	}else{
        		session_destroy();
        		redirect_login($ref);
        		exit;
            }
        } else {
            redirect($ref);
        }
       
    }*/
    /** ***************************************************************************************************************************** **/
   public function auditar($texto){
        $strLOG = '';
        $filename = "auditoria [".date('d.m.Y')."].log";
        $dataFile = fopen($_SERVER['DOCUMENT_ROOT']."/logs/".$filename, "a+");
        $dia = date("d");
        $mes = date("m");
        $anno = date("Y");
        $hora = date("H");
        $minuto = date("i");
        $segundo = date("s");
        $tiempo = "\n".$dia."/".$mes."/".$anno." ".$hora.":".$minuto.":".$segundo;
    
        if($dataFile){
            $strLOG =   str_pad($tiempo, 19, " ", STR_PAD_BOTH)." | ".
                        str_pad(get_cliente_ip(), 15, " ", STR_PAD_BOTH)." | ".
                        str_pad(basename($_SERVER['PHP_SELF'], ".php"), 17, " ", STR_PAD_RIGHT)." | ".
                        utf8_decode($texto);
                    
            fwrite($dataFile, $strLOG);
            fclose($dataFile);
        }
    }
    /** ***************************************************************************************************************************** **/
    public function tes_x(){
        redirect(base_url('login'));
    }
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
    /** ***************************************************************************************************************************** **/
}

?>