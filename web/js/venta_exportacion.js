$(document).ready(function(){
$("#exportacion_e").click(function(){
$("#emergente").load("index.php?controller=Proceso&action=venta_exportacion", function(){
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
$("#exportacion_s").click(function(){
$("#emergente").load("index.php?controller=Proceso&action=v_exportacion_s", function(){
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