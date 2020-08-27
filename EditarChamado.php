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
		<title>Assistência - Editar Chamado</title>
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
				  Edição de chamado
				</div>
		<?php 
			require_once "BD/FuncoesBD.php";
			$id = $_GET['valor'];
			$resultado = buscarChamadoPorID($id);
			for($i=0; $row = $resultado->fetch(); $i++)
			{
		?>
			<div class = "card-abrir-chamado">
				<form  action="EditarChamado.php?valor=<?php echo $id ?>" method = "post">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<label for = "titulo">Titulo: </label>
						<input type = "text" class="form-control" id = "titulo" name = "titulo"  maxlength="20" required value="<?php echo $row['titulo']; ?>" /> <br/>
						<label for = "categoria">categoria: </label>
						<input type = "text" class="form-control" id = "categoria" name = "categoria"  disabled="" value="<?php echo $row['categoria']; ?>" /> <br/>
						<div class="form-group">
							<label>Descrição</label>
							<textarea name="descricao" class="form-control" rows="3"  maxlength="60" required  /><?php echo $row['descricao']; ?></textarea>
						</div>
						<input type = "submit"  class="btn btn-primary" name='Salvar' value = "Salvar"/> <br/>
					</div>
				</form>
				<?php
				
			}			

						if(!empty($_POST))
						{
							$_GET['valor'] = '';
							require_once "Model/Chamado.php";	
							$chamado = new Chamado();
							$chamado->setTitulo($_POST["titulo"]);
							//$chamado->setCategoria($_POST["categoria"]);
							$chamado->setDescricao($_POST["descricao"]);
							$chamado->setIdUsuario($_COOKIE['idUsuario']);
							
							updateChamado($chamado, $id);
							?>
								<script>
									window.setTimeout(function() 
									{
										window.location = 'ConsultarChamado.php';
									}, 100);
								</script>
							<?php
						}
			?>
			<div class="row mt-5">
                <div class="col-6">
                   <a class="btn btn-lg btn-warning btn-block" href="ConsultarChamado.php">Voltar</a>
                </div>
              </div>
			</div>
	</body>
</html>
