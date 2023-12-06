<?php

include_once '../global.php';

// include_once 'persist.php';

class Usuario extends Pessoa { 

  static $local_filename = "Usuario.txt";

  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $login;
  protected $senha;
  protected $idPerfil;
  protected $logado;
  private static $instancia;

 
  public function __construct($nome, $telefone, $email, $cpf, $rg, $login, $senha, $idPerfil) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->login = $login;
    $this->senha = $senha;
    $this->idPerfil = $idPerfil;
  }
  
   public static function getInstancia($login, $senha){
    if (!self::$instancia){
        self::$instancia = new Usuario($login, $senha);
    }
    return self::$instancia;
  }

  public function getLogin() {
    return $this->login;
  }

  public function getSenha() {
    return $this->senha;
  }

  public function getIdPerfil() {
    return $this->idPerfil;
  }

  public function setLogin($login) {
    $this->login = $login;
  }

  public function setSenha($senha) {
    $this->senha = $senha;
  }

  public function setIdPerfil($idPerfil) {
    $this->idPerfil = $idPerfil;
  }

  public function realizaLogin($login, $senha){
    try{
        if($this->logado){
            throw new Exception("Já existe um usuário logado.");
        }
        if($login == $this->login && $senha == $this->senha){
            echo "Login realizado com sucesso! Olá, $login.";
            $this->logado = true;
        }else {
            throw new Exception("Falha no login. Credencial não encontrada.");
        }
      } 
      catch (Exception $e){
        echo "Erro: " . $e->getMessage();
      }
    }
  
  public function realizaLogout(){
        $this->logado = false;
        echo "Logout realizado com sucesso.";
    }
}    

  

  //TESTE

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


?>