<?php
		$email = $_GET['email'];
		$user = $_GET['user'];
		
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

      <button id="escrever" class="sidebar__tweet" data-toggle="modal" data-target="#ModalPost">Escrever</button>
    </div>
    <!-- sidebar ends -->
	
   <!-- Modal post -->
<div  id="ModalPost" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Sua Postagem</h3>
        </div>
        <div class="modal-body">
			<?php echo"<form method='post' action='php/postar.php?user=$user' enctype='multipart/form-data'>"; ?> 
				<div class="form-group">
				  <textarea class="form-control forms" id="post" style="resize: none; padding: 10px; height: 300px;" maxlength="240"
				  placeholder="Deixe sua postagem:" name="postagem" required></textarea>
				  <span class="caracteres">240</span> Caracteres restantes
				</div>	
				
				<div> <img src="images/icons/emoji.png" id="emoji" style="width: 25px; margin-right: 10px" /> 
				<img src="images/icons/picture.png" id="picture" style="width: 25px" /> 
				
				</div>
				
				<?php include ('emojis.html'); ?>
				
				
				<input type="file" id="imagem" name="imagem" style="display: none"; />
				 
				 <input type="hidden" id="usuario" name="usuario" 
				 value="<?php echo "$user";?>" />				
				
				<div class="form-group form-check" style="text-align: right">
				<input id="submit" type="submit" class="btn btn-success forms formz" value="Postar" />
        </div>
			</form>
        </div>
      </div>
      
    </div>
  </div> 



		
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
	


   

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
		<script>
			$(document).ready(function(){
			  $("#picture").click(function(){
				$("#imagem").trigger('click');
			  });
			});
		</script>
  
  		  <script>
			$(document).ready(function(){
			  $("#emoji").click(function(){
				$(".row").toggle();
			  });
			});
		</script>
  
  
  
      <script>        
            //usando jQuery, tudo fica mais fácil!! :)            
            $(".button").click(function() 
            {
                var emoji = $( this ).text();
                $('#post').val($('#post').val() + emoji);
            }); 
    </script>  
  
  
  
  <script>
	        $(document).on("keydown", "#post", function () {
            var caracteresRestantes = 240;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
            
            $(".caracteres").text(caracteresRestantes);
        });
  
  </script>

  </body>
</html>
      