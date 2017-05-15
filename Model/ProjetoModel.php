<?php

class ProjetoModel {

    private $id_prj;
    private $nome_prj;
    private $descricao_prj;
    private $status_prj;
    private $id_usuario_prj;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}
