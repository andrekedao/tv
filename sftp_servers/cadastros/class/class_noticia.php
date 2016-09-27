<?php 

	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if(isset ($_POST['cadastrar'])){
		$id_tv = $_POST['id_tv'];
		$id_rss = $_POST['id_rss']; 
		$id_template = $_POST['id_template'];  
		$tempo_exibicao = $_POST['tempo_exibicao'];
		$periodo_exibicao = $_POST['periodo_exibicao'];
		$ordem_exibicao = $_POST['ordem_exibicao'];
		$data_cadastro = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;		
		$crud = new crud('noticia');
        $crud->inserir("id_tv,id_rss,id_template,tempo_exibicao,periodo_exibicao,ordem_exibicao,data_cadastro,ativo", "'$id_tv','$id_rss','$id_template','$tempo_exibicao','$periodo_exibicao','$ordem_exibicao', 
                        '$data_cadastro','$ativo'");
        header("Location: ../noticia?rS=0"); 
    }
    
    if(isset ($_POST['alterar'])){
		$id_tv = $_POST['id_tv'];
		$id_rss = $_POST['id_rss']; 
		$id_template = $_POST['id_template'];  
		$tempo_exibicao = $_POST['tempo_exibicao'];
		$periodo_exibicao = $_POST['periodo_exibicao'];
		$ordem_exibicao = $_POST['ordem_exibicao'];
		$data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
        $id = $_POST['id_noticia'];		
		$crud = new crud('noticia');
		$crud->atualizar("id_tv='$id_tv',id_rss='$id_rss',id_template='$id_template',tempo_exibicao='$tempo_exibicao',periodo_exibicao='$periodo_exibicao',ordem_exibicao='$ordem_exibicao',data_atualizacao='$data_atualizacao',ativo='$ativo'","id_noticia='$id'");
        header("Location: ../noticia?rS=1"); 
    }
    
    if (isset($_GET['acao'])){
		if ($_GET['acao'] == 'excluir'){
			$id = $_GET['ID_NOTICIA'];
			$crud = new crud('noticia'); 
			$crud->excluir("id_noticia = $id");
			if($_SESSION['ckF'] == 1){
				header("Location: ../noticia?rS=2");
			}else{
				header("Location: ../noticia?rS=3");
			}
		}
	}



?>