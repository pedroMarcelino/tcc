<?php
    session_start();
    $codigo= $_SESSION['codigo'];
    if(!isset($_SESSION['codigo'])){
        header('Location: /siteoficial/');
        exit();
    }
    
    include "conexao.php";
    
    $sql = $con->query("SELECT * FROM pessoa WHERE cd_pessoa ='$codigo'");
    
    while($users2 = $sql->fetch(PDO::FETCH_OBJ)){
        
        $emailProp = $users2->nm_email;
        $nomeProp = $users2->nm_usuario;
        $caminho = $users2->img_usuario;
    
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
    <title>Perfil Propietário - Guia de Quiosques</title>
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
    <nav class="navbar navbar-inverse" id="perfil">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="col-md-4">
                    <img src="imgCadastrada/<?php echo $caminho?>" class="img-responsive" id="fotoUser"></img>
                </div>
            </div>
            <div class="col-sm-4" id="exibirInformacoes">
                <li>Nome : <?php echo $nomeProp;?></li>
                <li>Tipo : Proprietário</li>
            </div>
            <hr id="hrPerfil">
            <ul class="nav navbar-nav navbar-right" id="positionNav">
                <li><a id="navEdit" href="#">Editar Perfil</a></li>
                <li><a id="navCad" href="#">Cadastrar Quiosque</a></li>
                <li><a id="navMyQq" href="#">Meus Quiosques</a></li>
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
		
		if($msg == "erro2"){
			?>
			<script>
				$(document).ready(function() {
					$('#modalErro2').modal('show');
				})
			</script>

			<?php	
		$msg = "";
		}
		?>
    
<form action="confima_cadastro_quiosque.php" method="POST">
    <div id="Cad">
        <div class="animated fadeInLeft">
            <div class="container-fluid">
                <div class="animated shake" id="alerta">
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>IMPORTANTE!</strong> Após ter feito o cadastro do Quiosque insira as imagens em  "MEUS QUIOSQUE" -> "ALTERAR".
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="informacoesQuiosque">
                            <legend>Informações do Quiosque</legend>

                            <div class="form-group">
                                <label class="control-label" for="name">Nome :</label>&emsp;&emsp;&emsp; <i id="ita">(Será acrescentado a palavra QUIOSQUE antes do nome)</i>
                                <input name="nomeQq" type="text" id="nome" maxlength="50" class="form-control" placeholder="Digite o nome do Quiosque" required/>
                            </div>
                            <!-- #mark cnpj -->
                            <div class="form-group">
                                <label for="cnpj">CNPJ :</label>
                                <input name="cnpj" id="cnpj" type="text" maxlength="19" class="form-control" placeholder="Digite o CNPJ" required/>
                            </div>

                            <div class="form-group">
                                <label for="Telefone">Telefone :</label>
                                <input name="telefoneQq" type="text" class="form-control" id="telefone" placeholder="Ex.: 13 8847-4444"  maxlength="12">
                            </div>

                            <div class="form-group">
                                <label for="hora-cons">Horário de funcionamento: </label>
                                <input name="horaEntrada" id="hora-cons" type="time" name="hora-cons" value="--:--">
                            </div>

                            <div class="form-group">
                                <label for="hora-cons">Horário de encerramento: </label>
                                <input name="horaSaida" id="hora-cons" type="time" name="hora-cons" value="--:--">
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-sm-6">
                        <fieldset id="informacoesLugar">
                            <legend>Onde Fica ?</legend>
                            <div class="form-group">
                                <label style="margin-top: 1px;">Estado :</label>
                                <select name="estado" class="form-control">
                                    <option value="">Selecione um estado</option>
    								<option name="sp" value="SP - São Paulo">São Paulo</option>
    							</select>
                                <label style="margin-top: 13px;">Cidade :</label>
                                <select name="cidade" class="form-control">
                                    <option value="">Selecione uma cidade</option>
    								<option value="Santos">Santos</option>
    								<option value="Guarujá">Guarujá</option>
    								<option value="Praia Grande" disabled >Praia Grande</option>
    								<option value="São Vicente">São Vicente</option>
    								<option value="Itanhaém">Itanhaém</option>
    								<option value="Bertioga">Bertioga</option>
    								<option value="Peruíbe">Peruíbe</option>
    								<option value="Mongaguá">Mongaguá</option>
    							</select>
                            </div>
                            
                            <div class="form-group">
                                <label for="endereco">Endereço : </label>&emsp;&emsp;&emsp; <i id="ita">(Insira o endereço seguido de virgula e número para facilitar a busca)</i></label>
                                <input name="enderecoQq" type="text" maxlength="50" class="form-control" placeholder="Digite seu endereço" required/>
                            </div>
                        </fieldset>

                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="Cad2">
        <div class="animated fadeInLeft">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="descricaoQuiosque">
                            <legend>Descrição do Quiosque</legend>
                            <div class="form-group shadow-textarea">
                                <textarea name="descricaoQq" maxlength="5000" style="resize: none; text-align: justify;" class="form-control z-depth-1" rows="9" placeholder="Ex.: Este quiosque oferece total conforto e qualidade, desde a estrutura, até as refeições feitas à você! Aceitamos cartão e cobramos o consumo por pessoa! Venha nos visitar!"></textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="buttons-cadasto">
                            <input id="buttonCadastroQuiosque" type="submit" name="tcadastrar" value="CADASTRAR" />
                            <input id="buttonLimparQuiosque" type="reset" name="tlimpar" value="LIMPAR" />
                            <input id="buttonVoltarQuiosque" type="button" name="tvoltar" value="VOLTAR" onclick="javascript: location.href='proprietarioLogado.php'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
   
    
    <div id="editPerfil">
    <div class="animated fadeInLeft">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="confima_alterar_perfil.php" method="POST" enctype="multipart/form-data">
                        <fieldset id="ediatarPerfil">
                            <center><legend>Editar Perfil</legend></center>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nome :</label>
                                            <input name="alterName" type="text" maxlength="50" class="form-control" value="<?php echo $nomeProp; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input name="" type="text" maxlength="50" class="form-control" value="<?php echo $emailProp; ?>" readonly/>
                                        </div>
                                        <label for="ftProprietario">Foto Proprietario :</label>
                                        <div class="fileUpload btn btn-primary">
                                            <span> Upload da Foto </span>
                                            <input type="file" name="fotoUsuario" class="upload" value />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Trocar Senha :</label>
                                            <input name="senhaNova" type="password" maxlength="50" class="form-control" placeholder="Digite sua nova senha" />
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Digite novamente :</label>
                                            <input name="confSenhaNova" type="password" maxlength="50" class="form-control" placeholder="Confirme sua nova senha"/>
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <div class="buttons-perfil">
                            <input id="buttonAlterarQuiosque" type="submit" name="tcadastrar" value="ALTERAR" />
                            <input id="buttonLimparQuiosque" type="reset" name="tlimpar" value="LIMPAR" />
                        </div>
                    </form>
                </div>
            </div>
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
	
	<div id="modalErro2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center>
						<h4 class="modal-title"></h4>
					</center>
					<div class="modal-body">
						<center><h3 id="inputErro">Verifique o campo do CNPJ!</h3></center>
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
        
   
   <div id="meuQuiosque">   <!-- #mark -->
       <div class="animated fadeInLeft">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
						
				// 		$sql2 = $con->query("SELECT * FROM imagem WHERE id_quiosque = '$cdQuiosque'");
    					    
    // 					    while($users2 = $sql2->fetch(PDO::FETCH_OBJ)){
    // 					        $fotoQuiosque = $users2->img_url;
    // 					        var_dump($fotoQuiosque);
    // 					    }
    					
    // 					    if($fotoQuiosque == ""){
    // 					        $fotoQuiosque = 'fundoQuiosque.jpg';
    // 					    }

    					$sql = $con->query("SELECT * FROM quiosque WHERE id_pessoa = '$codigo'");
    					    
    					while($users = $sql->fetch(PDO::FETCH_OBJ)){
    					    $cdQuiosque = $users->cd_quiosque;
    					    
    					    
    					    
    					       
    					?>    <!-- #mark btnAlt -->
    						<div class="col-sm-4">
    						    <div class="thumbnail">
    						        <input type="hidden" name="cdQuiosque" value="<?php echo $cdQuiosque;?>">
    						  	    <!--<button type="button" id="btnExcluir" data-toggle="modal" data-target="#modalExcluir" class="btn btn-default" value="<?php// echo $cdQuiosque;?>">Excluir</button>-->
    						  	    <!--    <button onclick="window.location.href='alterCadastro.php?id=<?php// echo $cdQuiosque; ?>';" type="submit" id="btnAlterar" class="btn btn-default">Alterar</button>-->
    						  	    
    						  	    <button onclick="window.location.href='alterarQuiosque.php?id=<?php echo $cdQuiosque; ?>';" class="btn btn-default btn-block" id="alterarBtn">Informações</button>
    						  	    
							        <center><p class="pEstilo"><?php echo $users->nm_quiosque; ?></p></center>
							        <a href="buscaQuisquioque.php?id=<?php echo $users->cd_quiosque;?>">
          						        <img src="<?php echo $users->img_quiosque; ?>" class="img-responsive" id="fotoQuiosque"></img>
          						    <div class="caption">
          							    <center><p><?php echo $users->nm_endereco;?></p>
          							    <p>Das <?php echo $users->hr_quiosque_inicio; ?> às <?php echo $users->hr_quiosque_fim; ?></p></center>
          							    <!--<p><?php echo $cdQuiosque;?></p>-->
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
    </div>  
    
<div id="modalExcluir" class="modal" role="dialog">
  <div class="animated fadeInUp">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><h4 class="modal-title">Excluir</h4></center>
      </div>
      <form action="excluirQuiosque.php" method="POST">
      <div class="modal-body">
          
          <input type="hidden" name="cdQuiosque" id="valor"/>
          <?php
            $sql = $con->query("SELECT * FROM quiosque WHERE cd_quiosque = '$cdQuiosque'");

    		while($users = $sql->fetch(PDO::FETCH_OBJ)){
    		
          ?>
          
          <h3>Deseja realmente EXCLUIR esse Quiosque<h3>
      </div>
      <div class="modal-footer">
        <button type="submit" id="confExclusao" class="btn btn-default">Sim</button>
        <button type="" id="cancelExclusao" data-dismiss="modal" class="btn btn-default">Não</button>
      </div>
      </form>
    </div>
    <?php
    	}
    ?>

  </div>
  </div>
</div>

</body>
</html>