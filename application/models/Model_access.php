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

        public function delete_access($MyVID, $MyDEPARTAMENT) {
            $this->db->set($MyDEPARTAMENT, 'false');
            $this->db->where('vid', $MyVID);
            $this->db->update('permisos');
            
        }

        public function getname($MyVID){
            $this->db->where('vid', $MyVID);
            $q = $this->db->get('members_data');

            if($q->num_rows() > 0){
                return $q->result();
            }else{
                return false;
            }
        }

}	
?>