<?php 
	require_once('header.php'); 
	require_once('inc/config.php'); 
	require_once('inc/functions.php'); 
	
	// verifica a requisição da página, se um $_POST
	if ($_POST) 
	{	
		$values = array();
		$values = $_POST;

		// chama o adicionaNegociacao, passando um array de campos do formulário.
		$resultado = adicionaNegociacao($values);

		/* Testa o $resultado: se for true, seta a $msg e redireciona para a lista de negociações.
		** Se for false, exibe mensagem de codigo já cadastrado.
		*/
		if ($resultado) 
		{
			header('Location: lista-negociacao.php?msg=Negociação cadastadoss com sucesso!');exit;
		}
		else
		{
			echo "<p class='alert alert-info'>Código: <strong>{$values['codigo']}</strong>, já cadastado!</p>";
		}

	}

?>

<h2>Nova Negociação</h2>
<hr>
<form class="form" id="form" method="post" action="cadastro-de-negociacao.php">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label for="codigo">código da mercadoria</label>
				<input class="form-control" type="text" id="codigo" name="codigo">
			</div>
		</div>
		<div class="col-md-10">
			<div class="form-group">
				<label for="nome_mercadoria">nome da mercadoria</label>
				<input class="form-control" type="text" id="nome_mercadoria" name="nome_mercadoria">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="tipo_mercadoria">tipo da mercadoria</label>
				<input class="form-control" type="text" id="tipo_mercadoria" name="tipo_mercadoria">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="quantidade">quantidade</label>
				<input class="form-control" type="number" id="quantidade" name="quantidade">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="preco">preço</label>
				<input class="form-control" type="number" id="preco" name="preco">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>tipo do negócio</label>
				<select class="form-control" id="tipo_negocio" name="tipo_negocio">
					<option value=""></option>
					<option value="compra">Compra</option>
					<option value="venda">Venda</option>
				</select>
			</div>
		</div>
	</div>
	<button class="btn btn-success btn-block">Adicionar</button>
</form>

<?php require_once('footer.php'); ?>