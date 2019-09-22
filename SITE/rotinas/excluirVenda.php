<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
		
		<!-- Menu -->
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link" href="../index.html">Home</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="../cadCliente.html">Cliente</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cadEstoque.html">Estoque</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cadFornecedor.html">Fornecedores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cadFuncionario.html">Funcionários</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="../cadProduto.html">Produto</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="../cadVenda1.php">Vendas</a>
			</li>
		</ul>
		
		<!-- Conteudo AQUI! -->
		<?php
			$con=mysqli_connect('localhost', 'root', '') ;
		  
			mysqli_select_db($con, 'supermercado') or 
				die("Erro na seleção do banco:" . mysqli_error($con));

			$idVenda = $_GET["c"];
			$delete_venda=" DELETE FROM venda WHERE idVenda=$idVenda";
			mysqli_query($con, $delete_venda) or 
				die("Erro na exclusão da venda: " . mysqli_error($con));
		  
			echo "Venda com o código $idVenda excluída com sucesso.<hr>";
			echo "Clique <a href='listagemVenda.php'>aqui</a> para continuar.";
		?>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>