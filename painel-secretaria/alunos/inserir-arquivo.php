<?php 
require_once("../../conexao.php"); 

$id_aluno = $_POST['id'];
$descricao = $_POST['descricao'];

//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['imagem']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);
$caminho = '../../img/arquivos/' .$nome_img;
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'zip' or $ext == 'pdf' or $ext == 'rar'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}



$pdo->query("INSERT INTO arquivos_alunos SET aluno = '$id_aluno', arquivo = '$imagem', data = curDate(), descricao = '$descricao'");	


echo 'Salvo com Sucesso!';

?>