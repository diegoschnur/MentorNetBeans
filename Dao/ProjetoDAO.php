<?php

class ProjetoDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereProjeto($projeto) {
        try {
            $status = $this->connection->prepare(""
                    . "INSERT INTO tbl_projetos (nome_prj,descricao_prj,status_prj)VALUES (?,?,'I');");

            $status->bindValue(1, $projeto->nome_prj);
            $status->bindValue(2, $projeto->descricao_prj);
           // print_r($status);exit;
            $status->execute();

            //Encerra a conexão
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir um novo projeto!" . $exc;
        }
    }

    public function listaProjetos() {
        try {

            $status = $this->connection->prepare("select * from tbl_projetos");
            $status->execute();
            $projetos = $status->fetchAll(PDO::FETCH_CLASS, 'ProjetoDAO');

            $this->connection = null;

            return $projetos;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar os projetos!' . $exc;
        }
    }

    public function deletaProjeto($param) {
        try {
            $status = $this->connection->prepare("delete from tbl_projetos where id = ?");
            $status->bindValue(1, $id);
            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao deletar o projeto! <br>$exc";
        }
    }

}
