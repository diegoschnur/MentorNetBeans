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

<script>

    $(window).load(function () {
        $("[name='<?php echo substr($_SERVER['SCRIPT_NAME'], (strrpos($_SERVER['SCRIPT_NAME'], '/') + 1), -4); ?>']").parent().addClass("active");
    });

    function defineSessao(nomevariavel = '', valor = '', destino = '') {
        $.ajax({
            type: "post",
            data: { variavel: nomevariavel, valor: valor, destino: destino},
            url: "define_session.php",
            async: false,
            success: function (result) {
                console.log(result);
            }
        });
        //window.location.href = destino ;
    }
</script>

</body>
</html>