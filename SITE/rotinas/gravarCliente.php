<?php 
	if (! isset($_POST["codigo"]) )
		die("Rotina chamada de forma incorreta!");
  
	// Conectando MYSQL e abrindo banco  
    
	$con = mysqli_connect("localhost","root","");
	
	mysqli_select_db($con , "supermercado") or 
		die("Erro na seleção do banco supermercado: " . mysqli_error($con)) ;


	$codigo					= (int) $_POST["codigo"];
	$nomeCliente			= $_POST["nomeCliente"];
	$cpf					= $_POST["cpf"];
	$rg						= $_POST["rg"];
	$dataNasc				= $_POST["dataNasc"];
	
	$ativo=0;
	if ( isset($_POST["ativo"])  )
		$ativo = (int) $_POST["ativo"];
	
	$endereco				= (string) $_POST["endereco"];
	$numCasa				= $_POST["numCasa"];
	$bairro					= $_POST["bairro"];
	$cidade					= $_POST["cidade"];
	$uf						= $_POST["uf"];
	$cep					= $_POST["cep"];
	$ddd					= $_POST["ddd"];
	$foneRes				= $_POST["foneRes"];
	$foneCel				= $_POST["foneCel"];
	$email					= $_POST["email"];
	$obs					= $_POST["obs"];
	
	$comandoSQL="UPDATE cliente SET nomeCliente='$nomeCliente',
					cpf='$cpf',
					rg='$rg',
					dataNasc='$dataNasc',
					ativo='$ativo',
					endereco='$endereco',
					bairro='$bairro',
					cidade='$cidade',
					uf='$uf',
					cep='$cep',
					ddd='$ddd',
					foneRes='$foneRes',
					foneCel='$foneCel',
					email='$email',
					obs='$obs'
				WHERE codigo='$codigo';";
				
	mysqli_query($con, $comandoSQL) or
	  die("Erro na atualização dos dados: ".mysqli_error($con));
			
	echo "Registro alterado com sucesso!<br>";
	
	echo "<a href='listagemCliente.php'>Voltar</a><br><br>";

?>