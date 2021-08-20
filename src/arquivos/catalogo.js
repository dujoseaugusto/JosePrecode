
function lista(){
    var pesquisa = $('#textoPesquisa').val();
    var url = url_site+"api/lista_produtos";
    if(pesquisa.length >= 1)
      url = url_site+"api/lista_produtos/"+pesquisa;
    $('#lista').html('');
    $.getJSON(url, function( data ) {
        $.each( data.data, function( index, value) {
            $('#lista').append(`<div class='col-2 m-2 card'>
                                <img src="${value.imagem}" style="width:100%" />
                                    <label>Qtd: <small>(max 5 itens)</small></label>
                                    <select class='form qtd_produto'>
                                        <option value'1'>1</option>
                                        <option value'2'>2</option>
                                        <option value'3'>3</option>
                                        <option value'4'>4</option>
                                        <option value'5'>5</option>
                                    </select>
                                    <button class='btn btn-info btn-sm adiciona_carrinho' title='Remove' cod='${value.id}'>
                                        <i class='far fa-edit'></i> Adiconar
                                    </button>
                                    ${value.nome} <small>R$ ${value.valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</small>                                    </div>`);

        });
      });
}

lista();

$(document).on('click','.adiciona_carrinho', function(){
  var carrinho = new Object();  
  carrinho.id_produto = $(this).attr('cod');
  carrinho.qtd = $(this).parent().find('.qtd_produto').val();
  $.ajax({
      url: `${url_site}api/adiciona_carrinho`,
      method : 'POST',
      contentType : 'application/json',
      dataType : 'json',
      data : JSON.stringify(carrinho),
      error: function() {
          $.alert('Erro Para Adicionar Produto');
      }
  }).done(function(data) {
      $.alert("Adicionado Com Sucesso!!");
      $(this).parent().find('.qtd_produto').attr("selected", false);
  });
});
