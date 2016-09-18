<?php 
require_once('../inc/config.php');
$conexao = conecta();

if ($conexao) 
{
	# crea a tabela no banco
	$query ="CREATE TABLE negociacao_mercadorias 
			(
  				codigo varchar(10) NOT NULL PRIMARY KEY,
  				nome varchar(255) NOT NULL,
  				tipo varchar(50) NOT NULL,
  				quantidade integer NOT NULL,
  				preco decimal(10,2) NOT NULL,
  				tipo_negocio varchar(10) DEFAULT NULL
  			)";
  	
  	$resultado = pg_query($conexao, $query); 
  	
  	if ($resultado)
  	{
  		$query ="INSERT INTO negociacao_mercadorias 
				VALUES 
				('ABC1234','TV LED 60 POLEGADAS LG','ELETRONICO',1000,500000.00,'venda')";

		$resultado = pg_query($conexao, $query); 
		
		if ($resultado) 
		{
			echo "Instalacao realizado com sucesso!";
		}	
  	}	
  	else 
  	{
  		echo "Erro durante a instalacao!";
  	}
}
