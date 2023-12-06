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
        $funcionalidade           = new Funcionalidade("Tentativa de Login");
        $funcionalidadeGenerica   = [$funcionalidade];
        $perfilGenerico           = new Perfil("Administrador", $funcionalidadeGenerica);
        
        self::$instancia = new Usuario($login, $senha, $perfilGenerico);
    }
    return self::$instancia;
  }

  public function verificaCredenciais($login, $senha){
    try{
      $usuarioExistente = Usuario::getRecordsByField( "login", $login );
      
      if(!$usuarioExistente){
        echo 'Usuario não encontrado.';
        return false;
      }

      else{
        $loginComparado = $usuarioExistente[0]->getLogin();
        $senhaComparada = $usuarioExistente[0]->getSenha();

        if($loginComparado == $login && $senhaComparada == $senha){
          return true;
        }
        else{
          return false;
        }
      }
    }

    catch (Exception $e) {
      echo $e->getMessage();
  
    }
  }

  public function realizaLogin(){
    try{
        $login = $this->login;
        $senha = $this->senha;

        $usuario = Usuario::buscarUsuario($login);

        if(!$usuario){
            echo "\nUsuário não encontrado.\n\n";
            return null;
        }

        elseif($this->logado){
            throw new Exception("Já existe um usuário logado.\n\n");
        }

        elseif(!$this->verificaCredenciais($this->login, $senha)){
            throw new Exception("Falha no login. Credenciais incorretas.\n\n");
        }
        echo "Login realizado com sucesso! \n Olá, $login.\n\n";
        $this->logado = true;

        
    } catch (Exception $e){
        echo "Erro: " . $e->getMessage();
    }
    }

    public function realizaLogout(){
        $this->logado = false;
        self::$instancia = null;
        echo "Logout realizado com sucesso.\n\n";
    }

    public function salvarUsuario (){
      $usuarioExistente = Usuario::buscarUsuario($this->login);
  
      if (!$usuarioExistente) {
        $this->save();
        echo "\n Usuário cadastrado com sucesso!\n\n";
      } 
      
      else {
        echo "\nUsuário já cadastrado!\n\n";
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

    public function getLogin(){
      return $this->login;
    }

    public function getSenha(){
      return $this->senha;
    }

    public function getPerfilDoUsuario(){
      return $this->perfilDoUsuario;
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