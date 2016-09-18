$().ready(function() 
{
	// Transforma os caracteres do campo codigo em maíusculo
	$("#codigo").focusout(function(){
		this.value = this.value.toLocaleUpperCase();
	});

	// Validação do formulário de cadastro e atualização.
	$("#form").validate({
		rules: {
			codigo: {
				required: true,
				minlength: 2,
				maxlength:10
			},
			nome_mercadoria: {
				required: true,
				minlength: 2,
				maxlength: 255
			},
			tipo_mercadoria: {
				required: true,
				minlength: 2
			},
			quantidade: {
				required: true,
				minlength: 1
			},
			preco: {
				required: true,
				minlength: 1
			},
			tipo_negocio: {
				required: true,
			},
		},
		messages: {
			codigo: {
				required:"Código da Mercadoria é obrigatório!",
				minlength:"Código da Mercadoria deve ter no mínimo 2 caracteres. Ex.(A1)",
				maxlength:"Código da Mercadoria deve ter no máximo 10 caracteres. Ex.(ABCDE12345)"
			},
			nome_mercadoria: {
				required: "Nome da Mercadoria é obrigatório!",
				minlength: "Nome da Mercadoria deve ter no mínimo 2 caracteres. Ex.(TV)"
			},
			tipo_mercadoria: {
				required: "Tipo de Mercadoria é obrigatório!",
				minlength: "Tipo da Mercadoria deve ter no mínimo 2 caracteres.",
				maxlength: "Tipo da Mercadoria deve ter no máximo 50 caracteres."
			},
			quantidade: {
				required: "Quantidade é obrigatório!",
				minlength: "Quantidade deve ter no mínimo 1 digíto.",
			},
			preco: {
				required: "Preço é obrigatório!",
				minlength: "Preço deve ter no mínimo 1 digíto.",
			},
			tipo_negocio: {
				required: "Tipo de Negócio é obrigatório!",
			},
		}
	});
});
