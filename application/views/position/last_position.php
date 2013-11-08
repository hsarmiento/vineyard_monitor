<?php

// echo '<pre>';
// print_r($aPosition);
// echo '</pre>';

?>

<!-- <div id="embedl_gps"></div> -->

<!--logo-->
    <div id="logo"><img src="<?php echo base_url()?>public/img/logo_radic.png" width="138" height="163" /></div>
<!--Fin logo-->

<!--BT_cerrar-->
    <div class="central_bt_cerrar"><a href="../home_back.html">cerrar</a></div>
<!--BT_cerrar-->


<!--inicio central-->
<div id="central">
   
	<!--inicio central cont--> 
	<div id="central_cont">
		<div id="central_grafico">

			<!--inicio titulo -->     
			<div id="titulo_grafico"> Temperatura | Gráfico</div>
			<!--fin titulo -->  

			<!--inicio grafico -->        
			<div id="embedl_grafico"><img src="../imagenes/grafico.png" width="347" height="300" /></div>
		</div>
		<!--fin grafico -->       

		<!--inicio menu central-->    
		<div id="central_menu">
			<div class="boxs_menu_temperatura"></div><!--Ignorra No borrar-->
			<div class="boxs_menu_temperatura"></div><!--Ignorra No borrar-->
			<div class="boxs_menu_temperatura"><a href="temperatura.html" title="Temperatura">ir</a></div>
			<div class="boxs_menu_humedad"><a href="humedad.html" title="Humedad">ir</a></div>
			<div class="boxs_menu_viento"><a href="viento.html" title="Viento">ir</a></div>
			<div class="boxs_menu_precipitacion"><a href="precipitacion.html" title="Precipitaciones">ir</a></div>
			<!--Fin menu central-->  
		</div>
		
		<div id="central_gps">

			<!--inicio titulo gps -->   
			<div id="titulo_gps">Temperatura | GPS A - B</div>
			<!--fin titulo gps -->   
 
			<!--inicio mapa gps -->        
			 <div id="embedl_gps"></div>
			<!--fin mapa gps --> 

		</div>
		<!--fin central pgs-->     

	</div>
	<!--fin central cont--> 

</div>
<!--Fin central-->

<!--Inicio top-->
<div id="top"></div>
<!--fin top-->
    
<!--Inicio foot-->    
<div id="foot"></div>
<!--Fin fooe-->

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
	    	zoom: 14,		    
		    center: last_position,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
	  	};

		map = new google.maps.Map(document.getElementById("embedl_gps"), mapOptions);

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