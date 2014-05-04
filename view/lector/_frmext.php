<script type="text/javascript" src="web/js/evnt/val_frmproductor.js" ></script>
<div class='ui-widget-header'>Registro de Productor</div>

	<div id="msg" ></div>
		<form id="_form" name="_form" action="" method="POST">
			
			<table width="666" cellspacing="4" cellpadding="0"   border="0">
			<tr>
				<td>Nombres:</td>
				<td>
					<input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
					<input type="hidden" name="id_productor" id="id_productor" value="<?php echo $obj->id_productor; ?>"/>
					<input type="text" name="nombres" id="nombres" value="<?php echo $obj->nombres; ?>" size="40" maxlength="100"/>
				</td>
			</tr>
			<tr>
				<td >Apellidos:</td>
				<td> 
					<input type="text" name="apellidos" id="apellidos" value="<?php echo $obj->apellidos; ?>" size="40" maxlength="100"/>
				</td>
			</tr>
			<tr>
				<td >DNI unico:</td>
				<td> 
					<input type="text" name="dni" id="dni" value="<?php echo $obj->dni; ?>" size="8" maxlength="8" onkeypress="return permite(event,'num')"/>
					
				</td>
			</tr>
		
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="center" >
					
					<label class='uiButton uiButtonConfirm'><input type="button" name="grabar_ext" id="grabar_ext" value="registrar"  /></label>
				<label class='uiButton uiButtonConfirm'> <input type="button" name="cancelar" id="cancel" value="cancelar"/></label>							
				</td>
			</tr>
		</table>
	</form>

			 