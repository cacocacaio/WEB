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
    <title> Fornecedores </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="fornecedores.css" type="text/css" />
    <script type="text/javascript" src="fornecedores.js"></script>
</head>

<body>
	<div class="conteudo">
	<h1> Cadastrar Fornecedor</h1>
	<br>
	<a href="cadastrofornecedor.php"> Adicionar Fornecedor </a>
    <h1>Fornecedores</h1>
    <h2> Lista de Fornecedores </h2>
    <p> Total de fornecedores:<?php echo $total ?></p>
        <?php if ($total > 0): ?>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th>Nomes</th>
                    <th>Email</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $fornecedor['idFornecedor'] ?></td>
                    <td><?php echo $fornecedor['nome'] ?></td>
                    <td><?php echo dateConvert($fornecedor['dataCad'])  ?></td>
                    <td> 
                        <a href="form-edit.php?id= <?php echo $fornecedor ['idFornecedor']?>"> Editar
                        </a>
                        <a href="delete.php? id=<?php echo $fornecedor ['idFornecedor'] ?>"
                            onclick="return confirm( 'Tem certeza que deseja excluir?');"> Excluir
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p> Nenhum fornecedor registrado</p>
        <?php endif; ?>
   </div>
    </body>
</html>
