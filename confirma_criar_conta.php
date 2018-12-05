<?php

        $emailUser = $_POST['emailUsuario'];
		$nomeUser = $_POST['nomeUsuario'];
        $senhaUser = $_POST['senhaUsuario'];
        $confSenhaUser = $_POST['senhaConfUsuario']; 
        $tipo = $_POST['tipo'];
        
        // var_dump($tipo);
			
	include_once "conexao.php";
		
	if($senhaUser == $confSenhaUser){
        	$stmt = $con->prepare("INSERT INTO pessoa(
        		nm_usuario,
			nm_email,
			nm_senha,
			ds_tipo) 
			VALUES('$nomeUser',
				'$emailUser',
				'$senhaUser',
				$tipo)");
		$stmt->execute();
		header('Location: index.php');
	}
	else{?>	<script>
	
		alert("Erro ao salvar, as senhas não correspondem!");
	
		//header('Location: index.html');
		</script>
<?php
	}
?>