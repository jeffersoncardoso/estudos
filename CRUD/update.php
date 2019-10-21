<?php
	include 'class.contato.php';
	$obj = new Contato();
	//print_r($obj->getContatoId($_GET['id']));
	$info = $obj->getContatoId($_GET['id']);

	




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Contato</title>
	<meta charset="utf-8">
</head>
<body>
	<form name="editor"
		method="POST"
		action="controller/control.update.php" 
		>
		<input type="hidden" name="id" 
		value="<?php echo $_GET['id']?>">
		<br><br>
		<label>Nome</label><br>
		<input type="text" name="nome"
		 pattern="[ a-zA-ZáàãâäÀÁÂÃÄèéêëÈÉËÊìíîïÌÍÎÏòóôõöÒÓÕÔÖùúûüÙÚÛÜçÇ]{3,30}"
		 value="<?php echo $info['nome']?>">
		<br><br>
		<label>Email</label><br>
		<input type="email" name="email" 
		pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
		value="<?php echo $info['email']?>" 
		>
		<br><br>
		<input type="submit" value="enviar">
	</form>
</body>
</html>