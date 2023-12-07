<?php

include_once '../global.php';

echo "\n ---------------- cadastro de algumas funcionalidades, perfis e usuarios para uso no usuario ------------------- \n\n";
$funcionalidade1 = new Funcionalidade("Cadastro Dentista");
$funcionalidade2 = new Funcionalidade("Cadastro Especialidade");
$funcionalidade3 = new Funcionalidade("Cadastro Orçamento");
$funcionalidade4 = new Funcionalidade("Cadastro Cliente");
$funcionalidade5 = new Funcionalidade("Cadastro Procedimento");
$funcionalidade6 = new Funcionalidade("Cadastro Paciente");
$funcionalidade7 = new Funcionalidade("Agendamento de Consulta de Avaliação");
$funcionalidade8 = new Funcionalidade("Cadastro Profissional");
$funcionalidade9 = new Funcionalidade("Agendamento Consulta");
$funcionalidade10 = new Funcionalidade("Registro de Pagamento");
$funcionalidade1->salvarFuncionalidade();
$funcionalidade2->salvarFuncionalidade();
$funcionalidade3->salvarFuncionalidade();
$funcionalidade4->salvarFuncionalidade();
$funcionalidade5->salvarFuncionalidade();
$funcionalidade6->salvarFuncionalidade();
$funcionalidade7->salvarFuncionalidade();
$funcionalidade8->salvarFuncionalidade();
$funcionalidade9->salvarFuncionalidade();
$funcionalidade10->salvarFuncionalidade();

$funcionalidadesAdmin = [$funcionalidade1, $funcionalidade2, $funcionalidade3, $funcionalidade4, $funcionalidade5, $funcionalidade6, $funcionalidade7, $funcionalidade8, $funcionalidade9, $funcionalidade10];
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

$usuario1 = Usuario::getInstancia("pedro", "senha");
$usuario1->realizaLogin();

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento($usuario1, "Extração Comum", "Não inclui dente siso.", 280, 1);

$usuario1->realizaLogout();

$usuario1 = Usuario::getInstancia("admin", "admin");
$usuario1->realizaLogin();


/* ele conseguiria cadastrar um Cliente
$cadastroCliente = new CadastroCliente();
$cadastroCliente->cadastrarNovoCliente($usuario1, "Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");
*/

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
$cadastroDentista->cadastrarNovoDentista($usuario1, "Alice", "987654321", "alice@example.com", "987.654.321-02", "7654321", 5000, "Rua ABC", "Dentista", "12345", [" Clínica Geral", "Endodontia", "Cirurgia"], false);

$cadastroDentista = new CadastroDentista();
$cadastroDentista->cadastrarNovoDentista($usuario1, "Lucas", "9123456789", "lucas@example.com", "123.456.789-02", "1234567", 0, "Rua CBA", "Dentista", "54321", [" Clínica Geral", "Estética"], true);


echo "\n\tTESTE 5\n"; 
echo "\tCadastro do cliente e paciente\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

$cadastroCliente = new CadastroCliente();
$cliente = $cadastroCliente->cadastrarNovoCliente($usuario1, "Pedro", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9");

$cadastroPaciente = new cadastroPaciente();
$paciente = $cadastroPaciente->cadastrarNovoPaciente($usuario1, "Paulo", "(12) 00000-0000", "paulo@email.com", "123.458.789-10", "12.345.678-9", "1997-12-10", $cliente);

echo "\n\tTESTE 6\n"; 
echo "\tAgendamento de consulta de avaliação para dia 06/11 às 14h\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

$novaConsultaDeAvaliacao = ConsultaDeAvaliacao::AgendarConsultaDeAvaliacao($usuario1, $paciente, "54321", "2023-11-06 14:00:00");
$novaConsultaDeAvaliacao -> ConfirmarRealizacaoDaConsulta();

echo "\n\tTESTE 7\n"; 
echo "\tCadastro e aprovação do orçamento\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

$cadastroOrcamento = new CadastroOrcamento();
$orcamento = $cadastroOrcamento->cadastrarNovoOrcamento($usuario1, $paciente, "54321", "2023-12-06 03:24:00", ["Limpeza","Clareamento a laser", "Restauração", "Restauração"]);
$tratamento = $orcamento->aprovarOrcamento("Cartão de crédito");

echo "\n\tTESTE 8\n"; 
echo "\tAgendar consultas do tratamento\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

$novaConsulta = AgendamentoDeConsulta::AgendarConsulta($usuario1, $paciente, "12345", "2023-12-13 13:00:00", 30, "Limpeza");
$novaConsulta = AgendamentoDeConsulta::AgendarConsulta($usuario1, $paciente, "12345", "2023-12-13 13:30:00", 180, "Clareamento a laser");
$novaConsulta = AgendamentoDeConsulta::AgendarConsulta($usuario1, $paciente, "12345", "2023-12-13 16:30:00", 60, "Restauração");
$novaConsulta = AgendamentoDeConsulta::AgendarConsulta($usuario1, $paciente, "12345", "2023-12-13 17:30:00", 60, "Restauração");

echo "\n\tTESTE 9\n"; 
echo "\tConfirmar realização dos procedimentos\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

RealizacaoProcedimento::ConfirmarRealizacaoDeProcedimento("12345",$paciente,"Limpeza","2023-12-13 13:00:00");
RealizacaoProcedimento::ConfirmarRealizacaoDeProcedimento("12345",$paciente,"Clareamento a laser","2023-12-13 13:30:00");
RealizacaoProcedimento::ConfirmarRealizacaoDeProcedimento("12345",$paciente,"Restauração","2023-12-13 16:30:00");
RealizacaoProcedimento::ConfirmarRealizacaoDeProcedimento("12345",$paciente,"Restauração","2023-12-13 17:30:00");

echo "\n\tTESTE 10\n"; 
echo "\tRegistrar pagamento\n\n";
echo "----------------------------------------------------------------------------------------------------------------- \n\n"; 

$valorPago = ($tratamento->getValorTotal())/2;

RegistroDePagamento::RegistrarPagamento($usuario1, "PIX", 1, $valorPago, "2023-12-06 07:23:00");
RegistroDePagamento::RegistrarPagamento($usuario1, "Cartão de crédito", 3, $valorPago, "2023-12-06 07:24:00");

//cálculo do resultado financeiro da clínica no mês de novembro/2023
