<?php

include_once '../global.php';

// cadastro de cliente
$cliente = new Cliente("Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9", 1200);
$cliente -> salvarCliente();


$paciente = new Paciente("Paulo", "(12) 00000-0000", "paulo@email.com", "123.456.789-10", "12.345.678-9", "Limpeza", "1997-12-10", $cliente);


?>