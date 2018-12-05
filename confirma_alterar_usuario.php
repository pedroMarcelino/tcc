<?php
session_start();
    $codigo= $_SESSION['codigo'];

    $alterName = $_POST['alterName'];
    $senhaNova = $_POST['senhaNova'];
    $confSenhaNova = $_POST['confSenhaNova'];
      
    include_once "conexao.php";
    
    // if($senhaNova == $confSenhaNova){
    //     $alterdados = $con->query("UPDATE pessoa SET nm_usuario = '$alterName', nm_senha = '$senhaNova' WHERE cd_pessoa = '$codigo' ");
    //     $alterdados->execute();
    //     header('location: perfilUsuario.php');
    // }
    
    // if($senhaNova == "" || $confSenhaNova == ""){
    //     header('location: perfilUsuario.php');
    // }
    
    var_dump($_FILES['fotoUsuario']);
    
    if($senhaNova == "" && $confSenhaNova == ""){
        
        //nao vai alterar nada
        if($_FILES['fotoUsuario']['size'] == 0){
            header('location: perfilUsuario.php?erro=erro');
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
            header('Location: perfilUsuario.php?erro=success');
        }
    }
    }
    
    if($senhaNova != $confSenhaNova){
        header('location: perfilUsuario.php?erro=erro');
        
        
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
                        header('Location: perfilUsuario.php?erro=success');
                    }
                }
            }
            $alterdados = $con->query("UPDATE pessoa SET nm_usuario = '$alterName', nm_senha = '$senhaNova' WHERE cd_pessoa = '$codigo' ");
            $alterdados->execute();
            header('location: perfilUsuario.php?erro=success');
        }
    }
    
    
    if($_FILES['fotoUsuario'] != ""){
        if($senhaNova != $confSenhaNova){
            header('location: perfilUsuario.php?erro=erro');
        }
    }
    
    
    
    
    
    
/*checar se as variaveis do file estao pegando devidametne ja foi posto o enctype agr é so cadastrar ela no banco e no servidos   */






















































































//     $sql = $con->query("SELECT nm_senha FROM pessoa WHERE cd_pessoa = '$codigo' ");
   
//     while($users = $sql->fetch(PDO::FETCH_OBJ)){
//       $senhaNormal = $users->nm_senha;
//     }
    
//     if(isset($senhaNova) && isset($confSenhaNova)){
    
//       if(isset($_FILES['fotoUsuario'])){
      
//         $extensaoValida = array(".jpg",".jpeg",".gif",".png");
//         $extensao = strtolower(substr($_FILES['fotoUsuario']['name'],-4));
        
//         if(in_array($extensao, $extensaoValida)){
//           $novo_nome = "ftDono".$codigo.$extensao; 
//           $diretorio = "imgCadastrada/";
          
//           if(file_exists($novo_nome))unlink($novo_nome);
          
//           move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $diretorio.$novo_nome);
          
//           $stmt = $con->prepare("UPDATE pessoa SET img_usuario = '$novo_nome' WHERE cd_pessoa = '$codigo'");
//           var_dump($stmt);
//           $stmt->execute();
//           header('Location: perfilUsuario.php');
//         }
//       $stmt2 = $con->prepare("UPDATE pessoa SET nm_usuario = '$alterName', nm_senha =  '$senhaNormal' WHERE cd_pessoa = '$codigo'");
//       $stmt2->execute();
//       header('Location: perfilUsuario.php');
//     }
    
//   }
  
//   if($senhaNova != "" && $confSenhaNova != ""){
    
//     if($senhaNova == $confSenhaNova){
    
//       if(isset($_FILES['fotoUsuario'])){
      
//           $extensaoValida = array(".jpg",".jpeg",".gif",".png");
//           $extensao = strtolower(substr($_FILES['fotoUsuario']['name'],-4));
          
//           if(in_array($extensao, $extensaoValida)){
//             $novo_nome = "ftDono".$codigo.$extensao; 
//             $diretorio = "imgCadastrada/";
            
//             if(file_exists($novo_nome))unlink($novo_nome);
            
//             move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $diretorio.$novo_nome);
            
//             $stmt = $con->prepare("UPDATE pessoa SET img_usuario = '$novo_nome' WHERE cd_pessoa = '$codigo'");
//             var_dump($stmt);
//             $stmt->execute();
//             header('Location: perfilUsuario.php');
//           }
//          $stmt2 = $con->prepare("UPDATE pessoa SET nm_usuario = '$alterName', nm_senha =  '$senhaNova' WHERE cd_pessoa = '$codigo'");
//          $stmt2->execute();
//          header('Location: perfilUsuario.php');
//       }
    
//     }
    
//   }
  
?>