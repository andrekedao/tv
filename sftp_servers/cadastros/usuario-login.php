				<?php   
					//incluindo 
					include('../body.php');
					include('../menu.php'); 
					include('../config/conexao.php');
					
					if(array_key_exists('ID_USUARIO',$_GET))
						{
						 $id = $_GET['ID_USUARIO'];
						 $sql = "SELECT ul.*, t.nome_tv as 'TV'
						         FROM usuarios_login ul
								 left join tv t on t.id_tv = ul.id_tv
							     WHERE ul.id_usuario =".$id."";
						 
						  $res = mysqli_query($con, $sql);
						   while($dadostabela = mysqli_fetch_array($res))
							{
								 $nome_usuario = $dadostabela['NOME_USUARIO'];
								 $cpf = $dadostabela['CPF'];
								 $login = $dadostabela['LOGIN'];
								 $email = $dadostabela['EMAIL'];
								 $telefone = $dadostabela['TELEFONE'];
								 $tipo_usuario = $dadostabela['TIPO_USUARIO'];
								 $id_tv = $dadostabela['ID_TV'];
								 $tv = $dadostabela['TV'];
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
								<i class="menu-icon fa fa-users"></i>
								<a href="#">Usuários</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Cadastro de Usuários:
								
							</h1>
						</div><!-- /.page-header -->

						<!--  include msg padrao -->

						<div class="row">
							<div class="col-xs-12">
							<?php 
									include('mensagem-padrao.php');  
								?>
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="class/class_usuarios_login.php">
									<div class="form-group">
							          <label class="col-sm-3 control-label no-padding-right" for="nome_usuario"> Nome*: </label>
							          <div class="col-sm-9">
							           <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome do Usuário" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($nome_usuario) ? $nome_usuario : '' ); ?>" autofocus required />
							            <span class="help-inline col-xs-12 col-sm-7">
							             <label class="middle">
										  <input class="ace" type="checkbox" id="ativo" name="ativo" <?php  if(isset($ativo)){ 																												echo ($ativo ? 'checked' :  '');									}  																											?> />
							              <span class="lbl"> Ativo </span>
							             </label>
							            </span>
									   <input type="hidden" name="id_usuario" id="id_usuario" value="<?php  echo $_GET['ID_USUARIO']; ?>"/>           
							          </div>
							        </div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> CPF*: </label>
										<div class="col-sm-9">
											<input type="text" id="cpf" name="cpf" placeholder="cpf" class="col-xs-10 col-sm-5 obrigatorio cpf" value="<?php echo (isset($cpf) ? $cpf : ''); ?>" required />
										</div>
									</div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="login"> Login*: </label>
										<div class="col-sm-9">
											<input type="text" id="login" name="login" placeholder="Login" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($login) ? $login : ''); ?>" required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="senha"> Senha*: </label>
										<div class="col-sm-9">
											<input type="password" id="senha" name="senha" placeholder="Password" class="col-xs-10 col-sm-5 obrigatorio" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="email"> Email*: </label>
										<div class="col-sm-9">
											<input type="email" id="email" name="email" placeholder="example@dominio.com.br" class="col-xs-10 col-sm-5 obrigatorio" value="<?php echo (isset($email) ? $email : ''); ?>" required />
												<span class="help-inline col-xs-12 col-sm-7">
													<span class="middle"></span>
												</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="telefone"> Telefone*: </label>

										<div class="col-sm-9">
											<input type="text" id="telefone" name="telefone" placeholder="Telefone" class="col-xs-10 col-sm-5 obrigatorio telefone" value="<?php echo (isset($telefone) ? $telefone : ''); ?>" required />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5"></label>
										<?php 
											if(isset($tipo_usuario)){
												if($tipo_usuario == 0){
													$matriz = 1;
												}else{
													$franquia = 1;
												}
											}
										?>
										<div class="radio">
    										<label class="radio-inline">
  												<input type="radio" name="tipo_usuario" id="tipo_usuario1" value="0" <?php echo (isset($matriz) ? 'checked' : ''); ?> > Matriz 
											</label>
											<label class="radio-inline">
  												<input type="radio" name="tipo_usuario" id="tipo_usuario2" value="1" <?php echo (isset($franquia) ? 'checked' : ''); ?>> Franquia
											</label>
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
									                 if ($_GET['ID_USUARIO']){ ?>
                  									<option value=" <?php echo $id_tv; ?>" selected><?php echo $tv; ?></option>            
                										<?php  } ?>               							
									         								            
									           </select> 
									          </div>
									         </div>


									<div class="space-4"></div>

									<div class="clearfix form-actions">
									 <div class="col-md-offset-3 col-md-9">
										 <?php
										  if(array_key_exists('ID_USUARIO',$_GET)) {?>
										 <button class="btn btn-info" type="submit" value="Alterar" name="alterar">
										  <i class="ace-icon fa fa-check bigger-110"></i>
										  Alterar
										 </button>
										 &nbsp; &nbsp; &nbsp;
										 <button class="btn btn-danger" type="reset" value="Cancelar" name="cancelar" onclick="location.href='usuario-login'">
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
						   Listagem Usuários
						  </div>

						  <!-- div.table-responsive -->
								   
						  <!-- div.dataTables_borderWrap -->
						  <div>
						   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
							 <tr>
							  
							  <th>Unidade</th>							  
							  <th>Nome</th>
							  <th>Login</th>
							  <th>Email</th>
							  <th>Telefone</th>
							  <th>Tipo</th>
							  <th class="hidden-480">Data Cadastro</th>
							  <th>Data Atualização</th>
							  <th>Ativo</th>
							  <th>Ações</th>
							 </tr>
							</thead>
							
							<tbody>
							 <?php
							   $sql = " SELECT cs1.NOME_TV, cs2.* from tv cs1
											inner join usuarios_login cs2
											on cs1.ID_TV = cs2.ID_TV";
							   $rs =  mysqli_query($con, $sql); 
							   while($dadostabela = mysqli_fetch_array($rs)){
							 ?> 
							 <tr>
							  
							  
							  
							  <td>
							   <?php 
									echo ($dadostabela['NOME_TV']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									echo ($dadostabela['NOME_USUARIO']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									echo ($dadostabela['LOGIN']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									echo ($dadostabela['EMAIL']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									echo ($dadostabela['TELEFONE']); 
							   ?>
							  </td>
							  
							  <td>
							   <?php 
									if($dadostabela['TIPO_USUARIO'] == 0){ 
										echo 'MATRIZ';
									}else{
										echo 'UNIDADE';
									}
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
									<a class="green" href="usuario-login?ID_USUARIO=<?php echo $dadostabela['ID_USUARIO']; ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									
									<a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_USUARIO']; ?>" data-toggle="modal">
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
									   <a href="usuario-login?ID_USUARIO=<?php echo $dadostabela['ID_USUARIO']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
										 <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									   </a>
									  </li>

									  <li>
									   <a <a class="red excluir" data-target="#modal-form" data-id="<?php echo $dadostabela['ID_USUARIO']; ?>" data-toggle="modal">
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
				window.location.href = "class/class_usuarios_login?ID_USUARIO="+ idSelecionado +"&acao=excluir";
			}
			
		</script>
     
	