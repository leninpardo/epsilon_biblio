
<div id="panelConfig">
 <div style="background:#99dd3c;height:20px;"></div>
 <div style="margin-top:10px;">
   <div class="usuario">
   <?php if(isset($obj->usuario_photo))
   {
   $obj->usuario_photo=$obj->usuario_photo;
   
   }else
   {
   $obj->usuario_photo="default";
   }
   ?>
      <div id="fotos" >
	  <div class='ui-widget-header' align='center'>fotos</div>
       <img src="<?php echo $url;?><?php echo $obj->foto;?>.jpg"  width="141px" height="135px"border="0"/>
      </div>
	  <div class="action">
	  <ul class="navigation">
	    <!--<li>
	       <a href="#">Editar mis Datos</a>
	    </li>-->
	    <li>
	        <a href="#" onclick="paginacion('controller=User&action=change_password');">Cambiar Password</a>
	    </li>
		<li>
		<a href="#" onclick="paginacion('controller=User&action=photo')">actualizar foto</a>
		</li>
	  
	   </ul>
	  </div>
    </div>
	<div id="name_user">
	 <div class='ui-widget-header' align='center'>usuario</div>
	 Datos Personales:</br>
	 <b>Nombres&nbsp;&nbsp;: </b><?php echo strtoupper($obj->nombres);?></br>
	 <b>Profesion&nbsp;&nbsp;: </b><?php echo strtoupper($obj->profesion);?></br>
	 <b>Direccion&nbsp;&nbsp;: </b><?php echo strtoupper($obj->direccion);?></br>
	 <b>Telefono &nbsp;&nbsp;: </b><?php echo strtoupper($obj->telefono);?></br>
	 <b>DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo strtoupper($obj->dni);?></br>
	 <b>Fecha Nac: </b><?php echo strtoupper($obj->fecha_nacimiento);?></br>
	 
	</div>
	</div>
</div>
<style>
#panelConfig
{
width:700px; margin:0 auto; float:left;
border:1px solid #ccc;
background:#f0f0f0;
height:auto;
float:left;
}
.usuario
{
background:#f0f0f0;width:180px;height:auto;
float:left;
}
#fotos
{
background:#f0f0f0;width:158px;height:165px;
margin-left:10px;
border:1px solid #dddddd;
}
#fotos img
{
margin-left:5px;
margin-top:3px;
}
#name_user
{
border:1px solid #dddddd;
   width:475px;
   float:left;
   height:auto;
}
.action .navigation
{
 padding:10px 10px 5px;
}
.action .navigation li
{
border:1px solid #dddddd;
float:none;
display:block;
}
.action .navigation a
{
text-decoration:none;
color:#3a579a;
}
</style>