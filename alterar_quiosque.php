<?php
    session_start();
    $codigo= $_SESSION['codigo'];
    
    $cdQuiosque = $_POST['cdQuiosque'];
    $nomeQq = $_POST['nomeQq'];
    // $cnpjQq = $_POST['cnpj'];
    $telefoneQq = $_POST['telefoneQq'];
    $enderecoQq = $_POST['enderecoQq'];
    $horaEntrada = $_POST['horaEntrada'];
    $horaSaida = $_POST['horaSaida'];
    
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $descricao = $_POST['descricaoQq'];
    
    include_once "conexao.php";
    
    var_dump($cdQuiosque);
    
    $nr = rand(0, 100);
    
    var_dump($cidade);
    
    $alterarDados = $con->query("UPDATE quiosque SET nm_quiosque = '$nomeQq', nm_endereco = '$enderecoQq', nm_estado = '$estado', nm_cidade = '$cidade',
    hr_quiosque_inicio = '$horaEntrada', hr_quiosque_fim = '$horaSaida', ds_quiosque = '$descricao', tel_quiosque = '$telefoneQq'
    WHERE cd_quiosque = '$cdQuiosque' ");
    
    // var_dump($alterarDados);
    
    $alterarDados->execute();  
    
    if(isset($_FILES['fotoQuiosque'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['fotoQuiosque']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoQuiosque".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgQuiosque/";
          
          var_dump($_FILES['fotoQuiosque']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['fotoQuiosque']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("UPDATE quiosque SET img_quiosque = '$diretorio$novo_nome' WHERE cd_quiosque = '$cdQuiosque'");
          
          
          $stmt->execute();         
        }
    }
    
    
    if(isset($_FILES['foto1'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto1']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu1".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          var_dump($_FILES['foto1']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();
          
        }
    }
    
    
    
    if(isset($_FILES['foto2'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto2']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu2".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          var_dump($_FILES['foto2']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();         
        }
    }
    
    if(isset($_FILES['foto3'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto3']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu3".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          var_dump($_FILES['foto3']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto3']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();          
        }
    }
    
    if(isset($_FILES['foto4'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto4']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu4".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          var_dump($_FILES['foto4']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto4']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();          
        }
    }
    
    if(isset($_FILES['foto5'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto5']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu5".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          var_dump($_FILES['foto5']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto5']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();         
        }
    }
    
    
    if(isset($_FILES['foto6'])){
        $extensaoValida = array(".jpg",".jpeg",".gif",".png");
        $extensao = strtolower(substr($_FILES['foto6']['name'],-4));
        
        if(in_array($extensao, $extensaoValida)){
          $novo_nome = "fotoMenu6".$cdQuiosque.$nr.$extensao; 
          $diretorio = "imgMenu/";
          
          // var_dump($_FILES['foto6']);
          
          if(file_exists($novo_nome))unlink($novo_nome);
          
          move_uploaded_file($_FILES['foto6']['tmp_name'], $diretorio.$novo_nome);
          
          $stmt = $con->prepare("INSERT INTO imagem(cd_imagem, img_url, id_quiosque) VALUES(NULL,'$diretorio$novo_nome','$cdQuiosque')");
          
          $stmt->execute();       
        }
    }
    
    header("location: alterarQuiosque.php?id=$cdQuiosque");
?>