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
			
			<?php
				require 'init.php';
			?>
			
			<form method="post" name="formCadastroCliente" action="addCliente.php" enctype="multipart/form-data" id="form" onsubmit="return validarCliente();" onreset="limpaCliente();">
			
				<h1>Cadastro de Cliente</h1>
				
				<table width="100%">
				
					<tr>
					
						<th width="18%">Nome</th>
						<td width="82%"><input type="text" name="txtNome" id="nome">
						<span id="textoNome">Nome Invalido</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Data de Cadastro</th>
						<td width="82%"><input type="text" name="txtData" id="datacadastro" value="" class="field left" readonly>
						<span id="textoDataCadastro">Data Invalida</span></td>
					</tr>
					
					<tr>
					
						<th width="18%">Email</th>
						<td width="82%"><input type="text" name="txtEmail" id="email" >
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
