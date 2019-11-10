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
 
    public function salvar_produto(Produto_model $produto) {
        $nome          = $produto->getNome();
        $quantidade    = $produto->getQuantidade();
        $dataEntrada   = $produto->getDataEntrada();
        $dataValidade  = $produto->getDataValidade();
        $id            = ($produto->getId() != null) ? $produto->getId() : null;
        try {
            $sql = ($id != null) 
            ? "UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', dataEntrada = '$dataEntrada', dataValidade = '$dataValidade' WHERE id = '$id'" 
            : "INSERT INTO produtos (nome, quantidade, dataEntrada, dataValidade) VALUES ('$nome', '$quantidade', '$dataEntrada', '$dataValidade')"; 
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

    public function deleta_produto(Produto_model $produto) {
        $id = $produto->getId();
        try {
            $sql = "DELETE FROM produtos WHERE id = '$id'";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->bindValue(1, $produto->getId(), PDO::PARAM_INT);
            $pdo->execute();
            return true;
        } catch (Exception $e) {
            echo "Erro ao deletar no banco de dados ! Erro " . $e;
            return false;
        }
    }

    public function retorna_lista_produtos() {
        try {
            $sql = "SELECT * FROM produtos ORDER BY nome ASC";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->execute(); 
            return (object) $pdo->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Erro ao exibir produtos do banco de dados ! Erro " . $e;
        }
    }
}

?>