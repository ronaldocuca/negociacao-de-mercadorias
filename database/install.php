<?php 
require_once('inc/config.php');
$conexao = conecta();

if ($conexao) {
	echo "conectou";
}
