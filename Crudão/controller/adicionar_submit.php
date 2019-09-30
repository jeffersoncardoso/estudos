<?php
	include '../class.contato.php';
    $controle = new Contato();
	$email = $_POST['email'];
	$nome  = $_POST['nome'];

	echo  'email: '.$email.'<br>';
	echo  'nome: '.$nome.'<br';

	
	if(!empty($email)){
		$controle->addContato($email,$nome);
		header('location: ../index.php');
	}else{
		echo 'Email não preenchido!';
		header('location:  ../index.php');
	}

?>