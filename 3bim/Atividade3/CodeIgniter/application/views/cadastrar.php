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
			
			$exemplo = array('name' => 'txt_nome_arquivo', 'class'=>'input', 'required'=>'required');
			$atributos = array('name' => 'formulario_contato', 'class'=>'formulario');
			$template = array(
			
				'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" class="table">',

				'thead_open'            => '<thead>',
				'thead_close'           => '</thead>',

				'heading_row_start'     => '<tr>',
				'heading_row_end'       => '</tr>',
				'heading_cell_start'    => '<th>',
				'heading_cell_end'      => '</th>',

				'tbody_open'            => '<tbody>',
				'tbody_close'           => '</tbody>',

				'row_start'             => "<tr class='ln'>",
				'row_end'               => '</tr>',
				'cell_start'            => "<td class='col'>",
				'cell_end'              => '</td>',

				'row_alt_start'         => "<tr class='lns'>",
				'row_alt_end'           => '</tr>',
				'cell_alt_start'        => "<td class='cols'>",
				'cell_alt_end'          => '</td>',

				'table_close'           => '</table>'
			);
			$this->table->set_template($template);
			$form = array(
			
				array(
				
					form_open(base_url('welcome/cadastrar_registro'), $atributos), 
				), array(
				
					form_label("Nome do Arquivo: " ,"txt_nome_arquivo"),
					form_input($exemplo) . br()
				), array(
				
					"",
					"<span>Inserir o nome do arquivo</span>" . br() . br()
				), array(
				
					form_label("Titulo: " ,"txt_titulo") ,
					form_textarea('txt_titulo', null, 'class="textarea" required') . br()
				), array(
				
					form_label("Autores: " ,"txt_autores") ,
					form_textarea('txt_autores', null, 'class="textarea" required') . br()
				), array(
				
					form_label("Citações: " ,"txt_citacoes") ,
					form_textarea('txt_citacoes', null, 'class="textarea" required') . br()
				), array(
				
					form_label("Palavras-Chave: " ,"txt_palavras_chave") ,
					form_textarea('txt_palavras_chave', null, 'class="textarea" required') . br()
				), array(
				
					form_label("Referências: " ,"txt_referencias") ,
					form_textarea('txt_referencias', null, 'class="textarea" required') . br()
				), array(
				
					form_submit("btn_enviar","Enviar dados", "class='submit'")
				), array(
				
					form_close()
				)
			);
			
			echo $this->table->generate($form);;
		?>
	</body>
</html>
