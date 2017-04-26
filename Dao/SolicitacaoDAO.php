<?php

class SolicitacaoDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereSolicitacao($solic) {
        try {

            $status = $this->connection->prepare(""
                    . "INSERT INTO tbl_solicitacoes (nome_sol,dataAbertura_sol,
                        dataNecessidade_sol,tempoTeste_sol,unidadeMedida_sol,
                        componentesTestar_sol,metodologia_sol,observacoes_sol,
                        visibilidade_sol,status_sol,idProjeto_sol,idUsuario_sol)
                        VALUES (?,?,?,?,?,?,?,?,?,'N',?,?);");

            $status->bindValue(1, $solic->nome_sol);
            $status->bindValue(2, $solic->dataAbertura_sol);
            $status->bindValue(3, $solic->dataNecessidade_sol);
            $status->bindValue(4, $solic->tempoTeste_sol);
            $status->bindValue(5, $solic->unidadeMedida_sol);
            $status->bindValue(6, $solic->componentesTestar_sol);
            $status->bindValue(7, $solic->metodologia_sol);
            $status->bindValue(8, $solic->observacoes_sol);
            $status->bindValue(9, $solic->visibilidade_sol);
            $status->bindValue(10, $solic->status_sol);
            $status->bindValue(11, $solic->idProjeto_sol);
            $status->bindValue(12, $solic->idUsuario_sol);

            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir uma nova solicitação!" . $exc;
        }
    }
    
    public function listaSolicitacoes() {
        try {

            $status = $this->connection->prepare("select * from tbl_solicitacoes");
            $status->execute();
            $solicitacoes = $status->fetchAll(PDO::FETCH_CLASS, 'SolicitacaoDAO');

            $this->connection = null;

            return $solicitacoes;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar as solicitações!' . $exc;
        }
    }

}
