<?php
	$host = "127.0.0.1";
	$usuario = "root";
	$senha = "";
	$database = "assistencia";

	try{
		$conn = new PDO("mysql:host = $host", $usuario, $senha);
		$conn->setAttribute(PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION);
		$sql = "DROP DATABASE $database";
		$conn->exec($sql);
		
		echo "<b>Banco de dados removido com sucesso!</b>";	
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	$conn = null;
?>