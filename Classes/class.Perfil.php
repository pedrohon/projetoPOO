<?php


include_once '../global.php';

//Fazer função para verificar se o usuário está logado e ver se ele tem acesso ao perfil
class Perfil extends persist{
    static $local_filename = "Perfil.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

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

    public function setNomeDoPerfil($nomeDoPerfil){
        $this->nomeDoPerfil = $nomeDoPerfil;
    }

    public function getFuncionalidades() {
        return $this->funcionalidades;
    }

    public function setFuncionalidades($funcionalidades){
        return $this->funcionalidades = $funcionalidades;
    }
    public function adicionarFuncionalidades(Funcionalidade $nomeDoMetodo) {
        $this->funcionalidades[] = $nomeDoMetodo;
    }

    public function removerFuncionalidades(Funcionalidade $nomeDoMetodo) {
        $key = array_search($nomeDoMetodo, $this->funcionalidades);
        if ($key !== false){
          unset($this->funcionalidades[$key]);
        }
    }
}

//TESTE

$idPerfil = 001;
$nomeDoPerfil = "Dentista";

$metodos = new Funcionalidade($nomeDoMetodo);

$nomeDoMetodo = ["Adicionar", "Remover", "Alterar"];

$perfilTeste = new Perfil($idPerfil, $nomeDoPerfil, $funcionalidades);

echo "Nome do Perfil: " . $perfilTeste->getNomeDoPerfil() . "<br>";
echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$perfilTeste->adicionarFuncionalidades(Funcionalidade [$nomeDoMetodo = "Cadastrar Especialidades"]);
$perfilTeste->adicionarFuncionalidades($funcionalidades->$metodos);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

$perfilTeste->removerFuncionalidades(Funcionalidade [$nomeDoMetodo = "Alterar"]);

echo "Funcionalidades do Perfil: " . $perfilTeste->getFuncionalidades() . "<br>";

?>