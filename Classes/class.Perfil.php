<?php

include_once("../Testes/class.pessoa.teste.php");

class Perfil {
    protected $id;
    protected $nomeDoPerfil;
    protected $funcionalidades = array();

    public function __construct($id, $nomeDoPerfil, $funcionalidades) {
        $this->id = $id;
        $this->nomeDoPerfil = $nomeDoPerfil;
        $this->funcionalidades = $funcionalidades;
    }

    public function getId() {
        return $this->id;
    }

    public function getNomeDoPerfil() {
        return $this->nomeDoPerfil;
    }

    public function getResponsavelFinanceiro() {
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
