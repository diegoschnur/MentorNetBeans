<?php
include("cabecalho.php");

$id_us = $_SESSION['id_usuario'];
$usuarioDAO = new UsuarioDAO;
$us = $usuarioDAO->listaUsuario($id_us);

$perfisDao = new PerfisDAO();
$perfis = $perfisDao->listaPerfis();

$perfilDao = new PerfisDAO();
$perfil = $perfilDao->listaPerfil($us[0]->perfil_us);

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li class="hidden-xs">
                <i class="fa fa-list-alt"></i>  <a href="lista-usuarios.php">Usuários</a>
            </li>
            <li class="active hidden-xs">
                <i class="fa fa-edit"></i> Usuário
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Digite os novos dados do Usuário
                </h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/UsuarioController.php" method="post" name="altUsuario">
                        <input type="hidden" name="acao" value="altera" >
                        <input type="hidden" name="id_us" value="<?= $us[0]->id_us ?>" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome Completo</label></th>
                                <td><input class="form-control" id="nome_us" required="true" name="nome_us" type="text" value="<?= $us[0]->nome_us ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Login</label></th>
                                <td><input class="form-control" id="login_us" required="true" name="login_us" type="text" value="<?= $us[0]->login_us ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Senha</label></th>
                                <td><input class="form-control" id="senha_us" name="senha_us" type="password" value=""></td>
                            </tr>
                            <tr>
                                <th><label>E-mail</label></th>
                                <td><input class="form-control" id="email_us" required="true" name="email_us" type="email" value="<?= $us[0]->email_us ?>"></td>
                            </tr>

                            <?php
                            if ($pegaPerfil == 2 || ($pegaPerfil == 4) || ($pegaPerfil == 1)) {
                                ?>
                                <tr>
                                <th><label>Perfil</label></th>
                                <td>
                                    <select class="form-control" id="perfil_us" name="perfil_us" class="input-sm">
                                        <option value="<?= $perfil[0]->id_pf ?>"><?= $perfil[0]->nome_pf ?></option>
                                        <?php
                                        foreach ($perfis as $pf) {
                                            ?>
                                            <option value="<?= $pf->id_pf ?>"><?= $pf->nome_pf ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Status</label></th>
                                <td>
                                    <select class="form-control" id="status_us" name="status_us" class="input-sm">
                                        <option selected><?= $us[0]->status_us ?></option>
                                        <option value="Ativo" >Ativar</option>
                                        <option value="Inativo" >Inativar</option>
                                    </select>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                            
                        </table>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Atualizar</button>
                            </div>

                        </div>

                    </form>

                    <form action="./Controller/UsuarioController.php" method="post" name="delUsuario">
                        <input type="hidden" name="acao" value="deleta" >
                        <input type="hidden" name="id_us" value="<?= $us[0]->id_us ?>" >
                        <input type="hidden" name="nome_us" value="<?= $us[0]->nome_us ?>" >
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

