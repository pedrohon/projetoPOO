<?php



class Pessoa  { 

  static $local_filename = "Pessoa.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nome;
  protected $telefone;
  protected $email;
  protected $cpf;
  protected $rg;

  public function __construct($nome, $telefone, $email, $cpf, $rg) {
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->cpf = $cpf;
    $this->rg = $rg;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getTelefone() {
    return $this->telefone;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getCpf() {
    return $this->cpf;
  }

  public function getRg() {
    return $this->rg;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function setTelefone($telefone) {
    $this->telefone = $telefone;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setCpf($cpf) {
    $this->cpf = $cpf;
  }
  
  public function setRg($rg) {
    $this->rg = $rg;
  }
}




#include_once '../global.php'; 

class Profissional extends Pessoa {

  static $local_filename = "Pessoa.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $salario;
  protected $endereco;
  protected $cargo;

  public function __construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->salario = $salario;
    $this->endereco = $endereco;
    $this->cargo = $cargo;
  }

  public function getSalario() {
    return $this->salario;
  }

  public function getEndereco() {
    return $this->endereco;
  }

  public function getCargo() {
    return $this->cargo;
  }

  public function setSalario($salario) {
    $this->salario = $salario;
  }

  public function setEndereco($endereco) {
    $this->endereco = $endereco;
  }

  public function setCargo($cargo) {
    $this->cargo = $cargo;
  }
}


class Especialidade  {

  static $local_filename = "Especialidade.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $especialidade;
  protected $procedimento = array();

  public function __construct($especialidade, Procedimento $procedimento) {
    $this->especialidade = $especialidade;
    $this->procedimento = $procedimento;
  }

  public function getEspecialidade() {
    return $this->especialidade;
  }

  public function getProcedimento() {
    return $this->procedimento;
  }
 
  public function setEspecialidade($especialidade) {
    $this->especialidade = $especialidade;
  }
 
  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }
  
}






class Procedimento {
  private $nome;

  public function __construct($nome) {
      $this->nome = $nome;
  }

  public function getNome() {
      return $this->nome;
  }

  public function setNome($nome) {
      $this->nome = $nome;
  }
}





#***********************************************************************************


#include_once '../global.php';

class Dentista extends Profissional {

  static $local_filename = "Dentista.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $cro;
  protected $especialidade = array();
  protected $parceiro;
 

  public function __construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, array $especialidade, $parceiro) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);

    $this->cro = $cro;
    $this->especialidade = $especialidade;
    $this->parceiro = $parceiro;
    
  }

  public function getCro() {
    return $this->cro;
  }

public function getEspecialidade() {
    return $this->especialidade;
}


public function adicionarEspecialidade(Especialidade $especialidade) {
  $this->especialidade[] = $especialidade;
}


  public function getParceiro() {
    return $this->parceiro;
  }


  public function setCro($cro) {
    $this->cro = $cro;
  }

  public function setEspecializacao($especialidade) {
    $this->especialidade = $especialidade;
  }

  public function setParceiro($parceiro) {
    $this->parceiro = $parceiro;
  }

}


#**********************************************************************************************

#código para testar classe

$procedimento1 = new Procedimento('Procedimento1');
$especialidade1 = new Especialidade('Ortodontia', $procedimento1);

$procedimento2 = new Procedimento('Procedimento2');
$especialidade2 = new Especialidade('Implantodontia', $procedimento2);

// Criação de instância de Dentista
$dentista1 = new Dentista(
    'Dr. Silva',
    '123456789', // telefone
    'dr.silva@example.com',
    '12345678901', // cpf
    '98765432', // rg
    5000.00, // salario
    'Rua A, 123',
    'Dentista',
    'CRONUM123', // cro
    [$especialidade1, $especialidade2], // array de especialidades
    'Parceiro1'
);

// Exibição das informações do Dentista
echo 'Informações do Dentista:' . PHP_EOL;
echo 'Nome: ' . $dentista1->getNome() . PHP_EOL;
echo 'Telefone: ' . $dentista1->getTelefone() . PHP_EOL;
echo 'Email: ' . $dentista1->getEmail() . PHP_EOL;
echo 'CPF: ' . $dentista1->getCPF() . PHP_EOL;
echo 'RG: ' . $dentista1->getRG() . PHP_EOL;
echo 'Salário: ' . $dentista1->getSalario() . PHP_EOL;
echo 'Endereço: ' . $dentista1->getEndereco() . PHP_EOL;
echo 'Cargo: ' . $dentista1->getCargo() . PHP_EOL;
echo 'CRO: ' . $dentista1->getCro() . PHP_EOL;
echo 'Parceiro: ' . $dentista1->getParceiro() . PHP_EOL;

echo 'Especialidades: ';
foreach ($dentista1->getEspecialidade() as $especialidade) {
   echo $especialidade->getEspecialidade() . ' ';
}