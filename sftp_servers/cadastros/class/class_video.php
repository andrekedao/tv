<?php 
	
	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if(isset ($_POST['cadastrar'])){
		$descricao_video = $_POST['descricao_video'];
		$caminho_video = $_POST['caminho_video'];
		$tipo_video = $_POST['tipo_video'];
		$ordem_video = $_POST['ordem_video']; 
		$data_cadastro = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
		
		$dir = '../../video/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['file_video']['tmp_name']; // Recebe o arquivo temporário.
		$ext = strrchr($_FILES['file_video']['name'], '.');
		
		if($ext != '.mp4'){
				
			header("Location: ../video?rS=4");
		
		}else{	
		
		$name = md5(uniqid(time()));
		move_uploaded_file( $tmpName, $dir . $name.$ext );
		// echo $dir . ' <br/> ' . $tmpName . ' <br/> ' . $ext . ' <br/> ' . $name ;
		
		$crud = new crud('video');  
        $crud->inserir("descricao_video,caminho_video,tipo_video,ordem_video,data_cadastro,ativo", "'$descricao_video','$caminho_video','$tipo_video','$ordem_video','$data_cadastro','$ativo'");
        header("Location: ../video?rS=0"); 
	}
    
    if(isset ($_POST['alterar'])){
		$descricao_video = $_POST['descricao_video'];
		$caminho_video = $_POST['caminho_video'];
		$tipo_video = $_POST['tipo_video'];
		$ordem_video = $_POST['ordem_video'];
        $data_atualizacao = date('Y-m-d H:i');
        $ativo = isset($_POST['ativo']) ? 1 : 0;
        $id = $_POST['id_video'];		
		$crud = new crud('video');  
        $crud->atualizar("descricao_video='$descricao_video',caminho_video='$caminho_video',tipo_video='$tipo_video',ordem_video='$ordem_video',data_atualizacao='$data_atualizacao',ativo='$ativo'","id_video='$id'");
        header("Location: ../video?rS=1"); 
    }
    
    if (isset($_GET['acao'])){
		if ($_GET['acao'] == 'excluir'){
			$id = $_GET['ID_VIDEO'];
			$crud = new crud('video'); 
			$crud->excluir("id_video = $id");
			if($_SESSION['ckF'] == 1){
				header("Location: ../video?rS=2");
			}else{
				header("Location: ../video?rS=3");
			}
		}
	}
	}
		

?>