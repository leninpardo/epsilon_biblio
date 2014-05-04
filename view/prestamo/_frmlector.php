<script type="text/javascript" src="../web/js/funciones.js"></script>
<script type="text/javascript">
	$(function(){
    	$( "#q" ).focus();
        //controller="Prestamo_socio";
          $( "#q" ).autocomplete({
   minLength: 0,
   source: "index.php?controller=Prestamo&action=search_lector",
   focus: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            return false;
        },
    select: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            //$( "#q" ).val( ui.item.id );
			var q=$('#q').val();
			var p=$('#p').val();
                $.ajax({
                    type: "GET",
                    url: "index.php",
                    data: "controller=Prestamo&action=mostrar_lector&q="+q,
                    success: function(data){
                        $("#emergente").empty().append(data);
                        //$("#cont").show("blind");
			document.getElementById("emergente").style.display="none";
			             $("#emergente").slideDown("slow");
                                     $('#q').val(q);
                    },
		    	   error:function()
	                {
		                alert("ocurrio un error con ajax");
	                }
                });
            return false;
	   }
 }).data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
			
            .data( "item.autocomplete", item)
            .append( "<a>" + item.name+ "</a>" )
	    .appendTo( ul );
        };
		$("#Buscar").click(function(e)
		{
		  q = $("#q").val();
		  if(q==''){$("#q").focus(); PreventDefault(e);}
		  $("#emergente").load("index.php?controller=Prestamo&action=mostrar_lector&q="+q, function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '70%',
					height: '85%',
					left: '15%'
				 }
			}); 
		});
		  
		});
		
		
    });
</script>
<div class='ui-widget-header' style="text-align:center;color:white;">Lista de Productores</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_form" name="_form" action="" method="GET" style="text-align:center;">
		<input type="hidden" name="controller" value="Productor" />
        <input type="hidden" name="action" value="mostrar_p" />
		<input type="hidden" name="p" value="1" />
       <input   name='q' id='q' class='ui-autocomplete-input text ui-widget-content ui-corner-all' autocomplete='off' role='textbox' aria-autocomplete='list' aria-haspopup='true' style='width: 50%;' />
        <input type="button" value="Buscar" name="Buscar" id="Buscar"/>
        </form>
	<table  table width="100%" class='table table-hover table-striped table-bordered' style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead>
			<?php
			foreach ($cabecera as $c)
			{
				echo "<th align='left' class=''>".$c."</th>";
			}
			?>
			<th align="center" width="30" class="">Aceptar</th>
		</thead>
		<?php  foreach($rows as $key => $val)
		{?>
		<tr style="border-bottom:1px solid #666; background:#F0F0F0;">

			<td align="left"><?php  echo $val[0]; ?></td>
			<td align="left"><?php  echo $val[1]; ?></td>
			<td align="left"><?php  echo utf8_encode($val[2]); ?></td>
			<td align="left"><?php  if($val[3]=='Masculino'){echo 'M';}else{echo 'F';}  ?></td>
			<td align="left"><?php  echo $val[4]; ?></td>
			<td align="left"><?php  echo utf8_encode($val[5]); ?></td>
			
			<td align="center"><a href="javascript:devolver_lector('<?php  echo $val[0]; ?>','<?php  echo utf8_encode($val[2]); ?>');" title="Seleccionar Productor"><img src="web/images/accept.png"  border="0"></a></td>
		</tr>
			<?php }?>
	</table>
	<?php echo $pag;?>
	<div style="clear:both; height:20px;"></div>
<div align="center" style="margin:5px auto 10px auto;">
<input type="button" value="Cerrar" class='btn btn-small'onclick="closeWindow();" style="padding:2px 5px 2px 5px; float:none;" />
</div>
</div>
