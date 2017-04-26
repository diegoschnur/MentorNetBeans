<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Projetos</title>
    </head>

    <body>
        <form action="../Controller/ProjetoController.php" method="post" name="cadProj">
            <input type="text" name="txtNome" id="txtNome" placeholder="Nome"/><br>
            <textarea type="text" name="txtDescricao" id="txtDescricao" placeholder="Descrição"/></textarea><br>
            <input type="submit" name="btCadastrar" id="btCadastrar" placeholder="Cadastrar"/><br>
            <input type="reset" name="btLimpar" id="btLimpar" placeholder="Limpar"/><br>
        </form>
    </body>

</html>