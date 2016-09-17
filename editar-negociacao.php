<?php 
require_once('header.php'); 
require_once('inc/config.php'); 
require_once('inc/functions.php'); 

$codigo = $_GET['codigo'];
$negociacao = buscaNegociacao($codigo);
?>

<h2>Editar Negociação</h2>
<hr>
<form class="form" method="post" action="cadastro-de-negociacao.php">
<div class="form-group">
	<label for="codigo">código da mercadodia</label>
	<input class="form-control" type="text" id="codigo" name="codigo" value="<?=$negociacao['codigo']; ?>">
</div>
<div class="form-group">
	<label for="nome_mercadoria">Nome da Mercadoria</label>
	<input class="form-control" type="text" id="nome_mercadoria" name="nome_mercadoria" value="<?=$negociacao['nome']; ?>">
</div>
<div class="form-group">
	<label for="tipo_mercadoria">Tipo da Mercadoria</label>
	<input class="form-control" type="text" id="tipo_mercadoria" name="tipo_mercadoria" value="<?=$negociacao['tipo']; ?>">
</div>
<div class="form-group">
	<label for="quantidade">Quantidade</label>
	<input class="form-control" type="number" id="quantidade" name="quantidade" value="<?=$negociacao['quantidade']; ?>">
</div>
<div class="form-group">
	<label for="preco">Preço</label>
	<input class="form-control" type="number" id="preco" name="preco" value="<?=$negociacao['preco']; ?>">
</div>
<div class="form-group">
	<label>Tipo do Negócio</label>
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
<button class="btn btn-success">Salvar</button>
</form>

<?php require_once('footer.php'); ?>
