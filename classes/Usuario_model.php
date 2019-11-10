<?php

require_once('Conexao.php');

class Usuario_model {

    private $Id;
    private $Email;
    private $Senha;

    public function getId() {
        return $this->Id;
    }

    public function setId($id) {
        $this->Id = $id;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($email) {
        
        $this->Email = $email;
    }

    public function getSenha() {
        return $this->Senha;
    }

    public function setSenha($senha) {
        $this->Senha = $senha;
    }
}
?>