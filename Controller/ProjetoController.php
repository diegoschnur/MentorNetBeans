<?php
include '../Persistence/ConnectionDB.php';
include '../Model/ProjetoModel.php';
include '../Dao/ProjetoDAO.php';

if ((!empty($_POST['nome_prj'])) &&
        (!empty($_POST['descricao_prj']))) {

    $erros = array();

    if (count($erros) == 0) {
        $projeto = new ProjetoModel();

        $projeto->nome_prj = $_POST['nome_prj'];
        $projeto->descricao_prj = $_POST['descricao_prj'];
        $projeto->status_prj = 'I';

        $projetoDao = new ProjetoDAO();
        $projetoDao->insereProjeto($projeto);

        //$_SESSION['nome'] = $projeto->nome_prj;
        //header("location:../View/ProjetoViewResult.php");
        
        header("location:../lista-projetos.php");

    } else {
        echo "Erro ao cadastrar o projeto";
        // $err = serialize($erros);
        // $_SESSION['erros'] = $err;
        // header("location:../View/ProjetoViewError.php");
    }
} else {
    echo "Informe todos os campos!";
}
?>

