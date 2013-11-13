<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vineyards extends CI_Controller 
{	

	public function __construct()
	{
		parent::__construct();
        $this->layout->setLayout('layout');
	}
	
	public function index()
	{

		redirect('/vineyards/show/viña tu hermana');
	}

	public function show($vineyard_name)
	{

		$this->load->model('ambient_moisture_model');
		$this->load->model('leaves_moisture_model');
		$this->load->model('rain_gauge_model');
		$this->load->model('sensor_model');
		$this->load->model('subsoil_moisture_001_model');
		$this->load->model('subsoil_moisture_05_model');
		$this->load->model('temperature_model');
		$this->load->model('wind_gauge_model');
		$this->load->model('pcb_model');
		$this->load->model('vineyards_model');

		$vineyard_name =   urldecode($vineyard_name);
		$iVineyardId  = $this->vineyards_model->get_id_with_name($vineyard_name);
		$aPcbs = $this->pcb_model->get_pcb_with_vineyard($iVineyardId);
		$aData = array();
		$aMoisture = array();

		foreach ($aPcbs as $pcb) {
			$aSensors = $this->sensor_model->get_sensors_with_pcb($pcb['id']);
			foreach ($aSensors as $sensor) {
			 	if($sensor['type'] == 'AM'){

			 		$aAmbient = $this->ambient_moisture_model->get_last_ambient($sensor['id']);
			 		$aAmbient['identifier'] = $sensor['identifier'];
			 		$aMoisture[$pcb['identifier']][$sensor['type']] =  $aAmbient;
			 	}
			 	elseif($sensor['type'] == 'LM') {
			 		$aLeaves = $this->leaves_moisture_model->get_last_leaves($sensor['id']);
			 		$aLeaves['identifier'] = $sensor['identifier'];
			 		$aMoisture[$pcb['identifier']][$sensor['type']] =  $aLeaves;
			 	}
			 	elseif($sensor['type'] == 'RG') {
			 		$aRain = $this->rain_gauge_model->get_last_rain($sensor['id']);
			 		$aRain['pcb_id'] = $pcb['id'];
			 		$aData[$sensor['type']][$sensor['identifier']] =  $aRain;
			 	}
			 	elseif($sensor['type'] == 'SM001') {
			 		$aSM001 = $this->subsoil_moisture_001_model->get_last_subsoil($sensor['id']);
			 		$aSM001['identifier'] = $sensor['identifier'];
			 		$aMoisture[$pcb['identifier']][$sensor['type']] =  $aSM001;
			 	}
			 	elseif($sensor['type'] == 'SM05') {
			 		$aSM05 = $this->subsoil_moisture_05_model->get_last_subsoil($sensor['id']);
			 		$aSM05['identifier'] = $sensor['identifier'];
			 		$aMoisture[$pcb['identifier']][$sensor['type']] =  $aSM05;
			 	}
			 	elseif($sensor['type'] == 'WG') {
			 		$aWind = $this->wind_gauge_model->get_last_wind($sensor['id']);
			 		$aWind['pcb_id'] = $pcb['id'];
			 		$aData[$sensor['type']][$sensor['identifier']] =  $aWind;
			 	}
			 	elseif($sensor['type'] == 'TM') {
			 		$aTemp = $this->temperature_model->get_last_temperature($sensor['id']);
			 		$aTemp['pcb_id'] = $pcb['id'];
			 		$aData[$sensor['type']][$sensor['identifier']] =  $aTemp;
			 	}
			 } 
		}

		$this->layout->css(array(base_url().'public/css/estilo.css', base_url().'public/css/google_family_gudea.css',base_url().'public/css/home.css'));
		$this->layout->setTitle('Monitor de Viñas | Inicio');
		$this->layout->view('show', compact('vineyard_name','aData', 'aMoisture'));
	}

	public function data($sVineyardName)
	{
		$sVineyardName =   urldecode($sVineyardName);
		$this->layout->css(array(base_url().'public/css/estilo.css', base_url().'public/css/google_family_gudea.css',base_url().'public/css/home_back.css'));
		$this->layout->view('data', compact('sVineyardName'));
	}

	public function ajax_data_view($sVineyardName)
	{		
		if (!file_exists('application/views/vineyards/ajax_data_view.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('ambient_moisture_model');
		$this->load->model('leaves_moisture_model');
		$this->load->model('rain_gauge_model');
		$this->load->model('sensor_model');
		$this->load->model('subsoil_moisture_001_model');
		$this->load->model('subsoil_moisture_05_model');
		$this->load->model('temperature_model');
		$this->load->model('wind_gauge_model');
		$this->load->model('pcb_model');
		$this->load->model('vineyards_model');

		$sVineyardName =   urldecode($sVineyardName);
		$iVineyardId  = $this->vineyards_model->get_id_with_name($sVineyardName);
		$aPcbs = $this->pcb_model->get_pcb_with_vineyard($iVineyardId);
		$aData = array();
		$aPcbName = array();

		foreach ($aPcbs as $pcb)
		{
			$aSensors = $this->sensor_model->get_sensors_with_pcb($pcb['id']);
			array_push($aPcbName,$pcb['identifier']);
			foreach ($aSensors as $sensor)
			{
				if($sensor['type'] == 'AM'){
			 		$aAmbient = $this->ambient_moisture_model->get_last_ambient($sensor['id']);
			 		$aAmbient['identifier'] = $sensor['identifier'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aAmbient;
			 	}
			 	elseif($sensor['type'] == 'LM') {
			 		$aLeaves = $this->leaves_moisture_model->get_last_leaves($sensor['id']);
			 		$aLeaves['identifier'] = $sensor['identifier'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aLeaves;
			 	}
			 	elseif($sensor['type'] == 'RG') {
			 		$aRain = $this->rain_gauge_model->get_last_rain($sensor['id']);
			 		$aRain['pcb_id'] = $pcb['id'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aRain;
			 	}
			 	elseif($sensor['type'] == 'SM001') {
			 		$aSM001 = $this->subsoil_moisture_001_model->get_last_subsoil($sensor['id']);
			 		$aSM001['identifier'] = $sensor['identifier'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aSM001;
			 	}
			 	elseif($sensor['type'] == 'SM05') {
			 		$aSM05 = $this->subsoil_moisture_05_model->get_last_subsoil($sensor['id']);
			 		$aSM05['identifier'] = $sensor['identifier'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aSM05;
			 	}
			 	elseif($sensor['type'] == 'WG') {
			 		$aWind = $this->wind_gauge_model->get_last_wind($sensor['id']);
			 		$aWind['pcb_id'] = $pcb['id'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aWind;
			 	}
			 	elseif($sensor['type'] == 'TM') {
			 		$aTemp = $this->temperature_model->get_last_temperature($sensor['id']);
			 		$aTemp['pcb_id'] = $pcb['id'];
			 		$aData[$pcb['identifier']][$sensor['type']] =  $aTemp;
			 	}

			}
		}

		$this->layout->setLayout('ajax_layout');
		$this->layout->view('ajax_data_view', compact('sVineyardName','aData','aPcbName'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */