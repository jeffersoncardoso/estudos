<?php
	class  Contato{
		private $pdo;
		public function __construct(){
			$this->pdo = new PDO("mysql:dbname=estudos;host=localhost",'root','');
			//echo "Ola";
		}
		//Create
		public function addContato($email,$nome=''){
			//1°  verificar se o email existe
			//2° adicionar
			if($this->verificador($email) ==  false){
				$sql = "INSERT INTO tbl_usuarios(email,nome) VALUES(:email,:nome)";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':email', $email);
				$sql->bindValue(':nome',$nome);
				$sql->execute();

				return true;
			}else{
				return false;
			}
		}

		//metodo auxiliar para verificar a existencia do email
		private function verificador($email){
			$sql = "SELECT * FROM tbl_usuarios WHERE email = :email";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email',$email);
			$sql->execute();

			if($sql->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}


		//read
		public function getInfo($id){
			$sql = "SELECT * FROM tbl_usuarios WHERE id=$id";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount()>0){
				return $sql->fetch();
			}else{
				return '';
			}
		}
		public function getAll(){
			$sql = "SELECT * FROM tbl_usuarios";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount()>0){
				return $sql->fetchAll();
			}else{
				return array();
			}
		}
		//Update
		public function editar($id,$nome){
			$sql = "UPDATE tbl_usuarios SET nome = :nome WHERE id = :id";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':nome',$nome);
				$sql->bindValue(':id',$id);
				$sql->execute();
		}

		public function editAll($id,$novo_email,$nome){
			//se o novo email não existir, pode-se alterar
			if($this->verificador($novo_email)==false){
				$sql = "UPDATE tbl_usuarios SET email = :novoEmail,nome = :nome WHERE id = :id";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':novoEmail',$novo_email);
				$sql->bindValue(':nome',$nome);
				$sql->bindValue(':id',$id);
				$sql->execute();
				echo 'Dados atualizados!';
				echo "<a href='../index.php'>Voltar ao inicio</a>";
				return true;
			}else{
				echo 'Email já  existe! <br>';
				echo "<a href='../index.php'>Voltar ao inicio</a>";
				return false;
			}
		}
		//Delete  
		public function excluirAll($id){
			$sql = "DELETE FROM tbl_usuarios WHERE id = :id";
			$sql= $this->pdo->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();
			return true;
		}
	}
?>