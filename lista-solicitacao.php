<?php
require_once("cabecalho.php");
$id_sol = $_GET['id'];
if ($_SESSION['solicitacao'] != $id_sol) {
    $_SESSION['solicitacao'] = $id_sol;
}
//$id_sol = $_SESSION['id_solicitacao'];
//print_r($_SESSION);exit;
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($id_sol);

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

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Informações Gerais
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collGerais" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collGerais">

                            <p><strong>ID: </strong><?= $sol[0]->id_sol ?></p>
                            <p><strong>Nome: </strong><?= $sol[0]->nome_sol ?></p>
                            <p><strong>Solicitante: </strong><?= $sol[0]->idUsuario_sol ?></p>
                            <p><strong>Data Abertura: </strong><?= $sol[0]->dataAbertura_sol ?></p>
                            <p><strong>Data Necessidade: </strong><?= $sol[0]->dataNecessidade_sol ?></p>
                            <p><strong>Tempo de Teste: </strong><?= $sol[0]->tempoTeste_sol ?>  <?= $sol[0]->unidadeMedida_sol ?></p>
                            <p><strong>Status: </strong><?= $sol[0]->status_sol ?></p>

                        </div>

                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Componentes a testar
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collComponentes" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collComponentes">

                            <p><?= $sol[0]->componentesTestar_sol ?></p>

                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Sugestões de metodologia
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collMetodologia" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body collapse in" id="collMetodologia">

                            <p><?= $sol[0]->metodologia_sol ?></p>

                        </div>

                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Observações
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collObs" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body collapse in" id="collObs">

                            <p><?= $sol[0]->observacoes_sol ?></p>

                        </div>

                    </div>

                    <div class="panel panel-default">
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

                                        <?php
                                        $fichasTecnicasDAO = new FichaTecnicaDAO();
                                        $fichasTecnicas = $fichasTecnicasDAO->listaFichasTecnicas($id_sol);
                                        foreach ($fichasTecnicas as $ft) :
                                            ?>
                                            <tr>
                                                <td><a href="lista-fichaTecnica.php?id=<?= $ft->id_ft ?>"><?= $ft->id_ft ?></a></td>
                                                <td><?= $ft->nome_ft ?></td>
                                                <td><?= $ft->dataInicial_ft ?></td>
                                                <td><?= $ft->tempoTeste_ft ?></td>
                                                <td><?= $ft->status_ft ?></td>
                                                <td><?= $ft->destaque_ft ?></td>
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

            </div>

            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" data-parent="#panels-all">Informações Gerais
                            <a href="#">
                                <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collProjeto" 
                                   id="paineis-status"></i>
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body collapse in" id="collProjeto">
                        <?php
                        $_SESSION['id_projeto'] = $sol[0]->idProjeto_sol;
                        
                        $projetoDAO = new ProjetoDAO();
                        $prj = $projetoDAO->listaProjeto($sol[0]->idProjeto_sol);
                        
                        ?>
                        <p><strong>ID: </strong><?= $sol[0]->idProjeto_sol ?></p>
                        <p><strong>Nome: </strong><?= $prj[0]->nome_prj ?></p>
                    </div>

                </div>

                <a href="form-fichaTecnica.php" class="btn btn-default btn-block btn-lg" role="button">Nova Ficha Técnica</a>
            </div>

        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>