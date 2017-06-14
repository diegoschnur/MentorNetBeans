<?php
session_start();
require_once("./Include/validaUsuario.php");

function carregaClasse($nomeDaClasse) {
    require_once("Dao/" . $nomeDaClasse . ".php");
    require_once("./Include/funcoes.php");
    require_once ("./Persistence/ConnectionDB.php");
}

spl_autoload_register("carregaClasse");

error_reporting(E_ALL ^ E_NOTICE);

if (isset($_SESSION["id_us"])) {
    $id_us_logado = $_SESSION['id_us'];

    $UsuarioDAO = new UsuarioDAO();
    $pegaUsuarioLogado = $UsuarioDAO->listaUsuario($id_us_logado);

    $pegaPerfil = $pegaUsuarioLogado[0]->perfil_us;
    $pegaStatus_us = $pegaUsuarioLogado[0]->status_us;
    
    $_SESSION['usuario-ativo'] = $pegaStatus_us;
}
?>
<html lang="pt-BR">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Stara | Mentor 4.0</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--Pulling Awesome Font -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Datatabless.net -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.datatables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" />



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="minhavisao.php">Mentor 4.0</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['nome_us'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a onClick="defineSessao('id_usuario', '<?= $_SESSION['id_us'] ?>', 'lista-usuario.php')"><i class="fa fa-fw fa-user"></i> Meu Perfil</a>
                            </li>
                            <?php
                            if (($pegaPerfil == 2) || ($pegaPerfil == 4) || ($pegaPerfil == 1)) {
                                ?>
                                <li>
                                    <a href="lista-usuarios.php" name="lista-usuarios"><i class="fa fa-fw fa-gear"></i> Usuários</a>
                                </li>
                                <li>
                                    <a href="lista-perfis.php" name="lista-perfis"><i class="fa fa-fw fa-gear"></i> Perfis</a>
                                </li>
                                <?php
                            }
                            ?>

                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="minhavisao.php" name="minhavisao"><i class="fa fa-home"></i> Minha Visão</a>
                        </li>
                        <li>
                            <a href="lista-solicitacoes.php" name="lista-solicitacoes"><i class="fa fa-list-alt"></i> Lista de Solicitações</a>
                        </li>

                        <?php
                        if (($pegaPerfil == 2) || ($pegaPerfil == 3) || ($pegaPerfil == 1)) {
                            ?>
                            <li>
                                <a href="form-solicitacao.php" name="form-solicitacao"><i class="fa fa-pencil-square-o"></i> Nova Solicitação</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="lista-projetos.php" name="lista-projetos"><i class="fa fa-list-alt"></i> Lista de Projetos</a>
                        </li>
                        <?php
                        if ($pegaPerfil == 2 || ($pegaPerfil == 1)) {
                            ?>
                            <li>
                                <a href="form-projeto.php" name="form-projeto"><i class="fa fa-pencil-square-o"></i> Novo Projeto</a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">