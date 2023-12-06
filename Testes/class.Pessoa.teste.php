<?php
include '../classes/class.Pessoa.php';


// Construtor pessoa
$pessoa = new Pessoa("Mariana Sousa", "(31)99999-2002", "mari@example.com", "123.452.276-46", "22-333.441");

// Exibir informações da pessoa
echo "\n Informações da Pessoa: \n";
echo "\n---------------------------------------------\n";
echo "Nome: " . $pessoa->getNome() . "\n";
echo "Telefone: " . $pessoa->getTelefone() . "\n";
echo "Email: " . $pessoa->getEmail() . "\n";
echo "CPF: " . $pessoa->getCpf() . "\n";
echo "RG: " . $pessoa->getRg() . "\n";

// Altera informações da pessoa
$pessoa->setNome("Teste novo nome");
$pessoa->setRg("16677785");
$pessoa->setEmail("teste@novoemail.com");
$pessoa->setTelefone("(31)99999-7979");
$pessoa->setCpf("30030030030");

// Exibir novas informações da pessoa
echo "\n Novas informações da Pessoa: \n";
echo "\n---------------------------------------------\n";
echo "Nome: " . $pessoa->getNome() . "\n";
echo "Telefone: " . $pessoa->getTelefone() . "\n";
echo "Email: " . $pessoa->getEmail() . "\n";
echo "CPF: " . $pessoa->getCpf() . "\n";
echo "RG: " . $pessoa->getRg() . "\n";
?>