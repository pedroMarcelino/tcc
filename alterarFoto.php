<?php
    
    $cdAlterar = $_POST['cdAlterar'];
    $id = $_POST['cdQuiosque'];
    
    include"conexao.php";
    
    $sql = $con->query("SELECT img_url FROM imagem WHERE cd_imagem = $cdAlterar");
    
    while($users = $sql->fetch(PDO::FETCH_OBJ)){
        $nm_imagem = $users->img_url;
    }
    
    
    
    var_dump($nm_imagem);

    if(isset($_FILES['foto'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = $nm_imagem;
          
          var_dump($novo_nome, $cdAlterar);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto']['tmp_name'], $novo_nome);
          
          $stmt = $con->prepare("UPDATE imagem SET url_img = '$novo_nome' WHERE cd_imagem = '$cdAlterar'");
          
          
          $stmt->execute();         
        }
    }
    
    header("location: visualizarFotos.php?id=$id");
?>