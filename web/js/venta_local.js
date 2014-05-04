$(document).ready(function(){

$("#_local").click(function(){
//alert('ok');

$("#emergente").load("index.php?controller=Venta&action=venta_local", function(){
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