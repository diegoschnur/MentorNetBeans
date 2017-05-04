<?php
require_once("cabecalho.php");
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li>
                <i class="fa fa-list-alt"></i>  <a href="lista-solicitacoes.php">Solicitações</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Solicitação
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-8">
                <div class="panel-group">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Informações Gerais
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collGerais" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collGerais">

                            <p>Dados</p>

                        </div>

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Componentes a testar
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collComponentes" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collComponentes">

                            <p>Dados</p>

                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Sugestões de metodologia
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collMetodologia" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body collapse in" id="collMetodologia">

                            <p>Dados</p>

                        </div>

                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Lista de Fichas Técnicas Associadas
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collFichas" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body collapse in" id="collFichas">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ficha Técnica</th>
                                            <th>Data</th>
                                            <th>Tempo</th>
                                            <th>Status</th>
                                            <th>Destaque</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="lista-fichaTecnica.php">FT-03.01/2017</a></td>
                                            <td>Nome da Ficha Técnica 1</td>
                                            <td>01/01/2017</td>
                                            <td>5</td>
                                            <td>Aceita</td>
                                            <td>Importante</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados do Projeto</h3>
                    </div>

                    <div class="list-group">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <p><small class="mb-1"><strong>ID: </strong>01</small></p>
                                <p><small class="mb-1"><strong>Nome: </strong>Projeto 01</small></p>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="form-fichaTecnica.php" class="btn btn-primary btn-block btn-lg" role="button">Nova Ficha Técnica</a>
            </div>

        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>


