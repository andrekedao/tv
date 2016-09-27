<?php  
	// retorno script de cadastro/alteracao/exclus�o
	if(array_key_exists('rS',$_GET)) {
		if($_GET['rS'] == 0){
?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<strong>
		<i class="ace-icon fa fa-check"></i>
		
	</strong>
		Cadastro efetuado com sucesso!
	<br />
</div>
	<?php }if($_GET['rS'] == 1){ ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<strong>
		<i class="ace-icon fa fa-check"></i>
		
	</strong>
		Cadastro Alterado com sucesso!
	<br />
</div>
	<?php }if($_GET['rS'] == 2){ ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<strong>
		<i class="ace-icon fa fa-times"></i>
	</strong>
		Registro excluido!
	<br />
</div>
	<?php }if($_GET['rS'] == 3){ ?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<strong>
		<i class="ace-icon fa  fa-ban"></i>
	</strong>
		Registros que possuem vinculos no sistema não podem ser excluidos!
	<br />
</div>
	<?php }if($_GET['rS'] == 4){ ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<strong>
		<i class="ace-icon fa fa-times"></i>
	</strong>
		Arquivo Inválido!
	<br />
</div>
	<?php }} ?>