<script type="text/javascript" src="web/js/evnt/val_frmamortiza.js" ></script>
<div class='ui-widget-header'>Registro de Pagos</div>
				<div id="frmtotal">
				<div id="msg" ></div>
			        <form id="_form" name="_form" action="" method="POST">
			           <table  width="550" cellspacing="4"cellpadding="0" border="0" >
					   <tr>
						 <td colspan="3">&nbsp;
						 </td>
						 </tr>
						 <tr>
			               <td>Cliente:</td>
					       <td colspan="3"><input name="oper" id="oper" type="hidden" value="<?php echo $p;?>"/>
						   <input   name="cliente" id="cliente" class='ui-autocomplete-input text ui-widget-content ui-corner-all' autocomplete='off' role='textbox' aria-autocomplete='list' aria-haspopup='true' style='width: 400px;'/>
						   <input type="hidden" name='id_plan' id='id_plan'></td>
						   <td>  <label class='uiButton uiButtonConfirm'><input type="button" name="grabar" id="grabar" value="Pagar"  /></label></td>
	                    </tr>
						 <tr>
						 <td colspan="3">&nbsp;
						 </td>
						 </tr>
						 <tr>
						 	<td colspan="5">
								 <fieldset>
									<div  id="currentc" class="ui-widget" style="clear: both;">
									</div>   
										
								</fieldset>
						 	</td>
						 </tr>
			             
      					</table>
				     </form>
		       </div><!-- end for frm busqueda-->
                                   
			
					 