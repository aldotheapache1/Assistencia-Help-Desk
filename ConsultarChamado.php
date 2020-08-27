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
    <title>Assistência - Chamados</title>
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
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
				<div class = "col-md-10">
					<?php
					if($_COOKIE['tipoUsuario'] == 1)
					{
						require_once "BD/FuncoesBD.php";
						$resultado = buscarChamado();
						
						if($resultado->rowCount() > 0)
						{
							echo "<table class ='table table-bordered'>";
							echo "<tr>";
							echo "<th>ID </th> <th>Titulo </th> <th>Categoria </th> <th>Descrição </th> <th>Autor </th> <th>Finalizar </th>";
							echo "</tr>";

							while($linha = $resultado->fetch())
								{
									$idUsuario = $linha['idUsuario'];
									$resultadoAutor = buscarAutorPorID($idUsuario);
									while($linhaAutor = $resultadoAutor->fetch())
									{
										$autor = $linhaAutor['nome'];								
									}
									echo"<tr>";
									echo"<td>".$linha['id']."</td>";
									echo"<td>".$linha['titulo']."</td>";
									echo"<td>".$linha['categoria']."</td>";
									echo"<td>".$linha['descricao']."</td>";
									echo"<td>".$autor."</td>";
									echo"<td> <a class='btn btn-success' href='FinalizarChamado.php?id=".$linha['id']."' >Finalizar</a>  </td>";
									echo "</tr>";
								}
							echo "</table>";
						}
					}
					else
					{
						require_once "BD/FuncoesBD.php";
						$resultado = buscarChamadoAutor($idUsuario);
						$resultadoAutor = buscarAutorPorID($idUsuario);
						while($linhaAutor = $resultadoAutor->fetch())
						{
							$autor = $linhaAutor['nome'];
						}	
						if($resultado->rowCount() > 0)
						{
							echo "<table class ='table table-bordered'>";
							echo "<tr>";
							echo "<th>ID </th> <th>Titulo </th> <th>Categoria </th> <th>Descrição </th> <th>Autor </th> <th>Editar </th>";
							echo "</tr>";

							while($linha = $resultado->fetch())
								{
									echo"<tr>";
									echo"<td>".$linha['id']."</td>";
									echo"<td>".$linha['titulo']."</td>";
									echo"<td>".$linha['categoria']."</td>";
									echo"<td>".$linha['descricao']."</td>";
									echo"<td>".$autor."</td>";
									echo"<td> <a class='btn btn-warning' href='EditarChamado.php?valor=".$linha['id']."' >Editar</a>  </td>";
									echo "</tr>";
								}
							echo "</table>";
						}
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