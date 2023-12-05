<?php

require_once '../classes/class.Cliente.php';
/*
    $cliente1 = new Cliente("Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9", 0);
    $cliente2 = new Cliente("Maria", "(11) 98765-4321", "maria@email.com", "987.654.321-00", "11.223.334-5", 0);
    $cliente3 = new Cliente("João", "(13) 98765-4321", "joao@email.com", "111.222.333-44", "55.666.777-8", 0);
    $cliente4 = new Cliente("Ana", "(14) 98765-4321", "ana@email.com", "555.444.333-22", "77.888.999-1", 0);
    $cliente5 = new Cliente("Carlos", "(15) 98765-4321", "carlos@email.com", "999.888.777-66", "33.222.111-0", 0);
    $cliente6 = new Cliente("Leo", "(15) 98765-4321", "carlos@email.com", "056.888.777-66", "33.222.111-0", 0);

    $cliente1 -> salvarCliente();
    $cliente2 -> salvarCliente();
    $cliente3 -> salvarCliente();
    $cliente4 -> salvarCliente();
    $cliente5 -> salvarCliente();
    $cliente6 -> salvarCliente();
*/
    Cliente::getClientes();