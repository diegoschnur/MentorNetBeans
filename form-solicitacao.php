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
            <li class="active">
                <i class="fa fa-edit"></i> Nova Solicitação
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os dados da Solicitação</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">

                    <form action="./Controller/SolicitacaoController.php" method="post" name="cadSolicitacao">
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Projeto</label></th>
                                <td>
                                    <?php
                                    $projetoDAO = new ProjetoDAO();
                                    $projetos = $projetoDAO->listaProjetos();
                                    ?>
                                    <select class="form-control" id="idSolicitacao" name="idProjeto_sol" class="input-sm">
                                        <option selected>Selecione um Projeto</option>
                                        <?php
                                        foreach ($projetos as $prj) :

                                            $esseEhOProjeto = $solicitacao->prj->id_prj == $prj->id_prj;
                                            $selecao = $esseEhOProjeto ? "selected='selected'" : "";
                                            ?>

                                            <option value="<?= $prj->id_prj ?>" <?= $selecao ?>><?= $prj->nome_prj ?></option>

                                        <?php
                                        endforeach
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" type="text" id="nome_sol" name="nome_sol"></td>
                            </tr>
                            <tr>
                                <th><label>Data de Abertura</label></th>
                                <td><input class="form-control" type="date" id="dataAbertura_sol" name="dataAbertura_sol"/></td>
                            </tr>
                            <tr>
                                <th><label>Data da Necessidade</label></th>
                                <td><input class="form-control" type="date" id="dataNecessidade_sol" name="dataNecessidade_sol"/></td>
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
                                <td><input class="form-control" type="number" id="tempoTeste_sol" name="tempoTeste_sol" min="0" /></td>
                            </tr>
                            <tr>
                                <th><label>Componentes a Testar</label></th>
                                <td><textarea class="form-control" id="componentesTestar_prj" name="componentesTestar_sol" rows="8" cols="80"></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Metodologia Sugerida</label></th>
                                <td><textarea class="form-control" id="metodologia_prj" name="metodologia_sol" rows="8" cols="80"></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Observações</label></th>
                                <td><textarea class="form-control" id="obs_prj" name="observacoes_sol" rows="5" cols="80"></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Enviar arquivos</label></th>
                                <td>
                                    <input type="hidden" name="max_file_size" value="104857600" />
                                    <div class="dropzone center">
                                        <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i><br>
                                        <span class="bigger-150 grey">Arraste os arquivos até aqui para carregá-los (ou clique)</span>
                                        <div id="dropzone-previews-box" class="dropzone-previews dz-max-files-reached"></div>
                                    </div>
                                    <div class="fallback">
                                        <div class="dz-message" data-dz-message></div>
                                        <input tabindex="14" id="ufile[]" name="ufile[]" type="file" size="60" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Visibilidade</label></th>
                                <td>
                                    <label>
                                        <input class="custom-control-input" type="radio" name="visibilidade_sol"  checked="true" <?= $solicitacao->PR ?> value="PR"/>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Privado</span>
                                    </label>
                                    &#160;&#160;&#160;&#160;
                                    <label>
                                        <input class="custom-control-input" type="radio" name="visibilidade_sol" <?= $solicitacao->PU ?> value="PU"/>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Público</span>
                                    </label>
                                </td>
                            </tr>

                        </table>
                        <div>
                            <button type="submit" class="btn btn-default">Nova Solicitação</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

