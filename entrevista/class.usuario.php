<?php 
	class Usuario{
		private $pdo;
		function __construct(){
			$this->pdo = new PDO("mysql:dbname=db_estudos;host=localhost","root","");
			echo "conectado";
		}

		public function cadastrar($nome,$email,$login,$senha){
			if($this->verificador($login)==false){
				$sql = "INSERT INTO tbl_usuarios(nome,email,login,senha) VALUES(:nome,:email,:login,:senha)";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(":nome",$nome);
				$sql->bindValue(":email",$email);
				$sql->bindValue(":login",$login);
				$sql->bindValue(":senha",$senha);
				$sql->execute();
				return true;
			}else{
				return false;
			}
		}
		private function verificador($login){
			$sql = "SELECT * FROM tbl_usuarios WHERE login = :login";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":login",$login);
			$sql->execute();
			if($sql->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

		public function getAll(){
			$sql = "SELECT * FROM tbl_usuarios";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount()>0){
				return $sql->fetchAll();
			}
		}
	}
?>