<?php
require_once("cabecalho.php");

$id_sol = $_SESSION['id_solicitacao'];
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($id_sol);

$projetosDAO = new ProjetoDAO();
$projetos = $projetosDAO->listaProjetos();

$projetoDAO = new ProjetoDAO();
$projeto = $projetoDAO->listaProjeto($sol[0]->idProjeto_sol);

//echo '<pre>';
//print_r($projeto);
//print_r($sol);
//die();
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
                <i class="fa fa-table"></i>  <a href="lista-solicitacao.php">Solicitação</a>
            </li>
            <li class="active hidden-xs">
                <i class="fa fa-edit"></i> Altera Solicitação
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os novos dados da Solicitação</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/SolicitacaoController.php" method="post" name="altSolicitacao">
                        <input type="hidden" name="acao" value="altera" >
                        <input type="hidden" name="id_sol" value="<?= $sol[0]->id_sol ?>" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Projeto</label></th>
                                <td>
                                    
                                    <select class="form-control" id="idProjeto_sol" name="idProjeto_sol" class="input-sm">
                                        <option value="<?= $projeto[0]->id_prj ?>"><?= $projeto[0]->nome_prj ?></option>
                                        <?php
                                        foreach ($projetos as $prj) {
                                            ?>
                                        <option value="<?= $prj->id_prj ?>"><?= $prj->nome_prj ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    
                                </td>
                            </tr>
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" type="text" id="nome_sol" name="nome_sol" required="required" value="<?= $sol[0]->nome_sol ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Data da Necessidade</label></th>
                                <td><input class="form-control" type="date" id="dataNecessidade_sol" name="dataNecessidade_sol" value="<?= $sol[0]->dataNecessidade_sol ?>"/></td>
                            </tr>
                            <tr>
                                <th><label>Unidade de Medida</label></th>
                                <td>
                                    <label>
                                        <input class="custom-control-input" type="radio" name="unidadeMedida_sol"  checked="true" <?= $solicitacao->HA ?> value="HA" />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Hectares</span>
                                    </label>
                                    &#160;&#160;&#160;&#160;
                                    <label>
                                        <input class="custom-control-input" type="radio" name="unidadeMedida_sol" <?= $solicitacao->HR ?> value="HR" />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Horas</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Tempo de Teste</label></th>
                                <td><input class="form-control" type="number" id="tempoTeste_sol" name="tempoTeste_sol" min="0" max="100000" value="<?= $sol[0]->tempoTeste_sol ?>"/></td>
                            </tr>
                            <tr>
                                <th><label>Componentes a Testar</label></th>
                                <td><textarea class="form-control" id="componentesTestar_sol" name="componentesTestar_sol" rows="8" cols="80"><?= $sol[0]->componentesTestar_sol ?></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Metodologia Sugerida</label></th>
                                <td><textarea class="form-control" id="metodologia_sol" name="metodologia_sol" rows="8" cols="80"><?= $sol[0]->metodologia_sol ?></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Observações</label></th>
                                <td><textarea class="form-control" id="observacoes_sol" name="observacoes_sol" rows="5" cols="80"><?= $sol[0]->observacoes_sol ?></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Visibilidade</label></th>
                                <td>
                                    <label>
                                        <input class="custom-control-input" type="radio" name="visibilidade_sol"  checked="true" <?= $solicitacao->Privado ?> value="Privado"/>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Privado</span>
                                    </label>
                                    &#160;&#160;&#160;&#160;
                                    <label>
                                        <input class="custom-control-input" type="radio" name="visibilidade_sol" <?= $solicitacao->Publico ?> value="Publico"/>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Público</span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <th><label>Status</label></th>
                                <td>
                                    <select class="form-control" id="status_sol" name="status_sol" class="input-sm">
                                        <option selected><?= $sol[0]->status_sol ?></option>
                                        <option value="Ativa" >Ativar</option>
                                        <option value="Cancelada" >Cancelar</option>
                                        <option value="Inativa" >Inativar</option>
                                        <option value="Nova" >Nova</option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                        <div>
                            <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Atualizar</button>
                        </div>
                    </form>
                    
                    <form action="./Controller/SolicitacaoController.php" method="post" name="delSolicitacao">
                        <input type="hidden" name="acao" value="deleta" >
                        <input type="hidden" name="id_sol" value="<?= $sol[0]->id_sol ?>" >
                        <input type="hidden" name="nome_sol" value="<?= $sol[0]->nome_sol ?>" >
                        <div>
                            <button type="submit" class="btn btn-danger col-xs-4 col-sm-4 col-sm-offset-4 col-md-4 col-lg-4">Deletar</button>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>