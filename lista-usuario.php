<?php
require_once("cabecalho.php");

session_start();

$id_us = $_SESSION['id_usuario'];
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($id_us);

$perfilDao = new PerfisDAO();
$perfil = $perfilDao->listaPerfil($us[0]->perfil_us)

?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li>
                <i class="fa fa-list-alt"></i> <a href="lista-usuarios.php">Usuários</a> 
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Usuário
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Informações do Usuário
                    <a onClick="defineSessao('id_usuario', '<?= $us[0]->id_us ?>', 'form-altera-usuario.php')">
                        <i class="ace-icon fa bigger-125 fa-pencil" id="paineis-status"></i>
                    </a>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collProjeto">

                <p><strong>ID: </strong><?= $us[0]->id_us ?></p>
                <p><strong>Nome: </strong><?= $us[0]->nome_us ?></p>
                <p><strong>E-mail: </strong><?= $us[0]->email_us ?></p>
                <p><strong>Login: </strong><?= $us[0]->login_us ?></p>
                <p><strong>Perfil: </strong><?= $perfil[0]->nome_pf ?></p>
                <p><strong>Status: </strong><?= $us[0]->status_us ?></p>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
