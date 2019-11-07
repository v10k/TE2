<?php

include('Produto.php');

$nome = 'teste';
$quantidade = 2;
$dataEntrada = new DateTime('2000-01-01');
$dataEntrada = $dataEntrada->format('Y-m-d');
$dataValidade = new DateTime('2010-10-10');
$dataValidade = $dataValidade->format('Y-m-d');

$teste = new Produto();
$teste->adicionaProduto($nome, $quantidade, $dataEntrada, $dataValidade);

?>