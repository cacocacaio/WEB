<?php
	require_once 'init.php';
	include_once 'cliente.class.php';
	
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataCad = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	if(empty($nome) || empty($dataCad) || empty($email)){
		
		echo "Campos devem ser preenchidos!";
		exit;
	}
	
	//instancia do objeto cliente
	$cliente = new Cliente($nome, $email, $dataCad);
	
	//insere no BD
	$PDO = db_connect();
	$sql = "INSERT INTO clientes(nomeCliente, dataCadastro, email) VALUES (:nome, :dataCad, :email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $cliente->getNome());
	$stmt->bindParam(':dataCad', $cliente->getDataCad());
	$stmt->bindParam(':email', $cliente->getEmail());
	
	if($stmt->execute()){
		
		header('Location: index.php');
	}else{
		
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
?>
