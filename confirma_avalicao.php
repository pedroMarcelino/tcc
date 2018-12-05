<?php
    session_start();
    
    $codigoUsuario = $_SESSION['codigo'];


    $estrelaComida = $_POST['estrelaComida'];
    $estrelaAreia = $_POST['estrelaAreia'];
    $estrelaAtendimento = $_POST['estrelaAtendimento'];
    $estrelaLimpeza = $_POST['estrelaLimpeza'];
    $estrelaPreco = $_POST['estrelaPreco'];
    
    $codigoQuisoque = $_POST['codigoQuiosque'];
    
    
    
    
    //  var_dump($codigoUsuario, $codigoQuisoque);
    
    include "conexao.php";
    
    $avaliacao = $con->query("INSERT INTO avaliacao VALUE(NULL, NULL, '$estrelaLimpeza', '$estrelaAreia', '$estrelaComida', '$estrelaAtendimento', '$estrelaPreco', '$codigoQuisoque', '$codigoUsuario');");
    //$avaliacao->execute();
    
    // var_dump($codigoQuisoque);
    
    header("Location: buscaQuisquioque.php?id=".$codigoQuisoque."&erro=success");
?> 