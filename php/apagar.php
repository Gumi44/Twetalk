<?php

		$id = $_GET['id'];
				
		require('../classes/postagens.php');
		$postagens = new postagens();
		$apagar = $postagens->apagar($id);
		
		header('Location:../home.php');

?>