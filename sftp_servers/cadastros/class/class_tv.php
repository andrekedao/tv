<?php
	
	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if(isset ($_POST['cadastrar'])){ 
		$nome_tv = $_POST['nome_tv']; 
        $data_cadastro = date('Y-m-d H:i');
        $data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;		
		$crud = new crud('tv');  
        $crud->inserir("nome_tv,data_cadastro,data_atualizacao,ativo", "'$nome_tv','$data_cadastro','$data_atualizacao', '$ativo'");
        header("Location: ../tv?rS=0"); 
    }
    
    if(isset ($_POST['alterar'])){ 
		$nome_tv = $_POST['nome_tv']; 
        $data_cadastro = date('Y-m-d H:i');
        $data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
        $id = $_POST['id_tv'];		
		$crud = new crud('tv');  
        $crud->atualizar("nome_tv='$nome_tv',data_cadastro='$data_cadastro',data_atualizacao='$data_atualizacao',ativo='$ativo',id_tv='$id'");
        header("Location: ../tv?rS=1"); 
    }
    
    if (isset($_GET['acao'])){
		if ($_GET['acao'] == 'excluir'){
			$id = $_GET['ID_TV'];
			$crud = new crud('tv'); 
			$crud->excluir("id_tv = $id");
			if($_SESSION['ckF'] == 1){
				header("Location: ../tv?rS=2");
			}else{
				header("Location: ../tv?rS=3");
			}
		}
	}
	
	
	
?>