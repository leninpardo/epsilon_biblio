$(function() {

controller=$('#c').val();

$("#_buscar").click(function(){
var q=$('#q').val();
var p=$('#p').val();
str="index.php?controller="+controller+"&action=index&q="+q+"&p="+p
$.get(str,function(data){
 $("#cont").empty().append(data);
 $('#q').val(q);
});
 
});
 $( "#q" ).autocomplete({
   minLength: 0,
   source: "index.php?controller="+controller+"&action=search",
   focus: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            return false;
        },
    select: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            //$( "#q" ).val( ui.item.id );
			var q=$('#q').val();
			var p=$('#p').val();
                $.ajax({
                    type: "GET",
                    url: "index.php",
                    data: "controller="+controller+"&action=Index&q="+q+"&p="+p,
                    success: function(data){
                        $("#cont").empty().append(data);
                        //$("#cont").show("blind");
			document.getElementById("cont").style.display="none";
			             $("#cont").slideDown("slow");
                    },
		    	   error:function()
	                {
		                alert("ocurrio un error con ajax");
	                }
                });
            return false;
	   }
 }).data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
			
            .data( "item.autocomplete", item)
            .append( "<a>" + item.name+ "</a>" )
	    .appendTo( ul );
        };
});