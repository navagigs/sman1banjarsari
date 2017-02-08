<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['content'] 				= 'admin/dashboard/statistik';
			$data['jml_data_berita']		= $this->ADM->count_all_berita('');
			$data['jml_data_agenda']		= $this->ADM->count_all_agenda('');
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	 }
    
    // ================================================== MODUL WEB ================================================== //
    // IDENTITAS WEB
    public function identitas($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Identitas Website';
			$data['content']				= 'admin/content/website/identitas';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('identitas_website'=>'Nama Website',
													'identitas_deskripsi'=>'Deskripsi',
													'identitas_keyword'=>'Keyword',
													'identitas_notelp'=>'No Telepon',
													'identitas_email'=>'Email',
													'identitas_fb'=>'Facebook',
													'identitas_tw'=>'Twitter',
													'identitas_yb'=>'Youtube',	
													'identitas_maps'=>'Koordinat Google Maps',														
													'identitas_favicon' => 'Favicon');
			if($data['action'] == 'view' ) {
				$data['berdasarkan']		= array('identitas_website'=>'Identitas Website');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'identitas_website';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_identitas[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_identitas('', $like_identitas);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah') {
				$data['onload']						= 'identitas_website';
				$data['identitas_website']			= ($this->input->post('identitas_website'))?$this->input->post('identitas_website'):'';
				$data['identitas_deskripsi']		= ($this->input->post('identitas_deskripsi'))?$this->input->post('identitas_deskripsi'):'';
				$data['identitas_keyword']			= ($this->input->post('identitas_keyword'))?$this->input->post('identitas_keyword'):'';
				$data['identitas_email']			= ($this->input->post('identitas_email'))?$this->input->post('identitas_email'):'';
				$data['identitas_fb']				= ($this->input->post('identitas_fb'))?$this->input->post('identitas_fb'):'';
				$data['identitas_tw']				= ($this->input->post('identitas_tw'))?$this->input->post('identitas_tw'):'';
				$data['identitas_gp']				= ($this->input->post('identitas_gb'))?$this->input->post('identitas_gp'):'';
				$data['identitas_yb']				= ($this->input->post('identitas_yb'))?$this->input->post('identitas_yb'):'';
				$data['identitas_maps']				= ($this->input->post('identitas_maps'))?$this->input->post('identitas_maps'):'';
				$data['identitas_favicon']			= ($this->input->post('identitas_favicon'))?$this->input->post('identitas_favicon'):'';
				$simpan								=  $this->input->post('simpan');
				if($simpan) {
					$insert['identitas_website']	= validasi_sql($data['identitas_website']);
					$insert['identitas_deskripsi']	= validasi_sql($data['identitas_deskripsi']);
					$insert['identitas_keyword']	= validasi_sql($data['identitas_keyword']);
					$insert['identitas_notelp']		= validasi_sql($data['identitas_notelp']);
					$insert['identitas_email']		= validasi_sql($data['identitas_email']);
					$insert['identitas_fb']			= validasi_sql($data['identitas_fb']);
					$insert['identitas_tw']			= validasi_sql($data['identitas_tw']);
					$insert['identitas_gp']			= validasi_sql($data['identitas_gp']);
					$insert['identitas_yb']			= validasi_sql($data['identitas_yb']);
					$insert['identitas_maps']			= validasi_sql($data['identitas_maps']);
					$insert['identitas_favicon']	= validasi_sql($data['identitas_favicon']);
					$this->ADM->insert_identitas($insert);
					$this->session->set_flashdata('success','Data identitas telah berhasil ditambahkan!,');
					redirect("website/identitas/edit/1");
				}
			} elseif ($data['action'] == 'edit') {	
				$where['identitas_id'] 			=  $filter2;			
				$data['onload']					= 'identitas_website';
				$where_identitas['identitas_id']= $filter2;
				$identitas						= $this->ADM->get_identitas('',$where_identitas);
				$data['identitas_id']			= ($this->input->post('identitas_id'))?$this->input->post('identitas_id'):$identitas->identitas_id;
				$data['identitas_website']		= ($this->input->post('identitas_website'))?$this->input->post('identitas_website'):$identitas->identitas_website;
				$data['identitas_deskripsi']	= ($this->input->post('identitas_deskripsi'))?$this->input->post('identitas_deskripsi'):$identitas->identitas_deskripsi;
				$data['identitas_keyword']		= ($this->input->post('identitas_keyword'))?$this->input->post('identitas_keyword'):$identitas->identitas_keyword;
				$data['identitas_alamat']		= ($this->input->post('identitas_alamat'))?$this->input->post('identitas_alamat'):$identitas->identitas_alamat;
				$data['identitas_notelp']		= ($this->input->post('identitas_notelp'))?$this->input->post('identitas_notelp'):$identitas->identitas_notelp;
				$data['identitas_email']		= ($this->input->post('identitas_email'))?$this->input->post('identitas_email'):$identitas->identitas_email;
				$data['identitas_fb']			= ($this->input->post('identitas_fb'))?$this->input->post('identitas_fb'):$identitas->identitas_fb;
				$data['identitas_tw']			= ($this->input->post('identitas_tw'))?$this->input->post('identitas_tw'):$identitas->identitas_tw;
				$data['identitas_gp']			= ($this->input->post('identitas_gp'))?$this->input->post('identitas_gp'):$identitas->identitas_gp;
				$data['identitas_yb']			= ($this->input->post('identitas_yb'))?$this->input->post('identitas_yb'):$identitas->identitas_yb;
				$data['identitas_maps']			= ($this->input->post('identitas_maps'))?$this->input->post('identitas_maps'):$identitas->identitas_maps;
				$data['identitas_favicon']		= ($this->input->post('identitas_favicon'))?$this->input->post('identitas_favicon'):$identitas->identitas_favicon;	
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$gambar	= upload_image("identitas_favicon", "./assets/");
					$data['identitas_favicon']	= $gambar;
					$where_edit['identitas_id']				= validasi_sql($data['identitas_id']);
					$edit['identitas_website']				= validasi_sql($data['identitas_website']);
					$edit['identitas_deskripsi']			= validasi_sql($data['identitas_deskripsi']);
					$edit['identitas_keyword']				= validasi_sql($data['identitas_keyword']);
					$edit['identitas_alamat']				= validasi_sql($data['identitas_alamat']);
					$edit['identitas_notelp']				= validasi_sql($data['identitas_notelp']);
					$edit['identitas_email']				= validasi_sql($data['identitas_email']);
					$edit['identitas_fb']					= validasi_sql($data['identitas_fb']);
					$edit['identitas_tw']					= validasi_sql($data['identitas_tw']);
					$edit['identitas_gp']					= validasi_sql($data['identitas_gp']);
					$edit['identitas_yb']					= validasi_sql($data['identitas_yb']);	
					$edit['identitas_maps']					= validasi_sql($data['identitas_maps']);		
					if ($data['identitas_favicon']) { 
						$row = $this->ADM->get_identitas('*', $where_edit);
						@unlink('./assets/'.$row->identitas_favicon);
						$edit['identitas_favicon']	= validasi_sql($data['identitas_favicon']); 
					}
					$this->ADM->update_identitas($where_edit, $edit);
					$this->session->set_flashdata('success','Identitas Website telah berhasil diedit!,');
					redirect("website/identitas/edit/1");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['identitas_id']		= validasi_sql($filter2);
				$this->ADM->delete_identitas($where_delete);
				$this->session->set_flashdata('warning','Identitas Website telah berhasil dihapus!,');
				redirect("website/identitas/edit/1");				
			}
		 
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("wp_login");		 	
			}
    }
    
    //HALAMAN STATIS
	public function halaman_statis($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Halaman Statis';
			$data['content'] 			= 'admin/content/website/halaman_statis';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '105';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('statis_judul'=>'Judul',
												'statis_deskripsi'=>'Deskripsi');
			if ($data['action'] == 'view') {
				$data['berdasarkan']	= array('statis_judul'=>'JUDUL');
				$data['cari']			= ($this->input->post('cari'))?$this->input->post('cari'):'statis_judul';
				$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']		= (empty($filter1))?1:$filter2;
				$data['batas']			= 10;
				$data['page']			= ($data['halaman']-1) * $data['batas'];
				$like_statis[$data['cari']]= validasi_sql($data['q']);
				$data['jml_data']		= $this->ADM->count_all_statis('',$like_statis);
				$data['jml_halaman']	= ceil($data['jml_data']/$data['batas']);				
			} elseif ($data['action'] == 'tambah') {
				$data['ckeditor']		= $this->ckeditor('statis_deskripsi');
				$data['onload']			= 'statis_judul';
				$data['statis_id']		= ($this->input->post('statis_id'))?$this->input->post('statis_id'):'';
				$data['statis_judul']	= ($this->input->post('statis_judul'))?$this->input->post('statis_judul'):'';
				$data['statis_gambar']	= ($this->input->post('statis_gambar'))?$this->input->post('statis_gambar'):'';
				$data['statis_deskripsi']= ($this->input->post('statis_deskripsi'))?$this->input->post('statis_deskripsi'):'';
				$data['statis_waktu']	= date("Y-m-d H:i:s");
				$simpan					= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("statis_gambar", "./assets/images/statis/", "751x350", seo($data['statis_judul']));
					$data['statis_gambar']	= $gambar;
					$insert['statis_judul']		 = validasi_sql($data['statis_judul']);
					$insert['statis_deskripsi']   = $data['statis_deskripsi'];
					if ($data['statis_gambar']) { $insert['statis_gambar'] = validasi_sql($data['statis_gambar']); }
					$insert['statis_waktu']		 = validasi_sql($data['statis_waktu']);
					$this->ADM->insert_statis($insert);
					$this->session->set_flashdata('success','Halaman Statis telah berhasil ditambahkan!,');
					redirect("website/halaman_statis");
				}
				
			} elseif ($data['action'] == 'edit') {
				$where['statis_id'] 		=  validasi_sql($filter2);
				$data['ckeditor'] 			= $this->ckeditor('statis_deskripsi'); 
				$data['onload']			 	= 'statis_judul';
				$where_statis['statis_id']	= validasi_sql($filter2);
				$statis						= $this->ADM->get_statis('*', $where_statis);
				$data['statis_id']			= ($this->input->post('statis_id'))?$this->input->post('statis_id'):$statis->statis_id;	
				$data['statis_judul']		= ($this->input->post('statis_judul'))?$this->input->post('statis_judul'):$statis->statis_judul;	
				$data['statis_gambar']		= ($this->input->post('statis_gambar'))?$this->input->post('statis_gambar'):$statis->statis_gambar;	
				$data['statis_deskripsi']	= ($this->input->post('statis_deskripsi'))?$this->input->post('statis_deskripsi'):$statis->statis_deskripsi;	
				$data['statis_waktu']		= ($this->input->post('statis_waktu'))?$this->input->post('statis_waktu'):$statis->statis_waktu;
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("statis_gambar", "./assets/images/statis/", "751x350", seo($data['statis_judul']));
					$data['statis_gambar']		= $gambar;
					$where_edit['statis_id']		= validasi_sql($data['statis_id']);
					$edit['statis_judul']		= validasi_sql($data['statis_judul']);
					$edit['statis_deskripsi']	= $data['statis_deskripsi'];
					if ($data['statis_gambar']) {
						$row = $this->ADM->get_statis('*', $where_edit);
						@unlink('./assets/images/statis/'.$row->statis_gambar);
						@unlink('./assets/images/statis/kecil_'.$row->statis_gambar);
						$edit['statis_gambar']	= $data['statis_gambar']; 
					}
					$this->ADM->update_statis($where_edit, $edit);
					$this->session->set_flashdata('success','Halaman Statis telah berhasil diedit!,');
					redirect('website/halaman_statis');		
				}		
		} elseif ($data['action']	== 'hapus') {
			 $where['statis_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_statis('*', $where);
			 @unlink ('./assets/images/statis/'.$row->statis_gambar);
			 @unlink ('./assets/images/statis/kecil_'.$row->statis_gambar);
			 $this->ADM->delete_statis($where);
			 $this->session->set_flashdata('warning','Halaman Statis telah berhasil dihapus!,');
			 redirect("website/halaman_statis");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
    
    public function statis_detail($statis_id='')
    {
	  if($this->session->userdata('logged_in') == TRUE) {
		  $where_admin['admin_user']	= $this->session->userdata('admin_user');
		  $data['admin']				= $this->ADM->get_admin('', $where_admin);
		  $where_statis['statis_id']		= validasi_sql($statis_id);
		  $data['statis']				= $this->ADM->get_statis('*', $where_statis);
		  $data['ckeditor']				= $this->ckeditor('statis_deskripsi');
		  $data['action']				= 'detail';
		  $this->load->vars($data);
		  $this->load->view('admin/content/website/halaman_statis');
	  } else {
		  redirect("wp_login");
	  }
    }	
    
    
    
    // ================================================== MENU UTAMA ================================================== //
    // KATEGORI
    public function kategori($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Kategori Berita';
			$data['content']				= 'admin/content/website/kategori';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kategori_judul'=>'Judul');
			if($data['action'] == 'view') {
				//ACCESS ADMIN LEVEL
			    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') {	
				$data['berdasarkan']		= array('kategori_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kategori_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kategori[$data['cari']]	= $data['q'];
				$where_kategori['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_kategori('', $like_kategori);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				//END ACCESS ADMIN LEVEL
				} else {
				$data['berdasarkan']		= array('kategori_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kategori_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kategori[$data['cari']]	= $data['q'];
				$where_kategori['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_kategori($where_kategori, $like_kategori);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				}
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'kategori_judul';
				$data['kategori_judul']		= ($this->input->post('kategori_judul'))?$this->input->post('kategori_judul'):'';								    $data['admin_nama']			= $this->session->userdata('admin_nama');				
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['kategori_judul']	= validasi_sql($data['kategori_judul']);
					$insert['admin_nama']	= validasi_sql($data['admin_nama']);
					$this->ADM->insert_kategori($insert);
					$this->session->set_flashdata('success','Kategori telah berhasil ditambahkan!,');
					redirect("website/kategori");
				}
			} elseif ($data['action']	== 'edit') {
				$where['kategori_id'] 		= $filter2;
				$data['onload']					= 'kategori_judul';
				$where_kategori['kategori_id']	= $filter2;
				$kategori						= $this->ADM->get_kategori('', $where_kategori);
				$data['kategori_id']			= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$kategori->kategori_id;
				$data['kategori_judul']			= ($this->input->post('kategori_judul'))?$this->input->post('kategori_judul'):$kategori->kategori_judul;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['kategori_id']	= validasi_sql($data['kategori_id']);
					$edit['kategori_judul']		= validasi_sql($data['kategori_judul']);
					$this->ADM->update_kategori($where_edit, $edit);
					$this->session->set_flashdata('success','Kategori telah berhasil diedit!,');
					redirect("website/kategori");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['kategori_id'] = validasi_sql($filter2);
				$this->ADM->delete_kategori($where_delete);
				$this->session->set_flashdata('warning','Kategori telah berhasil dihapus!,');
				redirect("website/kategori");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("wp_login");		 	
			}
				
		 }
		 
    public function kategori_detail($kategori_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_kategori['kategori_id']		= validasi_sql($kategori_id);
			$data['kategori']					= $this->ADM->get_kategori('',$where_kategori);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/kategori');
		} else {
			redirect("wp_login");
		}
	}
    
    // BERITA
    public function berita($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Berita';
			$data['content']				= 'admin/content/website/berita';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('berita_judul' => 'Judul',
													'kategori_id'  => 'Kategori',
													'berita_deskripsi' => 'Deskripsi',
													'berita_gambar' => 'Gambar');
			if($data['action']	== 'view') {
				//ACCESS ADMIN LEVEL
			    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') {					
				$data['berdasarkan']		= array('berita_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'berita_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_berita[$data['cari']]	= $data['q'];		
				$data['jml_data']			= $this->ADM->count_all_berita('', $like_berita);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				//END ACCESS ADMIN LEVEL
				} else {
				$data['berdasarkan']		= array('berita_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'berita_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_berita[$data['cari']]	= $data['q'];
				$where_berita['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_berita2($where_berita, $like_berita);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				}
			} elseif ($data['action']	== 'tambah') {
				$data['ckeditor']			= $this->ckeditor('berita_deskripsi');
				$data['onload']				= 'berita_judul';
				$data['berita_id']			= ($this->input->post('berita_id'))?$this->input->post('berita_id'):'';
				$data['berita_judul']		= ($this->input->post('berita_judul'))?$this->input->post('berita_judul'):'';
				$data['headline']			= ($this->input->post('headline'))?$this->input->post('headline'):'';
				$data['berita_deskripsi']	= ($this->input->post('berita_deskripsi'))?$this->input->post('berita_deskripsi'):'';
				$data['berita_waktu']		= date("Y-m-d H:i:s");
				$data['berita_gambar']		= ($this->input->post('berita_gambar'))?$this->input->post('berita_gambar'):'';
				$data['tags']				= ($this->input->post('tags'))?$this->input->post('tags'):'';
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):'';	
				$data['news_email']			= ($this->input->post('news_email'))?$this->input->post('news_email'):'';	
				$data['admin_nama']			= $this->session->userdata('admin_nama');		
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("berita_gambar", "./assets/images/berita/", "230x160", seo($data['berita_judul']));
					$data['berita_gambar']	= $gambar;
					$tags	= "";
					if ($this->input->post('tag')) {
						$tags = implode(',', $this->input->post('tag'));
					}
					$insert['berita_judul']		 = validasi_sql($data['berita_judul']);
					$insert['headline']	 	 	 = validasi_sql($data['headline']);
					$insert['berita_deskripsi']  = $data['berita_deskripsi'];
					if ($data['berita_gambar']) { $insert['berita_gambar'] = validasi_sql($data['berita_gambar']); }
					$insert['berita_waktu']		 = validasi_sql($data['berita_waktu']);
					$insert['tags']				 = validasi_sql($tags);
					$insert['kategori_id']		 = validasi_sql($data['kategori_id']);
					$insert['admin_nama']		 = validasi_sql($data['admin_nama']);
					 
					$this->ADM->insert_berita($insert);
					$this->session->set_flashdata('success','Berita telah berhasil ditambahkan!,');
					redirect("website/berita");
				}
			} elseif ($data['action']	== 'edit') {
				$where['berita_id'] 		=  validasi_sql($filter2);
				$data['ckeditor']			= $this->ckeditor('berita_deskripsi');
				$data['onload']				= 'berita_judul';
				$where_berita['berita_id']	= validasi_sql($filter2);
				$berita 					= $this->ADM->get_berita('*', $where_berita);
				$data['berita_id']			= ($this->input->post('berita_id'))?$this->input->post('berita_id'):$berita->berita_id;	
				$data['berita_judul']		= ($this->input->post('berita_judul'))?$this->input->post('berita_judul'):$berita->berita_judul;
				$data['headline']			= ($this->input->post('headline'))?$this->input->post('headline'):$berita->headline;	
				$data['berita_deskripsi']	= ($this->input->post('berita_deskripsi'))?$this->input->post('berita_deskripsi'):$berita->berita_deskripsi;
				$data['berita_waktu']		= ($this->input->post('berita_waktu'))?$this->input->post('berita_waktu'):$berita->berita_waktu;	
				$data['berita_gambar']		= ($this->input->post('berita_gambar'))?$this->input->post('berita_gambar'):$berita->berita_gambar;	
				$data['tags']				= ($this->input->post('tag'))?$this->input->post('tag'):$berita->tags;		
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$berita->kategori_id;		
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$berita->kategori_id;	
			//	$data['admin_nama']			= $this->session->userdata('admin_nama');		
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$tags = "";
					if ($this->input->post('tag')) {
						$tags = implode(',', $this->input->post('tag'));
					}
					$gambar = upload_image("berita_gambar", "./assets/images/berita/", "230x160", seo($data['berita_judul']));
					$data['berita_gambar']		= $gambar;
					$where_edit['berita_id']	= validasi_sql($data['berita_id']);
					$edit['berita_judul']		= validasi_sql($data['berita_judul']);
					$edit['headline']			= validasi_sql($data['headline']);
					$edit['berita_deskripsi']	= $data['berita_deskripsi'];
					if ($data['berita_gambar']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_gambar);
						@unlink('./assets/images/berita/kecil_'.$row->berita_gambar);
						$edit['berita_gambar']	= $data['berita_gambar']; 
					}
					$edit['tags']				= $tags;
					$edit['kategori_id']		= validasi_sql($data['kategori_id']);
					//$edit['admin_nama']		 = validasi_sql($data['admin_nama']);
					$this->ADM->update_berita($where_edit, $edit);
					$this->session->set_flashdata('success','Berita telah berhasil diedit!,');
					redirect('website/berita');	
					}	
		 } elseif ($data['action']	== 'hapus') {
			 $where['berita_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_berita('*', $where);
			 @unlink ('./assets/images/berita/'.$row->berita_gambar);
			 @unlink ('./assets/images/berita/kecil_'.$row->berita_gambar);
			 $this->ADM->delete_berita($where);
			 $this->session->set_flashdata('warning','Berita telah berhasil dihapus!,');
			 redirect("website/berita");
	     }
			 $this->load->vars($data);
			 $this->load->view('admin/home');
	  } else {
		  redirect("wp_login");
	  }
	}
  
	public function berita_detail($berita_id='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']	= $this->session->userdata('admin_user');
            $data['admin']				= $this->ADM->get_admin('', $where_admin);
		    $where_berita['berita_id']	= validasi_sql($berita_id);
		    $data['berita']				= $this->ADM->get_berita('*', $where_berita);
		    $data['ckeditor']			= $this->ckeditor('berita_deskripsi');
		    $data['action']				= 'detail';
		    $this->load->vars($data);
		    $this->load->view('admin/content/website/berita');
	  } else {
		  redirect("wp_login");
	  }
	}
    
    // TAGS
	public function tags($filter1='', $filter2='', $filter3='')
	 {
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Tags';
			$data['content'] 			= 'admin/content/website/tags';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '79';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('tag_judul'=>'Judul');
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('tag_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'tag_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_tag[$data['cari']]	= validasi_sql($data['q']);
				$data['jml_data']			= $this->ADM->count_all_tags('', $like_tag);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'tag_judul';
				$data['tag_judul']			= ($this->input->post('tag_judul'))?$this->input->post('tag_judul'):'';
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$insert['tag_judul']	= $data['tag_judul'];
					$insert['tag_seo']		= seo($data['tag_judul']);
					$this->ADM->insert_tags($insert);
					$this->session->set_flashdata('success','Tag baru telah berhasil ditambahkan!,');
					redirect("website/tags");
				}
			} elseif ($data['action'] == 'edit'){
				$where['tag_id'] 		= $filter2;
				$data['onload']			= 'tag_judul';
				$where_tag['tag_id']	= $filter2; 
				$tag					= $this->ADM->get_tags('*', $where_tag);
				$data['tag_id']			= ($this->input->post('tag_id'))?$this->input->post('tag_id'):$tag->tag_id;
				$data['tag_judul']		= ($this->input->post('tag_judul'))?$this->input->post('tag_judul'):$tag->tag_judul;				
				$simpan					= $this->input->post('simpan');
				if ($simpan){
					$where_edit['tag_id']	= $data['tag_id'];
					$edit['tag_judul']		= $data['tag_judul'];
					$edit['tag_seo']		= seo($data['tag_judul']);					
					$this->ADM->update_tags($where_edit, $edit);
					$this->session->set_flashdata('success','Tag berita telah berhasil diedit!,');
					redirect("website/tags");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['tag_id']	= $filter2;
				$this->ADM->delete_tags($where_delete);
				$this->session->set_flashdata('warning','Tag berita telah berhasil dihapus!,');
				redirect("website/tags");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function tags_detail($tag_id="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 			= $this->ADM->get_admin('',$where_admin);
			$where_tag['tag_id']	= $tag_id; 
			$data['tag'] 			= $this->ADM->get_tags('*', $where_tag);
			$data['action']			= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/tags');
		} else {
			redirect("wp_login");
		}
	}

    // AGENDA
	public function agenda($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Agenda';
			$data['content'] 			= 'admin/content/website/agenda';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '79';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('agenda_tema'=>'Tema agenda',
												'agenda_deskripsi'=>'Deskripsi agenda',
												'agenda_mulai'=>'Tanggal mulai',
												'agenda_selesai'=>'Tanggal Selesai',
												'agenda_tempat'=>'Tempat',
												'agenda_jam'=>'Jam',
												'agenda_gambar'=>'Gambar');
			if ($data['action'] == 'view'){
				//ACCESS ADMIN LEVEL
			    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') {	
				$data['berdasarkan']		= array('agenda_tema'=>'TEMA', 'agenda_tempat'=>'TEMPAT');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'agenda_tema';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_agenda[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_agenda('', $like_agenda);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
				} else {
				$data['berdasarkan']		= array('agenda_tema'=>'TEMA', 'agenda_tempat'=>'TEMPAT');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'agenda_tema';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_agenda[$data['cari']]	= $data['q'];
				$where_agenda['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_agenda($where_agenda, $like_agenda);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				}
			} elseif ($data['action'] == 'tambah'){
				$data['ckeditor'] 			= $this->ckeditor('agenda_deskripsi');
				$data['onload']				= 'agenda_tema';
				$data['agenda_tema']		= ($this->input->post('agenda_tema'))?$this->input->post('agenda_tema'):'';
				$data['agenda_deskripsi']	= ($this->input->post('agenda_deskripsi'))?$this->input->post('agenda_deskripsi'):'';
				$data['agenda_mulai']		= ($this->input->post('agenda_mulai'))?$this->input->post('agenda_mulai'):'';
				$data['agenda_selesai']		= ($this->input->post('agenda_selesai'))?$this->input->post('agenda_selesai'):'';
				$data['agenda_tempat']		= ($this->input->post('agenda_tempat'))?$this->input->post('agenda_tempat'):'';
				$data['agenda_jam']			= ($this->input->post('agenda_jam'))?$this->input->post('agenda_jam'):'';
				$data['agenda_gambar']		= ($this->input->post('agenda_gambar'))?$this->input->post('agenda_gambar'):'';						 				$data['admin_nama']			= $this->session->userdata('admin_nama');	
				$data['agenda_posting']		= date("Y-m-d H:i:s");
				
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$gambar	= upload_image("agenda_gambar", "./assets/images/agenda/", "230x160");
					$data['agenda_gambar']	= $gambar;
					$insert['agenda_tema']		= $data['agenda_tema'];
					$insert['agenda_deskripsi']	= $data['agenda_deskripsi'];
					$insert['agenda_mulai']		= dateIndo3($data['agenda_mulai']);
					$insert['agenda_selesai']	= dateIndo3($data['agenda_selesai']);
					$insert['agenda_tempat']	= $data['agenda_tempat'];
					$insert['agenda_jam']		= $data['agenda_jam'];
					if ($data['agenda_gambar']) { $insert['agenda_gambar']	= $data['agenda_gambar']; }
					$insert['admin_nama']			= $this->session->userdata('admin_nama');	
					$insert['agenda_posting']	= $data['agenda_posting'];
					$this->ADM->insert_agenda($insert);
					$this->session->set_flashdata('success','Agenda telah berhasil ditambahkan!,');
					redirect("website/agenda");
				}
			} elseif ($data['action'] == 'edit'){
				
				$where['agenda_id'] 		= $filter2;
				$data['ckeditor'] 			= $this->ckeditor('agenda_deskripsi');
				$data['onload']				= 'agenda_tema';
				$where_agenda['agenda_id']	= $filter2; 
				$agenda						= $this->ADM->get_agenda('*', $where_agenda);
				$data['agenda_id']			= ($this->input->post('agenda_id'))?$this->input->post('agenda_id'):$agenda->agenda_id;
				$data['agenda_tema']		= ($this->input->post('agenda_tema'))?$this->input->post('agenda_tema'):$agenda->agenda_tema;
				$data['agenda_deskripsi']	= ($this->input->post('agenda_deskripsi'))?$this->input->post('agenda_deskripsi'):$agenda->agenda_deskripsi;
				$data['agenda_mulai']		= ($this->input->post('agenda_mulai'))?$this->input->post('agenda_mulai'):$agenda->agenda_mulai;
				$data['agenda_selesai']		= ($this->input->post('agenda_selesai'))?$this->input->post('agenda_selesai'):$agenda->agenda_selesai;
				$data['agenda_tempat']		= ($this->input->post('agenda_tempat'))?$this->input->post('agenda_tempat'):$agenda->agenda_tempat;
				$data['agenda_jam']			= ($this->input->post('agenda_jam'))?$this->input->post('agenda_jam'):$agenda->agenda_jam;
				$data['agenda_gambar']		= ($this->input->post('agenda_gambar'))?$this->input->post('agenda_gambar'):$agenda->agenda_gambar;
				$data['agenda_posting']		= ($this->input->post('agenda_posting'))?$this->input->post('agenda_posting'):$agenda->agenda_posting;
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$gambar	= upload_image("agenda_gambar", "./assets/images/agenda/", "230x160");
					$data['agenda_gambar']		= $gambar;
					$where_edit['agenda_id']	= $data['agenda_id'];
					$edit['agenda_tema']		= $data['agenda_tema'];
					$edit['agenda_deskripsi']	= $data['agenda_deskripsi'];
					$edit['agenda_mulai']		= dateIndo3($data['agenda_mulai']);
					$edit['agenda_selesai']		= dateIndo3($data['agenda_selesai']);
					$edit['agenda_tempat']		= $data['agenda_tempat'];
					if ($data['agenda_gambar']) { 
						$row = $this->ADM->get_agenda('*', $where_edit);
						@unlink('./assets/images/agenda/'.$row->agenda_gambar);
						@unlink('./assets/images/agenda/kecil_'.$row->agenda_gambar);
						$edit['agenda_gambar']	= $data['agenda_gambar']; 
					}
					$edit['agenda_jam']			= $data['agenda_jam'];
					$this->ADM->update_agenda($where_edit, $edit);
					$this->session->set_flashdata('success','Agenda telah berhasil diedit!,');
					redirect("website/agenda");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['agenda_id'] 	= $filter2;
				$row = $this->ADM->get_agenda('*', $where_delete);
				@unlink('./assets/images/agenda/'.$row->agenda_gambar);
				@unlink('./assets/images/agenda/kecil_'.$row->agenda_gambar);
				$this->ADM->delete_agenda($where_delete);
				$this->session->set_flashdata('warning','Agenda telah berhasil dihapus!,');
				redirect("website/agenda");
				
			} 
			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function agenda_detail($agenda_id='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 			= $this->ADM->get_admin('',$where_admin);
			$where_agenda['agenda_id']	= $agenda_id; 
			$data['agenda'] 		= $this->ADM->get_agenda('*', $where_agenda);
		  	$data['ckeditor']		= $this->ckeditor('agenda_deskripsi');
			$data['action']			= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/agenda');
		} else {
			redirect("wp_login");
		}
	}
    // ================================================== END MENU UTAMA ================================================== //

     // prestasi
	public function prestasi($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Prestasi';
			$data['content'] 			= 'admin/content/website/prestasi';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '105';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('prestasi_nama'=>'Nama prestasi' );
		if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('prestasi_nis'=>'NIS','prestasi_nama'=>'NAMA', 'prestasi_penghargaan'=>'PENGHARGAAN');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'prestasi_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_prestasi[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_prestasi('', $like_prestasi);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']					= 'prestasi_nama';
				$data['prestasi_nis']		= ($this->input->post('prestasi_nis'))?$this->input->post('prestasi_nis'):'';
				$data['prestasi_nama']		= ($this->input->post('prestasi_nama'))?$this->input->post('prestasi_nama'):'';
				$data['prestasi_jk']		= ($this->input->post('prestasi_jk'))?$this->input->post('prestasi_jk'):'';
				$data['prestasi_penghargaan']		= ($this->input->post('prestasi_penghargaan'))?$this->input->post('prestasi_penghargaan'):'';
				$data['tahun_id']			= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';
				$data['prestasi_angka']		= '1';
				$data['prestasi_foto']		= ($this->input->post('prestasi_foto'))?$this->input->post('prestasi_foto'):'';
				$data['prestasi_post']		= date("Y-m-d H:i:s");
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$gambar	= upload_image("prestasi_foto", "./assets/images/prestasi/", "230x160");
					$data['prestasi_foto']		= $gambar;
					$insert['prestasi_nis']		= $data['prestasi_nis'];
					$insert['prestasi_nama']	= $data['prestasi_nama'];
					$insert['prestasi_jk']		= $data['prestasi_jk'];
					$insert['prestasi_penghargaan']	= $data['prestasi_penghargaan'];
					$insert['tahun_id']			= $data['tahun_id'];
					$insert['prestasi_angka']	= $data['prestasi_angka'];
					if ($data['prestasi_foto']) {$insert['prestasi_foto']	= $data['prestasi_foto'];}
					$insert['prestasi_post']	= $data['prestasi_post'];
					$this->ADM->insert_prestasi($insert);
					$this->session->set_flashdata('success','Prestasi baru telah berhasil ditambahkan!,');
					redirect("website/prestasi");
				}
			} elseif ($data['action'] == 'edit'){				
				$where['prestasi_id'] 		= $filter2;
				$data['onload']				= 'prestasi_nama';
				$where_prestasi['prestasi_id']	= $filter2; 
				$prestasi					= $this->ADM->get_prestasi('*', $where_prestasi);
				$data['prestasi_id']		= ($this->input->post('prestasi_id'))?$this->input->post('prestasi_id'):$prestasi->prestasi_id;
				$data['prestasi_nis']		= ($this->input->post('prestasi_nis'))?$this->input->post('prestasi_nis'):$prestasi->prestasi_nis;
				$data['prestasi_nama']		= ($this->input->post('prestasi_nama'))?$this->input->post('prestasi_nama'):$prestasi->prestasi_nama;
				$data['prestasi_jk']		= ($this->input->post('prestasi_jk'))?$this->input->post('prestasi_jk'):$prestasi->prestasi_jk;
				$data['prestasi_penghargaan']	= ($this->input->post('prestasi_penghargaan'))?$this->input->post('prestasi_penghargaan'):$prestasi->prestasi_penghargaan;
				$data['tahun_id']			= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$prestasi->tahun_id;
				$data['prestasi_foto']		= ($this->input->post('prestasi_foto'))?$this->input->post('prestasi_foto'):$prestasi->prestasi_foto;
				$data['prestasi_post']		= ($this->input->post('prestasi_post'))?$this->input->post('prestasi_post'):$prestasi->prestasi_post;
				$simpan						= $this->input->post('simpan');
				if ($simpan){					
					$gambar	= upload_image("prestasi_foto", "./assets/images/prestasi/", "230x160");
					$data['prestasi_foto']			= $gambar;					
					$where_edit['prestasi_id']		= $data['prestasi_id'];
					$edit['prestasi_nis']			= $data['prestasi_nis'];
					$edit['prestasi_nama']			= $data['prestasi_nama'];
					$edit['prestasi_jk']			= $data['prestasi_jk'];
					$edit['prestasi_penghargaan']	= $data['prestasi_penghargaan'];
					$edit['tahun_id']				= $data['tahun_id'];
					$edit['prestasi_post']			= $data['prestasi_post'];
					if ($data['prestasi_foto']) {
						$row = $this->ADM->get_prestasi('*', $where_edit);
						@unlink('./assets/images/prestasi/'.$row->prestasi_foto);
						@unlink('./assets/images/prestasi/kecil_'.$row->prestasi_foto);
						$edit['prestasi_foto']	= $data['prestasi_foto'];
					}					
					$this->ADM->update_prestasi($where_edit, $edit);
					$this->session->set_flashdata('success','prestasi telah berhasil diubah!,');
					redirect("website/prestasi");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['prestasi_id'] 	= $filter2;
				$row = $this->ADM->get_prestasi('*', $where_delete);
				@unlink('./assets/images/prestasi/'.$row->prestasi_foto);
				@unlink('./assets/images/prestasi/kecil_'.$row->prestasi_foto);
				$this->ADM->delete_prestasi($where_delete);
				$this->session->set_flashdata('warning','prestasi telah berhasil dihapus!,');
				redirect("website/prestasi");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function prestasi_detail($prestasi_id="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			$where_prestasi['prestasi_id']	= $prestasi_id; 
			$data['prestasi'] 			= $this->ADM->get_prestasi('*', $where_prestasi);
		  	$data['ckeditor']				= $this->ckeditor('prestasi_deskripsi');
			$data['action']				= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/prestasi');
		} else {
			redirect("wp_login");
		}
	}
    
    //CKEDITOR
	private function ckeditor($text) {
		return '
		<script type="text/javascript" src="'.base_url().'editor/ckeditor.js"></script>
		<script type="text/javascript">
		var editor = CKEDITOR.replace("'.$text.'",
		{
			filebrowserBrowseUrl 	  : "'.base_url().'finder/ckfinder.html",
			filebrowserImageBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Images",
			filebrowserFlashBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Flash",
			filebrowserUploadUrl 	  : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
			filebrowserImageUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
			filebrowserFlashUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
			filebrowserWindowWidth    : 900,
			filebrowserWindowHeight   : 700,
			toolbarStartupExpanded 	  : false,
			height					  : 400	
		}
		);
	</script>';
	}
    
}