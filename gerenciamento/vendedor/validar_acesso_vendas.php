<?php

session_start();

require_once('db_cad.php');

$mail = $_POST['mail'];
$pass = md5($_POST['pass']);

$sql = " SELECT * FROM vendedor WHERE comemail = '$mail' AND senha = '$pass' ";


$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    $dados_usuario = mysqli_fetch_array($resultado_id);

    
    if(isset($dados_usuario['comemail'])){
        
        $_SESSION['comemail'] = $dados_usuario['comemail'];
        $_SESSION['contato'] = $dados_usuario['contato'];
        
         header('Location: vendas/gerec/gerenciamento.php');
        
        
    } else {
        header('Location: loginVendas.php?erro=1');
    }
    
 } else {
    echo 'Erro na execução da consulta, favor entrar em contato com o administrador do site.';    
}   
    
    