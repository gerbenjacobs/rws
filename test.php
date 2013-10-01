<?php
include 'rws.class.php'; 

$rws = new RWS;
$data = $rws->getData();


echo '<pre>';
print_r($data);