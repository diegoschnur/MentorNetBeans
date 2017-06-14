<?php
 require_once './cabecalho.php';
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
( isset($_POST['variavel']) ? $variavel = $_POST['variavel'] : $variavel = "" );
( isset($_POST['valor']) ? $valor = $_POST['valor'] : $valor = "" );

if( $variavel != "" ){
    if( $_SESSION[$variavel] != $valor ){
        $_SESSION[$variavel] = $valor;
        
    }
}
