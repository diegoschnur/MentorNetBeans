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
                <i class="fa fa-table"></i> Solicitações
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

            <div class="panel panel-default collapse in" id="collapse2">

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de Solicitações</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Solicitante</th>
                            <th>Nome Solicitação</th>
                            <th>Abertura</th>
                            <th>Necessidade</th>
                            <th>Andamento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $solicitacaoDAO = new SolicitacaoDAO();
                        $solicitacoes = $solicitacaoDAO->listaSolicitacoes();
                        foreach ($solicitacoes as $sol) :
                            ?>
                            <tr>
                                <td><a href="lista-solicitacao.php"><?= $sol->id_sol ?></a></td>
                                <td><?= $sol->idUsuario_sol ?></td>
                                <td><?= $sol->nome_sol ?></td>
                                <td><?= $sol->dataAbertura_sol ?></td>
                                <td><?= $sol->dataNecessidade_sol ?></td>
                                <td>0%</td>
                                <td><?= $sol->status_sol ?></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
