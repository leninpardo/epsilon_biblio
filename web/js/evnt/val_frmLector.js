var band=0;
$(function()
{ 
	$("#grabar2").click(function()
	{ 
                bval = true;
	  
	    bval = bval && $( "#nombres" ).required();
	    bval = bval && $( "#dni" ).required();
              bval = bval && $( "#tipo" ).required();
            if ( bval ) 
		{ 
                    str="";
                   str+='&sexo='+$("#sexo").val();
                                str+='&idlector='+$("#idlector").val();
				str+='&tipo='+$("#tipo").val();
				str+='&nombres='+$("#nombres").val();
				str+='&dni='+$("#dni").val();
				str+='&direccion='+$("#direccion").val();
				str+='&telef='+$("#telef").val();
				
				str+='&oper='+$("#oper").val();
				str+='&estado='+$("#estado").val();
                  $.get('index.php',"controller=Lector&action=save_extend&"+str,function(data)
				{
                                  
					if(data.rep=="1")
					{
						
						document.getElementById("idlector").value=data.id;
                                                document.getElementById("lector").value=data.nombre;
                                                closeWindow();
					}
                                        
                                        if(data.rep=="3")
					{
                                            
						alert(data.msg);
                                    }
                                        
				},'json');   
                }
        });
          
	$("#grabar").click(function()
	{
          // str= $("#_form").serialize();

	  
	    bval = true;
	    bval = bval && $( "#tipo" ).required();
	    bval = bval && $( "#nombres" ).required();
	    bval = bval && $( "#dni" ).required();
	  
		var sexo=document.getElementsByName("sexo");
		for(i=0;i<sexo.length;i++)
		{
		  if(sexo[i].checked)
		  {
		     var selec=sexo[i].value;
		     break;
		  }
		}
		
	
		if ( bval ) 
		{ 
		   
			  
			  
			p=$("#oper").val();
			var flag=0;
			if(p==1)
			{
				//bval = bval && $( "#archivo" ).required();
				var imagePath = window.fotoim.imagePath;
                               // alert(imaPath);
				if(typeof imagePath=='undefined')
				{
					imagePath='view/fotostem/default.jpg';
					flag=1;
				}
			         str="";
				str+='&sexo='+selec;
                                str+='&idlector='+$("#idlector").val();
				str+='&tipo='+$("#tipo").val();
				str+='&nombres='+$("#nombres").val();
				str+='&dni='+$("#dni").val();
				str+='&direccion='+$("#direccion").val();
				str+='&telef='+$("#telef").val();
				str+='&foto='+imagePath;
				str+='&oper='+$("#oper").val();
				str+='&estado='+$("#estado").val();
				str+='&flag='+flag;
				  //alert(str);
				ver_msg(0,"..::Guardando::..")
                              
				$.get('index.php','controller=Lector&action=save&'+str,function(data)
				{
                                    //alert(data.msg);
					if(data.rep=="1")
					{
						window.fotoim.document.body.innerHTML='';
						msg(1,'Datos grabados correctamente','controller=Lector');
					}
                                        
                                        if(data.rep=="3")
					{
                                            
						alert(data.msg);
                                    }
                                        
				},'json'); 	
			}
                
			if(p==2)
			{
                            
				str="";
				str+='&sexo='+selec;
                               /// alert("h");
				str+='&idlector='+$( "#idlector" ).val();
				str+='&nombres='+$("#nombres").val();
				str+='&dni='+$("#dni").val();
                                str+='&tipo='+$("#tipo").val();
				str+='&direccion='+$("#direccion").val();
				str+='&telef='+$("#telef").val();
				str+='&oper='+$("#oper").val();
				str+='&estado='+$("#estado").val();
				if(band==1)
				{
				 var imagePath = window.fotoim.imagePath;
				 str+='&foto='+imagePath;
				 str+='&fotoq='+$("#fotoq").attr( 'src' );
				 str+='&band=1';
				}else
				{
				 str+='&foto='+$("#fotoq1").val();
				 str+='&fotoq=';
				 str+='&band=0';
				}
				
				
				
				//alert(str);
				ver_msg(0,"..::Guardando::..")
				$.get('index.php','controller=Lector&action=save&'+str,function(data)
				{
                                    //alert(data.msg);
					if(data.rep=="2")
					{
						ver_msg(2,'Datos modificados correctamente');
					}else
                                        {
                                            alert(data.msg);
                                        }
				},'json');
			}
		}
	});
	$("#fecha_nacimiento").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "-70:-12"
		/*minDate: '-65Y',
		maxDate: '-15Y'*/
	});
	$("#cancel").click(function()
		{
		 $("#result").slideDown();
		  $("#res").slideUp();
		  document.getElementById("save").style.visibility="visible";
		});
                
	$("#grabar_ext").click(function()
	{
          bval = true;		 
		  bval = bval && $( "#nombres" ).required();
	      bval = bval && $( "#apellidos" ).required();
	      bval = bval && $( "#dni" ).required();
		
		  if(bval)
		  {
		    var str_ext;
		    var dni=$("#dni").val();
		    str_ext='nombres='+$( "#nombres" ).val();
		    str_ext+='&apellidos='+$("#apellidos").val();
		    str_ext+='&dni='+$("#dni").val();
		  	$.post('index.php','controller=productor&action=save_ext&'+str_ext,function(data)
				{
				  //alert(data);
					if(data.rep=="1")
					{
						$.post('index.php','controller=Productor&action=ver_ext&dni='+dni,function(datos)
						{
						   //alert(datos.id_productor+""+datos.productor);
						    opener.document.getElementById("id_productor").value=datos.id_productor;
                            opener.document.getElementById("productor").value=datos.productor;
                            window.close();
						},'json');
					}
				},'json');
				//alert('ok');
				//window.close();
		  }
		  return false;
	});
	$("#estado_civil").change(function()
	{
	  v=$(this).val();
	  if(v!="")
	  {
			  if(v=="SOLTERO")
			  {
				 
				 $("#cc").slideUp();
				
			  }else
			  {
				$("#cc").slideDown();
			  }
	  
	  }
	  return false;
	});
	
});

function uploadImage()
{
	pp=$("#oper").val();
	if(pp==2)
	{
		document.getElementById("fotoq").style.display='none';
		document.getElementById("_form").submit();
		band=1;
	}
	else
	{
		document.getElementById("_form").submit();
	}
	
}
function atras()
{
	paginacion('controller=Lector');
}
function imprimir()
{
	window.open("fpdf/reporte.php?tabla=lector");
}

	
