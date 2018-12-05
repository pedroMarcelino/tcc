<?php
	session_start();
    $codigo= $_SESSION['codigo'];
    include "conexao.php";
    
    $msg = $_GET['erro'];
    
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
		<script src="js/pegandoValor.js"></script>
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
					<?php include "cidades.php";?>
				</div>
				<div class="col-sm-10">
					<fieldset>
						<legend>Alguns Quiosques de Mongaguá</legend>
						
						<?php
						$sql = $con->query("SELECT * FROM quiosque WHERE nm_cidade = 'Mongaguá' ");

    					while($users = $sql->fetch(PDO::FETCH_OBJ)){
    					
    					?>
    					
						<div class="col-sm-4">
							<div class="thumbnail">
								<center>
									<p class="pEstilo">
										<?php echo $users->nm_quiosque; ?>
									</p>
								</center>
								<a href="buscaQuisquioque.php?id=<?php echo $users->cd_quiosque; ?>">
          						        <img src="<?php echo $users->img_quiosque; ?>" class="img-rounded" id="fotoQuiosque" alt="Lights">
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

					</fieldset>
					<fieldset>
						<legend>Alguns Quiosques de Peruíbe</legend>
						
						<?php
						$sql = $con->query("SELECT * FROM quiosque WHERE nm_cidade = 'Peruíbe' ");

    					while($users = $sql->fetch(PDO::FETCH_OBJ)){
    					
    					?>
    					
						<div class="col-sm-4">
							<div class="thumbnail">
								<center>
									<p class="pEstilo">
										<?php echo $users->nm_quiosque; ?>
									</p>
								</center>
								<a href="buscaQuisquioque.php?id=<?php echo $users->cd_quiosque; ?>">
          						        <img src="<?php echo $users->img_quiosque; ?>" class="img-rounded" id="fotoQuiosque" alt="Lights">
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

					</fieldset>
					<fieldset>
						<legend>Alguns Quiosques de Guarujá</legend>
						
						<?php
						$sql = $con->query("SELECT * FROM quiosque WHERE nm_cidade = 'Guarujá' ");

    					while($users = $sql->fetch(PDO::FETCH_OBJ)){
    					
    					?>
    					
						<div class="col-sm-4">
							<div class="thumbnail">
								<center>
									<p class="pEstilo">
										<?php echo $users->nm_quiosque; ?>
									</p>
								</center>
								<a href="buscaQuisquioque.php?id=<?php echo $users->cd_quiosque; ?>">
          						        <img src="<?php echo $users->img_quiosque; ?>" class="img-rounded" id="fotoQuiosque" alt="Lights">
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

					</fieldset>
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
							<h4 class="modal-title">Falha no login !!</h4>
						</center>
						<form action="validacao_login.php" method="POST">
							<div class="modal-body">
								<div class="form-group">
									<label for="email">Email :</label>
									<input type="email" name="emailUser" id="inputErro" maxlength="50" class="form-control" value="<?php echo $msg;?>">
								</div>
								<div class="form-group">
									<label for="pwd">Senha :</label>
									<input type="password" name="senhaUser" id="inputErro" maxlength="20" class="form-control">
								</div>
								<h6 id="inputErro">Falha ao fazer login !</h6>
							</div>
							<div class="modal-footer">
								<div class="form-group">
									<input type="submit" class="btn btn-success btn-block" id="btnLogar" name="logar" value="LOGAR">
								</div>
								<div clas="form-group">
									<!--<button class="btn btn-success btn-block" id="btnConectFacebook">Conectar-se com Facebook</button>-->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
		
		// var_dump($msg);
		
		if($msg != ""){
			?>
			<script>
				$(document).ready(function() {
					$('#modalErro').modal('show');
				})
			</script>

			<?php	
		$msg = "";
		}
		?>
	</body>

	</html>
