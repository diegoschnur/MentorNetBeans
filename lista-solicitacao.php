<?php
require_once("cabecalho.php");

$id_sol = $_SESSION['id_solicitacao'];
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($id_sol);

$_SESSION['id_projeto'] = $sol[0]->idProjeto_sol;
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($sol[0]->idProjeto_sol);

$_SESSION['id_usuario'] = $sol[0]->idUsuario_sol;
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($sol[0]->idUsuario_sol);

$fichasTecnicasDAO = new FichaTecnicaDAO();
$fichasTecnicas = $fichasTecnicasDAO->listaFichasTecnicas($id_sol);

$conta_ft = sizeof($fichasTecnicas, 0);

$id_us_logado = $_SESSION['id_us'];
$usuarioPegaPerfil = new UsuarioDAO();
$pegaPerfil = $usuarioPegaPerfil->listaUsuario($id_us_logado);

$relatorioDAO = new RelatorioDAO();
$relatorio = $relatorioDAO->listaRelatorio($id_sol);
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
            <li class="active hidden-xs">
                <i class="fa fa-table"></i> Solicitação
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
                                <a href="#">
                                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collGerais" 
                                       id="paineis-status"></i>
                                </a>
                                <?php
                                if ($pegaPerfil[0]->perfil_us == 1 || $pegaPerfil[0]->perfil_us == 2 || $pegaPerfil[0]->perfil_us == 3 || $pegaPerfil[0]->perfil_us == 4) {
                                     ?>
                                    <a onClick="defineSessao('id_solicitacao', '<?= $sol[0]->id_sol ?>', 'form-altera-solicitacao.php')"> &#160
                                        <i class="ace-icon fa bigger-125 fa-pencil" id="botaoEditar"></i>
                                    </a>
                                    <?php
                                }
                                ?>
                                   
                            </h3>
                        </div>

                        <div class="panel-body collapse in" id="collGerais">

                            <p><strong>ID: </strong><?= $sol[0]->id_sol ?></p>
                            <p><strong>Nome: </strong><?= $sol[0]->nome_sol ?></p>
                            <p><strong>Solicitante: </strong><?= $us[0]->nome_us ?></p>
                            <p><strong>Data Abertura: </strong><?= formataData($sol[0]->dataAbertura_sol) ?></p>
                            <p><strong>Data Necessidade: </strong><?= formataData($sol[0]->dataNecessidade_sol) ?></p>
                            <p><strong>Tempo Solicitado: </strong><?= $sol[0]->tempoTeste_sol ?>  <?= $sol[0]->unidadeMedida_sol ?></p>
                            <p><strong>Tempo Realizado: </strong><?= somaTempo($sol[0]->id_sol) ?>  <?= $sol[0]->unidadeMedida_sol ?></p>
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

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-parent="#panels-all">Fichas Técnicas Associadas <span class="badge"><?php echo $conta_ft ?></span>
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
                                        foreach ($fichasTecnicas as $ft) :
                                            ?>
                                            <tr onClick="defineSessao('id_fichaTecnica', '<?= $ft->id_ft ?>', 'lista-fichaTecnica.php')">
                                                <td><?= $ft->id_ft ?></td>
                                                <td><?= $ft->nome_ft ?></td>
                                                <td><?= formataData($ft->dataInicial_ft) ?></td>
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
                        <h3 class="panel-title" data-parent="#panels-all">Dados do Projeto
                            <a href="#">
                                <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collProjeto" 
                                   id="paineis-status"></i>
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body collapse in" id="collProjeto">

                        <p><strong>ID: </strong><?= $sol[0]->idProjeto_sol ?></p>
                        <p><strong>Nome: </strong><?= $prj[0]->nome_prj ?></p>

                    </div>
                </div>

                <div>

                    <?php
                    //condições para os usuários Gestor Relator e Relator, habilitando e desabilitando o Nova FT
                    if (($pegaPerfil[0]->perfil_us == 4 || $pegaPerfil[0]->perfil_us == 5) && $relatorio[0]->id_usuario_rel == "") {
                        ?>
                        <a href="form-fichaTecnica.php" type="button"
                           class="btn btn-primary col-xs-12 col-lg-12" aria-expanded="false">
                            Nova Ficha Técnica
                        </a>
                        <?php
                    } elseif (isset($relatorio[0]->id_usuario_rel)) {
                        ?>
                        <a href="form-fichaTecnica.php" type="button"
                           class="btn btn-primary col-xs-12 col-lg-12 disabled" aria-expanded="false">
                            Nova Ficha Técnica
                        </a>

                        <?php
                    }
                    ?>

                    <?php
                    // Validar o botão VER RELATÓRIO e AVALIAR
                    //Testa se existe valor no campo id_usuario_sol, se existir, a solicitação ja esta fechada.
                    if (isset($relatorio[0]->id_usuario_sol)) {
                        ?>

                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>
                        <a href="lista-relatorio.php" type="button" 
                           class="btn btn-primary col-xs-12 col-lg-12" aria-expanded="false">
                            Ver relatório
                        </a>
                        <?php
                    } else {
                        ?>

                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>

                        <a href="lista-relatorio.php" type="button" class="btn btn-primary col-xs-12 col-lg-12 disabled" aria-expanded="false">
                            Ver relatório
                        </a>

                        <?php
                    }


                    //Validações do botão avaliar
                    if (isset($relatorio[0]->id_usuario_rel) && (!isset($relatorio[0]->id_usuario_sol)) && ($pegaPerfil[0]->perfil_us == 2 || $pegaPerfil[0]->perfil_us == 3)) {
                        ?>
                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>
                        <button type="button" class="btn btn-primary col-xs-12 col-lg-12"
                                data-toggle="modal" data-target="#myModal">Avaliar
                        </button>
                        <?php
                    } elseif (!isset($relatorio[0]->id_usuario_rel) && ($pegaPerfil[0]->perfil_us == 2 || $pegaPerfil[0]->perfil_us == 3)) {
                        ?>
                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>
                        <button type="button" class="btn btn-primary col-xs-12 col-lg-12" disabled="true" title="Aguardando testes!"
                                data-toggle="modal" data-target="#myModal">Avaliar
                        </button>
                        <?php
                    } elseif (isset($relatorio[0]->id_usuario_rel) && ($pegaPerfil[0]->perfil_us == 4 || $pegaPerfil[0]->perfil_us == 5)) {
                        ?>
                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>
                        <button type="button" class="btn btn-primary col-xs-12 col-lg-12" disabled="true" title="Já avaliado!"
                                data-toggle="modal" data-target="#myModal">Avaliar
                        </button>
                        <?php
                    } elseif (!isset($relatorio[0]->id_usuario_rel) && ($pegaPerfil[0]->perfil_us == 4 || $pegaPerfil[0]->perfil_us == 5)) {
                        ?>
                        <div class="col-xs-12 col-lg-12" aria-expanded="false"></div>
                        <button type="button" class="btn btn-primary col-xs-12 col-lg-12"
                                data-toggle="modal" data-target="#myModal">Avaliar
                        </button>
                        <?php
                    }
                    ?>

                </div>
            </div>


            <div class="row">

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Aprovação da Solicitação</h4>
                            </div>
                            <form action="./Controller/RelatorioController.php" method="post" name="cadRelatorio">
                                <input type="hidden" name="acao" value="cadastra" >
                                <input type="hidden" name="id_sol" value="<?= $sol[0]->id_sol ?>" >

                                <?php
                                if (($pegaPerfil[0]->perfil_us == 4) || ($pegaPerfil[0]->perfil_us == 5)) {
                                    ?>

                                    <div class="modal-body">
                                        <textarea class="form-control" id="obsRelator_rl" name="obsRelator_rl" required="required" 
                                                  rows="6" cols="60" placeholder="Descreva aqui o seu parecer!"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <label>
                                            <input class="custom-control-input" type="radio" name="statusRelator_rl"  checked="true" <?= $relatorio->Aprovado ?> value="Aprovado" />
                                            <span class="custom-control-description">Aprovado</span>
                                        </label>
                                        &#160;&#160;&#160;&#160;
                                        <label>
                                            <input class="custom-control-input" type="radio" name="statusRelator_rl" <?= $relatorio->Reprovado ?> value="Reprovado" />
                                            <span class="custom-control-description">Reprovado</span>
                                        </label>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>

                                    <?php
                                } else {
                                    ?>

                                    <div class="modal-body">
                                        <textarea class="form-control" id="obsDesenvolvedor_rl" name="obsDesenvolvedor_rl" required="required" 
                                                  rows="6" cols="60" placeholder="Descreva aqui o seu parecer!"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <label>
                                            <input class="custom-control-input" type="radio" name="statusDesenvolvedor_rl"  checked="true" <?= $relatorio->Aprovado ?> value="Aprovado" />
                                            <span class="custom-control-description">Aprovado</span>
                                        </label>
                                        &#160;&#160;&#160;&#160;
                                        <label>
                                            <input class="custom-control-input" type="radio" name="statusDesenvolvedor_rl" <?= $relatorio->Reprovado ?> value="Reprovado" />
                                            <span class="custom-control-description">Reprovado</span>
                                        </label>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>

                                    <?php
                                }
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>