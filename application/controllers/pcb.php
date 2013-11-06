<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pcb extends CI_Controller 
{	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pcb_model');
		$this->load->model('position_model');
		$this->load->model('temperature_model');
        $this->layout->setLayout('layout');
	}
	
	public function index($pcb_id = 1)
	{
		$this->load->model('alarm_event_model');	
		// print_r($aAlarmsEvents);
		$aPos = $this->position_model->get_last_positions($pcb_id,1);
		$aTemp = $this->temperature_model->get_last_temperatures($pcb_id);
		$aAlarmsEvents = $this->alarm_event_model->get_all_alarm();
		$this->layout->view('index',compact('aPos','aTemp','aAlarmsEvents'));
	}

	public function get_data_gprs()
	{
		// i_AM = sensor identifier ambient moisture
		// i_LM = sensor identifier leaves moisture
		// i_RG = sensor identifier rain gauge
		// i_SM001 = sensor identifier subsoil moisture 001
		// i_SM05 = sensor identifier subsoil moisture 05
		// i_TM = sensor identifier temperature
		// i_WG = sensor identifier wind gauge

		/* /pcb/get_data_gprs/i_PCB/i_AM/value_AM/i_LM/value_LM/i_RG/value_RG/i_SM001/value_SM001/i_SM05/value_SM05/i_TM/value_TM/i_WG/value_WG/lat/long/battery   */
		$sPcbIdent = $this->uri->segment(3,0);
		$sAmbientMoisIden= $this->uri->segment(4,0);
		$iAmbientMoisValue = $this->uri->segment(5,0);
		$sLeavesMoisIden= $this->uri->segment(6,0);
		$iLeavesMoisValue = $this->uri->segment(7,0);
		$sRainGaugeIden= $this->uri->segment(8,0);
		$iRainGaugeValue = $this->uri->segment(9,0);
		$sSubsoil001Iden= $this->uri->segment(10,0);
		$iSubsoil001Value = $this->uri->segment(11,0);

		$sSubsoil05Iden= $this->uri->segment(12,0);
		$iSubsoil05Value = $this->uri->segment(13,0);
		$sTempIden= $this->uri->segment(14,0);
		$iTempValue = $this->uri->segment(15,0);
		$sWindGaugeIden= $this->uri->segment(16,0);
		$iWindGaugeValue = $this->uri->segment(17,0);
		$iLatitude = $this->uri->segment(18,0);
		$iLongitude = $this->uri->segment(19,0);
		$iBattery = $this->uri->segment(20,0);

	}

	public function trending($pcb_id)
	{
		$this->load->model('sensor_model');
		$aSensorId = $this->sensor_model->get_sensors_with_pcb($pcb_id);
		$aTemp = $this->pcb_model->get_trending_temperature($pcb_id);
		$aData1 = array();
		$aData2 = array();
		foreach ($aTemp as $temp) {
			if($temp['sensor_id'] == $aSensorId[0]['id'] ){
				$aData1[] = "[".(mktime(date("H", strtotime($temp['created_at']))-4, date("i", strtotime($temp['created_at'])), date("s", strtotime($temp['created_at'])), date("m", strtotime($temp['created_at'])), date("d", strtotime($temp['created_at'])), date("Y", strtotime($temp['created_at'])))*1000).",".$temp['t_value']."]";
				$strIdentifier1 = $temp['sensor_identifier'];
			}
			if($temp['sensor_id'] == $aSensorId[1]['id'] ){
				$aData2[] = "[".(mktime(date("H", strtotime($temp['created_at']))-4, date("i", strtotime($temp['created_at'])), date("s", strtotime($temp['created_at'])), date("m", strtotime($temp['created_at'])), date("d", strtotime($temp['created_at'])), date("Y", strtotime($temp['created_at'])))*1000).",".$temp['t_value']."]";
				$strIdentifier2 = $temp['sensor_identifier'];
			}
		}		
		$aPos = $this->position_model->get_last_positions($pcb_id,1);
		$aTemp = $this->temperature_model->get_last_temperatures($pcb_id);
		$aHeater = $this->pcb_model->get_sensor_heater_with_pcb($pcb_id);
		$this->layout->view('trending', compact('aData1','aData2','strIdentifier1', 'strIdentifier2','aPos','aTemp','aHeater'));
	}

	public function view($iPcbId)
	{
		if (!file_exists('application/views/pcb/view.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		//si trata de ver la posicion de un pcb que no registra posiciones
		if ($this->position_model->exist_pcbid($iPcbId) === false)
		{
			show_error('No se registran posiciones para este pcb');
		}

        $aData['pos'] = $this->position_model->get_last_positions($iPcbId,1);
        $aData['temp'] = $this->temperature_model->get_last_temperatures($iPcbId);
        $aData['heater'] = $this->pcb_model->get_sensor_heater_with_pcb($iPcbId);
		$this->layout->view('view', $aData);
	}

	public function ajax_refresh_heater_status($pcb_id)
	{
		$this->layout->setLayout('ajax_layout');
		$aData = $this->pcb_model->get_sensor_heater_with_pcb($pcb_id);
		$this->layout->view('ajax_refresh_heater_status', compact('aData'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */