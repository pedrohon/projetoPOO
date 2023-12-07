<?php

include_once '../global.php';

$nomeDoPerfil = "Dentista";

$nomeDoMetodo = ["Adicionar", "Remover", "Alterar"];
$funcionalidades = new Funcionalidade($nomeDoMetodo);



$perfilTeste = new Perfil($idPerfil, $nomeDoPerfil, $funcionalidades);

echo "Nome do Perfil: " . $perfilTeste->getNomeDoPerfil() . "<br>";
echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$perfilTeste->adicionarFuncionalidades(Funcionalidade [$nomeDoMetodo = "Cadastrar Especialidades"]);
$perfilTeste->adicionarFuncionalidades($funcionalidades->$metodos);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$perfilTeste->removerFuncionalidades(Funcionalidade [$nomeDoMetodo = "Alterar"]);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";