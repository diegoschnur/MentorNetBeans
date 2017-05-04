<?php
include '../Persistence/ConnectionDB.php';
include '../Model/Usuario.php';
include '../Dao/UsuarioDAO.php';

if ((!empty($_POST['nome_us'])) &&
        (!empty($_POST['email_us'])) &&
        (!empty($_POST['login_us'])) &&
        (!empty($_POST['senha_us'])) &&
        (!empty($_POST['telefone_us'])) &&
        (!empty($_POST['status_us']))) {

    $erros = array();

    if (count($erros) == 0) {
        $usuario = new Usuario();

        $usuario->nome_us = $_POST['nome_us'];
        $usuario->email_us = $_POST['email_us'];
        $usuario->login_us = $_POST['login_us'];
        $usuario->senha_us = $_POST['senha_us'];
        $usuario->telefone_us = $_POST['telefone_us'];
        $usuario->status_us = $_POST['status_us'];
        $usuario->permissao_relator_us = $_POST['permissao_relator_us'];
        $usuario->permissao_Grelator_us = $_POST['permissao_Grelator_us'];
        $usuario->permissao_desenvolvedor_us = $_POST['permissao_desenvolvedor_us'];
        $usuario->permissao_Gdesenvolvedor_us = $_POST['permissao_Gdesenvolvedor_us'];
        $usuario->permissao_secretario_us = $_POST['permissao_secretario_us'];
        $usuario->permissao_visualizador_us = $_POST['permissao_visualizador_us'];

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->insereUsuario($usuario);

        header("location:../lista_usuarios.php");
    } else {
        echo "Erro ao cadastrar o usuário!";
    }
} else {
    echo "Informe todos os campos";
    
}

