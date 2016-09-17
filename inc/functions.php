<?php 

/* -------------------------------------------------------------------------------------------------
//   FUNÇÕES
---------------------------------------------------------------------------------------------------*/
function adicionar($values)
{
	$conexao = conecta();
	$value = array();
	$value = $values;

	$codigo 		= $value['codigo'];
	$nome 			= $value['nome_mercadoria'];
	$tipo 			= $value['tipo_mercadoria'];
	$quantidade 	= $value['quantidade'];
	$preco 			= $value['preco'];
	$tipo_negocio 	= $value['tipo_negocio']; 
	
	$query = "INSERT INTO negociacao_mercadorias
			(
				codigo,
				nome,
				tipo,
				quantidade,
				preco,
				tipo_negocio
			)
			VALUES
			(
				'{$codigo}',
				'{$nome}',
				'{$tipo}',
				 {$quantidade},
				 {$preco},
				'{$tipo_negocio}'
			)";
	$resultado = mysqli_query($conexao,$query);
	return $resultado;
}

function buscaNegociacao($codigo)
{
	$conexao = conecta();

	$query = "select * from negociacao_mercadorias where codigo='{$codigo}'";
	$resultado = mysqli_query($conexao,$query);
	$negociacao = mysqli_fetch_assoc($resultado);
	
	return $negociacao;
}

function alterar()
{

}


function excluir($codigo)
{
	$conexao = conecta();
	$query = "DELETE FROM negociacao_mercadorias where codigo='{$codigo}'";
	$resultado = mysqli_query($conexao,$query);
	return $resultado;
}

function listar()
{
	$conexao = conecta();
	$negociacoes = array();

	$query = "select * from negociacao_mercadorias";
	$resultado = mysqli_query($conexao,$query);

	while ($negociacao = mysqli_fetch_assoc($resultado)) 
	{
		array_push($negociacoes, $negociacao);
	}
	
	return $negociacoes;
}