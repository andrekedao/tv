<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
<!-- Scripts Javascript -->
<script type="text/javascript" src="jquery.xdomainajax.js"></script>
<title>jQuery e Ajax Cross Domain</title>
<script>
$(document).ready(function(){
	$("button").click(function(){
		site = $("#site").val();
		$.ajax({
			url: site,
			type: 'GET',
			success: function(res) {
				var headline = $(res.responseText).text();
				$("#conteudo").html(headline);
			}
		});
	});
});
</script>
</head>

<body>
<input type="text" id="site" value="http://" />
<button id="acessar">Clique para obter o conteúdo deste site</button>
<div id="conteudo" style="background:#EEF0A6"></div>
</body>
</html>