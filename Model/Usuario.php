<?php 
	class Usuario
	{
		private $nome;
		private $login;
		private $senha;
		private $tipo;//tipo 1 adm tipo 0 usuario

		
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		public function getNome()
		{
			return $this->nome;
		}
		public function setLogin($login)
		{
			$this->login = $login;
		}
		public function getLogin()
		{
			return $this->login;
		}
		public function setSenha($senha)
		{
			$this->senha = $senha;
		}
		public function getSenha()
		{
			return $this->senha;
		}
		public function setTipo($tipo)
		{
			$this->tipo = $tipo;
		}
		public function getTipo()
		{
			return $this->tipo;
		}
	}
?>