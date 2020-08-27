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
    <title>Assistência - Criar Usuário</title>
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
              Criação de Usuário
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="post" action="AdicionarUsuario.php">
                    <div class="form-group">
                      <label>Nome</label>
                      <input name="nome" type="text" class="form-control" placeholder="Nome" maxlength="50" required>
                    </div>
					<div class="form-group">
                      <label>Login</label>
                      <input name="login" type="text" class="form-control" placeholder="Login" maxlength="20" required>
                    </div>
					<div class="form-group">
                      <label>Senha</label>
                      <input name="senha" type="password" class="form-control" placeholder="Senha" maxlength="20" required>
                    </div>
                    
                    <div class="form-group">
						<input type="radio" id="tipo" name="tipo" value="1" checked="checked">
						<label for="tipo">Administrador</label><br>
						<input type="radio" id="tipo" name="tipo" value="0">
						<label for="tipo">Usuário</label><br>
                    </div>
                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" href="Home.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Criar</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
	<?php
			if(!empty($_POST))
			{
				require_once "BD/FuncoesBD.php";			
				require_once "Model/Usuario.php";	
				$usuario = new Usuario();
				$usuario->setNome($_POST["nome"]);
				$usuario->setLogin($_POST["login"]);
				$usuario->setSenha($_POST["senha"]);
				$usuario->setTipo($_POST["tipo"]);
				salvarUsuario($usuario);
				echo '<div class="text-success">';
				echo '<h3 style="text-align:center">Usuário criado com sucesso</h3>';
				echo '</div>';
				?>
				<script>
					window.setTimeout(function() {
												window.location = 'ConsultarUsuario.php';
											  }, 2500);
				</script>
			<?php
			}			
			?>
  </body>
</html>