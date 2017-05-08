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
                <i class="fa fa-edit"></i> Altera Projeto
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os novos dados do Projeto</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/ProjetoController.php" method="post" name="cadProjeto">
                        <input type="hidden" name="id_prj" value="<?=$projeto['id_prj']?>" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_prj" name="nome_prj" type="text" 
                                           value="<?=$projeto['nome_prj'] ?>"> </td>
                            </tr>
                            <tr>
                                <th><label>Descrição</label></th>
                                <td><textarea class="form-control" id="descricao_prj" name="descricao_prj" rows="8" cols="80"
                                            value="<?=$projeto['descricao_prj'] ?>"></textarea></td>
                            </tr>
                            <tr>
                                <th><label>Status</label></th>
                                <td>
                                    <select class="form-control" id="idProjeto_sol" name="idProjeto_sol" class="input-sm">
                                        <option selected>Selecione o Status</option>
                                        <option value="A" >Ativar</option>
                                        <option value="C" >Cancelar</option>
                                        <option value="I" >Inativar</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-default">Atualizar Projeto</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

