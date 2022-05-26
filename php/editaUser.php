<?php
		$apelido = $_POST['apelido'];
		$bio = $_POST['bio'];
		$cidade = $_POST['cidade'];
		$nascimento = $_POST['nascimento'];
		$email = $_POST['email'];
			
			
		require('../classes/profile.php');
		$perfil = new perfil();
		$editar = $perfil->editaUser($apelido,$cidade,$bio,$nascimento,$email);	
	
?>