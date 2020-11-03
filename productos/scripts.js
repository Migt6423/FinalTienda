$(document).ready(function(){
	$('#search_proveedor').change(function(e){
		e.preventDefault();

		var sistema = getUrl();
		alert(sistema);
		location.href = sistema+'buscar_productos.php?proveedor='+$(this).val();

	})
});
//end ready

function getUrl(){
	var loc = window.location;
	var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/')+1);
	return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));	
}