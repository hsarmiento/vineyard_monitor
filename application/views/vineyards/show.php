<?php
	$aKey = array_keys($aMoisture);
	// print_r($aKey);
?> 

<div id="logo"><img src="<?php echo base_url()?>public/img/logo_radic.png" width="138" height="163" /></div>
<!--Fin logo-->

<!--area info viento-->
<div id="info_box_viento">
    <div id="title_viento">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
			    <td width="23%" height="16" align="center" valign="bottom">&nbsp;</td>
			    <td width="48%" align="center" valign="bottom">Velocidad Viento</td>
			    <td width="29%" align="center" valign="bottom">&nbsp;</td>
		    </tr>
		    <tr>
		    	<td height="15" align="center" valign="bottom">Sensor A</td>
	    	 	<td align="center" valign="bottom">&nbsp;</td>
	    	 	<!-- <td height="15" align="center" valign="bottom">Sensor B</td> -->
	    	 	<!-- <td height="15" align="center" valign="bottom"><?=$aKey[0]?></td>
	    	 	<td align="center" valign="bottom">&nbsp;</td> -->
	    	 	<td height="15" align="center" valign="bottom"><?=$aKey[1]?></td>
		    </tr>
	    </table>
	</div>

    <table width="100%" height="51" border="0" cellpadding="0" cellspacing="0">
	    <tr>
	    	<?php
	    	 foreach ($aData['WG'] as $data) { ?>
	    	 	<td width="47%" align="center" valign="middle" id="<?php echo $data['sensor_type'].$data['sensor_id']; ?>"><?=$data['value']?>km/h <?=$data['direction']?></td> 	    	
	    	 	<?php 
	    		}
	    	?>
		    <!-- <td width="46%" align="center" valign="middle">1 mm</td>
		    <td width="47%" align="center" valign="middle">2 mm</td> -->
		    <td width="7%" align="center" valign="middle">&nbsp;</td>
	    </tr>
    </table>
</div>
<!--fin info viento-->

<!--area info temperatura-->
<div id="info_box_temperatura">
	<div id="title_temperatura">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="34%" height="16" align="center" valign="bottom">&nbsp;</td>
				<td width="32%" align="center" valign="bottom">Temp. Ambiente</td>
				<td width="34%" align="center" valign="bottom">&nbsp;</td>
			</tr>
			<tr>
				<td height="15" align="center" valign="bottom">Sensor A</td>
	    	 	<td align="center" valign="bottom">&nbsp;</td>
	    	 	<!-- <td height="15" align="center" valign="bottom">Sensor B</td> -->
	    	 	<!-- <td height="15" align="center" valign="bottom"><?=$aKey[0]?></td>
	    	 	<td align="center" valign="bottom">&nbsp;</td> -->
	    	 	<td height="15" align="center" valign="bottom"><?=$aKey[1]?></td>
	    	 		    	
			</tr>
		</table>
	</div>

	<table width="100%" height="51" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<?php
		    	 foreach ($aData['TM'] as $key => $data) { ?>
		    	 	<td width="46%" align="center" valign="middle" id="<?php echo $data['sensor_type'].$data['sensor_id']; ?>"><?=$data['value']?>°C</td>    	
		    	 	<?php 
		    		}
	    	?>
			<td width="7%" align="center" valign="middle">&nbsp;</td>
		</tr>
	</table>
</div>
<!--fin info temperatura-->

<!--area info humedad-->
<div id="info_box_humedad">
    <div id="title_lluvia">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
			    <td width="15%" height="15" align="center" valign="bottom">&nbsp;</td>
			    <td width="54%" align="center" valign="bottom"><div align="left">Humedad </div></td>
			    <td width="31%" align="center" valign="bottom">&nbsp;</td>
		    </tr>
		    <tr>
			    <td align="center" valign="bottom">&nbsp;</td>
			    <td align="center" valign="bottom">&nbsp;</td>
			    <td align="center" valign="bottom">
			    	<div align="left">
					    <table width="55" border="0" cellspacing="4" cellpadding="2">
					    <tr>   
					    	<td align="center" valign="middle" bgcolor="#666666" class="link_a"><a href="#">A</a></td>
						    <!-- <td align="center" valign="middle" bgcolor="#666666" class="link_b"><a href="#">B</a></td>	 -->
						    <!-- <td align="center" valign="middle" bgcolor="#666666" class="link_a"><a href="#"><?=$aKey[0]?></a></td> -->
						    <td align="center" valign="middle" bgcolor="#666666" class="link_b"><a href="#"><?=$aKey[1]?></a></td>
					    </tr>
					    </table>
			    	</div>
			    </td>
		    </tr>
	    </table>
    </div>
    
