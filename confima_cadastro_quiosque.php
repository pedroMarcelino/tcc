<?php

    session_start();
    $codigo= $_SESSION['codigo'];
    
    $nomeQq = $_POST['nomeQq'];
    $cnpjQq = $_POST['cnpj'];    
    $telefoneQq = $_POST['telefoneQq'];
    $enderecoQq = $_POST['enderecoQq'];
    $horaEntrada = $_POST['horaEntrada'];
    $horaSaida = $_POST['horaSaida'];
    
    $foto = "imgQuiosque/fundoQuiosque.jpg";
    
    
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $descricao = $_POST['descricaoQq'];
    
    /*========================
        ADD FOTOS MENU
        ADD FOTOS MENU
        ADD FOTOS MENU
        ADD FOTOS MENU
        ADD FOTOS MENU
        ADD FOTOS MENU
    ========================*/
    
  /*  echo "AA : ". $nomeQq;
    echo  $cnpjQq . "<br>";
    echo  $telefoneQq . "<br>";
    echo  $enderecoQq . "<br>";
    echo  $horaEntrada . "<br>";
    echo  $horaSaida . "<br>";
    echo  $estado . "<br>";
    echo  $cidade . "<br>";
    echo  $descricao . "<br>";*/
    
    include_once "conexao.php";
    
    function validar_cnpj($cnpj)
    {
    	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
    	// Valida tamanho
    	if (strlen($cnpj) != 14)
    		return false;
    	// Valida primeiro dígito verificador
    	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
    	{
    		$soma += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}
    	$resto = $soma % 11;
    	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
    		return false;
    	// Valida segundo dígito verificador
    	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
    	{
    		$soma += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}
    	$resto = $soma % 11;
    	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }


   
  
    try{
        if(validar_cnpj($cnpjQq)){
            $stmt = $con->prepare("INSERT INTO quiosque(cd_quiosque, nm_quiosque, nm_endereco, hr_quiosque_inicio, hr_quiosque_fim, nr_cnpj, ds_quiosque, tel_quiosque, id_pessoa, nm_cidade, nm_estado, img_quiosque)
            VALUES (NULL,'$nomeQq','$enderecoQq','$horaEntrada','$horaSaida','$cnpjQq','$descricao','$telefoneQq','$codigo','$cidade','$estado', '$foto ')");
                
               $stmt->execute();
               
        header('Location: perfilProprietario.php');
        
      }else{
          header('Location: perfilProprietario.php?erro=erro2');
      }
    }
  catch(Exception $e){?>
        <script>
	        alert("Erro ao salvar, as senhas não correspondem!");
	    </script>
    <?php
  }

        
    
?>