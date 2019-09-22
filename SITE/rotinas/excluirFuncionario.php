<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/mystyle.css">
		<meta charset="utf-8">
		<style>
			div{
				text-align: center;
			}
		</style>
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
		
		<!-- Conteudo AQUI! -->
		<div>
			<?php
				$con = mysqli_connect('localhost','root','');
				
				mysqli_select_db($con, 'supermercado')or
					die("Erro na seleção do banco: ".mysqli_error($con));
					
				$codFuncionario = $_GET["cod"];
				$comandoSQL = "DELETE FROM funcionario WHERE codFuncionario = $codFuncionario";
				mysqli_query($con, $comandoSQL) or
					die("Erro na exclusão dos dados: ".mysqli_error($con));
					
				echo "Funcionario de codigo $codFuncionario foi excluido com sucesso!<br>";
				echo "<a href='listagemFuncionario.php'>Voltar</a>";
			?>

		</div>
		
		<!-- Rodape -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>