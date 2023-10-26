<?php 
require_once("../conexao.php"); 

$nome_escola = $_POST['nome_escola'];
$telefone_escola = $_POST['telefone_escola'];
$email_adm = $_POST['email_adm'];
$endereco_escola = $_POST['endereco_escola'];
$cidade_escola = $_POST['cidade_escola'];
$rodape_relatorios = $_POST['rodape_relatorios'];
$cnpj_escola = $_POST['cnpj_escola'];
//$pgto_boleto = $_POST['pgto_boleto'];
$media_porcentagem_presenca = $_POST['media_porcentagem_presenca'];
$media_pontos_minimo_aprovacao = $_POST['media_pontos_minimo_aprovacao'];
$maximo_pontos_disciplina = $_POST['maximo_pontos_disciplina'];
$carga_horaria_cert = $_POST['carga_horaria_cert'];



//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$caminho = '../img/logo.png';
$imagem_temp = @$_FILES['logo']['tmp_name']; 
if(@$_FILES['logo']['name'] != ""){
	$ext = pathinfo(@$_FILES['logo']['name'], PATHINFO_EXTENSION);   
	if($ext == 'png'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para a Logo é somente *PNG';
		exit();
	}

}



//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$caminho = '../img/icone.png';
$imagem_temp = @$_FILES['icone']['tmp_name']; 
if(@$_FILES['icone']['name'] != ""){
	$ext = pathinfo(@$_FILES['icone']['name'], PATHINFO_EXTENSION);   
	if($ext == 'png'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para a Logo é somente *PNG';
		exit();
	}

}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$caminho = '../img/logo.jpg';
$imagem_temp = @$_FILES['logo_rel']['tmp_name']; 
if(@$_FILES['logo_rel']['name'] != ""){
	$ext = pathinfo(@$_FILES['logo_rel']['name'], PATHINFO_EXTENSION);   
	if($ext == 'jpg'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para a Logo é somente *JPG';
		exit();
	}

}



$res2 = $pdo->prepare("UPDATE config SET nome_escola = :nome_escola, telefone_escola = :telefone_escola, email_adm = :email_adm, endereco_escola = :endereco_escola, cidade_escola = :cidade_escola, rodape_relatorios = :rodape_relatorios, cnpj_escola = :cnpj_escola,  media_porcentagem_presenca = :media_porcentagem_presenca, media_pontos_minimo_aprovacao = :media_pontos_minimo_aprovacao, maximo_pontos_disciplina = :maximo_pontos_disciplina, carga_horaria_cert = :carga_horaria_cert");
	
$res2->bindValue(":nome_escola", $nome_escola);
$res2->bindValue(":telefone_escola", $telefone_escola);
$res2->bindValue(":email_adm", $email_adm);
$res2->bindValue(":endereco_escola", $endereco_escola);
$res2->bindValue(":cidade_escola", $cidade_escola);
$res2->bindValue(":rodape_relatorios", $rodape_relatorios);
$res2->bindValue(":cnpj_escola", $cnpj_escola);
//$res2->bindValue(":pgto_boleto", $pgto_boleto);
$res2->bindValue(":media_porcentagem_presenca", $media_porcentagem_presenca);
$res2->bindValue(":media_pontos_minimo_aprovacao", $media_pontos_minimo_aprovacao);
$res2->bindValue(":maximo_pontos_disciplina", $maximo_pontos_disciplina);
$res2->bindValue(":carga_horaria_cert", $carga_horaria_cert);
$res2->execute();

echo 'Salvo com Sucesso!';

?>