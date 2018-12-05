<?php
    session_start();
    
    $cdQuiosque = $_POST['favoritar'];
    $codigo = $_SESSION['codigo'];
    
    var_dump($_SESSION['codigo'], $cdQuiosque);
    
    include "conexao.php";
    
    
    $favoritar = $con->query("INSERT INTO favoritos VALUE(NULL,'$cdQuiosque', '$codigo');");
    // $favoritar->execute();
    
    header("location: buscaQuisquioque.php?id=$cdQuiosque");
    
?>