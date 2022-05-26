<?php
	require_once('conexao.php');
	Class perfil extends conexao{
		private $id;
		private $usuario;
		private $email;
		private $apelido;
		private $avatar;
		private $papelParede;
		private $cidade;
		private $bio;
		private $nascimento;
		
		protected $tabela = 'perfil';

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

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getAvatar(){
		return $this->avatar;
	}

	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}	
	
	public function getApelido(){
		return $this->apelido;
	}

	public function setApelido($apelido){
		$this->apelido = $apelido;
	}

	public function getPapelParede(){
		return $this->papelParede;
	}

	public function setPapelParede($papelParede){
		$this->papelParede = $papelParede;
	}

	public function getBio(){
		return $this->bio;
	}

	public function setBio($bio){
		$this->bio = $bio;
	}	
	
	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	
		
		//métodos personalizados (funções)
		
		//consultar por email
		public function consultaEmail($email){
			$sql = "SELECT id,usuario,avatar,apelido,papelParede,cidade,bio,nascimento
			FROM $this->tabela WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$email);
			$stmt->execute();
			
			if($stmt == true){
				$stmt->store_result();
				$stmt->bind_result($id,$usuario,$avatar,$apelido,$papelParede,$cidade,$bio,$nascimento);
				$stmt->fetch();
				
				$this->setId($id);
				$this->setUsuario($usuario);
				$this->setAvatar($avatar);
				$this->setApelido($apelido);
				$this->setPapelParede($papelParede);
				$this->setCidade($cidade);
				$this->setBio($bio);
				$this->SetNascimento($nascimento);
				
			}else{
				die("Falha na consulta!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		

		//consultar por user
		public function consultaUser($user){
			$sql = "SELECT id,email,avatar,apelido,papelParede,cidade,bio,nascimento
			FROM $this->tabela WHERE usuario = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$user);
			$stmt->execute();
			
			if($stmt == true){
				$stmt->store_result();
				$stmt->bind_result($id,$email,$avatar,$apelido,$papelParede,$cidade,$bio,$nascimento);
				$stmt->fetch();
				
				$this->setId($id);
				$this->setEmail($email);
				$this->setAvatar($avatar);
				$this->setApelido($apelido);
				$this->setPapelParede($papelParede);
				$this->setCidade($cidade);
				$this->setBio($bio);
				$this->SetNascimento($nascimento);
				
			}else{
				die("Falha na consulta!");
			}
			$stmt->close();
			$this->conn->close();	
		}			

		
		//editar usuario
		public function editaUser($apelido,$cidade,$bio,$nascimento,$email){
			$sql = "UPDATE $this->tabela SET apelido = ?, cidade = ?, bio = ?, nascimento = ? WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('sssss',$apelido,$cidade,$bio,$nascimento,$email);
			$stmt->execute();
			
			if($stmt == true){
				
				header('Location:../perfil.php?email='.$email);
			}else{
				die("Falha no atualizar!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
		//Mudar avatar
		public function alteraAvatar($avatar,$email){
			$sql = "UPDATE $this->tabela SET avatar = ?
			WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$avatar,$email);
			$stmt->execute();
			
			if($stmt == true){
				header('Location:perfil.php');
			}else{
				die("Falha no atualizar!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
		//Mudar papel de parede
		public function alteraPapelParede($papelParede,$email){
			$sql = "UPDATE $this->tabela SET papelParede = ?
			WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$papelParede,$email);
			$stmt->execute();
			
			if($stmt == true){
				header('Location:perfil.php');
			}else{
				die("Falha no atualizar!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
	}
?>









