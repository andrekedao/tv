<?php
/**
 * 
 * Este arquivo realiza o upload de um arquivo
 * utilizando a função move_uploaded_file
 * do PHP.
 * 
 * A maneira que está implementada neste código, 
 * é a mais simples possível. Não há validação de tipos,
 * aceitando todos os tipos de arquivos.
 * 
 * @author Fausto Schneider <contato@dicasdephp.com.br>
 * @since 22/10/2011
 * 
 * 
 */ 

if( $_FILES ) { // Verificando se existe o envio de arquivos.
	
	if( $_FILES['arquivo'] ) { // Verifica se o campo não está vazio.
		
		$nome_pasta = 'teste';
		$dir = @mkdir("../upload/$nome_pasta", 0777); // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['arquivo']['name']; // Recebe o nome do arquivo.
		
		// move_uploaded_file( $arqTemporário, $nomeDoArquivo )
		if( move_uploaded_file( $tmpName, $dir . $name ) ) { // move_uploaded_file irá realizar o envio do arquivo.		
			header('Location: sucesso.php'); // Em caso de sucesso, retorna para a página de sucesso.			
		} else {			
			header('Location: erro.php'); // Em caso de erro, retorna para a página de erro.			
		}
		
	}

}