<!--inicio desplegables A-B humedad-->
    <div id="a_humedad">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    		<tr>
	    			<td width="74%"> <span class="bold_humedad">A</span> - Humedad Ambiente</td>
				    <!-- <td width="74%"> <span class="bold_humedad"><?=$aKey[0]?></span> - Humedad Ambiente</td> -->
				    <td width="13%">H%:</td>
				    <td width="13%" class="bold_humedad" id="<?php echo $aMoisture[$aKey[0]]['AM']['sensor_type'].$aMoisture[$aKey[0]]['AM']['sensor_id']; ?>"><?=$aMoisture[$aKey[0]]['AM']['value']?></td>
		    	</tr>
		    	<tr>
		    		<td><span class="bold_humedad">A</span> -  Humedad Sub-suelo (0,6 mts) </td>
				    <!-- <td><span class="bold_humedad"><?=$aKey[0]?></span> -  Humedad Sub-suelo (0,5 mts) </td> -->
				    <td>H%:</td>
				    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[0]]['SM05']['sensor_type'].$aMoisture[$aKey[0]]['SM05']['sensor_id']; ?>"><?=$aMoisture[$aKey[0]]['SM05']['value']?></td>
		    	</tr>
		    	<tr>
		    		<td><span class="bold_humedad">A</span> -  Humedad Sub-suelo (0,3mts) </td>
				    <!-- <td><span class="bold_humedad"><?=$aKey[0]?></span> -  Humedad Sub-suelo (0,01mts) </td> -->
				    <td>H%:</td>
				    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[0]]['SM001']['sensor_type'].$aMoisture[$aKey[0]]['SM001']['sensor_id']; ?>"><?=$aMoisture[$aKey[0]]['SM001']['value']?></td>
		    	</tr>
		    	<tr>
		    		<td><span class="bold_humedad">A</span> -  Humectación en Hojas</td>
				    <!-- <td><span class="bold_humedad"><?=$aKey[0]?></span> -  Humectación en Hojas</td> -->
				    <td>H%</td>
				    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[0]]['LM']['sensor_type'].$aMoisture[$aKey[0]]['LM']['sensor_id']; ?>"><?=$aMoisture[$aKey[0]]['LM']['value']?></td>
		    	</tr>	    
	    </table>

    </div>
	    
	    
    <div id="b_humedad">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		    	<!-- <td width="74%"> <span class="bold_humedad">B</span> - Humedad Ambiente</td> -->
			    <td width="74%"> <span class="bold_humedad"><?=$aKey[1]?></span> - Humedad Ambiente</td>
			    <td width="13%">H%</td>
			    <td width="13%" class="bold_humedad" id="<?php echo $aMoisture[$aKey[1]]['AM']['sensor_type'].$aMoisture[$aKey[1]]['AM']['sensor_id']; ?>"><?=$aMoisture[$aKey[1]]['AM']['value']?></td>
		    </tr>
		    <tr>
		    	<!-- <td><span class="bold_humedad">B</span> -  Humedad Sub-suelo (0,6 mts) </td> -->
			    <td><span class="bold_humedad"><?=$aKey[1]?></span> -  Humedad Sub-suelo (0,6 mts) </td> 
			    <td>H%</td>
			    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[1]]['SM05']['sensor_type'].$aMoisture[$aKey[1]]['SM05']['sensor_id']; ?>"><?=$aMoisture[$aKey[1]]['SM05']['value']?></td>
		    </tr>
		    <tr>
		    	<!-- <td><span class="bold_humedad">B</span> -  Humedad Sub-suelo (0,3mts) </td> -->
			    <td><span class="bold_humedad"><?=$aKey[1]?></span> -  Humedad Sub-suelo (0,3mts) </td> 
			    <td>H%</td>
			    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[1]]['SM001']['sensor_type'].$aMoisture[$aKey[1]]['SM001']['sensor_id']; ?>"><?=$aMoisture[$aKey[1]]['SM001']['value']?></td>
		    </tr>
		    <tr>
		    	<!-- <td><span class="bold_humedad">B</span> -  Humectación en Hojas</td> -->
			    <td><span class="bold_humedad"><?=$aKey[1]?></span> -  Humectación en Hojas</td>
			    <td>H%</td>
			    <td class="bold_humedad" id="<?php echo $aMoisture[$aKey[1]]['LM']['sensor_type'].$aMoisture[$aKey[1]]['LM']['sensor_id']; ?>"><?=$aMoisture[$aKey[1]]['LM']['value']?></td>
		    </tr>
	    </table>
    </div>
	<!--fin desplegables A-B humedad-->
</div>
<!--Fin info humedad-->



