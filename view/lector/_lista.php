
<script type="text/javascript">
	$(function(){
        
         controller=$('#c').val();
          $( "#q" ).autocomplete({
   minLength: 0,
   source: "index.php?controller="+controller+"&action=search",
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
                    data: "controller="+controller+"&action=mostrar&q="+q+"&p="+p,
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
        
	
$("#buscar" ).click(function(){

 var q=$('#q').val();
 var p=$('#p').val();
 str="index.php?controller="+controller+"&action=mostrar&q="+q+"&p="+p
// alert(str);
  $.get(str,function(data){
    //alert(data);
     $("#emergente").empty().append(data);
     $('#q').val(q);
}  
);	
    });
    
    $("#buscar" ).submit(function(){

 var q=$('#q').val();
 var p=$('#p').val();
 str="index.php?controller="+controller+"&action=mostrar&q="+q+"&p="+p
// alert(str);
  $.get(str,function(data){
    //alert(data);
     $("#emergente").empty().append(data);
     $('#q').val(q);
}  
);	
    });
        });
</script>
<div class='ui-widget-header' style="text-align:center;color:white;">Lista de Productores</div>
<div id="frmtotal">
		<div id="msg" ></div>
	
            <input type="hidden" name="controller"  id="c"value="Productor" />
        <input type="hidden" name="action" value="mostrar" />
        <input type="hidden" name="p" id="p" value="1" />
<input   name='q' id='q' class='ui-autocomplete-input text ui-widget-content ui-corner-all' autocomplete='off' role='textbox' aria-autocomplete='list' aria-haspopup='true' style='width: 50%;' />
        <input type="button" value="Buscar" name="buscar" id="buscar"/>
		
        
	<table  class='table table-hover table-striped table-bordered' table width="95%" style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead>
			<?php
			foreach ($cabecera as $c)
			{
				echo "<th align='left' >".$c."</th>";
			}
			?>
			<th align="center" width="30" >Aceptar</th>
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
			<td align="left"><?php  echo utf8_encode($val[6]); ?></td>
			<td align="center"><a href="javascript:devolver_prod_acopio('<?php  echo $val[0]; ?>','<?php  echo $val[1]; ?>','<?php  echo utf8_encode($val[2]); ?>','<?php  echo $val[3]; ?>','<?php  echo $val[4]; ?>','<?php  echo $val[5]; ?>','<?php  echo $val[6]; ?>');" title="devolver"><img src="web/images/accept.png"  border="0"></a></td>
		</tr>
			<?php }?>
	</table>
	<?php echo $pag;?>
	<div style="clear:both; height:20px;"></div>
<div align="center" style="margin:5px auto 10px auto;">
<input type="button" class="btn btn-small" value="Cerrar" onclick="closeWindow();" style="padding:2px 5px 2px 5px; float:none;" />
</div>
</div>
