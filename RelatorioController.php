<?php

session_start();

//echo '<pre>';
//print_r($_POST);exit;

include '../Persistence/ConnectionDB.php';
include '../Model/RelatorioModel.php';
include '../Dao/RelatorioDAO.php';

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastra':
            if (isset($_POST['obsRelator_rl'])) {

                $erros = array();

                if (count($erros) == 0) {
                    $relatorio = new RelatorioModel();

                    $relatorio->id_solicitacao_rl = $_POST['id_sol'];
                    $relatorio->obsRelator_rl = $_POST['obsRelator_rl'];
                    $relatorio->statusRelator_rl = $_POST['statusRelator_rl'];
                    $relatorio->id_usuario_rel = $_SESSION['id_us'];

                    $relatorioDao = new RelatorioDAO();
                    $relatorioDao->insereRelatorio($relatorio);

                    header("location:../lista-solicitacao.php");
                } else {
                    echo "Erro ao cadastrar o parecer!";
                }
            }  if (isset($_POST['obsDesenvolvedor_rl'])) {
                
                 $erros = array();
                if (count($erros) == 0) {
                    $relatorio = new RelatorioModel();
                    
                    $today = date("Y-m-d");

                    $relatorio->id_solicitacao_rl = $_POST['id_sol'];
                    $relatorio->obsDesenvolvedor_rl = $_POST['obsDesenvolvedor_rl'];
                    $relatorio->statusDesenvolvedor_rl = $_POST['statusDesenvolvedor_rl'];
                    $relatorio->dataEncerramento_rl = $today;
                    $relatorio->id_usuario_sol = $_SESSION['id_us'];

                    $relatorioDao = new RelatorioDAO();
                    $relatorioDao->atualizaProjeto($relatorio);

                    header("location:../lista-solicitacao.php");
                } else {
                    echo "Erro ao cadastrar o parecer!";
                }
            }
            break;
    }
}
?>
