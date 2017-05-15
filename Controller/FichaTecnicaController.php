<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/FichaTecnica.php';
include '../Dao/FichaTecnicaDAO.php';

//print_r($_POST);exit

if ((!empty($_POST['nome_ft'])) &&
        (!empty($_POST['dataInicial_ft'])) &&
        (!empty($_POST['tempoTeste_ft'])) &&
        (!empty($_POST['localTeste_ft'])) &&
        (!empty($_POST['componentes_ft'])) &&
        (!empty($_POST['metodologia_ft']))) {

    $erros = array();

    if (count($erros) == 0) {
        $fichaTecnica = new FichaTecnica();
       
        $fichaTecnica->nome_ft = $_POST['nome_ft'];
        $fichaTecnica->dataInicial_ft = $_POST['dataInicial_ft'];
        $fichaTecnica->dataFinal_ft = $_POST['dataFinal_ft'];
        $fichaTecnica->tempoTeste_ft = $_POST['tempoTeste_ft'];
        $fichaTecnica->localTeste_ft = $_POST['localTeste_ft'];
        $fichaTecnica->cliente_ft = $_POST['cliente_ft'];
        $fichaTecnica->acompanhamento_ft = $_POST['acompanhamento_ft'];
        $fichaTecnica->componentes_ft = $_POST['componentes_ft'];
        $fichaTecnica->metodologia_ft = $_POST['metodologia_ft'];
        $fichaTecnica->observacoes_ft = $_POST['observacoes_ft'];
        $fichaTecnica->visibilidade_ft = $_POST['visibilidade_ft'];
        $fichaTecnica->destaque_ft = $_POST['destaque_ft'];
        $fichaTecnica->status_ft = 'N';
        $fichaTecnica->id_solicitacao_ft = $_SESSION['solicitacao'] ;
        $fichaTecnica->id_usuario_ft = 1;

        $fichaTecnicaDAO = new FichaTecnicaDAO();
        $fichaTecnicaDAO->insereFichaTecnica($fichaTecnica);

        //$_SESSION['nome'] = $FichaTecnica->nome_prj;
        //header("location:../View/ProjetoViewResult.php");
        if (isset($_SESSION['solicitacao'])){
            header("location:../lista-solicitacao.php?id=".$_SESSION['solicitacao']);
        } else{
            header("location:../lista-solicitacoes.php");
        }

    } else {
        echo "Erro ao cadastrar a ficha técnica";
        // $err = serialize($erros);
        // $_SESSION['erros'] = $err;
        // header("location:../View/ProjetoViewError.php");
    }
} else {
    echo "Informe todos os campos!";
}
?>

