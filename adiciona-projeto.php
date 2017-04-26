<?php 
require_once("cabecalho.php");
require_once("./Model/Projeto.php");


$projeto = new Projeto($nome_prj, $descricao_prj, $status_prj);

if(insereProjeto($conexao, $projeto)) { ?>
	<p class="text-success">O Projeto <?= $projeto->getNome() ?> foi adicionado.</p>
<?php 
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O projeto <?= $projeto->getNome() ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>