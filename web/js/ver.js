$(document).ready(function(){
    	
        
_ver = function (url){
//alert(url);
$("#cont").load(url, function(){
/*$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '65%',
					height: '85%',
					left: '18%'
				 }
			}); */
		});	
}


_devolucion = function (url){
$.get(url,function(data)
	 {
	    $("#cont").empty().append(data);

      });
}


_msgdevolucion = function (url){
alert('Libros devueltos');
}



});





