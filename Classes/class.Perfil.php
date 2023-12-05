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

    public function adicionarFuncionalidades(Funcionalidade $funcionalidade) {
        $this->funcionalidades[] = $funcionalidade;
    }

    public function removerFuncionalidades(Funcionalidade $funcionalidade) {
        $key = array_search($funcionalidade, $this->funcionalidades);
        if ($key !== false){
          unset($this->funcionalidades[$key]);
        }
    }
}

//TESTE

$idPerfil = 001;
$nomeDoPerfil = "Dentista";

$funcionalidades = new Funcionalidade($nomeDoMetodo);

$nomeDoMetodo = ["Adicionar", "Remover", "Alterar"];

$perfilTeste = new Perfil($idPerfil, $nomeDoPerfil, $funcionalidades);

echo "Nome do Perfil: " . $perfilTeste->getNomeDoPerfil() . "<br>";
echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$perfilTeste->adicionarFuncionalidades(Funcionalidade [$nomeDoMetodo = "Cadastrar Especialidades"]);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$funcionalidades = removerFuncionalidades(Funcionalidade [$nomeDoMetodo = "Alterar"]);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

?>