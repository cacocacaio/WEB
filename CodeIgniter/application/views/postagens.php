<!DOCTYPE html>
<html lang="pt-br">

	<head>
	
		<meta charset="utf-8">
		<title>Meu Blog</title>
	</head>
	
	<body>
		
		<?php
		echo anchor(base_url(),"Home") . "  " . anchor(base_url("fale-conosco"), "Fale Conosco") ;
		?>
		
		<h2>Meu Blog :')</h2>
		<h3>Postagens recentes</h3>
		
		<?php
		
			foreach($postagens as $post){
				
				$lista_urls[] = anchor(base_url("detalhes/" . $post->id), $post->titulo);
			}
			
			echo ul($lista_urls);
		?>
	</body>
</html>
