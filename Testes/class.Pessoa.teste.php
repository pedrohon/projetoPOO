<?php

require_once '../classes/class.Pessoa.php';
require_once 'Pessoa.php';

// Instanciando a classe pessoa e passando valores como exemplo para o construtor
$pessoa = new Pessoa("Mariana Sousa", "(31)98327-2000", "mari@example.com", "146.242.276-46", "21-033.451");

// Recuperando os valores de pessoas e exibindo-os
echo "Nome: " . $pessoa->getNome() . "\n";
echo "Telefone: " . $pessoa->getTelefone() . "\n";
echo "Email: " . $pessoa->getEmail() . "\n";
echo "CPF: " . $pessoa->getCpf() . "\n";
echo "RG: " . $pessoa->getRg() . "\n";

?>