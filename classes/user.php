<?php
	require_once('conexao.php');
	Class user extends conexao{
		private $id;
		private $usuario;
		private $email;
		private $senha;
		protected $tabela = 'users';

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

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

	
		
		//métodos personalizados (funções)		
		
		//cadastra usuário
		public function cadastraUser($a,$b,$c){
			$sql = "INSERT INTO $this->tabela(usuario,email,senha) VALUES(?,?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('sss',$a,$b,$c);
			$stmt->execute();
			
			if($stmt == true){
				header('Location:../index.php?msg=insert');
			}else{
				die('Location:../index.php?cadastro=error');
			}
			$stmt->close();
			$this->conn->close();
		}
	

	
		// logar user
		public function logarUser($email, $pass){
			$sql = "SELECT email,senha FROM $this->tabela 
			WHERE email = ? AND senha = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$email, $pass);
			$stmt->execute();
			$stmt->store_result();
			
			if($stmt->num_rows > 0){
				session_start();
				$_SESSION['email'] = $email;
				header('Location: ../home.php');
			}else{
				header('Location: ../index.php?erro=erro');
			}
			$stmt->close();
			$this->conn->close();

		}
		
		//verifica email
		public function verificaEmail($email){
			$sql = "SELECT email FROM $this->tabela WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$email);
			$stmt->execute();
			$stmt->store_result();
			
			if($stmt->num_rows > 0){
				header('Location: ../index.php?cadastro=erro');
			}
			
			$stmt->close();
			$this->conn->close();	
		}		
		
		//verifica user
		public function verificaUser($user){
			$sql = "SELECT usuario FROM $this->tabela WHERE usuario = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$user);
			$stmt->execute();
			$stmt->store_result();
			
			if($stmt->num_rows > 0){
				header('Location: ../index.php?cadastro=erro');
			}
			
			$stmt->close();
			$this->conn->close();	
		}
		
		
		
		//consultar por email
		public function consultaEmail($email){
			$sql = "SELECT * FROM $this->tabela WHERE email = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$email);
			$stmt->execute();
			
			if($stmt == true){
				$stmt->store_result();
				$stmt->bind_result($id,$usuario);
				$stmt->fetch();
				
				$this->setId($id);
				$this->setUsuario($usuario);
				
			}else{
				die("Falha na consulta!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
	//consultar por id
		public function consultaID($id){
			$sql = "SELECT * FROM $this->tabela WHERE id = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			
			if($stmt == true){
				$stmt->store_result();
				$stmt->bind_result($id);
				$stmt->fetch();
				
				$this->setId($id);
				$this->setUsuario($usuario);
				$this->setEmail($email);
				
			}else{
				die("Falha na consulta!");
			}
			$stmt->close();
			$this->conn->close();	
		}
		
		
		
		
		
	}
?>









