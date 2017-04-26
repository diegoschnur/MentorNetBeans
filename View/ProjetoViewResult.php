<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Cadastro de Projeto efetuado</title>
    </head>

    <body>
        <h1>Resultado</h1>
        <?php
        if (isset($_SESSION['nome'])) {
            echo '<br>Projeto:' . $_SESSION['nome'];
        }
        ?>
    </body>
</html>

