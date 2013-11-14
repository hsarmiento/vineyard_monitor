<?php
$aKey = array_keys($aMoisture);

// echo '<pre>';
// print_r($aMoisture);
// echo '</pre>';
?> 

<!--logo-->
<div id="logo"><img src="<?php echo base_url()?>public/img/logo_radic.png" width="138" height="163" /></div>
<!--Fin logo-->

<!--Area info Central Full-->
<div id="central_full">
  <div id="central_modulos">
  <!--inicio_bloque_right-->    
    <div id="bloque_right"> 
  <!--inicio linea uno-->     
      <div id="bloque_right_l1">
  <!--inicio Humedad sensor A-->      
        <div id="humedad_sa">
          <div class="titulos_mod_chicos_pre">Humedad <?=$aKey[0]?></div>
          <div class="info_mod_chicos_pre">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H.  Ambiente</td>
                  <td width="15%" class="tittle_lluvia_2">Hr%:</td>
                  <td width="20%" class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[0]]['AM']['sensor_type'].$aMoisture[$aKey[0]]['AM']['sensor_id']?>"><?=$aMoisture[$aKey[0]]['AM']['value']?></td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,5 mts)</td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[0]]['SM05']['sensor_type'].$aMoisture[$aKey[0]]['SM05']['sensor_id']?>"><?=$aMoisture[$aKey[0]]['SM05']['value']?></td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,01mts) </td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[0]]['SM001']['sensor_type'].$aMoisture[$aKey[0]]['SM001']['sensor_id']?>"><?=$aMoisture[$aKey[0]]['SM001']['value']?></td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">Humect. en Hojas</td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[0]]['LM']['sensor_type'].$aMoisture[$aKey[0]]['LM']['sensor_id']?>"><?=$aMoisture[$aKey[0]]['LM']['value']?></td>
                </tr>
            </table>
          </div>
          <div class="link_mod_medio">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%">&nbsp;</td>
                <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>moisture/show/<?=$sVineyardName;?>/<?=$aMoisture[$aKey[0]]['LM']['pcb_id']?>">Gráfico/GPS</a></td>
                <td width="17%" class="link_graficogps_temp">&nbsp;</td>
              </tr>
            </table>
        </div>
      </div>
  <!--fin Humedad  ssensor A-->    
      
  <!--inicio Humedad sensor B-->     
      <div id="humedad_sb">
          <div class="titulos_mod_chicos_pre">Humedad  <?=$aKey[1]?></div>
          <div class="info_mod_chicos_pre">   
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H.  Ambiente</td>
                <td width="15%" class="tittle_lluvia_2">Hr%:</td>
                <td width="20%" class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[1]]['AM']['sensor_type'].$aMoisture[$aKey[1]]['AM']['sensor_id']?>"><?=$aMoisture[$aKey[1]]['AM']['value']?></td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,5 mts)</td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[1]]['SM05']['sensor_type'].$aMoisture[$aKey[1]]['SM05']['sensor_id']?>"><?=$aMoisture[$aKey[1]]['SM05']['value']?></td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,01mts) </td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[1]]['SM001']['sensor_type'].$aMoisture[$aKey[1]]['SM001']['sensor_id']?>"><?=$aMoisture[$aKey[1]]['SM001']['value']?></td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">Humect. en Hojas</td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="<?=$aMoisture[$aKey[1]]['LM']['sensor_type'].$aMoisture[$aKey[1]]['LM']['sensor_id']?>"><?=$aMoisture[$aKey[1]]['LM']['value']?></td>
              </tr>
            </table>          
        </div>
        <div class="link_mod_medio">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>moisture/show/<?=$sVineyardName;?>/<?=$aMoisture[$aKey[1]]['LM']['pcb_id']?>">Gráfico/GPS</a></td>
              <td width="17%" class="link_graficogps_temp">&nbsp;</td>
            </tr>
            </table>
        </div>  
      </div>
  <!--fin Humedad  sensor B-->      
    </div>
  <!--fin linea uno-->    
      
  <!--inicio linea dos-->    
    <div id="bloque_right_l2">
        <div class="titulos_mod_chicos_eventos">Eventos </div>
        <div class="info_mod_chicos_eventos">    
          <!--lista de Eventos-->      
          <div id="news-container">
      	     <ul>
                <li><div>Concepción | 17 Agosto | 2013 |  05:70 AM hrs. | Evento...</div></li> 
                <li><div>Santiago | 16 Agosto | 2013 |  14:30 PM hrs. | Evento...</div></li> 
            	<li><div>Calama | 15 Agosto | 2013 |  15:30 PM hrs. | Evento...</div></li>   
            	<li><div>Pto. Montt | 14 Agosto | 2013 |  04:50 PM hrs. | Evento...</div></li>
                <li><div>Talca | 17 Agosto | 2013 |  05:70 AM hrs. | Evento...</div></li> 
                <li><div>Linares | 16 Agosto | 2013 |  14:30 PM hrs. | Evento...</div></li> 
            	<li><div>Calama | 15 Agosto | 2013 |  15:30 PM hrs. | Evento...</div></li>   
            	<li><div>Chillán | 14 Agosto | 2013 |  04:50 PM hrs. | Evento...</div></li>
      	     </ul>
          </div>
      <!--Fin lista de Eventos-->      
        </div>
    </div>
  <!--fin linea dos-->     
    </div>
  <!--fin_bloque_right-->   
      
      
  <!--Area Temperatura-->    
    <div id="lineauno">    
       
      <?php
        $i = 0;
        foreach ($aData['TM'] as $key => $value) { 
          if($i%2==0){ ?>
             <!--inicio modulo temperatura sensor a-->
              <div class="modulos_chicos_a">
                <div class="titulos_mod_chicos">Temperatura A</div>
                <div class="info_mod_chicos" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?> °C</div>
                <div class="link_mod_chicos">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">&nbsp;</td>
                      <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>temperature/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                      <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                    </tr>
                  </table>
                </div>
              </div>
               <!--Fin modulo temperatura sensor a-->
          <?php 
           }else{ ?>
              <!--inicio modulo temperatura  sensor b-->      
              <div class="modulos_chicos_b">
                <div class="titulos_mod_chicos">Temperatura B</div>
                <div class="info_mod_chicos" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?> °C</div>
                <div class="link_mod_chicos">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">&nbsp;</td>
                      <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>temperature/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                      <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                    </tr>
                  </table>
                </div>
              </div>
          <!--Fin modulo temperatura  sensor b--> 
          <?php } ?>       
      <?php $i = $i+1;}  ?>             
    </div>
  <!--Fin  Temperatura-->
   
  <!--Area Viento-->       
    <div id="lineados">
      <?php
        $i = 0;
        foreach ($aData['WG'] as $key => $value) { 
          if($i%2==0){ ?>
            <!--inicio modulo vel. viento sensor a-->          
            <div class="modulos_chicos_a">
              <div class="titulos_mod_chicos">Vel. Viento A</div>
              <div class="info_mod_chicos_viento" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?>m/s Sur</div>
              <div class="link_mod_chicos">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15%">&nbsp;</td>
                    <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>wind_gauge/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                    <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                  </tr>
                </table>
              </div>
            </div>
        <!--Fin modulo vel. viento sensor a-->  
      <?php 
           }else{ ?>
            <!--inicio modulo vel. viento sensor b-->     
            <div class="modulos_chicos_b">
              <div class="titulos_mod_chicos">Vel. Viento B</div>
              <div class="info_mod_chicos_viento" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?>m/s Sur</div>
              <div class="link_mod_chicos">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15%">&nbsp;</td>
                    <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>wind_gauge/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                    <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                  </tr>
                </table>
              </div>
            </div>
        <!--Fin modulo vel. viento sensor b--> 
        <?php } ?>       
      <?php $i = $i+1;}  ?>  
    </div>
  <!--Fin Viento-->  

  <!--Area Precipitación-->        
      <div id="lineatres">
      <?php
        $i = 0;
        foreach ($aData['RG'] as $key => $value) { 
          if($i%2==0){ ?>     
            <!--inicio modulo Precipitación sensor a-->       
              <div class="modulos_chicos_a">
                <div class="titulos_mod_chicos">Precipitaciones A</div>
                <div class="info_mod_chicos_prec" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?> mm</div>
                <div class="link_mod_chicos">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">&nbsp;</td>
                      <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>rain_gauge/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                      <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                    </tr>
                  </table>
                </div>
              </div>
        <!--Fin modulo Precipitación sensor a-->    
        <?php 
           }else{ ?>    
          <!--inicio modulo Precipitación sensor b-->       
                <div class="modulos_chicos_b">
                  <div class="titulos_mod_chicos">Precipitaciones B</div>
                  <div class="info_mod_chicos_prec" id="<?=$value['sensor_type'].$value['sensor_id']?>"><?=$value['value']?> mm</div>
                  <div class="link_mod_chicos">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="15%">&nbsp;</td>
                        <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url()?>rain_gauge/show/<?=$sVineyardName;?>/<?=$value['pcb_id']?>">Gráfico/GPS</a></td>
                        <td width="17%" class="link_graficogps_temp">&nbsp;</td>
                      </tr>
                    </table>
                  </div>
                </div>
          <!--Fin modulo Precipitación sensor b-->       
          <?php } ?>       
        <?php $i = $i+1;}  ?> 
      </div>
  <!--Fin Precipitación-->      
  </div>
  <!--Fin Central Modulos-->      
        
  <!--BT_cerrar-->
  <div class="central_bt_cerrar"><a href="<?php echo base_url()?>vineyards/show/<?php echo $sVineyardName;?>">cerrar</a></div>
  <!--BT_cerrar-->

</div>
<!--fin  info viento-->


<!--Inicio Central-->
<div id="central">
  <div id="cont_bg">   
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
    
    // $('#central_full').delay(500).fadeToggle();
    
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
        url: "<?php echo base_url();?>vineyards/ajax_data_view/<?php echo $sVineyardName;?>",
        dataType: 'json',
        cache: false
      }).done(function(data){
        // console.log(data[0]['value']);
        for (var i = 0; i < data.length; i++)
        {
          if (data[i]['sensor_type'] == 'WG')
          {
            $("#"+data[i]['sensor_type']+data[i]['sensor_id']).html(data[i]['value']+' m/s Sur');
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