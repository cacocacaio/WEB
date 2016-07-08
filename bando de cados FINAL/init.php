<?php
	//inclui o arquivo de funções
	require_once 'funcoes.php';
	//constantes com as credenciais de acesso ao BD
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'BD');
	
	//habilita todas as exibições de erros
	init_set('display_errors', true);
	error_reporting(E_ALL);//<--qualquer erro
	
	date_default_timezone_set('America/Sao_Paulo');
	
?>
