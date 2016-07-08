<html>
<head>
	
	<title>Envio de Dados</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/meuscript.js"></script>
	
</head>
	<body>
		<div class="conteudo">
			
			<?php
				require_once 'init.php';
				
				$PDO = db_connect();
				$sql_count = "SELECT COUNT(*) AS total FROM clientes ORDER BY nomeCliente ASC";
				$sql = "SELECT idCliente, nomeCliente, dataCadastro, email FROM clientes ORDER BY nomeCliente ASC";
				
				$stmt_count = $PDO->prepare($sql_count);
				$stmt_count->execute();
				$total = $stmt_count->fetchColumn();
				$stmt = $PDO->prepare($sql);
				$stmt->execute();
			
			?>
			
			<h1>Cadastro de Clientes</h1>
			<p><a class="HOME" href="cliente-add.php">Adicionar Cliente</a></p>
			<h2>Lista de Clientes</h2>
			<p>Total de clientes: <?php echo $total ?></p>
			<?php if($total > 0): ?>
			<table width="100%" border="1">
						
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Data de Cadastro</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)):?>
					<tr>
						<td><?php echo $cliente['nomeCliente']?></td>
						<td><?php echo $cliente['email']?></td>
						<td><?php echo dateConvert($cliente['dataCadastro']) ?></td>
						<td>
							<a class="HOME" href="cliente-edit.php?id=<?php echo $cliente['idCliente']?>">Editar</a>
							<a class="HOME"href="deleteCliente.php?id=<?php echo $cliente['idCliente'] ?>">Excluir</a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
			<?php else: ?>
				<p>Nenhum usuário registrado</p>
			<?php endif; ?>
		</div>
	</body>
</html>
