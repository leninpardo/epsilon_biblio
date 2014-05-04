<?php
function validar_fecha($fecha){
$fecha = strtotime($fecha);
$anio = (date('Y',$fecha));
$mes = (date('m',$fecha));
$dia =(date('d',$fecha));
return $dia.'-'.$mes.'-'.$anio;
}
?>
<script type="text/javascript" src="web/js/evnt/val_frmPrestamo.js" ></script>
<div id="breadcrumbs" class="text-center">Registro de Prestamos</div>
	<div id="frmtotal">
	    <div id="msg" ></div>
        <form id="_form" name="_form" action="" method="POST" enctype="multipart/form-data" target="fotoim">
	 
                <div id="datos_prestamo">
                    <fieldset>
                        <legend>Datos Prestamo</legend>
<table cellspacing="4" cellpadding="0"   border="0" align="center" >
    
          <input type="hidden" name="oper" id="oper" value="<?php echo $p;?>"/>
		  <input type="hidden" name="idprestamo" id="idprestamo" value="<?php echo $obj->idprestamos;?>">
		  <input type="hidden" name="idlector" id="idlector" value="<?php echo $obj_l->idlector;?>">
 
		  <tr>
			<td width="128">Lector</td>
			<td width="357"><input type="text" name="lector" id="lector" value="<?php $pro = $obj_l->nombre; echo utf8_encode($pro);?>" size="40" maxlength="100">
			<a title="Buscar Lector" href="#" id="buscar_pro" class="btn btn-small">
                            <i class="icon-search icon-white"></i>
                            </a>
			<a title="Agregar Lector" href="#" id="add_lector"  class="btn btn-small">
                            <i class="icon-plus icon-white"></i>
                            </a>
                           
			</td>  
                  </tr><tr>
                         <td >Fecha Prestamo:</td>
              <td ><input type='text' size='11' name='fecha_p' id='fecha_p' value="<?php if($obj){echo ($obj->fecha_prestamo);}  ?>"/></td>
           <td >Fecha Devolucion:</td>
              <td ><input type='text' size='11' name='fecha_d' id='fecha_d' value="<?php if($obj){echo ($obj->fecha_devolucion);}  ?>"/></td>
         
		  </tr>
                   <tr>
                                    <td>Descripcion</td>
                                    <td><textarea name="descripcion" id="descripcion">
                                        <?php echo $obj->descripcion;?>
                                        </textarea></td>
                                </tr>
</table>
                    </fieldset>
        </div>
                <div>
                    <fieldset>
                        <legend>Libros a prestar</legend>
                        <div class='span3'>
                            <table>
                                <tr>
                                    <td>
                            <input type='hidden' name='libro_id' id='libro_id'/>
                            <label>Libro</label><input type="text" name="libro" value="" id="libro"/>
                                    </td>
                                
                                <td>
                            <label>Categoria</label><input type="text" name="categoria" value="" id="categoria"/>
                                </td><td>
                            <label>Editorial</label><input type="text" name="editorial" value="" id="editorial"/>
                                </td><td>
                            <button title="Buscar Libro" href="#" id="buscar_libro" class="btn btn-small">
                                <i class="icon-search icon-white "></i>
                                </button>
                                </td>
                                
                                <td>
                                    <button title="agregar" href="#" id="agregar_libro" class="btn btn-small">
                                        <i class="icon-hand-down icon-white "></i>
                                        </button> 
                                </td>
                                </tr>
                               
                            </table>
                            <table id='detalle_libro' class='table table-bordered table-hover table-striped' style=' width:800px;'>
                                <tr>

                                <thead>      
                                <th>Titulo</th><th>Categoria</th><th>Editorial</th><th>Acciones</th></tr>
                            </thead>
                                <tbody id='dt_libro'>
                                    <?php 
                                   if($libros)
                                   {
                                        foreach ($libros as $l)
                                        {
                                      
                                            echo "<tr class='row_book'>";
                                            echo "<td><input class='book_id' type='hidden' name='lib[]' id='lib[]' value='$l[0]' />$l[1]</td>";
                                            echo "<td>".$l[2]."</td>";
                                             echo "<td>".$l[3]."</td>";
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
			 <td><input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario'];?> <?php echo $_SESSION['nombre'];?>" readonly="true"/ size="40">
                 <input type="hidden" name="id_usuario" id="id_usuario" size="3" value="<?php echo $_SESSION['id_usuario'];?>"/>
             </td>
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
	
