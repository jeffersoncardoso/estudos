<?php 
class Contato{
	private $pdo;
	function __construct(){
		$this->pdo = new PDO("mysql:dbname=db_testes;host=localhost","root","");
		echo "conectado";
	}

	//C
	public function addContato($email,$nome=""){
		if($this->Verificador($email) == false){
			$sql = "INSERT INTO tbl_contatos(email,nome) VALUES(:email,:nome)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':nome',$nome);
			$sql->execute();
			return true;
		}else{
			return false;
		}
	}
	//verificador de emails
	private function Verificador($email){
		$sql = "SELECT email FROM tbl_contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email',$email);
		$sql->execute();
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}

	}
	//verificador de ID's
	private function VerificadorId($id){
		$sql = "SELECT * FROM tbl_contatos WHERE id=:id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}

	//R
	public Function getContato($email){
		if($this->Verificador($email)==true){
			$sql = "SELECT * FROM tbl_contatos WHERE email = :email ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':nome',$nome);
			$sql->execute();
			return true;
		}
	}
	public function getContatoId($id){
		if($this->VerificadorId($id)==true){
			$sql = "SELECT * FROM tbl_contatos WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();
			return $sql->fetch();
			
		}
	}
	public Function getAllContatos(){
		$sql = "SELECT * FROM tbl_contatos";
		$sql = $this->pdo->query($sql);
		if($sql->rowCount()>0){
			return $sql->fetchAll();
		}else{
			echo "Nenhum usuário encontrado";
		}
		return true;
	}

	//U
	public Function AttNome($id,$nome){
		$this->nome = $_POST['nome'];
		if(isset($this->nome) && !empty($this->nome)){
			$sql = "UPDATE tbl_contatos SET nome = :nome WHERE id=:id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->bindValue(':nome',$nome);
			$sql->execute();
			return true;
		}else{
			return false;
		}
	}
	public Function AttAll($id,$novo_email,$nome){
		if($this->VerificadorId($id)==true){
			$sql = "UPDATE tbl_contatos SET email = :novo_email,nome=:nome WHERE id=:id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->bindValue(':novo_email',$novo_email);
			$sql->bindValue(':nome',$nome);
			$sql->execute();
			return true;
		}else{
			echo "Email já existem";
		}
	}
	//D
	public Function delete($id){
		//if($this->VerificadorId($id)==true){
			$sql = "DELETE FROM tbl_contatos WHERE id=:id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$id);
			$sql->execute();
			return true;
		//}
	}

}

?>