<script type="text/javascript" src="web/js/evnt/val_frmLector.js" ></script>
<div id='breadcrumbs' class="text-center">Registro de Lector</div>
<div id="page-content">
    <div class="row-fluid"><div class="span12">
<div id="frmtotal">
	<div id="msg" ></div>
		<form id="_form" name="_form" id="_form" action="" method="POST" enctype="multipart/form-data" target="fotoim">
			<input type="hidden" name="controller" value="Lector" />
			<input type="hidden" name="action" value="save_extend" />
			<table border="0" cellpadding="5" align="center">
			 
			<tr>
                           
				<td>
					
					<?php
						$check="";
						$check2="";
						if($p==2)
						{
							if ($obj->sexo=="Femenino" ||$obj->sexo=="FEMENINO")
							{
								$check='checked="checked"';
								$check2="";
							}
							else
							{
								$check2='checked="checked"';
								$check="";
							}
						}
						else
						{
							$check2='checked="checked"';
							$check="";
						}
					?>
				</td>
			</tr>
                        <tr>
				<td>Nombres:</td>
				<td>
					<input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
                                        <input type="hidden" name="idlector" id="idlector" value="<?php echo utf8_decode($obj->idlector); ?>"/>
                                        <input type="text" name="nombres" id="nombres" value="<?php echo utf8_encode(ucwords($obj->nombre)); ?>" size="40" maxlength="100"/>
				</td>
			</tr>
			<tr>
				<td >DNI:</td>
				<td> 
					<input type="text" name="dni" id="dni" value="<?php echo $obj->dni; ?>" size="8" maxlength="8" onkeypress="return permite(event,'num')"/>
				</td>
			</tr>
			<tr>
			    <td>
					Sexo: 
			    </td>
			    <td>
				<span style="width: 40px; display: inline-block">
				    M <input type="radio" id="sexo" name="sexo" value="Masculino" <?php echo $check2;?> />
				</span>
				<span style="width: 40px; display: inline-block">
				    F <input type="radio" id="sexo" name="sexo" value="Femenino" <?php echo $check;?>/> 
				</span>
			    </td>
			</tr>
			
			
			<tr>
					
				<td>Domicilio:</td>
				<td> <input type="text" name="direccion" id="direccion" value="<?php echo $obj->direccion; ?>" size="40" maxlength="200"/>
				</td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td>
					<input type="text" name="telef" id="telef" value="<?php echo $obj->telefono; ?>" size="11" maxlength="100" onkeypress="return permite(event,'num')"/>
				</td>
			</tr>	
                        <tr>
                            <td>Tipo lector</td>
                            <td><select id="tipo" name="tipo">
                             <option value="">::SELECCIONE::</option>
                                    <option <?php if($obj->tipo=='1'  ){echo "selected";} ?> value="1">Docente</option>
                                     <option <?php if($obj->tipo=='2'  ){echo "selected";} ?> value="2">Estudiantes</option>
                                      <option <?php if($obj->tipo=='3' ){echo "selected";} ?> value="3">Otro</option>
                                       
                                </select>
                            </td>
                        </tr>
			<tr>
				<td>Estado: </td>
				<?php
					if( $obj->estado==1){$check="checked='checked'";}
					else {$check="";}
				?>
				<td>
				    <input style="margin-top: -10px" type="checkbox" <?php echo $check;?> name="estado" id="estado"/>
				</td>
		        </tr>
			<tr>
			    <td colspan="4" align="center" >
				    <?php if($p==1){?>
				    <input type=" button" class="btn btn-small" name="grabar2" id="grabar2" value="Registrar"  />
				    <?php }if($p==2){?>
				    <input type="button" name="grabar2" class="btn btn-small" id="grabar2" value="Actualizar"  />
				    <?php }?>
				    <input type="button" name="regresar" class="btn btn-small" id="regresar" value="Atras"  onclick="closeWindow();"/>							

                            </td>
			</tr>
		</table>
	</form>
</div><!-- end for frm busqueda-->
</div><!-- end for frm busqueda-->
</div><!-- end for frm busqueda-->
</div><!-- end for frm busqueda-->
                                   
				<!-- end for center-->
			 
