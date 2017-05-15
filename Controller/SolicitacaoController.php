<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/SolicitacaoModel.php';
include '../Dao/SolicitacaoDAO.php';

if ((!empty($_POST['nome_sol'])) &&
        (!empty($_POST['dataAbertura_sol'])) &&
        (!empty($_POST['dataNecessidade_sol'])) &&
        (!empty($_POST['tempoTeste_sol'])) &&
        (!empty($_POST['componentesTestar_sol'])) &&
        (!empty($_POST['metodologia_sol'])) &&
        (!empty($_POST['idProjeto_sol']))) {


        $erros = array();

        if (count($erros) == 0) {
            $solicitacao = new SolicitacaoModel();

            $solicitacao->nome_sol = $_POST['nome_sol'];
            $solicitacao->dataAbertura_sol = $_POST['dataAbertura_sol'];
            $solicitacao->dataNecessidade_sol = $_POST['dataNecessidade_sol'];
            $solicitacao->tempoTeste_sol = $_POST['tempoTeste_sol'];
            $solicitacao->unidadeMedida_sol = $_POST['unidadeMedida_sol'];
            $solicitacao->componentesTestar_sol = $_POST['componentesTestar_sol'];
            $solicitacao->metodologia_sol = $_POST['metodologia_sol'];
            $solicitacao->observacoes_sol = $_POST['observacoes_sol'];
            $solicitacao->visibilidade_sol = $_POST['visibilidade_sol'];
            $solicitacao->status_sol = 'N';
            $solicitacao->idProjeto_sol = $_POST['idProjeto_sol'];
            $solicitacao->idUsuario_sol = 1;

            $solicitacaoDAO = new SolicitacaoDAO();
            $solicitacaoDAO->insereSolicitacao($solicitacao);

            header("location:../lista-solicitacoes.php");
        } else {
            echo "Erro ao cadastrar a solicitação!";
        }
    } else {
    echo "Informe todos os campos da solicitação";
}

