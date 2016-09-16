<!DOCTYPE html>
<html lang ="pt-br">
	
	<head>
		
		<meta charset="utf-8">
		<title> Meu Blog - Administração </title>
	</head>
	
	<body>
		
		<?php
		
			echo anchor(base_url() ,"Home") . " " .
				anchor(base_url("administracao/postagens"), "Postagens") . " " .
				anchor(base_url("administracao/logout"), "Logout") . " " .
				heading("Adicionar uma nova postagem", 3);
			$atributos = array('name'=>'formulario_postagem',
			'id'=>'formulario_postagem') ;
				echo form_open(base_url('administracao/postagens/adicionar') ,$atributos) .
				form_label(" Título :"," txt_titulo") . br() .
				form_input('txt_titulo') . br() .
				form_label(" Texto :"," txt_texto") . br() .
				form_textarea('txt_texto') . br() .
				form_submit("btn_enviar" ,"Cadastrar nova postagem") .
				form_close();
		?>
	</body>
</html>
