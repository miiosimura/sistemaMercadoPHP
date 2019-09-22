<?php
	#estabelecendo conexão com o banco de dados
	$con = mysqli_connect('localhost','root','') or die(mysqli_error($con));
	
	#criando o banco de dados atraves do script php
	$create_base = "CREATE DATABASE IF NOT EXISTS supermercado";

	#criando a tabela de registros atravé de um script php
	$create_table_venda = "CREATE TABLE IF NOT EXISTS venda (
								idVenda 		INT(11) AUTO_INCREMENT PRIMARY KEY,
								idProduto1 		INT(11),
								qtde1 			INT(3),
								prUnitario1		FLOAT(7,2),
								prTotal1		FLOAT(7,2),
								idProduto2 		INT(11),
								qtde2 			INT(3),
								prUnitario2		FLOAT(7,2),
								prTotal2		FLOAT(7,2),
								idProduto3 		INT(11),
								qtde3 			INT(3),
								prUnitario3		FLOAT(7,2),
								prTotal3		FLOAT(7,2),
								idProduto4 		INT(11),
								qtde4 			INT(3),
								prUnitario4		FLOAT(7,2),
								prTotal4		FLOAT(7,2),
								idProduto5 		INT(11),
								qtde5 			INT(3),
								prUnitario5		FLOAT(7,2),
								prTotal5		FLOAT(7,2),
								dataVenda		DATE,
								totalCompra		FLOAT(7,2))";
			
	$create_table_produto = "CREATE TABLE IF NOT EXISTS produto (
								idProduto		INT(11) AUTO_INCREMENT PRIMARY KEY,
								nomeProduto		VARCHAR(30),
								prUnitario		FLOAT(7,2))";
	
	$create_table_produto2 = "create table if not exists produto(
								   codProduto   int(5) AUTO_INCREMENT PRIMARY KEY,
								   nome         varchar(40),
								   fabricante   varchar(40),
								   codFabricante  int(10),
								   custo         float(7,2),
								   despesas      float(7,2),
								   lucro         float(7,2),
								   precoVenda    float(7,2),
								   promocao      boolean   ,
								   precoPromocio float(7,2),
								   categoria     char(1),
								   peso          float(7,2),
								   ativo         boolean   ,
								   descricao     text)";
			
	#comando para selecionar os registros da tabela
	$select_produto = "SELECT * FROM produto";
	$select_produto2 ="SELECT * FROM produto";
	
	#comando para inserir registros na tabela
	$insert_produto = "INSERT INTO produto(nomeProduto, prUnitario) VALUES
				('Batata kg', '0.99'),
				('Banana kg', '2.50'),
				('Café Mellita', '8.99'),
				('Coxão duro', '18.99'),
				('Pão francês', '1.50'),
				('Sabão líquido Omo', '6.49')";
	
	$insert_produto2 = "INSERT INTO produto (codProduto, nome			 , fabricante  , codFabricante, precoVenda, custo, despesas, lucro , promocao, precoPromocio, categoria, peso   , ativo, descricao) VALUES 
											(0		   , 'Batata kg'	 , 'Fazenda'   , '8596'	   	  , '1.99'	  ,'0.15', '0.20'  , '0.90', '0'	 , '1.99'	 	, 'A'	   , '1'    , '1'  , 'Batata lavada'),
											(0		   , 'Banana kg'	 , 'Fazenda'   , '784'		  , '3.50'	  ,'0.5' , '0.072' , '1.50', '0'	 , '2.50'	 	, 'F'	   , '1'    , '1'  , 'Banana nanica'),
											(0		   , 'Café kg' 	  	 , 'Mellita'   , '6523'	      , '11.99'	  ,'3'	 , '2'	   , '7'   , '0'	 , '8.99'	 	, 'F'	   , '1'    , '1'  , 'Café em pó tradicional'),
											(0		   , 'Coxão duro kg' , 'JBS'	   , '35'		  , '21.99'	  ,'2'	 , '1'	   , '18'  , '0'	 , '17.99'	 	, 'C'	   , '1'    , '1'  , 'Carne magra'),
											(0		   , 'Pão francês kg', 'Fabricante', '7845'	      , '1.50'	  ,'0.5' , '0.072' , '0.80', '0'	 , '0.99'	 	, 'P'	   , '0.100', '1'  , 'Pão fresco'),
											(0		   , 'Sabão líquido' , 'Omo'	   , '541'		  , '9.49'	  ,'3'	 , '2'	   , '8'   , '0'	 , '6.49'	 	, 'L'	   , '1.1'  , '1'  , 'Sabão líquido Omo'),
											(0		   , 'Coca Cola'	 , 'Coca Cola' , '23344'	  , '8'		  ,'2'	 , '1'	   , '5'   , '1'	 , '7.50'	 	, 'B'	   , '0.200', '1'  , 'Bebida Coca Cola'),
											(0		   , 'Detergente'	 , 'YPE'	   , '3344'	      , '1.572'	  ,'0.5' , '0.072' , '1'   , '0'	 , '0.99'	 	, 'L'	   , '20'   , '1'  , 'Detergente lava louça'),
											(0		   , 'Fralda Pampers', 'Pampers'   , '667778'	  , '15'	  ,'3'	 , '2'	   , '10'  , '0'	 , '12'	 		, 'H'	   , '0.100', '1'  , 'Lenco umedicido infantil')";
	
	
	$resultadoOK = mysqli_query($con, $create_base) or die(mysqli_error($con));
	
	#selcionando o banco de dados
	mysqli_select_db($con, "supermercado") or die(mysqli_error($con));

	if($resultadoOK)
	{
		#criando a tabela no banco de dados
		mysqli_query($con, $create_table_venda) or die(mysqli_error($con));
		mysqli_query($con, $create_table_produto2) or die(mysqli_error($con));

		#verificando se existe registros no banco
		$registros = mysqli_query($con, $select_produto2);
		$linhas=mysqli_num_rows($registros);
		

		#se não existir registros então insere os valores abaixo
		if($linhas<1) 
		{
			#insere alguns dados para os exemplos
			mysqli_query($con, $insert_produto2) or die(mysqli_error($con));
		}
	}
	echo 'O Banco e a tabela já foram criados.';
?>