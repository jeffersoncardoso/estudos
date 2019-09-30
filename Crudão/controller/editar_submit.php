<?php
include '../class.contato.php';

$contato = new Contato();

if(!empty($_POST['id'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];

	$contato->editar($id,$nome);

	header('location: ../index.php');
}
?>