	<?php   
		//incluindo 
		include('../body.php');
		include('../menu.php'); 
		include('../config/conexao.php');

				
		if(array_key_exists('ID_TEMPLATE',$_GET))
			{
			 $id = $_GET['ID_TEMPLATE'];
			 $sql = "SELECT ul.* 
			         FROM template ul
					 WHERE ul.id_template =".$id."";
			 
			  $res = mysqli_query($con, $sql);
			   while($dadostabela = mysqli_fetch_array($res))
				{
					 $nome_template = $dadostabela['NOME_TEMPLATE'];
					 $caminho = $dadostabela['CAMINHO'];
					 $imagem = $dadostabela['IMAGEM'];
					 $ativo = $dadostabela['ATIVO'];
				}
			}
	?>
				
			

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>

		<script type="text/javascript">
			try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
		</script>
		
		
	</div>

	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>

				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>
					
					<li>
						<i class="ace-icon fa fa-list"></i>
						<a href="#">Template</a>
					</li>

					<li>
						<a href="#"></a>
					</li>
					
				</ul><!-- /.breadcrumb -->

				
			</div>

			<div class="page-content">
				<div class="page-header">
					<h1>
						Cadastro de Templates
						
					</h1>
				</div><!-- /.page-header -->

				<!--  include msg padrao -->

				<div class="row">
					<div class="col-xs-12">
					<?php 
							include('mensagem-padrao.php');  
						?>
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="frmTemplate" method="post" enctype="multipart/form-data" action="class/class_template.php">
							<div class="form-group">
					          <label class="col-sm-3 control-label no-padding-right" for="nome_template"> Nome Template*: </label>
					          <div class="col-sm-9">
					           <input type="text" id="nome_template" name="nome_template" placeholder="Nome do template" class="col-xs-10 col-sm-5 obrigatorio"  value="<?php echo (isset($nome_template) ? $nome_template : '' ); ?>" autofocus required />
					           <span class="help-inline col-xs-12 col-sm-7">
					            <label class="middle">
					             <input class="ace" type="checkbox" id="ativo" name="ativo" <?php  if(isset($ativo)){ 							echo ($ativo ? 'checked' :  '');
					            	 		}  
										?>/>
					             <span class="lbl"> Ativo </span>
					            </label>
					           </span>
					          <input type="hidden" name="id_template" id="id_template" value="<?php  echo $_GET['ID_TEMPLATE']; ?>"/>           
					          </div>
					         </div>

							<!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="caminho"> Caminho*: </label>
								<div class="col-sm-9">
									<input type="text" id="caminho" name="caminho" placeholder="" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($caminho) ? $caminho : '' ); ?>" required />
								</div>
							</div> -->
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="exampleInputFile2">Upload CSS:</label>
								<div class="col-xs-3">
									<input type="file" name="file_css" id="id-input-file-2" class="file_css" accept=".css" />
									
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="exampleInputFile2">Upload Imagem:</label>
								<div class="col-xs-3">
									<input type="file" name="file_image" id="id-input-file-2" class="file_image" accept="image/png, image/jpeg, image/jpg"  />
									
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="exampleInputFile3">Upload JS:</label>
								<div class="col-xs-3">
									<input type="file" name="file_js" id="id-input-file-2" class="file_js" accept=".js"/>
									
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="exampleInputFile4">Upload Modal:</label>
								<div class="col-xs-3">
									<input type="file" name="file_modal" id="id-input-file-2" class="file_modal" accept=".html"/>
									
								</div>
							</div>							
											
							
							<!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="imagem"> Imagem*: </label>
								<div class="col-sm-9">
									<input type="text" id="imagem" name="imagem" placeholder="" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($imagem) ? $imagem : '' ); ?>" required />
								</div>
							</div> -->
							

							<div class="space-4"></div>								
							
							<div class="clearfix form-actions">
							 <div class="col-md-offset-3 col-md-9">
								 <?php
								  if(array_key_exists('ID_TEMPLATE',$_GET)) {?>
								 <button class="btn btn-info" type="submit" value="Alterar" name="alterar">
								  <i class="ace-icon fa fa-check bigger-110"></i>
								  Alterar
								 </button>
								 &nbsp; &nbsp; &nbsp;
								 <button class="btn btn-danger" type="reset" value="Cancelar" name="cancelar" onclick="location.href='template'">
								  <i class="ace-icon fa fa-close bigger-110"></i>
								  Cancelar
								 </button>
								 <?php }else{?> 
								 <button class="btn btn-info" type="submit" value="Cadastrar" name="cadastrar">
								  <i class="ace-icon fa fa-check bigger-110"></i>
								  Cadastrar
								 </button>
								 &nbsp; &nbsp; &nbsp;
								 <button class="btn" type="reset" value="Limpar" name="Limpar">
								  <i class="ace-icon fa fa-undo bigger-110"></i>
								  Limpar
								 </button>
								 <?php } ?>  
							</div>
							</div>
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
				
				<div class="col-xs-12">
				  <div class="clearfix">
				   <div class="pull-right tableTools-container"></div>
				  </div>
				  <div class="table-header">
				   Listagem Templates 
				  </div>

				  <!-- div.table-responsive -->
						   
				  <!-- div.dataTables_borderWrap -->
				  <div>
				   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
					 <tr>
					  
					  <th>Nome Template</th>							  
					  <th class="hidden-480">Data Cadastro</th>
					  <th>Data Atualização</th>
					  <th>Ativo</th>
					  <th>Ações</th>
					 </tr>
					</thead>
					
					<tbody>
					 <?php
					   $sql = " SELECT cs1.* from template cs1 ";											
					   $rs =  mysqli_query($con, $sql); 
					   while($dadostabela = mysqli_fetch_array($rs)){
					 ?> 
					 <tr>
					  
					  
					  
					  <td>
						<a href="#" data-target="#template" data-toggle="modal">
					   <?php 
							echo ($dadostabela['NOME_TEMPLATE']); 
					   ?>
					   </a>
					  </td>
					  					  					  					  
					  <td>
							  <?php 
						 if($dadostabela['DATA_CADASTRO'] == null){
						  echo '';
						 }else{
						 echo date("d/m/Y", strtotime($dadostabela['DATA_CADASTRO']));
						 }
						?>
					  </td>
					   <td>
						<?php 
						 if($dadostabela['DATA_ATUALIZACAO'] == null){
						  echo 'SEM ALTERACAO';
						 }else{
						  echo date("d/m/Y", strtotime($dadostabela['DATA_ATUALIZACAO']));
						   }
						?>
					   </td>
					   
					   <td class="hidden-480">
					   <?php 
						if($dadostabela['ATIVO'] == 1){?>
						 <span class="label label-sm label-success">
						 <?php echo 'Ativo';
						}else{?>
						 <span class="label label-sm label-danger">
						 <?php echo 'Inativo';
						}
					   ?>
						 </span>
					  </td>
					  
					  
					  
					 <td>
						   <div class="hidden-sm hidden-xs action-buttons">
							<a class="green" href="template?ID_TEMPLATE=<?php echo $dadostabela['ID_TEMPLATE']; ?>">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>

							
							<a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_TEMPLATE']; ?>" data-toggle="modal">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>
								
						   </div>

						   <div class="hidden-md hidden-lg">
							<div class="inline pos-rel">
							 <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
								<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
							 </button>

							 <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
							  <li>
							   <a href="template?ID_TEMPLATE=<?php echo $dadostabela['ID_TEMPLATE']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
								 <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							   </a>
							  </li>

							  <li>
							   <a <a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_TEMPLATE']; ?>" data-toggle="modal">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							   </a>
							  </li>
							 </ul>
							</div>
						   </div>
						   
						   <?php
							include('mensagem-excluir.php');
						   ?>
						   
						  </td>
					  
					 </tr>
					   <?php }?>
					</tbody>
				   </table>
				  </div>
				 </div>
				</div><!-- /.page-content -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
	
			
	<?php 
		include ('../footer.php') 
	?>
	
	<script>
	
	
		idSelecionado = '';
		$('a.excluir').on('click', function(e) {
			var id = $(this).attr('data-id');
			idSelecionado = id;
		});
		
		function Excluir(){
			window.location.href = "class/class_template?ID_TEMPLATE="+ idSelecionado +"&acao=excluir";
		}
		
		
		//segue funções js validando extensão dos arquivos 		
	  $('.file_css').blur( function() {
		  var arq = $('.file_css').val();
		  var ext = arq.split('.');
		 
		  if(ext[1] != 'css'){    //validando extensão .css
				alert ('Somente arquivos .CSS');
				document.getElementsByClass('.file_css').focus();
			}
		 
		});
		
		$('.file_image').blur( function() {
		  var arq = $('.file_image').val();
		  var ext = arq.split('.');
		  
		  if((ext[1] != 'jpg') || (ext[1] != 'jpeg') || (ext[1] != 'png')){   //validando extensão de imagens
				alert ('Somente arquivos de imagem');
				document.getElementsByClass('.file_image').focus();
			}
		 
		});
		
		$('.file_js').blur( function() {
		  var arq = $('.file_js').val();
		  var ext = arq.split('.');
		 
		  if(ext[1] != 'js'){   //validando extensão .js
				alert ('Somente arquivos JavaScript');
				document.getElementsByClass('.file_js').focus();
			}
		 
		});
		
		$('.file_modal').blur( function() {
		  var arq = $('.file_modal').val();
		  var ext = arq.split('.');
		 
		  if(ext[1] != 'html'){   //validando extensão .html
				alert ('Somente arquivos HTML');
				document.getElementsByClass('.file_modal').focus();
			}
		 
		});
		
		
		
			
	</script>
	
	
	
	
