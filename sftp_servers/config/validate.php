<?phprequire_once("safety.php");
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {	  $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';	  $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';	  if (validaUsuario($usuario, $senha) == true) {		header("Location: ../dashboard");	  } else {		header("Location: ../index.php?value=0");	  }	}?>