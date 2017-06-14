<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/SolicitacaoModel.php';
include '../Dao/SolicitacaoDAO.php';

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastra':
            if ((!empty($_POST['nome_sol'])) &&
                    (!empty($_POST['dataNecessidade_sol']))) {

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
                $solicitacao->idProjeto_sol = $_POST['idProjeto_sol'];
                $solicitacao->idUsuario_sol = $_SESSION['id_us'];

                $solicitacaoDAO = new SolicitacaoDAO();
                $solicitacaoDAO->insereSolicitacao($solicitacao);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-projetos.php");
                } else {
                    $_SESSION['success'] = "$solicitacao->nome_sol, CADASTRADA com sucesso!";
                    header("location:../lista-solicitacoes.php");
                }
            } else {
                $_SESSION['error'] = "Solicitação NÃO CADASTRADA, preencha todos os campos!";
            }
            break;

        case 'altera':

            if ((!empty($_POST['nome_sol'])) &&
                    (!empty($_POST['componentesTestar_sol'])) &&
                    (!empty($_POST['metodologia_sol']))) {

                $solicitacao = new SolicitacaoModel();

                $solicitacao->id_sol = $_POST['id_sol'];
                $solicitacao->nome_sol = $_POST['nome_sol'];
                $solicitacao->dataNecessidade_sol = $_POST['dataNecessidade_sol'];
                $solicitacao->tempoTeste_sol = $_POST['tempoTeste_sol'];
                $solicitacao->unidadeMedida_sol = $_POST['unidadeMedida_sol'];
                $solicitacao->componentesTestar_sol = $_POST['componentesTestar_sol'];
                $solicitacao->metodologia_sol = $_POST['metodologia_sol'];
                $solicitacao->observacoes_sol = $_POST['observacoes_sol'];
                $solicitacao->visibilidade_sol = $_POST['visibilidade_sol'];
                $solicitacao->status_sol = $_POST['status_sol'];
                $solicitacao->idProjeto_sol = $_POST['idProjeto_sol'];

                $solicitacaoDAO = new SolicitacaoDAO();
                $solicitacaoDAO->atualizaSolicitacao($solicitacao);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-projetos.php");
                } else {
                    $_SESSION['success'] = "$solicitacao->nome_sol, ATUALIZADA com sucesso!";
                    header("location:../lista-solicitacao.php");
                }
            } else {
                $_SESSION['error'] = "$solicitacao->nome_sol, NÃO FOI ATUALIZADA, preencha todos os campos!";
            }
            break;

        case 'deleta':

            $solicitacao = new SolicitacaoModel();

            $solicitacao->id_sol = $_POST['id_sol'];
            $solicitacao->nome_sol = $_POST['nome_sol'];

            $solicitacaoDAO = new SolicitacaoDAO();
            $solicitacaoDAO->deletaSolicitacao($solicitacao);

            if (isset($_SESSION['error'])) {
                $_SESSION['error'];
                header("location:../lista-solicitacoes.php");
            } else {
                $_SESSION['success'] = "$solicitacao->nome_sol, DELETADA com sucesso!";
                header("location:../lista-solicitacoes.php");
            }

            break;
    }
}
    