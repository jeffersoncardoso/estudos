<?php
	include '../class.contato.php';
	
	$obj = new Contato();
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$obj->delete($id);
		header('location: ../index.php');
		exit;
	}
?>


