<?php
	session_start();
	/*if(empty($_SESSION['id'])){
		header("location: ../login.php");
	}*/
	include '../class.usuario.php';
	$obj = new Usuario();

	$nome =$_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$nomecompleto = addslashes($nome." ".$sobrenome);
	//echo $nomecompleto."<br>";
	$login = addslashes(str_replace(" ",".", $nomecompleto));
	//echo $login."<br>";
	$email = addslashes($_POST['email']);
	//echo $email."<Br>";
	$senha = md5($_POST['senha']);
	//echo $senha."<br>";
	$conf = md5($_POST['conf']);
	if($senha == $conf){

		$obj->cadastrar($nomecompleto,$login,$email,$senha);
	}

	
?>