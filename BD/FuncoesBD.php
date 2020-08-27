<?php
	require_once"../Assistencia_Help_Desk/Model/Chamado.php";
	$chamado = new Chamado();
	function salvarChamado($chamado)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "INSERT INTO chamado (titulo, categoria, descricao, idUsuario)  VALUES ('". $chamado->getTitulo() ."','". $chamado->getCategoria() ."','". $chamado->getDescricao() ."','". $chamado->getIdUsuario() ."')";
			$conexaoBD->exec($sql);
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function salvarUsuario($usuario)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "INSERT INTO usuario (nome, login, senha, tipo)  VALUES ('". $usuario->getNome() ."','". $usuario->getLogin() ."','". $usuario->getSenha() ."','". $usuario->getTipo() ."')";
			$conexaoBD->exec($sql);
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function buscarChamado()
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "select * from chamado";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function buscarUsuario()
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "select * from usuario";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function buscarChamadoAutor($idUsuario)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "SELECT * FROM chamado WHERE idUsuario =". $idUsuario;
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function buscarAutorPorID($idUsuario)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "SELECT * FROM usuario WHERE id='".$idUsuario."'";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function buscarChamadoPorID($idChamado)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "SELECT * FROM chamado WHERE id='".$idChamado."'";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function apagarChamadoPorID($idChamado)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "DELETE FROM chamado WHERE id='".$idChamado."'";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function apagarUsuarioPorID($idUsuario)
	{
		try
		{
			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "DELETE FROM usuario WHERE id='".$idUsuario."'";
			$resultado = $conexaoBD->query($sql);

			return $resultado; 
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	
	function updateChamado($chamado, $idChamado)
	{
		try
		{

			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "UPDATE chamado SET titulo = '". $chamado->getTitulo() ."', descricao = '". $chamado->getDescricao() ."', idUsuario = '". $chamado->getIdUsuario() ."' WHERE id='".$idChamado."'";
			$conexaoBD->exec($sql);
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
	function updateUsuario($usuario, $idUsuario)
	{
		try
		{

			$conexaoBD = new PDO ('mysql:host=localhost;dbname=assistencia','root','');
			$sql = "UPDATE usuario SET nome = '". $usuario->getNome() ."', login = '". $usuario->getLogin() ."', senha = '". $usuario->getSenha() ."' WHERE id='".$idUsuario."'";
			$conexaoBD->exec($sql);
		}
		catch(PDOException $e)
		{
			die("erro ao conectar: " . $e->getMessage());
		}
	}
?>