<?php 
require_once("../../conexao.php"); 
@session_start();
$cpf_usuario = @$_SESSION['cpf_usuario'];
$id_pgto = $_POST['id'];
$data = $_POST['data'];
$valor_mat = $_POST['valor'];
$valor_mat = str_replace(',', '.', $valor_mat);


require_once("../baixar-mensalidade.php"); 

echo 'Baixado com Sucesso!';

?>