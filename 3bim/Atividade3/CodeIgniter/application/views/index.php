<!DOCTYPE html>
<html lang="pt-br">

	<head>
	
		<meta charset="utf-8">
		<title>Tela Principal</title>
		
		<?php
		
			echo link_tag('assets/css/estilo.css');
		?>
	</head>
	
	<body>
	
		<?php
		
			echo anchor(base_url("cadastrar") , "Cadastrar Nova Referência") . br() . "<hr>" .
			anchor(base_url("listar") , "Listagem das Referências Cadastradas") . br() . "<hr>" .
			anchor(base_url("consultar") , "Consulta Referência") . br() . "<hr>";
			
		?>
	</body>
</html>
