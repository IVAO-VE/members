<?php
header('Content-Type: application/json');

$query = $this->db->get('event'); 

echo json_encode($query->result());

?>