<!--area info lluvia-->
<div id="info_box_lluvia">
	<div id="title_lluvia">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="34%" height="17" align="center" valign="bottom">&nbsp;</td>
				<td width="32%" align="center" valign="bottom">Precipitaciones</td>
				<td width="34%" align="center" valign="bottom">&nbsp;</td>
			</tr>
			<tr>
				<td align="center" valign="bottom">Sensor A</td>
	    	 	<td align="center" valign="bottom">&nbsp;</td> 
	    	 	<!-- <td align="center" valign="bottom">Sensor B</td> -->
	    	 	<!-- <td align="center" valign="bottom"><?=$aKey[0]?></td>
	    	 	<td align="center" valign="bottom">&nbsp;</td>  -->
	    	 	<td align="center" valign="bottom"><?=$aKey[1]?></td>
	    	 		
			</tr>
		</table>
	</div>
	<table width="100%" height="51" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<?php
		    	 foreach ($aData['RG'] as $key => $data) { ?>
		    	 	<td width="52%" align="center" valign="middle" id="<?php echo $data['sensor_type'].$data['sensor_id']; ?>"><?=$data['value']?>mm</td> 	
		    	 	<?php 
		    		}
	    		?>
			<td width="7%" align="center" valign="middle">&nbsp;</td>
		</tr>
	</table>
</div>
<!--fin info lluviaa-->



<!--Inicio Central-->
<div id="central">
    <div id="cont_bg">   
	<!--Inicio box buttons-->
	    <div id="box_buttons">
		    <div class="buttons_2"></div>
		    <div class="buttons"><a href="#">item</a></div>
		    <div class="buttons_2"></div>
		    <div class="buttons_temperatura"><a href="#">item</a></div>
		    <div class="buttons_full"><a href="<?php echo base_url()?>vineyards/data/<?=$vineyard_name?>">item</a></div>
		    <div class="buttons_lluvia"><a href="#">item</a></div>
		    <div class="buttons_2"></div>
		    <div class="buttons_viento"><a href="#">item</a></div>
		    <div class="buttons_2"></div> 
	    </div>
		<!--Fin box buttons-->
    </div>
	<!--Fin cont_bg--> 
</div>
<!--Fin Central-->

<!--Inicio top-->
<div id="top"></div>
<!--fin top-->
    
<!--Inicio foot-->    
<div id="foot"></div>
<!--Fin fooe-->


<script type="text/javascript">
	$(function(){
		$('#news-container').vTicker({ 
			speed: 500,
			pause: 3000,
			animation: 'fade',
			mousePause: false,
			showItems: 3
		});
	});

    $(document).on("ready", function (){

	    $('.buttons_temperatura').click(function(){
		$('#info_box_temperatura').delay(500).fadeToggle();
		});
		

	    $('.buttons_lluvia').click(function(){
		$('#info_box_lluvia').delay(500).fadeToggle();
		});
		
	
		$('.buttons_viento').click(function(){
		$('#info_box_viento').delay(500).fadeToggle();
		});
		
		$('.buttons').click(function(){
		$('#info_box_humedad').delay(500).fadeToggle();
		});
		
		$('#central_full').delay(500).fadeToggle();
		
		$('.central_bt_cerrar').click(function(){
		$('#central_full').fadeOut();
        });
		
		$('.link_a').click(function(){
		$('#a_humedad').delay(500).fadeToggle();
		$('#b_humedad').fadeOut();
		});
	
	    $('.link_b').click(function(){
		$('#b_humedad').delay(500).fadeToggle();
		$('#a_humedad').fadeOut();
		});
		
		
        });

    setInterval(function(){
      $.ajax({
        url: "<?php echo base_url();?>vineyards/ajax_data_view/<?php echo $vineyard_name;?>",
        dataType: 'json',
        cache: false
      }).done(function(data){
        // console.log(data[0]['value']);
        for (var i = 0; i < data.length; i++)
        {
        	if (data[i]['sensor_type'] == 'WG')
        	{
        		$("#"+data[i]['sensor_type']+data[i]['sensor_id']).html(data[i]['value']+'km/h '+data[i]['direction']);
        	}
        	if (data[i]['sensor_type'] == 'RG')
        	{
        		$("#"+data[i]['sensor_type']+data[i]['sensor_id']).html(data[i]['value']+' mm');
        	}
        	if (data[i]['sensor_type'] == 'TM')
        	{
        		$("#"+data[i]['sensor_type']+data[i]['sensor_id']).html(data[i]['value']+' °C');
        	}
        	if (data[i]['sensor_type'] == 'AM' || data[i]['sensor_type'] == 'LM' || data[i]['sensor_type'] == 'SM001' || data[i]['sensor_type'] == 'SM05')
        	{
        		$("#"+data[i]['sensor_type']+data[i]['sensor_id']).html(data[i]['value']);
        	}
        }
      });
    },1000);

</script>


<?php 
// echo '<pre>';
// print_r($aData);
// print_r($aMoisture);
// echo '</pre>';
?>