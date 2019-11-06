<?php
    include('header.html');
?>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/javascript.js"></script>
    </head>
<body>
    <div class="container">
        <div class="button">
            <button class="button btn-inserir" type="button" onClick="botaoInserir()" >Inserir</button>
            <button class="button btn-listar"  type="button" onClick="botaoListar()">Listar</button>
        </div>

        <div id="inserir">
            <form>
                <div class="formRow">
                    <span class="label">Produto</span>
                    <input type="text"  name="produto" />
                </div>
                <div class="formRow">
                    <span class="label">Quantidade</span>
                    <input type="number"  name="quantidade" />
                </div> 
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label extraSpace">Data entrada</span>
                        <input type="date"  name="dataEntrada"/>
                    </div>
                    <div class="formRow">
                        <span class="label extraSpace">Data Validade</span>
                        <input type="date" name="dataValidade"/>
                    </div>
                </div>
                <div class="formRow">
                    <button class="button btn-submit" type="button">Salvar</button>
                </div> 
        </div>

        <div id="listar">
            <table>
            <thead>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data entrada</th>
                <th>Data validade</th>
                <th>Editar</th>
                <th>Deletar</th>
            <thead>
            <tr>
                <td>a</td>
                <td>abac</td>
                <td>feafes</td>
                <td>feafas</td>
                <td><img class="tableIcon" src="imagens/edit_icon.png" alt="Editar" title="Editar" type="img/png" ></td>
                <td><img class="tableIcon" src="imagens/delete_icon.png" alt="Deletar" title="Deletar" type="img/png" ></td>
            </tr>
            </table>
        </div>

    </div>
</body>