<?php		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);	//declarando vari�veis globais para fun��es de verifica��o	$_SG['conectaServidor'] = true;  	$_SG['abreSessao'] = true; 	$_SG['caseSensitive'] = true;	$_SG['validaSempre'] = true; 		// nova conex�o evita que o usu�rio force uma nova conex�o ao expirar a session	$_SG['servidor'] = 'localhost';	$_SG['usuario'] = 'root'; 	$_SG['senha'] = 'qwert!@#$%'; 	$_SG['banco'] = 'tv_redeorto';	$_SG['porta'] = '3306';		// variaveis para valida��o e verifica��o do usu�rio	$_SG['tabela'] = 'usuarios_login';       // Nome da tabela onde os usu�rios s�o salvos	$_SG['tabelaconexao'] = 'usuarios_conexao';	$_SG['tabelatentativaconexao'] = 'usuarios_tentativa_conexao';	$_SG['usuariologado'] = '../index.php?d=2';	$_SG['paginaLogin'] = '../index'; // P�gina de login			//verifica��o do status do usu�rio	// tempo em segundos que o sistema pode ficar parado	$_SG['tempologoff'] = 1800; 	//tempo em segundos para verifica��o da fun��o	$_SG['tempoverificausuario'] = 6;		
	if ($_SG['conectaServidor'] == true) {		
	  $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'], $_SG['banco'], $_SG['porta']) or die("MySQL: N�o foi poss�vel conectar-se ao servidor [".$_SG['servidor']."].");	  //mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: N�o foi poss�vel conectar-se ao banco de dados [".$_SG['banco']."].");
	}	if ($_SG['abreSessao'] == true)	  session_start();
	// valida o usu�rio de acordo com os dados na p�gina de login	function validaUsuario($usuario, $senha) {	  global $_SG;	  $nusuario = addslashes($usuario);	  $nsenha = addslashes(md5($senha));	  	  $sql = "SELECT * FROM `".$_SG['tabela']."` WHERE  `login` = '".$nusuario."' AND  `senha` = '".$nsenha."' LIMIT 1";	  $query = mysqli_query($_SG['link'],$sql);	  $resultado = mysqli_fetch_array($query);	  if (empty($resultado)) {		return false;	  } else {		$_SESSION['usuarioID'] = $resultado['id_usuario']; 		$_SESSION['usuarioLogin'] = $resultado['login']; 		$_SESSION['idEmpresa'] = $resultado['id_empresa'];				//---------------------------------------------------------------------		//---------------------------------------------------------------------		//concatena��o de pesquisa avan�ada		//---------------------------------------------------------------------		// session para parametrizar pesquisas no sistema inteiro 		// parametro para pesquisa com where		//$_SESSION['concatPesquisacw'] = " and id_empresa = ".$_SESSION['idEmpresa'];		// parametro para pesquisa sem where		//$_SESSION['concatPesquisasw'] = "";		//---------------------------------------------------------------------		//---------------------------------------------------------------------						if ($_SG['validaSempre'] == true) {		  $_SESSION['usuarioLogin'] = $usuario;		  $_SESSION['usuarioSenha'] = $senha;		  		}		 //verifica se o usu�rio j� esta logado no sistema		$sql = "select * from `".$_SG['tabelaconexao']."` where  `usuario_id` = ".$_SESSION['usuarioID']." and horario_logoff is null";			 $query = mysqli_query($_SG['link'],$sql);			 $resultado = mysqli_fetch_array($query);			 if (!$resultado) { 			 	$computador_atual = gethostbyaddr($_SERVER['REMOTE_ADDR']);				$horario_login = date('y-m-d h:i');				$ultima_acao = date('h:i:s',time());				$sql = "insert into `".$_SG['tabelaconexao']."`(`login`, `usuario_id`, `computador_atual`, `horario_login`, `ultima_acao`) values ('".$_SESSION['usuarioLogin']."','".$_SESSION['usuarioID']."','".$computador_atual."','".$horario_login."','".$ultima_acao."')"; 				$query = mysqli_query($_SG['link'],$sql);								// chama a fun��o que fica verificando se o usu�rio esta ativo				return true;				verificaUsuario();													} else{				//caso usuario j� logado				// salva dados do usu�rio e login utilizado nas tentativas de login				$computador_atual = gethostbyaddr($_SERVER['REMOTE_ADDR']);				$horario_login = date('y-m-d h:i');				$sql = "insert into `".$_SG['tabelatentativaconexao']."`(`login`, `usuario_id`, `computador_atual`, `horario_login`) values ('".$_SESSION['usuarioLogin']."','".$_SESSION['usuarioID']."','".$computador_atual."','".$horario_login."')"; 				$query = mysqli_query($_SG['link'],$sql);				//caso esteja logado retorna para a tela de login informando e bloqueando novo login				usuariologado();			}			}	}	 	// verifica a session e proteje a p�gina caso o usu�rio n�o esteja logado na session
	function protegePagina() {	  global $_SG;  		if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioLogin'])) {			expulsaVisitante();					} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioLogin'])) {		if ($_SG['validaSempre'] == true) {		  if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {			expulsaVisitante();		  }		}	  }	}		// fun��o que recebe o resultado da fun��o protege pagina e expulsa o usu�rio para a tela de login
	function expulsaVisitante() {	  global $_SG;
	  unset($_SESSION['usuarioID'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);	  header("Location: ".$_SG['paginaLogin']);	}		function usuarioLogado(){	  global $_SG;	  unset($_SESSION['usuarioID'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);	  header("Location: ".$_SG['usuariologado']);	  die;	}			//verifica ociosidade do usu�rio	function verificaUsuario(){	  global $_SG;	  	  $hora_atual = date('h:i:s',time());	  	        	$sql_log = "select * from `".$_SG['tabelaconexao']."` where  `usuario_id` = ".$_SESSION['usuarioID']." and horario_logoff is null";						$query = mysqli_query($_SG['link'],$sql_log);            $resultado = mysqli_fetch_array($query);			 $a1 = strtotime($hora_atual);			 $a2 = strtotime($resultado['ultima_acao']);			 $rs = $a1 - $a2;			 			 //compara valor data hora atual -(menos) data ultima a��o do usuario e compara com vari�vel definada			 //como tempo m�ximo de acila��o do usu�rio			 if ($rs  > $_SG['tempologoff']) {								$sql = "SELECT id_usuarios_conexao FROM `".$_SG['tabelaconexao']."` WHERE  `usuario_id` = '".$_SESSION['usuarioID']."' and horario_logoff is null";						 $query = mysqli_query($_SG['link'],$sql);						 $resultado = mysqli_fetch_array($query);										$horario_logoff = date('Y-m-d H:i');						$sql = "UPDATE `".$_SG['tabelaconexao']."` set `horario_logoff` = '".$horario_logoff."' where id_usuarios_conexao =". $resultado['id_usuarios_conexao'].""; 						$query = mysqli_query($_SG['link'],$sql);									session_destroy();				header("Location: ../index");			 }else{				$sql = "SELECT id_usuarios_conexao FROM `".$_SG['tabelaconexao']."` WHERE  `usuario_id` = '".$_SESSION['usuarioID']."' and horario_logoff is null";						 $query = mysqli_query($_SG['link'],$sql);						 $resultado = mysqli_fetch_array($query);										$hora_atual = date('h:i:s',time());						$sql = "UPDATE `".$_SG['tabelaconexao']."` set `ultima_acao` = '".$hora_atual."' where id_usuarios_conexao =". $resultado['id_usuarios_conexao'].""; 						$query = mysqli_query($_SG['link'],$sql);			 }	}	
?>