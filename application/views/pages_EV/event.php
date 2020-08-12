<?php
$query = $this->db->get('events'); 

echo json_encode($query->result());

?>