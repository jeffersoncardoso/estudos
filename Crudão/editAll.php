
<a href="index.php">Inicio</a>
<?php
	include 'class.contato.php';
	$contato= new Contato();
	if(!empty($_GET['id'])){
		$id  = $_GET['id'];
		$info = $contato->getInfo($id);

		if(empty($info['id'])){
			header('location: index.php');
			exit;
		}
	}else{
		header('location: php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
	<title>Editar</title>
	<meta charset="utf-8">
	<meta name='description' content="Página de edição dos contatos">
	<script type="text/javascript">
		function validar(){
			var email = document.getElementById("email").value.length;
			if(email==''){
				alert('Email vazio!');
			}
		}
	</script>
</head>
<body>
	<fieldset>
		<legend>Editar</legend>
		<form name="editar" method="POST"  action="controller/edit.all_submit.php">
			<input type="hidden" name="id" value="<?php echo $info['id'] ?>">
			<label for="nome">Digite o novo nome</label>
			<input type="text" id='nome'name ='nome' value="<?php echo $info['nome']?>" >
			<br>
			<label for="email">Digite o novo email</label>
			<input type="email" name="email" id="email" value="<?php echo $info['email']?>">
			<br>
			<input type="submit" value="enviar" onclick="validar()">
		</form>
	</fieldset>
	
</body>
</html>      