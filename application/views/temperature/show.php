
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
			<div id="embedl_grafico"></div>
		</div>
		<!--fin grafico -->       

		<!--inicio menu central-->    
		<div id="central_menu">
			<div class="boxs_menu_temperatura"></div><!--Ignorra No borrar-->
			<div class="boxs_menu_temperatura"></div><!--Ignorra No borrar-->
			<div class="boxs_menu_temperatura"><a href="#" title="Temperatura">ir</a></div>
			<div class="boxs_menu_humedad"><a href="<?php echo base_url()?>moisture/<?=$pcb_id?>" title="Humedad">ir</a></div>
			<div class="boxs_menu_viento"><a href="<?php echo base_url()?>wind_gauge/<?=$pcb_id?>" title="Viento">ir</a></div>
			<div class="boxs_menu_precipitacion"><a href="<?php echo base_url()?>rain_gauge/<?=$pcb_id?>" title="Precipitaciones">ir</a></div>
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

<script type="text/javascript" src="<?php echo base_url()?>public/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/highcharts-more.js"></script>


<script type="text/javascript">
	$(function () {
        $('#embedl_grafico').highcharts({
            title: {
                text: 'Temperatura',
                x: -20 //center
            },
            subtitle: {
                text: 'últimas 72 horas',
                x: -20
            },
            exporting: {
                  enabled: false
            },
            credits:{
                enabled: false
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
                    month: '%e. %b',
                    year: '%b'
                }
            },
            yAxis: {

                title: {
                    text: 'Temperatura °C'
                },
                min: 0,
                max: 200,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: true,
                        symbol: 'circle',
                        radius: 2
                    }
                }
            },
            series: [{
                name: 'T [°C]',
                data: [<?php echo implode($aTemp, ",");?>]          
            }]
        });
    });
</script>