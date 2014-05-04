<?php
function validar_fecha($fecha){
$fecha = strtotime($fecha);
$anio = (date('Y',$fecha));
$mes = (date('m',$fecha));
$dia =(date('d',$fecha));
return $dia.'-'.$mes.'-'.$anio;
}
?>
<script type="text/javascript" src="web/js/evnt/val_frmLibro.js" ></script>
<div id="breadcrumbs" class="text-center">Registro de Libros</div>
	<div id="frmtotal">
	    <div id="msg" ></div>
        <form id="_form" name="_form" action="" method="POST" enctype="multipart/form-data" target="fotoim">
		<input type="hidden" name="controller" value="Libro" />   
                <div id="datos_prestamo">
                    <fieldset>
                        <legend>Datos del Libro</legend>
<table cellspacing="4" cellpadding="0"   border="0" align="center" >
    
          <input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
		  <input type="hidden" name="idlibro" id="idlibro" value="<?php echo $obj->idlibro;?>"/>
                         <tr>
                      <td>Titulo Libro</td>
                      <td>
                          <input type="text" name="titulo" id="titulo" value="<?php $pro = $obj->titulo; echo utf8_encode($pro);?>" size="40" maxlength="100">
			</td>
                        <td>
                            ISBN
                        </td>
                        <td>
                            <input type="text" name="isbn" id="isbn" value="<?php $pro = $obj->isbn; echo utf8_encode($pro);?>" size="40" maxlength="100">
			</td>
                  
                         </tr>
                         <tr>
                              <td >Año publicacion:</td>
              <td ><input type='text' size='11' name='fecha_p' id='fecha_p' value="<?php if($obj){echo ($obj->year_edicion);}  ?>"/></td>
           <td >Ultima publicacion:</td>
              <td ><input type='text' size='11' name='fecha_u' id='fecha_u' value="<?php if($obj){echo ($obj->year_last_edicion);}  ?>"/></td>
         
                         </tr>
                         <tr>
			<td width="128">Categoria</td>
			<td width="357">
                            <input type="text" name="categoria" id="categoria" value="<?php $pro = $obj_c->descripcion; echo utf8_encode($pro);?>" size="40" maxlength="100">
			<input type="hidden" name="idcategoria" id="idcategoria" value="<?php $pro = $obj_c->idcategoria; echo utf8_encode($pro);?>" size="40" maxlength="100">
			
			<a title="Buscar Lector" href="#" id="buscar_categoria" class="btn btn-small">
                            <i class="icon-search icon-white"></i>
                            </a>
			<a title="Agregar Lector" href="#" id="add_categoria"  class="btn btn-small">
                            <i class="icon-plus icon-white"></i>
                            </a>
                           
			</td>  
                        <td width="128">Editorial</td>
			<td width="357">
                            <input type="text" name="editorial" id="editorial" value="<?php $pro = $obj_e->nombre; echo utf8_encode($pro);?>" size="40" maxlength="100">
			<input type="hidden" name="ideditorial" id="ideditorial" value="<?php $pro = $obj_e->ideditorial; echo utf8_encode($pro);?>" size="40" maxlength="100">
			<a title="Buscar Lector" href="#" id="buscar_editorial" class="btn btn-small">
                            <i class="icon-search icon-white"></i>
                            </a>
			<a title="Agregar editorial" href="#" id="add_editorial"  class="btn btn-small">
                            <i class="icon-plus icon-white"></i>
                            </a>
                           
			</td>  
		  </tr>
                  <tr>
                                    <td><label>Descripcion</label></td>
                                        <td>
                                        <textarea name="descripcion" id="descripcion" size="200%">
<?php echo $obj->descripcion;?>
                                        </textarea></td>
                                </tr>
</table>
                    </fieldset>
        </div>
                <div>
                    <fieldset>
                        <legend>Autores</legend>
                        <div class='span3'>
                            <table>
                                <tr>
                                    <td>
                            <input type='hidden' name='autor_id' id='autor_id'/>
                            <label>nombre</label><input type="text" name="name_autor" value="" id="name_autor"/>
                                    </td>
                                
                                <td>
                            <label>Nacionalidad</label><input type="text" name="nacionalidad_autor" value="" id="nacionalidad_autor"/>
                                </td><td>
                         
                            <button title="Buscar autor" href="#" id="buscar_autor" class="btn btn-small">
                                <i class="icon-search icon-white "></i>
                                </button>
                                </td>
                                
                                <td>
                                    <button title="Agregar autor" href="#" id="agregar_autor" class="btn btn-small">
                                        <i class="icon-hand-down icon-white "></i>
                                        </button> 
                                </td>
                                </tr>
                                
                            </table>
                            <table id='detalle_libro' class='table table-bordered table-hover table-striped' style=' width:800px;'>
                                <tr>

                                <thead>      
                                <th>nombre autor</th><th>nacionalidad</th><th>Acciones</th></tr>
                            </thead>
                                <tbody id='dt_libro'>
                                    <?php 
                                    if($autores)
                                    {
                                     foreach ($autores as $a)
                                     {
                                         echo "<tr>";
                                         echo "<td><input class='autor_id' type='hidden' name='autor[]' id='autor[]' value='$a[0]' />
                                                 <input type='hidden' name='autor$a[0]' value='$a[1]'/>$a[1]</td>";
                                          echo "<td>$a[2]</td>";
                                          echo "<td><a class='btn btn-danger delete'><i class='icon-trash icon-white'></i></a></td>";
                                          echo "</tr>";
                                     }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <table>
		  <tr>
		      <td width="128">Responsable : </td>
			 <td><input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario'];?> <?php echo $_SESSION['nombre'];?>" readonly="true" size="40">
                 <input type="hidden" name="id_usuario" id="id_usuario" size="3" value="<?php echo $_SESSION['id_usuario'];?>"/>
             </td>
          </tr>
		  <tr>
			   <td colspan="4">&nbsp;</td>
		  </tr>
		 
                <tr>
			        <td colspan="4" align="center" >
					  <?php if($p==1){?>
                        <input type="submit" class="btn btn-small" name="grabar" id="grabar" value="registrar"  />
					  <?php }if($p==2){?>
						 <input type="submit" class="btn btn-small" name="grabar" id="grabar" value="actualizar"  />
					  <?php }?>
                                                 <input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="atras();"/>
					</td>
                </tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
</table>


		</form>
	
    </div>
	
