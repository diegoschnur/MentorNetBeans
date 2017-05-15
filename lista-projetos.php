<?php
include("cabecalho.php");

session_start();

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-list-alt"></i> Projetos
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Filtros
                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collFiltros" 
                       id="paineis-status"></i>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collFiltros">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">

                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de projetos</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $projetoDAO = new ProjetoDAO();
                            $projetos = $projetoDAO->listaProjetos();
                            foreach ($projetos as $pr) :
                                ?>
                                <tr>
                                    <td><a href="lista-projeto.php?id=<?= $pr->id_prj ?>"><?= $pr->id_prj ?></a></td>
                                    <td><?= $pr->nome_prj ?></td>
                                    <td><?= $pr->status_prj ?></td>
                                </tr>
                                <?php
                            endforeach
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
