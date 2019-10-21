<?php
    session_start();
    /*if(empty($_SESSION['id'])){
    	header("location: login.php");
    }*/
    include 'class.usuario.php';
    $obj = new Usuario();
?>
<!DOCTYPE html>
<html onload="bla()">
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="script/script.js"></script>
</head>
<body >
	<div class="container">
		<ul>
			<li>
				<a href="#"  onclick="cadOn();listOff();consOff()">Cadastrar Usuário</a>
				<div id="formCad">
					<form name="cadastro" method="POST" action="controller/add.php">
						<label>Nome: </label>
						<input type="text" name="nome" required=""><br><br>
						<label>Sobrenome: </label>
						<input type="text" name="sobrenome" required=""><br><br>
						<label>Email: </label>
						<input type="email" name="email" required=""><br><br>
						<label>Senha: </label>
						<input type="password" name="senha" required=""><br><br>
						<label>Confirme sua senha:</label>
						<input type="password" name="conf" required=""><Br><br>
						<input type="submit" value="Cadastrar">
					</form>
				</div>
			</li>
			<li>
				<a href="#"  onclick="cadOff();listOn();consOff()">Listagem de Usuários</a>
				<div id="lista">
					<table border="1">
							<thead>
								<tr>
									<th>id</th>
									<th>Nome</th>
									<th>Email</th>
									<th>Login</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($obj->lerUsuarios() as $info):
								?>
								<tr>
									<th><?php echo 1;?></th>
									<th><?php echo $info['nome'];?></th>
									<th><?php echo $info['email'];?></th>
									<th><?php echo $info['login'];?></th>
								</tr>
							<?php endforeach;?>
							</tbody>
						</table>
				</div>
			</li>
			<li>
				<div>
					<a href="#" onclick="cadOff();listOff();consOn()">Consultar Cadastro</a>
					<div id="consulta">
						
					</div>
				</div>
			</li>
		</ul>
	</div>
</body>
</html>