<h4 class=""> Carrinho </h4>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Produto</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor</th>
            <th scope="col">Valor Total</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody id="lista_carrinho">
    </tbody>
    <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th><span id='qtdCarrinhoLista'></span></th>
                <th><span id='valorCarrinhoLista'></span></th>
                <th><span id='valorToralCarrinhoLista'></span></th>
                <th></th>
            </tr>
        </tfoot>

</table>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?=URL_SITE?>src/arquivos/carrinho.js"></script>
