<?php

class SolicitacaoModel {

    private $id_sol;
    private $nome_sol;
    private $dataAbertura_sol;
    private $dataNecessidade_sol;
    private $tempoTeste_sol;
    private $unidadeMedida_sol;
    private $componentesTestar_sol;
    private $metodologia_sol;
    private $observacoes_sol;
    private $visibilidade_sol;
    private $status_sol;
    private $idProjeto_sol;
    private $idUsuario_sol;

    public function __construct() {
        
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

}
