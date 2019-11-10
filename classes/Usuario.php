<?php
    include('UsuarioDAO.php');
    include('Usuario_model.php');
    echo '<script language="javascript"> </script>';

    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        return true;
    }

    if (isset($_POST['email'], $_POST['senha']) && $_POST['email'] != '' &&  $_POST['senha'] != '') {
        $usuario = new Usuario_model();
        $usuario->setEmail($_POST['email']);
        
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $senha = crypt($_POST['senha'], '$2a$' . $custo . '$' . $salt . '$');
        $usuario->setSenha($senha);

         if (UsuarioDAO::getInstance()->salvar_usuario($usuario)) {
            header("Location: ../index.php"); 
            exit();
        } else {
            header("Location: ../index.php"); 
            exit();
        }
}
?>



