<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wind_gauge extends CI_Controller {

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
        $this->load->model('wind_gauge_model');
	}
	
	public function index()
	{
		$this->layout->view('index');
	}

	public function show($pcb_id)
	{
		$this->load->model('pcb_model');
		$this->load->model('Position_model');

		if ($this->pcb_model->exist_pcbid($pcb_id) === false)
		{
			show_error('No se registran datos para esta unidad sensorial');
		}

		$aData['aPosition'] = $this->Position_model->get_last_position($pcb_id);
		$aTrending = $this->wind_gauge_model->get_wind_trending($pcb_id);
		// $aTrailerData = $this->trailer_model->get_trailer_data($trailer_id);
		foreach ($aTrending as $trending) {
				$aData['aWind'][] = "[".(mktime(date("H", strtotime($trending['created_at']))-4, date("i", strtotime($trending['created_at'])), date("s", strtotime($trending['created_at'])), date("m", strtotime($trending['created_at'])), date("d", strtotime($trending['created_at'])), date("Y", strtotime($trending['created_at'])))*1000).",".$trending['temp_value']."]";
				// $strIdentifier1 = $temp['sensor_identifier'];
		}
		$aData['pcb_id'] = $pcb_id;	
		$this->layout->css(array(base_url().'public/css/viento.css'));
		$this->layout->view('show', $aData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */