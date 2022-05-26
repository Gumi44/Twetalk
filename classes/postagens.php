<?php
	require_once('conexao.php');
	Class postagens extends conexao{
		private $id;
		private $postagem;
		private $usuario;
		private $imagem;

		protected $tabela = 'posts';

		//construtor
		public function __construct(){
			parent::__construct();	
		}

		//getters e setters	
		public function getId(){
			return $this->id;
		}
	
		public function setId($id){
			$this->id = $id;
		}
	
		public function getPostagem(){
			return $this->postagem;
		}
	
		public function setPostagem($postagem){
			$this->postagem = $postagem;
		}
	
		public function getUsuario(){
			return $this->usuario;
		}
	
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function getAvatar(){
		return $this->avatar;
		}

		public function setAvatar($avatar){
		$this->avatar = $avatar;
		}
	
		public function getData(){
			return $this->data;
		}
	
		public function setData($data){
			$this->data = $data;
		}			
		
		//métodos personalizados (funções)
	
		//cadastra postagem
			public function cadastraPost($a,$b,$c){
			$sql = "INSERT INTO $this->tabela(postagem,usuario,imagem) VALUES(?,?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('sss',$a,$b,$c);
			$stmt->execute();
			
			if($stmt == true){
				//header('Location:../home.php');
			}else{
				die("Falha ao postar!");
			}
			$stmt->close();
			$this->conn->close();
		}
			//postagem sem imagem
			public function cadastraPost2($a,$b){
			$sql = "INSERT INTO $this->tabela(postagem,usuario) VALUES(?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$a,$b);
			$stmt->execute();
			
			if($stmt == true){
				//header('Location:../home.php');
			}else{
				die("Falha ao postar!");
			}
			$stmt->close();
			$this->conn->close();
		}
		
		//consulta postagens 
		public function consulta(){
			$sql = "SELECT * FROM $this->tabela ORDER BY data DESC";
				
			$result = $this->conn->query($sql) 
			or die("Falha na consulta");
			
			if($result == true){
				return $result;
			}else{
				die("Falha na consulta!");
			}
			$this->conn->close();
		}
		
		
		//consulta post por usuario
		public function postsUser($user){
			$sql = "SELECT * FROM $this->tabela WHERE usuario='$user' ORDER BY data DESC";
			$result = $this->conn->query($sql) or die("Falha na consulta");
			
			if($result == true){
				return $result;
			}else{
				die("Falha na consulta!");
			}
			$this->conn->close();
		}
		
		
			//Mudar avatar
			public function mudarAvatar($avatar,$user){
			$sql = "UPDATE $this->tabela SET avatar = ?
			WHERE usuario = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$avatar,$user);
			$stmt->execute();
			
			if($stmt == true){
				header('Location:perfil.php');
			}else{
				die("Falha no atualizar!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
		
			//apagar do banco
			public function apagar($id){
				$sql = "DELETE FROM $this->tabela
				WHERE id = ?";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param('i',$id);
				$stmt->execute();

				$stmt->close();
				$this->conn->close();
			}
						
	}


?>









