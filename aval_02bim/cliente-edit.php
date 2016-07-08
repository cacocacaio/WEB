<?php
	require 'init.php';
	//pega o ID da URL
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	//valida o ID
	if(empty($id)){
		
		echo "ID para alteracao nao definido";
		exit;
	}
	//busca os dados do cliente a ser editado
	$PDO = db_connect();
	$sql = "SELECT nomeCliente, dataCadastro, email FROM clientes WHERE idCliente= :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
	//se o método fetch() não retornar um array, o ID não corresponde a um cliente válido
	if(!is_array($cliente)){
		
		echo "Nenhum cliente encontrado";
		exit;
	}
	$dataOK = dateConvert($cliente['dataCadastro']);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	
		<title>Cadastro de Cliente</title>
		<meta charset="utf-8">
		<link type="text/css" href="css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>
		<script type="text/javascript" src="js/meuscript.js"></script>
	</head>
		
	<body>
		<div class="conteudo">
			<form method="post" name="formAltera" action="editCliente.php" enctype="multipart/form-data" onsubmit="return validarCliente();" onreset="limpaCliente();">
		
				<h1>Edição de Cliente</h1>
			
				<table width="100%">
			
					<tr>
					
						<th width="18%">Nome</th>
						<td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $cliente['nomeCliente'] ?>">
						<span id="textoNome">Nome Invalido</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Data de Cadastro</th>
						<td width="82%"><input type="text" name="txtData" id="datacadastro" value="<?php echo $dataOK ?>">
						<span id="textoDataCadastro">Data Invalida</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Email</th>
						<td width="82%"><input type="text" name="txtEmail" id="email" value="<?php echo $cliente['email'] ?>">
						<span id="textoEmail">E-mail Invalido</span></td>
					</tr>
					
					<tr class="entrada">
					
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<td><input class="HOME" type="submit" name="btnEnvia" value="Alterar"></td>
						<td><input class="HOME" type="reset" name="btnLimpar" value="Limpar"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
