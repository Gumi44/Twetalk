<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Upload de imagem</title>
	</head>
	<body>
		<h1>Troca do Avatar</h1>
		<form method="POST" action="" enctype="multipart/form-data">
			<input type="file" name="avatar" required />
			<br />
			<input type="submit" value="Enviar" />
		</form>
	</body>
</html>

<?php
		date_default_timezone_set('America/Sao_paulo');
		$agora = date('d-m-Y-h-i-s');

		$email = $_GET['email'];
		$arquivo = $_FILES['foto']['tmp_name'];
		$foto = $_FILES['foto']['name'];

		//pega a extensão
		$extensao = pathinfo($foto, PATHINFO_EXTENSION);

		//muda o nome
		$tmp_nome = md5($email . $agora);
		$novo_nome = $tmp_nome . "." . $extensao;

		//novo destino
		$destino = '../images/' . $novo_nome;

		move_uploaded_file($arquivo, $destino);
		header('Location: ..perfil.php?email='.$email);

?>


