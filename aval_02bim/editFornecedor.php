<?php
	require_once 'init.php';
	include_once 'fornecedor.class.php';
	
	$dadosOK = true;
	
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataFun = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	if(empty($nome) || empty($dataFun) || empty($email)){
		
		echo "Campos devem ser preenchidos!";
		exit;
	}
	
	$fornecedor = new Fornecedor($nome, $email, $dataFun);
	$PDO = db_connect();
	$sql = "UPDATE fornecedores SET nomeFornecedor = :nome, dataFundacao = :data, email = :email WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $fornecedor->getNome());
	$stmt->bindParam(':data', $fornecedor->getDataFun());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	$stmt->bindParam(':id', $id,  PDO::PARAM_INT);
	
	if($stmt->execute()){
		
		header('Location: index.php');
	}else{
		
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}
?>
