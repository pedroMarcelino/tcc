<?php
    $cdQuiosque = $_POST['cdQuiosque'];
    
    var_dump($cdQuiosque);
    
    include_once "conexao.php";
    
    $stmt = $con->prepare("DELETE FROM quiosque WHERE cd_quiosque = '$cdQuiosque' ");
	$stmt->execute();
	
	
	header('Location: perfilProprietario.php');
?>