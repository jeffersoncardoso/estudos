<?php
	include 'class.contato.php';
	$contato = new Contato();
	$contato->addContato("schefferzim@hotmail.com","Matty Scheffer");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Crudão</title>
</head>
<body>
	<h1>Lista de Contatos</h1>
	<p>
		<a href="add.php">Cadastrar Contato</a>
	</p>
	<table border="1" 
		width="50%" 
		style="margin: 0 auto;">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($contato->getAllContatos() as $info):?>
			<tr>
				<td><?php echo $info['id']?></td>
				<td><?php echo $info['nome']?></td>
				<td><?php echo $info['email']?></td>
				<td  style="text-align: center;">
					<a href="update.php?id=<?php echo $info['id']?>">Editar</a> - 
					<a href="controller/delete.php?id=<?php echo $info['id']?>">Excluir</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
</html>