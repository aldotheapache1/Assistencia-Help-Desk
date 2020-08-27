<?php 
	session_start();
	if(!isset($_SESSION['login']))
		{
			header('location:Index.php');
		}
		$idUsuario = $_COOKIE['idUsuario'];
		
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Assistência - Usuários</title>
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

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de usuário
            </div>
            
            <div class="card-body">
              
				<div class = "col-md-10">
					<?php
				
						require_once "BD/FuncoesBD.php";
						$resultado = buscarUsuario();
						
						if($resultado->rowCount() > 0)
						{
							echo "<table class ='table table-bordered'>";
							echo "<tr>";
							echo "<th>ID </th> <th>Nome </th> <th>Login </th> <th>Senha </th> <th>Editar </th> <th>Excluir </th>";
							echo "</tr>";

							while($linha = $resultado->fetch())
								{
									echo"<tr>";
									echo"<td>".$linha['id']."</td>";
									echo"<td>".$linha['nome']."</td>";
									echo"<td>".$linha['login']."</td>";
									echo"<td>".$linha['senha']."</td>";
									echo"<td> <a class='btn btn-warning' href='EditarUsuario.php?valor=".$linha['id']."' >Editar</a>  </td>";
									echo"<td> <a class='btn btn-danger' href='ExcluirUsuario.php?id=".$linha['id']."' >Excluir</a>  </td>";
									echo "</tr>";
								}
							echo "</table>";
						}	
					?>
					<br/>
				</div>

              <div class="row mt-5">
                <div class="col-6">
                   <a class="btn btn-lg btn-warning btn-block" href="Home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>