<html lang="pt-br">
	<head>

    	<title>Envio de Dados</title>
		<meta charset="utf-8">
		
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	</head>

    <body>
		<div class="conteudo">
			<?php
				require_once 'init.php';
		
				$PDO = db_connect();
				$sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
				$sql = "SELECT idFornecedor, nomeFornecedor, dataFundacao, email FROM fornecedores ORDER BY nomeFornecedor ASC";
				
				$stmt_count = $PDO->prepare($sql_count);
				$stmt_count->execute();
				$total = $stmt_count->fetchColumn();
				$stmt = $PDO->prepare($sql);
				$stmt->execute();
		
			?>
			
			<h1>Cadastro de Fornecedores</h1>
			<p><a class="HOME" href="fornecedor-add.php">Adicionar Fornecedor</a></p>
			<h2>Lista de Fornecedores</h2>
			<p>Total de fornecedores: <?php echo $total ?></p>
			<?php if($total > 0): ?>
			<table width="100%" border="1">
				
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Data de Fundação</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)):?>
					<tr>
						<td><?php echo $fornecedor['nomeFornecedor']?></td>
						<td><?php echo $fornecedor['email']?></td>
						<td><?php echo dateConvert($fornecedor['dataFundacao']) ?></td>
						<td>
							<a class="HOME" href="fornecedor-edit.php?id=<?php echo $fornecedor['idFornecedor']?>">Editar</a>
							<a class="HOME" href="deleteFornecedor.php?id=<?php echo $fornecedor['idFornecedor'] ?>">Excluir</a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>Nenhum Fornecedor registrado</p>
		<?php endif; ?>
		</div>
     <body>
</html>
