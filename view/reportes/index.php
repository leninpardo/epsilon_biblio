<div class='ui-widget-header'>Reporte de Prestamos</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="padron" name="_form" action="" method="POST" >
		<input type="hidden" name="controller" value="Reportes"/>
	
                <table id="data" width="670" cellspacing="4"cellpadding="0" border="0">
                    <tr >
                        <td>de:</td>
                        <td><input type="text" name="fi" id="fi" value="" /></td>
                    </tr>
                      <tr >
                        <td>a:</td>
                        <td><input type="text" name="ff" id="ff" value="" /></td>
                    </tr>   
              	</table>
                
                <div id="c">
                  
                    <div class="span5">
                         <fieldset>
                            <legend>Reportes</legend>
                            <input type="button" class="btn btn-small" name="ir" id="ir" value="aceptar"/>
                                    <input type="button" class="btn btn-small" name="regresar" id="regresar" value="atras"  onclick="atras();"/>
                        
                    <a id="record" class="btn btn-small"  title="record de socios" >Record de entrega de cafe de socios</a>
                         </fieldset>
                    </div>
                    </div>
                		
	</form>
</div>
<script type="text/javascript">
jQuery(function($){ 
   
    $("#ir").click(function(){
         bval = true;
                    bval = bval && $( "#fi").required();
                    bval = bval && $( "#ff").required();
                    if ( bval ) 
		{
                
        			 fi=$("#fi").val();
                    ff=$("#ff").val();
                    		str="controller=Reportes&action=reporte_prestamos&fi="+fi+"&ff="+ff;
			    window.open('index.php?'+str)
                        }
    });
     $("#record").click(function(){
         bval = true;
                bval = bval && $( "#fi").required();
                    bval = bval && $( "#ff").required();
                    if ( bval ) 
		{
                    fi=$("#fi").val();
                    ff=$("#ff").val();
                   
        			str="controller=kardex&action=record&fi="+fi+"&ff="+ff;
			    window.open('index.php?'+str);
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