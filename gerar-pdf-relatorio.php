<?php

session_start();
include './Persistence/ConnectionDB.php';
include './Dao/ProjetoDAO.php';
include './Dao/SolicitacaoDAO.php';
include './Dao/FichaTecnicaDAO.php';
include './Dao/UsuarioDAO.php';
include './Dao/RelatorioDAO.php';
include './Include/funcoes.php';
include ('./pdf/mpdf60/mpdf.php');


$id_prj = $_SESSION['id_projeto'];
$projetoDAO = new ProjetoDAO();
$prj = $projetoDAO->listaProjeto($id_prj);

$id_sol = $_SESSION['id_solicitacao'];
$solicitacaoDAO = new SolicitacaoDAO();
$sol = $solicitacaoDAO->listaSolicitacao($id_sol);

$fichasTecnicasDAO = new FichaTecnicaDAO();
$fts = $fichasTecnicasDAO->listaFichasTecnicas($id_sol);

$_SESSION['id_usuario'] = $prj[0]->id_usuario_prj;
$usuarioDAO = new UsuarioDAO();
$us = $usuarioDAO->listaUsuario($sol[0]->idUsuario_sol);

$id_rl = $_SESSION['id_solicitacao'];
$relatorioDAO = new RelatorioDAO();
$rel = $relatorioDAO->listaRelatorio($id_rl);

$pagina = '
<div>
<div>
<div class="panel-group" id="panels-all">
            <div>
                <h3>RELATÓRIO DE FINALIZAÇÃO</h3>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Informações Gerais</h3>
                </div>
                <div class="panel-body">
                    <p><strong>Data de Abertura: </strong>' . formataData($sol[0]->dataAbertura_sol) . '</p>
                    <p><strong>Data Prevista: </strong>' . formataData($sol[0]->dataNecessidade_sol) . '</p>
                    <p><strong>Data de Finalização: </strong>' . formataData($rel[0]->dataEncerramento_rl) . '</p>
                    <p><strong>Tempo Solicitado: </strong>' . $sol[0]->tempoTeste_sol . ' ' . $sol[0]->unidadeMedida_sol . '</p> 
                    <p><strong>Tempo Realizado: </strong>' . somaTempo($sol[0]->id_sol) . ' ' . $sol[0]->unidadeMedida_sol . '</p> 
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Projeto</h3>
                </div>
                <div class="panel-body">
                    <p><strong>ID: </strong>' . $prj[0]->id_prj . '</p>
                    <p><strong>Nome: </strong>' . $prj[0]->nome_prj . '</p>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Solicitação</h3>
                </div>
                <div class="panel-body">
                    <p><strong>ID: </strong>' . $sol[0]->id_sol . '</p>
                    <p><strong>Nome: </strong>' . $sol[0]->nome_sol . '</p>
                    <p><strong>Solicitante: </strong>' . $us[0]->nome_us . '</p>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Fichas Técnicas</h3>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome da ficha tecnica</th>
                                    <th>Tempo de teste</th>
                                    <th>Data envio</th>
                                </tr>
                            </thead>
                            <tbody>';
                                foreach ($fts as $ft) {
                                    $pagina .= '
                                    <tr>
                                        <td>' . $ft->id_ft . '</td>
                                        <td>' . $ft->nome_ft . '</td>
                                        <td>' . $ft->tempoTeste_ft . '</td>
                                        <td>' . formataData($ft->dataFinal_ft) . '</td>
                                    </tr> ';
                                }
                                $pagina .= '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div>
                    <h3>Parecer do Relator</h3>
                    <p>' . $rel[0]->obsRelator_rl . '</p>
                    <h3>Parecer do Solicitante</h3>
                    <p>' . $rel[0]->obsDesenvolvedor_rl . '</p>
            </div>
            <h3>Assinatura</h3>
            <p>' . $us[0]->nome_us . ' ___________________________  Data: ____/____/______</p>
        </div>
    <div>
<div>';

$mpdf = new mPDF('c', 'A4');
$mpdf->writeHTML($pagina);

$mpdf->Output('relatorio.pdf', 'I');
?>