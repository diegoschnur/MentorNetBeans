<?php

session_start();

include '../Persistence/ConnectionDB.php';
include '../Model/ProjetoModel.php';
include '../Dao/ProjetoDAO.php';

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastra':
            if ((!empty($_POST['nome_prj'])) &&
                    (!empty($_POST['descricao_prj']))) {

                $projeto = new ProjetoModel();

                $projeto->nome_prj = $_POST['nome_prj'];
                $projeto->descricao_prj = $_POST['descricao_prj'];
                $projeto->status_prj = 'Inativo';
                $projeto->id_usuario_prj = $_SESSION['id_us'];

                $projetoDao = new ProjetoDAO();
                $projetoDao->insereProjeto($projeto);

                if (isset($_SESSION["error"])) {
                    $_SESSION["error"];
                    header("location:../lista-projetos.php");
                } else {
                    $_SESSION["success"] = "$projeto->nome_prj, CADASTRADO com sucesso!";
                    header("location:../lista-projetos.php");
                }
            } else {
                $_SESSION["error"] = "$projeto->nome_prj, NÃO FOI CADASTRADO, preencha todos os campos!";
            }

            break;

        case 'altera':

            if ((!empty($_POST['nome_prj'])) &&
                    (!empty($_POST['descricao_prj'])) &&
                    (!empty($_POST['status_prj']))) {

                $projeto = new ProjetoModel();

                $projeto->id_prj = $_POST['id_prj'];
                $projeto->nome_prj = $_POST['nome_prj'];
                $projeto->descricao_prj = $_POST['descricao_prj'];
                $projeto->status_prj = $_POST['status_prj'];

                $projetoDao = new ProjetoDAO();
                $projetoDao->atualizaProjeto($projeto);

                if (isset($_SESSION["error"])) {
                    $_SESSION["error"];
                    header("location:../lista-projetos.php");
                } else {
                    $_SESSION["success"] = "$projeto->nome_prj, ATUALIZADO com sucesso!";
                    header("location:../lista-projetos.php");
                }
            } else {
                $_SESSION["error"] = "$projeto->nome_prj, NÃO FOI ATUALIZADO, preencha todos os campos!";
            }

            break;

        case 'deleta':

            $projeto = new ProjetoModel();

            $projeto->id_prj = $_POST['id_prj'];
            $projeto->nome_prj = $_POST['nome_prj'];

            $projetoDao = new ProjetoDAO();
            $projetoDao->deletaProjeto($projeto);

            if (isset($_SESSION["error"])) {
                    $_SESSION["error"];
                    header("location:../lista-projetos.php");
                } else {
                    $_SESSION["success"] = "$projeto->nome_prj, DELETADO com sucesso!";
                    header("location:../lista-projetos.php");
                }

            break;
    }
}
?>

