<?php
    include('header.html');
    session_start();
    if (isset($_SESSION, $_SESSION['logado']) && $_SESSION['logado']) {
        header('location:index.php');
    }
?>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/javascript.js"></script>
    </head>
<body>
    
    <div class="container">
        <div id="titulo">
           <h2>Login</h2>
        </div>

        <div id="login">
            <form method="POST" action="classes/Usuario.php">
                    <div class="formRow">
                        <span class="label">Email</span>
                        <input type="email"  name="email" id="email" required />
                    </div>
                    <div class="formRow">
                        <span class="label">Senha</span>
                        <input type="password"  name="senha" id="senha" required />
                        <div class="showPassword">
                            <input type="checkbox" id="showPassword" onclick="mostraSenha()" /> <label for="showPassword">Mostrar senha</label>
                        </div>
                    </div> 
                        <input type="hidden" name="login" /> 
                </div>
                <div class="formRow">
                    <button class="button btn-submit" type="submit" >Entrar </button>
                </div> 
        </div>
    </div>
</body>