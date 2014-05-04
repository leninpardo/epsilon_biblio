<script type="text/javascript" src="web/js/evnt/val_frmComunidad.js" ></script>
<div class='breadcrumbs'>Registro de Comunidades</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_form" name="_form" action="" method="GET">
		<table  width="550" cellspacing="4"cellpadding="0" border="0" >
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td>Descripcion:</td>
				<td colspan="3"><input name="oper" id="oper" type="hidden" value="<?php echo $p;?>"/>
					<input name="idcomunidad" id="id_proyecto" type="hidden" value="<?php echo $obj->idcomunidad ?>"/>
                                        <input readonly="true"  type="text"  name="comunidad" id="comunidad" size="40" maxlength="100" value="<?php echo utf8_encode($obj->descripcion);?>"/>
			   </td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5" align="center" >
				
					 <input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="atras();"/>
                                        <a class="btn btn-small"href="fpdf/reporte.php?tabla=list-comunidad&id=<?php echo utf8_encode($obj->descripcion);?>" target="_blanck" class=" button ">ver lista de socios</a>
				</td>
			</tr>
		</table>
	</form>
</div>