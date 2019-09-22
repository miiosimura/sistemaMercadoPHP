<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/mystyle.css">
	</head>
	
	<body>
		<!-- Banner -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<center>
					<a href="index.html">
						<img 	src="imagens/logo.png"
								title="&copy; Mercado Cid">
					</a>
				</center>
			</div>
		</div>
		
		
		<!-- Conteudo AQUI! -->
		<?php
			// Criando as variáveis
			$idVenda		= (int)$_POST["idVenda"];
			$idProduto1		= (int)$_POST["idProduto1"];
			$qtde1			= (int)$_POST["qtde1"];
			$prUnitario1	= (float)$_POST["prUnitario1"];
			$prTotal1		= (float)$_POST["prTotal1"];
			
			$idProduto2		= (int)$_POST["idProduto2"];
			$qtde2			= (int)$_POST["qtde2"];
			$prUnitario2	= (float)$_POST["prUnitario2"];
			$prTotal2		= (float)$_POST["prTotal2"];
			
			$idProduto3		= (int)$_POST["idProduto3"];
			$qtde3			= (int)$_POST["qtde3"];
			$prUnitario3	= (float)$_POST["prUnitario3"];
			$prTotal3		= (float)$_POST["prTotal3"];
			
			$idProduto4		= (int)$_POST["idProduto4"];
			$qtde4			= (int)$_POST["qtde4"];
			$prUnitario4	= (float)$_POST["prUnitario4"];
			$prTotal4		= (float)$_POST["prTotal4"];
			
			$idProduto5		= (int)$_POST["idProduto5"];
			$qtde5			= (int)$_POST["qtde5"];
			$prUnitario5	= (float)$_POST["prUnitario5"];
			$prTotal5		= (float)$_POST["prTotal5"];
			
			$dataVenda 		= $_POST["dataVenda"];
			$totalCompra	= (float)$_POST["totalCompra"];
			
			// Validando os dados
			if ( $idProduto1 == "")
				die("O registro deve conter pelo menos o 1º produto.");
					
			if ( $qtde1 == "")
				die("Código do caixa deve ser infomado.");
					
			if ( $dataVenda == "")
				die("A data da venda deve ser informada.");
			
			// Exibindo os dados
			echo "<table border='1'>";
			echo "<tr>";
			echo "	<th>Item</th>";
			echo "	<th>Produto</th>";
			echo "	<th>Quantidade</th>";
			echo "	<th>Preço Unitário</th>";
			echo "	<th>Valor Total</th>";
			echo "</tr>";
				
			echo "	<tr>";
			echo "		<td>1</td>" ;
			echo "		<td>$idProduto1</td>" ;
			echo "		<td>$qtde1</td>" ;
			echo "		<td>$prUnitario1</td>" ;
			echo "		<td>$prTotal1</td>" ;
			echo "	</tr>";
			echo "</table>";
			echo "<hr>";

					
					
			echo "<table border='1'>";
			echo "<tr>";
			echo "	<th>Item</th>";
			echo "	<th>Produto</th>";
			echo "	<th>Quantidade</th>";
			echo "	<th>Preço Unitário</th>";
			echo "	<th>Valor Total</th>";
			echo "</tr>";
				
			echo "	<tr>";
			echo "		<td>2</td>" ;
			echo "		<td>$idProduto2</td>" ;
			echo "		<td>$qtde2</td>" ;
			echo "		<td>$prUnitario2</td>" ;
			echo "		<td>$prTotal2</td>" ;
			echo "	</tr>";
			echo "</table>";
			echo "<hr>";
					
					
					
			echo "<table border='1'>";
			echo "<tr>";
			echo "	<th>Item</th>";
			echo "	<th>Produto</th>";
			echo "	<th>Quantidade</th>";
			echo "	<th>Preço Unitário</th>";
			echo "	<th>Valor Total</th>";
			echo "</tr>";
				
			echo "	<tr>";
			echo "		<td>3</td>" ;
			echo "		<td>$idProduto3</td>" ;
			echo "		<td>$qtde3</td>" ;
			echo "		<td>$prUnitario3</td>" ;
			echo "		<td>$prTotal3</td>" ;
			echo "	</tr>";
			echo "</table>";
			echo "<hr>";
					
					
					
			echo "<table border='1'>";
			echo "<tr>";
			echo "	<th>Item</th>";
			echo "	<th>Produto</th>";
			echo "	<th>Quantidade</th>";
			echo "	<th>Preço Unitário</th>";
			echo "	<th>Valor Total</th>";
			echo "</tr>";
				
			echo "	<tr>";
			echo "		<td>4</td>" ;
			echo "		<td>$idProduto4</td>" ;
			echo "		<td>$qtde4</td>" ;
			echo "		<td>$prUnitario4</td>" ;
			echo "		<td>$prTotal4</td>" ;
			echo "	</tr>";
			echo "</table>";
			echo "<hr>";
					
					
					
			echo "<table border='1'>";
			echo "<tr>";
			echo "	<th>Item</th>";
			echo "	<th>Produto</th>";
			echo "	<th>Quantidade</th>";
			echo "	<th>Preço Unitário</th>";
			echo "	<th>Valor Total</th>";
			echo "</tr>";
			
			echo "	<tr>";
			echo "		<td>5</td>" ;
			echo "		<td>$idProduto5</td>" ;
			echo "		<td>$qtde5</td>" ;
			echo "		<td>$prUnitario5</td>" ;
			echo "		<td>$prTotal5</td>" ;
			echo "	</tr>";
			echo "</table>";
			echo "<hr>";
			
			
			
			echo "Data da venda: $dataVenda<br>";
			echo "Valor total da venda: $totalCompra<hr>";
			
			echo "1 - Conectando no MySql...<br>";
					
			$con = mysqli_connect("localhost", "root", "");
				
			echo "2 - Abrindo o banco supermercado...<br>";
			mysqli_select_db ($con, "supermercado") or
				die("Erro na seleção do banco." . mysqli_error($con));
						
			$insert_venda = "insert into venda (
				idVenda, idProduto1, qtde1, prUnitario1, prTotal1,
						 idProduto2, qtde2, prUnitario2, prTotal2,
						 idProduto3, qtde3, prUnitario3, prTotal3,
						 idProduto4, qtde4, prUnitario4, prTotal4,
						 idProduto5, qtde5, prUnitario5, prTotal5, dataVenda, totalCompra)
									  values (
				'$idVenda', '$idProduto1', '$qtde1', '$prUnitario1', '$prTotal1',
							'$idProduto2', '$qtde2', '$prUnitario2', '$prTotal2',
							'$idProduto3', '$qtde3', '$prUnitario3', '$prTotal3',
							'$idProduto4', '$qtde4', '$prUnitario4', '$prTotal4',
							'$idProduto5', '$qtde5', '$prUnitario5', '$prTotal5', '$dataVenda','$totalCompra')";
			
			mysqli_query($con, $insert_venda) or
				die("Erro na execução do comando de inserção de registro MySQL: " . mysqli_error($con));
						
			echo "<br>Registro gravado com sucesso<br>";
			
			echo "<a href='rotinas/listagemVenda.php'>Ver listagem dos dados</a><br>";
			echo "<a href='cadVenda1.php'>Voltar</a><br><br><br><br>";
		?>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>