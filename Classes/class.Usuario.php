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
            throw new Exception("Já existe um usuário logado.\n");
        }
        if($login == $this->login && $senha == $this->senha){
            echo "Login realizado com sucesso! Olá, $login.\n";
            $this->logado = true;
        }else {
            throw new Exception("Falha no login. Credencial não encontrada.\n");
        }
    } catch (Exception $e){
        echo "Erro: " . $e->getMessage();
    }
    }

    public function realizaLogout(){
        $this->logado = false;
        echo "Logout realizado com sucesso.\n";
    }

  }

?>