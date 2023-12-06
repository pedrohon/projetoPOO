<?php
include '../classes/class.Dentista.php';
include '../classes/class.Procedimento.php';
include '../classes/class.Especialidade.php';



$procedimento1 = new Procedimento('Procedimento1','procedimento detalhe 1', 10000, 2);
$procedimento2 = new Procedimento('Procedimento2','procedimento detalhe 2', 100000, 20);
$procedimento3 = new Procedimento('Procedimento3','procedimento detalhe 3', 1000000, 200);
$procedimento4 = new Procedimento('Procedimento4','procedimento detalhe 4', 10000000, 2000);

$especialidade1 = new Especialidade('Ortodontia', [$procedimento1, $procedimento2], 20);
$especialidade2 = new Especialidade('Implantodontia', [$procedimento3], 30);
$especialidade3 = new Especialidade('Teste', [$procedimento4], 3000);

// Construtor dentista
$dentista = new Dentista(
  "Mariana Sousa", 
  "(31)99999-2002", 
  "mari@example.com",
  "123.452.276-46", 
  "22-333.441", 1000,
  'rua das dores', 
  'analista de dados',
  'cro 125',
  [$especialidade1, $especialidade2], 
  'Pedro'
);

// Exibir informações da dentista
echo "\n Informações do Dentista: \n";
echo "\n---------------------------------------------\n";
echo "CRO: " . $dentista->getCro() . "\n";
echo "parceiro: " . $dentista->getParceiro() . "\n";

$especialidadesString = "Especialidades: ";
$arrayEspecialidade = $dentista->getEspecialidade();

if (empty($arrayEspecialidade)){
  foreach ($especialidade as  $arrayEspecialidade ) {
    $especialidadesString .= $especialidade->getEspecialidade() . ", ";
  }
}
echo $especialidadesString . "\n";

// Altera informações da dentista
$dentista->setCro("Teste novo nome");
$dentista->setEspecializacao([$especialidade3]);
$dentista->setParceiro("teste parceiro dois");

// Exibir novas informações da dentista
echo "\n Novas informações da Dentista: \n";
echo "\n---------------------------------------------\n";
echo "CRO: " . $dentista->getCro() . "\n";
echo "parceiro: " . $dentista->getParceiro() . "\n";

$especialidadesString = "Especialidades: ";
$arrayEspecialidade = $dentista->getEspecialidade();

if (empty($arrayEspecialidade)){
  foreach ($especialidade as  $arrayEspecialidade ) {
    $especialidadesString .= $especialidade->getEspecialidade() . ", ";
  }
}
echo $especialidadesString . "\n";

?>