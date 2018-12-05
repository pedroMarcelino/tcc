<?php

// QUERYS SOMA 

// SELECT sum(vl_limpeza) from avaliacao where id_quiosque = cdQuiosque

// QUERY COUNT

// SELECT COUNT( * ) FROM avaliacao WHERE id_quiosque = 17

    session_start();
    $codigo = $_SESSION['codigo'];
    $rsDivisao = "1";
    $rsPreco = "1";
    $rsLimpeza = "1";
    $rsLimpezaAreia = "1";
    $rsComida = "1";
    $rsAtendimento = "1";
    
    // var_dump($rsLimpezaAreia, $rsDivisao );
    
    $cdQuiosque = $_GET['id'];
    // var_dump($cdQuiosque);
    include "conexao.php";
    
    $cidadeEstado = $con->query("SELECT nm_cidade, nm_estado FROM quiosque WHERE cd_quiosque = '$cdQuiosque'");
    
    while($users = $cidadeEstado->fetch(PDO::FETCH_OBJ)){
        $cidade = $users->nm_cidade;
        $estado = $users->nm_estado;
    }    
    
    switch($estado){
        case "SP - São Paulo":
            $saoPaulo = "selected";
        break;
    }
    
    switch($cidade){
        case "Santos":
            $santos = "selected";
        break;
        
        case "Guarujá":
            $guaruja = "selected";
        break;
        
        case "Praia Grande":
            $praiaGrande = "selected";
        break;
        
        case "São Vicente":
            $saoVicente = "selected";
        break;
        
        case "Itanhaém":
            $itanhaem = "selected";
        break;
        
        case "Bertioga":
            $bertioga = "selected";
        break;
        
        case "Peruíbe":
            $peruibe = "selected";
        break;
        
        case "Mongaguá":
            $mongagua = "selected";
        break;
    }
    // sum(vl_limpeza)
    $limpeza = $con->query("SELECT sum(vl_limpeza) limpeza from avaliacao where id_quiosque = '$cdQuiosque'");
    
    while($users = $limpeza->fetch(PDO::FETCH_OBJ)){
        $rsLimpeza = $users->limpeza; 
    }
    
    $limpezaAreia = $con->query("SELECT sum(vl_limpeza_areia) limpezaAreia from avaliacao where id_quiosque = '$cdQuiosque'");
    
    while($users = $limpezaAreia->fetch(PDO::FETCH_OBJ)){
        $rsLimpezaAreia = $users->limpezaAreia; 
    }
    
    $comida = $con->query("SELECT sum(vl_qualidade_comida) comida from avaliacao where id_quiosque = '$cdQuiosque'");
    
    while($users = $comida->fetch(PDO::FETCH_OBJ)){
        $rsComida = $users->comida; 
    }
    
    $atendimento = $con->query("SELECT sum(vl_qualidade_atendimento) atendimento from avaliacao where id_quiosque = '$cdQuiosque'");
    
    while($users = $atendimento->fetch(PDO::FETCH_OBJ)){
        $rsAtendimento = $users->atendimento; 
    }
    
    $preco = $con->query("SELECT sum(vl_preco) preco from avaliacao where id_quiosque = '$cdQuiosque'");
    
    while($users = $preco->fetch(PDO::FETCH_OBJ)){
        $rsPreco = $users->preco; 
    }
    
    $divisao = $con->query("SELECT COUNT( * ) divisao FROM avaliacao WHERE id_quiosque = '$cdQuiosque'");
    
    while($users = $divisao->fetch(PDO::FETCH_OBJ)){
        $rsDivisao = $users->divisao; 
    }
    
    
    if($rsLimpezaAreia == ""){
        $areiaUm = "checked";
    }else{
        $resultadoLimpezaAreia = ($rsLimpezaAreia/$rsDivisao);
    }
    if($rsComida == ""){
        $comidaUm = "checked";
    }else{
        $resultadoComida = ($rsComida/$rsDivisao);
    }
    if($rsAtendimento == ""){
        $atendimentoUm = "checked";
    }else{
        $resultadoAtendimento = ($rsAtendimento/$rsDivisao);
    }
    if($rsPreco == ""){
        $precoUm = "checked";
    }else{
        $resultadoPreco = ($rsPreco/$rsDivisao);
    }
    if($rsLimpeza == ""){
        $limpezaUm = "checked";
    }else{
        $resultadoLimpeza = ($rsLimpeza/$rsDivisao);
    }
    if($rsDivisao == ""){
        $rsDivisao = "1";
    }
    
    if($resultadoLimpeza > 0 && $resultadoLimpeza < 1 ){
        $limpezaUm = "checked";        
    }
    if($resultadoLimpeza >= 1 && $resultadoLimpeza < 2 ){
        $limpezaUm = "checked";        
    }
    if($resultadoLimpeza >= 2 && $resultadoLimpeza < 3 ){
        $limpezaDois = "checked";        
    }
    if($resultadoLimpeza >= 3 && $resultadoLimpeza < 4 ){
        $limpezaTres = "checked";        
    }
    if($resultadoLimpeza >= 4 && $resultadoLimpeza < 5 ){
        $limpezaQuatro = "checked";        
    }
    if($resultadoLimpeza >= 5){
        $limpezaCinco = "checked";        
    }
    
    
    
    if($resultadoLimpezaAreia >= 0 && $resultadoLimpezaAreia < 1 ){
        $areiaUm = "checked";        
    }
    if($resultadoLimpezaAreia >= 1 && $resultadoLimpezaAreia < 2 ){
        $areiaUm = "checked";        
    }
    if($resultadoLimpezaAreia >= 2 && $resultadoLimpezaAreia < 3 ){
        $areiaDois = "checked";        
    }
    if($resultadoLimpezaAreia >= 3 && $resultadoLimpezaAreia < 4 ){
        $areiaTres = "checked";        
    }
    if($resultadoLimpezaAreia >= 4 && $resultadoLimpezaAreia < 5 ){
        $areiaQuatro = "checked";        
    }
    if($resultadoLimpezaAreia >= 5){
        $areiaCinco = "checked";        
    }
    
    
    
    if($resultadoComida >= 0 && $resultadoComida < 1 ){
        $comidaUm = "checked";        
    }
    if($resultadoComida >= 1 && $resultadoComida < 2 ){
        $comidaUm = "checked";        
    }
    if($resultadoComida >= 2 && $resultadoComida < 3 ){
        $comidaDois = "checked";        
    }
    if($resultadoComida >= 3 && $resultadoComida < 4 ){
        $comidaTres = "checked";        
    }
    if($resultadoComida >= 4 && $resultadoComida < 5 ){
        $comidaQuatro = "checked";        
    }
    if($resultadoComida >= 5){
        $comidaCinco = "checked";        
    }
    
    
    
    if($resultadoAtendimento >= 0 && $resultadoAtendimento < 1 ){
        $atendimentoUm = "checked";        
    }
    if($resultadoAtendimento >= 1 && $resultadoAtendimento < 2 ){
        $atendimentoUm = "checked";        
    }
    if($resultadoAtendimento >= 2 && $resultadoAtendimento < 3 ){
        $atendimentoDois = "checked";        
    }
    if($resultadoAtendimento >= 3 && $resultadoAtendimento < 4 ){
        $atendimentoTres = "checked";        
    }
    if($resultadoAtendimento >= 4 && $resultadoAtendimento < 5 ){
        $atendimentoQuatro = "checked";        
    }
    if($resultadoAtendimento >= 5){
        $atendimentoCinco = "checked";        
    }
    
    
    
    if($resultadoPreco >= 0 && $resultadoPreco < 1 ){
        $precoUm = "checked";        
    }
    if($resultadoPreco >= 1 && $resultadoPreco < 2 ){
        $precoUm = "checked";        
    }
    if($resultadoPreco >= 2 && $resultadoPreco < 3 ){
        $precoDois = "checked";        
    }
    if($resultadoPreco >= 3 && $resultadoPreco < 4 ){
        $precoTres = "checked";        
    }
    if($resultadoPreco >= 4 && $resultadoPreco < 5 ){
        $precoQuatro = "checked";        
    }
    if($resultadoPreco >= 5){
        $precoCinco = "checked";        
    }
    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- -->
        <meta charset="utf-8"/>
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
		
		<?php 
		    $query = $con->query("SELECT * FROM quiosque WHERE cd_quiosque = '$cdQuiosque'");
		    
		    while($users = $query->fetch(PDO::FETCH_OBJ)){
		        $nomeQuiosque = $users->nm_quiosque;
		?>
		
		
		<div class="container-fluid">
		    <div class="col-sm-3">
		        <div id="boxPerfil">
		            <button class="btn btn-default btn-block" id="btnDeleta" data-toggle="modal" data-target="#modalExcluir"> Deletar</button>
		             <center><h2><?php echo $users->nm_quiosque?></h2></center>
		             <a href="buscaQuisquioque.php?id=<?php echo $users->cd_quiosque; ?>">
		            <center><img id="fotoQuiosquePerfil" class="img-responsive" src="<?php echo $users->img_quiosque?>"></img></center>
		            </a>
		            <center><h4><?php echo $users->nm_endereco?></h4></center>
		            <form action="alterar_quiosque.php" method="POST" enctype="multipart/form-data">
		            <div class="form-group">
                        <div id="editfoto" class="fileUpload btn btn-primary btn-block">
                            <span>Editar foto</span>
                            <input type="file" name="fotoQuiosque" class="upload" />
                        </div>
                    </div>
		        </div>
		    </div>
		    <div class="col-sm-9">
		        
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <fieldset id="informacoesQuiosque">
                                    <legend>Informações do Quiosque</legend>
        
                                    <div class="form-group">
                                        <input type="hidden" name="cdQuiosque" value="<?php echo $cdQuiosque ?>"/>
                                        <label class="control-label" for="name">Nome :</label>&emsp;&emsp; <i id="ita">(Será acrescentado a palavra QUIOSQUE antes do nome)</i>
                                        <input name="nomeQq" type="text" maxlength="50" class="form-control" placeholder="Digite o nome do Quiosque" value="<?php echo $users->nm_quiosque; ?>" required/>
                                    </div>
                                    <!-- #mark cnpj -->
                                    <div class="form-group">
                                        <label for="cnpj">CNPJ :</label>
                                        <input name="cnpj" type="text" class="form-control" placeholder="Digite o CNPJ" value="<?php echo $users->nr_cnpj?>" disabled>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="Telefone">Telefone :</label>
                                        <input name="telefoneQq" type="text" class="form-control" value="<?php echo $users->tel_quiosque; ?>" name="telefone" placeholder="Ex.: 13 8847-4444" OnKeyPress="formatar('## ####-####', this)" maxlength="12">
                                    </div>
        
                                    <div class="form-group">
                                        <label for="hora-cons">Horário de funcionamento: </label>
                                        <input name="horaEntrada" id="hora-cons" type="time" name="hora-cons" value="<?php echo $users->hr_quiosque_inicio; ?>">
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
            								<option name="sp" <?php echo $saoPaulo?> value="SP - São Paulo">São Paulo</option>
            							</select>
                                        <label style="margin-top: 13px;">Cidade :</label>
                                        <select name="cidade" class="form-control">
                                            <option value="">Selecione uma cidade</option>
            								<option value="Santos" <?php echo $santos?>>Santos</option>
            								<option value="Guarujá" <?php echo $guaruja?>>Guarujá</option>
            								<option value="Praia Grande" <?php echo $praiagrnade?>disabled >Praia Grande</option>
            								<option value="São Vicente" <?php echo $saoVicente?>>São Vicente</option>
            								<option value="Itanhaém" <?php echo $itanhaem?>>Itanhaém</option>
            								<option value="Bertioga" <?php echo $bertioga?>>Bertioga</option>
            								<option value="Peruíbe" <?php echo $peruibe?>>Peruíbe</option>
            								<option value="Mongaguá" <?php echo $mongagua?>>Mongaguá</option>
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
        </div>

		<div class="container-fluid">
		    <div class="col-sm-3">
		        <div id="boxAvaliacao">
		            <center><h2>Media de avaliações</h2></center>
		            <div class="estrelaComida">
                        <p>Comida :</p>
                        <input type="radio" name="estrelaComida" id="vazio" value="" checked/>
                        
                        <label for="estralaComida1" ><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $comidaUm ?> type="radio" name="estrelaComida" id="estralaComida1" disabled="disabled" value="1"/>
                        
                        <label for="estralaComida2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $comidaDois ?> type="radio" name="estrelaComida" id="estralaComida2" disabled="disabled" value="2"/>
                        
                        <label for="estralaComida3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $comidaTres ?> type="radio" name="estrelaComida" id="estralaComida3" disabled="disabled" value="3" />
                        
                        <label for="estralaComida4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $comidaQuatro ?> type="radio" name="estrelaComida" id="estralaComida4" disabled="disabled" value="4"/>
                        
                        <label for="estralaComida5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $comidaCinco ?> type="radio" name="estrelaComida" id="estralaComida5" disabled="disabled" value="5"/>
                        
                    </div>
                          
                    <div class="estrelaAreia">
                        <p>Areia :</p>
                        <input type="radio" name="estrelaAreia" id="vazio" value="" checked/>
                        
                        <label for="estralaAreia1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $areiaUm?> type="radio" name="estrelaAreia" id="estralaAreia1" disabled="disabled" value="1"/>
                        
                        <label for="estralaAreia2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $areiaDois?> type="radio" name="estrelaAreia" id="estralaAreia2" disabled="disabled" value="2"/>
                        
                        <label for="estralaAreia3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $areiaTres?> type="radio" name="estrelaAreia" id="estralaAreia3" disabled="disabled" value="3"/>
                         
                        <label for="estralaAreia4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $areiaQuatro?> type="radio" name="estrelaAreia" id="estralaAreia4" disabled="disabled" value="4"/>
                        
                        <label for="estralaAreia5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $areiaCinco?> type="radio" name="estrelaAreia" id="estralaAreia5" disabled="disabled" value="5"/>
                            
                    </div>
                          
                    <div class="estrelaAtendimento">
                        <p>Atendimento :</p>
                        <input type="radio" name="estrelaAtendimento" id="vazio" value="" checked/>
                        
                        <label for="estralaAtendimento1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $atendimentoUm?> type="radio" name="estrelaAtendimento" id="estralaAtendimento1" disabled="disabled" value="1"/>
                        
                        <label for="estralaAtendimento2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $atendimentoDois?> type="radio" name="estrelaAtendimento" id="estralaAtendimento2" disabled="disabled" value="2"/>
                        
                        <label for="estralaAtendimento3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $atendimentoTres?> type="radio" name="estrelaAtendimento" id="estralaAtendimento3" disabled="disabled" value="3"/>
                        
                        <label for="estralaAtendimento4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $atendimentoQuatro?> type="radio" name="estrelaAtendimento" id="estralaAtendimento4" disabled="disabled" value="4"/>
                        
                        <label for="estralaAtendimento5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $atendimentoCinco?> type="radio" name="estrelaAtendimento" id="estralaAtendimento5" disabled="disabled" value="5"/>
                            
                    </div>
                    
                    <div class="estrelaLimpeza">
                        <p>Limpeza :</p>
                        <input type="radio" name="estrelaLimpeza" id="vazio" value="" checked/>
                        
                        <label for="estralaLimpeza1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $limpezaUm?> type="radio" name="estrelaLimpeza" id="estralaLimpeza1" disabled="disabled" value="1"/>
                        
                        <label for="estralaLimpeza2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $limpezaDois?> type="radio" name="estrelaLimpeza" id="estralaLimpeza2" disabled="disabled" value="2"/>
                        
                        <label for="estralaLimpeza3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $limpezaTres?> type="radio" name="estrelaLimpeza" id="estralaLimpeza3" disabled="disabled" value="3"/>
                        
                        <label for="estralaLimpeza4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $limpezaQuatro?> type="radio" name="estrelaLimpeza" id="estralaLimpeza4" disabled="disabled" value="4"/>
                        
                        <label for="estralaLimpeza5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $limpezaCinco?> type="radio" name="estrelaLimpeza" id="estralaLimpeza5" disabled="disabled" value="5"/>
                        
                    </div>
                          
                    <div class="estrelaPreco">
                        <p>Preço :</p>
                        <input type="radio" name="estrelaPreco" id="vazio" value="" checked/>
                        
                        <label for="estralaPreco1"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input  <?php echo $precoUm ?> type="radio" name="estrelaPreco" id="estralaPreco1" disabled="disabled" value="1"/>
                        
                        <label for="estralaPreco2"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $precoDois ?> type="radio" name="estrelaPreco" id="estralaPreco2" disabled="disabled" value="2"/>
                        
                        <label for="estralaPreco3"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $precoTres ?> type="radio" name="estrelaPreco" id="estralaPreco3" disabled="disabled" value="3"/>
                        
                        <label for="estralaPreco4"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $precoQuatro ?> type="radio" name="estrelaPreco" id="estralaPreco4" disabled="disabled" value="4"/>
                        
                        <label for="estralaPreco5"><i class="fa fa-star-o" style="font-size:23px"></i></label>
                        <input <?php echo $precoCinco ?> type="radio" name="estrelaPreco" id="estralaPreco5" disabled="disabled" value="5"/>
                        
                    </div>
		        </div>
		    </div>
		    <div class="col-sm-9">
		        <div class="row">
                    <div class="col-sm-6">
                        <fieldset id="descricaoQuiosque">
                            <legend>Descrição do Quiosque</legend>
                            <div class="form-group shadow-textarea">
                                <textarea name="descricaoQq" maxlength="5000" style="resize: none; text-align: justify;" class="form-control z-depth-1" rows="9" placeholder="Ex.: Este quiosque oferece total conforto e qualidade, desde a estrutura, até as refeições feitas à você! Aceitamos cartão e cobramos o consumo por pessoa! Venha nos visitar!"><?php echo $users->ds_quiosque;?></textarea>
                            </div>
                        </fieldset>
                    </div>
                    <div class="fotos">
                    <div class="col-sm-6">
                        <fieldset id="descricaoFotos">
                            <legend>Descrição em Fotos</legend>
                            <a href="visualizarFotos.php?id=<?php echo $cdQuiosque?>" id="visualizar" type="button" class="btn btn-default btn-block">Visualizar Fotos</a>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="fileUpload btn btn-primary">
                                        <span> Upload da Foto </span>
                                        <input type="file" name="foto1" class="upload" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fileUpload btn btn-primary">
                                        <span> Upload da Foto </span>
                                        <input type="file" name="foto2" class="upload" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" id="descricaoftparte2">
                                <div class="form-group">
                                    <div class="fileUpload btn btn-primary">
                                        <span> Upload da Foto </span>
                                        <input type="file" name="foto3" class="upload" />
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="fileUpload btn btn-primary">
                                        <span> Upload da Foto </span>
                                        <input type="file" name="foto4" class="upload" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    </div>
                </div>
            </div>
		    </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="buttons-cadasto">
                        <button id="buttonCadastroQuiosque" type="submit" name="tcadastrar">Alterar</button>
                        <input id="buttonLimparQuiosque" type="reset" name="tlimpar" value="LIMPAR" />
                        <input id="buttonVoltarQuiosque" type="button" name="tvoltar" value="VOLTAR" onclick="javascript: location.href='proprietarioLogado.php'" />
                    </div>
                </div>
            </div>
        </div>
		</div>
		
		</form>
	       
		<?php
		    }
		?>
		
		<div id="modalExcluir" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="excluirQuiosque.php" method="POST">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Excluir Quiosque</h4>
                        </div>
                        <div class="modal-body">
                            <p class="pEstilo">Deseja realmente excluir <strong><?php echo $nomeQuiosque;?></strong> </p>
                            <input type="hidden" name="cdQuiosque" value="<?php echo $cdQuiosque?>"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="confExclusao">Sim</button>
                            <button type="button" class="btn btn-default" id="cancelExclusao" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>