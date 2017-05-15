<?php

class ProjetoDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereProjeto($projeto) {
        try {
            $QRCreate = "INSERT INTO tbl_projetos (nome_prj,descricao_prj,status_prj,id_usuario_prj)VALUES (?,?,?,?);";
            $create = $this->connection->prepare($QRCreate);

            $create->bindValue(1, $projeto->nome_prj, PDO::PARAM_STR);
            $create->bindValue(2, $projeto->descricao_prj, PDO::PARAM_STR);
            $create->bindValue(3, $projeto->status_prj, PDO::PARAM_STR);
            $create->bindValue(4, $projeto->id_usuario_prj, PDO::PARAM_INT);
           
            $create->execute();
            
            //Encerra a conexão
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir um novo projeto!" . $exc->getMessage();
        }
    }

    public function listaProjetos() {
        try {
            
            $QRList = "SELECT * from tbl_projetos";
            $list = $this->connection->prepare($QRList);
            
            $list->execute();
            
            //echo '<pre>';
            if($list->rowCount() > 0){
                $projetos = $list->fetchAll(PDO::FETCH_CLASS, 'ProjetoDAO');
                //print_r($projetos);exit;
                $this->connection = null;
                return $projetos;    
            }
            
            return [];
            
            
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar os projetos!' . $exc;
        }
    }

    public function listaProjeto($id_prj) {
        try {
            
            $QRList = "select * from tbl_projetos where id_prj = ?";
            $status = $this->connection->prepare($QRList);    
            
            $status->bindValue(1, $id_prj, PDO::PARAM_INT);
            $status->execute();
            
            $projeto = $status->fetchAll(PDO::FETCH_CLASS);

            $this->connection = null;
            return $projeto;
            
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar os projetos!' . $exc;
        }
    }
    
    public function atualizaProjeto(ProjetoModel $proj) {
        try {
            
            $QREdit = "UPDATE tbl_projetos set nome_prj = ?, descricao_prj = ?"
                        . "status_prj = ?, where id_prj = ?";
            $status = $this->connection->prepare($QREdit);    
            
            
            $status->bindValue(1, $proj->nome_prj, PDO::PARAM_STR);
            $status->bindValue(2, $proj->descricao_prj, PDO::PARAM_STR);
            $status->bindValue(3, $proj->status_prj, PDO::PARAM_STR);
            $status->bindValue(4, $proj->id_prj, PDO::PARAM_INT);
            
            $status->execute();
            
            //$projeto = $status->fetchAll(PDO::FETCH_CLASS);

            $this->connection = null;

            return $projeto;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar os projetos!' . $exc;
        }
    }

    public function deletaProjeto($id_prj) {
        try {
            
            $SQLDelete = "delete from tbl_projetos where id_prj = ?";
            $status = $this->connection->prepare($SQLDelete);
            
            $status->bindValue(1, $id_prj);
            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao deletar o projeto! <br>$exc";
        }
    }

}
