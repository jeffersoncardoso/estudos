<?php 
	class Usuario{
		private $pdo;
		function __construct(){
			$this->pdo = new PDO("mysql:dbname=db_testes;host=localhost","root","");
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
		/*public function getUsuario($forma,$conteudo){
				$sql = "SELECT * from tbl_usuarios WHERE :forma LIKE '%".$conteudo."%'";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(":forma",$forma);
				$sql->bindValue(":conteudo",$conteudo);
				$sql->execute();
				if($sql->rowCount()>0){
					return $sql->fetchAll();
				}else{
					echo "Usuário não encontrado";
				}
		}*/
		public function getUsuario($campo,$filtro){
				$sql = "SELECT * from tbl_usuarios WHERE :campo = :filtro";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(":campo",$campo);
				$sql->bindValue(":filtro",$filtro);
				$sql->execute();				
				if($sql->rowCount()>0){
					return $sql->fetchAll();
				}else{
					echo "Usuário não encontrado";
				}
		}
	}
?>