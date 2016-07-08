<?php
	require 'init.php';
	//pega o ID da URL
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	//valida o ID
	if(empty($id)){
		
		echo "ID para alteracao nao definido";
		exit;
	}
	//busca os dados do fornecedor a ser editado
	$PDO = db_connect();
	$sql = "SELECT nomeFornecedor, dataFundacao, email FROM fornecedores WHERE idFornecedor= :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
	//se o método fetch() não retornar um array, o ID não corresponde a um cliente válido
	if(!is_array($fornecedor)){
		
		echo "Nenhum fornecedor encontrado";
		exit;
	}
	$dataOK = dateConvert($fornecedor['dataFundacao']);
?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Edição de Fornecedor</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/meuscript.js"></script>
	</head>
	
	<body>
		
		<div class="conteudo">
			
			<form method="post" name="formAltera" action="editFornecedor.php" enctype="multipart/form-data" onsubmit="return validarFornecedor();" onreset="limpaFornecedor();">
			
				<h1>Edição de Fornecedor</h1>
				
				<table width="100%">
				
					<tr>
					
						<th width="18%">Nome</th>
						<td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $fornecedor['nomeFornecedor'] ?>">
						<span id="textoNome">Nome Invalido</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Data de Fundacao</th>
						<td width="82%"><input type="text" name="txtData" id="datafundacao" value="<?php echo $dataOK ?>">
						<span id="textoDataFundacao"> Data Invalida</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Email</th>
						<td width="82%"><input type="text" name="txtEmail" id="nome" value="<?php echo $fornecedor['email'] ?>">
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
