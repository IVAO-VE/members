<?php
/**
 * @autor Rixio Iguarán y Simón Cardona.
 * @Departamento Sistemas y Webmaster
 * @Licencia Exclusivo sistemas IVAO.AERO
 * @Licencia División Venezuela.
 * @Correo ve-web@ivao.aero
 * 
 * NNNOOOOOTTTAAAAAA IMPORTANTE
 * Es estrictamente mandatorio generar las variables en los mismos numeros de linea para todos los archivos de lenguaje
 * Es decir; los archivos de lenguajes deben de mantener integridad de valiables por numero de línea. 
 **/

    //Asegurando el acceso directo al script
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');

class Model_access extends CI_Model {

        public function get_access($MyVID, $MyDEPARTAMENT) {
            $this->db->where('vid', $MyVID);
            $this->db->where($MyDEPARTAMENT, 'true');
            $q = $this->db->get('permisos');
            
            if($q->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        public function grant_access($MyVID, $MyDEPARTAMENT) {
            $this->db->set($MyDEPARTAMENT, 'true');
            $this->db->where('vid', $MyVID);
            $this->db->update('permisos');
        }


}	
?>