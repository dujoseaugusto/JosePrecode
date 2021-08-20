
 <div class="m-2 row">
      <h4>Produtos</h4>
        <div class='col-5'>
          <img id="imagemProduto" src="<?=$produto->imagem?>" style="width:100px" />
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome" value="<?=$produto->nome?>">
          <input type="hidden" id="cod_produto" value="<?=$produto->id?>">
        </div>
        <div class="form-group row">
          <div class='col-5'>
            <label for="nome">Valor</label>
            <input type="text" class="form-control" id="valor" placeholder="00,00" value="<?=$produto->valor?>">
          </div>
          <div class='col-5 mt-4'>
            <label for="nome">imagem</label>
            <input type="hidden" id="imagem" value="<?=$produto->imagem?>">
            <input type="file" onchange="encodeImageFileAsURL(this)" /> 
          </div>
        </div>
        <div class="mt-2">
          <button id='salvar' class="btn btn-success btn-sm" title='Salvar'>Salvar</button>
          <button id='novo' class="btn btn-info btn-sm" onclick="novo()" title='Salvar'>Novo</button>
        </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <script src="<?=URL_SITE?>src/arquivos/cadastro.js"></script>
