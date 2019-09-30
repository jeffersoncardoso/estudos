
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Adicionar Contato</title>
	<meta charset="utf-8">
</head>
<body>
	<a href="index.php">[Inicio]</a>
	<h1>Adicionar  Contato</h1>
	<fieldset>
		<legend>Castre-se</legend>
		<form name="cadastro" method="POST" action=" controller/adicionar_submit.php ">
			<label for="nome">Nome</label>
			<input type="text" id="nome" name="nome">
			<br>
			<label for="email">Email</label>
			<input type="text" id="email" name="email">
			<br>
			<input type="submit" name="enviar">
		</form>
	</fieldset>
</body>
</html>   