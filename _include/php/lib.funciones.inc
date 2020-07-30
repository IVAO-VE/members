<?php
/**
 * @autor Rixio Danilo Iguarán Chourio.
 * Descripción general:
 *   Biblioteca de funciones generales para la aplicación.
 **/

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;


    /** CONFIGURACIONES INICIALES DE LA APLICACIÓN  **/
    require_once $_SERVER['DOCUMENT_ROOT']."/lib/lib.sesiones.inc";        
    require_once $_SERVER['DOCUMENT_ROOT']."/src/ses_val.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/lib/lib.language.inc";
    require_once $_SERVER['DOCUMENT_ROOT']."/src/val_vid.php";
    
    /**
    require_once $_SERVER['DOCUMENT_ROOT']."/recursos/PHPMailer/src/Exception.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/recursos/PHPMailer/src/PHPMailer.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/recursos/PHPMailer/src/SMTP.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/recursos/libTCPDF/tcpdf.php";
    **/
    
    setlocale(LC_ALL,"es_ES");
    date_default_timezone_set('America/Caracas');
    ini_set('max_execution_time', 3600);
    
    
    
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $GLOBALS['root'] = $_SERVER['DOCUMENT_ROOT'];
    $con = Conectarse();

/**
 * FUNCIONES GENERALES
 * */

/** ***************************************************************************************************************************** **/
/**
 * @name getREGEX
 * 
 * @param $xSeccion [String]
 * @param $xExpresion [String]
 * @description
 *      Función para el uso del diccionario de expresiones regulares
 *      Se definen los parametros de entrada y devolverá el valor de la expresión regular
 * **/
function getREGEX($xSeccion, $xExpresion){
    $xArrREGEX = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/recursos/patterns.ini", true); //Leo el archivo ini
    if(array_key_exists($xSeccion, $xArrREGEX)){ //Verifico la existencia del grupo
        if(array_key_exists($xExpresion, $xArrREGEX[$xSeccion])){ //Verifico la existencia del pattern
            echo $xArrREGEX[$xSeccion][$xExpresion]; //Escribo pattern
        }else{
            echo "pattern fallida"; //Anuncio falla de pattern
        }
    }else{
        echo "grupo pattern fallido"; //Anuncio falla de grupo
    }
}

