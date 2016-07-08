<!DOCTYPE html>
<html lang="pt-br">
	
	<head>
		<title>Envio de dados</title>
		<meta charset="utf-8">
	</head>

	<body>
		
		<?php
			
			echo "<h1>Os dados informados são:</h1>";
			$nome = $_POST["txtNome"];
			$ender = $_POST["txtEndereco"];
			$cpf = $_POST["txtCPF"];
			$estado = $_POST["listEstados"];
			$dtNasc = $_POST["txtData"];
			$sexo = $_POST["sexo"];
			$login = $_POST["txtLogin"];
			$senha1 = $_POST["txtSenha1"];
			$senha2 = $_POST["txtSenha2"];
			if (isset ($_POST["checkCinema"])){
				$cinema = true;
			}else{
				$cinema = false;
			}
			if (isset ($_POST["checkMusica"])){
				$musica = true;
			}else{
				$musica = false;
			}
			if (isset ($_POST["checkInfo"])){
				$info = true;
			}else{
				$info = false;
			}

			$arquivo = $_FILES["txtFoto"];
			
			$correto = true;
			
			if ($nome == "" || strlen($nome) < 10) {
				echo "Nome incorreto <br>";
				$correto = false;
			}

			if ($ender == "") {
				echo "Endereço incompleto <br>";
				$correto = false;
			}

			if ($senha1 != $senha2) {
				echo "Senha não confere <br>";
				$correto = false;
			}

			if ($arquivo["error"] != 0){
				echo "Erro no envio do arquivo <br>";
				$correto = false;
			}
			
			if ($arquivo["size"] > 100000){
				echo "Tamanho maior que o permitido <br>";
				$correto = false;
			}
			
			if ($arquivo["size"] == 0){
				echo "Arquivo vazio <br>";
				$correto = false;
			}
			
			if (($arquivo["type"] != "image/gif") and
				($arquivo["type"] != "image/jpeg") and
				($arquivo["type"] != "image/jpg") and
				($arquivo["type"] != "image/png") and
				($arquivo["type"] != "image/bmp")){
				echo "Arquivo não compatível <br>";
				$correto = false;
			}
			
			$file_src = "../tmp/".$_FILES["txtFoto"]["name"];
			if (!move_uploaded_file($_FILES["txtFoto"]["tmp_name"],$file_src)){
				echo "Erro ao mover o arquivo <br>";
				$correto = false;
			}

			//AQUI COMPLETAR ??????????????hOI

			function validaCPF($cpf = null) {
 
	  	 		// Verifica se um número foi informado
	   			 if(empty($cpf)) {
	        		return false;
	    		}
		 
	    		// Elimina possivel mascara
	    		$cpf = ereg_replace('[^0-9]', '', $cpf);
	    		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	     
	    		// Verifica se o numero de digitos informados é igual a 11 
	    		if (strlen($cpf) != 11) {
	     		   return false;
	    		}
	    		// Verifica se nenhuma das sequências invalidas abaixo 
	    		// foi digitada. Caso afirmativo, retorna falso
	    		else if ($cpf == '00000000000' || 
	     			$cpf == '11111111111' || 
	     			$cpf == '22222222222' || 
	     			$cpf == '33333333333' || 
	     			$cpf == '44444444444' || 
	     			$cpf == '55555555555' || 
	     			$cpf == '66666666666' || 
	     			$cpf == '77777777777' || 
	    			$cpf == '88888888888' || 
	    		    $cpf == '99999999999') {
				return false;
				// Calcula os digitos verificadores para verificar se o
				// CPF é válido
				} else {   
		
				for ($t = 9; $t < 11; $t++) {
	             
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $cpf{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($cpf{$c} != $d) {
						return false;
						}
					}
 
				return true;
				}
			}
			
			if (validaCPF($cpf) == false) {
				echo "CPF inválido <br>";
				$correto = false;
			}
			
			function validaData ($data) {
				
				$data = explode('/', $data);
				$valida= false;
				
				if (($data[2] <= 2016) && ($data[2]>0000)){				
					if (($data[1] == 04) || ($data[1] == 06)  || ($data[1] == 09) || ($data[1] == 11)){
						if(($data[0] <= 30) && ($data[0] > 00)){
							$valida= true;	
						}
					}else if (($data[1] == 01) || ($data[1] == 03)  || ($data[1] == 05) || ($data[1] == 07) || ($data[1] == 08)|| ($data[1] == 10)|| ($data[1] == 12) ){
						if(($data[0] <= 31) && ($data[0] > 00)){
							$valida= true;	
						}
					}else if ($data[1] == 02){
						if ($data[2] % 4 ==0){
							if ($data[2] % 100 !=0){
								if ($data[0] <= 29){
									$valida= true;	
								}
							}else{
								if ($data[2] % 400 ==0){
									if (($data[0] <= 29) && ($data[0] > 00)){
										$valida= true;							
									}	
								}
							}
						}else{
							if (($data[0] <= 28) && ($data[0] > 00)){
								$valida= true;						
							}
						}
					}
				}
				
				return $valida;
			}
			
			if (validaData($dtNasc) == false) {
				echo "Data inválida <br>";
				$correto = false;
			}
			
			if ($correto) {
				echo "<table border='0' cellpadding='5'>";
				echo "<tr><td><img height = '120' width = '120' src = '$file_src'></td></tr>";
				echo "<tr><td>Nome</td><td><b>$nome</b></td></tr>";
				echo "<tr><td>CPF</td><td><b>$cpf</b></td></tr>";
				echo "<tr><td>Endereço</td><td><b>$ender</b></td></tr>";
				echo "<tr><td>Estado</td><td><b>$estado</b></td></tr>";
				echo "<tr><td>Data de Nascimento</td><td><b>$dtNasc</b></td></tr>";
				echo "<tr><td>Sexo</td><td><b>$sexo</b></td></tr>";
				echo "<tr><td>Login</td><td><b>$login</b></td></tr>";
				echo "<tr><td>Senha</td><td><b>$senha1</b></td></tr>";
				echo "<tr><td>Áreas de interesse</td><td><b>";

				if ($cinema) {
					echo "Cinema<br>";
				}

				if ($musica) {
					echo "Musica<br>";
				}

				if ($info) {
					echo "Informática<br>";
				}
				echo "</b></td></tr></table>";
			}
		?>
	</body>
</html>
