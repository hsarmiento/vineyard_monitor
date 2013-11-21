<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moisture extends CI_Controller {

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
        $this->load->model('ambient_moisture_model');
        $this->load->model('leaves_moisture_model');
        $this->load->model('subsoil_moisture_001_model');
        $this->load->model('subsoil_moisture_05_model');
	}
	
	public function index()
	{
		$this->layout->view('index');
	}

	public function show($vineyard_name, $pcb_id)
	{
		$this->load->model('pcb_model');
		$this->load->model('Position_model');

		if ($this->pcb_model->exist_pcbid($pcb_id) === false)
		{
			show_error('No se registran datos para esta unidad sensorial');
		}

		$aData['aPosition'] = $this->Position_model->get_last_position($pcb_id);
		$aAmbientTrending = $this->ambient_moisture_model->get_ambient_trending($pcb_id);
		$aLeavesTrending = $this->leaves_moisture_model->get_leaves_trending($pcb_id);
		$aSubsoil001Trending = $this->subsoil_moisture_001_model->get_subsoil001_trending($pcb_id);
		$aSubsoil05Trending = $this->subsoil_moisture_05_model->get_subsoil05_trending($pcb_id);
		// $aTrailerData = $this->trailer_model->get_trailer_data($trailer_id);
		foreach ($aAmbientTrending as $trending) {
				$aData['aAmbient'][] = "[".(mktime(date("H", strtotime($trending['created_at']))-6, date("i", strtotime($trending['created_at'])), date("s", strtotime($trending['created_at'])), date("m", strtotime($trending['created_at'])), date("d", strtotime($trending['created_at'])), date("Y", strtotime($trending['created_at'])))*1000).",".$trending['temp_value']."]";
				// $strIdentifier1 = $temp['sensor_identifier'];
		}
		foreach ($aLeavesTrending as $trending) {
				$aData['aLeaves'][] = "[".(mktime(date("H", strtotime($trending['created_at']))-6, date("i", strtotime($trending['created_at'])), date("s", strtotime($trending['created_at'])), date("m", strtotime($trending['created_at'])), date("d", strtotime($trending['created_at'])), date("Y", strtotime($trending['created_at'])))*1000).",".$trending['temp_value']."]";
				// $strIdentifier1 = $temp['sensor_identifier'];
		}
		foreach ($aSubsoil001Trending as $trending) {
				$aData['aSubsoil001'][] = "[".(mktime(date("H", strtotime($trending['created_at']))-6, date("i", strtotime($trending['created_at'])), date("s", strtotime($trending['created_at'])), date("m", strtotime($trending['created_at'])), date("d", strtotime($trending['created_at'])), date("Y", strtotime($trending['created_at'])))*1000).",".$trending['temp_value']."]";
				// $strIdentifier1 = $temp['sensor_identifier'];
		}
		foreach ($aSubsoil05Trending as $trending) {
				$aData['aSubsoil05'][] = "[".(mktime(date("H", strtotime($trending['created_at']))-6, date("i", strtotime($trending['created_at'])), date("s", strtotime($trending['created_at'])), date("m", strtotime($trending['created_at'])), date("d", strtotime($trending['created_at'])), date("Y", strtotime($trending['created_at'])))*1000).",".$trending['temp_value']."]";
				// $strIdentifier1 = $temp['sensor_identifier'];
		}
		$aData['pcb_id'] = $pcb_id;	
		$aData['vineyard_name'] = $vineyard_name;	
		$this->layout->setTitle('Monitor de Viñas | Humedad');
		$this->layout->css(array(base_url().'public/css/humedad.css'));
		$this->layout->view('show', $aData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */