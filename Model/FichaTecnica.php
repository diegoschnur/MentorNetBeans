<?php

class FichaTecnica {

    private $id_ft;
    private $nome_ft;
    private $dataInicial_ft;
    private $dataFinal_ft;
    private $tempoTeste_ft;
    private $localTeste_ft;
    private $cliente_ft;
    private $acompanhamento_ft;
    private $componentes_ft;
    private $metodologia_ft;
    private $observacoes_ft;
    private $visibilidade_ft;
    private $destaque_ft;
    private $status_ft;
    private $id_solicitacao_ft;
    private $id_suario_ft;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}
