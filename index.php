<?php
    include('header.html');
    session_start();
    if (!isset($_SESSION, $_SESSION['logado']) && !$_SESSION['logado']) {
        header('location:login.php');
    }
?>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/javascript.js"></script>
    </head>
<body>
    
<div class="sidenav">
        <a onClick="botaoInserir()">Inserir</a>
        <a onClick="botaoListar()">Listar</a>
        <div><a  class="bottomMenu" onClick="logout()">Sair</a></div>
</div>

    <div class="container">
    <div id="mensagem">
            <span class="mensagem"></span>
    </div>
        <div id="titulo">
           <h2>Cadastro</h2>
        </div>

        <div id="inserir">
            <form method="POST" action="classes/Produto.php" id="form">
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label">Produto</span>
                        <input type="text"  name="produtoForm" id="produtoForm"  required/>
                    </div>
                    <div class="formRow">
                        <span class="label">Quantidade</span>
                        <input type="number"  name="quantidadeForm" id="quantidadeForm" required />
                    </div> 
                </div>
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label extraSpace">Data entrada</span>
                        <input type="date"  name="dataEntradaForm" id="dataEntradaForm" required />
                    </div>
                    <div class="formRow">
                        <span class="label extraSpace">Data Validade</span>
                        <input type="date" name="dataValidadeForm" id="dataValidadeForm" required />
                        <input type="hidden" name="codigo" /> 
                        <input type="hidden" name="salvaProduto" /> 
                    </div>
                </div>
                <div class="formRow">
                    <button class="button btn-submit" type="submit" >Salvar</button>
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
            <tbody id="table-body"> 
                <?php include('table.php'); ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
