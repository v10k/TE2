<?php
    include('header.html');
?>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/javascript.js"></script>
    </head>
<body>
    <div class="container">
    <div id="mensagem">
            <span class="mensagem"></span>
    </div>
        <div class="button">
            <button class="button btn-inserir" type="button" onClick="botaoInserir()" >Inserir</button>
            <button class="button btn-listar"  type="button" onClick="botaoListar()">Listar</button>
        </div>

        <div id="inserir">
            <form method="POST" action="classes/Produto.php" id="form">
                <div class="formRow">
                    <span class="label">Produto</span>
                    <input type="text"  name="produtoForm" id="produtoForm" />
                </div>
                <div class="formRow">
                    <span class="label">Quantidade</span>
                    <input type="number"  name="quantidadeForm" id="quantidadeForm" />
                </div> 
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label extraSpace">Data entrada</span>
                        <input type="date"  name="dataEntradaForm" id="dataEntradaForm"/>
                    </div>
                    <div class="formRow">
                        <span class="label extraSpace">Data Validade</span>
                        <input type="date" name="dataValidadeForm" id="dataValidadeForm" />
                    </div>
                </div>
                <div class="formRow">
                    <button class="button btn-submit" type="submit">Salvar</button>
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