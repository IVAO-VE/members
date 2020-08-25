<?php
error_reporting(-1);
require_once "lib.functions.php";
/**
 * @author Rixio Danilo Iguaran Chourio
 * @copyright 2020
 */
echo "<pre>";
	echo date("d-m-Y H:i:s\t")."Tarea programada diaria de STATUS iniciada</br>";
	echo date("d-m-Y H:i:s\t")."Iniciando la actualizacion del STATUS de la red.</br>";
/**	
    $statusURL = "https://www.ivao.aero/whazzup/status.txt";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $statusURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $fileSTATUS = curl_exec($curl);
    curl_close($curl);
**/
    $fileSTATUS = file_get_contents("https://www.ivao.aero/whazzup/status.txt");
	echo date("d-m-Y H:i:s\t")."Datos de la red IVAO cargados correctamente.</br>";
    $arrayLINES = explode(PHP_EOL, $fileSTATUS);
	echo date("d-m-Y H:i:s\t")."Procesando los datos...</br>";
    foreach ($arrayLINES as &$xLINE) {
        $xPARTS = explode("=", $xLINE);
        switch ($xPARTS[0]){ 
        	case "url0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET data=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección DATOS.</br>";
        	break;
        	case "url1":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET voice=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección VOICE.</br>";
        	break;
        	case "gzurl0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET compress=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección COMPRESS.</br>";
        	break;
        	case "metar0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET metar=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección METAR.</br>";
        	break;
        	case "taf0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET taf=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección TAF.</br>";
        	break;
        	case "shorttaf0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET shorttaf=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección SHORTTAF.</br>";
        	break;
        	case "user0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET user=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección USERS.</br>";
        	break;
        	case "atis0":
                    $MyQUERY = EjecutarSQL("UPDATE whazzup_status SET atis=? WHERE id=?", "si", array(trim($xPARTS[1]), 0));
					echo date("d-m-Y H:i:s\t")."Se actualizó la URL de la sección ATIS.</br>";
        	break;
        }
    }
	echo date("d-m-Y H:i:s\t")."Todos los procesos de actualización se cumplieron con éxito.</br>";
	echo date("d-m-Y H:i:s\t")."Proceso diario finalizado con éxito.</br>";
echo "</pre>";
?>