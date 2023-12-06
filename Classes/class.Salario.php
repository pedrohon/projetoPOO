<?php

include_once '../global.php'; 

class CalculadoraSalario {
  public static function calcularSalario($valorProcedimento, $porcentagemParticipacao) {
      // Verifica se os valores são numéricos
      if (!is_numeric($valorProcedimento) || !is_numeric($porcentagemParticipacao)) {
          throw new InvalidArgumentException("Os valores devem ser numéricos.");
      }

      // Calcula o salário com base nos parâmetros fornecidos
      $salario = $valorProcedimento * ($porcentagemParticipacao / 100);

      return $salario;
  }
}

static class Salario {

  public static function calculaParticipacao ($cro, $valorProcedimento, $especialidade, $dataDoSalario) {
    
  }
}
