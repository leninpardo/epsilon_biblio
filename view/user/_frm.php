<script type="text/javascript" src="web/js/evnt/val_frmUser.js" ></script>
<div class='ui-widget-header'>Registro de Usuarios</div>
	<div id="frmtotal">
	    <div id="msg" ></div>
        <form id="_form" name="_form" action="" method="POST" enctype="multipart/form-data" target="fotoim">
		<input type="hidden" name="controller" value="user" />
        <input type="hidden" name="action" value="save_photo_temp" />
			<table width="666" cellspacing="4" cellpadding="0"   border="0">
  <tr>
    <td width="128" >Perfil:</td>
    <td width="357" ><?php echo $perfil;?></td>
    <td width="145" rowspan="5"><div class="fotos_u" id="userfoto">
	<?php if ($p==2){?>
	<img  width='153px' height='150px' src="view/fotos_user/<?php echo $obj->foto; ?>.jpg" />
	<?php }?>
	  <iframe id="fotoim" name="fotoim" src=""  
          style="width:153px; height:180px;"
          frameborder="0" marginheight="0" marginwidth="0">
		  
		  </iframe></div></td>

  </tr>
  <tr>
    <td>Nombres:</td>
    <td><input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
						<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $obj->idusuario; ?>"/>
						<input type="text" name="usuario_nombres" id="usuario_nombres" value="<?php echo $obj->nombres; ?>" size="40" maxlength="100"/></td>
  </tr>
  <tr>
    <td >Profesi&oacute;n:</td>
    <td> <input type="text" name="profesion" id="profesion" value="<?php echo $obj->profesion; ?>" size="40" maxlength="100"/></td>
  </tr>

                <tr>
					<td width="128">Domicilio:</td>
					<td > <input type="text" name="usuario_direccion" id="usuario_direccion" value="<?php echo $obj->domicilio; ?>" size="40" maxlength="100"/>
					</td>
				</tr>
				<tr>
					<td >Telefono:</td>
					<td >
						<input type="text" name="usuario_telefono" id="usuario_telefono" value="<?php echo $obj->telefono; ?>" size="13" maxlength="100" onkeypress="return permite(event,'num')"/>
						DNI :<input  type="text"  name="usuario_numdoc" id="usuario_numdoc" size="13" maxlength="8" value="<?php echo $obj->dni;?>" onkeypress="return permite(event,'num')"/>
					</td>
				</tr>
				
				<tr>
					<td>Usuario:</td>
					<td>
					<?php $disbled='';if($p==2){$disbled="";}?>
						<input  type="text"  name="usuario_nick" id="usuario_nick" size="13" maxlength="13" value="<?php echo $obj->usuario;?>" <?php echo $disbled ?>/>  <!--onkeydown="javascript:validarU();"-->
						Clave:<input  type="password" name="usuario_password" id="usuario_password" size="13" maxlength="13"  onkeydown="javascript:validar();"/>
					</td>
					<td>
						<div id="resp"></div>
						<div id="res"></div>
					</td>
				</tr>
				<tr>
				<td>fecha_nac</td>
				<td><input name="usuario_fechanac" id="usuario_fechanac" value="<?php echo $obj->fecha_nacimiento; ?>" size="20" maxlength="20">
				</td>
				</tr>
				<tr>
				<td>seleccione</td>
				<td>
                  	<?php $disbleded='';if($p==2){$disbleded="disabled='disabled'";}?>
				<span class="button green fileinput-button"<?php if($p==2){ echo"style='display:none';";}?>><span>Add foto...</span>
				<input type="file" id="archivo" onchange="uploadImage();" <?php echo $disbleded ?>/>
				
				  </span>
				</td>
				</tr>
				
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
                <tr>
			        <td colspan="4" align="center" >
					  <?php if($p==1){?>
                      <input class="btn btn-small" type="button" name="grabar" id="grabar" value="registrar"  />
					  <?php }if($p==2){?>
						 <input class="btn btn-small" type="button" name="grabar" id="grabar" value="actualizar"  />
					  <?php }?>
                        <input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="atras();"/>						
					</td>
                </tr>
</table>


		</form>
    </div><!-- end for frm busqueda-->
                                   
				<!-- end for center-->
			 
