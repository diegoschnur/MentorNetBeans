<?php

class FichaTecnicaDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereFichaTecnica($FichaTecnica) {
        try {
            $status = $this->connection->prepare(""
                    . "INSERT INTO tbl_fichastecnicas (nome_ft,dataInicial_ft,dataFinal_ft,"
                    . "tempoTeste_ft,localTeste_ft,cliente_ft,acompanhamento_ft,componentes_ft,"
                    . "metodologia_ft,observacoes_ft,visibilidade_ft,destaque_ft,status_ft,"
                    . "id_solicitacao_ft,id_usuario_ft) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

            $status->bindValue(1, $FichaTecnica->nome_ft);
            $status->bindValue(2, $FichaTecnica->dataInicial_ft);
            $status->bindValue(3, $FichaTecnica->dataFinal_ft);
            $status->bindValue(4, $FichaTecnica->tempoTeste_ft);
            $status->bindValue(5, $FichaTecnica->localTeste_ft);
            $status->bindValue(6, $FichaTecnica->cliente_ft);
            $status->bindValue(7, $FichaTecnica->acompanhamento_ft);
            $status->bindValue(8, $FichaTecnica->componentes_ft);
            $status->bindValue(9, $FichaTecnica->metodologia_ft);
            $status->bindValue(10, $FichaTecnica->observacoes_ft);
            $status->bindValue(11, $FichaTecnica->visibilidade_ft);
            $status->bindValue(12, $FichaTecnica->destaque_ft);
            $status->bindValue(13, $FichaTecnica->status_ft);
            $status->bindValue(14, $FichaTecnica->id_solicitacao_ft);
            $status->bindValue(15, $FichaTecnica->id_suario_ft);
           
            $status->execute();

            //Encerra a conexão
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir uma nova ficha técnica!" . $exc;
        }
    }

    public function listaFichasTecnicas() {
        try {

            $status = $this->connection->prepare("select * from tbl_fichatecnica");
            $status->execute();
            $FichasTecnicas = $status->fetchAll(PDO::FETCH_CLASS, 'FichaTecnicaDAO');

            $this->connection = null;

            return $FichasTecnicas;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar as fichas técnicas!' . $exc;
        }
    }

    public function deletaFichaTecnica($param) {
        try {
            $status = $this->connection->prepare("delete from tbl_fichatecnica where id = ?");
            $status->bindValue(1, $id_ft);
            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao deletar a ficha técnica! <br>$exc";
        }
    }

}
