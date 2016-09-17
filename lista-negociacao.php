<?php 
require_once('header.php'); 
require_once('inc/config.php'); 
require_once('inc/functions.php'); 

$negociacoes = listar();

if(array_key_exists('excluir', $_GET)) 
{
	$excluiNegociacao = excluir($_GET['codigo']);
	if ($excluiNegociacao) {
		header('Location: lista-negociacao.php');exit;
	}
}

if (array_key_exists('novo', $_GET)) 
{
	header('Location: cadastro-de-negociacao.php');exit;
}

if(array_key_exists('editar', $_GET) && array_key_exists('codigo', $_GET))
{
	header("Location: editar-negociacao.php?codigo={$_GET['codigo']}");exit;
}
?>
<form action="lista-negociacao.php" method="get">
	<div class="well">
		<button type="submit" class="btn btn-success" name="novo">novo</button>
		<button type="submit" class="btn btn-danger" name="excluir">excluir</button>
		<button type="submit" class="btn btn-primary" name="editar">editar</button>
	</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>código</th>
			<th>nome</th>
			<th>tipo</th>
			<th>quantidade</th>
			<th>preço</th>
		</tr>
	</thead>
	<tbody>
	
	<?php foreach ($negociacoes as $negociacao):?>
		<tr>
			<td><input type="radio" name="codigo" value="<?=$negociacao['codigo']; ?>"></td>
			<td><?=$negociacao['codigo']; ?></td>
			<td><?=$negociacao['nome']; ?></td>
			<td><?=$negociacao['tipo']; ?></td>
			<td><?=$negociacao['quantidade']; ?></td>
			<td><?=$negociacao['preco']; ?></td>

			<?php if ($negociacao['tipo_negocio']=='venda'): ?>
				<td class="text-success">
					<span class="glyphicon glyphicon-usd"></span>
					<?=strtoupper($negociacao['tipo_negocio']); ?>
				</td>
			<?php else: ?>
				<td class="text-danger">
					<span class="glyphicon glyphicon-shopping-cart"></span>
					<?=strtoupper($negociacao['tipo_negocio']); ?>
				</td>
			<?php endif ?>
			
		</tr>
	<?php endforeach; ?>
	
	</tbody>
</table>
</form>

<?php require_once('footer.php'); ?>