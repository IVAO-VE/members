<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once "lib.functions.php";
/**
 * @author Rixio Danilo Iguaran Chourio
 * @copyright 2020
 */
echo "<pre>";

    echo date("d-m-Y H:i:s\t")."Se ha iniciado la tarea programada para rastreo de conexiones</br>";
    echo date("d-m-Y H:i:s\t")."Iniciando el trackeo de las conexiones</br>";
    
    echo date("d-m-Y H:i:s\t")."Buscando la dirección del archivo de datos...</br>";
    $MyQuery = EjecutarSQL("SELECT * FROM whazzup_status WHERE id=?", "i", array(0));
    $xURL = $MyQuery[0]["data"];
    
    echo date("d-m-Y H:i:s\t")."Conectando con WHAZZUP en ".$xURL."</br>";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $xURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $fileWHAZZUP = curl_exec($curl);
    curl_close($curl);
    echo date("d-m-Y H:i:s\t")."Datos transferidos desde WHAZZUP</br>";

    $whazzupLINES = explode("\n", $fileWHAZZUP);
    echo date("d-m-Y H:i:s\t")."Normalizando datos del WHAZZUP</br>";

    /** Marcamos todos los registros almacenados como inactivos **/
    echo date("d-m-Y H:i:s\t")."Normalizando datos de la base de datos</br>";
    $MyNORMALIZE = EjecutarSQL("UPDATE whazzup_log SET log_status=?", "s", array("I"));

    /** Revisamos los datos linea por linea **/
    echo date("d-m-Y H:i:s\t")."Recorriendo conexiones de WHAZZUP</br>";
    foreach ($whazzupLINES as &$xLINE) {
        $xPARTS = explode(":", $xLINE);
        if(isset($xPARTS[3])){ //Leemos una linea de datos y no un encabesado
            /** VERIFICAMOS SI EL VUELO ES DE UN MIEMBRO DE LA DIVISIÓN **/
            /** VERIFICAMOS SI EL VUELO ES DE UNA AERONAVE CON MATRICULA VENEZOLANA **/
            /** VERIFICAMOS SI EL VUELO TIENE SALIDA O LLEGADA EN TERRITORIO NACIONAL **/
            /** VERIFICAMOS SI EL CONTROLADOR ESTÁ EN FIR DE VENEZUELA **/
            $MySQL = "SELECT * FROM members_data WHERE vid = ?"; //Consultamos la DB de miembros VE
            try {
                //Ejecutando consulta SQL
                $MyQuery = EjecutarSQL($MySQL, "i", array(trim($xPARTS[1])));
                if(($MyQuery) || (substr(strtoupper($xPARTS[0]), 0, 2) == "YV") || (substr(strtoupper($xPARTS[11]), 0, 2) == "SV") || (substr(strtoupper($xPARTS[13]), 0, 2) == "SV") || (substr(strtoupper($xPARTS[0]), 0, 2) == "SV")){
                    /** Consulta exitosa tenemos a un miembro volando o controlando **/
                    /** Buscamos su callsing y marca de conexion para saber si hemos registrado su conexion actual**/
                    $MyCONECTION = "SELECT * FROM whazzup_log WHERE vid=? AND callsign=? AND connection_time=?"; //Consultamos la DB de miembros VE
                    $MyQueryC = EjecutarSQL($MyCONECTION, "iss", array(trim($xPARTS[1]), trim($xPARTS[0]), trim($xPARTS[37])));
                    if($MyQueryC){ //Ya habíamos registrado esta conexión en la DB
                        /** Marcamos la conexión nuevamente como activa **/
                        $MyACTIVE = EjecutarSQL("UPDATE whazzup_log SET log_status=? WHERE vid=? AND callsign=? AND connection_time=?", "siss", array("A", trim($xPARTS[1]), trim($xPARTS[0]), trim($xPARTS[37])));
                        echo date("d-m-Y H:i:s\t")."ACTIVADO: ".trim($xPARTS[1])." (".trim($xPARTS[0]).")</br>";
                    }else{ //La conexion no existe y hay que agregarla al LOG
                        $MyINSERT = "INSERT INTO whazzup_log(callsign,vid,client_type,frequency,latitude,longitude,altitude,ground_speed,fl_aircraft,fl_speed,fl_departure,fl_level,fl_destination,fl_revision,fl_rules,fl_dep_time,fl_actual_dep_time,fl_eet_hours,fl_eet_minutes,fl_endurance_hours,fl_endurance_min,fl_alternate,fl_other_info,fl_route,fl_2nd_alternate,fl_type_flight,fl_persons,server,protocol,combined_rating,transponder_code,facility_type,visual_range,atis,atis_time,connection_time,software_name,software_version,administrative_version,atc_pilot_version,heading,on_ground,simulator,plane,log_status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                        $MyQuery = EjecutarSQL($MyINSERT, "sisssssssssssssssssssssssssssssssssssssssssss", array(
                                                                                                                trim($xPARTS[0]),
                                                                                                                trim($xPARTS[1]),
                                                                                                                trim($xPARTS[3]),
                                                                                                                trim($xPARTS[4]),
                                                                                                                trim($xPARTS[5]),
                                                                                                                trim($xPARTS[6]),
                                                                                                                trim($xPARTS[7]),
                                                                                                                trim($xPARTS[8]),
                                                                                                                trim($xPARTS[9]),
                                                                                                                trim($xPARTS[10]),
                                                                                                                trim($xPARTS[11]),
                                                                                                                trim($xPARTS[12]),
                                                                                                                trim($xPARTS[13]),
                                                                                                                trim($xPARTS[20]),
                                                                                                                trim($xPARTS[21]),
                                                                                                                trim($xPARTS[22]),
                                                                                                                trim($xPARTS[23]),
                                                                                                                trim($xPARTS[24]),
                                                                                                                trim($xPARTS[25]),
                                                                                                                trim($xPARTS[26]),
                                                                                                                trim($xPARTS[27]),
                                                                                                                trim($xPARTS[28]),
                                                                                                                trim($xPARTS[29]),
                                                                                                                trim($xPARTS[30]),
                                                                                                                trim($xPARTS[42]),
                                                                                                                trim($xPARTS[43]),
                                                                                                                trim($xPARTS[44]),
                                                                                                                trim($xPARTS[14]),
                                                                                                                trim($xPARTS[15]),
                                                                                                                trim($xPARTS[16]),
                                                                                                                trim($xPARTS[17]),
                                                                                                                trim($xPARTS[18]),
                                                                                                                trim($xPARTS[19]),
                                                                                                                trim($xPARTS[35]),
                                                                                                                trim($xPARTS[36]),
                                                                                                                trim($xPARTS[37]),
                                                                                                                trim($xPARTS[38]),
                                                                                                                trim($xPARTS[39]),
                                                                                                                trim($xPARTS[40]),
                                                                                                                trim($xPARTS[41]),
                                                                                                                trim($xPARTS[45]),
                                                                                                                trim($xPARTS[46]),
                                                                                                                trim($xPARTS[47]),
                                                                                                                trim($xPARTS[48]),
                                                                                                                "A"
                                                                                                    ));
                        echo date("d-m-Y H:i:s\t")."INSERTADO: ".trim($xPARTS[1])." (".trim($xPARTS[0]).")</br>";
                    }
                }
            } catch (Exception $e) {
                echo(date("d-m-Y H:i:s\t").'Excepción capturada: '.$e->getMessage(). "\n");
            }
        }
    }
    echo date("d-m-Y H:i:s\t")."Finalizado el trackeo de las conexiones.</br>";
    echo date("d-m-Y H:i:s\t")."La tarea programada para rastreo de conexiones ha finalizado.</br>";
echo "</pre>";
?>