<?php

session_start();
include '../Persistence/ConnectionDB.php';
include '../Model/UsuarioModel.php';
include '../Dao/UsuarioDAO.php';


if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {

        case 'cadastra':
            if ((!empty($_POST['nome_us'])) &&
                    (!empty($_POST['email_us'])) &&
                    (!empty($_POST['login_us'])) &&
                    (!empty($_POST['senha_us']))) {
                
                $usuario = new UsuarioModel();

                $usuario->nome_us = $_POST['nome_us'];
                $usuario->email_us = $_POST['email_us'];
                $usuario->login_us = $_POST['login_us'];
                $usuario->senha_us = $_POST['senha_us'];
                $usuario->perfil_us = 6; //default Visualizador

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->insereUsuario($usuario);

                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-usuarios.php");
                } else {
                    $_SESSION['success'] = "$usuario->nome_us, CADASTRADO com sucesso!";
                    header("location:../lista-usuarios.php");
                }
            } else {
                $_SESSION['error'] = "Usuário NÃO FOI CADASTRADO, preencha todos os campos!";
            }

            break;

        case 'altera':
            
            if ((!empty($_POST['nome_us'])) &&
                    (!empty($_POST['email_us'])) &&
                    (!empty($_POST['login_us']))) {

                $usuario = new UsuarioModel();

                $usuario->id_us = $_POST['id_us'];
                $usuario->nome_us = $_POST['nome_us'];
                $usuario->email_us = $_POST['email_us'];
                $usuario->login_us = $_POST['login_us'];
                ( isset($_POST['senha_us']) ? $usuario->senha_us = $_POST['senha_us'] : $usuario->senha_us = null);
                $usuario->status_us = $_POST['status_us'];
                $usuario->perfil_us = $_POST['perfil_us'];

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->atualizaUsuario($usuario);           
                
                if (isset($_SESSION['error'])) {
                    $_SESSION['error'];
                    header("location:../lista-usuarios.php");
                } else {
                    $_SESSION['success'] = "$usuario->nome_us, ATUALIZADO com sucesso!";
                    header("location:../lista-usuarios.php");
                }
            } else {
                $_SESSION['error'] = "Usuário NÃO FOI ATUALIZADO, preencha todos os campos!";
            }

            break;

        case 'deleta':

            $usuario = new UsuarioModel();

            $usuario->id_us = $_POST['id_us'];
            $usuario->nome_us = $_POST['nome_us'];

            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->deletaUsuario($usuario);

            if (isset($_SESSION['error'])) {
                $_SESSION['error'];
                header("location:../lista-usuarios.php");
            } else {
                $_SESSION['success'] = "$usuario->nome_us, DELETADO com sucesso!";
                header("location:../lista-usuarios.php");
            }

            break;

        case 'login':

            if ((!empty($_POST['login_us'])) &&
                    (!empty($_POST['senha_us']))) {

                $usuario = new UsuarioModel();

                $usuario->login_us = $_POST['login_us'];
                $usuario->senha_us = $_POST['senha_us'];

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->buscaUsuario($usuario);

                unset($_SESSION['senha_us']);
                $usuario->senha_us = "";

                if (($usuario->id_us == "") || ($usuario->status_us == "Inativo")) {
                    $_SESSION['error'] = "Usuário e/ou senha inválidos.";
                    header("location:../index.php");
                } else {
                    $_SESSION['success'] = "$usuario->login_us, logado com sucesso!";
                    $_SESSION['id_us'] = $usuario->id_us;
                    $_SESSION['nome_us'] = $usuario->nome_us;
                    $usuarioDAO = new UsuarioDAO();
                    $_SESSION['id_perfil'] = $usuarioDAO->listaUsuario($usuario->id_us);
                    header("location:../minhavisao.php");
                }
            } else {
                $_SESSION['error'] = "Erro ao logar, preencha todos os campos!";
            }

            break;
    }
}


