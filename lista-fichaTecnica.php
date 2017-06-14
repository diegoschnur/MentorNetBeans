<?php
require_once("cabecalho.php");

$id_ft = $_SESSION['id_fichaTecnica'];
$fichaTecnicaDAO = new FichaTecnicaDAO();
$ft = $fichaTecnicaDAO->listaFichaTecnica($id_ft);

//dados do usuario
$_SESSION['id_usuario'] = $ft[0]->id_usuario_ft;
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($ft[0]->id_usuario_ft);

//dados da solicitação
$_SESSION['id_solicitacao'] = $ft[0]->id_solicitacao_ft;
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($ft[0]->id_solicitacao_ft);

//dados do projeto
$_SESSION['id_projeto'] = $sol[0]->idProjeto_sol;
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($sol[0]->idProjeto_sol);

//echo '<pre>';
//print_r($prj);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="hidden-xs">
                <i class="fa fa-list-alt"></i>  <a href="lista-solicitacoes.php">Solicitações</a>
            </li>
            <li>
                <i class="fa fa-list-alt"></i>  <a href="lista-solicitacao.php">Solicitação</a>
            </li>
            <li class="active hidden-xs">
                <i class="fa fa-table"></i> Ficha Técnica
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

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

<div class="row">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-8">

                <div class="panel-group">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Informações Gerais
                                <a onClick="defineSessao('id_fichaTecnica', '<?= $ft[0]->id_ft ?>', 'form-altera-fichaTecnica.php')"> &#160
                                    <i class="ace-icon fa bigger-125 fa-pencil" id="botaoEditar"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collGerais" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collGerais">

                            <p><strong>ID: </strong><?= $ft[0]->id_ft ?></p>
                            <p><strong>Nome: </strong><?= $ft[0]->nome_ft ?></p>
                            <p><strong>Responsável: </strong><?= $us[0]->nome_us ?></p>
                            <p><strong>Data Inicial: </strong><?= formataData($ft[0]->dataInicial_ft) ?></p>
                            <p><strong>Data Final: </strong><?= formataData($ft[0]->dataFinal_ft) ?></p>
                            <p><strong>Local do Teste: </strong><?= $ft[0]->localTeste_ft ?></p>
                            <p><strong>Cliente: </strong><?= $ft[0]->cliente_ft ?></p>
                            <p><strong>Acompanhamento: </strong><?= $ft[0]->acompanhamento_ft ?></p>
                            <p><strong>Status: </strong><?= $ft[0]->status_ft ?></p>

                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Componentes
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collComponentes" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collComponentes">

                            <p><?= $ft[0]->componentes_ft ?></p>

                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Metodologia
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collMetodologia" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collMetodologia">

                            <p><?= $ft[0]->metodologia_ft ?></p>

                        </div>

                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Comportamento
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collComportamento" 
                                       id="paineis-status"></i>
                                </a>
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collComportamento">

                            <p><?= $ft[0]->comportamento_ft ?></p>

                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" data-parent="#panels-all">Dados do Projeto
                            <a href="#">
                                <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collProjeto" 
                                   id="paineis-status"></i>
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body collapse in" id="collProjeto">

                        <p><strong>ID: </strong><?= $prj[0]->id_prj ?></p>
                        <p><strong>Nome: </strong><?= $prj[0]->nome_prj ?></p>

                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" data-parent="#panels-all">Dados da Solicitação
                            <a href="#">
                                <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collSolicitacao" 
                                   id="paineis-status"></i>
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body collapse in" id="collSolicitacao">
                        <p><strong>ID: </strong><?= $sol[0]->id_sol ?></p>
                        <p><strong>Nome: </strong><?= $sol[0]->nome_sol ?></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
