<?php
	session_start();
	include '../class.usuario.php';
	$obj = new Usuario();
	/*if(empty($_SESSION['id'])){
		header("location: login.php");
	}*/

	$senha = md5($_POST['senha']);
	$conf  = md5($_POST['conf']);

	if($senha != $conf):
?>
	<script type="text/javascript">
		alert("As senhas não conferem!");
		setTimeout(function() {
    		window.location.replace("../index.php");
		}, 300);
	</script>
<?php
	endif;

	$nome = addslashes($_POST['nome']);
	$sobrenome = addslashes($_POST['sobrenome']);
	$nomecompleto = $nome." ".$sobrenome;
	$login = str_replace(" ",".",$nomecompleto);
	$email = addslashes($_POST['email']);
	echo $email;

	$obj->cadastrar($nomecompleto,$email,$login,$senha);
	header("location: ../index.php");

?>