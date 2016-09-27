<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Este é um exemplo de PHP</title>
</head>
<body>
<center>Exemplo de um script PHP</center>
<?php
$hoje = date("d-m-Y");

echo "<br><center> Hoje é: $hoje";
echo  "<br><br>";
echo date(DATE_RFC822);
echo "<br>";
echo "<br>";
//tomorrow
$tomorrow = date('d/m/Y', strtotime($hoje. ' + 1 day'));
echo "<br><center> Amanhã será : $tomorrow";
echo "<br>";
echo "<br>";
//lastmonth
$lastmonth = date('F', strtotime($hoje.'+ 1 month'));
echo "<br><center> Próximo mês será : $lastmonth";
echo "<br>";
echo "<br>";
//nextyear
$nextyear = date('Y', strtotime($hoje.'+ 1 year'));
echo "<br><center> Próximo ano será : $nextyear";
echo "<br>";


$a = "Hello";
$b = "World!";
echo "<br><br> $a $b";
echo "<br><br>A palavra 'redeorto' possui " . strlen("redeorto") .
" caracteres <br><br>";
$nome = ucwords("andre luis candioto");
echo $nome;
?>
</body>
</html>