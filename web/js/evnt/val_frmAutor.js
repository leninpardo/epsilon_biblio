$(function()
{      
	$("#grabar4").click(function()
	{            
		bval = true;
	    bval = bval && $( "#nombre").required();
             bval = bval && $( "#nacionalidad").required();
		if ( bval ) 
		{
			
			   str = "op=1&idautor=&nombre="+$( "#nombre").val();
                            str=str+"&nacionalidad="+$( "#nacionalidad").val();
			$.post('index.php','controller=Autor&action=save&'+str,function(data)
		    {
				if(data.rep=="1")
			    {
					document.getElementById("autor_id").value=data.id;
                                           document.getElementById("name_autor").value=data.autor;
                                             document.getElementById("nacionalidad_autor").value=data.nacionalidad;
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
			$.post('index.php','controller=Autor&action=save&'+str,function(data)
		    {
				if(data.rep=="1")
			    {
					msg(1,'Datos grabados correctamente','controller=Autor');
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
	paginacion('controller=Autor');
}
function imprimir()
{
	window.open("fpdf/reporte.php?tabla=autor");
}