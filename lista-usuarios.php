<?php
require_once("cabecalho.php");

session_start();

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listaUsuarios();

$conta_us = sizeof($usuarios, 0);
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-list-alt"></i> Usuários
            </li>
        </ol>
    </div>
</div>

<?php
if (isset($_SESSION["success"])) {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <strong> <?= $_SESSION["success"] ?> </strong>
    </div>
    <?php
    unset($_SESSION["success"]);
}

if (isset($_SESSION["error"])) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <strong> <?= $_SESSION['error'] ?> </strong>
    </div>
    <?php
    unset($_SESSION["error"]);
}
?>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de usuários 
                    <span class="badge"><?php echo $conta_us ?></span>
                    <?php
                    if ($pegaPerfil == 2 || ($pegaPerfil == 4) || ($pegaPerfil == 1)) {
                        ?>
                        <a onclick="defineSessao('id_usuario', '', 'form-usuario.php')">
                            <i class="ace-icon fa bigger-125 fa-plus-circle" id="paineis-status"></i>
                        </a>
                        <?php
                    }
                    ?>

                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($usuarios as $us) :
                                ?>
                                <tr onClick="defineSessao('id_usuario', '<?= $us->id_us ?>', 'lista-usuario.php')">
                                    <td><?= $us->id_us ?></td>
                                    <td><?= $us->nome_us ?></td>
                                    <td><?= $us->email_us ?></td>
                                    <td><?= $us->status_us ?></td>
                                </tr>
                                <?php
                            endforeach
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <nav aria-label="...">
            <ul class="pager">
                <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                <li class="hidden-xs"><a href="#">1</a></li>
                <li class="next"><a href="#">Próxima <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
