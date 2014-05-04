<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>SOFTWARE DE TRAZABILIDAD ::COPERA::</title>
                		<link href="web/images/icon.ico" type="image/x-icon" rel="shortcut icon" />
                                              <link href="web/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="web/dist/css/bootstrap-theme.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="web/css/stilos.css" />
		<link rel="stylesheet" type="text/css" href="web/css/grilla.css" />
		<link rel="stylesheet" type="text/css" href="web/css/jquery-ui-1.8.1.custom.css" />
            <script src="web/js/jquery.js"></script>
          <script type="text/javascript" src="web/jsjquery.PrintArea.js"></script>
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
                

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="web/dist/js/bootstrap.min.js"></script>
<script src="web/dist/js/docs.min.js"></script>

		<script type="text/javascript">
		
		$(document).ready(function() 
				{       
					$.get('index.php','controller=Sistema&action=Menu',function(menu)
					{    // alert(menu);
						$("._menu").empty();
						var opciones_menu=menu;
						 $("._menu").generaMenu(opciones_menu);
						  $("#accordion").accordion({ header:"h3", collapsible:false});
                          $('#accordion').accordion("activate",false);
					},'json');
				});		  
		</script>
	</head>
	<body>
		<div id="Bar" class="subBar">
			<div id="pageinicio">
                            <a href="#" id="navAccountLink" onclick="ver();"><img  width="30" height="20" src="view/fotos_user/<?php echo $_SESSION['foto']; ?>.jpg" border='0'/></a>
				<ul class="navigation" id="user_panel" >
					<li>
						<div class="highlanderIntro fsm fwn fcg">Panel user</div>
					</li>
					<li class="linehor"><!--parecer una linea-->
					</li>
					<li>
						<a class="navSubmenu" href="javascript:void(0);" onclick="paginacion('controller=User&action=Panel')">configuracion de cuenta</a>
					</li> 
					<li>
						<a class="navSubmenu" href="javascript:void(0);" onclick="paginacion('controller=User&action=logout')">salir</a>
					</li>
				</ul>
			</div>
			<div id="pageuser">
                            <a href="#">   hola, <?php echo utf8_encode($_SESSION['usuario']);?></a>
			</div>
			<div class="line"></div> 
			<div id="pageuser">
                            <a href="#">tu perfil es: <?php echo utf8_encode($_SESSION['perfil']);?></a>
			</div>
			<div class="line"></div> 
			<div id="pageuser">
				<a href="#">Fecha: <?php echo date('d/m/Y'); ?></a> 
			</div>
		</div>
		
		
		<div id="content">
			
			<div id="c_left">
			     <h6 class="ui-widget-header">MENU</h6>
				 
				     <div id="accordion" class="_menu">
					 
					 </div>
				 
			</div>
                    <div id="c_right">
			 
                   <div id="cont">
					<center>BIENVENIDOS A COPERA</center>
			       <?php echo $content;?>
				 
			       </div>
			  
			</div>
		</div>
		<center>
			<div id="foot">
				<div class="footer fsm fwn fcg ">
                                    Derechos Reservados &copy;CLOUDTIC inc. <?php echo date('Y'); ?><br>
				  
				   <!-- <img src="" width height /> -->
			   </div>
			</div>
		</center>
		<div id="ventana"></div><!-- para mostrar ventana emergente -->
		<div id="capa"></div><!-- para mostrar transfondo oscuro -->
		
		<div class="blockUI" style="display: none;"></div>
		<div id="emergente"></div>
	</body>
</html>