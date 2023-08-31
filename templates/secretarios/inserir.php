<?php 
require_once("../../conexao.php"); 


$method = $_SERVER['REQUEST_METHOD'];
//$path = $_SERVER['PATH_INFO'];

if ($method === 'GET') {
    if ($path === '/secretarios') {
        // Implement logic to retrieve and return a list of secretaries
        $query = $pdo->query("SELECT * FROM secretarios");
        $secretarios = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($secretarios);
    } elseif (preg_match('/\/secretarios\/(\d+)/', $path, $matches)) {
        $secretaryId = $matches[1];
        // Implement logic to retrieve and return details of a specific secretary
        $query = $pdo->query("SELECT * FROM secretarios WHERE id = $secretaryId");
        $secretary = $query->fetch(PDO::FETCH_ASSOC);
        if ($secretary) {
            echo json_encode($secretary);
        } else {
            echo json_encode(['message' => 'Secretary not found']);
        }
    } else {
        echo json_encode(['message' => 'Invalid endpoint']);
    }
} elseif ($method === 'POST') {
    // ... (Keep your existing POST logic here)
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];

$antigo = $_POST['antigo'];
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

if($cpf == ""){
	echo 'O CPF é Obrigatório!';
	exit();
}
} elseif ($method === 'PUT') {
    // ... (Keep your existing PUT logic here)
	parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
} elseif ($method === 'DELETE') {
    // ... (Keep your existing DELETE logic here)
	parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'];
} else {
    echo json_encode(['message' => 'Invalid method']);
}



//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM secretarios where cpf = '$cpf' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM secretarios where email = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO secretarios SET nome = :nome, cpf = :cpf, email = :email, endereco = :endereco, telefone = :telefone");	

	$res2 = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel = :nivel");	
	$res2->bindValue(":senha", '123');
	$res2->bindValue(":nivel", 'secretaria');

}else{
	$res = $pdo->prepare("UPDATE secretarios SET nome = :nome, cpf = :cpf, email = :email, endereco = :endereco, telefone = :telefone WHERE id = '$id'");

	$res2 = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, email = :email WHERE cpf = '$antigo'");	
	
}

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":endereco", $endereco);

$res2->bindValue(":nome", $nome);
$res2->bindValue(":cpf", $cpf);
$res2->bindValue(":email", $email);


$res->execute();
$res2->execute();

echo 'Salvo com Sucesso!!';

?>