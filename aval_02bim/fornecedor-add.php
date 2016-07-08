<?php
	require 'init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
	
		<title>Cadastro de Cliente</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/meuscript.js"></script>
	</head>
	
	<body>
		<div class="conteudo">
			
			<form method="post" name="formCadastroFornecedor" action="addFornecedor.php" enctype="multipart/form-data" onsubmit="return validarFornecedor();" onreset="limpaFornecedor();">
			
				<h1>Cadastro de Fornecedor</h1>
				
				<table width="100%">
				
					<tr>
					
						<th width="18%">Nome</th>
						<td width="82%"><input type="text" name="txtNome" id="nome">
						<span id="textoNome">Nome Invalido</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Data de Fundacao</th>
						<td width="82%"><input type="text" name="txtData" id="datafundacao">
						<span id="textoDataFundacao"> Data Invalida</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Email</th>
						<td width="82%"><input type="text" name="txtEmail" id="email">
						<span id="textoEmail">E-mail Invalido</span></td>
					</tr>
					
					<tr class="entrada">
					
						<td><input class="HOME" type="submit" name="btnEnvia" value="Cadastrar"></td>
						<td><input class="HOME" type="reset" name="btnLimpar" value="Limpar"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
