<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/PerfisModel.php';
include '../Dao/PerfisDAO.php';


if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {

        case 'cadastra':
            if ((!empty($_POST['nome_pf'])) &&
                    ( $_POST['permissao_relator_us'] >= 0) &&
                    ( $_POST['permissao_Grelator_us'] >= 0) &&
                    ( $_POST['permissao_desenvolvedor_us'] >= 0) &&
                    ( $_POST['permissao_Gdesenvolvedor_us'] >= 0) &&
                    ( $_POST['permissao_secretario_us'] >= 0) &&
                    ( $_POST['permissao_visualizador_us'] >= 0)) {

                $perfil = new PerfilModel();

                $perfil->nome_pf = $_POST['nome_pf'];
                $perfil->permissao_relator_us = $_POST['permissao_relator_us'];
                $perfil->permissao_Grelator_us = $_POST['permissao_Grelator_us'];
                $perfil->permissao_desenvolvedor_us = $_POST['permissao_desenvolvedor_us'];
                $perfil->permissao_Gdesenvolvedor_us = $_POST['permissao_Gdesenvolvedor_us'];
                $perfil->permissao_secretario_us = $_POST['permissao_secretario_us'];
                $perfil->permissao_visualizador_us = $_POST['permissao_visualizador_us'];

                $perfilDAO = new PerfisDAO();
                $perfilDAO->inserePerfil($perfil);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-perfis.php");
                } else {
                    $_SESSION['success'] = "$perfil->nome_pf, CADASTRADO com sucesso!";
                    header("location:../lista-perfis.php");
                }
            } else {
                $_SESSION['error'] = $_POST['nome_pf'] . " , NÃO FOI CADASTRADO, preencha todos os campos!";
            }

            break;

        case 'altera':
            
            if ((!empty($_POST['nome_pf'])) &&
                    ( $_POST['permissao_relator_us'] >= 0) &&
                    ( $_POST['permissao_Grelator_us'] >= 0) &&
                    ( $_POST['permissao_desenvolvedor_us'] >= 0) &&
                    ( $_POST['permissao_Gdesenvolvedor_us'] >= 0) &&
                    ( $_POST['permissao_secretario_us'] >= 0) &&
                    ( $_POST['permissao_visualizador_us'] >= 0)) {

                $perfil = new PerfilModel();

                $perfil->id_pf = $_POST['id_pf'];
                $perfil->nome_pf = $_POST['nome_pf'];
                $perfil->permissao_relator_us = $_POST['permissao_relator_us'];
                $perfil->permissao_Grelator_us = $_POST['permissao_Grelator_us'];
                $perfil->permissao_desenvolvedor_us = $_POST['permissao_desenvolvedor_us'];
                $perfil->permissao_Gdesenvolvedor_us = $_POST['permissao_Gdesenvolvedor_us'];
                $perfil->permissao_secretario_us = $_POST['permissao_secretario_us'];
                $perfil->permissao_visualizador_us = $_POST['permissao_visualizador_us'];
                
                $perfilDAO = new PerfisDAO();
                $perfilDAO->atualizaPerfil($perfil);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-perfis.php");
                } else {
                    $_SESSION['success'] = $_POST['nome_pf'].", ATUALIZADO com sucesso!";
                    header("location:../lista-perfis.php");
                }
            } else {
                $_SESSION['error'] = "$perfil->nome_pf, NÃO FOI ATUALIZADO, preencha todos os campos!";
            }

            break;

        case 'deleta':

            $perfil = new PerfilModel();

            $perfil->id_pf = $_POST['id_pf'];
            $perfil->nome_pf = $_POST['nome_pf'];

            $perfilDAO = new PerfisDAO();
            $perfilDAO->deletaPerfil($perfil);

            if (isset($_SESSION['error'])) {
                $_SESSION['error'];
                header("location:../lista-perfis.php");
            } else {
                $_SESSION['success'] = "$perfil->nome_pf, DELETADO com sucesso!";
                header("location:../lista-perfis.php");
            }

            break;

    }
}


