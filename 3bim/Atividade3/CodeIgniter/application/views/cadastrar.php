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
			echo anchor(base_url(), "Início") . br() .
			"<h2>Inserir Nova Referência</h2>" . "<hr>" . br();
			
			$exemplo = array('name' => 'txt_nome_arquivo ', 'class'=>'input');
			$atributos = array('name' => 'formulario_contato ', 'class'=>'formulario');
			echo form_open(base_url('welcome/cadastrar_registro'), $atributos) .
			form_label("Nome do Arquivo: " ,"txt_nome_arquivo") .
			form_input($exemplo) . br() .
			"<span>Inserir o nome do arquivo</span>" . br() . br() .
			form_label("Titulo: " ,"txt_titulo") .
			form_textarea('txt_titulo') . br() .
			form_label("Autores: " ,"txt_autores") .
			form_textarea('txt_autores') . br() .
			form_label("Citações: " ,"txt_citacoes") .
			form_textarea('txt_citacoes') . br() .
			form_label("Palavras-Chave: " ,"txt_palavras_chave") .
			form_textarea('txt_palavras_chave') . br() .
			form_label("Referências: " ,"txt_referencias") .
			form_textarea('txt_referencias') . br() .
			form_submit("btn_enviar","Enviar dados", "class='submit'") .
			form_close();
		?>
	</body>
</html>
