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
                <h3 class="panel-title">Digite os novos dados do Usuário</h3>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <div class="table-responsive">
                    <form action="./Controller/UsuarioController.php" method="post" name="cadUsuario">
                        <input type="hidden" name="acao" value="cadastra" >
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th><label>Nome Completo</label></th>
                                <td><input class="form-control" id="nome_us" required="true" name="nome_us" type="text"></td>
                            </tr>
                            <tr>
                                <th><label>Login</label></th>
                                <td><input class="form-control" id="login_us" required="true" name="login_us" type="text"></td>
                            </tr>
                            <tr>
                                <th><label>Senha</label></th>
                                <td><input class="form-control" id="senha_us" required="true" name="senha_us" type="password"></td>
                            </tr>
                            <tr>
                                <th><label>E-mail</label></th>
                                <td><input class="form-control" id="email" required="true" name="email_us" type="email"></td>
                            </tr>
                        </table>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary col-xs-8 col-sm-4 col-md-4 col-lg-4 ">Cadastrar Usuário</button>
                                <button type="reset" class="btn btn-danger col-xs-4 col-sm-4 col-sm-offset-4 col-md-4  col-lg-4">Limpar</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>

