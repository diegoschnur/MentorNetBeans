<?php

class ConnectionDB extends PDO {

    private static $instance = null;

    public function ConnectionDB($dsn, $usuario, $senha) {
        //Contrutor da classe pai (parent) -> PDO
        parent::__construct($dsn, $usuario, $senha);

        try {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                //Cria uma conexão e retorna a instancia dela.
                self::$instance = new ConnectionDB("mysql:dbname=db_mentor;host=localhost", "root", "495715");
                
            } catch (Exception $e) {
                echo "Ocorreram erros ao tentar conectar com o BD!";
                echo "$e";
                exit();
            }
        }
        return self::$instance;
    }

}
