<!--deixar chave-->
<?php 
	session_start();
    $codigo = $_SESSION['codigo'];
    include_once "conexao.php";
    $tipo = $_SESSION['codigo'];
    $cd = $_GET['id'];
    $msg = $_GET['erro'];
    
    // var_dump($cd);
    
    $sql = $con->query("SELECT * FROM quiosque WHERE cd_quiosque = '$cd'");
    // $pao = $sql->fetch(PDO::FETCH_OBJ);
    	while($users = $sql->fetch(PDO::FETCH_OBJ)){
    		$id_proprietario = $users->id_pessoa;
  			$nmQuiosque = $users->nm_quiosque;
    	}
    	
    
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Acentuação -->
	<title><?php echo $nmQuiosque;?> - Avaliador de Quiosques</title>
	<!-- Título da aba do navegador -->
	<meta name="description" content="" />
	<!-- Descrição do site para o nevegador -->
	<link rel="icon" href="img/icone2.png" />
	<!-- Icone da aba do navegador -->
	<script src="arquivo.js"></script>
	<!-- Chamando JAVASCRIPT -->
	<!-- Código CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/gallery.theme.css">
  <link rel="stylesheet" href="css/gallery.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/pegandoValor.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<header
		<?php
			if($codigo == ""){
				include "headerDeslogado.php";
			}
			if($_SESSION['tipo'] == "1"){
				include "headerProprietario.php";
			}
			if($_SESSION['tipo'] == "0"){
				include "headerUsuario.php";
			}
			
			//var_dump($cd,$id_proprietario);
			
			// var_dump($id_proprietario);
			
			$sql2 = $con->query("SELECT nm_usuario, nm_email, img_usuario
					FROM pessoa
					INNER JOIN quiosque ON quiosque.cd_quiosque = '$cd'
					AND pessoa.cd_pessoa = '$id_proprietario' ");
				 while($users = $sql2->fetch(PDO::FETCH_OBJ)){
				 	$caminho = $users->img_usuario;
					$nome = $users->nm_usuario;
					$email = $users->nm_email;
					
				 }
				 	if($caminho == ""){
				        $caminho = "user.jpg";
				    }
				    
			$exibir = $con->query("SELECT * FROM quiosque WHERE cd_quiosque = '$cd'");
				while($users = $exibir->fetch(PDO::FETCH_OBJ)){
		?>
	</header>
	<nav class="navbar navbar-inverse" id="perfil2">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="col-md-4">
                    <img src="imgCadastrada/<?php echo $caminho?>" class="img-responsive" id="fotoUser"></img>
                </div>
            </div>
            <div class="col-sm-3" id="exibirNome">
            	<h2><?php echo $users->nm_quiosque;?></h2>
            </div>
            <div class="col-sm-3">
            <ul class="nav navbar-nav navbar-right" id="exibirInformacoes2">
                <li>Nome : <?php echo $nome;?></li><br>
                <li>Email : <?php echo $email;?></li>
            </ul>
            </div>
            <div class="col-sm-3">
            	<?php
            		if($codigo == ""){
            			include "avaliarDeslogado.php";	
            		}else{?>
					
					<button class="btn btn-defalt" id="btnAvaliar" data-toggle="modal" data-target="#avaliar">Avaliar</button>
					
					<?php
            		}
					if($_SESSION['tipo'] == "0"){
						
						$favoritos = $con->query("SELECT * FROM `favoritos` WHERE id_quiosque = '$cd' AND id_pessoa = '$codigo'");
						
						if($favoritos->rowCount()>0){
							$isFavoritado = true;
						} else {
							$isFavoritado = false;
						}
						

						
						if($isFavoritado == false){
							
							// var_dump($favoritos);
							?>
							<div class="form-group">
							    <button class="btn btn-default" id="favoritar" data-toggle="modal" data-target="#modalfavoritar">
							        <span id="favoritar2" class="fa fa-star-o"></span> Favoritar
							    </button>
							</div>
						<?php
					    	}
					    	if($isFavoritado == true){
					    		?>
							<div class="form-group">
							    <button class="btn btn-default" id="favoritar" data-toggle="modal" data-target="#modaldesfavoritar">
							        <span id="desfavoritar" class="fa fa-star"></span> Desfavoritar
							    </button>
							</div>
						<?php
					    		
					    	}
						}
            	?>
            </div>
        </div>
    </nav>


	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" id="informacoesGerais">
				<div class="col-sm-4">
					<fieldset>
						<legend>Foto Quiosque</legend>
						<img src="<?php echo $users->img_quiosque; ?>" id="fotoQuiosque" class="img-rounded"></img>
					</fieldset>
				</div>
				<div class="col-sm-4">
					<fieldset id="descricao">
						<legend>Descrição</legend>
						<div class="form-group shadow-textarea">
							<textarea style="resize: none; text-align: justify; background-color:white;" class="form-control z-depth-1" rows="9" readOnly><?php echo $users->ds_quiosque;?></textarea></textarea>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-4">
					<fieldset>
						<legend>Endereço</legend>
						<h4 id="h4Perfil">Estado :</h4>
						<h5 id="h5Perfil"><?php echo $users-> nm_estado;?></h5>
						<h4 id="h4Perfil">Cidade :</h4>
						<h5 id="h5Perfil"><?php echo $users-> nm_cidade;?></h5>
						<h4 id="h4Perfil">Rua :</h4>
						<h5 id="h5Perfil"><?php echo $users-> nm_endereco?></h5>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	
	<!--<div class="container-fluid">-->
	<!--<div class="col-sm-6">-->
	<!--  <fieldset>-->
	<!--    <legend>Media de avaliações</legend>-->
	<!--  <div id="boxAvaliacao2">-->
	<!--	            <div class="estrelaComida">-->
 <!--                       <p>Comida :</p>-->
 <!--                       <input type="radio" name="estrelaComida" id="vazio" value="" checked/>-->
                        
 <!--                       <label for="estralaComida1" ><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $comidaUm ?> type="radio" name="estrelaComida" id="estralaComida1" disabled="disabled" value="1"/>-->
                        
 <!--                       <label for="estralaComida2"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $comidaDois ?> type="radio" name="estrelaComida" id="estralaComida2" disabled="disabled" value="2"/>-->
                        
 <!--                       <label for="estralaComida3"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $comidaTres ?> type="radio" name="estrelaComida" id="estralaComida3" disabled="disabled" value="3" />-->
                        
 <!--                       <label for="estralaComida4"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $comidaQuatro ?> type="radio" name="estrelaComida" id="estralaComida4" disabled="disabled" value="4"/>-->
                        
 <!--                       <label for="estralaComida5"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $comidaCinco ?> type="radio" name="estrelaComida" id="estralaComida5" disabled="disabled" value="5"/>-->
                        
 <!--                   </div>-->
                          
 <!--                   <div class="estrelaAreia">-->
 <!--                       <p>Areia :</p>-->
 <!--                       <input type="radio" name="estrelaAreia" id="vazio" value="" checked/>-->
                        
 <!--                       <label for="estralaAreia1"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $areiaUm?> type="radio" name="estrelaAreia" id="estralaAreia1" disabled="disabled" value="1"/>-->
                        
 <!--                       <label for="estralaAreia2"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $areiaDois?> type="radio" name="estrelaAreia" id="estralaAreia2" disabled="disabled" value="2"/>-->
                        
 <!--                       <label for="estralaAreia3"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $areiaTres?> type="radio" name="estrelaAreia" id="estralaAreia3" disabled="disabled" value="3"/>-->
                         
 <!--                       <label for="estralaAreia4"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $areiaQuatro?> type="radio" name="estrelaAreia" id="estralaAreia4" disabled="disabled" value="4"/>-->
                        
 <!--                       <label for="estralaAreia5"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $areiaCinco?> type="radio" name="estrelaAreia" id="estralaAreia5" disabled="disabled" value="5"/>-->
                            
 <!--                   </div>-->
                          
 <!--                   <div class="estrelaAtendimento">-->
 <!--                       <p>Atendimento :</p>-->
 <!--                       <input type="radio" name="estrelaAtendimento" id="vazio" value="" checked/>-->
                        
 <!--                       <label for="estralaAtendimento1"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $atendimentoUm?> type="radio" name="estrelaAtendimento" id="estralaAtendimento1" disabled="disabled" value="1"/>-->
                        
 <!--                       <label for="estralaAtendimento2"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $atendimentoDois?> type="radio" name="estrelaAtendimento" id="estralaAtendimento2" disabled="disabled" value="2"/>-->
                        
 <!--                       <label for="estralaAtendimento3"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $atendimentoTres?> type="radio" name="estrelaAtendimento" id="estralaAtendimento3" disabled="disabled" value="3"/>-->
                        
 <!--                       <label for="estralaAtendimento4"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $atendimentoQuatro?> type="radio" name="estrelaAtendimento" id="estralaAtendimento4" disabled="disabled" value="4"/>-->
                        
 <!--                       <label for="estralaAtendimento5"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $atendimentoCinco?> type="radio" name="estrelaAtendimento" id="estralaAtendimento5" disabled="disabled" value="5"/>-->
                            
 <!--                   </div>-->
                    
 <!--                   <div class="estrelaLimpeza">-->
 <!--                       <p>Limpeza :</p>-->
 <!--                       <input type="radio" name="estrelaLimpeza" id="vazio" value="" checked/>-->
                        
 <!--                       <label for="estralaLimpeza1"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $limpezaUm?> type="radio" name="estrelaLimpeza" id="estralaLimpeza1" disabled="disabled" value="1"/>-->
                        
 <!--                       <label for="estralaLimpeza2"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $limpezaDois?> type="radio" name="estrelaLimpeza" id="estralaLimpeza2" disabled="disabled" value="2"/>-->
                        
 <!--                       <label for="estralaLimpeza3"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $limpezaTres?> type="radio" name="estrelaLimpeza" id="estralaLimpeza3" disabled="disabled" value="3"/>-->
                        
 <!--                       <label for="estralaLimpeza4"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $limpezaQuatro?> type="radio" name="estrelaLimpeza" id="estralaLimpeza4" disabled="disabled" value="4"/>-->
                        
 <!--                       <label for="estralaLimpeza5"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $limpezaCinco?> type="radio" name="estrelaLimpeza" id="estralaLimpeza5" disabled="disabled" value="5"/>-->
                        
 <!--                   </div>-->
                          
 <!--                   <div class="estrelaPreco">-->
 <!--                       <p>Preço :</p>-->
 <!--                       <input type="radio" name="estrelaPreco" id="vazio" value="" checked/>-->
                        
 <!--                       <label for="estralaPreco1"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input  <?php echo $precoUm ?> type="radio" name="estrelaPreco" id="estralaPreco1" disabled="disabled" value="1"/>-->
                        
 <!--                       <label for="estralaPreco2"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $precoDois ?> type="radio" name="estrelaPreco" id="estralaPreco2" disabled="disabled" value="2"/>-->
                        
 <!--                       <label for="estralaPreco3"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $precoTres ?> type="radio" name="estrelaPreco" id="estralaPreco3" disabled="disabled" value="3"/>-->
                        
 <!--                       <label for="estralaPreco4"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $precoQuatro ?> type="radio" name="estrelaPreco" id="estralaPreco4" disabled="disabled" value="4"/>-->
                        
 <!--                       <label for="estralaPreco5"><i class="fa fa-star-o" style="font-size:23px"></i></label>-->
 <!--                       <input <?php echo $precoCinco ?> type="radio" name="estrelaPreco" id="estralaPreco5" disabled="disabled" value="5"/>-->
                        
 <!--                   </div>-->
	<!--	        </div>-->
	<!--	  </fieldset>-->
	<!--</div>  -->
	<div class="col-sm-6">
	  <fieldset>
	  <legend>Fotos</legend>
	  <?php 
	      $retorno = $con->query("SELECT COUNT( * ) qt_foto FROM imagem WHERE id_quiosque = '$cd'");
	      
	      while($users = $retorno->fetch(PDO::FETCH_OBJ)){
	        $qt_foto = $users->qt_foto;
	      }
	     // var_dump($qt_foto);
	  ?>
  <div class="gallery autoplay items-<?php echo $qt_foto?>" id="acabei">
    <?php 
      for($x = 0; $x < $qt_foto; $x++){
    ?>
    <div id="item-<?php echo $x?>" class="control-operator"></div>
   <?php
				}
			$mostraFotos = $con->query("SELECT * FROM imagem WHERE id_quiosque = '$cd'");
			
			while($users = $mostraFotos->fetch(PDO::FETCH_OBJ)){
		?>
    <figure class="item">
        <img id="acabei" src="<?php echo $users->img_url?>" class="img-responsive"></img>
    </figure>
    
    <?php
			}
    ?>

    <div class="controls">
      <?php 
        for($x = 0; $x < $qt_foto; $x++){
      ?>
      <a href="#item-<?php echo $x?>" class="control-button">•</a>
      <?php
        }
      ?>
    </div>
  </div>
  </fieldset>
	</div>
</div>



	<!-- Modal -->
<div id="avaliar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Avalie o Quiosque</h4>
      </div>
      <form action="confirma_avalicao.php" method="POST">
      	
      	<input type="hidden" name="codigoQuiosque" value="<?php echo $cd?>"/>
      	
        <div class="modal-body">
        	
          <div class="estrelaComida">
            <p>Qualidade da comida :</p>
            <input type="radio" name="estrelaComida" id="vazio" value="" checked/>
            
            <label for="estralaComida1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaComida" id="estralaComida1" value="1"/>
            
            <label for="estralaComida2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaComida" id="estralaComida2" value="2"/>
            
            <label for="estralaComida3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaComida" id="estralaComida3" value="3"/>
            
            <label for="estralaComida4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaComida" id="estralaComida4" value="4"/>
          
            <label for="estralaComida5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaComida" id="estralaComida5" value="5"/>
            
          </div>
          
          <div class="estrelaAreia">
            <p>Qualidade da areia :</p>
            <input type="radio" name="estrelaAreia" id="vazio" value="" checked/>
            
            <label for="estralaAreia1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAreia" id="estralaAreia1" value="1"/>
            
            <label for="estralaAreia2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAreia" id="estralaAreia2" value="2"/>
            
            <label for="estralaAreia3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAreia" id="estralaAreia3" value="3"/>
            
            <label for="estralaAreia4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAreia" id="estralaAreia4" value="4"/>
          
            <label for="estralaAreia5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAreia" id="estralaAreia5" value="5"/>
            
          </div>
          
          <div class="estrelaAtendimento">
            <p>Qualidade do atendimento :</p>
            <input type="radio" name="estrelaAtendimento" id="vazio" value="" checked/>
            
            <label for="estralaAtendimento1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAtendimento" id="estralaAtendimento1" value="1"/>
            
            <label for="estralaAtendimento2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAtendimento" id="estralaAtendimento2" value="2"/>
            
            <label for="estralaAtendimento3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAtendimento" id="estralaAtendimento3" value="3"/>
            
            <label for="estralaAtendimento4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAtendimento" id="estralaAtendimento4" value="4"/>
          
            <label for="estralaAtendimento5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaAtendimento" id="estralaAtendimento5" value="5"/>
            
          </div>
          
          <div class="estrelaLimpeza">
            <p>Qualidade da limpeza :</p>
            <input type="radio" name="estrelaLimpeza" id="vazio" value="" checked/>
            
            <label for="estralaLimpeza1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaLimpeza" id="estralaLimpeza1" value="1"/>
            
            <label for="estralaLimpeza2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaLimpeza" id="estralaLimpeza2" value="2"/>
            
            <label for="estralaLimpeza3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaLimpeza" id="estralaLimpeza3" value="3"/>
            
            <label for="estralaLimpeza4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaLimpeza" id="estralaLimpeza4" value="4"/>
          
            <label for="estralaLimpeza5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaLimpeza" id="estralaLimpeza5" value="5"/>
            
          </div>
          
          <div class="estrelaPreco">
            <p>Qualidade do preço :</p>
            <input type="radio" name="estrelaPreco" id="vazio" value="" checked/>
            
            <label for="estralaPreco1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaPreco" id="estralaPreco1" value="1"/>
            
            <label for="estralaPreco2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaPreco" id="estralaPreco2" value="2"/>
            
            <label for="estralaPreco3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaPreco" id="estralaPreco3" value="3"/>
            
            <label for="estralaPreco4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaPreco" id="estralaPreco4" value="4"/>
          
            <label for="estralaPreco5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
            <input type="radio" name="estrelaPreco" id="estralaPreco5" value="5"/>
            
          </div>
          
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block"> Enviar ! </button>
        </div>
      </form>
    </div>

  </div>
</div>

<?php	
	if($msg == "success"){
    	?>
			<script>
				$(document).ready(function() {
					$('#avaliarSucesso').modal('show');
				})
			</script>

			<?php
    }
    ?>


	<div id="avaliarSucesso" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center>
						<h4 class="modal-title"></h4>
					</center>
					<div class="modal-body">
						<center><h3 id="inputSucesso">Avaliação concluida com sucesso!</h3></center>
						<center><h2 id="inputSucesso">Obrigado !!</h2></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
<div id="modalfavoritar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4  class="modal-title">Favoritar</h4></center>
      </div>
      <form action="confirma_Favoritar.php" method="POST">
        <input type="hidden" name="favoritar" value="<?php echo $cd;?>"/>
        <div class="modal-body">
          <h3><p>Deseja realmente favoritar esse quiosque ?</p></h3>
        </div>
        <div class="modal-footer">
          <button type="submit" id="confExclusao" class="btn btn-default">Sim</button>
          <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Não</button>
        </div>
      </form>
    </div>

  </div>
</div>

<div id="modaldesfavoritar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4  class="modal-title">Desfavoritar</h4></center>
      </div>
      <form action="desfavoritar_quiosque.php" method="POST">
        <input type="hidden" name="favoritar" value="<?php echo $cd;?>"/>
        <div class="modal-body">
          <h3><p>Deseja realmente desfavoritar esse quiosque ?</p></h3>
        </div>
        <div class="modal-footer">
          <button type="submit" id="confExclusao" class="btn btn-default">Sim</button>
          <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Não</button>
        </div>
      </form>
    </div>

  </div>
</div>

</body>

</html>
<?php
}
?>