<?php
	include 'class.contato.php';
	$contato = new Contato();
	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Lista de Contatos</title>
	<meta charset="utf-8" /> 
</head>
<body>
	<h1>Contatos</h1>
	<a href="adicionar.php">[Adicionar]</a>
	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Email</th>
				<th>Nome</th>
				<th>Operação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($contato->getAll() as $info):
			?>
			<tr>
				<td><?php echo $info['id']?></td>
				<td><?php echo $info['email']?></td>
				<td><?php echo $info['nome']?></td>
				<td>
                   <a href="editAll.php?id=<?php echo $info['id']?>" target="blank">
						Editar - 
					</a>
					<a href="controller/excluir_delete.php?id=<?php echo $info['id']?>" target ="blank">
						Excluir
				</a>
				</td>

			</tr>
			<?php
				endforeach;
			?>
		</tbody>
	</table>
</body>
</html>