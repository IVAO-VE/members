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

class MyFunctions {

    /** ***************************************************************************************************************************** **/
    public function valida_API($url_GOTO = null){
        $this->auditar("Sistema validando la sesión API, Redirect to: ".$url_GOTO);
        define('cookie_name', 'ivao_token');
        define('login_url', 'http://login.ivao.aero/index.php');
        define('api_url', 'http://login.ivao.aero/api.php');
        define('url', $this->get_HOSTPROTOCOL().$url_GOTO);
        
        $ref = 'https://ve.ivao.aero';
        
        if(isset($_GET['IVAOTOKEN'])) {
            if($_GET['IVAOTOKEN'] !== 'error') {
            	//Generando la cookie
                setcookie(cookie_name, $_GET['IVAOTOKEN'], time()+3600);
                //Generando las variables de entorno de usuario
                $this->auditar("Asignando las variables de sesión.");
                $vid            = $_SESSION['SES-WEB']['vid'];
                //$this->session->set_userdata('SES-VID', $_SESSION['SES-WEB']['vid']);                
                $firstname      = $_SESSION['SES-WEB']['firstname'];
                //$this->session->set_userdata('SES-FIRSTNAME', $_SESSION['SES-WEB']['firstname']);
                $lastname       = $_SESSION['SES-WEB']['lastname'];
                //$this->session->set_userdata('some_name', 'some_value');
                $rating         = $_SESSION['SES-WEB']['rating'];
                //$this->session->set_userdata('some_name', 'some_value');
                $ratingatc      = $_SESSION['SES-WEB']['ratingatc'];
                //$this->session->set_userdata('some_name', 'some_value');
                $ratingpilot    = $_SESSION['SES-WEB']['ratingpilot'];
                //$this->session->set_userdata('some_name', 'some_value');
                $country        = $_SESSION['SES-WEB']['country'];
                //$this->session->set_userdata('some_name', 'some_value');
                $division       = $_SESSION['SES-WEB']['division'];
                //$this->session->set_userdata('some_name', 'some_value');
                $img            = 've.jpg';
                $_SESSION['IVAOTOKEN'] = $_GET['IVAOTOKEN'];
                //$this->session->set_userdata('some_name', 'some_value'); 
                //Validando redirección a otra página
                if($url_GOTO){
                   $this->auditar("Redirigiendo a: ".url);
            	   header('Location: '.url);
                }
            }else{
                echo 'This domain is not allowed to use the Login API! Contact the System Adminstrator!';
                $this->auditar("ERROR API: This domain is not allowed to use the Login API! Contact the System Adminstrator!");
            }
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
            $this->redirect($ref);
        }
       
    }
    /** ***************************************************************************************************************************** **/
   public function auditar($texto){
        $strLOG = '';
        $filename = $_SERVER['DOCUMENT_ROOT']."/logs/auditoria [".date('d.m.Y')."].log";
        //$dataFile = fopen($_SERVER['DOCUMENT_ROOT']."/logs/".$filename, "a+");
        $dia = date("d");
        $mes = date("m");
        $anno = date("Y");
        $hora = date("H");
        $minuto = date("i");
        $segundo = date("s");
        $tiempo = "\n".$dia."/".$mes."/".$anno." ".$hora.":".$minuto.":".$segundo;
        $strLOG =   str_pad($tiempo, 19, " ", STR_PAD_BOTH)." | ".
                    str_pad($this->get_cliente_ip(), 15, " ", STR_PAD_BOTH)." | ".
                    str_pad(basename($_SERVER['PHP_SELF'], ".php"), 17, " ", STR_PAD_RIGHT)." | ".
                    utf8_decode($texto);
    
        if (!write_file($filename, $strLOG)){
                echo 'Imposible auditar';
        }
    }
    /** ***************************************************************************************************************************** **/
    public function get_HOSTPROTOCOL(){
        $MyHOST     = $_SERVER['HTTP_HOST'];
        $MyPROTOCOL = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        return "$MyPROTOCOL://$MyHOST";  
    }
    /** ***************************************************************************************************************************** **/
    public function redirect() {
    	setcookie(cookie_name, '', time()-3600);
    	header('Location: '.login_url.'?url='.url);
    	exit;
    }
    /** ***************************************************************************************************************************** **/
    public function get_cliente_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
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
}

?>