<?php

	$email = $_GET['email'];
	
		require_once('../classes/profile.php');
		$perfil = new perfil();
		$consulta = $perfil->consultaEmail($email);
		$user = $perfil->getUsuario();
		$avatar = $perfil->getAvatar();
		$apelido = $perfil->getApelido();
		$bio = $perfil->getBio();
		$cidade	= $perfil->getCidade();
		$nascimento = $perfil->getNascimento();
		//$nascimento = date('d/m/Y', strtotime($nascimento));
?>
	
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TweTalk - <?php echo $user ?> - Perfil</title>

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
	<div class="container timeline flex">
	
	
		<!-- profile starts -->
		<div class="feed profile">
			<div id="meuAvatar">
				<?php echo "<img style='height:35px;' src='../images/$avatar'/> 
				<span style='font-size:25px; font-weight: 900'> $apelido</span>
				<span style='font-size:25px; font-weight: 300'> @$user</span>"; ?>	
					
			</div>
		
		<form method="post" action="editaUser.php">
			<div class="local" class="form-group">
		   <h3>Mudar Apelido</h3>
		   <input class="form-control forms" id="apelido" name="apelido" type="text" value="<?php echo "$apelido";?>" />
		  </div>
		  <div class="bio" class="form-group">
		   <h3>Mudar texto da Bio</h3>
		   <textarea class="form-control forms" id="bio" style="resize: none; padding: 10px; height: 300px;" name="bio"><?php echo $bio ?></textarea>
		  </div>		  
		  <div class="local" class="form-group">
		   <h3>Mudar Localização</h3>
		   <input class="form-control forms" id="local" name="cidade" type="text" value="<?php echo "$cidade";?>" />
		  </div>		  
		  <div class="nascimento" class="form-group">
		   <h3>Data de Nascimento</h3>
		   <input class="form-control forms" id="nascimento" name="nascimento" type="date" 
				value=<?php echo $nascimento;?>		   />
		  </div>
		  <div class="salvar" class="form-group" style="margin: 30px 0">				
			<input type="hidden" id="usuario" name="email" value="<?php echo "$email";?>" />
			<button type="submit" class="btn btn-success forms formz">Salvar</button>
		  </div>	
		  
		  
		  
			<a href="#" onClick='window.history.back()' style="margin-right: 150px">voltar</a> 
		  </div>
		 </form> 
	 </div>	  
	
	</div>
	
	