<?php 

	require_once '../../config/conexao.php';
	require_once '../../config/crud.php';
	require_once '../../config/funcoes.php';
	
	if (isset($_POST['cadastrar'])) {	
		
		$nome_template = $_POST['nome_template'];
		$ativo = isset($_POST['ativo']) ? 1 : 0;
		// $foto = $_POST['arq_css'];
		// $arq_img = $_POST['arq_img'];
		// $arq_js = $_POST['arq_js'];
		// $arq_modal = $_POST['arq_modal'];
		$data_cadastro = date('Y-m-d H:i');


		 $ext1 = strrchr($_FILES['file_css']['name'], '.');
		 $ext2 = strrchr($_FILES['file_image']['name'], '.');
		 $ext3 = strrchr($_FILES['file_js']['name'], '.');
		 $ext4 = strrchr($_FILES['file_modal']['name'], '.');
			
			if(($ext1 != '.css')||($ext2 != '.jpg')||($ext2 != '.jpeg')||($ext2 != '.png')||($ext3 != '.js')||($ext4 != '.html')){
				
				header("Location: ../template?rS=4");
				 
							
			}else{
				$nome_pasta = @mkdir("../../template/$nome_template", 0777); // cria o diretório com nome do template.
				$dir1 = '../../template/'.$nome_template.'/'; // Diretório que vai receber o arquivo.
				$tmpName1 = $_FILES['file_css']['tmp_name']; // Recebe o arquivo temporário.
				$ext1 = strrchr($_FILES['file_css']['name'], '.');	
				$name1 = md5(uniqid(time()));
				move_uploaded_file( $tmpName1, $dir1 . $name1.$ext1 );
				
				$dir2 = '../../template/'.$nome_template.'/'; // Diretório que vai receber o arquivo.
				$tmpName2 = $_FILES['file_image']['tmp_name']; // Recebe o arquivo temporário.
				$ext2 = strrchr($_FILES['file_image']['name'], '.');
				$name2 = md5(uniqid(time()));
				move_uploaded_file( $tmpName2, $dir2 . $name2.$ext2 );
				
				$dir3 = '../../template/'.$nome_template.'/';
				$tmpName3 = $_FILES['file_js']['tmp_name']; // Recebe o arquivo temporário.
				$ext3 = strrchr($_FILES['file_js']['name'], '.');
				$name3 = md5(uniqid(time()));
				move_uploaded_file( $tmpName3, $dir3 . $name3.$ext3 );
				
				$dir4 = '../../template/'.$nome_template.'/';
				$tmpName4 = $_FILES['file_modal']['tmp_name']; // Recebe o arquivo temporário.
				$ext4 = strrchr($_FILES['file_modal']['name'], '.');
				$name4 = md5(uniqid(time()));
				move_uploaded_file( $tmpName4, $dir4 . $name4.$ext4 );		
				//echo $nome_pasta . ' <br/> ' . $dir4 . ' <br/> ' . $tmpName4 . ' <br/> ' . $ext4 . ' <br/> ' . $name4 ;	
				
	}
	
					
				$crud = new crud('template');//usa o crud padrão e insere na tabela
				$crud->inserir("nome_template,caminho,imagem,data_cadastro,ativo", "'$nome_template','$caminho','$imagem','$data_cadastro','$ativo'");
		        header("Location: ../template?rS=0");

        
		    if(isset ($_POST['alterar'])){
				$nome_template = $_POST['nome_template'];
				$caminho = $_POST['caminho']; 
				$imagem = $_POST['imagem'];
				$data_atualizacao = date('Y-m-d H:i');
		        $ativo = isset($_POST['ativo']) ? 1 : 0;
		        $id = $_POST['id_template'];		
				$crud = new crud('template');  
		        $crud->atualizar("nome_template='$nome_template',caminho='$caminho',imagem='$imagem',data_atualizacao='$data_atualizacao',ativo='$ativo'","id_template='$id'");
		        header("Location: ../template?rS=1"); 
		    }
    
		    if (isset($_GET['acao'])){
				if ($_GET['acao'] == 'excluir'){
					$id = $_GET['ID_TEMPLATE'];
					$crud = new crud('template'); 
					$crud->excluir("id_template = $id");
					if($_SESSION['ckF'] == 1){
						header("Location: ../template?rS=2");
					}else{
						header("Location: ../template?rS=3");
					}
				}
			}
		
	}
?>