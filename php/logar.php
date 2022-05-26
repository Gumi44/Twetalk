<?php
		error_reporting(0);
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
				
		$salt = md5("TweTalk");
		$codifica = crypt($senha,$salt);
		$pass = hash('sha512',$codifica);
		
		require('../classes/user.php');
		$user = new user();
		$logar = $user->logarUser($email,$pass);	
		
?>