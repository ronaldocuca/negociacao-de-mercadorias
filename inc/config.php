<?php
/* -------------------------------------------------------------------------------------------------
//   CONEXAO COM BANCO DE DADOS
---------------------------------------------------------------------------------------------------*/
function conecta()
{
	$host = "ec2-54-235-195-226.compute-1.amazonaws.com";
	$usuario = "gvoeagrihtmjde";
	$senha = "lD3eR2BJHrs76lQz5OefL8LW1r";
	$banco = "dd023q6nm7ia09";
	$port = "5432";

	$conexao = pg_connect("host={$host},port={$port},dbname={$banco},user={$usuario},password={$senha}");
	return $conexao;
}