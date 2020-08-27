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
    <title>Assistência - Home</title>
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
        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
			  <?php 
			  if($_COOKIE['tipoUsuario'] == 1)
				{
				?>
					<div class="col-6 d-flex justify-content-around">
						<a href="AdicionarUsuario.php">	
							<img src="imgs/adicionar_usuario.png" width="70" height="70" alt="sometext" />
						</a>
					</div>
				<?php 
				}
			  if($_COOKIE['tipoUsuario'] == 0)
				{
				 ?>
				<div class="col-6 d-flex justify-content-around">
					<a href="CriarChamado.php">	
						<img src="imgs/criar_chamado.png" width="70" height="70" alt="sometext" />
					</a>
				</div>
				<?php 
				}
				?>
			   </div>
            </div>
			<div class="card-body">
              <div class="row">
			   <?php 
			  if($_COOKIE['tipoUsuario'] == 1)
				{
				?>
				 <div class="col-6 d-flex justify-content-around">
					<a href="ConsultarUsuario.php">
						<img src="imgs/consultar_usuario.png" width="70" height="70" alt="sometext" />
					</a>
				</div>
				<?php 
				}
				?>
				 <div class="col-6 d-flex justify-content-around">
					<a href="ConsultarChamado.php">	
						<img src="imgs/consultar_chamado.png" width="70" height="70" alt="sometext" />
					</a>
			   </div>
              </div>
            </div>
          </div>
        </div>
	  </div>
    </div>
  </body>
</html>