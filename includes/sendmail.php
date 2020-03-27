<?php
//Response message
$valid['success'] = array(
    'success' => false,
    'messages' => array()
);


    $valid['success']  = true;
    $valid['messages'] = "Enviado";

echo json_encode($valid);
?>