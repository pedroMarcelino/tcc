<?php
session_start();
    $codigo= $_SESSION['codigo'];

    $alterName = $_POST['alterName'];
    $senhaNova = $_POST['senhaNova'];
    $confSenhaNova = $_POST['confSenhaNova'];
      
    include_once "conexao.php";
    
    var_dump($_FILES['fotoUsuario']);
    
    if($senhaNova == "" && $confSenhaNova == ""){
        
        //nao vai alterar nada
        if($_FILES['fotoUsuario']['size'] == 0){
            header('location: perfilProprietario.php?erro=erro');
        }
        
        // vai alterar somente a foto
        if(isset($_FILES['fotoUsuario'])){
        
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['fotoUsuario']['name'],-4));
        
        
    
        if(in_array($extensao, $extensaoValida)){
            $novo_nome = "ftDono".$codigo.$extensao; 
            $diretorio = "imgCadastrada/";
            if(file_exists($novo_nome))unlink($novo_nome);
            move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $diretorio.$novo_nome);
            $stmt = $con->prepare("UPDATE pessoa SET img_usuario = '$novo_nome' WHERE cd_pessoa = '$codigo'");
            var_dump($stmt);
            $stmt->execute();
            header('Location: perfilProprietario.php?erro=success');
        }
    }
    }
    
    if($senhaNova != $confSenhaNova){
        header('location: perfilProprietario.php?erro=erro');
        
        
    }
    
    if($senhaNova != "" && $confSenhaNova != ""){
        if($senhaNova == $confSenhaNova){
            if($_FILES['fotoUsuario']['size']>1){
                if(isset($_FILES['fotoUsuario'])){
                    $extensaoValida = array(".jpg",".jpeg",".gif",".png");
                    $extensao = strtolower(substr($_FILES['fotoUsuario']['name'],-4));
                
                    if(in_array($extensao, $extensaoValida)){
                        $novo_nome = "ftDono".$codigo.$extensao; 
                        $diretorio = "imgCadastrada/";
                        if(file_exists($novo_nome))unlink($novo_nome);
                        move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $diretorio.$novo_nome);
                        $stmt = $con->prepare("UPDATE pessoa SET img_usuario = '$novo_nome' WHERE cd_pessoa = '$codigo'");
                        var_dump($stmt);
                        $stmt->execute();
                        header('Location: perfilProprietario.php?erro=success');
                    }
                }
            }
            $alterdados = $con->query("UPDATE pessoa SET nm_usuario = '$alterName', nm_senha = '$senhaNova' WHERE cd_pessoa = '$codigo' ");
            $alterdados->execute();
            header('location: perfilProprietario.php?erro=success');
        }
    }
    
    
    if($_FILES['fotoUsuario'] != ""){
        if($senhaNova != $confSenhaNova){
            header('location: perfilProprietario.php?erro=erro');
        }
    }

?>