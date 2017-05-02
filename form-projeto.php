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
                <i class="fa fa-edit"></i> Novo Projeto
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link">Projeto cadastrado com sucesso!</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os dados do Projeto</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/ProjetoController.php" method="post" name="cadProjeto">
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_prj" name="nome_prj" type="text"></td>
                            </tr>
                            <tr>
                                <th><label>Descrição</label></th>
                                <td><textarea class="form-control" id="desc_prj" name="descricao_prj" rows="8" cols="80"></textarea></td>
                            </tr>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-default">Criar Projeto</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

