<?php
include("cabecalho.php");

$id_prj = $_SESSION['id_projeto'];
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($id_prj);

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="hidden-xs">
                <i class="fa fa-list-alt"></i>  <a href="lista-projetos.php">Projetos</a>
            </li>
            <li>
                <i class="fa fa-table"></i>  <a href="lista-projeto.php">Projeto</a>
            </li>
            <li class="active hidden-xs">
                <i class="fa fa-edit"></i> Altera Projeto
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os novos dados do Projeto</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/ProjetoController.php" method="post" name="altProjeto">
                        <input type="hidden" name="acao" value="altera" >
                        <input type="hidden" name="id_prj" value="<?= $prj[0]->id_prj ?>" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_prj" 
                                           name="nome_prj" type="text" value="<?= $prj[0]->nome_prj ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Descrição</label></th>
                                <td>
                                    <textarea class="form-control" id="descricao_prj" name="descricao_prj" 
                                              rows="8" cols="80"><?= $prj[0]->descricao_prj ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Status</label></th>
                                <td>
                                    <select class="form-control" id="status_prj" name="status_prj" class="input-sm">
                                        <option selected><?= $prj[0]->status_prj ?></option>
                                        <option value="Ativo" >Ativar</option>
                                        <option value="Cancelado" >Cancelar</option>
                                        <option value="Inativo" >Inativar</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Atualizar</button>
                            </div>

                        </div>

                    </form>
                    
                    <form action="./Controller/ProjetoController.php" method="post" name="delProjeto">
                        <input type="hidden" name="acao" value="deleta" >
                        <input type="hidden" name="id_prj" value="<?= $prj[0]->id_prj ?>" >
                        <input type="hidden" name="nome_prj" value="<?= $prj[0]->nome_prj ?>" >
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

<?php include("rodape.php"); 
?>

