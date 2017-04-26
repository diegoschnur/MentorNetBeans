<?php

class Usuario {

    private $nome;
    private $sobrenome;
    private $login;
    private $password;
    private $email;
    private $telefone;
    private $status;
    private $tipoUsuario;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}