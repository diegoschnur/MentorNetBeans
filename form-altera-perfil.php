<?php
include("cabecalho.php");

$id_pf = $_SESSION['id_perfil_visualizado'];
$perfisDAO = new PerfisDAO();
$pf = $perfisDAO->listaPerfil($id_pf);

//echo '<pre>';
//print_r($prj);exit;
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li>
                <i class="fa fa-list-alt"></i> <a href="lista-perfis.php">Lista perfis</a> 
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Perfil
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os novos dados do Usuário</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/PerfisController.php" method="post" name="altPerfil">
                        <input type="hidden" name="acao" value="altera" >
                        <input type="hidden" name="id_pf" value="<?= $pf[0]->id_pf ?>" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome</label></th>
                                <td><input class="form-control" id="nome_pf" required="true"
                                           name="nome_pf" type="text" value="<?= $pf[0]->nome_pf ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Relator</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_relator_us" required="true" name="permissao_relator_us">
                                        <option value="1" <?= ($pf[0]->permissao_relator_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_relator_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Gestor relator</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_Grelator_us" required="true" name="permissao_Grelator_us">
                                        <option value="1" <?= ($pf[0]->permissao_Grelator_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_Grelator_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Desenvolvedor</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_desenvolvedor_us" required="true" name="permissao_desenvolvedor_us">
                                        <option value="1" <?= ($pf[0]->permissao_desenvolvedor_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_desenvolvedor_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Gestor desenvolvedor</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_Gdesenvolvedor_us" required="true" name="permissao_Gdesenvolvedor_us">
                                        <option value="1" <?= ($pf[0]->permissao_Gdesenvolvedor_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_Gdesenvolvedor_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Secretário</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_secretario_us" required="true" name="permissao_secretario_us">
                                        <option value="1" <?= ($pf[0]->permissao_secretario_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_secretario_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Visualizador</label></th>
                                <td>
                                    <select class="form-control input-sm" id="permissao_visualizador_us" required="true" name="permissao_visualizador_us">
                                        <option value="1" <?= ($pf[0]->permissao_visualizador_us == 1 ? 'selected' : '' )?> >Habilitar</option>
                                        <option value="0" <?= ($pf[0]->permissao_visualizador_us == 0 ? 'selected' : '' )?>>Desabilitar</option>
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

                    <form action="./Controller/PerfisController.php" method="post" name="delPerfil">
                        <input type="hidden" name="acao" value="deleta" >
                        <input type="hidden" name="id_pf" value="<?= $pf[0]->id_pf ?>" >
                        <input type="hidden" name="nome_pf" value="<?= $pf[0]->nome_pf ?>" >
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

