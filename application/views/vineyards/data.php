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
          <div class="titulos_mod_chicos_pre">Humedad A</div>
          <div class="info_mod_chicos_pre">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H.  Ambiente</td>
                  <td width="15%" class="tittle_lluvia_2">Hr%:</td>
                  <td width="20%" class="tittle_lluvia_3" id="AM1">98</td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,5 mts)</td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="SM05_1">30.07</td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,01mts) </td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="SM001_1">20.3</td>
                </tr>
                <tr>
                  <td height="23" colspan="2" class="tittle_lluvia">Humect. en Hojas</td>
                  <td class="tittle_lluvia_2">Cbs:</td>
                  <td class="tittle_lluvia_3" id="LM1">4</td>
                </tr>
            </table>
          </div>
          <div class="link_mod_medio">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%">&nbsp;</td>
                <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="#">Gráfico/GPS</a></td>
                <td width="17%" class="link_graficogps_temp">&nbsp;</td>
              </tr>
            </table>
        </div>
      </div>
  <!--fin Humedad  ssensor A-->    
      
  <!--inicio Humedad sensor B-->     
      <div id="humedad_sb">
          <div class="titulos_mod_chicos_pre">Humedad  B</div>
          <div class="info_mod_chicos_pre">   
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H.  Ambiente</td>
                <td width="15%" class="tittle_lluvia_2">Hr%:</td>
                <td width="20%" class="tittle_lluvia_3" id="AM2">99</td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,5 mts)</td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="SM05_2">25.07</td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">H. Sub-suelo (0,01mts) </td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="SM001_2">65.3</td>
              </tr>
              <tr>
                <td height="23" colspan="2" class="tittle_lluvia">Humect. en Hojas</td>
                <td class="tittle_lluvia_2">Cbs:</td>
                <td class="tittle_lluvia_3" id="LM2">10.6</td>
              </tr>
            </table>          
        </div>
        <div class="link_mod_medio">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="#">Gráfico/GPS</a></td>
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
        <!--inicio modulo temperatura sensor a-->    
      <div class="modulos_chicos_a">
        <div class="titulos_mod_chicos">Temperatura A</div>
        <div class="info_mod_chicos" id="TM1">23 °C</div>
        <div class="link_mod_chicos">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="<?php echo base_url().'position/last_position/1' ?>">Gráfico/GPS</a></td>
              <td width="17%" class="link_graficogps_temp">&nbsp;</td>
            </tr>
          </table>
        </div>
      </div>
  <!--Fin modulo temperatura sensor a-->   

      
      <!--inicio modulo temperatura  sensor b-->      
      <div class="modulos_chicos_b">
        <div class="titulos_mod_chicos">Temperatura B</div>
        <div class="info_mod_chicos" id="TM2">22 °C</div>
        <div class="link_mod_chicos">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="#">Gráfico/GPS</a></td>
              <td width="17%" class="link_graficogps_temp">&nbsp;</td>
            </tr>
          </table>
        </div>
      </div>
  <!--Fin modulo temperatura  sensor b-->         
    </div>
  <!--Fin  Temperatura-->
   
  <!--Area Viento-->       
    <div id="lineados">
      <!--inicio modulo vel. viento sensor a-->          
      <div class="modulos_chicos_a">
        <div class="titulos_mod_chicos">Vel. Viento A</div>
        <div class="info_mod_chicos_viento" id="WG1">5m/s Sur</div>
        <div class="link_mod_chicos">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="grafmap/viento.html">Gráfico/GPS</a></td>
              <td width="17%" class="link_graficogps_temp">&nbsp;</td>
            </tr>
          </table>
        </div>
      </div>
  <!--Fin modulo vel. viento sensor a-->  


      <!--inicio modulo vel. viento sensor b-->     
      <div class="modulos_chicos_b">
        <div class="titulos_mod_chicos">Vel. Viento B</div>
        <div class="info_mod_chicos_viento" id="WG2">10m/s Sur</div>
        <div class="link_mod_chicos">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%">&nbsp;</td>
              <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="grafmap/viento.html">Gráfico/GPS</a></td>
              <td width="17%" class="link_graficogps_temp">&nbsp;</td>
            </tr>
          </table>
        </div>
      </div>
  <!--Fin modulo vel. viento sensor b-->  
    </div>
  <!--Fin Viento-->  

  <!--Area Precipitación-->        
      <div id="lineatres">     
      <!--inicio modulo Precipitación sensor a-->       
        <div class="modulos_chicos_a">
          <div class="titulos_mod_chicos">Precipitaciones A</div>
          <div class="info_mod_chicos_prec" id="RG1">1000 mm</div>
          <div class="link_mod_chicos">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%">&nbsp;</td>
                <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="grafmap/precipitacion.html">Gráfico/GPS</a></td>
                <td width="17%" class="link_graficogps_temp">&nbsp;</td>
              </tr>
            </table>
          </div>
        </div>
  <!--Fin modulo Precipitación sensor a-->        
        
  <!--inicio modulo Precipitación sensor b-->       
        <div class="modulos_chicos_b">
          <div class="titulos_mod_chicos">Precipitaciones B</div>
          <div class="info_mod_chicos_prec" id="RG2">1000 mm</div>
          <div class="link_mod_chicos">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%">&nbsp;</td>
                <td width="68%" align="center" valign="middle" class="link_graficogps_temp"><a href="grafmap/precipitacion.html">Gráfico/GPS</a></td>
                <td width="17%" class="link_graficogps_temp">&nbsp;</td>
              </tr>
            </table>
          </div>
        </div>
  <!--Fin modulo Precipitación sensor b-->       
       
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
        // console.log(data.pcb1.TM.value);
        $("#AM1").html(data.pcb1.AM.value);
        $("#AM2").html(data.pcb2.AM.value);
        $("#LM1").html(data.pcb1.LM.value);
        $("#LM2").html(data.pcb2.LM.value);
        $("#RG1").html(data.pcb1.RG.value + ' mm');
        $("#RG2").html(data.pcb2.RG.value + ' mm');
        $("#SM001_1").html(data.pcb1.SM001.value);
        $("#SM001_2").html(data.pcb2.SM001.value);
        $("#SM05_1").html(data.pcb1.SM05.value);
        $("#SM05_2").html(data.pcb2.SM05.value);
        $("#TM1").html(data.pcb1.TM.value + ' °C');
        $("#TM2").html(data.pcb2.TM.value + ' °C');
        $("#WG1").html(data.pcb1.WG.value + 'm/s Sur');
        $("#WG2").html(data.pcb2.WG.value + 'm/s Sur');
      });
    },1000);

</script>
