<?php
include("cabecalho.php");

$id_prj = $_SESSION['id_projeto'];
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($id_prj);

$_SESSION['id_usuario'] = $prj[0]->id_usuario_prj;
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($prj[0]->id_usuario_prj);

$id_us_logado = $_SESSION['id_us'];
$usuarioPegaPerfil = new UsuarioDAO();
$pegaPerfil = $usuarioPegaPerfil->listaUsuario($id_us_logado);

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  <a href="minhavisao.php">Minha Visão</a>
            </li>
            <li>
                <i class="fa fa-list-alt"></i> <a href="lista-projetos.php">Projetos</a> 
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Projeto
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Informações do Projeto
                    <?php
                    if (($pegaPerfil[0]->perfil_us == 1) || ($pegaPerfil[0]->perfil_us == 2) || ($pegaPerfil[0]->perfil_us == 3)) {
                        
                        ?>
                        <a onClick="defineSessao('id_projeto', '<?= $prj[0]->id_prj ?>', 'form-altera-projeto.php')">
                            <i class="ace-icon fa bigger-125 fa-pencil" id="paineis-status"></i>
                        </a>
                        <?php
                    }
                    ?>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collProjeto">

                <p><strong>ID: </strong><?= $prj[0]->id_prj ?></p>
                <p><strong>Nome: </strong><?= $prj[0]->nome_prj ?></p>
                <p><strong>Descrição: </strong><?= $prj[0]->descricao_prj ?></p>
                <p><strong>Status: </strong><?= $prj[0]->status_prj ?></p>
                <p><strong>Usuário: </strong><?= $us[0]->nome_us ?></p>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
