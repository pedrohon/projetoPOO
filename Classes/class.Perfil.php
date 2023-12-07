<?php


include_once '../global.php';

//Fazer função para verificar se o usuário está logado e ver se ele tem acesso ao perfil
class Perfil extends persist{
    static $local_filename = "Perfil.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }
    protected $nomeDoPerfil;
    protected $funcionalidades = array();

    public function __construct($nomeDoPerfil, $funcionalidades) {
        $this->nomeDoPerfil = $nomeDoPerfil;
        $this->funcionalidades = $funcionalidades;
    }
    public function getNomeDoPerfil() {
        return $this->nomeDoPerfil;
    }

    public function verificaFuncionalidade($nomeDoMetodo){
        foreach ($this->funcionalidades as $funcionalidade) {
            if($funcionalidade->getNomeDoMetodo() == $nomeDoMetodo){
                return true;            
            }
        }
        return false;
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

    public function salvarPerfil (){
        $perfilExistente = Perfil::buscarPerfil($this->nomeDoPerfil);
    
        if (!$perfilExistente) {
          $this->save();
          echo "\n Perfil cadastrado com sucesso!\n";
        } 
        
        else {
          echo "\nPerfil já cadastrado!\n";
        }
  }
  
    static public function buscarPerfil($nomeDoPerfil){
            try{
            $perfilBuscado = perfil::getRecordsByField( "nomeDoPerfil", $nomeDoPerfil );
            if (empty($perfilBuscado)) {
                return 0;
            } else {
                return $perfilBuscado[0];
            }
            }
            catch (Exception $e) {
            echo $e->getMessage();
            }
        }
    
    //Apenas para fins de testes
    static public function getPerfil(){
        $perfis = Perfil::getRecords();
        
        foreach ($perfis as $perfil) {
        $perfil->printMe();
        }
    }

    public function printMe() {
        echo "\nInformações do Perfil:\n";
        echo "------------------------\n";
        echo "Nome do Perfil: "                                 . $this->nomeDoPerfil . "\n";
        echo "Funcionalidades do Perfil: \n";
        foreach ($this->funcionalidades as $i => $funcionalidade) {
            echo "\t" . $i+1 . " - ";
            echo $funcionalidade->getNomeDoMetodo() . "\n";
        }
    }
}
?>