<?php

class FichaTecnica {

    private $id;
    private $descricao;
    private $dataInicial;
    private $dataFinal;
    private $tempoTeste;
    private $localTeste;
    private $acompanhamento;
    private $componentesTestados;
    private $metodologiaEmpregada;
    private $observacoes;
    private $visibilidade;
    private $destaque;
    private $status;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}
