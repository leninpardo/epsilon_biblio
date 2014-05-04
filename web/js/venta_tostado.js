$(document).ready(function(){

$("#_tostado").click(function(){
//alert('ok');

$("#emergente").load("index.php?controller=Venta&action=venta_tostado", function(){
			$.blockUI({
				message: $("#emergente"),
				css:{
					top: '2%',
					width: '60%',
					height: '80%',
					left: '25%'
				}
			}); 
		});


});


});