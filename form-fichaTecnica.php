<?php
require_once("cabecalho.php");
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Nova Ficha Técnica
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-8">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Digite os dados da Ficha Técnica</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <tr>
                                    <th><label>Nome</label></th>
                                    <td><input class="form-control" type="text" id="nome_ft" name="nome_ft" value=""></td>
                                </tr>
                                <tr>
                                    <th><label>Data de Início</label></th>
                                    <td><input class="form-control" type="date" id="dataInicial_ft" value="" /></td>
                                </tr>
                                <tr>
                                    <th><label>Data de Fim</label></th>
                                    <td><input class="form-control" type="date" id="dataFinal_ft" value="" /></td>
                                </tr>
                                <tr>
                                    <th><label>Tempo de Teste</label></th>
                                    <td><input class="form-control" type="number" id="tempoTeste_ft" name="tempoTeste_ft" min="0" value="" /></td>
                                </tr>
                                <tr>
                                    <th><label>Local do Teste</label></th>
                                    <td><input class="form-control" type="text" id="localTeste_ft" name="localTeste_ft" value=""></td>
                                </tr>
                                <tr>
                                    <th><label>Cliente</label></th>
                                    <td><input class="form-control" type="text" id="cliente_ft" name="cliente_ft" value=""></td>
                                </tr>
                                <tr>
                                    <th><label>Acompanhamento</label></th>
                                    <td><input class="form-control" type="text" id="acompanhamento_ft" name="acompanhamento_ft" value=""></td>
                                </tr>
                                <tr>
                                    <th><label>Componentes Testados</label></th>
                                    <td><textarea class="form-control" id="componentes_ft" name="componentes_ft" rows="8" cols="80"></textarea></td>
                                </tr>
                                <tr>
                                    <th><label>Metodologia Aplicada</label></th>
                                    <td><textarea class="form-control" id="metodologia_ft" name="metodologia_ft" rows="8" cols="80"></textarea></td>
                                </tr>
                                <tr>
                                    <th><label>Observações</label></th>
                                    <td><textarea class="form-control" id="observacoes_ft" name="observacoes_ft" rows="5" cols="80"></textarea></td>
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
                                            <input class="form-control" type="radio" name="visibilidade_ft" value="10" checked />
                                            <span>Privado</span>
                                        </label>
                                        &#160;&#160;&#160;&#160;
                                        <label>
                                            <input class="form-control" type="radio" name="visibilidade_ft" value="10" />
                                            <span>Público</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label>Destaque</label></th>
                                    <td>
                                        <label>
                                            <input class="form-control" type="radio" name="destaque_ft" value="10" checked />
                                            <span>Não</span>
                                        </label>
                                        &#160;&#160;&#160;&#160;
                                        <label>
                                            <input class="form-control" type="radio" name="destaque_ft" value="10" />
                                            <span>Sim</span>
                                        </label>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div>
                            <input tabindex="18" type="submit" class="btn btn-default" value="Criar Solicitação" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
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

