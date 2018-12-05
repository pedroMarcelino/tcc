<?php

    session_start();
    $codigo = $_SESSION['codigo'];
    $id = $_GET['id'];
    
    include "conexao.php";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Acentuação -->
        <title>Visualizar fotos - Guia de Quiosques</title>
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
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	
    	<script src="js/pegandoValor.js"></script>
    	
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    
    	
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
			<?php
			
// 			var_dump($resultadoLimpeza, $resultadoLimpezaAreia, $resultadoComida, $resultadoAtendimento, $resultadoPreco);
        
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
		
		<center><h2>Fotos Cadastradas !!</h2></center>
		
        <div class="animated fadeInLeft">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            
                        // var_dump($id);
                        
    					$sql = $con->query("SELECT * FROM imagem WHERE id_quiosque = '$id'");
    					    
    					while($users = $sql->fetch(PDO::FETCH_OBJ)){
    					    $cdImagem = $users->cd_imagem;
    					    
    					?>
    						<div class="col-sm-4">
    						    <div class="thumbnail">
    						        <input type="hidden" class="imagem" id="cdImagem" value="<?php echo $cdImagem;?>">
                          <button id="excluir" class="btn btn-danger" data-toggle="modal" data-target="#excluirr"  value="<?php echo $cdImagem;?>"></button>
                          <button id="alterar" value="<?php echo $cdImagem?>" class="btn btn-warning" data-toggle="modal" data-target="#alterarr">Alterar</button>
                          <img src="<?php echo $users->img_url; ?>" class="img-responsive" id="fotoQuiosque"></img>
        				    	</div>
        					</div>
                            <?php
    						    }

							?>
                    </div>
                </div>
            </div>
        </div>
        
<div id="excluirr" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Excluir foto</h2></center>
      </div>
      <form action="excluirFoto.php" method="POST"> 
      <div class="modal-body">
        <input type="hidden" name="cdQuiosque" value="<?php echo $id;?>"/>
        <input type="hidden" name="cdImagem" id="inputExcluir" value="<?php echo $cdImagem;?>"/>
        <center><h4>Desesja mesmo <strong>Excluir</strong> essa foto?</h4></center>
      </div>
      <div class="modal-footer">
        <button type="submit" id="confExclusao" class="btn btn-default">Sim</button>
        <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Não</button>
      </div>
      </form>
    </div>

  </div>
</div>


<div id="alterarr" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Foto</h4>
      </div>
      <form action="alterarFoto.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="cdQuiosque" value="<?php echo $id;?>"/>
        <input type="hidden" id="inputAlterar" name="cdAlterar"/>
        <div class="form-group">
            <div class="fileUpload btn btn-primary">
                <span> Upload da Foto </span>
                <input type="file" name="foto" class="upload" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="confExclusao" class="btn btn-default">Alterar</button>
        <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Cancelar</button>
      </div>
      </form>
    </div>

  </div>
</div>
	</body>
</html>