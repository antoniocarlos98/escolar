<?php 
require_once("../../conexao.php"); 
@session_start();
$cpf_usuario = $_SESSION['cpf_usuario'];

$titulo = $_POST['titulo'];
$mensagem = $_POST['mensagem'];
$professor = $_POST['id_professor'];
$id = $_POST['txtid2'];
$id_aluno = $_POST['id_aluno'];

if($titulo == ""){
	echo 'O Título é obrigatório';
	exit();
}

if($mensagem == ""){
	echo 'A descrição é Obrigatória!';
	exit();
}



//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['arquivo']['name']);
$caminho = '../../img/arquivos-aula/' .$nome_img;
if (@$_FILES['arquivo']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['arquivo']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'pdf' or $ext == 'zip' or $ext == 'rar'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}



$res = $pdo->prepare("INSERT INTO mensagens SET titulo = :titulo, mensagem = :mensagem, professor = :professor, arquivo = '$imagem', aluno = :aluno, data = curDate(), hora = curTime()");	


$res->bindValue(":titulo", $titulo);
$res->bindValue(":mensagem", $mensagem);
$res->bindValue(":professor", $professor);
$res->bindValue(":aluno", $id_aluno);

$res->execute();


echo 'Salvo com Sucesso!';

?>