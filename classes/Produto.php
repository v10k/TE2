<?php
include('ProdutoDAO.php');
include('Produto_model.php');
header('Content-type: application/json');

// switch($_POST['funcao']) {
//     case 'adicionaProduto':
//         return alert('foi');
//     default:
//        return alert('não foi');
// }


$response_array['status'] = 'error';

if (isset($_POST['produtoForm'], $_POST['quantidadeForm'], $_POST['dataEntradaForm'], $_POST['dataValidadeForm'])) {
    
    $dataEntrada = $_POST['dataEntradaForm'];
    $dataEntrada = date("Y-m-d H:i:s",strtotime($dataEntrada));
    
    $dataValidade = $_POST['dataEntradaForm'];
    $dataValidade = date("Y-m-d H:i:s",strtotime($dataValidade));

    $produto = new Produto_model();
    $produto->setNome($_POST['produtoForm']);
    $produto->setQuantidade($_POST['quantidadeForm']);
    $produto->setDataEntrada($dataEntrada);
    $produto->setDataValidade($dataValidade);
    if (ProdutoDAO::getInstance()->adicionar_produto($produto)) {
        $response_array['status'] = 'success';  
    }
}

echo json_encode($response_array);
?>