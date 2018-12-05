<?php
    session_start();
    $codigo= $_SESSION['codigo'];
    if(!isset($_SESSION['codigo'])){
        header('Location: /siteoficial/');
        exit();
    }
    
    $cd = $_GET['id'];
    
    include "conexao.php";
    
    $sql = $con->query("SELECT * FROM quiosque WHERE cd_quiosque ='$cd'");
    
    while($users = $sql->fetch(PDO::FETCH_OBJ)){
    
    
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
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
	<script>
	    $(document).ready(function() {
    $("#gate option[value='<?php echo $users->nm_cidade; ?>']").prop('selected', true);
    // you need to specify id of combo to set right combo, if more than one combo
});
	</script>
	
	<form action="alterar_quiosque.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="informacoesQuiosque">
                            <legend>Informações do Quiosque</legend>

                            <div class="form-group">
                                <input type="hidden" name="cdQuiosque" value="<?php echo $cd ?>"/>
                                <label class="control-label" for="name">Nome :</label>&emsp;&emsp;&emsp; <i id="ita">(Será acrescentado a palavra QUIOSQUE antes do nome)</i>
                                <input name="nomeQq" type="text" maxlength="50" class="form-control" placeholder="Digite o nome do Quiosque" value="<?php echo $users->nm_quiosque; ?>" required/>
                            </div>
                            <!-- #mark cnpj -->
                            <div class="form-group">
                                <label for="cnpj">CNPJ :</label>
                                <input name="cnpj" type="text" maxlength="19" class="form-control" placeholder="Digite o CNPJ" value="<?php echo $users->nr_cnpj; ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="Telefone">Telefone :</label>
                                <input name="telefoneQq" type="text" class="form-control" value="<?php echo $users->tel_quiosque; ?>" name="telefone" placeholder="Ex.: 13 8847-4444" OnKeyPress="formatar('## ####-####', this)" maxlength="12">
                            </div>

                            <div class="form-group">
                                <label for="hora-cons">Horário de funcionamento: </label>
                                <input name="horaEntrada" id="hora-cons" type="time" name="hora-cons" value="<?php echo $users->hr_quiosque_inicio; ?>">
                                &emsp;&emsp;&emsp;
                                <label for="ftProprietario">Foto Quiosque :</label>
                                        <div class="fileUpload btn btn-primary">
                                            <span> Upload da Foto </span>
                                            <input type="file" name="fotoQuiosque" class="upload" value />
                                        </div>
                            </div>

                            <div class="form-group">
                                <label for="hora-cons">Horário de encerramento: </label>
                                <input name="horaSaida" id="hora-cons" type="time" name="hora-cons" value="<?php echo $users->hr_quiosque_fim; ?>">
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
    								<option selected name="sp" value="SP - São Paulo">São Paulo</option>
    							</select>
                                <label style="margin-top: 13px;">Cidade :</label>
                                <select id="gate" name="cidade" class="form-control">
                                    <option value="">Selecione uma cidade</option>
    								<option value="Santos">Santos</option>
    								<option value="Guarujá">Guarujá</option>
    								<option value="Praia Grande">Praia Grande</option>
    								<option value="São Vicente">São Vicente</option>
    								<option value="Itanhaém">Itanhaém</option>
    								<option value="Bertioga">Bertioga</option>
    								<option value="Peruíbe">Peruíbe</option>
    								<option value="Mongaguá">Mongaguá</option>
    							</select>
                            </div>
                            
                            <div class="form-group">
                                <label for="endereco">Endereço : </label>&emsp;&emsp;&emsp; <i id="ita">(Insira o endereço seguido de virgula e número para facilitar a busca)</i></label>
                                <input name="enderecoQq" type="text" maxlength="50" class="form-control" value="<?php echo $users->nm_endereco; ?>" placeholder="Digite seu endereço" required/>
                            </div>
                        </fieldset>

                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="descricaoQuiosque">
                            <legend>Descrição do Quiosque</legend>
                            <div class="form-group shadow-textarea">
                                <textarea name="descricaoQq" maxlength="5000" style="resize: none; text-align: justify;" class="form-control z-depth-1" rows="9" placeholder="Ex.: Este quiosque oferece total conforto e qualidade, desde a estrutura, até as refeições feitas à você! Aceitamos cartão e cobramos o consumo por pessoa! Venha nos visitar!"><?php echo $users->ds_quiosque;?></textarea>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset id="descricaoFotos">
                            <legend>Descrição em Fotos</legend>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="fileUpload btn btn-primary">
                                        <span> Upload da Foto </span>
                                        <input type="file" name="foto1" class="upload" />
                                    </div>
                                </div>
                            <!--    <div class="form-group">-->
                            <!--        <div class="fileUpload btn btn-primary">-->
                            <!--            <span> Upload da Foto </span>-->
                            <!--            <input type="file" name="foto2" class="upload" />-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="form-group">-->
                            <!--        <div class="fileUpload btn btn-primary">-->
                            <!--            <span> Upload da Foto </span>-->
                            <!--            <input type="file" name="foto3" class="upload" />-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-sm-3" id="descricaoftparte2">-->
                            <!--    <div class="form-group">-->
                            <!--        <div class="fileUpload btn btn-primary">-->
                            <!--            <span> Upload da Foto </span>-->
                            <!--            <input type="file" name="foto4" class="upload" />-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="form-group">-->
                            <!--        <div class="fileUpload btn btn-primary">-->
                            <!--            <span> Upload da Foto </span>-->
                            <!--            <input type="file" name="foto5" class="upload" />-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="form-group">-->
                            <!--        <div class="fileUpload btn btn-primary">-->
                            <!--            <span> Upload da Foto </span>-->
                            <!--            <input type="file" name="foto6" class="upload" />-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
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
                            <input id="buttonCadastroQuiosque" type="submit" name="tcadastrar" value="ALTERAR" />
                            <input id="buttonLimparQuiosque" type="reset" name="tlimpar" value="LIMPAR" />
                            <input id="buttonVoltarQuiosque" type="button" name="tvoltar" value="VOLTAR" onclick="javascript: location.href='proprietarioLogado.php'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
<?php
    }
?>
</html>