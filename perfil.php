<?php	

		require_once('classes/profile.php');
		$perfil = new perfil();
		
		
		
		if (isset ($_GET['email'])){
			
		$email = $_GET['email'];
		
		
		$consulta = $perfil->consultaEmail($email);
		
		$usuario = $perfil->getUsuario();
		$avatar = $perfil->getAvatar();
		$apelido = $perfil->getApelido();
		$papelParede = $perfil->getPapelParede();
		$bio = $perfil->getBio();
		$cidade	= $perfil->getCidade();
		$nascimento = $perfil->getNascimento();
		$nascimento = date('d/m/Y', strtotime($nascimento));	
		
		}				
			
			
		
		if(isset ($_GET['usuario'])){
		
		$usuario = $_GET['usuario'];
		
		$consulta = $perfil->consultaUser($usuario);
		
		$mail = $perfil->getEmail();
		$avatar = $perfil->getAvatar();
		$apelido = $perfil->getApelido();
		$papelParede = $perfil->getPapelParede();
		$bio = $perfil->getBio();
		$cidade	= $perfil->getCidade();
		$nascimento = $perfil->getNascimento();
		$nascimento = date('d/m/Y', strtotime($nascimento));

		
		}
		
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TweTalk - Perfil</title>

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
	
	<!-- sidebar starts -->
    <div class="sidebar">
									<?php session_start(); ?>
	  <img src="images/logo.png" /> <?php echo $_SESSION['email']; ?>
      <div class="sidebarOption">
        <span class="material-icons"> home </span>
        <h2><a id="home" href="home.php">Início</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> search </span>
        <h2><a href="#">Explorar</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> notifications_none </span>
        <h2><a href="#">Notificações</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> mail_outline </span>
        <h2><a href="#">Mensagens</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> bookmark_border </span>
        <h2><a href="#">Favoritos</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> list_alt </span>
        <h2><a href="#">Listas</a></h2>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> perm_identity </span>
        <?php
			if(isset($_GET['email'])){
			echo "<h2><a id='perfil' href='perfil.php?email=$email'>Perfil</a></h2>";
			}else{
				echo "<h2>Perfil</h2>";	
			}
        ?>
      </div>

     
    </div>
    <!-- sidebar ends -->
	
	
	
	<!-- profile starts -->
    <div class="feed profile">
    <div id="papelParede">
      <?php echo "<img src='images/$papelParede'  style='width: 100%'/>"; ?>
    </div>

	<?php if(isset($_GET['email'])){
		echo 
			"<div class='editar' align='right' style='margin-top: -10px;'>
			<a href='#' id='editAvatar' data-toggle='modal' data-target='#ModalAvatar' style='background-color:#000; color: #fff'>
			Mudar Avatar</a> &nbsp; &nbsp; &nbsp; &nbsp;
			
			<a href='#' id='editParede' data-toggle='modal' data-target='#ModalParede' style='background-color:#000; color: #fff'>
			Mudar Papel de Parede</a>
			
			</div>";
	}
	?>
	
	
	<div class="perfil">
      <?php 
			  if(isset($_GET['email'])){
				  $email = $_GET['email'];
			  }else{
				  $email = $mail;
			  }
	  
		echo "<img id='foto' src='images/$avatar' style='width: 150px' />"; ?>
	  <?php echo "<p><span id='bold'>$apelido</span><br/>"; ?>
	  <?php echo "<span id='bold'>@$usuario</span>($email)</p>"; ?>
    </div>
	
      <div class="bio">
       <?php echo $bio ?>
	 <br/><br/>
		<span class="material-icons md-18">place</span>	 
		<?php echo $cidade ?> &nbsp; &nbsp; &nbsp; &nbsp; <span class="material-icons md-18">child_care</span> 	Nascido em  <?php echo $nascimento  ?>
	  </div>
	  <div class="editar">
		<?php if(isset($_GET['email'])){
					echo "<a id='editar' href='php/editar.php?email=$email'>Editar Perfil</a> &nbsp; &nbsp; &nbsp; &nbsp;
		<a id='sair' href='php/sair.php'>Sair</a>"; }?>
	  </div>
	 
    
      <div class="feed__header">
       <h2 style="margin-left: 20px;"> Linha de Tempo</h2>
      </div>


		<?php
		require_once('classes/postagens.php');
			$postagens = new postagens();			
			$consulta = $postagens->postsUser($usuario);

			while($linha = $consulta->fetch_assoc()){
				$id = $linha['id'];
				$postagem = $linha['postagem'];
				$usuario = $linha['usuario'];
				$data = $linha['data'];
				$postado1 = date('d/m/Y', strtotime($data));
				$postado2 = date('h:i', strtotime($data));
		?>

      <!-- post starts -->
      <div class="post">
        <div class="post__avatar">
		<?php
				echo "<img src='images/$avatar' style='width: 80px; height: 80px'>";
		?>
        </div>
        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3 style="font-weight: 600; font-size: 20px;">
                <?php echo"<span style='margin-right: 5px'>$apelido</span> 
				<span style='color:rgba(0,99,99,0.7); font-size:20px; font-weight:300'>@$usuario</span>"; ?>
              </h3>
            </div>
            <div class="post__headerDescription">
              <?php echo $postagem; ?>
			  <div>
				<?php echo "<p style='margin-top: 15px; font-weight: 600; text-align: right; margin-right: 20px;'>
				postado em: $postado1 às $postado2</p>"; ?>
			  </div>
            </div>
          </div>
          <div class="redes">
			<img  src="images/icons/comment.png" />
			<img  src="images/icons/like.png" />
			<img  src="images/icons/repost.png" />
			<?php 
				if(isset($_GET['email'])){
				echo "<a id='apagar' onClick='return confirm(\"Você tem certeza que apagar o post?\")' href='php/apagar.php?id=$id'>
				<img src='images/icons/trash.png'></a>";
				}
			?>
          </div>
        </div>
      </div>
	  <?php } ?>
      <!-- post ends -->

	
	</div>

	<!-- feed ends -->
		
		
		
		
		<!--start widgets -->
		<div class="widgets">
			<div class="widgets__input">
				<span class="material-icons widgets__searchIcon"> search </span>
				<input type="text" placeholder="Search Twitter" />
			</div>

			<div class="widgets__widgetContainer">
				<h2>O que está acontecendo:</h2>
				<iframe class="fw-iframe" src="https://feed.mikle.com/widget/v2/94645/" width="100%" height="840px" frameborder="0" scrolling="no"></iframe>
			</div>	
		</div>
		<!--end widgets -->
	</div>



   <!-- Modal muda avatar -->
<div class="modal fade" id="ModalAvatar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mudar Avatar</h3>
        </div>
        <div class="modal-body">
		
			<form action="php/uploadAvatar.php" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<input class="form-control" id="file" name="avatar" type="file" />
				</div>
				
				<?php echo "<input  name='email' type='hidden' value='$email' />"; ?> 
				 
				 <p>&nbsp;</p>
				 
				<div class="form-group form-check" style="text-align: right">
				<button type="submit" class="btn btn-success forms formz">Postar</button>
				</div>
			</form>
			
        </div>
      </div>
	
	
    </div>
  </div>


   <!-- Modal muda papel de parede -->
<div class="modal fade" id="ModalParede" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mudar Papel de Parede</h3>
        </div>
        <div class="modal-body">
		
			<form action="php/uploadParede.php" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<input class="form-control" id="file" name="papelParede" type="file" />
				</div>
				
				<?php echo "<input  name='email' type='hidden' value='$email' />"; ?> 
				 
				 <p>&nbsp;</p>
				 
				<div class="form-group form-check" style="text-align: right">
				<button type="submit" class="btn btn-success forms formz">Postar</button>
				</div>
			</form>
			
        </div>
      </div>
	
	
    </div>
  </div>
  </body>
</html>