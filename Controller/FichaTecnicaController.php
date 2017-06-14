<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/FichaTecnicaModel.php';
include '../Dao/FichaTecnicaDAO.php';

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastra':

            if ((!empty($_POST['nome_ft'])) &&
                    (!empty($_POST['dataInicial_ft'])) &&
                    (!empty($_POST['tempoTeste_ft'])) &&
                    (!empty($_POST['localTeste_ft'])) &&
                    (!empty($_POST['componentes_ft'])) &&
                    (!empty($_POST['metodologia_ft']))) {

                $fichaTecnica = new FichaTecnicaModel();

                $fichaTecnica->nome_ft = $_POST['nome_ft'];
                $fichaTecnica->dataInicial_ft = $_POST['dataInicial_ft'];
                $fichaTecnica->dataFinal_ft = $_POST['dataFinal_ft'];
                $fichaTecnica->tempoTeste_ft = $_POST['tempoTeste_ft'];
                $fichaTecnica->localTeste_ft = $_POST['localTeste_ft'];
                $fichaTecnica->cliente_ft = $_POST['cliente_ft'];
                $fichaTecnica->acompanhamento_ft = $_POST['acompanhamento_ft'];
                $fichaTecnica->componentes_ft = $_POST['componentes_ft'];
                $fichaTecnica->metodologia_ft = $_POST['metodologia_ft'];
                $fichaTecnica->comportamento_ft = $_POST['comportamento_ft'];
                $fichaTecnica->observacoes_ft = $_POST['observacoes_ft'];
                $fichaTecnica->visibilidade_ft = $_POST['visibilidade_ft'];
                $fichaTecnica->destaque_ft = $_POST['destaque_ft'];
                $fichaTecnica->id_solicitacao_ft = $_SESSION['id_solicitacao'];
                $fichaTecnica->id_usuario_ft = $_SESSION['id_us'];

                $fichaTecnicaDAO = new FichaTecnicaDAO();
                $fichaTecnicaDAO->insereFichaTecnica($fichaTecnica);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-solicitacao.php");
                } else {
                    $_SESSION['success'] = "Ficha Técnica CADASTRADA com sucesso!";
                    header("location:../lista-solicitacao.php");
                }
            } else {
                $_SESSION['error'] = "Ficha Técnica NÃO FOI CADASTRADA, preencha todos os campos!";
            }

            break;

        case 'altera':

            if ((!empty($_POST['nome_ft'])) &&
                    (!empty($_POST['componentes_ft'])) &&
                    (!empty($_POST['metodologia_ft'])) &&
                    (!empty($_POST['comportamento_ft']))) {

                $fichaTecnica = new FichaTecnicaModel();

                $fichaTecnica->id_ft = $_POST['id_ft'];
                $fichaTecnica->nome_ft = $_POST['nome_ft'];
                $fichaTecnica->status_ft = $_POST['status_ft'];
                $fichaTecnica->dataFinal_ft = $_POST['dataFinal_ft'];
                $fichaTecnica->tempoTeste_ft = $_POST['tempoTeste_ft'];
                $fichaTecnica->localTeste_ft = $_POST['localTeste_ft'];
                $fichaTecnica->cliente_ft = $_POST['cliente_ft'];
                $fichaTecnica->acompanhamento_ft = $_POST['acompanhamento_ft'];
                $fichaTecnica->componentes_ft = $_POST['componentes_ft'];
                $fichaTecnica->metodologia_ft = $_POST['metodologia_ft'];
                $fichaTecnica->comportamento_ft = $_POST['comportamento_ft'];
                $fichaTecnica->observacoes_ft = $_POST['observacoes_ft'];
                $fichaTecnica->visibilidade_ft = $_POST['visibilidade_ft'];
                $fichaTecnica->destaque_ft = $_POST['destaque_ft'];

                $fichaTecnicaDao = new FichaTecnicaDAO();
                $fichaTecnicaDao->atualizaFichaTecnica($fichaTecnica);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-fichaTecnica.php");
                } else {
                    $_SESSION['success'] = "$fichaTecnica->nome_ft, ATUALIZADA com sucesso!";
                    header("location:../lista-fichaTecnica.php");
                }
            } else {
                $_SESSION['error'] = "$fichaTecnica->nome_ft, NÃO FOI ATUALIZADA, preencha todos os campos!";
            }

            break;

        case 'deleta':

            try {
                $fichaTecnica = new FichaTecnicaModel();

                $fichaTecnica->id_ft = $_POST['id_ft'];
                $fichaTecnica->nome_ft = $_POST['nome_ft'];

                $$fichaTecnicaDao = new FichaTecnicaDAO();
                $$fichaTecnicaDao->deletaFichaTecnica($fichaTecnica);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-fichaTecnica.php");
                } else {
                    $_SESSION['success'] = "$solicitacao->nome_sol, DELETADA com sucesso!";
                    header("location:../lista-solicitacao.php");
                }
            } catch (PDOException $exc) {
                $erro = $exc->getCode();
                $_SESSION['error'] = "Código $erro! Falha ao deletar a ficha técnica $fichaTecnica->nome_ft";
                header("location:../lista-fichaTecnica.php");
            }

            break;
    }
}
?>

