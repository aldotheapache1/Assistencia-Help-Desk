<?php 
	session_start();
	if(isset($_SESSION['login']))
		{
			header('location:Home.php');
		}
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Assistência - Login</title>
	<link rel="icon" type="image/png" href="imgs/logo.png">
	<link href="CSS-JS/cards.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Acesso ao Sistema
            </div>
            <div class="card-body">
              <form action="Index.php" method="post">
                <div class="form-group">
                  <input name="login" type="login" class="form-control" placeholder="Login" required>
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha" required>
                </div>
				
				<!--  
				<input type="radio" id="tipoLogin" name="tipoLogin" value="1" checked="checked">
				<label for="tipo">Administrador</label><br>
				<input type="radio" id="tipoLogin" name="tipoLogin" value="0">
				<label for="tipo">Usuário</label><br>
				-->
				
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
			  <?php
				if(!empty($_POST))
					{
						$login = $_POST['login'];
						$senha = $_POST['senha'];

						$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
						
						$sql = "select * from usuario where login = '$login' and senha = '$senha'";
					
						$resultado = $conexaoBD->query($sql);
						if($resultado->rowCount() > 0)
							{
								$linha = $resultado->fetch();
								session_start();
								$_SESSION['login'] = $login;
								$_SESSION['senha'] = $senha;
								$_SESSION['nome'] = $linha['nome'];
								$_SESSION['tipo'] = $linha['tipo'];
								$_SESSION['id'] = $linha['id'];

								setcookie('nomeUsuario',$linha['nome']);
								setcookie('tipoUsuario',$linha['tipo']);
								setcookie('idUsuario',$linha['id']);
								header('Location: Home.php');
							}
						else
							{
								

								 echo '<div class="text-danger">';
								 echo 'Usuário ou senha inválido(s)';
								 echo '</div>';

							}
					}

				?>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>