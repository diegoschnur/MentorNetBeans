<?php
include("cabecalho.php");

session_start();

$perfisDAO = new PerfisDAO();
$perfis = $perfisDAO->listaPerfis();

$perfistamanho = sizeof($perfis, 0);

////definir o numero de itens por pagina
$itens_por_pagina = 10;

$num_paginas = ceil($perfistamanho / $itens_por_pagina);

//print_r($num_paginas);
//die();
////pegar a pagina atual
$pagina = intval($_GET['pagina']);
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-list-alt"></i> Perfis
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
                <h3 class="panel-title">Lista de perfis
                    <span class="badge"><?= $perfistamanho ?></span>
                    <?php
                    if ($pegaPerfil == 1) {
                        ?>
                        <a onclick="defineSessao('id_pf', '', 'form-perfil.php')">
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
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($perfis as $pf) :
                                ?>
                                <tr onClick="defineSessao('id_perfil_visualizado', '<?= $pf->id_pf ?>', 'lista-perfil.php')">
                                    <td><?= $pf->id_pf ?></td>
                                    <td><?= $pf->nome_pf ?></td>
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
                <li class="previous">
                    <a href="lista-perfis.php?pagina=0">
                        <span aria-hidden="true">&larr;</span> Anterior
                    </a>
                </li>

                <?php
                for ($i = 0; $i < $num_paginas; $i++) {
                    $estilo = "";
                    if ($pagina == $i)
                        $estilo = "class=\"active\"";
                    ?>
                    <li <?php echo $estilo; ?> class="hidden-xs">
                        <a href="lista-perfis.php?pagina=<?php echo $i; ?>"><?php echo $i + 1; ?></a>
                    </li>
                <?php } ?>

                <li class="next">
                    <a href="lista-perfis.php?pagina=<?php echo $num_paginas - 1; ?>">Próxima 
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
