$(function()
{       $("#grabar3").click(function(){
     bval = true;
	    bval = bval && $("#nombre").required();
              bval = bval && $( "#nacionalidad").required();
		if ( bval ) 
		{
                    str="ideditorial=&oper=1&nombre="+$("#nombre").val();
                    str=str+"&nacionalidad="+$("#nacionalidad").val()
			$.post('index.php','controller=Editorial&action=save&'+str,function(data)
		    {
                        	
                            if(data.rep=="1")
			    {
					document.getElementById("ideditorial").value=data.id;
                                                document.getElementById("editorial").value=data.editorial;
                                                closeWindow();
				}
				else if(data.rep=="2")
				{
					ver_msg(2,'Datos modificados correctamente');
				}
                                else{
                                alert(data.msg);
                                }
                                
                                
			},'json'); 
                }
                 return false;
    });
    
	$("#_form").submit(function()
	{            
		bval = true;
	    bval = bval && $( "#nombre").required();
             bval = bval && $( "#nacionalidad").required();
		if ( bval ) 
		{
			ver_msg(0,"..::Guardando::..")
			str = $(this).serialize();
			$.post('index.php','controller=Editorial&action=save&'+str,function(data)
		    {
				if(data.rep=="1")
			    {
					msg(1,'Datos grabados correctamente','controller=Editorial');
				}
				else if(data.rep=="2")
				{
					ver_msg(2,'Datos modificados correctamente');
				}
                                else{
                                    alert(data.msg);
                                }
			},'json');
		}
        return false;
	});
});


function atras()
{
	paginacion('controller=Editorial');
}
function imprimir()
{
	window.open("fpdf/reporte.php?tabla=editorial");
}