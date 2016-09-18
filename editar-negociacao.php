<?php 
require_once('header.php'); 
require_once('inc/config.php'); 
require_once('inc/functions.php'); 

# seta os campos como default, caso nenhum codigo seja passado $_GET['codigo']
$negociacao=array
			(
				'codigo'=>"",
				'nome'=>"",
				'tipo'=>"",
				'quantidade'=>"",
				'preco'=> "",
				'tipo_negocio'=>""
			);

# verifica se é um $_GET
if ($_GET) 
{
	$codigo = $_GET['codigo'];
	$negociacao = buscaNegociacao($codigo);
}

# verifica se é um $_POST
if ($_POST) 
{
	$values = array();
	$values = $_POST;
	$resultado = alteraNegociacao($values);
		
	if ($resultado) 
	{
		header('Location: lista-negociacao.php?msg=Negociação alterada com sucesso!');
		die();
	}
	else
	{
		echo "<p class='alert alert-danger'>Error!</p>";
	}
}

?>

<h2>Editar Negociação</h2>
<hr>
<form class="form" id="form" method="post" action="editar-negociacao.php">
	<input type="hidden" name="codigo_negociacao" value="<?=$negociacao['codigo']; ?>">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label for="codigo">código da mercadoria</label>
				<input class="form-control" type="text" id="codigo" name="codigo" value="<?=$negociacao['codigo']; ?>" disabled>
			</div>
		</div>
		<div class="col-md-10">
			<div class="form-group">
				<label for="nome_mercadoria">nome da mercadoria</label>
				<input class="form-control" type="text" id="nome_mercadoria" name="nome_mercadoria" value="<?=$negociacao['nome']; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="tipo_mercadoria">tipo da mercadoria</label>
				<input class="form-control" type="text" id="tipo_mercadoria" name="tipo_mercadoria" value="<?=$negociacao['tipo']; ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="quantidade">quantidade</label>
				<input class="form-control" type="number" id="quantidade" name="quantidade" value="<?=$negociacao['quantidade']; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="preco">preço</label>
				<input class="form-control" type="number" id="preco" name="preco" value="<?=$negociacao['preco']; ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>tipo do negócio</label>
				<select class="form-control" name="tipo_negocio">
					<?php if ($negociacao['tipo_negocio']=="compra"): ?>
						<option selected value="compra">Compra</option>
						<option value="venda">Venda</option>
					<?php else: ?>
						<option value="compra">Compra</option>
						<option  selected value="venda">Venda</option>
					<?php endif; ?>
				</select>
			</div>
		</div>
	</div>

<button class="btn btn-block btn-primary">Salvar</button>
</form>

<?php require_once('footer.php'); ?>
