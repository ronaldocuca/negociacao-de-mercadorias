<?php 
/*--------------------------------------------------------------------
** Lista as negociações
----------------------------------------------------------------------*/
require_once('header.php'); 
require_once('inc/config.php'); 
require_once('inc/functions.php'); 

# chama a função listaNegociacões
$negociacoes = listaNegociacoes();

# verifica se existe no array
if(array_key_exists('excluir', $_POST)) 
{
	$excluir = excluiNegociao($_POST['codigo']);
	if ($excluir) {
		header('Location: lista-negociacao.php?msg=Negociação excluído com sucesso!');exit;
	}
}

# verifica se existe no array
if(array_key_exists('editar', $_POST) && array_key_exists('codigo', $_POST))
{
	header("Location: editar-negociacao.php?codigo={$_POST['codigo']}");exit;
}

?>
<!-- Exibe mensagem de sucesso -->
<?php if(array_key_exists('msg', $_GET)): ?>
	<p class="alert alert-success"><strong><?=$_GET['msg']; ?></strong></p>
<?php endif; ?>

	<h2>Lista de Negociações</h2>
	<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th>código</th>
			<th>mercadoria</th>
			<th>tipo/mercadoria</th>
			<th>quantidade</th>
			<th>preço</th>
			<th>tipo/negócio</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
	<?php foreach ($negociacoes as $negociacao):?>
		<tr>
			<td><?=$negociacao['codigo']; ?></td>
			<td><?=$negociacao['nome']; ?></td>
			<td><?=$negociacao['tipo']; ?></td>
			<td><?=$negociacao['quantidade']; ?></td>
			<td>R$ <?=number_format($negociacao['preco'],2,',','.'); ?></td>

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
			<td>
				<form action="lista-negociacao.php" method="post">
					<input type="hidden" name="codigo" value="<?=$negociacao['codigo']; ?>">
					<button type="submit" class="btn btn-primary" name="editar">editar</button>
					<button type="submit" class="btn btn-danger" name="excluir">excluir</button>
				</form>
			</td>
			
		</tr>
	<?php endforeach; ?>
	
	</tbody>
</table>
<?php require_once('footer.php'); ?>