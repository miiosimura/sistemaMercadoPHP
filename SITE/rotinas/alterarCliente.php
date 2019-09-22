<html> 
	<head>
		<title>Mercado Cid</title>
	</head>
	<body>
		<h2>Cadastro de Cliente - Alteração</h2>
		<?php			
			if(!isset($_GET["c"]))
				die("Rotina executada de forma incorreta!.");
			
			$codigo=(int) $_GET["c"];
			
			if($codigo<1)
				die("Código do cliente informado incorretamente!.");
			
			$con = mysqli_connect('localhost','root','');
						
			mysqli_select_db($con , "supermercado") or 
				die("Erro na seleção do banco " . mysqli_error($con) );
						
			$comandoSQL = "SELECT * FROM cliente WHERE codigo=$codigo";
			
			$registro = mysqli_query($con, $comandoSQL) or
				die("Erro na recuperação do regitro 
				do cliente: " . mysqli_error($con));
				
			$linhas = mysqli_num_rows($registro);
			if($linhas<1)
				die("Cliente código $codigo não encontrado.");
			
			// Pegando os dados de $registro e inserindo numa matriz de dados
			$dados = mysqli_fetch_array($registro); 
				
			$codigo = $dados["codigo"];
			$nomeCliente = $dados["nomeCliente"];
			$cpf = $dados["cpf"];
			$rg = $dados["rg"];
			$dataNasc = $dados["dataNasc"];
			$ativo = $dados["ativo"];
			$endereco = $dados["endereco"];
			$numCasa = $dados["numCasa"];
			$bairro = $dados["bairro"];
			$cidade = $dados["cidade"];
			$uf = $dados["uf"];
			$cep = $dados["cep"];
			$foneRes	 = $dados["foneRes"];
			$foneCel	 = $dados["foneCel"];
			$ddd	 = $dados["ddd"];
			$email	 = $dados["email"];
			$obs	 = $dados["obs"];
			
			// Inserindo os valores nos campos do formulário.
				
		?>
		<form 	action="gravarCliente.php" enctype="multipart/form-data" method="post">
				
			<input 	type="hidden" name="codigo" value="<?php echo $codigo;?>">
			
			Nome: <input 	type="text" 
							name="nomeCliente"
							maxlength="30" 
							size="30" 
							placeholder="Informe o nome do cliente!"
							value="<?php echo $nomeCliente;?>">
							
			<br>
			CPF: <input type="text" 
						name="cpf" 
						maxlength="14" 
						size="14"
						placeholder="Informe o CPF do cliente com maximo 14 digitos!"
						value="<?php echo $cpf;?>">
			
			RG: <input  type="text" 
						name="rg" 
						maxlength="12" 
						size="12"
						placeholder="Informe o RG do cliente maximo 12 digitos!"
						value="<?php echo $rg;?>"><br><br>
			
			Data de Nascimento: <input type="date" 
									   name="dataNasc" 
									   min="1920-12-31" 
									   max="2018-12-31"
									   value="<?php echo $dataNasc;?>"><br><br>
									   
			Cliente Ativo: <input type="checkBox" name="ativo" value="1" <?php if ($ativo==1) echo "checked"; ?>><br><br>
									   
			Endereco: <input type="text" 
							 name="endereco" 
							 maxlength="80" 
							 size="80"
							 value="<?php echo $endereco;?>">
							 
			Numero: <input type="text" 
						   name="numCasa" 
						   maxlength="10" 
						   size="10"
						   value="<?php echo $numCasa;?>"><br><br>
						   
			Bairro: <input type="text" 
						   name="bairro" 
						   maxlength="45" 
						   size="45"
						   value="<?php echo $bairro;?>">
						   
			Cidade: <input type="text" 
						   name="cidade" 
						   maxlength="45" 
						   size="45"
						   value="<?php echo $cidade;?>">
						   
			Uf: <input type="text" 
					   name="uf" 
					   maxlength="2" 
					   size="2"
					   value="<?php echo $uf;?>;">
					   
			Cep: <input type="number" 
						name="cep" 
						maxlength="9" 
						size="9"
						value="<?php echo $cep;?>"><br><br>
						
			Telefones:<br>
			Residencial:
			DDD:
			<input type="number" 
				   name="ddd" 
				   maxlength="3" 
				   size="3" value="<?php echo $ddd;?>"> 
				   
			<input type="number" 
					name="foneRes" 
					maxlength="9" 
					size="9" value="<?php echo $foneRes;?>"> 
						  
			Celular: 
			DDD:
			<input type="number" 
				   name="ddd" 
				   maxlength="3" size="3" value="<?php echo $ddd;?>"> 
				   
			<input type="number" 
				   name="foneCel" 
				   maxlength="9" 
				   size="9" value="<?php echo $foneCel;?>">
			<br><br>
			
			E-mail:
			<input type="email" 
				   name="email" 
				   maxlength="50" 
				   size="50" value="<?php echo $email;?>"><br><br>
		
			Observações:<br>
			<textarea 	name="obs" 
						rows="3" 
						cols="80"
						placeholder="Histórico do cliente"><?php echo $obs;?></textarea>
			<br>
			<br>	
			<hr>

			
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>