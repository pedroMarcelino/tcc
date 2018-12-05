<?php
    $cdImagem = $_POST['cdImagem'];
    $id = $_POST['cdQuiosque'];
    
    var_dump($cdImagem);
    
    include "conexao.php";
    
    $sql = $con->query("DELETE FROM imagem WHERE cd_imagem = $cdImagem");
    
    $sql->execute();
    
    header("location: visualizarFotos.php?id=$id");
    
    
?>