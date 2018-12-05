<?php
	session_start();
    $codigo = $_SESSION['codigo'];
    
    if(!isset($_SESSION['codigo'])){
        header('Location: /siteoficial/');
        exit();
    }
    
    include "conexao.php";
    
    $sql = $con->query("SELECT * FROM pessoa WHERE cd_pessoa ='$codigo'");
    
    while($users = $sql->fetch(PDO::FETCH_OBJ)){
        
        $nomeUsuario = $users->nm_usuario;
        $emailUsuario= $users->nm_email;
        $caminho = $users->img_usuario;
    
    }
    
    if($caminho == ""){
        $caminho = "user.jpg";
    }
?>

<!DOCTYPE html>
<html>

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
	
	<script src="js/pegandoValor.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <div class="nav navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <a id="imagemheader" href="index.php"><img id="imgLogo" src="img/icone2.png" height="80px" width="100px"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-inverse" id="perfil">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="col-md-4">
                    <img src="imgCadastrada/<?php echo $caminho?>" class="img-rounded" id="fotoUser"></img>
                </div>
            </div>
            <div class="col-sm-4" id="exibirInformacoes">
                <li>Nome : <?php echo $nomeUsuario;?></li>
                <li>Tipo : Usuario</li>
            </div>
            <hr id="hrPerfil">
            <ul class="nav navbar-nav navbar-right" id="positionNav">
                <li><a id="navEditUsuario" href="#">Editar Perfil</a></li>
                <li><a id="navFavoritos" href="#">Quiosques Favoritos</a></li>
            </ul>
        </div>
    </nav>
    
    
    
        <?php
		
		$msg = $_GET['erro'];
		// var_dump($msg);
		
		if($msg == "erro"){
			?>
			<script>
				$(document).ready(function() {
					$('#modalErro').modal('show');
				})
			</script>

			<?php	
		$msg = "";
		}
		
		if($msg == "success"){
			?>
			<script>
				$(document).ready(function() {
					$('#modalSuccess').modal('show');
				})
			</script>

			<?php	
		$msg = "";
		}
		?>
    <div id="editPerfil">
    <div class="animated fadeInLeft">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="confirma_alterar_usuario.php" method="POST" enctype="multipart/form-data"> 
                        <fieldset id="ediatarPerfil">
                            <center><legend>Editar Perfil</legend></center>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nome :</label>
                                            <input name="alterName" type="text" maxlength="50" class="form-control" value="<?php echo $nomeUsuario; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input name="" type="text" maxlength="50" class="form-control" value="<?php echo $emailUsuario; ?>" readonly/>
                                        </div>
                                        <label for="ftProprietario">Foto Usuario :</label>
                                        <div class="fileUpload btn btn-primary">
                                            <span> Upload da Foto </span>
                                            <input type="file" class="upload" name="fotoUsuario" />    <!-- Implementar alteração de foto -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Trocar Senha :</label>
                                            <input name="senhaNova" type="password" maxlength="50" class="form-control" placeholder="Digite sua nova senha"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Digite novamente :</label>
                                            <input name="confSenhaNova" type="password" maxlength="50" class="form-control" placeholder="Confirme sua nova senha"/>
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <div class="buttons-cadasto">
                             <input id="buttonAlterarQuiosque" type="submit" name="tcadastrar" value="ALTERAR" />
                            <input id="buttonLimparQuiosque" type="reset" name="tlimpar" value="LIMPAR" />
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    </div>
    
    <div id="Cad">
        <div class="animated fadeInLeft">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            $mostraQuisqoue = $con->query("SELECT *
                                                            FROM quiosque
                                                            JOIN favoritos f ON f.id_quiosque = cd_quiosque
                                                            AND f.id_pessoa = '$codigo'");
                            
                            //  var_dump($mostraQuisqoue);
                                                            
                            while($users = $mostraQuisqoue->fetch(PDO::FETCH_OBJ)){
    					    $cdQuiosque = $users->cd_quiosque;
                           
                        ?>
                        <!-- #mark btnAlt -->
    						<div class="col-sm-4">
    						    <div class="thumbnail">
    						        <input type="hidden" name="cdQuiosque" value="<?php echo $cdQuiosque;?>">
    						  	    <button data-toggle="modal" data-target="#modalDesfavoritar" class="btn btn-default btn-block" id="btnDesfavoritar" value="<?php echo $cdQuiosque;?>">
    						  	         <span id="desfavoritar" class="fa fa-star"></span> 
    						  	        Desfavoritar</button>
    						  	    
							        <center><p class="pEstilo"><?php echo $users->nm_quiosque; ?></p></center>
							        <a href="buscaQuisquioque.php?id=<?php echo $cdQuiosque; ?>">
          						        <img src="<?php echo $users->img_quiosque; ?>" class="img-responsive" id="fotoQuiosque"></img>
          						    <div class="caption">
          							    <center><p><?php echo $users->nm_endereco;?></p>
          							    <p>Das <?php echo $users->hr_quiosque_inicio; ?> às <?php echo $users->hr_quiosque_fim; ?></p></center>
              						</div>
        					        </a>
        				    	</div>
        					</div>
                            <?php
    						    }

							?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    
    <!-- Modal -->
    <div id="modalDesfavoritar" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Desfavoritar</h4>
                </div>
                <form action="desfavoritar_quiosque.php" method="POST">
                    <input type="hidden" name="favoritar" value="<?php echo $cdQuiosque; ?>" id="inputDesfavoritar"/>  
                    <div class="modal-body">
                        <h3><p>Deseja realmente desfavoritar esse Quiosque.</p></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="confExclusao" class="btn btn-default">Sim</button>
                        <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Não</button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>
    
    <div id="modalErro" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center>
						<h4 class="modal-title"></h4>
					</center>
					<div class="modal-body">
						<center><h3 id="inputErro">Erro ao atualizar os dados !</h3></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="modalSuccess" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center>
						<h4 class="modal-title"></h4>
					</center>
					<div class="modal-body">
						<center><h3 id="inputSucesso">Dados alterados com sucesso !</h3></center>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


    
