<?php
		
		$usuario = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$avatar = "no_img.png";
		
		$salt = md5("TweTalk");
		$codifica = crypt($senha,$salt);
		$pass = hash('sha512',$codifica);
		
		require('../classes/user.php');
		$user = new user();
		$cadastrar = $user->cadastraUser($usuario,$email,$pass);		
		
?>