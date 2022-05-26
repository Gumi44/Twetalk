<?php
		session_start();
		$email = $_SESSION['email'];
		
		require_once('classes/profile.php');
		$perfil = new perfil();
		$consulta = $perfil->consultaEmail($email);
		$user = $perfil->getUsuario();
		
		$_SESSION['email'] = $email;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TweTalk - Timeline </title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

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
	  <img src="images/logo.png" /> <?php echo $email ; ?>
      <div class="sidebarOption">
        <span class="material-icons"> home </span>
        <h2><a href="home.php">Início</a></h2>
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
			echo "<h2><a id='perfil' href='perfil.php?email=$email'>Perfil</a></h2>";
        ?>
      </div>
		<?php echo "<a id='post' href='post.php?user=$user&email=$email'>"; ?>
		<button>Escrever</button>
		</a>
    </div>
    <!-- sidebar ends -->
	
	<div class="feed" style="overflow: hidden">
		 
    
      <div class="feed__header">
       <h2 style="margin-left: 20px"> Linha de Tempo</h2>
      </div>


		<?php
		require_once('classes/postagens.php');
			$postagens = new postagens();			
			$consulta = $postagens->consulta();

			while($linha = $consulta->fetch_assoc()){
				$id = $linha['id'];
				$postagem = $linha['postagem'];
				$usuario = $linha['usuario'];
				$imagem = $linha['imagem'];
				$data = $linha['data'];
				$postado1 = date('d/m/Y', strtotime($data));
				$postado2 = date('H:i', strtotime($data));
				
							$perfil2 = new perfil();
							$consulta2 = $perfil2->consultaUser($usuario);
							$apelido = $perfil2->getApelido();
							$avatar = $perfil2->getAvatar();
		?>

      <!-- post starts -->
      <div class="post">
        <div class="post__avatar">
           <?php echo "<img src='images/$avatar' style='width: 80px; height: 80px' />"; ?> 
        </div>
        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
 			  <h3 style="font-weight: 600; font-size: 20px;">
                <?php echo"<span style='margin-right: 5px'>
				<a href='perfil.php?usuario=$usuario'>$apelido</a></span> 
				<span style='color:rgba(0,0,0,0.7); font-size:20px; font-weight:300'>@$usuario</span>"; ?>
              </h3>
            </div>
            <div class="post__headerDescription">
              <div><?php echo $postagem; ?></div>
				
			<?php if(!$imagem){
    
			}else{
				echo "<div><img src='images/$imagem' style='width: 90%; height: 90%'/></div>"; 
			}
			?>
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
				if($user == $usuario){
				echo "<a id='apagar' onClick='return confirm(\"Você tem certeza que apagar o post?\")' href='php/apagar.php?id=$id'>
				<img src='images/icons/trash.png'></a>";
				}
			?>
          </div>
        </div>
      </div>
	  <?php } ?>
	  
	  </div>
      <!-- post ends -->
	
		
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


  </body>
</html>
      