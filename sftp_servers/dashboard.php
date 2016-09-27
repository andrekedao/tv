<?php
	//require_once("config/safety.php");
	//require_once('config/validate.php');
	//session_start();
	//protegePagina();
	//verificaUsuario();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>REDEORTO - SGR 4.0</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>	

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="dashboard" class="navbar-brand">
						<small>
							<img src="assets/images/logo.png"  id="logo-dash"/>
						</small>
					</a>
					<a href="https://www.facebook.com/ReDeORtOOficial/?fref=ts" target="_blank">
						<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<!-- mensagens de comunicação e alerta (sistema <> usuario) -->
						<?php //include('messages-user.php') ?>
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Seja Bem Vindo,</small>
									<?php //echo $_SESSION['usuarioLogin'] ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Config
									</a>
								</li>

								<li>
									<a href="../perfil/">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="config/logoff.php" id="logoff">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<!--div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

			<?php 
				include('menu.php')
			?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Localizar TV" class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-7 infobox-container">
										
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Online</span>
												<div class="infobox-content">São Carlos - 11:10 <!--a href="#"><i class="fa fa-plus-circle blue" data-rel="tooltip" title="Ver Programação" aria-hidden="true"></i></a--></div>

											</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Offline</span>
												<div class="infobox-content">Araras - 08:00</div>

											</div>
										</div>
										
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Online</span>
												<div class="infobox-content">Franca - 10:10</div>

											</div>
										</div>

										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Online</span>
												<div class="infobox-content">Bebedouro - 11:10</div>

											</div>
										</div>		
										
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Offline</span>
												<div class="infobox-content">Limeira - 08:00</div>

											</div>
										</div>
										
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">Offline</span>
												<div class="infobox-content">Belém - 14:30</div>

											</div>
										</div>
										
									</div>

									<div class="vspace-12-sm"></div>
									
									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Tráfico de Dados
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															Esta Semana
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	Esta Semana
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Semana Passada
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Este Mês
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Mês Passado
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											
											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder" style="width: 90%; min-height: 150px; padding: 0px; position: relative;">
													<canvas class="flot-base" width="246" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 246px; height: 150px;">
													</canvas>
													<canvas class="flot-overlay" width="246" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 246px; height: 150px;">
													</canvas>
													<div class="legend">
													<div style="position: absolute; width: 90px; height: 110px; top: 15px; right: -30px; opacity: 0.85; background-color: rgb(255, 255, 255);"> 
													</div>
													<table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454">
														<tbody>
															<tr>
																<td class="legendColorBox">									
																	<div style="border:1px solid null;padding:1px">
																		<div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden"></div>
																	</div>
																</td>
																<td class="legendLabel">Unidade Ribeirão Preto</td>
															</tr>
															<tr>
																<td class="legendColorBox">
																	<div style="border:1px solid null;padding:1px">
																		<div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden"></div>
																	</div>
																</td>
																<td class="legendLabel">Unidade São Carlos</td>
															</tr>
															<tr>
																<td class="legendColorBox">
																	<div style="border:1px solid null;padding:1px">
																		<div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden"></div>
																	</div>
																</td>
																<td class="legendLabel">Unidade Sertãozinho</td>
															</tr>
															<tr>
																<td class="legendColorBox">
																	<div style="border:1px solid null;padding:1px">
																		<div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div>
																	</div>
																</td>
																<td class="legendLabel">Unidade Araraquara</td>
															</tr>
															<tr>
																<td class="legendColorBox">
																	<div style="border:1px solid null;padding:1px">
																		<div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div>
																	</div>
																</td>
																<td class="legendLabel">Outras Unidades</td>
															</tr>
														</tbody>
													</table>
													</div>
													</div>

													<div class="hr hr8 hr-double"></div>

													<div class="clearfix">
														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
																&nbsp; likes
															</span>
															<h4 class="bigger pull-right">1,255</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
																&nbsp; tweets
															</span>
															<h4 class="bigger pull-right">941</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
																&nbsp; pins
															</span>
															<h4 class="bigger pull-right">1,050</h4>
														</div>
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>
									
									
								</div><!-- /.row -->
								
								

								<div class="hr hr32 hr-dotted"></div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">REDEORTO</span>
							SGR 4.0 &copy; 2016-2016
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="assets/js/jquery.1.11.1.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>		
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/html5lightbox.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
					
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
			
			//$(window).on('beforeunload', function() {
			  //return 'Your own message goes here...';
			//});
			
			
		</script>
	</body>
</html>
