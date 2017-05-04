<?php

class UsuarioDAO {

    private $connection = null;

    public function __construct() {
        $this->connection = ConnectionDB::getInstance();
    }

    public function insereUsuario($usuario) {
        try {
            $status = $this->connection->prepare(""
                    . "INSERT INTO tbl_usuarios (nome_us,email_us,login_us,senha_us,telefone_us,status_us,"
                    . "permissao_relator_us,permissao_Grelator_us,permissao_desenvolvedor_us,"
                    . "permissao_Gdesenvolvedor_us,permissao_secretario_us,permissao_visualizador_us"
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");

            $status->bindValue(1, $usuario->nome_us);
            $status->bindValue(2, $usuario->email_us);
            $status->bindValue(3, $usuario->login_us);
            $status->bindValue(4, $usuario->senha_us);
            $status->bindValue(5, $usuario->telefone_us);
            $status->bindValue(6, $usuario->status_us);
            $status->bindValue(7, $usuario->permissao_relator_us);
            $status->bindValue(8, $usuario->permissao_Grelator_us);
            $status->bindValue(9, $usuario->permissao_desenvolvedor_us);
            $status->bindValue(10, $usuario->permissao_Gdesenvolvedor_us);
            $status->bindValue(11, $usuario->permissao_secretario_us);
            $status->bindValue(12, $usuario->permissao_visualizador_us);
           // print_r($status);exit;
            $status->execute();

            //Encerra a conexão
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao inserir um novo usuario!" . $exc;
        }
    }

    public function listaUsuarios() {
        try {

            $status = $this->connection->prepare("select * from tbl_usuarios");
            $status->execute();
            $usuarios = $status->fetchAll(PDO::FETCH_CLASS, 'UsuarioDAO');

            $this->connection = null;

            return $usuarios;
        } catch (PDOException $exc) {
            echo 'Ocorreram erros ao pesquisar os usuários!' . $exc;
        }
    }

    public function deletaUsuario($param) {
        try {
            $status = $this->connection->prepare("delete from tbl_usuarios where id = ?");
            $status->bindValue(1, $id_us);
            $status->execute();

            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Ocorreram erros ao deletar o usuário! <br>$exc";
        }
    }

}
