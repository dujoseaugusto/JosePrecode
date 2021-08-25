
function lista_carrinho(){
    $('#lista_carrinho').html('');
    var qtdCarrinhoLista = 0, valorCarrinhoLista = 0, valorToralCarrinhoLista = 0;
    $.getJSON(`${url_site}api/lista_carrinho`, function( data ) {
        $.each( data.data, function( index, value) {
            qtdCarrinhoLista = qtdCarrinhoLista + parseInt(value.qtd);
            valorCarrinhoLista = valorCarrinhoLista + parseFloat(value.valor);
            valorToralCarrinhoLista = valorToralCarrinhoLista + parseFloat(value.valor_total);
            $('#lista_carrinho').append(`
                <tr>
                    <td><img class='m-1' src="${value.imagem}" style="width:30px" /></td>
                    <td>${value.nome}</td>
                    <td>${value.qtd}</td>
                    <td>R$ ${value.valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</td>
                    <td>R$ ${value.valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</td>
                    <td><button class='btn btn-danger btn-sm remove_produto_carrinho' title='Remove' cod='${value.id}'>
                            <i class='fas fa-trash-alt'></i>
                        </button> 
                    </td>
                </tr>`);
        });
        
        $("#qtdCarrinhoLista").html(`${qtdCarrinhoLista}`);
        $("#valorCarrinhoLista").html(`R$ ${valorCarrinhoLista.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}`);
        $("#valorToralCarrinhoLista").html(`R$ ${valorToralCarrinhoLista.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}`);
    });
}

lista_carrinho();

$(document).on('click','.remove_produto_carrinho', function(){
  $.ajax({
      url: `${url_site}api/remove_produto_carrinho/${$(this).attr('cod')}`,
      type: 'DELETE',
      dataType : 'json',
      error: function(error) {
          console.log("Erro", error);
      }
  }).done(function(data){
      console.log(data);
      lista_carrinho();
  });
});
