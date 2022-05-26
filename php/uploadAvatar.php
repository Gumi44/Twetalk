<?php
	session_start();
	$user = $_SESSION['user'];
	
	
	
	date_default_timezone_set('America/Sao_paulo');
	$agora = date('d-m-Y-h-i-s');

	$email = $_POST['email'];
	$arquivo = $_FILES['avatar']['tmp_name'];
	$foto = $_FILES['avatar']['name'];
	
	
	
	//pega a extensão
	$extensao = pathinfo($foto, PATHINFO_EXTENSION);

	//muda o nome
	$tmp_nome = md5($email . $agora);
	$avatar = $tmp_nome . "." . $extensao;


	$destino = '../images/' . $avatar;

	move_uploaded_file($arquivo, $destino);

	
	require('../classes/profile.php');
	
	$perfil = new perfil();

	$avatar = $perfil->alteraAvatar($avatar,$email);
	

	
	
	header('Location:../perfil.php?email='.$email);
	
	
	
?>