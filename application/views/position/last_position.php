<?php

echo '<pre>';
print_r($aPosition);
echo '</pre>';

?>

<div id="mapa"></div>

<script>
	var map;
	var bounds;
  	var posicion;
	var last_position;
	var marker;
	function initialize() {
		bounds = new google.maps.LatLngBounds();
		last_position = new google.maps.LatLng(<?php echo $aPosition[0]['latitude']?>, <?php echo $aPosition[0]['longitude']?>);
		var mapOptions = {
	    	zoom: 15,		    
		    center: last_position,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
	  	};

		map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

		marker = new google.maps.Marker({
			map:map,
			draggable:true,
			animation: google.maps.Animation.DROP,
			position: last_position
  		});
    
    	circle = new google.maps.Circle({
			strokeColor: '#FF0000',
		    strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#FF0000',
			fillOpacity: 0.35,
			map: map,
			center: last_position,
			radius: 500
    	});
	}

	function loadScript() {
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize';
		document.body.appendChild(script);
	}

	window.onload = loadScript;
</script>