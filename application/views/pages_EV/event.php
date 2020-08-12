<?php
header('Content-Type: application/json');

$query = $this->db->get('events'); 

echo json_encode($query->result());

?>