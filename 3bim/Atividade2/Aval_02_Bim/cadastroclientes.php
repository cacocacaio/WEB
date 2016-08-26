<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/cadastroclientes.css" type="text/css" />
        <title>   Clientes   </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/clientes.css" type="text/css" />
        <link rel="stylesheet" href="css/index.css" type="text/css" />
        <script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script>
           $(document).ready(function(){
           $("#data").mask("99/99/9999");
           });
        </script>
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
            <form method="post" name="formCadastro" action="addcliente.php" enctype="multipart/form-data">
            
            <h1>Clientes</h1>
    
            <table width="100%">
                <tr>
                    <th width="18%"> <h4>Nome</h4> </th>
                    <td width="82%"> <input type="text" name="txtNome"/> </td>
                </tr>
                <tr>
                    <th><h4>Data do Cadastro</h4></th>
                    <td><input type="text" name="txtData" id="data"></td>
                </tr>
                <tr>
                    <th><h4>Email</h4></th>
                    <td><input type="text" name="txtEmail"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnEnviar" class="btn btn-red" value="Cadastrar"></td>
                    <td><input type="submit" name="btnLimpar" class="btn btn-red" value="Limpar"></td>
                </tr>
            </table>
            

        </div>
        </form>
        <div class="rodape">
			<p> COPYRIGHT - Caio L. e Sabrina </p>
		</div>
    </body>
    
</html>
