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
		<title>Assistência - Editar usuário</title>
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
		
		<div class="container">    
		  <div class="row">

			<div class="card-abrir-chamado">
			  <div class="card">
				<div class="card-header">
				  Edição de usuário
				</div>
		<?php 
			require_once "BD/FuncoesBD.php";
			$id = $_GET['valor'];
			$resultado = buscarAutorPorID($id);
			for($i=0; $row = $resultado->fetch(); $i++)
			{
				echo $row['senha'];
		?>
			<div class = "card-abrir-chamado">
				<form  action="EditarUsuario.php?valor=<?php echo $id ?>" method = "post">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<label for = "nome">Nome: </label>
						<input type = "text" class="form-control" id = "nome" name = "nome"  maxlength="50" required value="<?php echo $row['nome']; ?>" /> <br/>
						<label for = "login">Login: </label>
						<input type = "text" class="form-control" id = "login" name = "login"  maxlength="20" required value="<?php echo $row['login']; ?>" /> <br/>
						<label for = "senha">Senha: </label>
						<input name="senha" type="text" class="form-control" id = "senha" name = "senha" maxlength="20" required value="<?php echo $row['senha']; ?>" /> <br/>
						<input type = "submit"  class="btn btn-primary" name='Salvar' value = "Salvar"/> <br/>
					</div>
				</form>
				<?php
			}
						if(!empty($_POST))
						{
							$_GET['valor'] = '';
							require_once "Model/usuario.php";	
							$usuario = new Usuario();
							$usuario->setNome($_POST["nome"]);
							$usuario->setLogin($_POST["login"]);
							$usuario->setSenha($_POST["senha"]);
							//$usuario->setTipo($_POST["tipo"]);
							
							updateUsuario($usuario, $id);
							?>
								<script>
									window.setTimeout(function() 
									{
										window.location = 'ConsultarUsuario.php';
									}, 100);
								</script>
							<?php
						}
			?>
				<div class="row mt-5">
                <div class="col-6">
                   <a class="btn btn-lg btn-warning btn-block" href="ConsultarUsuario.php">Voltar</a>
                </div>
              </div>
			</div>
	</body>
</html>
