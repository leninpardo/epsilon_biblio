/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function()
{   
$("#_form").submit(function()
	{ 
	    bval = true;
	    bval = bval && $( "#titulo").required();
	    bval = bval && $( "#isbn").required();
		bval = bval && $( "#fecha_p").required();
		bval = bval && $( "#categoria").required();
		bval = bval && $( "#editorial").required();
	    
		if ( bval ) 
		{
			ver_msg(0,"..::Guardando::..")
			  str = $(this).serialize();
			
				$.get('index.php','controller=Libro&action=save&'+str,function(data)
				{
					//alert(data.msg);
					if(data.rep=="1")
					{
						msg(1,'Datos grabados correctamente','controller=Libro');
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
        
        
        
$("#buscar_categoria").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Libro&action=mostrar_categoria", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});
$("#add_categoria").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Categoria&action=create_extend", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});

$("#buscar_editorial").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Libro&action=mostrar_editorial", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});
$("#add_editorial").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Editorial&action=create_extend", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});
//autor del libro
$("#buscar_autor").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Libro&action=mostrar_autor", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});

$("#add_autor").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Autor&action=create_extend", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '80%',
					height: '85%',
					left: '15%'
				}
			}); 
		});	
});

    $(".delete").live('click',function(){
        var i = $(this).parent().parent().index();
        $("#dt_libro tr:eq("+i+")").remove();
      
    });


$("#agregar_autor").click(function(){
bval=true;
 bval = bval && $( "#name_autor").required();
	    
		if ( bval )
                    {
                         if( $(".autor_id[value="+$("#autor_id").val()+"]").length ) {
               alert("Este autor ya fue agregado");
                return false;
            }
                       id=$("#autor_id").val();
                       autor=$("#name_autor").val();
                       nacionalidad=$("#nacionalidad_autor").val(); 
                       
                        $("#autor_id").val("");
                       $("#name_autor").val("");
                       $("#nacionalidad_autor").val(""); 
                      
                       tr="<tr>";
                       tr+="<input class='autor_id' type='hidden' name='autor[]' id='autor[]' value='"+id+"' />\n\
               <input type='hidden' name='autor"+id+"' value='"+autor+"'/><td>"+autor+"</td><td>"+nacionalidad+"</td>\n\
               <td><a class='btn btn-danger delete'><i class='icon-trash icon-white'></i></a></td></tr>";
        //
                       $("#dt_libro").append(tr);
                    }
                    return false;
});
$( "#fecha_p" ).datepicker({
			//changeMonth: true,
                        dateFormat: 'yy', 
			changeYear: true,
			yearRange: "-90:+0"
		});
                $( "#fecha_u" ).datepicker({
			//changeMonth: true,
                        dateFormat: 'yy',
			changeYear: true,
			yearRange: "-90:+0"
		});
});


function atras()
{
	paginacion('controller=Libro');
}
function imprimir()
{
	window.open("fpdf/reporte2.php?tabla=libro");
}