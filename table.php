<?php
    include('classes/Produto.php');
    $produto = new Produto();
    $lista = $produto->listar_produto();
    foreach ($lista as &$elemento) {
        echo  
            "<tr>
                <td>".$elemento['nome']."</td>
                <td>".$elemento['quantidade']."</td>
                <td>".$elemento['dataEntrada']."</td>
                <td>".$elemento['dataValidade']."</td>
                <td>
                    <form method='POST' action='formulario.php'>
                    <input type='hidden' name='codigo' value='".$elemento['id']."' />
                    <input type='hidden' name='nome' value='".$elemento['nome']."' />
                    <input type='hidden' name='quantidade' value='".$elemento['quantidade']."' />
                    <input type='hidden' name='dataEntrada' value='".$elemento['dataEntrada']."' />
                    <input type='hidden' name='dataValidade' value='".$elemento['dataValidade']."' />
                    <button class='link' type='submit'> <img class='tableIcon' src='imagens/edit_icon.png' alt='Editar' title='Editar' type='img/png' > </button>
                    </form>
                </td>
                <td><a onClick='deletaRegistro(".$elemento['id'].")'> <img class='tableIcon' src='imagens/delete_icon.png' alt='Deletar' title='Deletar' type='img/png' > </a> </td>
                </tr>";
    }
?>
<tr>
    
</tr>