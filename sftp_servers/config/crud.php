<?php

  require_once 'safety.php';
    
  class crud
  {
	private $sql_ins="";
	private $tabela="";
	private $sql_sel="";

	
  	public function __construct($tabela) // construtor, nome da tabela como parametro
  	{
  		$this->tabela = $tabela;
		return $this->tabela;
	}
  		
			
	public function inserir($campos, $valores) // fun�ao de inser�ao, campos e seus respectivos valores como parametros
	{
		global $_SG;
		
		//converte as letras minusculas em maiusculas
		$val = strtoupper($valores);
		$sql = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($val)";
		$query = mysqli_query($_SG['link'],$sql);
		
				//registro de log
				$computador_atual = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$data_acao = date('y-m-d h:i');
					$sql_log = "INSERT INTO usuarios_log (`id_usuario`,`login_usuario`,`computador`,`acao`,`tabela`,`data_acao`) VALUES 
						('".$_SESSION['usuarioID']."','".$_SESSION['usuarioLogin']."','".$computador_atual."','INSERCAO','".$this->tabela."','".$data_acao."')";
					$query = mysqli_query($_SG['link'],$sql_log);	
	}

	public function atualizar($camposvalores, $where = NULL) // fun�ao de edi�ao, campos com seus respectivos valores e o campo id que define a linha a ser editada como parametros
	{
		global $_SG;
		
		//converte as letras minusculas em maiusculas
		$camposval = strtoupper($camposvalores);		
		if ($where){
			$sql = "UPDATE  " . $this->tabela . " SET $camposval WHERE $where";
			$query = mysqli_query($_SG['link'],$sql);
		}else{
			$sql = "UPDATE  " . $this->tabela . " SET $camposval";
			$query = mysqli_query($_SG['link'],$sql);	
	  	}
		//registro de log
				$computador_atual = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$data_acao = date('y-m-d h:i');
					$sql_log = "INSERT INTO usuarios_log (`id_usuario`,`login_usuario`,`computador`,`acao`,`tabela`,`data_acao`) VALUES 
						('".$_SESSION['usuarioID']."','".$_SESSION['usuarioLogin']."','".$computador_atual."','ALTERACAO','".$this->tabela."','".$data_acao."')";
					$query = mysqli_query($_SG['link'],$sql_log);	
	}  	

	public function excluir($where = NULL) // fun�ao de exclusao, campo que define a linha a ser editada como parametro
	{
		global $_SG;
		
		if ($where)
		{
			$sql= "DELETE FROM " . $this->tabela . " WHERE $where";
			$query = mysqli_query($_SG['link'],$sql);
			$_SESSION['ckF'] = $query = mysqli_query($_SG['link'],$sql);
		}else{
			$sql = "SELECT * FROM " . $this->tabela;
			$query = mysqli_query($_SG['link'],$sql);
	  	}
		
		//registro de log
				$computador_atual = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$data_acao = date('y-m-d h:i');
					$sql_log = "INSERT INTO usuarios_log (`id_usuario`,`login_usuario`,`computador`,`acao`,`tabela`,`data_acao`) VALUES 
						('".$_SESSION['usuarioID']."','".$_SESSION['usuarioLogin']."','".$computador_atual."','EXCLUSAO','".$this->tabela."','".$data_acao."')";
					$query = mysqli_query($_SG['link'],$sql_log);	
	}

	public function lastId(){
		
		//selecionar o ultimo id do auto incremento da tabela
		global $_SG;
		
		$sql = "SELECT  auto_incremento FROM " . $this->tabela . "  ORDER BY auto_incremento DESC limit 1";
		$query = mysqli_query($_SG['link'],$sql);
			$dadostabela = mysqli_fetch_assoc($query);
			$result = $dadostabela['auto_incremento'];
			return $result;
	}	
		
 }  		
  	
?>