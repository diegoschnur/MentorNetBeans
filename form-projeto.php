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
                <i class="fa fa-edit"></i> Novo Projeto
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os dados do Projeto</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/ProjetoController.php" method="post" name="cadProjeto">
                        <input type="hidden" name="acao" value="cadastra" >
                        
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_prj" name="nome_prj" type="text" required="required"></td>
                            </tr>
                            <tr>
                                <th><label>Descrição</label></th>
                                <td><textarea class="form-control" id="descricao_prj" name="descricao_prj" required="required" rows="8" cols="80"></textarea></td>
                            </tr>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Cadastrar Projeto</button>
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

