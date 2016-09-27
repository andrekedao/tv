<!-- <?php
// Define o header como sendo de imagem
header("Content-type: image/jpeg");
 
// Cria a imagem a partir de uma imagem jpeg
$i = imagecreatefromjpeg("brigadeiro.jpg");

 
// Definições
$preto = imagecolorallocate($i, 0,0,0); # Cor preta
$texto = "Teste Redeorto"; # Texto a ser escrito
$fonte = "trebuc.ttf"; # Fonte que será utilizada
 
// Escreve na imagem
imagettftext($i, 32, 0, 160,360,$preto,$fonte,$texto);
 
// Gera a imagem na tela
imagejpeg($i);
 
// Destroi a imagem para liberar memória
imagedestroy($i);
?> -->

<?php

 
//Carregar imagem
$rImg = imagecreatefromjpeg("brigadeiro.jpg");
 
//Definir cor
$cor = imagecolorallocate($rImg, 0, 0, 0);
 
//Escrever nome
imagestring($rImg,5,126,22,urldecode($_GET['nome']),$cor);
 
//Header e output
header('Content-type: image/jpeg');
imagejpeg($rImg,NULL,100);
 

?>