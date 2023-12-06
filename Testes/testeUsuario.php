<?php

include_once '../global.php';
/*
// teste funcionalidade
$funcionalidade1 = new Funcionalidade("Cadastro Dentista");
$funcionalidade2 = new Funcionalidade("Cadastro Especialidade");
$funcionalidade3 = new Funcionalidade("Cadastro Orcamento");

$funcionalidade1->salvarFuncionalidade();
$funcionalidade2->salvarFuncionalidade();
$funcionalidade3->salvarFuncionalidade();

//Funcionalidade::getFuncionalidade();

$funcionalidadesAdmin = [$funcionalidade1, $funcionalidade2, $funcionalidade3];
$funcionalidesDentista = [$funcionalidade2, $funcionalidade3];

//teste perfil
$perfil1 = new Perfil("Administrador", $funcionalidadesAdmin);
$perfil2 = new Perfil("Dentista", $funcionalidesDentista);

$perfil1->salvarPerfil();
$perfil2->salvarPerfil();

Perfil::getPerfil();


// teste usuário
usuario1 = new Usuario("admin", "admin", $perfil1);
$usuario1 = new Usuario("admin", "admin", $perfil1);
$usuario2 = new Usuario("pedro", "pedro", $perfil2);
$usuario1->salvarUsuario();
$usuario2->salvarUsuario();

Usuario::getUsuarios();
*/

$usuario = Usuario::getInstancia("pedro", "pedro");
$usuario->realizaLogin();

$usuario = Usuario::getInstancia("admn", "admin");
$usuario->realizaLogin();

$usuario = Usuario::getInstancia("pedro", "pedro");
$usuario->realizaLogin();

$usuario->realizaLogin();

$usuario->realizaLogout();

$usuario = Usuario::getInstancia("admn", "admin");
$usuario->realizaLogin();

$usuario = Usuario::getInstancia("admin", "admin");
$usuario->realizaLogin();
$usuario->getLogado();