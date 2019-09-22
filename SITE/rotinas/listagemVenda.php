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
			require 'conexao1.php';
			
			$con=mysqli_connect("localhost", "root", "") or die("<br>Erro na conexão com o MYSQL.") ;

			mysqli_select_db($con , "supermercado") or die("<br>Falha na seleção do banco de dados:" . mysqli_error($con));
					
			$select_venda="SELECT * FROM venda" ;
			
			$rs = mysqli_query($con , $select_venda) or die("<br>Falha na seleção de dados:" .	mysqli_error($con) );
			
			$linhas = mysqli_num_rows($rs) or die("<br>Falha na recuperação dos registros:" . mysqli_error($con) );
					
			echo "<br>Número de registros encontrados: $linhas <br>";
			echo "<a href='../cadVenda1.php'>Voltar Vendas</a><br>";
			
			while( $dados = mysqli_fetch_array($rs) )
			{
				$idVenda		= $dados["idVenda"];
				$idProduto1  	= $dados["idProduto1"];
				$qtde1   		= $dados["qtde1"];
				$prUnitario1	= $dados["prUnitario1"];
				$prTotal1		= $dados["prTotal1"];
				
				$idProduto2  	= $dados["idProduto2"];
				$qtde2   		= $dados["qtde2"];
				$prUnitario2	= $dados["prUnitario2"];
				$prTotal2		= $dados["prTotal2"];
				
				$idProduto3  	= $dados["idProduto3"];
				$qtde3   		= $dados["qtde3"];
				$prUnitario3	= $dados["prUnitario3"];
				$prTotal3		= $dados["prTotal3"];
				
				$idProduto4  	= $dados["idProduto4"];
				$qtde4   		= $dados["qtde4"];
				$prUnitario4	= $dados["prUnitario4"];
				$prTotal4		= $dados["prTotal4"];
				
				$idProduto5  	= $dados["idProduto5"];
				$qtde5   		= $dados["qtde5"];
				$prUnitario5	= $dados["prUnitario5"];
				$prTotal5		= $dados["prTotal5"];
				
				$dataVenda   	= $dados["dataVenda"];
				$totalCompra   	= $dados["totalCompra"];
				
				echo "<table border='1'>";
				echo "	<tr>";
				echo "		<th>ID da Venda</th>";
				echo "		<th>Item</th>";
				echo "		<th>Produto</th>";
				echo "		<th>Quantidade</th>";
				echo "		<th>Preço Unitário</th>";
				echo "		<th>Valor Total</th>";
				echo "		<th>Data</th>";
				echo "		<th>Total da compra</th>";
				echo "		<th colspan=2>Ações</th>";
				echo "	</tr>";
				
				echo "	<tr>";
				echo "		<td rowspan=8>$idVenda</td>" ;
				echo "		<th>1</th>";
				echo "		<td>$idProduto1</td>" ;
				echo "		<td>$qtde1</td>" ;
				echo "		<td>$prUnitario1</td>" ;
				echo "		<td>$prTotal1</td>" ;
				echo "		<td rowspan=8>$dataVenda</td>" ;
				echo "		<td rowspan=8>$totalCompra</td>" ;
				echo "		<td rowspan=8> <a href='alterarVenda.php?c=$idVenda'>Alterar</a> </td>" ;
				echo "		<td rowspan=8> <a href='excluirVenda.php?c=$idVenda'>Excluir</a> </td>" ;
				echo "	</tr>";
				echo "<br>";
				
				echo "	<tr>";
				echo "		<th>2</th>";
				echo "		<td>$idProduto2</td>" ;
				echo "		<td>$qtde2</td>" ;
				echo "		<td>$prUnitario2</td>" ;
				echo "		<td>$prTotal2</td>" ;
				echo "	<tr>";
				
				echo "	<tr>";
				echo "		<th>3</th>";
				echo "		<td>$idProduto3</td>" ;
				echo "		<td>$qtde3</td>" ;
				echo "		<td>$prUnitario3</td>" ;
				echo "		<td>$prTotal3</td>" ;
				echo "	<tr>";
				
				echo "	<tr>";
				echo "		<th>4</th>";
				echo "		<td>$idProduto4</td>" ;
				echo "		<td>$qtde4</td>" ;
				echo "		<td>$prUnitario4</td>" ;
				echo "		<td>$prTotal4</td>" ;
				echo "	<tr>";
				
				echo "	<tr>";
				echo "		<th>5</th>";
				echo "		<td>$idProduto5</td>" ;
				echo "		<td>$qtde5</td>" ;
				echo "		<td>$prUnitario5</td>" ;
				echo "		<td>$prTotal5</td>" ;
				echo "	<tr>";
			}
			
			echo "</table><br><br><br><br>" ;
		?>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>