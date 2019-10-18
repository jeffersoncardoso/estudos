<?php
	include 'class.usuario.php';
	$obj = new Usuario();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Sistema de Gerenciamento</title>
	<meta charset="utf-8">
	<meta type="description" content="Sistema de gerenciamento e consulta de usuarios">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="script/script.js"></script>
</head>
<body>
	<div class="container">
		<ul>
			<li>
				<a href="#" onclick="cadON();listOff();consOff()">Cadastrar </a>
				<div id="formCad">
					<form name="cadastro" method="POST" action="controller/cad.php" id="cadastro">
						<label>Nome </label><br/>
						<input type="text" name="nome" placeholder="Digite SOMENTE o nome!" 
						pattern="[a-zA-Z]{3,50}" required="" ><br><br>
						<label>Sobrenome</label><br>
						<input type="text" name="sobrenome" placeholder="Digite o ÚLTIMO nome!"
						pattern="[a-zA-Z]{3,50}" required="" ><br><br>
						<label>Email</label><br>
						<input type="email" name="email" required="" placeholder="nome@provedor.com.br" 
						pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" ><br><br>
						<!--       [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$ -->
						<label>Senha</label><br>
						<input type="password" id="senha"name="senha" required=""><br><br>
						<label>Confirmar Senha</label><br>
						<input type="password" id="conf"name="conf" required=""><br><br>
						<input type="submit" id="cadastrar"value="cadastrar">
					</form>
				</div>
			</li>
			<li>
				<a href="#" onclick="listON();cadOff();consOff()">Listar e Gerenciar Usuários</a>
				<div id="list">
					<table border="1" >
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Login</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($obj->getAll() as $info):
							?>
								<tr>
									<th><?php echo $info['id']?></th>
									<th><?php echo $info['nome']?></th>
									<th><?php echo $info['email']?></th>
									<th><?php echo $info['login']?></th>
								</tr>
							<?php
								endforeach;
							?>
						</tbody>
					</table>
				</div>
			</li>
			<li>
				<a href="#" onclick="consON();cadOff();listOff()">Consultar Usuário</a>
				<div id="formCons">
					<form name="consulta" method="POST">
						<span>Consultar por </span>
						<select name="forma">
							<option value="nome">nome</option>
							<option value="login">login</option>
							<option value="email">email</option>
						</select>
						<input type="text" name="conteudo">
						<input type="submit" value="consultar" onclick="tableON()">
					</form>
					<table border="1" id="resultCons">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Login</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$forma = $_POST['forma'];
								$conteudo = $_POST['conteudo'];
								
								foreach($obj->getUsuario($forma,$conteudo) as $info):
							?>
								<tr>
									<th><?php echo $info['id']?></th>
									<th><?php echo $info['nome']?></th>
									<th><?php echo $info['email']?></th>
									<th><?php echo $info['login']?></th>
								</tr>
							<?php
								endforeach;
							?>
						</tbody>
					</table>
				</div>
			</li>
		</ul>
	</div>
	<!--<script type="text/javascript">
			function mostrarValor() {
    			var senha = document.getElementById("senha").value;
    			var conf  = document.getElementById("conf").value;
    			if(senha!=conf){
    				alert("As senhas não correspondem!");}
    		}
    		document.getElementById("cadastrar").onclick = function(e){
    			mostrarValor();
    			e.preventDefault();
    		}
    </script>-->
    </body>
</html>