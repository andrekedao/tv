<?php 
	
	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if(isset ($_POST['cadastrar'])){
		$descricao = $_POST['descricao'];
		$link = $_POST['link']; 
		$data_cadastro = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;		
		$crud = new crud('rss');  
        $crud->inserir("descricao,link,data_cadastro,ativo", "'$descricao','$link','$data_cadastro','$ativo'");
        header("Location: ../rss?rS=0"); 
    }
    
    if(isset ($_POST['alterar'])){
		$descricao = $_POST['descricao'];
		$link = $_POST['link'];
		$data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
        $id = $_POST['id_rss'];		
		$crud = new crud('rss');
        $crud->atualizar("descricao='$descricao',link='$link',data_atualizacao='$data_atualizacao',ativo='$ativo'","id_rss='$id'");
        header("Location: ../rss?rS=1"); 
    }
    
    if (isset($_GET['acao'])){
		if ($_GET['acao'] == 'excluir'){
			$id = $_GET['ID_RSS'];
			$crud = new crud('rss'); 
			$crud->excluir("id_rss = $id");
			if($_SESSION['ckF'] == 1){
				header("Location: ../rss?rS=2");
			}else{
				header("Location: ../rss?rS=3");
			}
		}
	}



?>