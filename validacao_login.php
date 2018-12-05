<?php
    session_start();
    $emailUser = $_POST['emailUser'];
    $senhaUser = $_POST['senhaUser'];
    //$deu     = "x";
    
    var_dump($emailUser, $senhaUser);
    
    if($emailUser == "" && $senhaUser == ""){
        header('location: index.php?erro=erro');
    }
    
    include_once "conexao.php";
    
    $sql = $con->query("SELECT * FROM pessoa WHERE nm_email = '$emailUser' AND nm_senha = '$senhaUser'");
       
    $users = $sql->fetch(PDO::FETCH_OBJ);
    
    if(($emailUser == $users->nm_email) && ($senhaUser == $users->nm_senha)){
	    
	    $_SESSION['codigo'] = $users->cd_pessoa;
		$_SESSION['tipo'] = $users->ds_tipo;
			
		header("Location: index.php");
	}
	else{
	    header("location: index.php?erro=$emailUser");
	}
    
    
?>