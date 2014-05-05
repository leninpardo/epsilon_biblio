/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function()
{  

$("#buscar_pro").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Prestamo&action=mostrar_lector", function(){
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
$("#add_lector").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Lector&action=create_extend", function(){
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
$("#buscar_libro").click(function(e){
e.preventDefault();
$("#emergente").load("index.php?controller=Prestamo&action=mostrar_libro", function(){
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


$("#agregar_libro").click(function(){
bval=true;
 bval = bval && $( "#libro").required();
	    
		if ( bval )
                    {
                         if( $(".book_id[value="+$("#libro_id").val()+"]").length ) {
               alert("Este libro ya fue agregado");
                return false;
            }
                       id=$("#libro_id").val();
                       libro=$("#libro").val();
                       categoria=$("#categoria").val(); 
                       editorial=$("#editorial").val();
                        $("#libro_id").val("");
                       $("#libro").val("");
                       $("#categoria").val(""); 
                      $("#editorial").val("");
                       tr="<tr class='row_book'>";
                       tr+="<input class='book_id' type='hidden' name='lib[]' id='lib[]' value='"+id+"' /><td>"+libro+"</td><td>"+categoria+"</td><td>"+editorial+"</td>\n\
               <td><a class='btn btn-danger delete'><i class='icon-trash icon-white'></i></a></td></tr>";
        //
                       $("#dt_libro").append(tr);
                    }
                    return false;
});
	$("#_form").submit(function()
	{ 
	    bval = true;
	    bval = bval && $( "#lector").required();
            bval = bval && $( "#fecha_p").required();
            bval = bval && $( "#fecha_d").required();
	    
		if ( bval ) 
		{
			
                          if( $(".row_book").length ) {
                              ver_msg(0,"..::Guardando::..")
			  str = $(this).serialize();
				$.post('index.php','controller=Prestamo&action=save&'+str,function(data)
				{
					
					if(data.rep=="1")
					{
						msg(1,'Datos grabados correctamente','controller=Prestamo');
					}
					else if(data.rep=="2")
					{
						ver_msg(2,'Datos modificados correctamente');
					}
                                        else{alert(data.msg);}
				  },'json');
                          }else{
                                alert("Agregue libros");
                          }
		}
		return false;
	});
        
       $("#_frm").submit(function()
	{ 
	    bval = true;
	    bval = bval && $( "#observacion").required();
	    
		if ( bval ) 
		{
			
                          if( $(".row_book").length ) {
                              ver_msg(0,"..::Guardando::..")
			  str = $(this).serialize();
				$.post('index.php','controller=Prestamo&action=save_devolucion&'+str,function(data)
				{
					
					if(data.rep=="1")
					{
						msg(1,'Datos grabados correctamente','controller=Prestamo');
					}
					else if(data.rep=="2")
					{
						ver_msg(2,'Datos modificados correctamente');
					}
                                        else{alert(data.msg);}
				  },'json');
                          }else{
                                alert("Agregue libros");
                          }
		}
		return false;
	});
      $( "#fecha_p" ).datepicker({
			changeMonth: true,
                        dateFormat: 'yy-mm-dd', 
			changeYear: true,
			yearRange: "-90:+0"
		});
                $( "#fecha_d" ).datepicker({
			changeMonth: true,
                        dateFormat: 'yy-mm-dd',
			changeYear: true,
			yearRange: "-90:+0"
		});  
        
});

function atras()
{
paginacion('controller=Prestamo');
}

function imprimir()
{
window.open("fpdf/reporte2.php?tabla=prestamo");
}
