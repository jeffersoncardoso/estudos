<?php
	include '../class.contato.php';
	
	if(isset($_POST['id'])&&!empty($_POST['id'])){

		if(isset($_POST['email'])&&!empty($_POST['email'])){
			$id = $_POST['id'];
			$email = $_POST['email'];
			$nome = $_POST['nome'];
			//echo ($id.''.$email.''.$nome);
			$obj = new Contato();
			$obj->AttAll($id,$email,$nome);
			
			header('location: ../index.php');
		}else{
			echo "Falha no update: email vazio.";
		}
	}else{
		header('location: ../index.php');
	}

?>