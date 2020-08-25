<?php
error_reporting(-1);
/**
 * @author Rixio Danilo Iguaran Chourio
 * @copyright 2020
 */


/** ***************************************************************************************************************************** **/
function urlWHAZZUP(){
    $fileSTATUS = file_get_contents("https://www.ivao.aero/whazzup/status.txt");
    $arrayLINES = explode(PHP_EOL, $fileSTATUS);
    foreach ($arrayLINES as &$xLINE) {
        $xPARTS = explode("=", $xLINE);
        if($xPARTS[0] == "url0"){
            $url_WHAZZUP = $xPARTS[1]; 
        }
    }
    return $url_WHAZZUP;
}

function readWHAZZUP(){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, urlWHAZZUP());
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}


/** ***************************************************************************************************************************** **/
/** CONECTA A LA BASE DE DATOS **/
function Conectarse(){
    $Servidor = "localhost";
    $Usuario = "membersdb";
    $Contraseña = "jPlt4M^zkj5k7sWn";
    $BaseDatos = "members";
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


?>