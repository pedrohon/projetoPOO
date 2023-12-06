<?php

include_once '../global.php';

class CadastroOrcamento {
  public function cadastrarNovoOrcamento(Paciente $paciente, $dentista, $data, array $procedimentos) {
    $valorTotal = Orcamento::calcularValorTotal($procedimentos);
    $novoOrcamento = new Orcamento($paciente, $dentista, $data, $procedimentos, $valorTotal);
    $novoOrcamento->save();
    echo "Orçamento cadastrado com sucesso!\n";

    return $novoOrcamento;
  }
}