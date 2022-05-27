<?php
	require_once('conexao.php');
	Class admin extends conexao{
		private $id;
		private $usuario;
		private $email;
		private $senha;
		private $tabela = 'user';

		//construtor
		public function __construct(){
			parent::__construct();	
		}
	
		//get e set	
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

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->turma = $status;
		}


		
		//métodos personalizados (funções)
		
		//consulta no banco
		public function consulta(){
			$sql = "SELECT * FROM $this->tabela";
			$result = $this->conn->query($sql) 
			or die("Falha na consulta");
			
			if($result == true){
				return $result;
			}else{
				die("Falha na consulta!");
			}
			$this->conn->close();
		}
		
		//cadastra
		public function cadastraUser($a,$b,$c,$d){
			$sql = "INSERT INTO $this->tabela(user,pass,status,email) VALUES(?,?,?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ssss',$a,$b,$c,$d);
			$stmt->execute();
			
			if($stmt == true){
				header('Location:admin.php?msg=insert');
			}else{
				die("Falha no cadastro!");
			}
			$stmt->close();
			$this->conn->close();
		}
		
		
		// logar admin
		public function logar($user, $pass){
			$sql = "SELECT user,pass FROM $this->tabela 
			WHERE user = ? AND pass = ? AND status = 'ON'";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param('ss',$user, $pass);
			$stmt->execute();
			$stmt->store_result();
			
			if($stmt->num_rows > 0){
				session_start();
				$_SESSION['logado'] = true;
				header('Location: members.php');
			}else{
				header('Location: index.php?erro=erro');
			}
			$stmt->close();
			$this->conn->close();

		}
		
	}
?>









