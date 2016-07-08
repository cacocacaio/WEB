<?php
	require_once 'init.php';
	include_once 'cliente.class.php';
	
	$dadosOK = true;
	
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataCad = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	if(empty($nome) || empty($dataCad) || empty($email)){
		
		echo "Campos devem ser preenchidos!";
		exit;
	}
	
	$cliente = new Cliente($nome, $email, $dataCad);
	$PDO = db_connect();
	$sql = "UPDATE clientes SET nomeCliente = :nome, dataCadastro = :data, email = :email WHERE idCliente = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $cliente->getNome());
	$stmt->bindParam(':data', $cliente->getDataCad());
	$stmt->bindParam(':email', $cliente->getEmail());
	$stmt->bindParam(':id', $id,  PDO::PARAM_INT);
	
	if($stmt->execute()){
		
		header('Location: index.php');
	}else{
		
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}
?>
