<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/mystyle.css">
		<script>
		function localizaPreco(idProduto, numLinha)
		{
			valor = precoProdutos[idProduto]
				
			campoPreco="prUnitario"+numLinha
			document.getElementById(campoPreco).value=valor
		}
		
		function CalculaPrTotal(numLinha)
		{
			campoUnitario = "prUnitario"+numLinha
			campoTotal = "prTotal" +numLinha
			campoQtde = "qtde" +numLinha
			
			vUnitario = document.getElementById(campoUnitario).value
			vQtde = document.getElementById(campoQtde).value
			Vlrtotal =  vUnitario*vQtde
			document.getElementById(campoTotal).value = Vlrtotal
			return(Vlrtotal)
		}
		function CalculaTotalCompra()
		{
			total=0;
			for(n=1; n<=5;n++)
			{
				total +=CalculaPrTotal(n)
			}
			document.getElementById("totalCompra").value = total
		}
		</script>
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
		
		<!-- Menu -->
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link" href="index.html">Home</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadEstoque.html">Estoque</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cadFornecedor.html">Fornecedores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cadFuncionario.html">Funcionários</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadProduto.html">Produto</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadVenda1.php">Vendas</a>
			</li>
		</ul>
		
		
		<!-- Conteudo AQUI! -->
		
		<h2>Cadastro de Vendas</h2>
		<?php
			#chama o arquivo de configuração com o banco
			require 'rotinas/conexao1.php';

			#seleciona os dados da tabela produto
			$select_produto = "SELECT * FROM entradaProduto";
			$query = mysqli_query($con, $select_produto2) or
				die("Erro na seleção dos registros: " . mysqli_error($con));
			
			echo "\n<script>\n";
			$contador=0;
			echo "precoProdutos=Array()\n";
			while($prod = mysqli_fetch_array($query)) { 
				$codProduto=$prod['codProduto'];
				echo "precoProdutos[$codProduto]=" .$prod['precoVenda'];
				echo "\n";
				$contador++;
			}
			echo "</script>\n";
							
		?>
		<form 	action="cadVenda2.php" 
				enctype="multipart/form-data"
				method="post">
			<input type="hidden" name="idVenda" >
			<table border='1'>
				<tr>
					<th>Item</th>
					<th>Produto</th>
					<th>Quantidade</th>
					<th>Preço Unitário</th>
					<th>Valor Total</th>
				</tr>
				<tr>
					<th>1</th>
					<td> 
						<select name="idProduto1" onblur="localizaPreco(this.value,1)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>"><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde1" id="qtde1" max="10" min="1" maxlength="3" onblur="CalculaPrTotal(1);CalculaTotalCompra()"></td>
					<td> <input type="text" name="prUnitario1" id="prUnitario1"> </td>
					<td> <input type="text" name="prTotal1" id="prTotal1"> </td>
				</tr>
				<tr>
					<th>2</th>
					<td> 
						<select name="idProduto2" onblur="localizaPreco(this.value,2)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>"><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde2" id="qtde2" max="10" min="1" maxlength="3" onblur="CalculaPrTotal(2);CalculaTotalCompra()"></td>
					<td> <input type="text" name="prUnitario2" id="prUnitario2"> </td>
					<td> <input type="text" name="prTotal2" id="prTotal2"> </td>
				</tr>
				<tr>
					<th>3</th>
					<td> 
						<select name="idProduto3" onblur="localizaPreco(this.value,3)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>"><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde3" id="qtde3" max="10" min="1" maxlength="3" onblur="CalculaPrTotal(3);CalculaTotalCompra()"></td>
					<td> <input type="text" name="prUnitario3" id="prUnitario3"> </td>
					<td> <input type="text" name="prTotal3" id="prTotal3"> </td>
				</tr>
				<tr>
					<th>4</th>
					<td> 
						<select name="idProduto4" onblur="localizaPreco(this.value,4)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>"><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde4" id="qtde4" max="10" min="1" maxlength="3" onblur="CalculaPrTotal(4);CalculaTotalCompra()"></td>
					<td> <input type="text" name="prUnitario4" id="prUnitario4"> </td>
					<td> <input type="text" name="prTotal4" id="prTotal4"> </td>
				</tr>
				<tr>
					<th>5</th>
					<td> 
						<select name="idProduto5" onblur="localizaPreco(this.value,5)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>"><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde5" id="qtde5" max="10" min="1" maxlength="3" onblur="CalculaPrTotal(5);CalculaTotalCompra()"></td>
					<td> <input type="text" name="prUnitario5" id="prUnitario5"> </td>
					<td> <input type="text" name="prTotal5" id="prTotal5"> </td>
				</tr>
			</table>
			<hr>
			Data: 
			<input 	type="date" 
					name="dataVenda"
					min="2018-09-12"
					max="2025-12-31">
			Total da compra:
			<input type="text" name="totalCompra" id="totalCompra">
			<hr>
			<a href='rotinas/listagemVenda.php'>Ver listagem dos dados</a><br><br>
			<input type="submit" value="Enviar"><br><br><br><br>
		</form>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>