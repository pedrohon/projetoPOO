<?php

require_once '../classes/class.Cliente.php';
    $cliente1 = new Cliente("Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");
    $cliente2 = new Cliente("Maria", "(11) 98765-4321", "maria@email.com", "987.654.321-00", "11.223.334-5");

    $cliente1 -> salvarCliente();
    $cliente2 -> salvarCliente();

    Cliente::getClientes();