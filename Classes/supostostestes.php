<?php

include_once '../global.php';

echo "\n ---------------- cadastro de algumas funcionalidades, perfis e usuarios para uso no usuario ------------------- \n\n";
$funcionalidade1 = new Funcionalidade("Cadastro Dentista");
$funcionalidade2 = new Funcionalidade("Cadastro Especialidade");
$funcionalidade3 = new Funcionalidade("Cadastro Orcamento");
$funcionalidade4 = new Funcionalidade("Cadastro Cliente");
$funcionalidade5 = new Funcionalidade("Cadastro Procedimento");
$funcionalidade1->salvarFuncionalidade();
$funcionalidade2->salvarFuncionalidade();
$funcionalidade3->salvarFuncionalidade();
$funcionalidade4->salvarFuncionalidade();
$funcionalidade5->salvarFuncionalidade();

$funcionalidadesAdmin = [$funcionalidade1, $funcionalidade2, $funcionalidade3, $funcionalidade4, $funcionalidade5];
$funcionalidesDentista = [$funcionalidade2, $funcionalidade3, $funcionalidade4];
$perfil1 = new Perfil("Administrador", $funcionalidadesAdmin);
$perfil2 = new Perfil("Dentista", $funcionalidesDentista);
$perfil1->salvarPerfil();
$perfil2->salvarPerfil();

$usuarioAdmin    = new Usuario("admin", "admin", $perfil1);
$usuarioDentista = new Usuario("pedro", "senha", $perfil2);
$usuarioAdmin->salvarUsuario();
$usuarioDentista->salvarUsuario();
echo "\n ----------------------------------------------------------------------------------------------------------------- \n";

echo "\n\tTESTE 1\n"; 
echo "\ttentar acessar uma funcionalidade qualquer sem que se tenha realizado login de usuário\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n";

$usuario1 = Usuario::getInstancia("admin", "admin");
$cadastroCliente = new CadastroCliente();
$cadastroCliente->cadastrarNovoCliente($usuario1, "Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");
echo "\n ----------------------------------------------------------------------------------------------------------------- \n";


echo "\n\tTESTE 2\n"; 
echo "\tusuário previamente cadastrado e com perfil de acesso a todas as funcionalidades, exceto Cadastrar Procedimento,\n";
echo "\tdeve fazer o login no sistema com sucesso para iniciar os testes\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n";

//$usuario1 = Usuario::getInstancia("pedro", "senha");
$usuario1 = Usuario::getInstancia("admin", "admin");
$usuario1->realizaLogin();
$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Extração Comum", "Não inclui dente siso.", 280, 1);

/* ele conseguiria cadastrar um Cliente
$cadastroCliente = new CadastroCliente();
$cadastroCliente->cadastrarNovoCliente($usuario1, "Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");
*/


//$usuario1 = new Usuario("admin", "admin", $perfil1);
//$usuario2 = new Usuario("pedro", "pedro", $perfil2);
//$usuario1->salvarUsuario();
//$usuario2->salvarUsuario();

//$usuario1->realizaLogout();
//$usuario1->realizaLogin();








// tente realizar o cadastro de um Procedimento com este usuário e comprove que o controle de acesso funciona satisfatoriamente
// em seguida faça o logout deste usuário
// outro usuário previamente cadastrado, com perfil de acesso a todas as funcionalidades, deverá fazer o login para a sequência dos testes

echo "\n\tTESTE 3\n"; 
echo "\tCadastro dos procedimentos\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n";

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Limpeza", " ", 200, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Restauração", "", 185, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Extração Comum", "Não inclui dente siso.", 280, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Canal", "", 800, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Extração de Siso", "Valor por dente", 400, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Clareamento a laser", " ", 1700, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Clareamento de moldeira", "Clareamento caseiro", 900, 1);

echo "\n\tTESTE 4\n"; 
echo "\tCadastro das especialidades\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n";

$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade($usuario1, "Clínica Geral", ["Limpeza", "Restauração", "Extração Comum"], 0.4);

$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade($usuario1, "Endodontia", ["Canal"], 0.4);
    
$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade($usuario1, "Cirurgia", ["Extração de Siso"], 0.4);
        
$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade($usuario1, "Estética", ["Clareamento a laser", "Clareamento a moldeira"], 0.4);


echo "\n\tTESTE 4\n"; 
echo "\tCadastro dos dentistas\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n";

$cadastroDentista = new CadastroDentista();
$cadastroDentista->cadastrarNovoDentista("Alice", "987654321", "alice@example.com", "987.654.321-02", "7654321", 5000, "Rua ABC", "Dentista", "12345", [" Clínica Geral", "Endodontia", "Cirurgia"], false);

$cadastroDentista = new CadastroDentista();
$cadastroDentista->cadastrarNovoDentista("Lucas", "9123456789", "lucas@example.com", "123.456.789-02", "1234567", 0, "Rua CBA", "Dentista", "54321", [" Clínica Geral", "Estética"], true);


