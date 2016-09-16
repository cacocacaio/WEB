<!DOCTYPE html >
<html lang="pt-br">

	<head>
		
		<meta charset="utf-8">
		<title>Meu Blog-Administração</title>
	</head>
	
	<body >
		
		<?php
			$atributos = array('name'=>'formulario_login', 'id'=>'formulario_login');
			echo form_open(base_url('administracao/login/efetuar_login'), $atributos) .
				form_label("Usuário: " ,"txt_usuario") . br() .
				form_input('txt_usuario') . br() .
				form_label("Senha: ","txt_senha") . br() .
				form_password('txt_senha') . br() . br() . 
				form_submit("btn_enviar" , "Efetuar Login") .
				form_close();
		?>
	</body>
</html>
