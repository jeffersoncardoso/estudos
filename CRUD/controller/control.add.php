<?php
	include '../class.contato.php';
	$nome  = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	if(isset($email) && !empty($email)){
		$obj = new Contato();
		$obj->addContato($email,$nome);
		header('location: ../index.php');
	}else{
		echo "Erro ao adicionar contato: Email vazio ou já existente"."<br/>";
		echo "<a href='../index.php'>Voltar ao início </a>"."<br/>";
		echo "<a href='../add.php'>Voltar ao formulário</a>";
	}
?>