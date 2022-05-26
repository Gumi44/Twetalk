<?php
		
		$usuario = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$salt = md5("TweTalk");
		$codifica = crypt($senha,$salt);
		$pass = hash('sha512',$codifica);
		
		require('../classes/user.php');
		$user = new user();
		$busca1 = $user->verificaEmail($email);
		
		$user2 = new user();
		$busca2 = $user2->verificaUser($usuario);		
		
		$user3 = new user();
		$cadastra = $user3->cadastraUser($usuario,$email,$pass)
		
		
		
		
		
		
		
		
				
		
?>