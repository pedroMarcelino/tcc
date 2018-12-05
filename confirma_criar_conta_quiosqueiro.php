<?php

        $emailQui = $_POST['emailProp'];
        $nomeQui = $_POST['nomeProp'];
        $senhaQui = $_POST['senhaProp'];
        $confSenhaQui = $_POST['senhaConfProp'];
			
		include_once "conexao.php";
		
if($senhaQui == $confSenhaQui){
				
        $stmt = $con->prepare("INSERT INTO proprietario(
        	nm_proprietario,
		nm_email,
		nm_senha) 
		VALUES('$nomeQui',
			'$emailQui',
			'$senhaQui')");
        
	$stmt->execute();
header('Location: index.php');
}
else{?>	<script>
	alert("Erro ao salvar, as senhas não correspondem!");
	</script>
<?php
	}
?>