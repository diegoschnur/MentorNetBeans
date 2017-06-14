<?php
include("LogicaUsuario.php");
?>

<head lang="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>Mentor 4.0</title>
</head>

<body style="background-image: url(imagens/stara-hercules.jpg); 
      background-size: cover; background-repeat: no-repeat; background-position: center center">

    <div class="container-fluid login-page">
        <div id="loginbox" style="margin-top:12%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <?php if( isset($_SESSION['error']) ){
                echo "<h4 style='color: red;'>".$_SESSION['error']."</h4>";
                unset($_SESSION['error']);
            }else {
                if( isset($_SESSION['success']) ){
                    echo "<h4 style='color: green;'>".$_SESSION['success']."</h4>";
                    unset($_SESSION['success']);
                }
            }
            ?>
            <div class="panel panel-primary" style="background: rgba(228,228,228,0.5)">    
                <div class="panel-heading">
                    <div class="panel-title">Mentor 4.0 | Login</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form action="./Controller/UsuarioController.php" class="form-horizontal" method="post" name="loginUser" role="form">
                        <input type="hidden" name="acao" value="login">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login_us" type="text" class="form-control" required="true" name="login_us" value="" placeholder="Login">                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="senha_us" type="password" class="form-control" required="true" name="senha_us" placeholder="Senha">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary col-lg-12">Entrar</button>
                        </div>
                    </form>     

                </div>                     
            </div>  
        </div> 
    </div>
</body>

<?php include ("Rodape.php"); ?>