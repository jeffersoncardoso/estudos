
<?php
	include '../class.contato.php';
	$contato = new Contato();
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$contato->excluirAll($id);
		header('location: ../index.php');
		exit;
	}
?>      