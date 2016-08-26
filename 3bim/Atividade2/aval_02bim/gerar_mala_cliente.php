<?php
  
	require('fpdf/fpdf.php');
	require_once 'init.php';
	
	$PDO = db_connect();
	$sql = "SELECT idCliente, nomeCliente, dataCadastro, email FROM clientes ORDER BY nomeCliente ASC";
	
	$stmt = $PDO->prepare($sql);
	$stmt->execute();
	
	$pdf = new FPDF('P', 'pt', 'A4');
	
	$pdf->SetTitle('Malas de Clientes');
	$pdf->SetAuthor('Caio Nogueira e Lavínia Maria');
	$pdf->SetCreator('php ' .  phpversion() );
	$pdf->SetKeyWords('php', 'pdf');
	$pdf->SetSubject('SPAMANDO OS USUARIOS INOCENTES');
	
	while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)){
		
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		
		date_default_timezone_set('America/Sao_Paulo');
		$data = date('d/m/Y');
		
		$pdf->Ln(30);
		$pdf->SetX(400);
		$pdf->Write(10, 'Varginha, ' . $data);
		
		$pdf->Ln(55);
		$pdf->Write(10, 'Prezado(a) Sr(a) ' . $cliente['nomeCliente']) . ',';
		
		$pdf->Ln(85);
		$pdf->SetX(90);
		$texto=('Neste mês de aniversário, nossa loja está com promoções imperdíveis e selecionadas especialmete pra você.');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
		
		$pdf->Ln(15);
		$pdf->SetX(90);
		$texto=('Não perca esta oportunidade de realizar bons negócios.');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
		
		$pdf->Ln(15);
		$pdf->SetX(90);
		$texto=('Faça-nos uma visita.');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
		
		$pdf->Ln(95);
		$texto=('Cordialmente,');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
		
		$pdf->Ln(95);
		$pdf->SetX(205);
		$texto=('Caio Nogueira e Lavínia Maria');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
		
		$pdf->Ln(15);
		$pdf->SetX(230);
		$texto=('Gerentes Comerciais');
		$texto = utf8_decode($texto);
		$pdf->Write(10, $texto);
	}
	
	$pdf->Output();
?>
