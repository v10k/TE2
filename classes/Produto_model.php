<?php

require_once('Conexao.php');

class Produto_model {

    private $Id;
    private $Nome;
    private $Quantidade;
    private $DataEntrada;
    private $DataValidade;

    public function getId() {
        return $this->Id;
    }

    public function setId($id) {
        $this->Id = $id;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function setNome($nome) {
        $this->Nome = $nome;
    }

    public function getQuantidade() {
        return $this->Quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->Quantidade = $quantidade;
    }

    public function getDataEntrada() {
        return $this->DataEntrada;
    }

    public function setDataEntrada($dataEntrada) {
        $this->DataEntrada = $dataEntrada;
    }

    public function getDataValidade() {
        return $this->DataValidade;
    }

    public function setDataValidade($dataValidade) {
        $this->DataValidade = $dataValidade;
    }
}
?>