<?php
	require_once 'init.php';
	
	$PDO = db_connect();
	$sql_count = "SELECT COUNT(*) AS total FROM aluno ORDER BY nome ASC";
	$sql = "SELECT id, nome, dataNasc, foto FROM aluno ORDER BY nome ASC";
	
	$stmt_count = $PDO->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
	
	$stmt = $PDO->prepare($sql);
	$stmt->execute();
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>

    	<title>Envio de Dados</title>
		<meta charset="utf-8">
		
		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="jquery.maskedinput.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".campoData").mask("99/99/9999");
				$(".campoCPF").mask("999.999.999-99");
			});
		</script>
	</head>

     <body>

			<h1>Cadastro de Alunos</h1>
			<p><a href="form-add.php">Adicionar Usuario</a></p>
			<h2>Lista de Alunos</h2>
			<p>Total de usuarios: <?php echo $total ?></p>
			<?php if ($total > 0): ?>
			<table width="100%" border="1">
				
				<thead>
					<tr>
						<th>Foto</th>
						<th>Matricula</th>
						<th>Nome</th>
						<th>Data Nascimento</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)):?>
					<tr>
						<?php $caminho = $aluno['foto']; ?>
						<td><?php echo "<img src='$caminho' width='100' height='100' alt='IMAGEM'/>;"?></td>
						<td><?php echo $aluno['id']?></td>
						<td><?php echo $aluno['nome']?></td>
						<td><?php echo dateConvert($aluno['dataNasc']) ?></td>
						<td>
							<a href="form-edit.php?id=<?php echo $aluno['id']?>">Editar</a>
							<a href="delete.php.id=<?php echo $aluno['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>Nenhum usuário registrado</p>
		<?php endif; ?>
     <body>
</html>
