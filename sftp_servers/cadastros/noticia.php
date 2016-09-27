				<?php   
					//incluindo 
					include('../body.php');
					include('../menu.php'); 
					include('../config/conexao.php');
					
					if(array_key_exists('ID_NOTICIA',$_GET))
						{
						 $id = $_GET['ID_NOTICIA'];
						 $sql ="SELECT n1.*, 
									   n2.descricao as 'rss', 
									   n3.nome_tv as 'tv', 
									   n4.nome_template as 'template' 
								FROM   noticia n1 
									   INNER JOIN rss n2 
											   ON n1.id_rss = n2.id_rss 
									   INNER JOIN tv n3 
											   ON n1.id_tv = n3.id_tv 
									   INNER JOIN template n4 
											   ON n1.id_template = n4.id_template 
								WHERE  n1.id_noticia =".$id."";
						 
						  $res = mysqli_query($con, $sql);
						   while($dadostabela = mysqli_fetch_array($res))
							{
								 $tempo_exibicao = $dadostabela['TEMPO_EXIBICAO'];
								 $periodo_exibicao = $dadostabela['PERIODO_EXIBICAO'];
								 $ordem_exibicao = $dadostabela['ORDEM_EXIBICAO'];
								 $id_rss = $dadostabela['ID_RSS'];
								 $id_template = $dadostabela['ID_TEMPLATE'];
								 $id_tv = $dadostabela['ID_TV'];
								 $tv = $dadostabela['tv'];
								 $rss = $dadostabela['rss'];
								 $template = $dadostabela['template'];
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
								<i class="ace-icon fa fa-bullhorn"></i>
								<a href="#">Notícias</a>
							</li>

							<li>
								<a href="#"></a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Cadastro de Notícias:
								
							</h1>
						</div><!-- /.page-header -->

						<!--  include msg padrao -->

						<div class="row">
							<div class="col-xs-12">
								<?php 
									include('mensagem-padrao.php');  
								?>
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="class/class_noticia.php">
									<div class="form-group">
							          <label class="col-sm-3 control-label no-padding-right" for="tempo_exibicao"> Tempo de Exibição*: </label>
							          <div class="col-sm-9">
							           <input type="time" id="tempo_exibicao" name="tempo_exibicao" placeholder="tempo de exibição" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($tempo_exibicao) ? $tempo_exibicao : '' ); ?>" autofocus required />
							           <span class="help-inline col-xs-12 col-sm-7">
							            <label class="middle">
							             <input class="ace" type="checkbox" id="ativo" name="ativo" <?php  if(isset($ativo)){ 																					echo ($ativo ? 'checked' :  '');																		}  																											?> />
							             <span class="lbl"> Ativo </span>
							            </label>
							           </span>
							          <input type="hidden" name="id_noticia" id="id_noticia" value="<?php  echo $_GET['ID_NOTICIA']; ?>"/>           
							          </div>
							         </div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="periodo_exibicao"> Período de Exibição*: </label>

										<div class="col-sm-9">
											<input type="number"  id="periodo_exibicao" name="periodo_exibicao" placeholder="periodo de exibição" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($periodo_exibicao) ? $periodo_exibicao : ''); ?>" required />
											
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ordem_exibicao"> Ordem de Exibição*: </label>

										<div class="col-sm-9">
											<input type="number"  id="ordem_exibicao" name="ordem_exibicao" placeholder="ordem de exibição" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($ordem_exibicao) ? $ordem_exibicao : ''); ?>" required />
											
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
																		
									<div class="form-group">
          								<label class="col-sm-3 control-label no-padding-right " for="id_tv">Unidade*:</label>
          									<div class="col-sm-4 ">
           
           										<select class="form-control obrigatorio" id="id_tv" name="id_tv">
            									<option value="" selected disabled> SELECIONE</option>	
										          <?php 
										          	$sql = "select * from tv where ativo = 1";
										          	   $rs =  mysqli_query($con, $sql); 
										                  while($row = mysqli_fetch_array($rs)){
										                
										          ?>
										            <option value=" <?php echo $row['ID_TV'] ?>"><?php echo $row['NOME_TV'] ?></option>
									              <?php }
									                 if ($_GET['ID_NOTICIA']){ ?>
                  									<option value=" <?php echo $id_tv; ?>" selected><?php echo $tv; ?></option>            
                										<?php  } ?>               							
									         								            
									           </select> 
									          </div>
									         </div>
									         
									<div class="form-group">
          								<label class="col-sm-3 control-label no-padding-right " for="id_rss">RSS*:</label>
          									<div class="col-sm-4 ">
           
           										<select class="form-control obrigatorio" id="id_rss" name="id_rss">
            									<option value="" selected disabled> SELECIONE</option>	
										          <?php 
										          	$sql = "select * from rss where ativo = 1";
										          	   $rs =  mysqli_query($con, $sql); 
										                  while($row = mysqli_fetch_array($rs)){
										                
										          ?>
										           <option value=" <?php echo $row['ID_RSS'] ?>"><?php echo $row['DESCRICAO'] ?></option>
									              <?php }
									                 if ($_GET['ID_NOTICIA']){ ?>
                  									<option value=" <?php echo $id_rss; ?>" selected><?php echo $rss; ?></option>            
                										<?php  } ?>               							
									         								            
									           </select> 
									          </div>
									         </div>
									         
									<div class="form-group">
          								<label class="col-sm-3 control-label no-padding-right " for="id_template">Template*:</label>
          									<div class="col-sm-4 ">
           
           										<select class="form-control obrigatorio" id="id_template" name="id_template">
            									<option value="" selected disabled> SELECIONE</option>	
										          <?php 
										          	$sql = "select * from template where ativo = 1";
										          	   $rs =  mysqli_query($con, $sql); 
										                  while($row = mysqli_fetch_array($rs)){
										                
										          ?>
										            <option value=" <?php echo $row['ID_TEMPLATE'] ?>"><?php echo $row['NOME_TEMPLATE'] ?></option>
									              <?php }
									                 if ($_GET['ID_NOTICIA']){ ?>
                  									<option value=" <?php echo $id_template; ?>" selected><?php echo $template; ?></option>            
                										<?php  } ?>               							
									         								            
									           </select> 
									          </div>
									         </div>


									<div class="space-4"></div>

									<div class="clearfix form-actions">
									 <div class="col-md-offset-3 col-md-9">
										 <?php
										  if(array_key_exists('ID_NOTICIA',$_GET)) {?>
										 <button class="btn btn-info" type="submit" value="Alterar" name="alterar">
										  <i class="ace-icon fa fa-check bigger-110"></i>
										  Alterar
										 </button>
										 &nbsp; &nbsp; &nbsp;
										 <button class="btn btn-danger" type="reset" value="Cancelar" name="cancelar" onclick="location.href='noticia'">
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
						   Listagem Notícias
						  </div>

						  <!-- div.table-responsive -->
								   
						  <!-- div.dataTables_borderWrap -->
						  <div>
						   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
							 <tr>
							  
							  <th>Tempo de Exibição</th>							  
							  <th>Período de Exibição</th>
							  <th>Ordem de Exibição</th>
							  <th>Descrição (RSS)</th>
							  <th>Nome (Unidade)</th>
							  <th>Nome (Template)</th>
							  <th class="hidden-480">Data Cadastro</th>
							  <th>Data Atualização</th>
							  <th>Ativo</th>
							  <th>Ações</th>
							 </tr>
							</thead>
							
							<tbody>
							 <?php
							   $sql = "SELECT n1.*, 
									          n2.DESCRICAO, 
									          n3.NOME_TV, 
									          n4.NOME_TEMPLATE
								       FROM   noticia n1 
									          INNER JOIN rss n2 
											          ON n1.id_rss = n2.id_rss 
									          INNER JOIN tv n3 
											          ON n1.id_tv = n3.id_tv 
									          INNER JOIN template n4 
											          ON n1.id_template = n4.id_template";
							   $rs =  mysqli_query($con, $sql); 
							   while($dadostabela = mysqli_fetch_array($rs)){
							 ?> 
								<tr>
							  
							  
							  
								<td>
								<?php 
									echo ($dadostabela['TEMPO_EXIBICAO']); 
								?>
								</td>
							  
								<td>
								<?php 
									echo ($dadostabela['PERIODO_EXIBICAO']); 
								?>
								</td>
							  
								<td>
								<?php 
									echo ($dadostabela['ORDEM_EXIBICAO']); 
								?>
								</td>
								<td>
								<?php 
									echo ($dadostabela['DESCRICAO']); 
								?>
								</td>
							  
								<td>
								<?php 
									echo ($dadostabela['NOME_TV']); 
								?>
								</td>
							  
								<td>
								<?php 
									echo ($dadostabela['NOME_TEMPLATE']); 
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
									<a class="green" href="noticia?ID_NOTICIA=<?php echo $dadostabela['ID_NOTICIA']; ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									
									<a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_NOTICIA']; ?>" data-toggle="modal">
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
									   <a href="noticia?ID_NOTICIA=<?php echo $dadostabela['ID_NOTICIA']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
										 <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									   </a>
									  </li>

									  <li>
									   <a <a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_NOTICIA']; ?>" data-toggle="modal">
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
				window.location.href = "class/class_noticia?ID_NOTICIA="+ idSelecionado +"&acao=excluir";
			}
		</script>
	