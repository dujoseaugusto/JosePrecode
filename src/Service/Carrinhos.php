<?php

namespace Service;

use Exception;
use Models\Carrinho;
use PDO;

class Carrinhos extends Carrinho
{
  public function addProdutoCarrinho(PDO $conexao){
    $exec = $conexao->prepare("INSERT INTO carrinho_produtos (id_produto, qtd, valor) VALUES (:id_produto,:qtd,:valor)");
    $exec->bindValue(":id_produto",$this->id_produto,PDO::PARAM_INT);
    $exec->bindValue(":qtd",$this->qtd,PDO::PARAM_INT);
    $exec->bindValue(":valor",$this->valor,PDO::PARAM_STR);
    if(!$exec->execute())
      throw new Exception("Erro para inserir produto no carrinho", 1);
    $this->id = $conexao->lastInsertId();
  }

  public function removeProdutoCarrinho(PDO $conexao){
    $exec = $conexao->prepare("DELETE FROM carrinho_produtos WHERE carrinho_produtos.id_produto = :id");
    $exec->bindValue(":id",$this->id_produto,PDO::PARAM_INT);
    $exec->execute();
    if($exec->rowCount() == 0)
      throw new Exception("Erro para remover ou Produto do carrinho", 1);
    return true;
  }

  public static function carregaCarrinho(PDO $conexao){
    return $conexao->query("SELECT
                                  produtos.id,
                                  produtos.nome, 
                                  produtos.imagem,
                                  carrinho_produtos.valor,
                                  SUM(carrinho_produtos.valor_total) valor_total,
                                  SUM(carrinho_produtos.qtd) qtd
                                FROM produtos
                                  INNER JOIN carrinho_produtos ON carrinho_produtos.id_produto = produtos.id
                                GROUP BY produtos.id,
                                      produtos.nome, 
                                      carrinho_produtos.valor
                                ORDER BY produtos.id")->fetchAll(PDO::FETCH_ASSOC);
  }
  
}
