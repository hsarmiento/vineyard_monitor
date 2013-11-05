<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temperature extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
        $this->layout->setLayout('layout');
        $this->load->model('temperature_model');
	}
	
	public function index()
	{
		$this->layout->view('index');
	}

	public function save_temperature_value()
	{
		/* /temperature/function/sensor_identifier1/value1/sensor_identifier2/value2/pcb_id/latitude/longitude/battery */
		$this->load->model('position_model');
		$this->load->model('alarm_event_model');
		$this->load->model('sensor_model');
		$this->load->model('pcb_model');
		$this->load->model('heater_model');
		$iSensorIdentifier1 = $this->uri->segment(3,0);
		$iValue1 = $this->uri->segment(4,0);
		$iSensorIdentifier2 = $this->uri->segment(5,0);
		$iValue2 = $this->uri->segment(6,0);
		$iPcbIdentifier = $this->uri->segment(7,0);
		$fLatitude = $this->uri->segment(8,0);
		$fLongitude = $this->uri->segment(9,0);
		$iSensorId1 = $this->sensor_model->get_sensor_id_with_identifier($iSensorIdentifier1);
		$iSensorId2 = $this->sensor_model->get_sensor_id_with_identifier($iSensorIdentifier2);
		$iPcbId = $this->pcb_model->get_pcb_id_with_identifier($iPcbIdentifier);

		$this->temperature_model->initialize($iSensorId1,$iValue1);
		$this->temperature_model->save_temperature_value();
		$this->temperature_model->initialize($iSensorId2,$iValue2);
		$this->temperature_model->save_temperature_value();
		$this->position_model->initialize($iPcbId,$fLatitude, $fLongitude);
		$this->position_model->save_position();

		if($this->temperature_model->check_turn_on_one_hour($iSensorId2,$iValue2)){
			if($this->heater_model->check_heater_status($iSensorId2) == 0){
				$this->heater_model->initialize($iSensorId2,1,NULL);
				$this->heater_model->save_heater_status();
			}
		}

		else if($this->temperature_model->check_turn_off_one_hour($iSensorId2,$iValue2)){
			if($this->heater_model->check_heater_status($iSensorId2) == 1){
				$this->heater_model->update_heater_status($iSensorId2, date('Y-m-d H:i:s',time()));
				// usar en servidor para agregar 2 horas
				// $this->heater_model->update_heater_status($iSensorId2, date('Y-m-d H:i:s',(time())+(7200)));
			}
		}

		// if($this->temperature_model->max_temperature_compare($iSensorId1,$iValue1))
		// {
		// 	// $this->alarm_event_model->initialize(1,null,$iSensorId1);
		// 	// $this->alarm_event_model->save_alert();
		// }
		
		// if($this->temperature_model->max_temperature_compare($iSensorId2,$iValue2))
		// {
		// 	// $this->alarm_event_model->initialize(1,null,$iSensorId2);
		// 	// $this->alarm_event_model->save_alert();
		// }
	}


	public function prueba()
	{
		$this->load->model('alarm_event_model');
		var_dump($this->alarm_event_model->get_all_alert());
	}

	public function view_all()
	{
		$this->db->select('*')
		->from('temperature')
		->order_by('id','desc');
		$aResultTemp = $this->db->get()->result_array();
		$this->db->select('*')
		->from('position')
		->order_by('id','desc');
		$aResultPos = $this->db->get()->result_array();
		$this->layout->view('view_all',compact('aResultTemp', 'aResultPos'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */