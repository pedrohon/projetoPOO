<?php

require_once '../classes/class.Perfil.php';

    // um exemplo de Perfil
    $perfil = new Cliente("123", "Dentista");

//adicionando funcionalidades
  $perfil-> adicionarFuncionalidades("Editar");
  $perfil-> adicionarFuncionalidades("Apagar");
  $perfil-> adicionarFuncionalidades("Gerenciar Usuários");

// Exibir informações do Perfil
echo "\nInformações do Perfil:\n";
echo "------------------------\n";
echo "Nome do Perfil: " . perfil->getNomeDoPerfil() . "\n";
echo "Funcionalidades: " . implode("/n", $perfil->getFuncionalidades()) . "\n";
