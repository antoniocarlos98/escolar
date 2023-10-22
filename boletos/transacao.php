<?php
require_once("../conexao.php");
//ALIMENTAR O BOLETO
$id = $_GET['id'];
if($id == ""){
  echo 'Você não selecionou uma conta válida para Pagar!';
  exit();
}

$query = $pdo->query("SELECT * FROM pgto_matriculas where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

    $titulo = 'Pagamento de Mensalidade';
    $matricula = $res[0]['matricula'];    
    
    $valor = $res[0]['valor'] * 100;
    $data_venc = $res[0]['data_venc'];

    //verificar se a conta está vencida e ajustar ela para um dia após a data atual
    if($data_venc < date('Y-m-d')){
      $data_venc = date('Y-m-d', strtotime("+1 days",strtotime(date('Y-m-d'))));
    }

    
$nome = 'Não Informado - CPF Aleatório';
$telefone = $telefone_escola;
$email = 'Não Informado';
$cpf = '40804462097';

$query2 = $pdo->query("SELECT * FROM matriculas where id = '$matricula'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
  $aluno = $res2[0]['aluno'];
  
}

$query2 = $pdo->query("SELECT * FROM alunos where id = '$aluno'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
  $nome = $res2[0]['nome'];
  $telefone = $res2[0]['telefone'];
  $email = $res2[0]['email'];
  $cpf = $res2[0]['cpf'];
  
}



$cpf = str_replace('.', '', $cpf);   
$cpf = str_replace('-', '', $cpf);   

$telefone = str_replace('-', '', $telefone);   
$telefone = str_replace('(', '', $telefone); 
$telefone = str_replace(')', '', $telefone); 
$telefone = str_replace(' ', '', $telefone); 



}else{
 echo 'Você não selecionou uma conta válida para Pagar!';
  exit();
}


//CHAVES DO GERENCIANET gerencianet.com.br
require_once('config.php');

// AUTO LOAD PARA O COMPOSER
require_once('vendor/autoload.php');


use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = CONF_ID; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = CONF_SECRETO; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$boleto = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);    

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => CONF_SANDBOX,
      ];
       
      $item_1 = [
          'name' => $titulo, // nome do item, produto ou serviço
          'amount' => 1, // quantidade
          'value' => intval($valor) // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
      ];
       

      $items =  [
          $item_1
      ];

      $body  =  [
        'items' => $items
    ];
    
    try {
        $api = new Gerencianet($options);
        $charge = $api->createCharge([], $body);

         //SALVAR O ID DO BOLETO NA TABELA DAS CONTAS A RECEBER
        $id_boleto = $charge['data']['charge_id'];
        $query = $pdo->query("UPDATE pgto_matriculas SET boleto = '$id_boleto' WHERE id = '$id' ");
     
        //print_r($charge);
        header("Location: gerar-boleto.php?id=".$charge['data']['charge_id']."&nome=".$nome."&cpf=".$cpf."&fone=".$telefone."&vencimento=".$data_venc);
    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }

    


?>