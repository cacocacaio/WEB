<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT (*) AS total FROM cliente2 ORDER BY nome ASC";
    // SQL para selecionar os registros
    $sql = " SELECT idCliente , nome , dataCad , foto FROM cliente2 ORDER BY nome
    ASC";
    // conta o total de registros
    $stmt_count = $PDO -> prepare($sql_count);
    $stmt_count -> execute();
    $total = $stmt_count -> fetchColumn();
    // seleciona os registros
    $stmt = $PDO -> prepare($sql);
    $stmt -> execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Submarino (china) </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css" type="text/css" />
        <script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <div class="menu">
        	           
			<ul>
				<li><img class="logo" src="img/logo-submarino.jpg"></img></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li><a href="fornecedores.php">FORNECEDORES</a></li>
                <li><a href="sobre.php">SOBRE</a></li>
            </ul>
		</div>
			
		<div class="conteudo">
			<p> TEY <p/>
		</div>
		<div class="rodape">
			<p> COPYRIGHT - Caio L. e Sabrina </p>
		</div>
    </body>
</html>
