<?php
include('ProdutoDAO.php');
include('Produto_model.php');

$produto = new Produto();

if(isset($_POST['salvaProduto']))
{
   header('Content-type: application/json');
   echo $produto->salvar_produto();
}

if (isset($_POST['deletaProduto'])) {
    echo $produto->deleta_produto();
}

class Produto {
    
    public function salvar_produto() {
    
    $response_array['status'] = 'error';
    if (isset($_POST['produtoForm'], $_POST['quantidadeForm'], $_POST['dataEntradaForm'], $_POST['dataValidadeForm']) 
    && $_POST['produtoForm'] != '' &&  $_POST['quantidadeForm'] != '' && $_POST['dataEntradaForm'] != null && $_POST['dataValidadeForm'] != null ) {
        $dataEntrada = $_POST['dataEntradaForm'];
        $dataEntrada = date("Y-m-d H:i:s",strtotime($dataEntrada));
        
        $dataValidade = $_POST['dataValidadeForm'];
        $dataValidade = date("Y-m-d H:i:s",strtotime($dataValidade));
    
        $produto = new Produto_model();
        $produto->setNome($_POST['produtoForm']);
        $produto->setQuantidade($_POST['quantidadeForm']);
        $produto->setDataEntrada($dataEntrada);
        $produto->setDataValidade($dataValidade);
        (isset($_POST['codigo']) && $_POST['codigo'] != "") ? $produto->setId($_POST['codigo']) : '';
         if (ProdutoDAO::getInstance()->salvar_produto($produto)) {
            $response_array['status'] = 'success';
        }
    }
    return json_encode ($response_array);
    }

    public function listar_produto() {
        $lista = ProdutoDAO::getInstance()->retorna_lista_produtos();
        return $lista;
    }

    public function deleta_produto() { 
        if ($_POST['codigo']) {
            $produto = new Produto_model();
            $produto->setId($_POST['codigo']);
            if(ProdutoDAO::getInstance()->deleta_produto($produto)) {
                return 'foi';
            } else {
                return 'não foi';
            }

        }
    }
}

?>