/** MUESTRA MENSAJE RECTANGULAR AL USUARIO **/
function showMSG($xMSG_str, $xMSG_tipo){
    echo '<script type="text/javascript">
            var WinEscritorio = $(window.parent.document);
            $(WinEscritorio).find("#xMsg").css("display", "block");
            $(WinEscritorio).find("#xMsg").attr("class", "'.strtolower($xMSG_tipo).'");
            $(WinEscritorio).find("#xMsg").html("'.$xMSG_str.'");
            setTimeout(function() { $("#xMsg").fadeOut(1500); },5000);
          </script>';
          $_SESSION['mensaje'] = '<div id="xMsg" class="'.$xMSG_tipo.'">'.$xMSG_str.'</div>';
}
/** ***************************************************************************************************************************** **/
/** CONECTA A LA BASE DE DATOS **/
function Conectarse(){
    $Servidor = "localhost";
    $Usuario = "system_user";
    $Contraseña = "67Qmda9H^Tmosepy";
    $BaseDatos = "system";
    $Puerto = "3306";
    
   if (!($link = mysqli_connect($Servidor, $Usuario, $Contraseña, $BaseDatos, $Puerto))) {
      Alerta("Error conectado con el servidor de datos, Por favor intente mas tarde.");
      exit();
   }
   return $link;
}
/** *************************************************************************************************************************** **/
/**
 * FUNCIÓN DE COMUNICACIONES CON LA BASE DE DATOS
 * 
 * [cmdSQL] es la instrucción MDL que se envía a la base (con comodines de valor)
 * 
 * [tiposREF] pudiera contener una cadena con los siguentes valores
 *      i	el valor en el arreglo es de tipo entero
 *      d	el valor en el arreglo es de tipo double
 *      s	el valor en el arreglo es de tipo string
 *      b	el valor en el arreglo es un blob y se envía en paquetes
 * 
 * [Parametros] es un arreglo que contiene los datos a enviar a la DB INSERT INTO mimbros(id, vid, fname, lname) VALUES(?, ?, ?, ?)
**/
function EjecutarSQL($cmdSQL, $tiposREF = false, $Parametros = false){
    $MyCONN=Conectarse(); //Estableciendo la conexión.
    $cmdSQL = mysqli_real_escape_string($MyCONN, $cmdSQL); //escapando los caracteres especiales (SQL inyection).
    if($xPreparar = mysqli_prepare($MyCONN, $cmdSQL)){ //Iniciando la preparación de la consulta solicitada.
        if(count($Parametros) == count($Parametros, 1)){ 
            $Parametros = array($Parametros); 
            $MySQL_MULTI = false; 
        } else { 
            $MySQL_MULTI = true; 
        }  
        //Analizando los parametros de la preparación (SQL inyection).
        if($tiposREF){ 
            $ParametrosBND = array();   //Arreglo de parametros
            $ParametrosREF = array();   //Arreglo de referencia
            $ParametrosBND = array_pad($ParametrosBND,(count($Parametros,1)-count($Parametros))/count($Parametros),""); //inserto en el arreglo       
            foreach($ParametrosBND as $xCampo => $xValor){ 
                $ParametrosREF[$xCampo] = &$ParametrosBND[$xCampo];  //actualizo el arreglo de referencia
            } 
            array_unshift($ParametrosREF, $tiposREF); 
            $ParametrosMTH = new ReflectionMethod('mysqli_stmt', 'bind_param'); 
            $ParametrosMTH -> invokeArgs($xPreparar,$ParametrosREF); 
        } 
        
        $xResultado = array(); //Declaramos el areglo vacio de posibles resultados.
        foreach($Parametros as $qCampo => $qValor){ 
          foreach($ParametrosBND as $pCampo => $xValor){ 
            $ParametrosBND[$pCampo] = $qValor[$pCampo]; 
          } 
          $xResultadoTMP = array(); 
          if(mysqli_stmt_execute($xPreparar)){ 
            $xResultadoMD = mysqli_stmt_result_metadata($xPreparar); 
            if($xResultadoMD){                                                                               
              $xArregloPRE = array();   
              $xArregloREF = array(); 
              while ($CampoW = mysqli_fetch_field($xResultadoMD)) { 
                $xArregloREF[] = &$xArregloPRE[$CampoW->name]; 
              }                                
              mysqli_free_result($xResultadoMD); 
              $bResultadoMD = new ReflectionMethod('mysqli_stmt', 'bind_result'); 
              $bResultadoMD->invokeArgs($xPreparar, $xArregloREF); 
              while(mysqli_stmt_fetch($xPreparar)){ 
                $row = array(); 
                foreach($xArregloPRE as $xCampo => $xValor){ 
                  $row[$xCampo] = $xValor;           
                } 
                $xResultadoTMP[] = $row; 
              } 
              mysqli_stmt_free_result($xPreparar); 
            } else { 
              $xResultadoTMP[] = mysqli_stmt_affected_rows($xPreparar); 
            } 
          } else { 
            $xResultadoTMP[] = FALSE; 
          } 
          $xResultado[$qCampo] = $xResultadoTMP; 
        } 
        mysqli_stmt_close($xPreparar);   
      } else { //No se pudo preparar la consulta solicitada (Abotar proceso)
        $xResultado = FALSE; //Abortando y estableciendo resultado a falso.
        throw new Exception(mysqli_error($MyCONN)."\n".$cmdSQL); //Generando excepción 
      } 
      
      if($MySQL_MULTI){
        desconectar_datos($MyCONN);
        return $xResultado; //Sí es multiconsulta y debemos de retornar todos los elementos del arreglo.
      } else {
        desconectar_datos($MyCONN);
        return $xResultado[0]; //No es multiconsulta y solo retornamos 1 único elemento del arreglo.
      } 
}
/** ***************************************************************************************************************************** **/
function desconectar_datos($a){
        mysqli_close($a);
}
/** ***************************************************************************************************************************** **/
function dbGET_PROXID($xTABLA){
    $MySQL = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
    try {
        //Ejecutando consulta SQL
        $MyQuery = EjecutarSQL($MySQL, "ss", array("scpac_db", $xTABLA));
        if($MyQuery){
            //Consulta exitosa de AUTO_INCREMENT
            $xAUTO_INCREMENT = $MyQuery[0]["AUTO_INCREMENT"];
            if(($xAUTO_INCREMENT == null) || ($xAUTO_INCREMENT == "")){
                $xAUTO_INCREMENT = 1; 
            } 
        }else{
            //No existe el presupuesto
            boxInformar("ERROR","Error en AUTO_INCREMENT.");
        }
    } catch (Exception $e) {
        auditar('Excepción capturada: '.$e->getMessage(). "\n");
        boxInformar("ERROR","Excepción capturada en LOG.");
    }
    return $xAUTO_INCREMENT;         
}
/** ***************************************************************************************************************************** **/
/** Llena con ceros a la IZQ la cadena **/
function Zero($Valor, $Longitud){
    $MyValor = $Valor;
    if(strlen($MyValor) < $Longitud){
        $MyCAD = $Valor;
        Do {
			$MyCAD = "0".$MyCAD;
		}While(strlen($MyCAD) < $Longitud);
		return $MyCAD;
    }elseif(strlen($MyValor) == $Longitud){
		return $Valor;
	}elseif(strlen($MyValor) > $Longitud){
		return "Z Err";
	}
}
/** ***************************************************************************************************************************** **/
function Alerta($mensaje) {
	echo '<script>alert("'.$mensaje.'");</script>';
}
/** ***************************************************************************************************************************** **/
function gotoatras() {
	echo '<script>history.go(-1);</script>';
}
/** ***************************************************************************************************************************** **/
function gotoadelante() {
	echo '<script>history.go(1);</script>';
}
/** ***************************************************************************************************************************** **/
function goIFace($xURL) {
    echo "<script>location.href='".$xURL."';</script>";
}
/** ***************************************************************************************************************************** **/
function goEscritorio($xURL) {
    echo "<script  type='text/javascript'>window.top.location = '$xURL';</script>";
}
/** ***************************************************************************************************************************** **/
function goAVISO($strMENSAJE, $strTIPO){
    echo '<script type="text/javascript" src="/js/scpac.dialogos.js"></script>';
    echo "<script type='text/javascript'>goAVISO('".$_SERVER['PHP_SELF'].": "."$strMENSAJE','$strTIPO');</script>";
}
/** ***************************************************************************************************************************** **/
function  boxConfirmar($varMENSAJE){
    echo '<script type="text/javascript" src="/js/scpac.dialogos.js"></script>';
    echo "<script type='text/javascript'>boxConfirmar('$varMENSAJE');</script>";
}
/** ***************************************************************************************************************************** **/
function  boxInformar($strTIPO, $varMENSAJE, $varWINMARCO = null, $strDESTINO = null){
    echo '<script type="text/javascript" src="/js/scpac.dialogos.js"></script>';
    echo "<script type='text/javascript'>boxInformar('$strTIPO','$varMENSAJE', '$varWINMARCO', '$strDESTINO');</script>";
}
/** ***************************************************************************************************************************** **/
function iif($condition,$val_if_true,$val_if_false=""){
    if ($condition) 
        return $val_if_true;
    else 
        return $val_if_false;
}
/** ***************************************************************************************************************************** **/

