<?php
include("cabecalho.php");

$id = $_GET['id'];

session_start();
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
                <i class="fa fa-list-alt"></i> Projeto
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Filtros
                    <i class="ace-icon fa bigger-125 fa-chevron-down" data-toggle="collapse" data-target="#collFiltros" 
                       id="paineis-status"></i>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collFiltros">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">

                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Informações do Projeto
                    <a href="form-altera-projeto.php?id=<?= $pr->id_prj ?>">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="collapse" data-target="#collProjeto" 
                           id="paineis-status"></i>
                    </a>
                </h3>
            </div>

            <div class="panel-body collapse in" id="collProjeto">
                <?php
                    $projetoDAO = new ProjetoDAO();
                    $projeto = $projetoDAO->listaProjeto($id);
                    foreach ($projeto as $pr) :
                ?>
                    <p><strong>ID: </strong><?= $pr->id_prj ?></p>
                    <p><strong>Nome: </strong><?= $pr->nome_prj ?></p>
                    <p><strong>Descrição: </strong><?= $pr->descricao_prj ?></p>
                    <p><strong>Status: </strong><?= $pr->status_prj ?></p>


                <?php
                    endforeach
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("rodape.php"); ?>
