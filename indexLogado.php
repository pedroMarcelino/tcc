<?php session_start(); ?>
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
        <div class="nav navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <a id="imagemheader" href="index.html"><img id="imgLogo" src="img/icone2.png" height="80px" width="100px"/></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right" id="positionButtons">
                                <div class="dropdown" style="margin-left:-100%;">
                                    <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" class="buttonNav" id="buttonMenu">
									    <img id="imgLogo" src="img/menu.png"/>
    									<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="perfilUsuario.php" class="">
                                              <span class="glyphicon glyphicon-user"></span> Perfil Usuário 
                                            </a>
                                        </li>
                                        <hr id="hrMenu">
                                        <li><a href="sairSessao.php">
                                              <span class="glyphicon glyphicon-log-out"></span> Sair
                                            </a>
                                        </li>
                                        <hr/>
                                        <li>
                                            <span></span> <?php echo $_SESSION['nome']; ?>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid" id="menuLateral">
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active"><i class="fa fa-cidades"></i> <span>Cidades da Baixada Santista </span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-praia-grande"></i> <span>Praia Grande</span></a>
                    <a href="mongagua.php" class="list-group-item"><i class="fa fa-monagua"></i> <span>Mongaguá</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-itanhae,"></i>Itanhaém<span></span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-santos"></i> <span>Santos</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-guaruja"></i> <span>Guarujá</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-peruibe"></i> <span>Peruíbe</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-sao-vicente"></i> <span>São Vicente</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-cubatao"></i> <span>Cubatão</span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-bertioga"></i> <span>Bertioga</span></a>
                </div>
            </div>
</body>

</html>
