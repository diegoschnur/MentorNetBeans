<?php include("LogicaUsuario.php");

logout();
$_SESSION["success"] = "Deslogado com sucesso";

header("Location: index.php");
die();
