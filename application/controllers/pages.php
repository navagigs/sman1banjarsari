<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		$data['content']				= '/default/content/home';
		$data['body']					= 'page-sub-page';
		$data['web']					= $this->ADM->identitaswebsite();
		$data['title']					= '| Pages';
		redirect('home');
	}
	
	public function detail($tahun='', $id='')
	{	
	  $where['statis_id']				= $id;
	  $get = $this->ADM->get_statis('*', $where);
	  if($get == "")
	  {
	  	redirect('pages');
	  } else {	
		$data['body']					= 'page-sub-page';
		$data['web']					= $this->ADM->identitaswebsite();
		$data['tanggal']				= date("Y-m-d");
		$data['time']					= time();
		$data['ip']						= $_SERVER['REMOTE_ADDR'];
		$where['statis_id']				= $id;
		$row = $this->ADM->get_statis('*', $where);
		$data['judul']					= $row->statis_judul;
		$data['deskripsi']				= $row->statis_deskripsi;
		$data['gambar']					= $row->statis_gambar;
		$data['tahun']					= $row->statis_waktu;
		$data['title']					= '| '.$row->statis_judul;
		$data['boxberita']				= TRUE;	
		$data['boxfakultas']			= TRUE;	
		$data['boxlayanan']				= TRUE;		
		$data['boxvideo']				= TRUE;		
		$data['content']				= '/default/content/pages';	
	  }
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
	public function contact_us($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/contact';
		$data['body']			= 'page-sub-page page-contact';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= '| Hubungi Kami';
		
		$data['boxberita']		= TRUE;	
		$data['boxfakultas']	= FALSE;	
		$data['boxlayanan']		= TRUE;		
		$data['boxvideo']		= TRUE;	

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	public function input_form()
	{
		$data['pesan_kode']		= ($this->input->post('pesan_kode'))?$this->input->post('pesan_kode'):'';
		$data['pesan_pengirim']	= ($this->input->post('pesan_pengirim'))?$this->input->post('pesan_pengirim'):'';
		$data['pesan_subjek']	= 'Kontak Kami';
		$data['pesan_email']	= ($this->input->post('pesan_email'))?$this->input->post('pesan_email'):'';		
		$data['pesan_isi']		= ($this->input->post('pesan_isi'))?$this->input->post('pesan_isi'):'';
		$data['pesan_type']		= 'I';
		$data['pesan_datetime']	= date("Y-m-d H:i:s");
		$kirim					= $this->input->post('kirim');
		if ($kirim) {
			$insert['pesan_pengirim'] 	= $data['pesan_pengirim'];
			$insert['pesan_subjek']		= $data['pesan_subjek'];
			$insert['pesan_email']	 	= $data['pesan_email'];
			$insert['pesan_isi'] 		= $data['pesan_isi'];
			$insert['pesan_type'] 		= $data['pesan_type'];
			$insert['pesan_datetime'] 	= $data['pesan_datetime'];
			$this->ADM->insert_pesan($insert);
			$this->session->set_flashdata('success','Pesan telah berhasil dikirim!,');
			redirect("pages/contact_us");
		} else {
			$this->session->set_flashdata('error','Pesan tidak berhasil dikirim!,');
			redirect("pages/contact_us");
		}
	}
	
	
	public function sitemap($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/sitemap';
		$data['body']			= 'page-sub-page page-contact';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'Hubungi Kami';
		
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 6;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_galeri_video();
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		$data['action']			= '';
		
		$data['boxberita']		= TRUE;	
		$data['boxfakultas']	= FALSE;	
		$data['boxlayanan']		= TRUE;		
		$data['boxvideo']		= TRUE;	

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
	
	public function data($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/data';
		$data['body']			= 'page-sub-page page-contact';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'data';
		
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 6;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_galeri_video();
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		$data['action']			= '';
		
		$data['boxberita']		= TRUE;	
		$data['boxfakultas']	= FALSE;	
		$data['boxlayanan']		= TRUE;		
		$data['boxvideo']		= TRUE;	

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
	public function input_newsletter()
	{	
		@date_default_timezone_set('Asia/Jakarta');
		$data['news_email']		= ($this->input->post('news_email'))?$this->input->post('news_email'):'';
		$data['news_post']		= date("Y-m-d H:i:s");
		$krm				= $this->input->post('krm');
		$where['news_email']			= $data['news_email'];
		$jml_newsletter					= $this->ADM->count_all_newsletter($where);
		if ($krm && $jml_newsletter < 1) {
			$insert['news_email']	 	= $data['news_email'];
			$insert['news_post'] 		= $data['news_post'];
			$this->ADM->insert_newsletter($insert);
			$this->session->set_flashdata('success','Newsletter telah berhasil!,');
			redirect("pages/newsletter");
		} elseif ($krm && $jml_newsletter > 0 ){
			$this->session->set_flashdata('info','Email anda sudah terdaftar di Newsletter!,');
			redirect("pages/newsletter");
		} else {
			$this->session->set_flashdata('error','Newsletter tidak berhasil!,');
			redirect("pages/newsletter");
		}
	}
	
	public function newsletter($filter1='', $filter2='', $filter3='')
	{
		
		$data['content']		= '/default/content/newsletter';
		$data['body']			= 'page-sub-page page-blog-detail';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'Newsletter';
		
		$data['boxberita']		= TRUE;	
		$data['boxfakultas']	= FALSE;	
		$data['boxlayanan']		= TRUE;		
		$data['boxvideo']		= TRUE;	
		
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */