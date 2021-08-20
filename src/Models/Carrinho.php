<?php

namespace Models;

use PDO;

class Carrinho
{
  protected $id;
  protected $id_produto;
  protected $qtd;
  protected $valor;
  protected $valor_total;

  public function __set($atrib, $value)
  {
    $this->$atrib = $value;
  }

  public function __get($atrib)
  {
      return $this->$atrib;
  }

  public function getProduto():array
  {
    if($this->id_produto)
      return Conect::abreConexao()->query("SELECT * FROM produtos where produtos.id = {$this->id_produto}")->fetch(PDO::FETCH_ASSOC);
  }

}
