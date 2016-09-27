<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Exemplo de Upload - PHP</title>
	<style type="text/css">
		body { margin:35px; font-family:Arial, sans-serif; font-size:11px; color:#666; line-height:130%; }
		h1 { font-size:160%; }
		h2 { font-size:140%; }
		h3 { font-size:120%; }
		div { margin:0 0 20px 0;}
		p { margin:5px 0 15px 0; }
		.detalhe { background:#eee; font-style:italic; }
		.rodape { padding-top:15px; border-top:1px solid #eee; }
	</style>
</head>
<body>
	
	<h1> Exemplo de Upload - PHP </h1>
	
	<p> Neste arquivo você terá um exemplo de como fazer upload com <strong>PHP</strong>. </p>
	
	<p> O arquivo que você irá realizar upload ficará na pasta ./arquivos </p>
	
	<div>
		<form action="upload.php" method="post" enctype="multipart/form-data">
				
			<label for="arquivo">Arquivo:</label> <input type="file" name="arquivo" id="arquivo" />
			
			<br />
			<br />
			
			<input type="submit" value="Enviar" />
			
		</form>
	</div>
	
	<div class="rodape">
	
		<p> Este exemplo foi criado por <a href="http://www.dicasdephp.com.br" title="Dicas de PHP">Dicas de PHP</a>. </p>
	
	</div>
	
</body>
</html>