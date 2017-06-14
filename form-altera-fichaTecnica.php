<?php
require_once("cabecalho.php");

$id_ft = $_SESSION['id_fichaTecnica'];
$fichaTecnicaDAO = new FichaTecnicaDAO();
$ft = $fichaTecnicaDAO->listaFichaTecnica($id_ft);

$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($ft[0]->id_solicitacao_ft);

//echo '<pre>';
//print_r($ft);exit;
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
            <li class="hidden-xs">
                <i class="fa fa-table"></i>  <a href="lista-solicitacao.php">Solicitação</a>
            </li>
            <li>
                <i class="fa fa-table"></i>  <a href="lista-fichaTecnica.php">Ficha Técnica</a>
            </li>
            <li class="active hidden-xs">
                <i class="fa fa-edit"></i> Altera Ficha Técnica
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-8">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Digite os novos dados da Ficha Técnica</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Table -->
                        <div class="table-responsive">

                            <form action="./Controller/FichaTecnicaController.php" method="post" name="altFichaTecnica">
                                <input type="hidden" name="acao" value="altera" >
                                <input type="hidden" name="id_ft" value="<?= $ft[0]->id_ft ?>" >
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <th><label>Número</label></th>
                                        <td><input class="form-control" disabled="true" type="text" id="id_ft" name="nome_ft" 
                                                   value="<?= $ft[0]->id_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Nome</label></th>
                                        <td><input class="form-control" type="text" id="nome_ft" name="nome_ft" 
                                                   value="<?= $ft[0]->nome_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Status</label></th>
                                        <td><input class="form-control" type="text" id="status_ft" name="status_ft" 
                                                   value="<?= $ft[0]->status_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Data de Fim</label></th>
                                        <td><input class="form-control" type="date" id="dataFinal_ft" name="dataFinal_ft"
                                                   value="<?= $ft[0]->dataFinal_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Tempo de Teste</label></th>
                                        <td><input class="form-control" type="number" id="tempoTeste_ft" name="tempoTeste_ft" min="0" 
                                                   value="<?= $ft[0]->tempoTeste_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Local do Teste</label></th>
                                        <td><input class="form-control" type="text" id="localTeste_ft" name="localTeste_ft"
                                                   value="<?= $ft[0]->localTeste_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Cliente</label></th>
                                        <td><input class="form-control" type="text" id="cliente_ft" name="cliente_ft"
                                                   value="<?= $ft[0]->cliente_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Acompanhamento</label></th>
                                        <td><input class="form-control" type="text" id="acompanhamento_ft" name="acompanhamento_ft"
                                                   value="<?= $ft[0]->acompanhamento_ft ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Componentes</label></th>
                                        <td><textarea class="form-control" id="componentes_ft" name="componentes_ft" 
                                                      rows="6" cols="80"><?= $ft[0]->componentes_ft ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <th><label>Metodologia</label></th>
                                        <td><textarea class="form-control" id="metodologia_ft" name="metodologia_ft" 
                                                      rows="6" cols="80"><?= $ft[0]->metodologia_ft ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <th><label>Comportamento</label></th>
                                        <td><textarea class="form-control" id="comportamento_ft" name="comportamento_ft" 
                                                      rows="10" cols="80"><?= $ft[0]->comportamento_ft ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <th><label>Observações</label></th>
                                        <td><textarea class="form-control" id="observacoes_ft" name="observacoes_ft" 
                                                      rows="5" cols="80"><?= $ft[0]->observacoes_ft ?></textarea></td>
                                    </tr>
<!--                                    <tr>
                                        <th><label>Enviar arquivos</label></th>
                                        <td>
                                            <input type="hidden" name="max_file_size" value="104857600" >
                                            <div class="dropzone center">
                                                <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i><br>
                                                <span class="bigger-150 grey">Arraste os arquivos até aqui para carregá-los (ou clique)</span>
                                                <div id="dropzone-previews-box" class="dropzone-previews dz-max-files-reached"></div>
                                            </div>
                                            <div class="fallback">
                                                <div class="dz-message" data-dz-message></div>
                                                <input tabindex="14" id="ufile[]" name="ufile[]" type="file" size="60" >
                                            </div>
                                        </td>
                                    </tr>-->
                                    <tr>
                                        <th><label>Visibilidade</label></th>
                                        <td>
                                            <label>
                                                <input class="custom-control-input" type="radio" name="visibilidade_ft"  checked="true" <?= $FichaTecnica->PR ?> value="PR">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Privado</span>
                                            </label>
                                            &#160;&#160;&#160;&#160;
                                            <label>
                                                <input class="custom-control-input" type="radio" name="visibilidade_ft" <?= $FichaTecnica->PU ?> value="PU">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Público</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label>Destaque</label></th>
                                        <td>
                                            <label>
                                                <input class="custom-control-input" type="radio" name="destaque_ft"  checked="true" <?= $FichaTecnica->Sim ?> value="S">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Sim</span>
                                            </label>
                                            &#160;&#160;&#160;&#160;
                                            <label>
                                                <input class="custom-control-input" type="radio" name="destaque_ft" <?= $FichaTecnica->Não ?> value="N">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Não</span>
                                            </label>
                                        </td>
                                    </tr>

                                </table>

                                <div>
                                    <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Atualizar Ficha Técnica</button>
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

            <div class="col-lg-4">
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
                        <p><strong>ID: </strong><?= $ft[0]->id_solicitacao_ft ?></p>
                        <p><strong>Nome: </strong><?= $sol[0]->nome_sol ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

