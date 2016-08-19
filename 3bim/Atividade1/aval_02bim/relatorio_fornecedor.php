<div class="conteudo">
	<?php

		// inclui classes necessárias
		spl_autoload_register(function ($class_name){
			
			include 'html/'.$class_name.'.class.php';
		});

		require_once 'init.php';
		
		$PDO = db_connect();
		
		$sql = "SELECT idFornecedor, nomeFornecedor, dataFundacao, email FROM fornecedores ORDER BY nomeFornecedor ASC";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		
		
		// *********************************************************
		// corrigir caracteres
		$html = new TElement('html');
		$html->lang = 'pt-br';

		$body = new TElement('body');
		$html->add($body);
	  
		//instancia objeto-tabela
		$tabela = new TTable;
		//define algumas propriedades
		$tabela->width = 600;
		$tabela->align = "center";
		$tabela->border = 1;
		//instancia uma linha para o cabeçalho
		$cabecalho = $tabela->addRow();
		//define a cor de fundo
		$cabecalho->bgcolor = '#4cde70';
		//adiciona células
		$cabecalho->addCell('Id');
		$cabecalho->addCell('Nome');
		$cabecalho->addCell('E-Mail');
		$cabecalho->addCell('Data de Fundação');

		$i = 0;
		$total = 0;
		//percorre os dados
		
		while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			//foreach($clientes as $pessoa){
				
				// verifica qual cor utilizará para o fundo
				$bgcolor = ($i % 2) == 0 ? '#000000' : '#3B3B3B';
				// adiciona uma linha para os dados
				$linha = $tabela->addRow();
				$linha->bgcolor = $bgcolor;
				// adiciona as células
				$linha->addCell($clientes['idFornecedor']);
				$linha->addCell($clientes['nomeFornecedor']);
				$linha->addCell($clientes['email']);
				$x = $linha->addCell(dateConvert($clientes['dataFundacao']));
				$x->align = 'right';
				
				$i++;
			//}
		}
		
		// exibe a tabela
		//$tabela->show();
		$body->add($tabela);
		$html->show();
	?>
</div>
