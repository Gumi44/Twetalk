<?php
	session_start();
	$user = $_SESSION['user'];
	
	date_default_timezone_set('America/Sao_paulo');
	$agora = date('d-m-Y-h-i-s');

	$email = $_POST['email'];
	$arquivo = $_FILES['papelParede']['tmp_name'];
	$foto = $_FILES['papelParede']['name'];
	
	//pega a extensão
	$extensao = pathinfo($foto, PATHINFO_EXTENSION);

	//muda o nome
	$tmp_nome = md5($email . $agora);
	$papelParede = $tmp_nome . "." . $extensao;


	$destino = '../images/' . $papelParede;
	
	move_uploaded_file($arquivo, $destino);

	require('../classes/profile.php');
	
	$perfil = new perfil();

	$avatar = $perfil->alteraPapelParede($papelParede,$email);
	
	header('Location:../perfil.php?email='.$email);
	

?>