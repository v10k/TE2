<?php
    include('header.html');
    session_start();
    if (isset($_SESSION, $_SESSION['logado']) && !$_SESSION['logado']) {
        header('location:login.php');
    }
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/javascript.js"></script>
    </head>
<body>
<div class="sidenav">
        <a href="index.php">Voltar</a>
        <div ><a  class="bottomMenu" href="#">Sair</a></div>
</div>

    <div class="container">
    <div id="mensagem">
            <span class="mensagem"></span>
    </div>
        <div id="titulo">
           <h2>Cadastro</h2>
        </div>

        <div id="inserir">
            <form method="POST" action="classes/Produto.php" id="formEditar">
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label">Produto</span>
                        <input type="text"  name="produtoForm" id="produtoForm"  value="<?php echo (isset($_POST['nome'])) ? $_POST['nome'] : null ?>" required/>
                    </div>
                    <div class="formRow">
                        <span class="label">Quantidade</span>
                        <input type="number"  name="quantidadeForm" id="quantidadeForm"  value="<?php echo (isset($_POST['quantidade'])) ? $_POST['quantidade'] : null ?>" required/>
                    </div> 
                </div>
                <div class="sameRow">
                    <div class="formRow">
                        <span class="label extraSpace">Data entrada</span>
                        <input type="date"  name="dataEntradaForm" id="dataEntradaForm" value="<?php echo (isset($_POST['dataEntrada'])) ? $_POST['dataEntrada'] : null ?>" required/>
                    </div>
                    <div class="formRow">
                        <span class="label extraSpace">Data Validade</span>
                        <input type="date" name="dataValidadeForm" id="dataValidadeForm" value="<?php echo (isset($_POST['dataValidade'])) ? $_POST['dataValidade'] : null ?>" required/>
                        <input type="hidden" name="salvaProduto" /> 
                        <input type="hidden" name="codigo" value="<?php echo (isset($_POST['codigo'])) ? $_POST['codigo'] : null ?>"/>
                    </div>
                </div>
                <div class="formRow">
                    <button class="button btn-submit" type="submit" >Salvar</button>
                </div> 
        </div>
</body>


