<?php
	if ($_SG['conectaServidor'] == true) {
	  $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'], $_SG['banco'], $_SG['porta']) or die("MySQL: N�o foi poss�vel conectar-se ao servidor [".$_SG['servidor']."].");
	}
	// valida o usu�rio de acordo com os dados na p�gina de login
	function protegePagina() {
	function expulsaVisitante() {
	  unset($_SESSION['usuarioID'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
?>