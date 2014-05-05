$(function()
{   
    $("#grabar2").click(function(){
     bval = true;
	    bval = bval && $("#categoria_ext").required();
		if ( bval ) 
		{
                    str="idacategoria=&oper=1&descripcion="+$("#categoria_ext").val();
			$.post('index.php','controller=Categoria&action=save&'+str,function(data)
		    {
                        	
                            if(data.rep=="1")
			    {
					document.getElementById("idcategoria").value=data.id;
                                                document.getElementById("categoria").value=data.categoria;
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
	    bval = bval && $("#descripcion").required();
		if ( bval ) 
		{
			ver_msg(0,"..::Guardando::..")
			str = $(this).serialize();
			$.post('index.php','controller=Categoria&action=save&'+str,function(data)
		    {
                        	
                            if(data.rep=="1")
			    {
					msg(1,'Datos grabados correctamente','controller=Categoria');
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
	paginacion('controller=Categoria');
}
function imprimir()
{
	window.open("fpdf/reporte.php?tabla=categoria");
}