echo "\n\tTESTE 5\n"; 
echo "\tCadastro do cliente e paciente\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

//$cadastroCliente = new CadastroCliente();
//$cadastroCliente->cadastrarNovoCliente($usuario1, "Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");
 
//$cadastroPaciente = new cadastroPaciente();
//$cadastroPaciente->cadastrarNovoPaciente($usuario1, "Paulo", "(12) 00000-0000", "paulo@email.com", "123.458.789-10", "12.345.678-9", "1997-12-10", $cliente);

echo "\n\tTESTE 6\n"; 
echo "\tAgendamento de consulta de avaliação para dia 06/11 às 14h\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

//agendamento de uma consulta de avaliação com o dentista parceiro para o dia 06/11 às 14h
$novaConsultaDeAvaliacao = ConsultaDeAvaliacao::AgendarConsultaDeAvaliacao("123.456.789-10", "54321", "2023-11-06 14:00:00");
$novaConsultaDeAvaliacao -> ConfirmarRealizacaoDaConsulta();

/*
//após a realização da consulta de avaliação, deve ser cadastrado um orçamento para o paciente (olhar especificações do orçamento no pdf do prof)
$cadastroOrcamento = new CadastroOrcamento();
$orcamento = $cadastroOrcamento->cadastrarNovoOrcamento($paciente, "54321", "2023-12-06 03:24:00", ["Limpeza","Clareamento a laser", "Restauração", "Restauração"]);
$tratamento = $orcamento->aprovarOrcamento("Cartão de crédito");

//agendada uma consulta para realização de cada procedimento.
//agendar as consultas 
//confirmar a ralizacao dos procedimentos


// paciente deve realizar dois pagamentos: 50% à vista no pix e 50% no cartão de crédito em 3x
$valorPago = ($tratamento->getValorTotal())/2;

RegistroDePagamento::RegistrarPagamento($tratamento, "PIX", 1, $valorPago, "2023-12-06 07:23:00");
RegistroDePagamento::RegistrarPagamento($tratamento, "Cartão de crédito", 3, $valorPago, "2023-12-06 07:24:00");

//cálculo do resultado financeiro da clínica no mês de novembro/2023




//cadastrando cliente e paciente
$cliente = new Cliente("Pedro Nunes", "(12) 95465-1121", "pedro@email.com", "123.456.789-10", "12.345.678-9");
$cliente -> salvarCliente();

$paciente = new Paciente("Paulo", "(12) 00000-0000", "paulo@email.com", "123.458.789-10", "12.345.678-9", "Limpeza", "1997-12-10", $cliente);
$paciente -> salvarPaciente();

$cliente -> adicionarPaciente($cliente, $paciente);


//agendamento de uma consulta de avaliação com o dentista parceiro para o dia 06/11 às 14h
$arrayDentistas = Dentista::getRecordsByField( "cpf", '123.456.789-02'); 
if (empty($arrayDentistas)) 
    $dentistaExecutor = 0;
else 
    $dentistaExecutor = $arrayDentistas[0];
  
$pacienteAgendado = Paciente::buscarPaciente('123.458.789-10');

if ($dentistaExecutor != 0 && $pacienteAgendado != 0 )
    $consultaAvaliacao = new Consulta($pacienteAgendado, $dentistaExecutor, "2013-11-06 14:00:00", 60, null, true);


//após a realização da consulta de avaliação, deve ser cadastrado um orçamento para o paciente (olhar especificações do orçamento no pdf do prof)
$arrayProcedimentos1 = Procedimento::getRecordsByField( "nomeDoProcedimento", "Limpeza"); 
if (empty($arrayProcedimentos1)) 
    $procedimentoParaExecutar1 = 0;
else 
    $procedimentoParaExecutar1 = $arrayProcedimentos1[0];

$arrayProcedimentos2 = Procedimento::getRecordsByField( "nomeDoProcedimento", "Clareamento a laser"); 
if (empty($arrayProcedimentos2)) 
    $procedimentoParaExecutar2 = 0;
else 
    $procedimentoParaExecutar2 = $arrayProcedimentos2[0];

$arrayProcedimentos3 = Procedimento::getRecordsByField( "nomeDoProcedimento", "Restauração"); 
if (empty($arrayProcedimentos3)) 
    $procedimentoParaExecutar3 = 0;
else 
    $procedimentoParaExecutar3 = $arrayProcedimentos3[0];


$orcamento = new Orcamento($pacienteAgendado, $dentistaExecutor, "2013-11-06 14:00:00", [$procedimentoParaExecutar1, $procedimentoParaExecutar2, $procedimentoParaExecutar3, $procedimentoParaExecutar3], 2270);
$orcamento->save();

//agendada uma consulta para realização de cada procedimento o após a consulta de avaliação e posterior aprovação do orçamento.

// paciente deve realizar dois pagamentos: 50% à vista no pix e 50% no cartão de crédito em 3x


//cálculo do resultado financeiro da clínica no mês de novembro/2023
*/