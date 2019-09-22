<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/mystyle.css">
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
		
		<h2>Alteração de Cadastro de Vendas</h2>
		<?php
			#chama o arquivo de configuração com o banco
			require 'conexao1.php';

			#seleciona os dados da tabela produto
			$select_produto = "SELECT * FROM entradaProduto;";
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
			
			// Verificando se usuário chamou a rotina de forma adequada
			// variável c chegou via método GET?
			
			if(!isset($_GET["c"]))
				die("Rotina executada de forma incorreta!.");
			
			$idVenda=(int) $_GET["c"];
			// Código foi passado corretamente (é um número)?
			if($idVenda<1)
				die("Código da venda informada incorretamente.");
			
			//include "conexao.php";
			
			// Criando o comando de SELEÇÃO de dados
			$select_venda = "SELECT * FROM venda WHERE idVenda=$idVenda";
			
			// Enviando o comando para o banco e recebendo o registro
			$rs = mysqli_query($con, $select_venda) or
				die("Erro na recuperação do regitro da venda: " . mysqli_error($con));
				
			// Encontrou o pet conforme código passado?
			$linhas = mysqli_num_rows($rs);
			if($linhas<1)
				die("Venda com código $idVenda não encontrado.");
			
			// Pegando os dados de $rs e inserindo numa matriz de dados
			$dados = mysqli_fetch_array($rs) or	die("Erro na criação de matriz de dados: " . mysqli_error($con)); 
				
			// Criando variáveis da matriz dados para facilitar o trabalho
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
			
			// Inserindo os valores nos campos do formulário.
			//enctype é necessário para mandar arquivos	
							
		?>
		<form 	action="gravarVenda.php" 
				enctype="multipart/form-data"
				method="post">
			<input type="hidden" name="idVenda"  value="<?php echo $idVenda;?>">
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
									<option value="<?php echo $prod['codProduto'] ?>" <?php if($idProduto1==$prod['codProduto']) echo 'selected';?>><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde1" id="qtde1" max="10" min="0" maxlength="3" 
								onblur="CalculaPrTotal(1);CalculaTotalCompra()" value='<?php echo $qtde1;?>'></td>
					<td> <input type="text" name="prUnitario1" id="prUnitario1" value='<?php echo $prUnitario1;?>'> </td>
					<td> <input type="text" name="prTotal1" id="prTotal1" value='<?php echo $prTotal1;?>'> </td>
				</tr>
				<tr>
					<th>2</th>
					<td> 
						<select name="idProduto2" onblur="localizaPreco(this.value,2)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>" <?php if($idProduto2==$prod['codProduto']) echo 'selected';?>><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde2" id="qtde2" max="10" min="0" maxlength="3" 
								onblur="CalculaPrTotal(2);CalculaTotalCompra()" value='<?php echo $qtde2;?>'></td>
					<td> <input type="text" name="prUnitario2" id="prUnitario2" value='<?php echo $prUnitario2;?>'> </td>
					<td> <input type="text" name="prTotal2" id="prTotal2" value='<?php echo $prTotal2;?>'> </td>
				</tr>
				<tr>
					<th>3</th>
					<td> 
						<select name="idProduto3" onblur="localizaPreco(this.value,3)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>" <?php if($idProduto3==$prod['codProduto']) echo 'selected';?>><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde3" id="qtde3" max="10" min="0" maxlength="3" 
								onblur="CalculaPrTotal(3);CalculaTotalCompra()" value='<?php echo $qtde3;?>'></td>
					<td> <input type="text" name="prUnitario3" id="prUnitario3" value='<?php echo $prUnitario3;?>'> </td>
					<td> <input type="text" name="prTotal3" id="prTotal3" value='<?php echo $prTotal3;?>'> </td>
				</tr>
				<tr>
					<th>4</th>
					<td> 
						<select name="idProduto4" onblur="localizaPreco(this.value,4)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>" <?php if($idProduto4==$prod['codProduto']) echo 'selected';?>><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde4" id="qtde4" max="10" min="0" maxlength="3" 
								onblur="CalculaPrTotal(4);CalculaTotalCompra()" value='<?php echo $qtde4;?>'></td>
					<td> <input type="text" name="prUnitario4" id="prUnitario4" value='<?php echo $prUnitario4;?>'> </td>
					<td> <input type="text" name="prTotal4" id="prTotal4" value='<?php echo $prTotal4;?>'> </td>
				</tr>
				<tr>
					<th>5</th>
					<td> 
						<select name="idProduto5" onblur="localizaPreco(this.value,5)">
							<option>Selecione...</option>
							<?php 
							mysqli_data_seek($query,0);
							while($prod = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $prod['codProduto'] ?>" <?php if($idProduto5==$prod['codProduto']) echo 'selected';?>><?php echo $prod['nome'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td> <input type="number" name="qtde5" id="qtde5" max="10" min="0" maxlength="3" 
								onblur="CalculaPrTotal(5);CalculaTotalCompra()" value='<?php echo $qtde5;?>'></td>
					<td> <input type="text" name="prUnitario5" id="prUnitario5" value='<?php echo $prUnitario5;?>'> </td>
					<td> <input type="text" name="prTotal5" id="prTotal5" value='<?php echo $prTotal5;?>'> </td>
				</tr>
			</table>
			<hr>
			Data: 
			<input 	type="date" 
					name="dataVenda"
					min="2018-09-12"
					max="2025-12-31"
					value='<?php echo $dataVenda;?>'>
			Total da compra:
			<input type="text" name="totalCompra" id="totalCompra" value='<?php echo $totalCompra;?>'>
			<hr>
			<a href='listagemVenda.php'>Ver listagem dos dados</a><br><br>
			<input type="submit" value="Enviar">
		</form>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>