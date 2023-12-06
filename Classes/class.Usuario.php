<?php

include_once '../global.php';

class Usuario extends persist{

    static $local_filename = "Perfil.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  private $login;
  private $senha;
  private static $instancia;
  private $logado = false;

  public function __construct($login, $senha){
    $this->login = $login;
    $this->senha = $senha;
  }

  public static function getInstancia($login, $senha){
    if (!self::$instancia){
        self::$instancia = new Usuario($login, $senha);
    }
    return self::$instancia;
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
    } catch (Exception $e){
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