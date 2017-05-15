<?php

class FichaTecnicaDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereFichaTecnica($fichaTecnica) {
        
        //print_r($fichaTecnica);        exit();
        try {
            $status = $this->connection->prepare(""
                    . "INSERT INTO tbl_fichastecnicas (nome_ft,dataInicial_ft,dataFinal_ft,"
                    . "tempoTeste_ft,localTeste_ft,cliente_ft,acompanhamento_ft,componentes_ft,"
                    . "metodologia_ft,observacoes_ft,visibilidade_ft,destaque_ft,status_ft,"
                    . "id_solicitacao_ft,id_usuario_ft) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

            $status->bindValue(1, $fichaTecnica->nome_ft);
            $status->bindValue(2, $fichaTecnica->dataInicial_ft);
            $status->bindValue(3, $fichaTecnica->dataFinal_ft);
            $status->bindValue(4, $fichaTecnica->tempoTeste_ft);
            $status->bindValue(5, $fichaTecnica->localTeste_ft);
            $status->bindValue(6, $fichaTecnica->cliente_ft);
            $status->bindValue(7, $fichaTecnica->acompanhamento_ft);
            $status->bindValue(8, $fichaTecnica->componentes_ft);
            $status->bindValue(9, $fichaTecnica->metodologia_ft);
            $status->bindValue(10, $fichaTecnica->observacoes_ft);
            $status->bindValue(11, $fichaTecnica->visibilidade_ft);
            $status->bindValue(12, $fichaTecnica->destaque_ft);
            $status->bindValue(13, $fichaTecnica->status_ft);
            $status->bindValue(14, $fichaTecnica->id_solicitacao_ft);
            $status->bindValue(15, $fichaTecnica->id_suario_ft);
           
            $status->execute();

            //Encerra a conexão
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir uma nova ficha técnica!" . $exc;
        }
    }

    public function listaFichasTecnicas($id_sol) {
        try {
            $SQLListaFts = "select * from tbl_fichastecnicas where id_solicitacao_ft = ? ";
            $status = $this->connection->prepare($SQLListaFts);
            $status->bindValue(1, $id_sol);
            $status->execute();
            $fichasTecnicas = $status->fetchAll(PDO::FETCH_CLASS, 'FichaTecnicaDAO');

            $this->connection = null;

            return $fichasTecnicas;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar as fichas técnicas!' . $exc;
        }
    }
    
    public function listaFichaTecnica($id_ft) {
        try {
            
            $SQLListaFt = "select * from tbl_fichastecnicas where id_ft = 1";
            $status = $this->connection->prepare($SQLListaFt);
            
            $status->bindValue(1, $id_ft, PDO::PARAM_INT);
            $status->execute();
            
            $fichaTecnica = $status->fetchAll(PDO::FETCH_CLASS);
            $this->connection = null;

            return $fichaTecnica;
            
        } catch (PDOException $exc) {
            echo 'Ocorreu um erro ao pesquisar a ficha técnica!' . $exc;
        }
    }

    public function deletaFichaTecnica($param) {
        try {
            $status = $this->connection->prepare("delete from tbl_fichastecnicas where id = ?");
            $status->bindValue(1, $id_ft);
            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao deletar a ficha técnica! <br>$exc";
        }
    }

}
