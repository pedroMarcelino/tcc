<?php
    session_start();
    
    $codigo = $_SESSION['codigo'];
    
    if(!isset($_SESSION['codigo'])){
        header('Location: /siteoficial/');
        exit();
    }
?>


<!DOCTYPE html>
<!-- Começo de tudo -->

<html lang="pt-br">
<!-- Começo HTML com a linguagem Português Brasil -->

<head>

    <!-- -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Acentuação -->
    <title>Página Inicial - Avaliador de Quiosques</title>
    <!-- Título da aba do navegador -->
    <meta name="description" content="O lugar ideal para avaliar e encontrar quiosques na baixada santista." />
    <!-- Descrição do site para o nevegador -->
    <link rel="icon" href="img/icone2.png" />
    <!-- Icone da aba do navegador -->
    <script src="arquivo.js"></script>
    <!-- Chamando JAVASCRIPT -->
    <!-- Código CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <?php
        
			if(!session_start())session_start();
			if($codigo == ""){
				include "headerDeslogado.php";
			}
			if($_SESSION['tipo'] == "1"){
				include "headerProprietario.php";
			}
			if($_SESSION['tipo'] == "0"){
				include "headerUsuario.php";
			}
			
		?>
    </header>
    <div class="container-fluid" id="menuLateral">
        <div class="row">
            <div class="col-sm-2">
                <?php include "cidades.php"?>
            </div>
             <label for=""><?php
                //echo "Usuario:".$_SESSION['codigo'];?>
                </label>
</body>

</html>
