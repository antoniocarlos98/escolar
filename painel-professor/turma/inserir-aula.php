<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$turma = $_POST['turma'];
$periodo = $_POST['periodo'];
$modulo = $_POST['modulo'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}


$res = $pdo->prepare("INSERT INTO aulas SET turma = :turma, nome = :nome, descricao = :descricao, periodo = :periodo, modulo = :modulo");	

	
$res->bindValue(":nome", $nome);
$res->bindValue(":descricao", $descricao);
$res->bindValue(":turma", $turma);
$res->bindValue(":periodo", $periodo);
$res->bindValue(":modulo", $modulo);

$res->execute();


echo 'Salvo com Sucesso!';

?>