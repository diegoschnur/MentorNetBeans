<?php
require_once("cabecalho.php");
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-home"></i> Minha Visão
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">5</div>
                        <div>Em avaliação!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Ver Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-exchange fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>No prazo!</div>
                    </div>
                </div>
            </div>
            <a href="">
                <div class="panel-footer">
                    <span class="pull-left">Ver Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-clock-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">3</div>
                        <div>Última Semana!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Ver Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-info-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">4</div>
                        <div>Atrasadas!</div>
                    </div>
                </div>
            </div>
            <a href="#panel-atrasadas">
                <div class="panel-footer">
                    <span class="pull-left">Ver Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">

    <div class="col-lg-12">
        <div class="panel-group" id="panels-all">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Em Avaliação
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collAvaliacao" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collAvaliacao">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <td>S-02/2017</td>
                                    <td>Nome Solicitação 2</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>50%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">No Prazo
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collPrazo" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collPrazo">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>0%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Ultima Semana
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collSemana" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collSemana">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <td>S-02/2017</td>
                                    <td>Nome Solicitação 2</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>S-03/2017</td>
                                    <td>Nome Solicitação 3</td>
                                    <td>02/01/2017</td>
                                    <td>02/03/2017</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-red" id="panel-atrasadas">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Atrasadas
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collAtrasadas" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collAtrasadas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <td>S-02/2017</td>
                                    <td>Nome Solicitação 2</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>S-03/2017</td>
                                    <td>Nome Solicitação 3</td>
                                    <td>02/01/2017</td>
                                    <td>02/03/2017</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Aprovadas
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collAprovadas" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collAprovadas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Finalização</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>01/03/2017</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>S-02/2017</td>
                                    <td>Nome Solicitação 2</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>01/03/2017</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>S-03/2017</td>
                                    <td>Nome Solicitação 3</td>
                                    <td>02/01/2017</td>
                                    <td>02/03/2017</td>
                                    <td>02/03/2017</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Reprovadas
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collReprovadas" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collReprovadas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Finalização</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S-01/2017</td>
                                    <td>Nome Solicitação</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>01/03/2017</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>S-02/2017</td>
                                    <td>Nome Solicitação 2</td>
                                    <td>01/01/2017</td>
                                    <td>01/03/2017</td>
                                    <td>01/03/2017</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>S-03/2017</td>
                                    <td>Nome Solicitação 3</td>
                                    <td>02/01/2017</td>
                                    <td>02/03/2017</td>
                                    <td>02/03/2017</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Canceladas
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collCanceladas" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collCanceladas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Solicitação</th>
                                    <th>Abertura</th>
                                    <th>Necessidade</th>
                                    <th>Finalização</th>
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gráfico de Desempenho</h3>
                </div>
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("rodape.php"); ?>

