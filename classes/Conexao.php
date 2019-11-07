<?php 

class Conexao {

    const SERVIDOR  = 'mysql:host=localhost;';
    const USUARIO   = 'root';
    const SENHA     = '9264a630';
    const BANCO     = 'dbname=TE2';
    
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(self::SERVIDOR. self::BANCO, self::USUARIO , self::SENHA, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, 
            PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
 
}
 
?>
