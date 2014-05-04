<script type="text/javascript" src="web/js/evnt/val_frmAutor.js" ></script>
<div class='breadcrumbs'>Registro de Autores</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_form" name="_form" action="" method="GET">
		<table  width="550" cellspacing="4"cellpadding="0" border="0" >
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td colspan="3"><input name="oper" id="oper" type="hidden" value="<?php echo $p;?>"/>
					<input name="idautor" id="idautor" type="hidden" value="<?php echo $obj->idautor; ?>"/>
                                        <input  type="text"  name="nombre" id="nombre" size="40" maxlength="100" value="<?php echo utf8_encode($obj->nombre);?>"/>
			   </td>
			</tr>
                        <tr>
				<td>Nacionalidad:</td>
				
					<td>
                                        <input  type="text"  name="nacionalidad" id="nacionalidad" size="40" maxlength="100" value="<?php echo utf8_encode($obj->nacionalidad);?>"/>
			   </td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="center" >
				    <?php if($p==1){?>
 <input type="submit" class="btn btn-small" name="grabar" id="grabar" value="Registrar"  />
				    <?php }if($p==2){?><input type="submit" name="grabar" class="btn btn-small" id="grabar" value="Actualizar"  />
				    <?php }?>
				    <input type="button" name="regresar" class="btn btn-small" id="regresar" value="Atras"  onclick="atras();"/>
			    </td>
			</tr>
		</table>
	</form>
</div>
