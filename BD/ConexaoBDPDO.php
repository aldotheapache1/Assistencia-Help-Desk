<?php
class ConexaoBDPDO{
	private $HOST = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $conexao;
	
	public function criarConexao(){
		try {
			$this->conexao = new PDO("mysql:host = $this->HOST", $this->usuario, $this->senha);
			$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function getConexao(){
		return $this->conexao;
	}
	
	public function fecharConexao(){
		$this->conexao = null;
	}
	
}
?>