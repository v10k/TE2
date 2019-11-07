<?php

require_once('Conexao.php');

class ProdutoDAO {
 
    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProdutoDAO();
        } 
        return self::$instance;
    }
 
    public function adicionar_produto(Produto_model $produto) {
        $nome          = $produto->getNome();
        $quantidade    = $produto->getQuantidade();
        $dataEntrada   = $produto->getDataEntrada();
        $dataValidade  = $produto->getDataValidade();
        try { 
            $sql = "INSERT INTO produtos (nome, quantidade, dataEntrada, dataValidade) VALUES ('$nome', '$quantidade', '$dataEntrada', '$dataValidade')";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->bindValue(1, $nome, PDO::PARAM_STR);
            $pdo->bindValue(2, $quantidade, PDO::PARAM_INT);
            $pdo->bindValue(3, $dataEntrada, PDO::PARAM_STR);
            $pdo->bindValue(4, $dataValidade, PDO::PARAM_STR);
            $pdo->execute();
            return true;
        } catch (Exception $e) {
            echo "Erro ao inserir no banco de dados ! Erro " . $e;
            return false;
        }
    }

    public function deleta_carta(CartaModel $carta) {
        $id = $carta->getId();
        try {
            $sql = "DELETE FROM cartas WHERE id = '$id'";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->bindValue(1, $carta->getId(), PDO::PARAM_INT);
            $pdo->execute();
            echo "Carta deletada com sucesso !";
        } catch (Exception $e) {
            echo "Erro ao deletar no banco de dados ! Erro " . $e;
        }
    }

    public function retorna_cartas_deck($id) {
        try {
            $sql = "SELECT * FROM cartas WHERE id_deck = '$id'";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->execute(); 
            return $pdo->fetchAll();
        } catch (Exception $e) {
            echo "Erro ao exibir cartas do banco de dados ! Erro " . $e;
        }
    }

    public function string_json(array $carta) { 
            return (
            "{\"id_deck\": " .$carta['id_deck']. ",".
            "\"name\": \""   .$carta['name']. "\",".
            "\"text\": \""   .$carta['text']. "\",".
            "\"shots\": "    .$carta['shots']. "}" 
            );
    }
}

?>