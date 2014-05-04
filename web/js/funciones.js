function popup(url,width,height)
{	  	    
	cuteLittleWindow = window.open(url, "littleWindow","location=no,width="+width+",height="+height+",top=80,left=300,scrollbars=yes");
}

function closeWindow() {
	$.unblockUI({ 
		onUnblock: function(){
			$("#emergente").html("");
		}
	});	
}


$(document).ready(function(){
/*
devolver_cliente = function (idcliente,razon_social,ruc,telefono){

    document.getElementById("idcliente").value=idcliente;
    document.getElementById("cliente").value=razon_social;
//    document.getElementById("tipo_c").value='2';  //1:boleta 2:factura
	document.getElementById("ruc_dni").value=ruc;
        str="cliente="+idcliente;
        $.get('index.php','controller=Venta&action=getContrato&'+str,function(datos)
		    {
		
			$('#contrato').html("");
			$('#contrato').html('<option value="0">::Seleccione::</option>');
                     
					for(i=0; i < datos.length; i++) {
						$('#contrato').append('<option value="'+datos[i][0]+'"><?php utf8_decode( ?>'+datos[i][1]+'<?php )?></option>');
					}
			},'json');  
	closeWindow();
}


devolver_salida = function(idsalida, kg, quintales){

        if(idsalida<10){ id = '0000'+idsalida;}
		else{
			if(idsalida > 9 && idsalida < 99){ id = '000'+idsalida;}else{
			if(idsalida>99 && idsalida <999){ id = '00'+idsalida;}else{
			if(idsalida>999 && idsalida < 9999){ id = '0'+idsalida;}else{
			id=idsalida;
			}
			}
			}
		}

		document.getElementById("prod").value="Salida de Almacen Nro. "+id;
		document.getElementById("id_prod").value=idsalida;
		document.getElementById("cant").value=quintales;
		//document.getElementById("quintales").value=quintales;
                document.getElementById("kg").value=kg;
		closeWindow();
}*/

});

/*
function devolver_exportable(id,proceso,kg,quint){
document.getElementById("prod").value="Proceso Nro. "+proceso;
document.getElementById("id_prod").value=id; // el id_prod es el idproceso
document.getElementById("cant").value=quint;
document.getElementById("kg").value=kg;
document.getElementById("exp").value="E";
document.getElementById("stock").value=kg;
closeWindow();
}

function devolver_segunda(id,proceso,kg,quint){
document.getElementById("prod").value="Proceso Nro. "+proceso;
document.getElementById("id_prod").value=id; // el id_prod es el idproceso
document.getElementById("cant").value=quint;
document.getElementById("kg").value=kg;
document.getElementById("exp").value="S";
document.getElementById("stock").value=kg;
closeWindow();
}*/

function devolver_lector(id,nombre){
document.getElementById("idlector").value=id;
document.getElementById("lector").value=nombre;
closeWindow();
}
function devolver_libro(id,titulo,editorial,categoria){
document.getElementById("libro_id").value=id;
document.getElementById("libro").value=titulo;
document.getElementById("categoria").value=categoria;
document.getElementById("editorial").value=editorial;
closeWindow();
}


function devolver_categoria(id,nombre){
document.getElementById("idcategoria").value=id;
document.getElementById("categoria").value=nombre;
closeWindow();
}
function devolver_editorial(id,nombre){
document.getElementById("ideditorial").value=id;
document.getElementById("editorial").value=nombre;
closeWindow();
}
function devolver_autor(id,nombre,nacionalidad){
document.getElementById("autor_id").value=id;
document.getElementById("name_autor").value=nombre;
document.getElementById("nacionalidad_autor").value=nacionalidad;
closeWindow();
}


