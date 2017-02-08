<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['body']			= 'page-sub-page';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['content']		= '/default/content/agenda';
		$data['title']			= '| Agenda';
		$data['boxberita']		= TRUE;	
		$data['boxfakultas']	= TRUE;	
		$data['boxlayanan']		= TRUE;		
		$data['boxvideo']		= TRUE;		
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 5;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_agenda('','');
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		$data['action']			= '';

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
	public function detail($agenda_id='', $agenda_tema='')
	{
	 	$where['agenda_id'] 			= $agenda_id;
	  	$get = $this->ADM->get_agenda("",$where);
	  	if($get == "")
	  	{
	  		redirect('agenda');
	  	} else {
		$data['body']					= 'page-sub-page page-member-detail';
		$data['web']					= $this->ADM->identitaswebsite();
		$data['content']				= '/default/content/agenda';
		$where_agenda['agenda_id']		= $agenda_id; 
		$data['agenda'] 				= $this->ADM->get_agenda('*', $where_agenda);
		
		$row = $this->ADM->get_agenda('*', $where_agenda);
		$data['title']					= '| Agenda > ' .$row->agenda_tema;
		$data['action']					= 'detail';
		
		$data['action']					= 'detail';
		$data['boxberita']				= TRUE;	
		$data['boxfakultas']			= TRUE;	
		$data['boxlayanan']				= TRUE;		
		$data['boxvideo']				= TRUE;	
		}	
		$this->load->vars($data);
		$this->load->view('default/home');
	}	

}

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */