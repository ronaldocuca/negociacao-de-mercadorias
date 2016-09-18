<?php 

/* -------------------------------------------------------------------------------------------------
//   FUNÇÕES
---------------------------------------------------------------------------------------------------*/
# cadastra uma nova negociação
function adicionaNegociacao($values)
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

	# busca o código no banco
	$verificaCodigo = buscaNegociacao($codigo);

	# se a busca encontrar o codigo, retorna false, se não insere o novo código e retorna true. 
	if ($verificaCodigo) 
	{
		return false;
	} 
	else 
	{
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
}

# busca uma negociação pelo código
function buscaNegociacao($codigo)
{
	$conexao = conecta();

	$query="SELECT * FROM negociacao_mercadorias 
			WHERE codigo='{$codigo}'";
	$resultado = mysqli_query($conexao,$query);
	$negociacao = mysqli_fetch_assoc($resultado);
	
	return $negociacao;
}

# altera dados da negociação
function alteraNegociacao($values)
{
	$conexao = conecta();
	$value = array();
	$value = $values;

	$codigo 		= $value['codigo_negociacao'];
	$nome 			= $value['nome_mercadoria'];
	$tipo 			= $value['tipo_mercadoria'];
	$quantidade 	= $value['quantidade'];
	$preco 			= $value['preco'];
	$tipo_negocio 	= $value['tipo_negocio']; 	

	$query="UPDATE negociacao_mercadorias SET
				nome ='{$nome}',
				tipo ='{$tipo}',
				quantidade = {$quantidade},
				preco = {$preco},
				tipo_negocio = '{$tipo_negocio}'
			WHERE codigo ='{$codigo}'";

	$resultado = mysqli_query($conexao,$query);
	return $resultado;
}

# exclui uma negociação
function excluiNegociao($codigo)
{
	$conexao = conecta();
	$query = "DELETE FROM negociacao_mercadorias WHERE codigo='{$codigo}'";
	$resultado = mysqli_query($conexao,$query);
	return $resultado;
}

# lista todas as negociações
function listaNegociacoes()
{
	$conexao = conecta();
	$negociacoes = array();

	$query = "SELECT * FROM negociacao_mercadorias";
	$resultado = pg_query($conexao,$query);

	while ($negociacao = pg_fetch_assoc($resultado)) 
	{
		array_push($negociacoes, $negociacao);
	}
	
	return $negociacoes;
}