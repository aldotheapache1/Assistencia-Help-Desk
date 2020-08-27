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
    <title>Assistência - Abrir Chamado</title>
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
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="post" action="CriarChamado.php">
                    <div class="form-group">
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título" maxlength="20" required <?php if($_COOKIE['tipoUsuario'] == 1){echo 'disabled=""';}?> >
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control" <?php if($_COOKIE['tipoUsuario'] == 1){echo 'disabled=""';}?>>
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="descricao" class="form-control" rows="3"  maxlength="60" required <?php if($_COOKIE['tipoUsuario'] == 1){echo 'disabled=""';}?>></textarea>
                    </div>
					<?php 
						if($_COOKIE['tipoUsuario'] == 1)
						{	
							echo '<div class="text-danger">';
							echo '<h3>Adiministradores não criam chamados</h3>';
							echo '</div>';
						}
					?>
                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" href="Home.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit" <?php if($_COOKIE['tipoUsuario'] == 1){echo 'disabled=""';}?>>Criar</button>
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

		if($_COOKIE['tipoUsuario'] == 0)
		{
			if(!empty($_POST))
			{
				require_once "BD/FuncoesBD.php";			
				require_once "Model/Chamado.php";	
				$chamado = new Chamado();
				$chamado->setTitulo($_POST["titulo"]);
				$chamado->setCategoria($_POST["categoria"]);
				$chamado->setDescricao($_POST["descricao"]);
				$chamado->setIdUsuario($_COOKIE['idUsuario']);
				salvarChamado($chamado);
				echo '<div class="text-success">';
				echo '<h3 style="text-align:center">Chamado criado com sucesso</h3>';
				echo '</div>';
				?>
				<script>
					window.setTimeout(function() {
												window.location = 'ConsultarChamado.php';
											  }, 1000);
				</script>
			<?php
			}
		}
				
			?>
  </body>
</html>