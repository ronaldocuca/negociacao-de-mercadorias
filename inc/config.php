<?php
/* -------------------------------------------------------------------------------------------------
//   CONEXAO COM BANCO DE DADOS
---------------------------------------------------------------------------------------------------*/
function conecta()
{
	$host = "localhost";
	$usuario = "root";
	$senha = "root";
	$banco = "bd_teste";

	$conexao = mysqli_connect($host,$usuario,$senha,$banco);
	return $conexao;
}