<div id="mapa"></div>

<?php

echo '<pre>';
print_r($aPosition);
echo '</pre>';

?>

<script>
	// var map;
	// var bounds;
 //  	var posicion;
	// var last_position;
	// var marker;
	// function initialize() {
	// 	bounds = new google.maps.LatLngBounds();
	// 	last_position = new google.maps.LatLng(<?php echo $aPosition[0]['latitude']?>, <?php echo $aPosition[0]['longitude']?>);
	// 	var mapOptions = {
	//     	zoom: 15,		    
	// 	    center: last_position,
	// 	    mapTypeId: google.maps.MapTypeId.ROADMAP
	//   	};

	// 	map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

	// 	marker = new google.maps.Marker({
	// 		map:map,
	// 		draggable:true,
	// 		animation: google.maps.Animation.DROP,
	// 		position: new google.maps.LatLng(<?php echo $aPosition[0]['latitude']?>, <?php echo $aPosition[0]['longitude']?>)
 //  		});
	// }

	// function loadScript() {
	// 	var script = document.createElement('script');
	// 	script.type = 'text/javascript';
	// 	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize';
	// 	document.body.appendChild(script);
	// }

	// window.onload = loadScript;
</script>