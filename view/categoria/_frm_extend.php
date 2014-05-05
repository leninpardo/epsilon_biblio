<script type="text/javascript" src="web/js/evnt/val_frmCategoria.js" ></script>
<div class='ui-widget-header'>Registro de Categor&iacute;as de Lirbros</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_form" name="_form" action="" method="GET">
		<table  width="550" cellspacing="4"cellpadding="0" border="0" >
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
		
			<tr>
				<td colspan="3">Categoria:</td>
				<td>
                                    <input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
					<input name="idcategoria" id="idcategoria" type="hidden" value="<?php echo $obj->idcategoria;?>"/>
					<input  type="text"  name="categoria_ext" id="categoria_ext" size="40" maxlength="100" value="<?php echo $obj->descripcion;?>"/>
			   </td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5" align="center" >
					<?php if($p==1){?>
					<input type="button" class="btn btn-small" name="grabar2" id="grabar2" value="registrar"  />
					<?php }if($p==2){?>
					<input type="button" class="btn btn-small" name="actualiza" id="actualiza" value="actualizar"  />
					<?php }?>
				<input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="closeWindow();"/>	
                                        
				</td>
			</tr>
		</table>
	</form>
</div>
