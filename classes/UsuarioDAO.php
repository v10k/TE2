<?php

require_once('Conexao.php');

class UsuarioDAO {
 
    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new UsuarioDAO();
        } 
        return self::$instance;
    }
 
    public function salvar_usuario(Usuario_model $usuario) {
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        if ($this->verifica_existencia_usuario($email)) {
           return $this->login($email, $senha);
        } else {
            try {
                $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')"; 
                $pdo = Conexao::getInstance()->prepare($sql);
                $pdo->bindValue(1, $email, PDO::PARAM_STR);
                $pdo->bindValue(2, $senha, PDO::PARAM_STR);
                $pdo->execute();
                return true;
            } catch (Exception $e) {
                echo "Erro ao inserir no banco de dados ! Erro " . $e;
                return false;
            }
        }
    }

    private function verifica_existencia_usuario($email) {
        try {
            $sql = "SELECT email FROM usuarios WHERE email = '$email'";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->execute();
            if($pdo->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao buscar dados no banco de dados ! Erro " . $e;
        }
    }

    private function login($email, $senha) {
        try {
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
            $pdo = Conexao::getInstance()->prepare($sql);
            $pdo->execute();
            $resultado = $pdo->fetch(PDO::FETCH_ASSOC);
            if(!$resultado) {
                return false;
            } else {
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['id']     = $resultado['id'];
                $_SESSION['email']  = $resultado['email'];
                return true;
            }
        } catch (Exception $e) {
            echo "Erro ao buscar dados no banco de dados ! Erro " . $e;
        }
    }

    public function logout() {
        if ($_SESSION) {
            session_destroy();
            return true;
        }
        return false;
    }
}


?>