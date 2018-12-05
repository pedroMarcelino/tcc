<?php
    session_start();
    $codigo = $_SESSION['codigo'];
    include_once "conexao.php";
    $tipo = $_SESSION['codigo'];
    
    $nm_cidade = $_GET['id'];
?>

	<!DOCTYPE html>

	<html>

	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Acentuação -->
		<title><?php echo $nm_cidade; ?> - Avaliador de Quiosques</title>
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
					<?php include"cidades.php";?>
				</div>

				<div class="col-sm-10">


					<?php
					$texto2 = "<br/><br/>"."Atenciosamente, Guia de Quiosques."."</div>
</div>";
					$texto = "<div class='animated shake' id='alerta'>
    <div class='alert alert-danger' style='font-size: 110%; text-align:justify'>
        <a href='#' ></a>
        <strong><center>IMPORTANTE!</center></strong><br> 
    

Atualmente, a cidade Praia Grande se encontra sem quiosques, por motivos de segurança noturna e também para a utilização do espaço para jardins e rampas para deficientes, diz a Prefeitura da cidade.
Portanto, não será possível o cadastro de quiosques nesta cidade e nem visualizações. A página ainda existirá e se manterá com este aviso, caso novos quiosques sejam feitos futuramente.

<br/><br/>Para mais informações, acesse este 

";
					
						    	if($nm_cidade == 'Praia Grande') { echo
						    						"<p >".$texto."<a target='_blank' href='http://www.diariodolitoral.com.br/cotidiano/quiosques-de-praia-grande-demolicoes-comecam-e-causam-novo-embate/113486/' >Link.</a>".$texto2."</p>"; 
						    							
						    	}
						    	
						$sql = $con->query("SELECT * FROM quiosque WHERE nm_cidade = '$nm_cidade'");

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


				</div>
			</div>
		</div>

	</body>

	</html>


<!--<div class="animated shake" id="alerta">-->
<!--    <div class="alert alert-danger alert-dismissible">-->
<!--        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
<!--        <strong>IMPORTANTE!</strong> dentro de php $texto
<!--    </div>-->
<!--</div>