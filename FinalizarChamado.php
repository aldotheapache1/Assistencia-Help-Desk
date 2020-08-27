<?php 
	session_start();
	if(!isset($_SESSION['login']))
		{
			header('location:Index.php');
		}
?>
<html>
	<head>	
		<meta charset="utf-8" />
		<title>Assistência - Finalizar Chamado</title>
		<link rel="icon" type="image/png" href="imgs/logo.png">
		<link href="CSS-JS/cards.css" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script type = "text/javascript" src = "CSS-JS\jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "CSS-JS\functions.js"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
				<img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				Help Desk
			</a>
			<span class="navbar-text" id="msgUsuario">Seja bem vindo, <?php echo $_COOKIE['nomeUsuario']; ?> 
				<input type="button" value="Sair" id="btnSair" class="btn btn-danger ">
			</span>
		</nav>
		
		<?php 
			require_once "BD/FuncoesBD.php";
			$id = $_GET['id'];
			$resultado = buscarChamadoPorID($id);
			apagarChamadoPorID($id);
			echo '<div class="text-success">';
			echo '<h3>O chamado foi finalizado com Sucesso</h3>';
			echo '</div>';
			?>
				<script>
					window.setTimeout(function() 
					{
						window.location = 'ConsultarChamado.php';
					}, 1000);
				</script>
		<?php
		?>
	</body>
</html>
