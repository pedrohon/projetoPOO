<?php    

    include_once '../global.php'; 

    abstract class persist {
        private ?string $filename;
        private ?int $index = null; 
        public function __construct() {        
            if (func_num_args()==1) {
                $this->filename = func_get_arg(0);	                		
			}  
            else if (func_num_args()==2) {
                $this->filename = func_get_arg(0);	
                $this->index = func_get_arg(1);              
			}             
			else {
				throw( new Exception('Eror ao instanciar objeto da classe Persist - Número de parâmetros incorreto.'));
            }
        }

        public function __destruct() {
            //print "Destroying " . __CLASS__ . "\n";
        }

        public function load($p_obj) {           
           $class_vars = get_class_vars(get_class($p_obj));
            foreach ($class_vars as $name => $value) {
                echo "$name : $value\n";
                $this->$name = $value;            
            }
        }             

        public function save() {
            if ( $this->index != null ) 
                $this->edit();            
            else               
                $this->insert();            
        }

        private function insert() {           
            $container = new container(get_called_class()::getFilename());
            //print_r(get_called_class()::getFilename()); exit();                     
            $container->addObject($this);
            $container->persist();
        }

        private function edit() {            
            $container = new container(get_called_class()::getFilename());                  
            $container->editObject( $this->index, $this );
            $container->persist();
        }

        static public function getRecordsByField( $p_field, $p_value ) {            
            $container = new container(get_called_class()::getFilename());
            //$container = container::getInstance(get_called_class()::getFilename());          
            $objs = $container->getObjects();  
            $matchObjects = array();         
            for ( $i=0; $i<count($objs); $i++) {
                if ( $objs[$i]->$p_field == $p_value ) {                   
                    array_push( $matchObjects, $objs[$i] );
                }               
            }
            if ( count($matchObjects) > 0 )
                return $matchObjects;
            else
                throw( new Exception('Registro não encontrado.'));
        }

        static public function getRecords() {            
            $container = new container(get_called_class()::getFilename());
            //$container = container::getInstance(get_called_class()::getFilename());          
            $objs = $container->getObjects();            
            return $objs;
        }

        public function setIndex( int $index ) {
            $this->index = $index;
        }

        public function __toString()
        {
            return print_r($this);
        }

        abstract static public function getFilename();
    }

class Pessoa extends persist { 

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


class Procedimento extends persist {

  static $local_filename = "Procedimento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }


  protected $id;
  protected $nomeDoProcedimento;
  protected $detalhamentoDoProcedimento;
  protected $valorUnitario;
  protected $qntDeConsultas;

  public function __construct($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
    $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
    $this->valorUnitario = $valorUnitario;
    $this->qntDeConsultas = $qntDeConsultas;  
  }

  public function getNomeDoProcedimento() {
    return $this->nomeDoProcedimento;
  }

  public function getDescricaoDoProcedimento() {
    return $this->detalhamentoDoProcedimento;
  }

  public function getValorUnitario() {
    return $this->valorUnitario;
  }

  public function setNomeDoProcedimento($nomeDoProcedimento) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
  }

  public function setDescricaoDoProcedimento($detalhamentoDoProcedimento) {
    $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
  }

  public function setValorUnitario($valorUnitario) {
    $this->valorUnitario = $valorUnitario;
  }

  /*public function getQntDeConsultas() {
  return $this->qntDeConsultas;
}*/

public function calcularQtdConsultas($procedimento){
  // calcula a quantidade de consultas nececessárias para determinado procedimento
    switch($procedimento){
      case "Extração de dente":
        return $qntDeConsultas = 1;
      case "Tratamento com aparelho fixo": //mínimo de 1 ano, de 15 em 15
        return $qntDeConsultas = 26;
      case "Limpeza":
        return $qntDeConsultas = 1;
      case "Restauração":
        return $qntDeConsultas = 1;
      case "Extração Comum":
        return $qntDeConsultas = 1;
      case "Canal":
        return $qntDeConsultas = 1;
      case "Extração de Siso":
        return $qntDeConsultas = 1;
      case "Clareamento a laser":
        return $qntDeConsultas = 1;
      case "Clareamento de moldeira":
        return $qntDeConsultas = 1;
      default:
        return $qntDeConsultas = 1; //mínimo de consultas
    }
  }
}



