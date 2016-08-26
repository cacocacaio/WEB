<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT (*) AS total FROM clientes ORDER BY nome ASC";
    // SQL para selecionar os registros
    $sql = " SELECT idCliente , nomeCliente , dataCadastro , foto FROM clientes ORDER BY nomeCliente
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
        <title>   Clientes   </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/clientes.css" type="text/css" />
		<link rel="stylesheet" href="css/index.css" type="text/css" />
		<script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </head>  
    <body>
    <div class="conteudo">
        <h1> Cadastro de Clientes </h1>
        <p><a href="cadastroclientes.php"> Adicionar Usuário </a></p>
        
        
        <h2>Lista de Clientes</h2>
        <p>Total de clientes:<?php echo $total ?></p>
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
                <?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $cliente['idCliente'] ?></td>
                    <td><?php echo $cliente['nomeCliente'] ?></td>
                    <td><?php echo dateConvert($cliente['dataCadastro'])  ?></td>
                    <td> 
                        <a href="form-edit-cliente.php?> id= <?php echo $cliente ['idCliente']?>"> Editar
                        </a>
                        <a href="delete.php? id=<?php echo $cliente ['idCliente'] ?>"
                            onclick="return confirm( 'Tem certeza que deseja excluir?');"> Excluir
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p> Nenhum cliente registrado</p>
        <?php endif; ?>
   </div>
    </body>
</html>
