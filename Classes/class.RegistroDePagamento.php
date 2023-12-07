<?php

include_once '../global.php';

class RegistroDePagamento extends persist {

  static $local_filename = "RegistroDePagamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $valorPago;
  protected $dataPagamento;
  protected $tratamento;

  public function __construct($valorPago, $dataPagamento, Tratamento $tratamento) {
    $this->valorPago = $valorPago;
    $this->dataPagamento = $dataPagamento;
    $this->tratamento = $tratamento;
  }

  public function acessarFormaDePagamento(FormaDePagamento $nomeFormaDePagamento){
    $nomeFormaDePagamento = getNomeFormaDePagamento();//pq nao vai?
  }

  public function getValorPago() {
    return $this->valorPago;
  }

  public function getDataPagamento() {
    return $this->dataPagamento;
  }
 
  public function setValorPago($valorPago) {
    $this->valorPago = $valorPago;
  }

  public function setDataPagamento($dataPagamento) {
    $this->dataPagamento = $dataPagamento;
  }

  public function RegistrarPagamento ($usuario, $tratamento, $formaDePagamento, $parcelas, $valorPago, $dataPagamento) {
    $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Registro de Pagamento");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
          $novoRegistro = new RegistroDePagamento ($tratamento, $formaDePagamento, $parcelas, $valorPago, $dataPagamento);
          $novoRegistro->save();
          echo ("Pagamento registrado\n");
          return $novoRegistro;
        }
        else{
          if(!$usuarioLogado){
              echo "\nErro: Não foi possível realizar o registro de pagamento porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
          }
          else{
              echo "\nErro: Não foi possível realizar o registro de pagamento porque o usuário '" . $usuario->getLogin() . "' não tem permissão para realizar esse registro!\n\n";
          }
        }




    
  }

  public function salvarRegistroDePagamento () {
    $this->save();
    //assim que dar o save deve fazer a lógica de calcula de imposto etc mas ainda falta criar a classe que fala disso
  }

public function calculaImposto(){
    $percentualImposto = 20;
    $imposto = ($percentualImposto / 100) * $this->valorPago;
    return $imposto;
}

public function DateTimeBr($dataPagamento){
    $formatoOriginal = 'd/m/Y';
    $dataObjeto = DateTime::createFromFormat($formatoOriginal, $dataPagamento);
    //verifica a conversão
    if (!$dataObjeto){
        throw new InvalidArgumentException("Formato da data inváido! Use dd/mm/aaaa.");
    }
    return $dataObjeto;
}

}









