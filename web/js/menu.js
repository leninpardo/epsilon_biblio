(function($) {
$.fn.generaMenu = function(menu) 
{
  this.each(function()
  {
    var capaMenu=$(this);
    jQuery.each(menu, function() 
    {
	  var capa=$("<li></li>");
	  capaMenu.append(capa);
	  var capaPadre=$('<a class="dropdown-toggle" href="#"></a>');
      capa.append(capaPadre);
	  //var menuid="'"+this.idmodulo+"'";
      //var _id=this.idmodulo;
	  var enlacepadre=$('<i class="'+this.icono+'"></i><span>'+(this.texto).charAt(0).toUpperCase()+(this.texto).slice(1).toLowerCase()+'</span><b class="arrow icon-angle-down"></b>');
	  capaPadre.append(enlacepadre);
	  var subLista = $('<ul class="submenu"></ul>');
	   capa.append(subLista);
	      jQuery.each(this.enlaces, function()
		   {
		     var subElemento = $('<li></li>');
		      subLista.append(subElemento);
			  var menu_id="'"+this.idmodulo+"'";
			  var urlsub="'"+this.url+"'";
			  var subEnlace = $('<a  onclick="modulo('+menu_id+','+urlsub+');" href="javascript:cargar_pages(' +urlsub + ')">' + (this.texto).charAt(0).toUpperCase()+(this.texto).slice(1).toLowerCase()+ '</a>');
		      subElemento.append(subEnlace);
		   });
	});
  });
 return this;
};

})(jQuery);
