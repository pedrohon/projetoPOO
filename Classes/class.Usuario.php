<?php

include_once '../global.php';

class Usuario extends persist{

  static $local_filename = "Usuario.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $login;
  protected $senha;
  protected $perfilDoUsuario;
  private static $instancia;
  private $logado = false;

  public function __construct($login, $senha, Perfil $perfilDoUsuario){
    $this->login = $login;
    $this->senha = $senha;
    $this->perfilDoUsuario = $perfilDoUsuario;
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

    public function salvarUsuario (){
      $usuarioExistente = Usuario::buscarUsuario($this->login);
  
      if (!$usuarioExistente) {
        $this->save();
        echo "\n Usuário cadastrado com sucesso!\n";
      } 
      
      else {
        echo "\nUsuário já cadastrado!\n";
      }
    }

    static public function buscarUsuario($login){
      try{
        $usuarioBuscado = Usuario::getRecordsByField( "login", $login );
        if (empty($usuarioBuscado)) {
          return 0;
        } else {
          return $usuarioBuscado[0];
        }
      }
      catch (Exception $e) {
        echo $e->getMessage();
      }
    }

  //Apenas para fins de testes
    static public function getUsuarios(){
      $usuarios = Usuario::getRecords();
      
      foreach ($usuarios as $usuario) {
        $usuario->printMe();
      }
    }

    public function printMe(){
      echo "\nInformações do Usuário:\n";
      echo "-----------------------\n";
      echo "Login: "                       . $this->login . "\n";
      echo "Senha: "                       . $this->senha . "\n";
      echo "Perfil do Usuário: "           . $this->perfilDoUsuario->getNomeDoPerfil() . "\n";
    }

}
  
?>