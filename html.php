<?php
session_start();
    $codigo= $_SESSION['codigo'];
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
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
<script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/edge/stylesheets/locastyle.css">
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/edge/javascripts/locastyle.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<header>
		<?php
			if(!session_start())session_start();
			if($codigo == ""){
				include "headerDeslogado.php";
			}
			if($_SESSION['tipo'] == "proprietario"){
				include "headerProprietario.php";
			}
			if($_SESSION['tipo'] == "usuario"){
				include "headerUsuario.php";
			}
			
		?>
	</header>

	<div class="container-fluid" id="menuLateral">
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item active"><i class="fa fa-cidades"></i> <span>Cidades da Baixada Santista </span></a>
					<a href="praiaGrande.php" class="list-group-item"><i class="fa fa-praia-grande"></i> <span>Praia Grande</span></a>
					<a href="mongagua.php" class="list-group-item"><i class="fa fa-monagua"></i> <span>Mongaguá</span></a>
					<a href="itanhaem.php" class="list-group-item"><i class="fa fa-itanhae,"></i>Itanhaém<span></span></a>
					<a href="santos.php" class="list-group-item"><i class="fa fa-santos"></i> <span>Santos</span></a>
					<a href="guaruja.php" class="list-group-item"><i class="fa fa-guaruja"></i> <span>Guarujá</span></a>
					<a href="peruibe.php" class="list-group-item"><i class="fa fa-peruibe"></i> <span>Peruíbe</span></a>
					<a href="saoVicente.php" class="list-group-item"><i class="fa fa-sao-vicente"></i> <span>São Vicente</span></a>
				</div>
			</div>
		</div>
	</div>

</body>

</html>


<script>
	//var senha = document.getElementByName('senhaUsuario').value;
	//var confSenha = document.getElementByName('senhaConfUsuario').value;


	function validaConfSenha() {
		if (document.getElementsByName('senhaUsuario').value == document.getElementsByName('senhaConfUsuario').value) {
			alert('Sucesso!');
			header('Location: confirma_criar_conta.php');
		}
		else {
			alert('As senhas não correspondem!');
		}
	}

	//VERIFICACAO EM QUAL CAMPO O USUARIO ESTA DIGITANDO

	var emailD = document.getElementById('emailDono');
	var nomeD = document.getElementById('nomeDono');

	if (emailD == "") {
		document.getElementById("nomeDono").disabled = true;
	}

	/*
	$(document).on("click", "#emailDono", function() {
		document.getElementById("nomeDono").disabled = true;
	})*/


	function validarSenha() {
		var NovaSenha = document.getElementsByName("senhaUsuario").value;
		var CNovaSenha = document.getElementsByName("senhaConfUsuario").value;
		if (NovaSenha != CNovaSenha) {
			alert("SENHAS DIFERENTES!\\nFAVOR DIGITAR SENHAS IGUAIS");
			return false;
		}
		return true;
	}
</script>
