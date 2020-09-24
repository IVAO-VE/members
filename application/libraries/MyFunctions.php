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
defined('BASEPATH') or exit('El acceso directo al código no está permitido.');

class MyFunctions
{

    /** ***************************************************************************************************************************** **/
    function __construct()
    {
        //Sección de constantes GLOBALES para todo el sistema
        

    }
    /** ***************************************************************************************************************************** **/
    public function auditar($texto)
    {
        $strLOG = '';
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/logs/auditoria [" . date('d.m.Y') . "].log";
        //$dataFile = fopen($_SERVER['DOCUMENT_ROOT']."/logs/".$filename, "a+");
        $dia = date("d");
        $mes = date("m");
        $anno = date("Y");
        $hora = date("H");
        $minuto = date("i");
        $segundo = date("s");
        $tiempo = "\n" . $dia . "/" . $mes . "/" . $anno . " " . $hora . ":" . $minuto . ":" . $segundo;
        $strLOG =   str_pad($tiempo, 19, " ", STR_PAD_BOTH) . " | " .
            str_pad($this->get_cliente_ip(), 15, " ", STR_PAD_BOTH) . " | " .
            str_pad(basename($_SERVER['PHP_SELF'], ".php"), 17, " ", STR_PAD_RIGHT) . " | " .
            utf8_decode($texto);

        if (!write_file($filename, $strLOG)) {
            echo 'Imposible auditar';
        }
    }
    /** ***************************************************************************************************************************** **/
    public function get_HOSTPROTOCOL()
    {
        $MyHOST     = $_SERVER['HTTP_HOST'];
        $MyPROTOCOL = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        return "$MyPROTOCOL://$MyHOST";
    }
    /** ***************************************************************************************************************************** **/
    public function valida_API($url_GOTO = null)
    {
        
        if (isset($_GET['IVAOTOKEN'])) {
            if ($_GET['IVAOTOKEN'] !== 'error') {
                $cookie = array(
                    'name'   => 'ivao_token',
                    'value'  => $_GET['IVAOTOKEN'],
                    'expire' => time() + 3600,
                );
                set_cookie($cookie);
                header('Location: '.$this->get_HOSTPROTOCOL());
                exit;
            } else {
                if(($this->get_cliente_ip() == "187.189.83.65") || ($this->get_cliente_ip() == "0.0.0.0")){
                    $cookie = array(
                        'name'   => 'ivao_token',
                        'value'  => $_GET['IVAOTOKEN'],
                        'expire' => time() + 3600,
                    );
                    set_cookie($cookie);
                    header('Location: '.$this->get_HOSTPROTOCOL());
                    exit;
                }else{
                    echo 'This domain is not allowed to use the Login API! Contact the System Adminstrator!';
                }
                exit;
            }
        }

        $MyCOOKIE = get_cookie('ivao_token');
        if (!$MyCOOKIE == null) {
            $user_array = json_decode(file_get_contents('http://login.ivao.aero/api.php?type=json&token=' . $_COOKIE['ivao_token']));
            if ($user_array->result) {
                //print_r($user_array);
                return $user_array;
                exit;
            } else {
                //set_cookie('ivao_token', '', time()-3600);
                //delete_cookie('ivao_token');
                unset($_COOKIE['__cfduid']);
                unset($_COOKIE['ivao_token']);
                unset($_COOKIE['ci_session']);
                header('Location: http://login.ivao.aero/index.php?url='.$this->get_HOSTPROTOCOL());
                exit;
            }
        } else {
            //set_cookie('ivao_token', '', time()-3600);
            //delete_cookie('ivao_token');
            unset($_COOKIE['__cfduid']);
            unset($_COOKIE['ivao_token']);
            unset($_COOKIE['ci_session']);
            header('Location: http://login.ivao.aero/index.php?url='.$this->get_HOSTPROTOCOL());
            exit;
        }
    }
    /** ***************************************************************************************************************************** **/
    public function segundos_a_horas($PARAM_segundos)
    {
        $horas = floor($PARAM_segundos / 3600);
        $minutos = floor(($PARAM_segundos - ($horas * 3600)) / 60);
        $segundos = $PARAM_segundos - ($horas * 3600) - ($minutos * 60);

        return $horas . ':' . $minutos . ":" . $segundos;
    }
    /** ***************************************************************************************************************************** **/
    public function get_cliente_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    /** ***************************************************************************************************************************** **/
    public function showNOTIFY($inLOAD, $xTITLE, $xMESSAGE, $xTYPE){
        switch ($xTYPE){ 
            case 1:
                $xTYPE_STR = 'cls: "default"';
            break;
        
            case 2:
                $xTYPE_STR = 'cls: "success"';
            break;
        
            case 3:
                $xTYPE_STR = 'cls: "info"';
            break;

            case 4:
                $xTYPE_STR = 'cls: "alert"';
            break;

            case 5:
                $xTYPE_STR = 'cls: "warning"';
            break;

            
        }
        if($inLOAD == true){
            echo 'Metro.notify.create("'.$xMESSAGE.'", "'.$xTITLE.'", {'.$xTYPE_STR.'});';
        }else{
            echo '
                <script type="text/javascript">
                <!--
                    Metro.notify.create("'.$xMESSAGE.'", "'.$xTITLE.'", {'.$xTYPE_STR.'});
                -->
                </script>                
            ';
        }
        
    }
    /** ***************************************************************************************************************************** **/
    public function showDIALOG($inLOAD, $xTITLE, $xMESSAGE, $xTYPE){
        switch ($xTYPE){ 
            case 1:
                $xTYPE_STR = 'primary';
            break;
        
            case 2:
                $xTYPE_STR = 'secondary';
            break;
        
            case 3:
                $xTYPE_STR = 'light';
            break;

            case 4:
                $xTYPE_STR = 'dark';
            break;

            case 5:
                $xTYPE_STR = 'alert';
            break;

            case 6:
                $xTYPE_STR = 'warning';
            break;

            case 7:
                $xTYPE_STR = 'success';
            break;

            case 8:
                $xTYPE_STR = 'info';
            break;
        }
        if($inLOAD == true){
            echo '
                Metro.dialog.create({
                    title: "'.$xTITLE.'",
                    content: "<div>'.$xMESSAGE.'</div>",
                    closeButton: false, 
                    clsDialog: "'.$xTYPE_STR.'"
                });        
            ';
        }else{
            echo '
                <script type="text/javascript">
                <!--
                    Metro.dialog.create({
                        title: "'.$xTITLE.'",
                        content: "<div>'.$xMESSAGE.'</div>",
                        closeButton: false, 
                        clsDialog: "'.$xTYPE_STR.'"
                    });        
                -->
                </script>                
            ';
        }
    }
    /** ***************************************************************************************************************************** **/
    public function get_simulator($PARAM_simulator){
        switch($PARAM_simulator){
            case '0':
                $Simulador = 'Desconocido';
            break;
            case '1':
                $Simulador = 'Microsoft Flight Simulator 95';
            break;
            case '2':
                $Simulador = 'Microsoft Flight Simulator 98';
            break;
            case '3':
                $Simulador = 'Microsoft Combat Flight Simulator';
            break;
            case '4':
                $Simulador = 'Microsoft Flight Simulator 2000';
            break;
            case '5':
                $Simulador = 'Microsoft Combat Flight Simulator 2';
            break;
            case '6':
                $Simulador = 'Microsoft Flight Simulator 2002';
            break;
            case '40':
                $Simulador = 'Microsoft Flight Simulator 2020';
            break;

            echo $Simulador;
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
}
