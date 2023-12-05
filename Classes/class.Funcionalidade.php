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

  public function getnomeDoMetodo() {
    return $this->nomeDoMetodo;
  }
  public function setnomeDoMetodo($nomeDoMetodo) {
    $this->nomeDoMetodo = $nomeDoMetodo;
  }

}