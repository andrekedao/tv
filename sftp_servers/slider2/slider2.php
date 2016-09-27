<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>Rede Orto Slider</title>
    
    <!-- Insert to your webpage before the </head> -->
    <script src="sliderengine/jquery.js"></script> 
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
    <!-- End of head section HTML codes -->
	
	<?php   
		//incluindo 
		//include('../body.php');
		include('../config/conexao.php');
              
        		
	?>
    
</head>
<body>


<style  type="text/css">
body {
   margin:0;
   overflow-y:hidden;
   overflow-x:hidden;
}
</style>
    
    <!-- Insert to your webpage where you want to display the slider -->
    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0px auto 0px;"> 
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;"> 		
            <ul class="amazingslider-slides" style="display:none;"> 			
                <li> 				
					<img src="images/northern-gannet-1577300__340.jpg" alt="northern-gannet-1577300__340"  title="northern-gannet-1577300__340"/> 
				</li>
				<li>
					<img src="images/cat-1393075__340.jpg" alt="trata"  title="trata" />
					<video preload="none" src="images/trata.mp4" ></video>
                </li>
                <li>
					<img src="images/brigadeiro.jpg" alt="receita"  title="receita" />
					<video preload="none" src="images/receita.mp4" ></video>
                </li>
				<?php 
				
				$sql = "SELECT * from rss";
				$res = mysqli_query($con, $sql);
					while($dadostabela = mysqli_fetch_array($res)){?>

				<li>
				<?php echo $dadostabela['DESCRICAO'].' -- '.$dadostabela['LINK'] ?>
				</li>	
				<?php }?>
				<li>
					<img src="" alt="" title="" />
					<video preload="none" src="https://www.youtube.com/watch?v=dEN-5GdDJtw"></video>
				</li>
				
				
                <li>
					<img src="images/coffee-1576537__340.jpg" alt="coffee-1576537__340"  title="coffee-1576537__340"/>
					
				</li>
                <li><img src="images/factory-1495150__340.jpg" alt="factory-1495150__340"  title="factory-1495150__340" />
                </li>
                <li><img src="images/frog-1495034__340.jpg" alt="frog-1495034__340"  title="frog-1495034__340" />
                </li>
                <li><img src="images/water-1555170__340.jpg" alt="water-1555170__340"  title="water-1555170__340" />
                </li>
                <li><img src="images/water-lily-1510707__340.jpg" alt="water-lily-1510707__340"  title="water-lily-1510707__340" />
                </li>
                <li><img src="images/yellowstone-national-park-1581900__340.jpg" alt="yellowstone-national-park-1581900__340"  title="yellowstone-national-park-1581900__340" />
                </li>
                <li><img src="images/zucchini-1513112__340.jpg" alt="zucchini-1513112__340"  title="zucchini-1513112__340" />
                </li>
            </ul>
		</div>
    </div>
    <!-- End of body section HTML codes -->
    
</body>
</html>