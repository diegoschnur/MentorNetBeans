<?php
include '../Persistence/ConnectionDB.php';
include '../Model/FichaTecnica.php';
include '../Dao/FichaTecnicaDAO.php';

if ((!empty($_POST['nome_ft'])) &&
        (!empty($_POST['dataInicial_ft'])) &&
        (!empty($_POST['dataFinal_ft'])) &&
        (!empty($_POST['tempoTeste_ft'])) &&
        (!empty($_POST['localTeste_ft'])) &&
        (!empty($_POST['componentes_ft'])) &&
        (!empty($_POST['metodologia_ft']))) {

    $erros = array();

    if (count($erros) == 0) {
        $FichaTecnica = new FichaTecnica();

        $FichaTecnica->nome_ft = $_POST['nome_ft'];
        $FichaTecnica->dataInicial_ft = $_POST['dataInicial_ft'];
        $FichaTecnica->dataFinal_ft = $_POST['dataFinal_ft'];
        $FichaTecnica->tempoTeste_ft = $_POST['tempoTeste_ft'];
        $FichaTecnica->localTeste_ft = $_POST['localTeste_ft'];
        $FichaTecnica->cliente_ft = $_POST['cliente_ft'];
        $FichaTecnica->acompanhamento_ft = $_POST['acompanhamento_ft'];
        $FichaTecnica->componentes_ft = $_POST['componentes_ft'];
        $FichaTecnica->metodologia_ft = $_POST['metodologia_ft'];
        $FichaTecnica->observacoes_ft = $_POST['observacoes_ft'];
        $FichaTecnica->visibilidade_ft = $_POST['visibilidade_ft'];
        $FichaTecnica->destaque_ft = $_POST['destaque_ft'];
        $FichaTecnica->status_ft = 'N';
        $FichaTecnica->id_solicitacao_ft = 1;
        $FichaTecnica->id_usuario_ft = 1;

        $FichaTecnicaDAO = new FichaTecnicaDAO();
        $FichaTecnicaDAO->insereFichaTecnica($FichaTecnica);

        //$_SESSION['nome'] = $FichaTecnica->nome_prj;
        //header("location:../View/ProjetoViewResult.php");
        
        header("location:../lista-solicitacao.php");

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

