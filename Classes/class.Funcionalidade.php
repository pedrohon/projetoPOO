<?php

include_once '../global.php';

class Funcionalidade extends persist {

  static $local_filename = "Funcionalidade.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

}