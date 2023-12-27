<?php 
$url = "http://$_SERVER[HTTP_HOST]/";
$url_sistema = explode("//", $url);
if($url_sistema[1] == 'localhost/'){
	$url = "http://$_SERVER[HTTP_HOST]/escolar/";
}


//VARIAVEIS DO BANCO DE DADOS LOCAL
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sistem59_escolar';


//PASSAMOS PARA UMA TABELA
/*
$nome_escola = "Escola Cesár Pinheiro";
$endereco_escola = "Mirasselvas, Capanema-PA";
$telefone_escola = "(91)98341-8008";
$email_adm = 'admin@hotmail.com';
$rodape_relatorios = "Desenvolvido por Antonio Carlos e João Pedro";
//$cnpj_escola = '26.100.560/0000-50';
$cidade_escola = 'Capanema';

//VARIAVEIS GLOBAIS
$pgto_boleto = 'Não';  //DEIXAR SIM PARA PAGAMENTOS COM BOLETO OU CARNE, APENAS PARA DAR A POSSIBILIDADE DO TESOUREIRO CARREGAR OS ARQUIVOS

$media_porcentagem_presenca = 70; //70 define que a média limite para presença é de 70%;

$media_pontos_minimo_aprovacao = 60; // o aluno vai precisar de no minimo 60 pontos para aprovação no curso

$maximo_pontos_disciplina = 100; // Maximo de pontos possiveis para distribuir em cada disciplina

$carga_horaria_cert = 250; //TEMPO EM HORAS DOS CURSOS
*/
 ?>