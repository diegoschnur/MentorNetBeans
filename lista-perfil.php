<?php
require_once("cabecalho.php");

session_start();

$id_pf = $_SESSION['id_perfil_visualizado'];
$perfisDAO = new PerfisDAO();
$pf = $perfisDAO->listaPerfil($id_pf);
//print_r($pf);exit;
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
                <h3 class="panel-title">Informações do Perfil
                    <?php
                    if ($pegaPerfil == 1) {
                        ?>
                        <a onclick="defineSessao('id_pf', '', 'form-perfil.php')">
                            <i class="ace-icon fa bigger-125 fa-plus-circle" id="paineis-status"></i>
                        </a>
                        <?php
                    }
                    ?>

                </h3>
            </div>

            <div class="panel-body collapse in" id="collProjeto">

                <p><strong>ID: </strong><?= $pf[0]->id_pf ?></p>
                <p><strong>Nome: </strong><?= $pf[0]->nome_pf ?></p>
                <p><strong>Relator: </strong><?= ( $pf[0]->permissao_relator_us == 1 ? 'Sim' : 'Não'); ?></p>
                <p><strong>Gestor relator: </strong><?= ( $pf[0]->permissao_Grelator_us == 1 ? 'Sim' : 'Não'); ?></p>
                <p><strong>Desenvolvedor: </strong><?= ( $pf[0]->permissao_desenvolvedor_us == 1 ? 'Sim' : 'Não'); ?></p>
                <p><strong>Gestor desenvolvedor: </strong><?= ( $pf[0]->permissao_Gdesenvolvedor_us == 1 ? 'Sim' : 'Não'); ?></p>
                <p><strong>Secretário: </strong><?= ( $pf[0]->permissao_secretario_us == 1 ? 'Sim' : 'Não'); ?></p>
                <p><strong>Visualizador: </strong><?= ( $pf[0]->permissao_visualizador_us == 1 ? 'Sim' : 'Não'); ?></p>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
