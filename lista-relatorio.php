<?php
include("cabecalho.php");

$id_prj = $_SESSION['id_projeto'];
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($id_prj);

$id_sol = $_SESSION['id_solicitacao'];
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($id_sol);

$fichasTecnicasDAO = new FichaTecnicaDAO();
$fts = $fichasTecnicasDAO->listaFichasTecnicas($id_sol);

$_SESSION['id_usuario'] = $prj[0]->id_usuario_prj;
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($sol[0]->idUsuario_sol);

$usuarioDAOa = new UsuarioDAO();
$us_sol = $usuarioDAOa->listaUsuario($id_sol);

$id_rl = $_SESSION['id_solicitacao'];
$relatorioDAO = new RelatorioDAO();
$rel = $relatorioDAO->listaRelatorio($id_rl);

$id_us_logado = $_SESSION['id_us'];
$usuarioPegaPerfil = new UsuarioDAO();
$pegaPerfil = $usuarioPegaPerfil->listaUsuario($id_us_logado);
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
            <li class="active hidden-xs">
                <i class="fa fa-table"></i> Relatório
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel-group" id="panels-all">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Informações Gerais
                        <?php
                    if (($pegaPerfil[0]->perfil_us == 1) || ($pegaPerfil[0]->perfil_us == 2) || ($pegaPerfil[0]->perfil_us == 3) || ($pegaPerfil[0]->perfil_us == 4)) {
                        
                        ?>
                        <a onClick="defineSessao('id_relatorio', '<?= $rel[0]->id_rl ?>', 'gerar-pdf-relatorio.php')"> &#160
                            <i class="ace-icon fa bigger-125 fa-print"></i>
                        </a>
                        <?php
                    }
                    ?>

                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collGerais" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collGerais">
                    <p><strong>Data de Abertura: </strong><?= formataData($sol[0]->dataAbertura_sol) ?></p>
                    <p><strong>Data Prevista: </strong><?= formataData($sol[0]->dataNecessidade_sol) ?></p>
                    <p><strong>Data de Finalização: </strong><?= formataData($rel[0]->dataEncerramento_rl) ?> </p>
                    <p><strong>Tempo Solicitado: </strong><?= $sol[0]->tempoTeste_sol ?> <?= $sol[0]->unidadeMedida_sol ?></p> 
                    <p><strong>Tempo Realizado: </strong><?= somaTempo($sol[0]->id_sol) ?> <?= $sol[0]->unidadeMedida_sol ?></p> 
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Projeto
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
                    <h3 class="panel-title" data-parent="#panels-all">Solicitação
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collSolicitacao" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collSolicitacao">
                    <p><strong>ID: </strong><?= $sol[0]->id_sol ?></p>
                    <p><strong>Nome: </strong><?= $sol[0]->nome_sol ?></p>
                    <p><strong>Solicitante: </strong><?= $us[0]->nome_us ?></p>
                </div>

            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Fichas Técnicas
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
                                    <th>Nome da ficha tecnica</th>
                                    <th>Tempo de teste</th>
                                    <th>Data envio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($fts as $ft) :
                                    ?>
                                    <tr onClick="defineSessao('id_fichaTecnica', '<?= $ft->id_ft ?>', 'lista-fichaTecnica.php')">
                                        <td><?= $ft->id_ft ?></td>
                                        <td><?= $ft->nome_ft ?></td>
                                        <td><?= $ft->tempoTeste_ft ?></td>
                                        <td><?= formataData($ft->dataFinal_ft) ?></td>
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
                    <h3 class="panel-title" data-parent="#panels-all">Parecer do Relator
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collParecer2" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collParecer2">

                    <p><?= $rel[0]->obsRelator_rl ?></p>

                </div>

            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" data-parent="#panels-all">Parecer do Solicitante
                        <a href="#">
                            <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collParecer1" 
                               id="paineis-status"></i>
                        </a>
                    </h3>
                </div>

                <div class="panel-body collapse in" id="collParecer1">

                    <p><?= $rel[0]->obsDesenvolvedor_rl ?></p>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
