<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TweTalk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <!-- Container -->
	<div class="container flex">
			<div class="img-big">
				<img src="images\twitter-green.jpg" width="500px"/>
			</div>
			<div class="direita" align="center" style="margin-left:30px">
				<h1>Venha para o TweTalk</h1>
				
				<h2>Já tem cadastro?</h2>
			
					<button type="button" id="entrar" class="btn btn-success" data-toggle="modal" data-target="#ModalLogin">Conecte-se na sua conta</button>
				<h2>Não tem cadastro?</h2>
				<button type="button" id="cadastrar" class="btn btn-warning" data-toggle="modal" 
				data-target="#ModalCadastro">Faça seu cadastro AGORA!</button>
			</div>
			</div>
			<?php			
				if(isset($_GET['erro'])){
					echo "<div align='center' style='margin-top: 30px;'>
						<span style='color:#f00; font-size: 30px; font-weight: 700'>
						LOGIN/SENHA INVÁLIDOS!</span></div>";
				}
				
				
				if(isset($_GET['msg'])){
					echo "<div align='center' style='margin-top: 30px;'>
						<span style='color:#0c0; font-size: 30px; font-weight: 700'>
						Usuário Cadastrado - Faça seu Login</span></div>";

				}
				
				if(isset($_GET['cadastro'])){
					echo "<div align='center' style='margin-top: 30px;'>
						<span style='color:#f00; font-size: 30px; font-weight: 700'>
						Erro - Usuário já existe!</span></div>";
				}
				
				
				
			?>
		



  <!-- Modal cadastro -->
  <div class="modal fade" id="ModalCadastro" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Faça o seu Cadastro</h2>
        </div>
        <div class="modal-body">
			<form method="post" action="php/cadastro.php">
				<div class="form-group">
				  <input type="text" class="form-control forms" id="nome" 
				  placeholder="Crie um username" name="nome">
				</div>	
				<div class="form-group">
				  <input type="email" class="form-control forms" id="email" 
				  placeholder="Digite seu email" name="email" required >
				</div>				
				<div class="form-group">
				  <input type="email" class="form-control forms" id="email2" 
				  placeholder="Repita seu email" name="email2" required oninput="validaEmail(this)">
				</div>
				<div class="form-group">
				  <input type="password" class="form-control forms" id="senha" 
				  placeholder="Digite uma senha" name="senha" required>
				</div>				
				<div class="form-group">
				  <input type="password" class="form-control forms" id="senha2" 
				  placeholder="Repita a senha" name="senha2" required oninput="validaSenha(this)">
				</div>
				<div class="form-group form-check">
				</div>
				<button id="cadastra" type="submit" class="btn btn-success forms formz">Cadastre-se</button>
			</form>
        </div>
        <div class="modal-footer">
          <button id="cancela" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  

  <!-- Modal Login -->
  <div class="modal fade" id="ModalLogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Janela de Login</h2>
        </div>
        <div class="modal-body">
          <form method="post" action="php/logar.php">
				<div class="form-group">
				  <input type="email" class="form-control forms" id="logEmail" 
				  placeholder="Entre com seu email" name="email" required>
				</div>	

				<div class="form-group">
				  <input type="password" class="form-control forms" id="logSenha" placeholder="Entre com a sua senha" name="senha" required>
				</div>				

				<div class="form-group form-check">
				</div>
				<button id="logar" type="submit" class="btn btn-success forms formz">Logar</button>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" id="cancela2" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
			  <script>
					function validaEmail (input){
						if (input.value != document.getElementById('email').value) {
						input.setCustomValidity('Repita o E-mail corretamente');
					  } else {
						input.setCustomValidity('');
					  }
					}
					</script>

					<script>
					function validaSenha (input){
						if (input.value != document.getElementById('senha').value) {
						input.setCustomValidity('Repita a senha corretamente');
					  } else {
						input.setCustomValidity('');
					  }
					} 
			</script>
	
  </body>
</html>