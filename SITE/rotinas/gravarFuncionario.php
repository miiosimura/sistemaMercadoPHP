<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/mystyle.css">
		<link rel="stylesheet" href="../css/funcionarios-style.css">
	</head>
	
	<body>
		<!-- Banner -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<center>
					<a href="index.html">
						<img 	src="../imagens/logo.png"
								title="&copy; Mercado Cid">
					</a>
				</center>
			</div>
		</div>

		<?php
			if (!isset($_POST["codFuncionario"]))
				die("A rotina não foi chamada corretamente");
			
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con, "supermercado") or
			  die ("Erro na seleção do banco supermercado: ".mysqli_error($con));
			
			$codFuncionario = 	$_POST["codFuncionario"];
			$nomeFuncionario =  $_POST["nomeFuncionario"];
			$dataNasc =         $_POST["dataNasc"];
			$cargo =            $_POST["cargo"];
			$dataContratado =   $_POST["dataContratado"];
			$cpf =              $_POST["cpf"];
			$rg =               $_POST["rg"];
			$endereco =         $_POST["endereco"];
			$bairro =           $_POST["bairro"];
			$cidade =           $_POST["cidade"];
			$uf =               $_POST["uf"];
			$cep =              $_POST["cep"];
			$ddd =              $_POST["ddd"];
			$foneCel =          $_POST["foneCel"];
			$foneRes =          $_POST["foneRes"];
			$email =            $_POST["email"];
			$obs =              $_POST["obs"];
			$sexo =             $_POST["sexo"];
			$estadoCivil =      $_POST["estadoCivil"];
			$ativo = 0;           
			if(isset($_POST['ativo']))
				$ativo = $_POST['ativo'];			
								
			$comandoSQL = "UPDATE funcionario SET nomeFuncionario = '$nomeFuncionario', 
								dataNasc = '$dataNasc',
								cargo = '$cargo',
								dataContratado = '$dataContratado',
								cpf = '$cpf',
								rg = $rg,
								endereco = '$endereco',
								bairro = '$bairro',
								cidade = '$cidade',
								uf = '$uf',
								cep = '$cep',
								ddd = '$ddd',
								foneCel = '$foneCel',
								foneRes = '$foneRes',
								email = '$email',								
								obs = '$obs',
								sexo = '$sexo',
								estadoCivil = '$estadoCivil',
								ativo = $ativo
						WHERE codFuncionario = $codFuncionario;";
	
			mysqli_query($con, $comandoSQL) or
			  die("Erro na atualização dos dados: ".mysqli_error($con));
			
			echo "Registro alterado com sucesso!<br>";			
		?>
		
		<a href="listagemFuncionario.php">Voltar</a>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>