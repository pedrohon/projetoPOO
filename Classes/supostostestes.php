<?php

include_once '../global.php';

// TESTE 1 

// tentar acessar uma funcionalidade qualquer sem que se tenha realizado login de usuário

// TESTE 2

// usuário previamente cadastrado e com perfil de acesso a todas as funcionalidades, exceto Cadastrar Procedimento, deve fazer o login no sistema com sucesso para iniciar os testes
// tente realizar o cadastro de um Procedimento com este usuário e comprove que o controle de acesso funciona satisfatoriamente
// em seguida faça o logout deste usuário
// outro usuário previamente cadastrado, com perfil de acesso a todas as funcionalidades, deverá fazer o login para a sequência dos testes

// TESTE 3

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Limpeza", " ", 200, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Restauração", "", 185, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Extração Comum", "Não inclui dente siso.", 280, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Canal", "", 800, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Extração de Siso", "Valor por dente", 400, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("LimpClareamento a laser", " ", 1700, 1);

$cadastroProcedimento = new CadastroProcedimento();
$cadastroProcedimento->cadastrarNovoProcedimento("Clareamento de moldeira", "Clareamento caseiro", 900, 1);

//cadastrando especialidades
$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade("Clínica Geral", ["Limpeza", "Restauração", "Extração Comum"], 0.4);

$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade("Endodontia", ["Canal"], 0.4);

$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade("Cirurgia", ["Extração de Siso"], 0.4);

$cadastroEspecialidade = new CadastroEspecialidade();
$cadastroEspecialidade->cadastrarNovaEspecialidade("Estética", ["Clareamento a laser", "Clareamento a moldeira"], 0.4);

//cadastrando dentistas
$cadastroDentista = new CadastroDentista();
$cadastroDentista->cadastrarNovoDentista("Alice", "987654321", "alice@example.com", "987.654.321-02", "7654321", 5000, "Rua ABC", "Dentista", "12345", [" Clínica Geral", "Endodontia", "Cirurgia"], false);

$cadastroDentista = new CadastroDentista();
$cadastroDentista->cadastrarNovoDentista("Lucas", "9123456789", "lucas@example.com", "123.456.789-02", "1234567", 5000, "Rua CBA", "Dentista", "54321", [" Clínica Geral", "Estética"], true);

//cadastrando cliente e paciente
// Criar Cliente


// Criar Paciente


//agendamento de uma consulta de avaliação com o dentista parceiro para o dia 06/11 às 14h


//após a realização da consulta de avaliação, deve ser cadastrado um orçamento para o paciente (olhar especificações do orçamento no pdf do prof)

//agendada uma consulta para realização de cada procedimento o após a consulta de avaliação e posterior aprovação do orçamento.

// paciente deve realizar dois pagamentos: 50% à vista no pix e 50% no cartão de crédito em 3x

//cálculo do resultado financeiro da clínica no mês de novembro/2023
