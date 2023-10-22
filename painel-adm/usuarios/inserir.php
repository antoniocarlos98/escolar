<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($email == ""){
	echo 'O email é Obrigatório!';
	exit();
}

if($senha == ""){
	echo 'A senha é Obrigatória!';
	exit();
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM usuarios where email = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}

$res2 = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = '$id'");	
	
$res2->bindValue(":nome", $nome);
$res2->bindValue(":email", $email);
$res2->bindValue(":senha", $senha);

$res2->execute();

echo 'Salvo com Sucesso!';

?>