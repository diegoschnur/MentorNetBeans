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
            <li>
                <i class="fa fa-list-alt"></i>  <a href="lista-solicitacao.php">Solicitação</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Ficha Técnica
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
                            <h3 class="panel-title" data-parent="#panels-all">Componentes testados
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
                            <h3 class="panel-title" data-parent="#panels-all">Metodologia aplicada
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

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados da Solicitação</h3>
                    </div>
                    <div class="panel-body">
                        Area dos dados
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
