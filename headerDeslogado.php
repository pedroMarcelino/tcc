	<?php session_start(); ?>
	
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a id="imagemheader" title="Ir para a página inicial" href="index.php"><img id="imgLogo" src="img/icone2.png" height="80px" width="100px"/></a>
				</div>
				<ul class="nav navbar-nav navbar-right" id="positionNav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Login
        				<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#logarUsuario" id="navModelCadastroUsuario">Logar Usuário</a></li>
							<li><a data-toggle="modal" data-target="#logarProprietario" href="#" id="navModelCadastroProprietario">Logar Proprietário</a></li>
						</ul>
					</li>
					
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar
        				<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#cadastrarUsuario" id="navModelCadastroUsuario">Usuário</a></li>
							<li><a href="#" data-toggle="modal" data-target="#cadastrarProprietario" id="navModelCadastroProprietario">Proprietário</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>

	<div class="modal fade" id="logarProprietario">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<h4 class="modal-title">Logar Proprietário</h4>
				</div>
				<form action="validacao_login.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="email">Email :</label>
							<input type="email" name="emailUser" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label for="pwd">Senha :</label>
							<input type="password" name="senhaUser" maxlength="20" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" class="btn btn-success btn-block" id="btnLogar" name="logar" value="LOGAR">
						</div>
						<div clas="form-group">
							<!--<button class="btn btn-success btn-block" id="btnConectFacebook">Conectar-se com Facebook</button>-->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="logarUsuario">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<h4 class="modal-title">Logar Usuário</h4>
				</div>
				<form action="validacao_login.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="email">Email :</label>
							<input type="email" name="emailUser" maxlength="50" class="form-control" >
						</div>
						<div class="form-group">
							<label for="pwd">Senha :</label>
							<input type="password" name="senhaUser" maxlength="20" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit"  class="btn btn-success btn-block" id="btnLogar" name="logar" value="LOGAR">
						</div>
						<div clas="form-group">
							<!--<button class="btn btn-success btn-block" id="btnConectFacebook">Conectar-se com Facebook</button>-->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="cadastrarProprietario">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<h4 class="modal-title">Cadastrar Proprietário</h4>
				</div>
				<div class="modal-body">
					<form action="confirma_criar_conta.php" method="POST" id="formCadastro" onsubmit="return validarSenha();">
						<div>
							<div class="form-group">
								<input type="hidden" name="tipo" value="1"/>
								<label for="email">Email :</label>
								<input type="email" name="emailUsuario" maxlength="50" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="name">Nome :</label>
								<input type="name" name="nomeUsuario" maxlength="30" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="senha">Senha :</label>
								<input type="password" name="senhaUsuario" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="confSenha">Confirma Senha :</label>
								<input type="password" name="senhaConfUsuario" maxlength="20" class="form-control" required>
							</div>

							<div class="modal-footer">
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-block" onClick="validarSenha()" id="btnEnviar">Cadastrar-se</button>
								</div>
								<div clas="form-group">
									<!--<button class="btn btn-success btn-block" id="btnConectFacebook">Conectar-se com Facebook</button>-->
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="cadastrarUsuario">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<h4 class="modal-title">Cadastrar Usuário</h4>
				</div>
				<form action="confirma_criar_conta.php" method="POST" id="formCadastro" onsubmit="return validarSenha();">
					<div class="modal-body">
						<div>
							<input type="hidden" name="tipo" value="0"/>
							<div class="form-group">
								<label for="email">Email :</label>
								<input type="email" name="emailUsuario" maxlength="50" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="name">Nome :</label>
								<input type="name" name="nomeUsuario" maxlength="30" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="senha">Senha :</label>
								<input type="password" name="senhaUsuario" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="confSenha">Confirma Senha :</label>
								<input type="password" name="senhaConfUsuario" maxlength="20" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-block" onClick="validarSenha()" id="btnEnviar">Cadastrar-se</button>
							</div>
							<div clas="form-group">
								<!--<button class="btn btn-success btn-block" id="btnConectFacebook">Conectar-se com Facebook</button>-->
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>