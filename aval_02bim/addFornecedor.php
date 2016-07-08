<?php
	require_once 'init.php';
	include_once 'fornecedor.class.php';
	
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataFun = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	if(empty($nome) || empty($dataFun) || empty($email)){
		
		echo "Campos devem ser preenchidos!";
		exit;
	}
	
	//instancia do objeto fornecedor
	$fornecedor = new Fornecedor($nome, $email, $dataFun);
	
	//insere no BD
	$PDO = db_connect();
	$sql = "INSERT INTO fornecedores(nomeFornecedor, dataFundacao, email) VALUES (:nome, :dataFun, :email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $fornecedor->getNome());
	$stmt->bindParam(':dataFun', $fornecedor->getDataFun());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	
	if($stmt->execute()){
		
		header('Location: index.php');
	}else{
		
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
?>
