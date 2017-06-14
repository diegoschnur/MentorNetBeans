</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

<style> 
    a { cursor: pointer; }
</style>

<?php
    switch (substr($_SERVER['SCRIPT_NAME'], (strrpos($_SERVER['SCRIPT_NAME'], '/') + 1), -4)) {
        case "lista-solicitacao":
        case "lista-solicitacoes":
            $name = "lista-solicitacoes";
            break;
        case "form-solicitacao":
            $name = "form-solicitacao";
            break;
        case "lista-projeto":
        case "lista-projetos":
            $name = "lista-projetos";
            break;
        case "form-projeto":
            $name = "form-projeto";
            break;
        case "lista-perfis":
        case "lista-perfil":
            $name = "lista-perfis";
            break;
        case "lista-usuarios":
        case "lista-usuario":
            $name = "lista-usuarios";
            break;
        case "lista-resumo":
            $name = "lista-resumo";
            break;
        default:
            $name = "minhavisao";
            break;
    }
?>

<script>

    $(window).load(function () {
        $("[name='<?= $name ?>']").parent().addClass("active");
    });

    function defineSessao(nomevariavel = '', valor = '', destino = '') {
        $.ajax({
            type: "post",
            data: { variavel: nomevariavel, valor: valor},
            url: "define_session.php",
            async: false,
            success: function (result) {
                console.log(result);
            }
        });
        window.location.href = destino ;
    }
</script>

</body>
</html>