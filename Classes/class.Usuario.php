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
            throw new Exception("Já existe um usuário logado.\n");
        }
        if($login == $this->login && $senha == $this->senha){
            echo "Login realizado com sucesso! Olá, $login.\n";
            $this->logado = true;
        }else {
            throw new Exception("Falha no login. Credencial não encontrada.\n");
        }
      } 
      catch (Exception $e){
        echo "Erro: " . $e->getMessage();
      }
    }
  
  public function realizaLogout(){
        $this->logado = false;
        echo "Logout realizado com sucesso.\n";
    }
}    
?>