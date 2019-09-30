<?php
	include '../class.contato.php';
	//echo $_POST['id'];
	if(!empty($_POST['id'])){
		$contato = new Contato();
		$id = $_POST['id'];
		$novo_email = $_POST['email'];
		$nome = $_POST['nome'];
		if(!empty($novo_email)){
			$contato->editAll($id,$novo_email,$nome);
			//header('location: ../index.php');
			return  true;
		}else{
			header('location: ../index.php');
			exit;
			//echo '<a href  ../index.php>voltar<a>';
		}
	}
?>