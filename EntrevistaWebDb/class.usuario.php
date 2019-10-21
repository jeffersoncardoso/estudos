<?php
	class Usuario{
		private $pdo;
		function __construct(){
			$this->pdo = new PDO("mysql:dbname=db_testes;host=localhost","root","");
			echo "conectado";
		}
		public function cadastrar($nomecompleto,$login,$email,$senha){
			if ($this->verificador($login)==false) {
				$sql = "INSERT INTO tbl_usuarios(nome,login,email,senha) VALUES(:nome,:login,:email,:senha)";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(":nome",$nomecompleto);
				$sql->bindValue(":login",$login);
				$sql->bindValue(":email",$email);
				$sql->bindValue(":senha",$senha);
				$sql->execute();
				return true;
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

		public function lerUsuarios(){
			$sql = "SELECT * FROM tbl_usuarios";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount()>0){
				return $sql->fetchAll();
			}
		}
	}
?>