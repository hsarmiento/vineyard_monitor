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

		redirect('/vineyards/show');
		// $this->layout->view('index');
	}

	public function show()
	{

		$this->layout->css(array(base_url().'public/css/estilo.css', base_url().'public/css/google_family_gudea.css',base_url().'public/css/home.css'));
		$this->layout->view('show');
	}

	public function data()
	{
		$this->layout->css(array(base_url().'public/css/estilo.css', base_url().'public/css/google_family_gudea.css',base_url().'public/css/home_back.css'));
		$this->layout->view('data');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */