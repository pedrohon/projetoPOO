<?php

include_once '../global.php';

class Funcionalidade extends persist {

  static $local_filename = "Funcionalidade.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nomeDoMetodo;

  public function __construct($nomeDoMetodo){

  $this->nomeDoMetodo=$nomeDoMetodo;
  }

  public function getNomeDoMetodo() {
    return $this->nomeDoMetodo;
  }

  public function setNomeDoMetodo($nomeDoMetodo) {
    $this->nomeDoMetodo = $nomeDoMetodo;
  }

  public function salvarFuncionalidade (){
    $funcionalidadeExistente = funcionalidade::buscarFuncionalidade($this->nomeDoMetodo);

    if (!$funcionalidadeExistente) {
      $this->save();
      echo "\n Funcionalidade cadastrada com sucesso!\n";
    } 
    
    else {
      echo "\nFuncionalidade já cadastrada!\n";
    }
}

static public function buscarFuncionalidade($nomeDoMetodo){
    try{
      $funcionalidadeBuscada = Funcionalidade::getRecordsByField( "nomeDoMetodo", $nomeDoMetodo );
      if (empty($funcionalidadeBuscada)) {
        return 0;
      } else {
        return $funcionalidadeBuscada[0];
      }
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

//Apenas para fins de testes
static public function getFuncionalidade(){
  $funcionalidades = Funcionalidade::getRecords();

  foreach ($funcionalidades as $funcionalidade) {
    $funcionalidade->printMe();
  }
}

public function printMe() {
  echo "\nInformações da Funcionalidade:\n";
  echo "------------------------------\n";
  echo "Nome do Método: "                       . $this->nomeDoMetodo . "\n";
}

}