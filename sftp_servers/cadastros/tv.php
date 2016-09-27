<?php   
					//incluindo 
					include('../body.php');
					include('../menu.php'); 
					include('../config/conexao.php');
					
					if(array_key_exists('ID_TV',$_GET))
						{
						 $id = $_GET['ID_TV'];
						 $sql = "SELECT ul.* 
						         FROM tv ul
								 WHERE ul.id_tv =".$id."";
						 
						  $res = mysqli_query($con, $sql);
						   while($dadostabela = mysqli_fetch_array($res))
							{
								 $descricao = $dadostabela['NOME_TV'];
								 $ativo = $dadostabela['ATIVO'];
							}
						}
				?>
				
