<?php

include_once '../global.php';

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

/*
// teste usuário
$usuario = new Usuario("admin", "admin");
$usuario = new Usuario("admin", "admin");
$usuario = new Usuario("pedro", "pedro");
$usuario->salvarUsuario();

Usuario::getUsuarios();
*/