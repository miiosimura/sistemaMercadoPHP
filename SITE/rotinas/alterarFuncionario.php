<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/funcionarios-style.css">
		<link rel="stylesheet" href="../css/mystyle.css">
	
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
			if (!isset($_GET["cod"]))
				die("Programa não foi chamado corretamente");
			
			$codFuncionario = $_GET["cod"];
						
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con, "supermercado") or
			  die ("Erro na seleção do banco supermercado: ".mysqli_error($con));
			
			$comando = "SELECT * FROM funcionario WHERE codFuncionario = $codFuncionario";
			
			$registros = mysqli_query($con, $comando) or
			  die("Erro na seleção do registro $codFuncionario".mysqli_error($con));
			
			$linhas = mysqli_num_rows($registros);
			
			if ($linhas < 1)
				die("Código não encontrado. Registro excluido");
			
			$dados = mysqli_fetch_array($registros);
			
			$codFuncionario = 	$dados["codFuncionario"];
            $nomeFuncionario =  $dados["nomeFuncionario"];
            $dataNasc =         $dados["dataNasc"];
            $cargo =            $dados["cargo"];
            $dataContratado =   $dados["dataContratado"];
            $cpf =              $dados["cpf"];
            $rg =               $dados["rg"];
            $endereco =         $dados["endereco"];
            $bairro =           $dados["bairro"];
            $cidade =           $dados["cidade"];
            $uf =               $dados["uf"];
            $cep =              $dados["cep"];
            $ddd =              $dados["ddd"];
            $foneCel =          $dados["foneCel"];
            $foneRes =          $dados["foneRes"];
            $email =            $dados["email"];
            $obs =              $dados["obs"];
            $sexo =             $dados["sexo"];
            $estadoCivil =      $dados["estadoCivil"];
            $ativo =            $dados["ativo"];  
			
		?>
		
				
		<div id="funcionarios">
				<div class="texto">
					<h1>Cadastro de Funcionário - Alteração</h1>
				</div>
			
			<form 	action="gravarFuncionario.php"
					method="post"
					enctype="multipart/form-data"
					class="formulario">
				
				<div class="form1">
				<input type="hidden" name="codFuncionario" value="<?php echo $codFuncionario; ?>">
				
				<input type="text" name="nomeFuncionario" id="" placeholder="Nome do funcionário" value="<?php echo $nomeFuncionario; ?>" required>
				
				Data Nascimento<input type="date" name="dataNasc" id="" placeholder="Data de nascimento" value="<?php echo $dataNasc; ?>" required>
				
				<input type="text" name="cargo" id="" placeholder="Cargo" value="<?php echo $cargo; ?>" required>

				Data Contratado<input type="date" name="dataContratado" id="" value="<?php echo $dataContratado; ?>" required>
				
				<input type="number" name="cpf" id="" placeholder="CPF" value="<?php echo $cpf; ?>" required>
				
				<input type="number" name="rg" id="" placeholder="RG" value="<?php echo $rg; ?>" required>
				
				<input type="text" name="endereco" id="" placeholder="endereço..." value="<?php echo $endereco; ?>" required>
				<input type="text" name="bairro" id="" placeholder="bairro..." value="<?php echo $bairro; ?>">
				<input type="text" name="cidade" id="" placeholder="cidade..." value="<?php echo $cidade; ?>">
				UF <select name="uf" id="">
					<option value="AC" <?php if ($uf == "AC") echo "selected"; ?>>AC</option>
					<option value="AL"<?php if ($uf == "AL") echo "selected"; ?>>AL</option>
					<option value="AP"<?php if ($uf == "AP") echo "selected"; ?>>AP</option>
					<option value="AM"<?php if ($uf == "AM") echo "selected"; ?>>AM</option>
					<option value="BA"<?php if ($uf == "BA") echo "selected"; ?>>BA</option>
					<option value="CE"<?php if ($uf == "CE") echo "selected"; ?>>CE</option>
					<option value="DF"<?php if ($uf == "DF") echo "selected"; ?>>DF</option>
					<option value="ES"<?php if ($uf == "ES") echo "selected"; ?>>ES</option>
					<option value="GO"<?php if ($uf == "GO") echo "selected"; ?>>GO</option>
					<option value="MA"<?php if ($uf == "MA") echo "selected"; ?>>MA</option>
					<option value="MT"<?php if ($uf == "MT") echo "selected"; ?>>MT</option>
					<option value="MS"<?php if ($uf == "MS") echo "selected"; ?>>MS</option>
					<option value="MG"<?php if ($uf == "MG") echo "selected"; ?>>MG</option>
					<option value="PA"<?php if ($uf == "PA") echo "selected"; ?>>PA</option>
					<option value="PB"<?php if ($uf == "PB") echo "selected"; ?>>PB</option>
					<option value="PR"<?php if ($uf == "PR") echo "selected"; ?>>PR</option>
					<option value="PE"<?php if ($uf == "PE") echo "selected"; ?>>PE</option>
					<option value="PI"<?php if ($uf == "PI") echo "selected"; ?>>PI</option>
					<option value="RJ"<?php if ($uf == "RJ") echo "selected"; ?>>RJ</option>
					<option value="RN"<?php if ($uf == "RN") echo "selected"; ?>>RN</option>
					<option value="RS"<?php if ($uf == "RS") echo "selected"; ?>>RS</option>
					<option value="RO"<?php if ($uf == "RO") echo "selected"; ?>>RO</option>
					<option value="RR"<?php if ($uf == "RR") echo "selected"; ?>>RR</option>
					<option value="SC"<?php if ($uf == "SC") echo "selected"; ?>>SC</option>
					<option value="SP"<?php if ($uf == "SP") echo "selected"; ?>>SP</option>
					<option value="SE"<?php if ($uf == "SE") echo "selected"; ?>>SE</option>
					<option value="TO"<?php if ($uf == "TO") echo "selected"; ?>>TO</option>
				</select>				
								
				<input type="number" name="cep" id="" placeholder="CEP" value="<?php echo $cep; ?>">
				<input type="number" name="ddd" id="" placeholder="DDD" value="<?php echo $ddd; ?>">
				<input type="number" name="foneCel" id="" placeholder="Celular" value="<?php echo $foneCel; ?>">
				<input type="number" name="foneRes" id="" placeholder="Telefone Residencial" value="<?php echo $foneRes; ?>">
				<input type="email" name="email" id="" placeholder="Email" value="<?php echo $email; ?>">
				<input type="text" name="obs" id="" placeholder="Observações" value="<?php echo $obs; ?>">
						
				<div class="radio">
					Sexo:
				<select name="sexo" id="sexo">
					<option value="F" <?php if($sexo=='F') echo 'selected';?>>Feminino</option>
					<option value="M" <?php if($sexo=='M') echo 'selected';?>>Masculino</option>
				</select>
				<br>
								
					Estado Civil:
					<select name="estadoCivil" id="estadoCivil">
						<option value="S" <?php if ($estadoCivil == "S") echo "selected"; ?>>Solteiro</option> 
						<option value="C" <?php if ($estadoCivil == "C") echo "selected"; ?>>Casado</option> 
						<option value="V" <?php if ($estadoCivil == "V") echo "selected"; ?>>Viúvo</option> 
						<option value="D" <?php if ($estadoCivil == "D") echo "selected"; ?>>Divorciado</option>
					</select>
				<br>
				
					Ativo:
					<input type="checkbox" name="ativo" id="ativo" value="1" <?php if($ativo==1) echo 'checked';?>>
				</div>
				<input type="submit" value="Submit" onclick="alerta()">
				<a href="listagemFuncionario.php">Ver listagem dos dados</a>
				<br>
			</form>
		</div>
			
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>