<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Cadastro de Projeto com Erro</title>
    </head>

    <body>
        <div id="alert" class="alert alert-danger" style="display: none;">
            <a href="#" class="close" data-dismiss="alert">Projeto não cadastrado!</a>
        </div>
        
        <h1>ERROS!</h1>
        <?php
        if (isset($_SESSION['erros'])) {
            $erros = array();
            $erros = unserialize($_SESSION['erros']);

            foreach ($erros as $e) {
                echo '</br>' . $e;
            }
        }
        ?>
    </body>


</html>