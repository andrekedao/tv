<?php 

	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if(isset ($_POST['cadastrar'])){
		$id_tv = $_POST['id_tv'];
		$nome_usuario = $_POST['nome_usuario']; 
		$cpf = $_POST['cpf'];
		$login = $_POST['login'];
		$senha = md5($_POST['senha']); 
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$tipo_usuario = $_POST['tipo_usuario'];
		$data_cadastro = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
       	$crud = new crud('usuarios_login');  
        $crud->inserir("id_tv,nome_usuario,cpf,login,senha,email,telefone,tipo_usuario,data_cadastro,ativo", 
                       "'$id_tv','$nome_usuario','$cpf','$login','$senha','$email','$telefone','$tipo_usuario','$data_cadastro','$ativo'");
        header("Location: ../usuario-login?rS=0"); 
    }
    
    if(isset ($_POST['alterar'])){
		$id_tv = $_POST['id_tv'];
		$nome_usuario = $_POST['nome_usuario']; 
		$cpf = $_POST['cpf'];
		$login = $_POST['login'];
		$senha = $_POST['senha']; 
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$tipo_usuario = $_POST['tipo_usuario'];
		$data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
        $id = $_POST['id_usuario'];		
		$crud = new crud('usuarios_login');  
        $crud->atualizar("id_tv='$id_tv',nome_usuario='$nome_usuario',cpf='$cpf',login='$login',senha='$senha',email='$email',telefone='$telefone',tipo_usuario='$tipo_usuario',data_atualizacao='$data_atualizacao',ativo='$ativo'","id_usuario='$id'");
        header("Location: ../usuario-login?rS=1"); 
    }
    
    if (isset($_GET['acao'])){
		if ($_GET['acao'] == 'excluir'){
			$id = $_GET['ID_USUARIO'];
			$crud = new crud('usuarios_login'); 
			$crud->excluir("ID_USUARIO = $id");
			if($_SESSION['ckF'] == 1){
				header("Location: ../usuario-login?rS=2");
			}else{
				header("Location: ../usuario-login?rS=3");
			}
		}
	}
    


?>