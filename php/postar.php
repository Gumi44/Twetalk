<?php
	
	require('../classes/postagens.php');
	$postagens = new postagens();

	$user = $_GET['user'];
	
	date_default_timezone_set('America/Sao_paulo');
	$agora = date('d-m-Y-h-i-s');

	$postagem = $_POST['postagem'];
	$arquivo = $_FILES['imagem']['tmp_name'];
	$foto = $_FILES['imagem']['name'];
	
	if(!$foto){
		
		$postar = $postagens->cadastraPost2($postagem,$user);
		
	}else{
		
	//pega a extensão
	$extensao = pathinfo($foto, PATHINFO_EXTENSION);

	//muda o nome
	$tmp_nome = md5($user . $agora);
	$imagem = $tmp_nome . ".png";


	$destino = '../images/' . $imagem;
	
	
	move_uploaded_file($arquivo, $destino);
	
		
		$postar = $postagens->cadastraPost($postagem,$user,$imagem);
	}	
	
	
	header('Location:../home.php?email='.$email);
	
?>
			
		
