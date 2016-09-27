<?php
	

	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	

	class Upload{
		private $arquivo;
		private $pasta;

		function __construct($arquivo, $pasta){
			$this->arquivo = $arquivo;
			$this->pasta   = $pasta;
		}
		
		private function getExtensao(){
			//retorna a extensao do arquivo	
			return $extensao = strtolower(end(explode('.', $this->arquivo['name'])));
		}		
				
		public function salvar(){									
			$extensao = $this->getExtensao();
			
			//localizacao do arquivo 
			$destino = $this->pasta . name;
			
			//move o arquivo
			if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
				if ($this->arquivo['error'] == 1)
					return "Tamanho excede o permitido";
				else
					return "Erro " . $this->arquivo['error'];
			}
				
			return "Sucesso";
		}						
	}
?>