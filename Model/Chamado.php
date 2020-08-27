<?php 
	class Chamado
	{
		private $titulo;
		private $categoria;
		private $descricao;
		private $idUsuario;
		
		public function setTitulo($titulo)
		{
			$this->titulo = $titulo;
		}
		public function getTitulo()
		{
			return $this->titulo;
		}
		public function setCategoria($categoria)
		{
			$this->categoria = $categoria;
		}
		public function getCategoria()
		{
			return $this->categoria;
		}
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}
		public function getDescricao()
		{
			return $this->descricao;
		}
		public function setIdUsuario($idUsuario)
		{
			$this->idUsuario = $idUsuario;
		}
		public function getIdUsuario()
		{
			return $this->idUsuario;
		}

	}
	
?>