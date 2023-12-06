<?php
//teste realizado com suceso
//foi verificado que dois usuários não podem ser criados na mesma instancia

$jujubs = Usuario::getInstancia("jujubs", "julia1018");
$jujubs->realizaLogin("jujubs", "julia1018");

//tentando entrar com um segundo usuário
$usuario2 = Usuario::getInstancia("usuario2", "senha123");
$usuario2->realizaLogin("usuario2", "senha123");

//logout
$jujubs->realizaLogout();

//entrando com outro usuário
$usuario2 = Usuario::getInstancia("usuario2", "senha123");
$usuario2->realizaLogin("usuario2", "senha123");