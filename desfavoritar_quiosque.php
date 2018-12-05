<?php
    session_start();
    $codigo = $_SESSION['codigo'];
    $cdQuiosque = $_POST['favoritar'];
    
    var_dump($cdQuiosque, $codigo);
    //buscaQuisquioque.php?id=$cdQuiosque
    
    include "conexao.php";
    
    $deletaFavorito = $con->query("DELETE FROM favoritos  WHERE id_quiosque  = '$cdQuiosque' AND id_pessoa = '$codigo' ");
    $deletaFavorito->execute();
    
    header("location: perfilUsuario.php?id=$codigo");
?>