class Profissional extends Pessoa {
  static $local_filename = "Profissional.txt";
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


  public function salvarProfissional () {
    $this->save();
  }
}



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
  array_push($this->especialidade, $especialidade);
}


  public function getParceiro() {
    return $this->parceiro;
  }


  public function setCro($cro) {
    $this->cro = $cro;
  }

  public function setEspecializacao(array $especialidade) {
    $this->especialidade = $especialidade;
  }

  public function setParceiro($parceiro) {
    $this->parceiro = $parceiro;
  }

  public function salvarDentista () {
    $this->save();
  }

}






class Paciente extends Pessoa {

  static $local_filename = "Paciente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $tratamento = array();
  protected $responsavelFinanceiro;
  protected $dataDeNascimento;

  public function __construct($nome, $telefone, $email, $cpf, $rg, $tratamento, $dataDeNascimento, /*Cliente*/ $responsavelFinanceiro) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->tratamento = $tratamento;
    $this->dataDeNascimento = $dataDeNascimento;
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function getTratamento() {
    return $this->tratamento;
  }

  public function getDataDeNascimento() {
    return $this->dataDeNascimento;
  }

  public function getResponsavelFinanceiro() {
    return $this->responsavelFinanceiro;
  }

  public function adicionarTratamento(Tratamento $tratamento) {
    $this->tratamento[] = $tratamento;
  }

  public function setDataDeNascimento($dataDeNascimento) {
    $this->dataDeNascimento = $dataDeNascimento;
  }

