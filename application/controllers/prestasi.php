<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		$data['content']				= '/default/content/prestasi';
		$data['body']					= 'page-sub-page';
		$data['web']					= $this->ADM->identitaswebsite();
		$data['title']					= '| Prestasi';	
		$data['boxberita']		= TRUE;	
		
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
	

}

/* End of file prestasi.php */
/* Location: ./application/controllers/prestasi.php */