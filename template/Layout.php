<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Software de Gestion Educativo::Epsilon biblio::</title>
		<link rel="stylesheet" type="text/css" href="web/css/jquery-ui-1.8.1.custom.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/font-awesome/css/font-awesome.min.css" />
		
		<link rel="stylesheet" type="text/css" href="web/themes/css/w8.min.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/css/w8-responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/css/w8-skins.min.css" />
		<link rel="stylesheet" type="text/css" href="web/themes/css/main.css" />
		
		<link href="web/images/ico.ico" type="image/x-icon" rel="shortcut icon" />
		
<!--		<link rel="stylesheet" type="text/css" href="web/css/stilos.css" />-->
<!--		<link rel="stylesheet" type="text/css" href="web/css/grilla.css" />-->
<!--            <script src="web/js/jquery.js"></script>
          <script type="text/javascript" src="web/jsjquery.PrintArea.js"></script>-->
		<script type="text/javascript" src="web/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="web/js/jquery-ui-1.8.17.custom.min.js"></script>
		
		<script type="text/javascript" src="web/js/jquery.ui.datepicker-es.js"></script>
	   <script type="text/javascript" src="web/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="web/js/loader.js"></script>
		<script type="text/javascript" src="web/js/utiles.js"></script>
		<script type="text/javascript" src="web/js/required.js"></script>
		<script type="text/javascript" src="web/js/menu.js"></script>
		<script type="text/javascript" src="web/js/funciones.js"></script>
		<script type="text/javascript" src="web/js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="web/js/ver.js"></script>

		<script type="text/javascript">
		
		$(document).ready(function() 
				{       
					$.get('index.php','controller=Sistema&action=Menu',function(menu)
					{    // alert(menu);
						$("._menu").empty();
						 $("._menu").generaMenu(menu);
/*$("#sidebar").accordion({ header:"h3", collapsible:false});
                                     $('#sidebar').accordion("activate",true);*/
					},'json');
				});		  
		</script>
	</head>
	<body>
	    <div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-unlock-alt"></i>
							   Modulo educativo de gestion bibliotecaria "EPSILON-biblio"
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
<!--
					<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini progress-danger">
											<div style="width:35%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini progress-warning">
											<div style="width:15%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-success progress-striped active">
											<div style="width:90%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-only icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comsidebarment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope-alt icon-only icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-envelope"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="web/themes/images/avatar.png" class="msg-photo" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="themes/images/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="themes/images/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>-->

						<li class="light-green user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<img class="nav-user-photo" src="view/fotos_user/<?php echo $_SESSION['foto']; ?>.jpg" />
								<span id="user_info">
									<small>Bienvenido,</small>
									<?php echo utf8_encode(ucwords($_SESSION['usuario'])) ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<li>
									<a href="javascript:" onclick="paginacion('controller=User&action=Panel')">
										<i class="icon-user"></i>
										Configuración de Cuenta
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="javascript:" onclick="paginacion('controller=User&action=logout')">
										<i class="icon-off"></i>
										Cerrar Sesión
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.w8-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		
		
		<div class="container-fluid" id="main-container">
		    <a id="menu-toggler" href="#">
				<span></span>
			</a>
			<div id="sidebar" class="clearfix">
				
				<ul class="nav nav-list _menu"></ul>
				 
		    <div id="sidebar-collapse">
			<i class="icon-double-angle-left"></i>
		    </div>
		    </div>
		</div>

			<div id="main-content" >

			 
                   <div id="cont">
					<center>BIENVENIDOS A SU PLATAFORMA DE TRABAJO</center>
			       <?php echo $content;?>
				 
			       </div>
			  
			</div>
		<center>
			<div id="footer">
                                   Derechos Reservados &copy;EPSILON-biblio 2014- <?php echo date('Y'); ?>
			</div>
		</center>
		<div id="ventana"></div><!-- para mostrar ventana emergente -->
		<div id="capa"></div><!-- para mostrar transfondo oscuro -->
		
		<div class="blockUI" style="display: none;"></div>
		<div id="emergente"></div>
		<script type="text/javascript" src="web/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="web/themes/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script type="text/javascript" src="web/themes/js/jquery.slimscroll.min.js"></script>
		<script type="text/javascript" src="web/themes/js/w8-elements.min.js"></script>
		<script type="text/javascript" src="web/themes/js/w8.min.js"></script>
	</body>
</html>
