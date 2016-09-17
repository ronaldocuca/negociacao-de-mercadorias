<?php 
	require_once('header.php'); 
	require_once('inc/config.php'); 
	require_once('inc/functions.php'); 
	
	if ($_POST) 
	{
		$values = array();
		$values = $_POST;

		$resultado = adicionar($values);
		
		if ($resultado) 
		{
			header('Location: lista-negociacao.php');exit;
		}
		else
		{
			echo "<p class='alert alert-danger'>Error! {$resultado}</p>";
		}

	}

?>

<h2>Cadastro de Negociação</h2>
<hr>
<form class="form" method="post" action="cadastro-de-negociacao.php">
<div class="form-group">
	<label for="codigo">código da mercadodia</label>
	<input class="form-control" type="text" id="codigo" name="codigo">
</div>
<div class="form-group">
	<label for="nome_mercadoria">Nome da Mercadoria</label>
	<input class="form-control" type="text" id="nome_mercadoria" name="nome_mercadoria">
</div>
<div class="form-group">
	<label for="tipo_mercadoria">Tipo da Mercadoria</label>
	<input class="form-control" type="text" id="tipo_mercadoria" name="tipo_mercadoria">
</div>
<div class="form-group">
	<label for="quantidade">Quantidade</label>
	<input class="form-control" type="number" id="quantidade" name="quantidade">
</div>
<div class="form-group">
	<label for="preco">Preço</label>
	<input class="form-control" type="number" id="preco" name="preco">
</div>
<div class="form-group">
	<label>Tipo do Negócio</label>
	<select class="form-control" name="tipo_negocio">
		<option value="compra">Compra</option>
		<option value="venda">Venda</option>
	</select>
</div>
<button class="btn btn-success">Salvar</button>
</form>

<?php require_once('footer.php'); ?>