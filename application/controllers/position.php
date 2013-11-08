<?php

class Position extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->layout->setLayout('layout');
        $this->load->model('Position_model');
        $this->load->model('Temperature_model');
	}

	public function last_positions()
	{
		if (!file_exists('application/views/position/last_positions.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		 // site.com/position/last_positions/pcb_id/limit 
		$iPcbId = $this->uri->segment(3,0);
		$iNumber = $this->uri->segment(4,0);
		//si trata de ver la posicion de un pcb que no registra posiciones
		if ($this->Position_model->exist_pcbid($iPcbId) === false)
		{
			show_error('No se registran posiciones para este pcb');
		}

		$aData['pos'] = $this->Position_model->get_last_positions($iPcbId,$iNumber);
		$aData['temp'] = $this->Temperature_model->get_last_temperatures($iPcbId,$iNumber*2);
		$this->layout->view('last_positions', $aData);
	}

	public function ajax_view($iPcbId)
	{
		$this->layout->setLayout('ajax_layout');
		if (!file_exists('application/views/position/ajax_view.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		//si trata de ver la posicion de un pcb que no registra posiciones
		if ($this->Position_model->exist_pcbid($iPcbId) === false)
		{
			show_error('No se registran posiciones para este pcb');
		}

        $aData['pos'] = $this->Position_model->get_last_positions($iPcbId,1);
        $aData['temp'] = $this->Temperature_model->get_last_temperatures($iPcbId);
		$this->layout->view('ajax_view', $aData);
	}
}