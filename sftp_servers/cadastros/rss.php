				<?php   
					//incluindo 
					include('../body.php');
					include('../menu.php'); 
					include('../config/conexao.php');
					
					if(array_key_exists('ID_RSS',$_GET))
						{
						 $id = $_GET['ID_RSS'];
						 $sql = "SELECT ul.* 
						         FROM rss ul
								 WHERE ul.id_rss =".$id."";
						 
						  $res = mysqli_query($con, $sql);
						   while($dadostabela = mysqli_fetch_array($res))
							{
								 $descricao = $dadostabela['DESCRICAO'];
								 $id = $dadostabela['ID_RSS'];
								 $link = $dadostabela['LINK'];
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
								<i class="ace-icon fa fa-rss-square"></i>
								<a href="#">RSS</a>
							</li>

							<li>
								<a href="#"></a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Cadastro de Rich Site Summary (RSS):
								
							</h1>
						</div><!-- /.page-header -->

						<!--  include msg padrao -->

						<div class="row">
							<div class="col-xs-12">
							<?php 
									include('mensagem-padrao.php');  
								?>
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="class/class_rss.php">
									<div class="form-group">
							          <label class="col-sm-3 control-label no-padding-right" for="descricao"> Descricao*: </label>
							          <div class="col-sm-9">
							           <input type="text" id="descricao" name="descricao" placeholder="descrição do rss" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($descricao) ? $descricao : '' ); ?>" autofocus required />
							           <span class="help-inline col-xs-12 col-sm-7">
							            <label class="middle">
							             <input class="ace" type="checkbox" id="ativo" name="ativo"  <?php  if(isset($ativo)){ 																					echo ($ativo ? 'checked' :  '');																		}  																										?>/>
							             <span class="lbl"> Ativo </span>
							            </label>
							           </span>
							          <input type="hidden" name="id_rss" id="id_rss" value="<?php echo (isset($id) ? $id : '' ); ?>"/>           
							          </div>
							         </div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="link"> Link*: </label>

										<div class="col-sm-9">
											<input type="url" id="link" name="link" placeholder="link" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($link) ? $link : '' ); ?>" required />
										</div>
									</div>

									<div class="space-4"></div>								
									
									<div class="clearfix form-actions">
									 <div class="col-md-offset-3 col-md-9">
										 <?php
										  if(array_key_exists('ID_RSS',$_GET)) {?>
										 <button class="btn btn-info" type="submit" value="Alterar" name="alterar">
										  <i class="ace-icon fa fa-check bigger-110"></i>
										  Alterar
										 </button>
										 &nbsp; &nbsp; &nbsp;
										 <button class="btn btn-danger" type="reset" value="Cancelar" name="cancelar" onclick="location.href='rss'">
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
						   Listagem RSS
						  </div>

						  <!-- div.table-responsive -->
								   
						  <!-- div.dataTables_borderWrap -->
						  <div>
						   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
							 <tr>
							  
							  <th>Descrição</th>							  
							  <th>Link</th>
							  <th class="hidden-480">Data Cadastro</th>
							  <th>Data Atualização</th>
							  <th>Ativo</th>
							  <th>Ações</th>
							 </tr>
							</thead>
							
							<tbody>
							 <?php
							   $sql = " SELECT cs1.* from rss cs1 ";											
							   $rs =  mysqli_query($con, $sql); 
							   while($dadostabela = mysqli_fetch_array($rs)){
							 ?> 
							 <tr>
							  
							  
							  
							  <td>
							   <?php 
									echo ($dadostabela['DESCRICAO']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									echo ($dadostabela['LINK']); 
							   ?>
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
									<a class="green" href="rss?ID_RSS=<?php echo $dadostabela['ID_RSS']; ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									
									<a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_RSS']; ?>" data-toggle="modal">
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
									   <a href="rss?ID_RSS=<?php echo $dadostabela['ID_RSS']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
										 <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									   </a>
									  </li>

									  <li>
									   <a <a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_RSS']; ?>" data-toggle="modal">
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
						</div>
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
				window.location.href = "class/class_rss?ID_RSS="+ idSelecionado +"&acao=excluir";
			}
			
		</script>
     