function fecha_DMA($amd){
    return substr($amd, 8, 2)."-".substr($amd, 5, 2)."-".substr($amd, 0, 4);
}
/** ***************************************************************************************************************************** **/
function fecha_AMD($dma){
    return substr($dma, 7, 4)."-".substr($dma, 4, 2)."-".substr($dma, 1, 2);
}
/** ***************************************************************************************************************************** **/
function fecha_UNIX($amd){
    return mktime(0, 0, 0,substr($amd, 5, 2), substr($amd, 8, 2), substr($amd, 0, 4));
}
/** ***************************************************************************************************************************** **/
function auditar($texto){
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
function codificar($Texto){
  $Tamaño=strlen($Texto);
  $MyNewCAD = "";
  for($Cont=0; $Cont<=$Tamaño; $Cont++){
      $Caracter = substr($Texto, $Cont, 1);
      $MyAsc1 = ord($Caracter);
      $MyAsc2 = (($MyAsc1 + $Tamaño)*2);
      $MyNewCaracter = chr($MyAsc2);
      $MyNewCAD = $MyNewCAD.$MyNewCaracter;
  }
 return $MyNewCAD;
}
/** ***************************************************************************************************************************** **/
function decodificar($Texto){
  $Tamaño=strlen($Texto);
  $MyNewCAD = "";
  for($Cont=0; $Cont<=$Tamaño; $Cont++){
       $Caracter = substr($Texto, $Cont, 1);
       $MyAsc1 = ord($Caracter);
       $MyAsc2 = (($MyAsc1 / 2)-$Tamaño);
       $MyNewCaracter = chr($MyAsc2);
       $MyNewCAD = $MyNewCAD.$MyNewCaracter;
  }
return $MyNewCAD;
}
/** ***************************************************************************************************************************** **/
function NUM_LET($num, $fem = true, $dec = true) { 
//if (strlen($num) > 14) die("El n?mero introducido es demasiado grande"); 
   $matuni[2]  = "dos"; 
   $matuni[3]  = "tres"; 
   $matuni[4]  = "cuatro"; 
   $matuni[5]  = "cinco"; 
   $matuni[6]  = "seis"; 
   $matuni[7]  = "siete"; 
   $matuni[8]  = "ocho"; 
   $matuni[9]  = "nueve"; 
   $matuni[10] = "diez"; 
   $matuni[11] = "once"; 
   $matuni[12] = "doce"; 
   $matuni[13] = "trece"; 
   $matuni[14] = "catorce"; 
   $matuni[15] = "quince"; 
   $matuni[16] = "dieciseis"; 
   $matuni[17] = "diecisiete"; 
   $matuni[18] = "dieciocho"; 
   $matuni[19] = "diecinueve"; 
   $matuni[20] = "veinte"; 
   $matunisub[2] = "dos"; 
   $matunisub[3] = "tres"; 
   $matunisub[4] = "cuatro"; 
   $matunisub[5] = "quin"; 
   $matunisub[6] = "seis"; 
   $matunisub[7] = "sete"; 
   $matunisub[8] = "ocho"; 
   $matunisub[9] = "nove"; 

   $matdec[2] = "veint"; 
   $matdec[3] = "treinta"; 
   $matdec[4] = "cuarenta"; 
   $matdec[5] = "cincuenta"; 
   $matdec[6] = "sesenta"; 
   $matdec[7] = "setenta"; 
   $matdec[8] = "ochenta"; 
   $matdec[9] = "noventa"; 
   $matsub[3]  = 'mill'; 
   $matsub[5]  = 'bill'; 
   $matsub[7]  = 'mill'; 
   $matsub[9]  = 'trill'; 
   $matsub[11] = 'mill'; 
   $matsub[13] = 'bill'; 
   $matsub[15] = 'mill'; 
   $matmil[4]  = 'millones'; 
   $matmil[6]  = 'billones'; 
   $matmil[7]  = 'de billones'; 
   $matmil[8]  = 'millones de billones'; 
   $matmil[10] = 'trillones'; 
   $matmil[11] = 'de trillones'; 
   $matmil[12] = 'millones de trillones'; 
   $matmil[13] = 'de trillones'; 
   $matmil[14] = 'billones de trillones'; 
   $matmil[15] = 'de billones de trillones'; 
   $matmil[16] = 'millones de billones de trillones'; 

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' con'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' una' : ' un'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'Cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'una'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'un' : 'uno'; 
         $subcent = 'os'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' ciento' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' mil'; 
         }elseif ($num > 1){ 
            $t .= ' mil'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?n'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ones'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
   $tex = $neg . substr($tex, 1) . $fin; 
   return ucfirst($tex); 
} 
/** ***************************************************************************************************************************** **/
function get_contents ($url) {
    if (function_exists('curl_exec')){ 
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT,  true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = (curl_exec($conn));
        curl_close($conn);
    }elseif(function_exists('file_get_contents')){
        $url_get_contents_data = file_get_contents($url);
    }elseif(function_exists('fopen') && function_exists('stream_get_contents')){
        $handle = fopen ($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }else{
        $url_get_contents_data = false;
    }
return $url_get_contents_data;
} 
/** ***************************************************************************************************************************** **/
function escribe_consola( $data ) {
    if (is_array($data))
        $output = "<script>console.log( 'Depuración de código: " . utf8_encode(var_dump($data)) . "' );</script>";
    else
        $output = "<script>console.log( 'Depuración de código: " . utf8_encode($data) . "' );</script>";

    echo $output;
}
/** ***************************************************************************************************************************** **/
function borraFOLDER($dir) {
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") borraFOLDER($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir);
     auditar("Se ha eliminado el directorio ".$dir); 
   } 
}
/** ***************************************************************************************************************************** **/
function crearFOLDER($dir){
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
        auditar("Se ha creado el directorio ".$dir);
        return true;
    }else{
        auditar("Ya existe ".$dir);
        return false;
    }
}
/** ***************************************************************************************************************************** **/
function checkLOGED(){
    if(isset($_SESSION["logined"])){
        if($_SESSION["logined"] == 'false'){
            header('Location: /index.php');
        }
    }else{
        header('Location: /index.php');
    }
}
/** ***************************************************************************************************************************** **/
   function get_cliente_ip() {
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
function str_normalizar($xString){
    //Decodificamos la cadena en formato utf8
    $xString = utf8_encode($xString);
    //reemplazamos las letras
    $xString = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $xString);
    $xString = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $xString);
    $xString = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $xString);
    $xString = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $xString);
    $xString = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $xString);
    $xString = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $xString);
    return $xString;
}
/** ***************************************************************************************************************************** **/
function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
/** ***************************************************************************************************************************** **/
function pasarNUMERICO($str_Cantidad) { 
  if(strstr($str_Cantidad, ",")) { 
    $str_Cantidad = str_replace(",", "", $str_Cantidad); //quito todos los separadores de miles 
    //$str = str_replace(".", ".", $str); // replace ',' with '.' 
  } 
  
  if(preg_match("#([0-9\.]+)#", $str_Cantidad, $match)) { //buscando los numeros que contiene antes de decimas 
    return floatval($match[0]); 
  } else { 
    return floatval($str_Cantidad); 
  } 
} 
/** ***************************************************************************************************************************** **/
function sendCORREO($strPLANTILLA, $arrayDATOS){
    //Verifico la existencia de la plantilla de correo a usar
    $strPLANTILLA = $_SERVER['DOCUMENT_ROOT']."/recursos/mails/".$strPLANTILLA;
    auditar("Cargando platilla de correo ".$strPLANTILLA);
    if((file_exists($strPLANTILLA)) && (is_file($strPLANTILLA))){
        $xHTML_MSG = getPLANTILLA($strPLANTILLA);
        auditar("Carga exitosa...");
        //Enviar mensaje de correo.
        $xENVIO = new PHPMailer(TRUE);
        //$xENVIO->SMTPDebug = 1; //debug: 1 = errores y mensajes, 2 = solo mensajes
        $xENVIO->IsSMTP(); //Método de envío SMTP
        $xENVIO->isHTML(true); //El mensaje será en formato HTML
        $xENVIO->SMTPAuth = true; //Identificación SMTP habilitada
        $xENVIO->SMTPSecure = 'ssl'; //Soporte SSL habilitado REQUIRIDO para Gmail
        $xENVIO->Host = "mail.scpac.empresasuv.mx"; //Servidor SMTP
        $xENVIO->Username = "sistema@scpac.empresasuv.mx"; //Usuario SMTP
        $xENVIO->Password = "YR%_DAiow~Sa_f&RVs"; //Contraseña SMTP
        $xENVIO->Port = 465; // Puerto a utilizar
        $xENVIO->CharSet = 'UTF-8'; //Codificación del correo                            
        //Configurando emisor y destinatario
        $xENVIO->setFrom('sistema@scpac.empresasuv.mx', 'Control presupuestal (EduContinua UV)'); //Remitente
        $xENVIO->AddReplyTo("educontinua@empresasuv.mx","EduContinua UV"); //Dirección de respuesta
        $xENVIO->addAddress($arrayDATOS["to"], $arrayDATOS["toNAME"]); //Destinatario
        $xENVIO->addBCC('educontinua@empresasuv.mx'); //Marcando copia oculta a la administración de EduContinua
        //Configurando el titulo del mensaje
        $xENVIO->Subject  = $arrayDATOS["msgSUBJECT"]; //Título del mensaje
        //Configurando el cuerpo del mensaje.
        $xENVIO->Body     = $xHTML_MSG;
        //Configurando archivos adjuntos si existen
        if (isset($arrayDATOS["msgADJUNTOS"])){ //Sí tenemos archivos adjuntos
            foreach ($arrayDATOS["msgADJUNTOS"] as $xADJUNTO){
                $xENVIO->addAttachment($xADJUNTO, basename($xADJUNTO), 'base64', 'application/octet-stream');
            } 
        }
        //Ejecutando el envío del mensaje.
        if($xENVIO->send()) {
            //El mensaje de correo fué enviado correctamente
            //boxInformar("CORRECTO","Correo electrónico enviado</br>Revise su buzón");
            auditar("Éxito en el envío del correo de recuperación para el usuario (".$arrayDATOS["toNAME"].")");
        } else {
            //No se pudo enviar el correo electrónico
            //boxInformar("ERROR","Error en envío de correo</br>Contacte al administrador");
            auditar("No se pudo enviar el correo a (".$arrayDATOS["to"].")");
        }                            
    }else{
        auditar("Carga fallida...");
        //boxInformar("ERROR", "No es posible enviar notificación</br>No se encuentra el archivo.");
        exit();
    }
}
/** ***************************************************************************************************************************** **/
/**
 * FUNCION PARA LEER Y EJECUTAR EL ARCHIVO DE PLANTILLA
 * **/
