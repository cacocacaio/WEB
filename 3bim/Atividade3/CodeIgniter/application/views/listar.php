<?php
  
	require('fpdf/fpdf.php');
	
	$pdf = new FPDF('P', 'pt', 'A4');
	
	$pdf->SetTitle('Listage Cremosa');
	$pdf->SetAuthor('Caio Nogueira e Lavínia Maria');
	$pdf->SetCreator('php ' .  phpversion() );
	$pdf->SetKeyWords('php', 'pdf');
	$pdf->SetSubject('Listagem Cremosa');
	
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 14);
	$pdf->SetX(180);
	$texto = "Relação das Referências Bibliográficas";
	$texto = utf8_decode($texto);
	$pdf->Write(20, $texto);
	
	foreach ($citacoes as $citacao){
		
		$pdf->Ln(30);
		$texto = ('Nome do arquivo: ' . $citacao->nomeArquivo);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto = ('Título: ' . $citacao->titulo);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('Autores: ' . $citacao->autores);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('Citações: ' . $citacao->citacoes);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('Referências: ' . $citacao->referencias);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('Palavras-chave: ' . $citacao->palavrasChave);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('Data de Inclusão: ' . $citacao->dataCadastro);
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
		
		$pdf->Ln(30);
		$texto=('------------------------------------------------------------------------------------------------------------------');
		$texto = utf8_decode($texto);
		$pdf->Write(20, $texto);
	}
	
	$pdf->Output();
?>
