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
            <li>
                <i class="fa fa-dashboard"></i>  <a href="lista-solicitacoes.php">Solicitações</a>
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

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados da Solicitação</h3>
                    </div>
                    <div class="panel-body">
                        Dados da solicitação
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Fichas Técnicas Associadas</h3>
                    </div>
                    <div class="panel-body">
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
                                <tr>
                                    <td><a href="lista-fichaTecnica.php">FT-03.02/2017</a></td>
                                    <td>Nome da Ficha Técnica 2</td>
                                    <td>01/01/2017</td>
                                    <td>15</td>
                                    <td>Aceita</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><a href="lista-fichaTecnica.php">FT-03.03/2017</a></td>
                                    <td>Nome da Ficha Técnica 3</td>
                                    <td>02/01/2017</td>
                                    <td>3</td>
                                    <td>Aceita</td>
                                    <td>Importante</td>
                                </tr>
                                <tr>
                                    <td><a href="lista-fichaTecnica.php">FT-03.03/2017</a></td>
                                    <td>Nome da Ficha Técnica 4</td>
                                    <td>01/01/2017</td>
                                    <td>7</td>
                                    <td>Aceita</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados do Projeto</h3>
                    </div>
                    <div class="panel-body">
                        Area dos dados
                    </div>
                </div>

                <a href="form-fichaTecnica.php" class="btn btn-primary btn-block btn-lg" role="button">Nova Ficha Técnica</a>

            </div>
            
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>


