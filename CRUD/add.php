<?php?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar</title>
	<meta charset="utf-8">

</head>
<body>
	<form name="cadastro" method="POST" action="controller/control.add.php">
		<label for="nome">Nome</label><br/>
		<input type="text" name="nome" id="nome"
			pattern="[ a-zA-ZáàãâäÀÁÂÃÄèéêëÈÉËÊìíîïÌÍÎÏòóôõöÒÓÕÔÖùúûüÙÚÛÜçÇ]{3,30}" 
			required="" 
		>
		<br/><br/>
		<label for="email">Email</label><br/>
		<input type="email" name="email" id="email"
			pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
		    required="" 
		><br/><br/>
		<input type="submit" value="cadastrar">
	</form>
</body>
</html>