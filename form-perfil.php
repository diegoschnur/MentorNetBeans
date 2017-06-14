<?php
include("cabecalho.php");

?>
    
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> Novo perfil
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os dados do Perfil</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/PerfisController.php" method="post" name="cadPerfil">
                        <input type="hidden" name="acao" value="cadastra" >
                        
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_pf" required="true" name="nome_pf" type="text"></td>
                            </tr>
                            <tr>
                                <th><label>Relator</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_relator_us" required="true" name="permissao_relator_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Gestor relator</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_Grelator_us" required="true" name="permissao_Grelator_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Desenvolvedor</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_desenvolvedor_us" required="true" name="permissao_desenvolvedor_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Gestor desenvolvedor</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_Gdesenvolvedor_us" required="true" name="permissao_Gdesenvolvedor_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Secretário</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_secretario_us" required="true" name="permissao_secretario_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Visualizador</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_visualizador_us" required="true" name="permissao_visualizador_us">
                                        <option value="1">Habilitar</option>
                                        <option value="0">Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Cadastrar Perfil</button>
                            <button type="reset" class="btn btn-danger col-xs-4 col-sm-4 col-sm-offset-4 col-md-4  col-lg-4">Limpar</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

