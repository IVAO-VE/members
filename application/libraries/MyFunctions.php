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
    function __construct() {
        
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
    public function valida_API($url_GOTO = null){
        if(isset($_GET['IVAOTOKEN'])) {
            if($_GET['IVAOTOKEN'] !== 'error') {
                $cookie= array(
                    'name'   => 'ivao_token',
                    'value'  => $_GET['IVAOTOKEN'],
                    'expire' => time()+3600,
                );                
        	   set_cookie($cookie);
               header('Location: http://members.ve.ivao.aero/');            
        	   exit;
            }else{
                echo 'This domain is not allowed to use the Login API! Contact the System Adminstrator!';
                exit;
            }
        }
        
        $MyCOOKIE = get_cookie('ivao_token');
        if(!empty($MyCOOKIE)) {
        	$user_array = json_decode(file_get_contents('http://login.ivao.aero/api.php?type=json&token='.$_COOKIE['ivao_token']));
        	if($user_array->result) {
                //print_r($user_array);
                return $user_array;
                exit;
        	}else{
            	set_cookie('ivao_token', '', time()-3600);
            	header('Location: http://login.ivao.aero/index.php?url=http://members.ve.ivao.aero/');
            	exit;
            }
        }else{
        	set_cookie('ivao_token', '', time()-3600);
        	header('Location: http://login.ivao.aero/index.php?url=http://members.ve.ivao.aero/');
        	exit;
        }        
    }
    /** ***************************************************************************************************************************** **/
    public function segundos_a_horas($PARAM_segundos) {
        $horas = floor($PARAM_segundos / 3600);
        $minutos = floor(($PARAM_segundos - ($horas * 3600)) / 60);
        $segundos = $PARAM_segundos - ($horas * 3600) - ($minutos * 60);
    
        return $horas . ':' . $minutos . ":" . $segundos;
    }    
    /** ***************************************************************************************************************************** **/
        public function logout(){
                //Verificamos que haya una sesion creada
                if($this->session->userdata('vid')){

                        $arraymember = array(
                                'result',
                                'vid',
                                'firstname',
                                'lastname',
                                'fullname',
                                'member_img',
                                'rating',
                                'ratingatc',
                                'ratingatc_name',
                                'ratingatc_img',
                                'ratingpilot',
                                'ratingpilot_name',
                                'ratingpilot_img',
                                'division_code',
                                'division_name',
                                'country_code',
                                'country_name',
                                'skype',
                                'hours_atc',
                                'hours_pilot',
                                'fullhours',
                                'staff',
                                'va_staff_ids',
                                'va_staff',
                                'va_staff_icaos',
                                'isNpoMember',
                                'va_member_ids',
                                'hq_pilot'
                        );
                        //Eliminamos todos los datos de la sesion
                        $this->session->unset_userdata($arraymember);
                        $this->session->sess_destroy();
                        redirect(base_url());

                }
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
}

?>