function getPLANTILLA($xPLANTILLA){
    ob_start(); //Activo la captura de buffer de salida
    require($xPLANTILLA); //requiero el archivo de plantilla para que se ejecute
    return ob_get_clean(); //retorno la salida del archivo ejecutado
}

/** ***************************************************************************************************************************** **/
function bit_ly($enlace) {
    $code = '767fb6a0ffe9b56078c27d28dc4263a51fceb477';
    $url = 'https://api-ssl.bitly.com/v4/bitlinks';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['long_url' => $enlace])); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $code",
        "Content-Type: application/json"
    ]);
    
    $arr_result = json_decode(curl_exec($ch));
    return $arr_result->link;
}
/** ***************************************************************************************************************************** **/
function getCOUNTRY($ISO_3166_1){
    $MySQL = "SELECT * FROM paises WHERE code=?";
    try {
        //Ejecutando consulta SQL
        $MyQuery = EjecutarSQL($MySQL, "s", array($ISO_3166_1));
        if($MyQuery){
            //El codigo de pais existe
            return $MyQuery[0]["pais"];
        }else{
            //El pais no existe
            return "unknown";
        }
    } catch (Exception $e) {
        auditar('Excepción capturada: '.$e->getMessage(). "\n");
    }            
}
/** ***************************************************************************************************************************** **/
/** ***************************************************************************************************************************** **/
/** ***************************************************************************************************************************** **/



?>