  public function setResponsavelFinanceiro($responsavelFinanceiro) {
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function printMe() {
    echo"<br>";
    echo "----------------------------------------------------------</br>";
    echo "</br>INFORMAÇÕES DO PACIENTE</br>";
    echo "----------------------------------------------------------</br>";
    echo "</br>Nome: " . $this->nome . "</br>";
    echo "</br>Telefone: " . $this->telefone . "</br>";
    echo "</br>Email: " . $this->email . "</br>";
    echo "</br>CPF: " . $this->cpf . "</br>";
    echo "</br>RG: " . $this->rg . "</br>";
    //echo "\nTratamento: " . $this->tratamento . "\n";
    echo "</br>Data de Nascimento: " . $this->dataDeNascimento . "</br>";
   
    echo "</br>Responsável Financeiro: Maria Nunes </br>";
    echo "</br>-------------------------------------------------------------</br>";
    echo ("Status: Orçamento aprovado e tratamento gerado");
    echo "</br>-------------------------------------------------------------</br>";
    echo "<br><br><br>";
    //echo $this->responsavelFinanceiro->printMe() . "\n";
  }


  public function salvarPaciente (){
    $pacienteExistente = Paciente::buscarPaciente($this->cpf);

    if (!$pacienteExistente) {
      $this->save();
      echo "\n Paciente cadastrado com sucesso!\n";
    } 
    else {
      echo "\nPaciente já cadastrado!\n";
    }
  }

  static public function getPacientes(){
    $pacientes = Paciente::getRecords();
    
    foreach ($pacientes as $paciente) {
      $paciente->printMe();
    }
  }


  static public function buscarPaciente($cpf){
    try{
      $pacienteBuscado = Paciente::getRecordsByField( "cpf", $cpf );
      if (empty($pacienteBuscado)) {
        return 0;
      } else {
        return $pacienteBuscado[0];
      }
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}






class ConsultaDeAvaliacao extends persist {

  static $local_filename = "ConsultaDeAvaliacao.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $paciente;
  protected $dentistaAvaliador;
  protected $data;
  protected $duracaoPrevista;
  protected $foiRealizada;

  public function __construct($paciente, $dentistaAvaliador, $data) {
    $this->paciente = $paciente;
    $this->dentistaAvaliador = $dentistaAvaliador;
    $this->data = $data;
    $this->duracaoPrevista = 30;
    $this->foiRealizada = false;
  }

  static public function AgendarConsultaDeAvaliacao ($paciente, $dentistaAvaliador, $data) {
    $novaConsultaDeAvaliacao = new ConsultaDeAvaliacao ($paciente, $dentistaAvaliador, $data);
    $novaConsultaDeAvaliacao->save();

    echo"<br>";
    echo "----------------------------------------------------------</br>";
    echo "</br>CONSULTA DE AVALIAÇÃO</br>";
    echo "----------------------------------------------------------</br>";
    echo "Data e Horário: " . $data . "</br>";
    echo "Dentista avaliador: ".$dentistaAvaliador. "</br>";
    echo "----------------------------------------------------------</br>";

    return $novaConsultaDeAvaliacao;
  }

  public function ConfirmarRealizacaoDaConsulta () {
    $this->foiRealizada = true;
    $this->save();
    echo ("Consulta de avaliação foi realizada\n");
  }

  static public function gerarOrcamento ($procedimentos) {

    $valorTotal = 0;

    //foreach ($procedimentos as $procedimento) {
     // $x = Procedimento::getRecordsByField( "nomeDoProcedimento", $procedimento); 
      //$valor = $x[0]->getValorUnitario();
      //$valorTotal = $valorTotal + $valor;
    //}
  }

  public function getPaciente() {
    return $this->paciente;
  }

  public function getDentistaAvaliador() {
    return $this->dentistaAvaliador;
  }

  public function getData() {
    return $this->data;
  }

  public function getDuracaoPrevista() {
    return $this->duracaoPrevista;
  }

  public function setPaciente($paciente) {
    $this->paciente = $paciente;
  }

  public function setDentistaAvaliador($dentistaAvaliador) {
    $this->dentistaAvaliador = $dentistaAvaliador;
  }

  public function setData($data) {
    $this->data = $data;
  }

  public function setDuracaoPrevista($duracaoPrevista) {
    $this->duracaoPrevista = $duracaoPrevista;
  }
}




class Orcamento extends persist {

  static $local_filename = "Orcamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $verifica;
  protected $paciente;
  protected $dentista;
  protected $data;
  protected $procedimentos;
  protected $valorTotal;
  protected $aprovacao;

  public function __construct(Paciente $paciente, $dentista, $data, $procedimentos, ) {
    $this->paciente = $paciente;
    $this->dentista = $dentista;
    $this->data = $data;
    $this->procedimentos = $procedimentos;
    //$this->valorTotal = $valorTotal;
  }


  public function getPaciente() {
    return $this->paciente;
  }

  public function getDentista() {
    return $this->dentista;
  }

  public function getData() {
    return $this->data;
  }

  public function getProcedimentos() {
    return $this->procedimentos;
  }

  public function getValorTotal() {
    return $this->valorTotal;
  }

  public function getAprovacao() {
    return $this->aprovacao;
  }

  public function setPaciente($paciente) {
    $this->paciente = $paciente;
  }

  public function setDentista($dentista) {
    $this->dentista = $dentista;
  }

  public function setData($data) {
    $this->data = $data;
  }
 
  public function setProcedimentos($procedimentos) {
    $this->procedimentos = $procedimentos;
  }

  public function setValorTotal($valorTotal) {
    $this->valorTotal = $valorTotal;
  }

  public function setAprovacao($aprovacao) {
      $this->aprovacao = $aprovacao;
  }
  /*
    public function getProcedimentos($nomeDoProcedimento, $detalhamentoDoProcedimento){
      $this->Procedimentos[] = [
          'Procedimento' => $nomeDoProcedimento,
          'Descricao' => $detalhamentoDoProcedimento
      ];
      $this->calcularValorTotal();
  }
  */

  //static public function calcularValorTotal($procedimentos){
    
    //$valorTotal = 0;
    //foreach ($procedimentos as $procedimento) {
     // $objeto = Procedimento::getRecordsByField( "nomeDoProcedimento", $procedimento); 
      //$valorUnitario = $objeto[0]->getValorUnitario();
      //$valorTotal = $valorTotal + $valorUnitario;
   /// }
   // return $valorTotal;
  //}


  static public function calcularValorTotal($procedimentos){
    $valorTotal = 0;

    foreach ($procedimentos as $procedimento) {
        try {
            $objeto = Procedimento::getRecordsByField("nomeDoProcedimento", $procedimento);
            if (!empty($objeto)) {
                $valorUnitario = $objeto[0]->getValorUnitario();
                $valorTotal += $valorUnitario;
            } else {
                throw new Exception("Procedimento não encontrado: $procedimento");
            }
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

    return $valorTotal;
}


  public function aprovarOrcamento($formaDePagamento){

    $this->aprovacao = true;
    $cadastroTratamento = new Tratamento($this->paciente,$this->dentista,$this->data,$this->procedimentos,$this->valorTotal,$this->aprovacao, $formaDePagamento);
    $cadastroTratamento->save();
    

  

    return $cadastroTratamento;
}

public function aprovacaoparaagendamento(){

  if($this->aprovacao==true){

    return $verifica=1;
  }
}

  
}



class Consulta extends persist {

    static $local_filename = "Consulta.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
  
    protected $paciente;
    protected $dentistaExecutor;
    protected $data;
    protected $duracaoPrevista;
    protected $procedimento;
    protected $isConsultaDeAvaliacao;
  
  
    public function __construct(Paciente $paciente, Dentista $dentistaExecutor, $data, $duracaoPrevista, Procedimento $procedimento, $isConsultaDeAvaliacao = false) {
      $this->paciente = $paciente;
      $this->dentistaExecutor = $dentistaExecutor;
      $this->data = $data;
      $this->duracaoPrevista = $duracaoPrevista;
     $this->procedimento = $procedimento;
      $this->isConsultaDeAvaliacao = $isConsultaDeAvaliacao;
    }
  
    public function getPaciente() {
      return $this->paciente;
    }
  
    public function getDentistaExecutor() {
      return $this->dentistaExecutor;
    }
  
    public function getData() {
      return $this->data;
    }
  
    public function getDuracaoPrevista() {
      return $this->duracaoPrevista;
    }
  
    public function getProcedimentos() {
      return $this->procedimento;
    }
  
    public function setPaciente($paciente) {
      $this->paciente = $paciente;
    }
  
    public function setDentistaExecutor($dentistaExecutor) {
      $this->dentistaExecutor = $dentistaExecutor;
    }
  
    public function setData($data) {
      $this->data = $data;
    }
  
    public function setDuracaoPrevista($duracaoPrevista) {
      $this->duracaoPrevista = $duracaoPrevista;
    }
  
    public function setProcedimento($procedimento) {
      $this->procedimento = $procedimento;
    }
  
    public function gerarOrcamento(Orcamento $orcamento) {
      if ($this->isConsultaDeAvaliacao == true)
        return $this->duracaoPrevista;
      else 
        return null;
    }
  
    public function salvarConsulta () {
      $this->save();
    }
  }




class AgendamentoDeConsulta {

    protected $dentistaExecutor;
    protected $paciente;
    protected $dataDaConsulta;
    protected $duracaoPrevista;
    protected $qntDeConsultas;
    protected $consultas = array();

    public function __construct(Dentista $dentistaExecutor, Paciente $paciente, $dataDaConsulta, int $duracaoPrevista) {
        $this->dentistaExecutor = $dentistaExecutor;
        $this->paciente = $paciente;
        $this->dataDaConsulta = $dataDaConsulta;
        $this->duracaoPrevista = $duracaoPrevista;
    }

    public function getDentistaExecutor() {
        return $this->dentistaExecutor;
    }

    public function getPaciente() {
        return $this->paciente;
    }

    public function getDataDaConsulta() {
        return $this->dataDaConsulta;
    }

    public function getDuracaoPrevista() {
        return $this->duracaoPrevista;
    }

    public function getqntDeConsultas(){
     return $this->qntDeConsultas;
    }

    public function setDentistaExecutor($dentistaExecutor) {
        $this->dentistaExecutor = $dentistaExecutor;
    }

    public function setPaciente($paciente) {
        $this->paciente = $paciente;
    }

    public function setDataDaConsulta($dataDaConsulta) {
        $this->dataDaConsulta = $dataDaConsulta;
    }

    public function setDuracaoPrevista($duracaoPrevista) {
        $this->duracaoPrevista = $duracaoPrevista;
    }

    public function setQntDeConsultas($qntDeConsultas){
      $this->qntDeConsultas=$qntDeConsultas;
    }

    public function agendarConsulta(Orcamento $orcamento) {
      // Verifica se o orçamento foi aprovado

      return $orcamento->aprovacaoParaAgendamento();
    }   

    public function criarConsultasAutomaticamente(Orcamento $orcamento) {
        // Verifica se o orçamento foi aprovado antes de criar a consulta
        if ($this->agendarConsulta($orcamento) == true) {
            $procedimentos = ["Limpeza", "Clareamento a Laser", "Restauracao1", "Restauracao2"];

            for ($i = 0; $i < $this->qntDeConsultas; $i++) {
                // Incrementa a data para cada consulta
                $dataConsulta = new DateTime($this->dataDaConsulta);
                $dataConsulta->modify("+$i days");

                // Crie um procedimento correspondente ao índice
                $procedimento = new Procedimento(
                    $procedimentos[$i % count($procedimentos)],
                    "Detalhes do Procedimento", // Coloque detalhes apropriados
                    100.0, // Valor unitário
                    1 // Quantidade de consultas (ajuste conforme necessário)
                );

                $consulta = new Consulta(
                    $orcamento->getPaciente(),
                    $this->dentistaExecutor,
                    $dataConsulta->format('Y-m-d H:i:s'),
                    $this->duracaoPrevista,
                    $procedimento
                );

                $this->adicionarConsulta($consulta);

                if ($consulta instanceof Consulta) {
                    
                }
            }
        }
    }

    public function adicionarConsulta(Consulta $consulta) {
        $this->consultas[] = $consulta;
    } 

    public function getConsultas() {
        return $this->consultas;
    }

}

//********************************************************************************** */

$dentista = new Dentista("Dra Fabiana", "123456789", "dentista@email.com", "12345678901", "1234567", 5000, "Rua Dentista", "Dentista", "1234-D", [], "Parceiro");


$paciente = new Paciente("Pedro Nunes", "987654321", "paciente@email.com", "98765432101", "7654321", [], "01-01-2000", null);


$consultaAvaliacao = ConsultaDeAvaliacao::AgendarConsultaDeAvaliacao($paciente, "Dra Fabiana", "06-11-2023 14:00:00");

$procedimentos = ["Limpeza", "Clareamento a Laser", "Restauracao1", "Restauracao2"];

$orcamento = new Orcamento($paciente, $dentista, date("06-11-2023"), $procedimentos);


$orcamento->aprovarOrcamento("Forma de Pagamento");


$agendamento = new AgendamentoDeConsulta($dentista, $paciente, "2023-11-06 9:00:00", 30);


$agendamento->setQntDeConsultas(4); 


$agendamento->criarConsultasAutomaticamente($orcamento);


$paciente->printMe();


$consultas = $agendamento->getConsultas();
$numeroConsultas = count($consultas);
echo "<br>";
echo "</br>------------------------------------------------------------------------------------</br>";
echo "</br>CONSULTAS</br>";
echo "</br>-------------------------------------------------------------------------------------</br>";
echo "<br>";
echo "</br> *********************************************************</br>";
for ($i = 0; $i < $numeroConsultas; $i++) {
    $consulta = $consultas[$i];

    echo "</br>Data:      " .$consulta->getData() . "</br>";
    echo "Dentista:       " . $consulta->getDentistaExecutor()->getNome() . "</br>";
    echo "Procedimento:   " .($consulta->getProcedimentos()->getNomeDoProcedimento())."</br>" ;
    echo "Consulta atual:".$i+1 ."</br>" ;
    echo "Número de consultas: " . $agendamento->getqntDeConsultas() . "</br>";
    echo "</br>";
    echo "</br> *********************************************************</br>";
}