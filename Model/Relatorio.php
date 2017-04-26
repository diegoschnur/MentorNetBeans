<?php

class Relatorio {

    private $id;
    private $solicitacao;
    private $fichatecnica;
    private $projeto;
    private $observacaoRelator;
    private $statusRelator;
    private $observacaoDesenvolvedor;
    private $statusDesenvolvedor;
    private $assinaturas;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}

?>