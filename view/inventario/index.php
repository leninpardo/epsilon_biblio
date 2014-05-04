
<div class='ui-widget-header'>Reporte de inventario de libros</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="padron" name="_form" action="" method="POST" >
		<input type="hidden" name="controller" value="Inventario"/>         
                
                    <div class="span5">
                         <fieldset>
                            <legend>Reportes</legend>
                            <input type="button" class="btn btn-small" name="ir" id="ir" value="inventario"/>
                                    <input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="atras();"/>
                     <a id="stock" class="btn btn-small" title="Libros en estantes" >Ver Stock libros</a>
                         </fieldset>
                    </div>
                    </div>
                		
	</form>
</div>
<script type="text/javascript">
jQuery(function($){ 
   
    $("#ir").click(function(){
         bval = true;
                    //bval = bval && $( "#fi").required();
                   // bval = bval && $( "#ff").required();
                    if ( bval ) 
		{
                 fi=$("#fi").val();
                    ff=$("#ff").val();
        		str="controller=Inventario&action=reporte&fi="+fi+"&ff="+ff;
			    window.open('index.php?'+str);
			    window.open('index.php?'+str)
                        }
    });
     
    
       $("#stock").click(function(){
         bval = true;
             bval = bval && $( "#fi").required();
                    bval = bval && $( "#ff").required();
                    if ( bval ) 
		{
                 fi=$("#fi").val();
                    ff=$("#ff").val();
                   
        			str="controller=kardex&action=stock&fi="+fi+"&ff="+ff;
			    window.open('index.php?'+str);
                  }
    });
     $("#fi").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		yearRange: "-25:+0"
	});
        $("#ff").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		yearRange: "-25:+0"
	});
    });
</script>