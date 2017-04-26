<?php
require_once("cabecalho.php");

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Projetos
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
                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" href="#collapse2" 
                       style="float: right; display: inline-block; position: relative;"></i>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collapse2">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">

                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de projetos</h3>
            </div>
            <div class="panel-body">
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
                                <td><?= $pr->id_prj ?></td>
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
<!-- /.row -->

<?php include("rodape.php"); ?>
