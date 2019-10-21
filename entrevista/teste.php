<?php
	
	session_start();
	include 'class.usuario.php';
	
	$obj = new Usuario();
	//$obj->getUsuario($forma,$conteudo);
?>
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
				$campo = addslashes($_GET['campo']);
				$filtro = addslashes($_GET['filtro']);
				echo $campo."=".$filtro;

				print_r($obj->getUsuario('id',1)[0]);
				echo('<Br>'.count($obj->getUsuario('id',1)[0]));
				
				
			foreach($obj->getUsuario($campo,$filtro) as $info):
			?>
		<		<tr>
					<th><?php echo $info['id']?></th>
					<th><?php echo $info['nome']?></th>
					<th><?php echo $info['email']?></th>
					<th><?php echo $info['login']?></th>
				</tr>-->
			<?php
				endforeach;
			?>
		</tbody>
	</table>