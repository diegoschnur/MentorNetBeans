<?php
require_once("cabecalho.php");

$id_us_logado = $_SESSION['id_us'];
$solicitacaoDoUser = new SolicitacaoDAO();
$solicitacoesPorUsuario = $solicitacaoDoUser->listaSolicitacoesDoUsuario($id_us_logado);

//echo '<pre>';
//print_r($solicitacoesPorUsuario);

if (isset($_SESSION["error-banco"])) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <strong> <?= $_SESSION['error-banco'] ?> </strong>
    </div>
    <?php
    unset($_SESSION["error-banco"]);
}

$id_sol = $_SESSION['id_solicitacao'];

//são as solicitações recém criadas
$nova = array();

//São as solicitações que estão em processo de encerramento, "Em avaliação"
$avaliacao = array();

//São as solicitações que os testadores marcaram como "Ativas", ou seja, serão trabalhadas
$ativa = array();

// Todas as solicitações dentro do prazo e que estão em andamento;
$prazo = array();

// Todas as solicitações na ultima semana antes da data de necessidade e que ainda estão em andamento;
$ultimaSemana = array();

// Todas as solicitações que passaram da data de necessidade e que ainda estão em andamento;
$atrasada = array();

//Todas as solicitações aprovadas
$aprovada = array();

//Todas as solicitações reprovadas
$reprovada = array();

//Todas as solicitações canceladas
$cancelada = array();

$hoje = pegaDataDoMomento();

foreach ($solicitacoesPorUsuario as $s) {

    if ($s->status_sol == "Nova") {
        array_push($nova, $s);
    }
    if ($s->status_sol == "Aprovada") {
        array_push($aprovada, $s);
    }
    if ($s->status_sol == "Reprovada") {
        array_push($reprovada, $s);
    }
    if ($s->status_sol == "Cancelada") {
        array_push($cancelada, $s);
    }
    if ($s->status_sol == "Em avaliação") {
        array_push($avaliacao, $s);
    }
    if ($s->status_sol == "Ativa") {
        array_push($ativa, $s);
    }
    if (strtotime($s->dataNecessidade_sol) >= (strtotime($hoje))) {
        $s->status_sol = "No prazo";
        array_push($prazo, $s);
    } elseif ((($s->status_sol != "Aprovada") && ($s->status_sol != "Reprovada")) && ($s->status_sol != "Cancelada")) {
        $s->status_sol = "Atrasada";
        array_push($atrasada, $s);
    }
    if ((strtotime($s->dataNecessidade_sol) - strtotime($hoje) < 0 && strtotime($s->dataNecessidade_sol) - strtotime($hoje)) < 5) {
        $s->status_sol = "Ultima semana";
        array_push($ultimaSemana, $s);
    }
//    if (($s->status_sol != "Aprovada" && $s->status_sol != "Reprovada" && $s->status_sol != "Cancelada") && (strtotime($hoje) > strtotime($s->dataNacessidade_sol))) {
//        $s->status_sol = "Atrasada";
//        array_push($atrasada, $s);
//    }
}
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12 hidden-xs">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-home"></i> Minha Visão
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
        <strong> <?= $_SESSION['success'] ?> </strong>
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

<div class="row">

    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comment fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($nova) ?></div>
                        <div>Novas!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-primary hidden-xs">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($ativa) ?></div>
                        <div>Em andamento!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($avaliacao) ?></div>
                        <div>Em avaliação!</div>
                    </div>
                </div>
            </div>
            <!--            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>-->
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-green hidden-xs">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($prazo) ?></div>
                        <div>No prazo!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-clock-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($ultimaSemana) ?></div>
                        <div>Última Semana!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-exclamation-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($atrasada) ?></div>
                        <div>Atrasadas!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 col-md-4">
        <div class="panel panel-red hidden-xs">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-ban fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo count($cancelada) ?></div>
                        <div>Canceladas!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel-group" id="panels-all">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Novas
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collNovas" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collNovas">
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
<?php
foreach ($nova as $no) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $no->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $no->id_sol ?></td>
                                        <td><?= $no->nome_sol ?></td>
                                        <td><?= formataData($no->dataAbertura_sol) ?></td>
                                        <td><?= formataData($no->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($no->tempoTeste_sol, somaTempo($no->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Em Andamento
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collAndamento" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collAndamento">
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
<?php
foreach ($ativa as $at) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $at->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $at->id_sol ?></td>
                                        <td><?= $at->nome_sol ?></td>
                                        <td><?= formataData($at->dataAbertura_sol) ?></td>
                                        <td><?= formataData($at->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($at->tempoTeste_sol, somaTempo($at->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
<?php
foreach ($avaliacao as $av) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $av->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $av->id_sol ?></td>
                                        <td><?= $av->nome_sol ?></td>
                                        <td><?= formataData($av->dataAbertura_sol) ?></td>
                                        <td><?= formataData($av->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($av->tempoTeste_sol, somaTempo($av->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
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
<?php
foreach ($prazo as $pz) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $pz->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $pz->id_sol ?></td>
                                        <td><?= $pz->nome_sol ?></td>
                                        <td><?= formataData($pz->dataAbertura_sol) ?></td>
                                        <td><?= formataData($pz->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($pz->tempoTeste_sol, somaTempo($pz->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
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
<?php
foreach ($ultimaSemana as $us) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $us->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $us->id_sol ?></td>
                                        <td><?= $us->nome_sol ?></td>
                                        <td><?= formataData($us->dataAbertura_sol) ?></td>
                                        <td><?= formataData($us->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($us->tempoTeste_sol, somaTempo($us->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary" id="panel-atrasadas">
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
<?php
foreach ($atrasada as $at) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $at->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $at->id_sol ?></td>
                                        <td><?= $at->nome_sol ?></td>
                                        <td><?= formataData($at->dataAbertura_sol) ?></td>
                                        <td><?= formataData($at->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($at->tempoTeste_sol, somaTempo($at->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
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
                                </tr>
                            </thead>
                            <tbody>
<?php
foreach ($aprovada as $ap) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $ap->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $ap->id_sol ?></td>
                                        <td><?= $ap->nome_sol ?></td>
                                        <td><?= formataData($ap->dataAbertura_sol) ?></td>
                                        <td><?= formataData($ap->dataNecessidade_sol) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
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
                                </tr>
                            </thead>
                            <tbody>
<?php
foreach ($reprovada as $rp) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $rp->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $rp->id_sol ?></td>
                                        <td><?= $rp->nome_sol ?></td>
                                        <td><?= formataData($rp->dataAbertura_sol) ?></td>
                                        <td><?= formataData($rp->dataNecessidade_sol) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
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
                                    <th>Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
foreach ($cancelada as $cl) :
    ?>
                                    <tr onClick="defineSessao('id_solicitacao', '<?= $cl->id_sol ?>', 'lista-solicitacao.php')">
                                        <td><?= $cl->id_sol ?></td>
                                        <td><?= $cl->nome_sol ?></td>
                                        <td><?= formataData($cl->dataAbertura_sol) ?></td>
                                        <td><?= formataData($cl->dataNecessidade_sol) ?></td>
                                        <td><?= formataUmaCasaDecimal(calculaPorcentagem($cl->tempoTeste_sol, somaTempo($cl->id_sol))) ?></td>
                                    </tr>
    <?php
endforeach;
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gráfico de Desempenho</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>-->
        </div>
    </div>
</div>

<?php include("rodape.php"); ?>

