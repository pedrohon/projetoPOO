<?php

include_once("../Testes/class.pessoa.teste.php");

class Perfil {
    protected $idPerfil;
    protected $nomeDoPerfil;
    protected $funcionalidades = array();

    public function __construct($idPerfil, $nomeDoPerfil, $funcionalidades) {
        $this->idPerfil = $idPerfil;
        $this->nomeDoPerfil = $nomeDoPerfil;
        $this->funcionalidades = $funcionalidades;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getNomeDoPerfil() {
        return $this->nomeDoPerfil;
    }

    public function getFuncionalidades() {
        return $this->funcionalidades;
    }

    public function adicionarFuncionalidades() {
        $this->funcionalidades[] = $funcionalidade;
    }

    public function removerFuncionalidades() {
        $key = array_search($funcionalidade, $this->funcionalidades);
        if ($key !== false){
          unset($this->funcionalidades[$key]);
        }
    }
}

//TESTE

$idPerfil = 001;
$nomeDoPerfil = "Dentista";
$funcionalidades = [Adicionar, Remover, Alterar];

$perfilTeste = new Perfil($idPerfil, );

?>