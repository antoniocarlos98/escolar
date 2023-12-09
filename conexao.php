<?php
require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
	
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}


//recuperar configurações
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_config = @count($res);
if($total_config == 0){
	$pdo->query("INSERT INTO config SET nome_escola = 'Escola Cesár Pinheiro', telefone_escola = '(00)00000-0000', email_adm = 'sistemaedusis@gmail.com', endereco_escola = 'Rua X, Número 10 Bairro X', cidade_escola = 'Mirasselvas-Capanema', rodape_relatorios = 'Texto que vai aparecer no rodapé dos relatórios', cnpj_escola = '00000000000000', media_porcentagem_presenca = '70', media_pontos_minimo_aprovacao = '60', maximo_pontos_disciplina = '100', carga_horaria_cert = '250', ativo = 'Sim'");
}else{
	$nome_escola = $res[0]['nome_escola'];
	$telefone_escola = $res[0]['telefone_escola'];
	$email_adm = $res[0]['email_adm'];
	$endereco_escola = $res[0]['endereco_escola'];
	$cidade_escola = $res[0]['cidade_escola'];
	$rodape_relatorios = $res[0]['rodape_relatorios'];
	$cnpj_escola = $res[0]['cnpj_escola'];
	//$pgto_boleto = $res[0]['pgto_boleto'];
	$media_porcentagem_presenca = $res[0]['media_porcentagem_presenca'];
	$media_pontos_minimo_aprovacao = $res[0]['media_pontos_minimo_aprovacao'];
	$maximo_pontos_disciplina = $res[0]['maximo_pontos_disciplina'];
	$carga_horaria_cert = $res[0]['carga_horaria_cert'];
	$ativo_sistema = $res[0]['ativo'];
}



if($ativo_sistema != 'Sim' and $ativo_sistema != ''){ ?>
	<style type="text/css">
		@media only screen and (max-width: 700px) {
  			.imgsistema_mobile{
    		width:300px;
  			}    
		}		
	</style>

	<div style="text-align: center; margin-top: 100px">
	<img src="<?php echo $url ?>img/bloqueio.png" class="imgsistema_mobile">	
	</div>
<?php 
exit();
} 



?>