<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['dashboard']				= 'admin/dashboard/statistik';
			$data['content']				= 'admin/dashboard/statistik';
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
    
	 public function menu($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			error_reporting(0);
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
			$data['content'] 			= 'admin/content/pengaturan/menu';
			$data['menu_terpilih']		= '7';
			$data['submenu_terpilih']	= '13';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']		= array('menu_nama'=>'Nama menu',
											'menu_deskripsi'=>'Deskripsi',
											'menu_url'=>'URL',
											'menu_level'=>'Level',
											'menu_urutan'=>'Urutan'
											);
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('menu_nama'=>'NAMA', 'menu_deskripsi'=>'DESKRIPSI', 'menu_level'=>'LEVEL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'menu_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$where_menu['menu_status']	= 'A';
				$like_menu[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_menu($where_menu, $like_menu);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'menu_nama';
				$data['level']				= array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4');
				$data['menu_kode']			= ($this->input->post('menu_kode'))?$this->input->post('menu_kode'):'';
				$data['menu_nama']			= ($this->input->post('menu_nama'))?$this->input->post('menu_nama'):'';
				$data['menu_deskripsi']		= ($this->input->post('menu_deskripsi'))?$this->input->post('menu_deskripsi'):'';
				$data['menu_url']			= ($this->input->post('menu_url'))?$this->input->post('menu_url'):'';
				$data['menu_site']			= ($this->input->post('menu_site'))?$this->input->post('menu_site'):'';
				$data['menu_subkode']		= ($this->input->post('menu_subkode'))?$this->input->post('menu_subkode'):'';
				$data['menu_level']			= ($this->input->post('menu_level'))?$this->input->post('menu_level'):'1';
				$data['menu_urutan']		= ($this->input->post('menu_urutan'))?$this->input->post('menu_urutan'):'';
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$insert['menu_kode']	= validasi_sql($data['menu_kode']);
					$insert['menu_nama']	= validasi_sql($data['menu_nama']);
					$insert['menu_deskripsi']	= validasi_sql($data['menu_deskripsi']);
					$insert['menu_url']		= validasi_sql($data['menu_url']);
					$insert['menu_site']	= validasi_sql($data['menu_site']);
					$insert['menu_subkode']	= validasi_sql($data['menu_subkode']);
					$insert['menu_urutan']	= validasi_sql($data['menu_urutan']);
					$insert['menu_level']	= validasi_sql($data['menu_level']);
					$insert['menu_status']	= validasi_sql('A');
					$this->ADM->insert_menu($insert);
					$this->session->set_flashdata('success','Menu baru telah berhasil ditambahkan!,');
					redirect("pengaturan/menu");
				}
			} elseif ($data['action'] == 'edit'){
				$data['onload']				= 'menu_nama';
				$data['level']				= array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4');
				$where_menu['menu_kode']	= $filter2; 
				$menu 						= $this->ADM->get_menu('*', $where_menu);
				$data['menu_kode']			= ($this->input->post('menu_kode'))?$this->input->post('menu_kode'):$menu->menu_kode;
				$data['menu_nama']			= ($this->input->post('menu_nama'))?$this->input->post('menu_nama'):$menu->menu_nama;
				$data['menu_deskripsi']		= ($this->input->post('menu_deskripsi'))?$this->input->post('menu_deskripsi'):$menu->menu_deskripsi;
				$data['menu_url']			= ($this->input->post('menu_url'))?$this->input->post('menu_url'):$menu->menu_url;
				$data['menu_site']			= ($this->input->post('menu_site'))?$this->input->post('menu_site'):$menu->menu_site;
				$data['menu_subkode']		= ($this->input->post('menu_subkode'))?$this->input->post('menu_subkode'):$menu->menu_subkode;
				$data['menu_level']			= ($this->input->post('menu_level'))?$this->input->post('menu_level'):$menu->menu_level;
				$data['menu_urutan']		= ($this->input->post('menu_urutan'))?$this->input->post('menu_urutan'):$menu->menu_urutan;
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$where_edit['menu_kode']= validasi_sql($data['menu_kode']);
					$edit['menu_nama']		= validasi_sql($data['menu_nama']);
					$edit['menu_deskripsi']	= validasi_sql($data['menu_deskripsi']);
					$edit['menu_url']		= validasi_sql($data['menu_url']);
					$edit['menu_site']		= validasi_sql($data['menu_site']);
					$edit['menu_subkode']	= validasi_sql($data['menu_subkode']);
					$edit['menu_urutan']	= validasi_sql($data['menu_urutan']);
					$edit['menu_level']		= validasi_sql($data['menu_level']);
					$this->ADM->update_menu($where_edit, $edit);
					$this->session->set_flashdata('success','Menu baru telah berhasil diedit!,');
					redirect("pengaturan/menu");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_edit['menu_kode']= $filter2;
				$edit['menu_status']	= 'H';
				$this->ADM->update_menu($where_edit, $edit);
				$this->session->set_flashdata('success','Data menu telah berhasil dihapus!,');
				redirect("pengaturan/menu");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function menu_detail($menu_kode="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$where_menu['menu_kode']= $menu_kode; 
			$data['menu'] 			= $this->ADM->get_menu('*', $where_menu);
			$data['action']			= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/pengaturan/menu');
		} else {
			redirect("wp_login");
		}
	}
	public function hak_akses()
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
			$data['content'] 			= 'admin/content/pengaturan/menu';
			$data['menu_terpilih']		= '7';
			$data['submenu_terpilih']	= '13';
			$data['action']				= 'hak_akses';
			$data['admin_level_kode']		= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):'';
			$data['menu_kode']				= ($this->input->post('menu_kode'))?$this->input->post('menu_kode'):'';
			$menu_kode						= $this->input->post('menu_kode');
			$menu							= $this->input->post('menu');
			$admin_level					= $this->input->post('admin_level_kode');
			$simpan							= $this->input->post('simpan');
			
			if ($simpan){
				if (!empty($admin_level) && !empty($menu)){
					foreach($menu as $item){
						$where_pengguna['menu_kode']		= $item;
						$where_pengguna['admin_level_kode']	= $admin_level;		
						$jmlRow = $this->ADM->count_all_menu_admin($where_pengguna);
						if($jmlRow < 1) {
							$datamenu = array(
							   'menu_kode' => $item,
							   'admin_level_kode' => $admin_level
							);
							$this->ADM->insert_menu_admin($datamenu);
						}
					}
					
					foreach($menu as $items)
						$nKd[] = "'$items'";
						
						$sKd = implode(",", $nKd);
						if (empty($menu_kode)){
							$query = $this->db->query("SELECT * FROM menu_admin ma JOIN menu m ON ma.menu_kode=m.menu_kode WHERE ma.menu_kode NOT IN($sKd) AND ma.admin_level_kode = '$admin_level' AND m.menu_level='1'");
							if ($query->num_rows() > 0)
							{
							   foreach ($query->result() as $row)
							   {
								  $this->db->query("DELETE FROM menu_admin WHERE menu_admin_kode='".$row->menu_admin_kode."'");
							   }
							}						
						
						} else {
							$query = $this->db->query("SELECT * FROM menu_admin ma JOIN menu m ON ma.menu_kode=m.menu_kode WHERE ma.menu_kode NOT IN($sKd) AND ma.admin_level_kode = '$admin_level' AND m.menu_subkode='".$menu_kode."'");
							if ($query->num_rows() > 0){
							   foreach ($query->result() as $row){
								  	$listquery = $this->db->query("SELECT * FROM menu_admin ma JOIN menu m ON ma.menu_kode=m.menu_kode WHERE ma.menu_kode NOT IN($sKd) AND ma.admin_level_kode = '$admin_level' AND m.menu_subkode='".$row->menu_kode."'");
									if ($listquery->num_rows() > 0){
							   			foreach ($listquery->result() as $row2){
								  			$this->db->query("DELETE FROM menu_admin WHERE menu_admin_kode='".$row2->menu_admin_kode."'");
										}
									}
								$this->db->query("DELETE FROM menu_admin WHERE menu_admin_kode='".$row->menu_admin_kode."'");
							   }
							}
						}
				}
				
				$this->session->set_flashdata('success','Hak akses telah berhasil diperbaharui!,');
					redirect("admin/hak_akses");
			}
			
			$this->load->view('admin/home', $data);
		
		} else {
			redirect("wp_login");
		}
	}
	

	//FUNCTION PENGGUNA
	public function pengguna($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
			$data['content'] 			= 'admin/content/pengaturan/pengguna';
			$data['menu_terpilih']		= '7';
			$data['submenu_terpilih']	= '13';
			$data['action']				= (empty($filter1))?'view':$filter1;			
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('admin_user'=>'USERNAME',
													'admin_nama'=>'NAMA LENGKAP',
													'admin_telepon'=>'TELEPON',
													'admin_level_kode'=>'KELOMPOK');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'admin_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$where_admin['admin_status']	= 'A';
				$like_admin[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_admin($where_admin, $like_admin);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['validate']			= array('admin_user'=>'Username',
												'admin_pass'=>'Password',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']				= 'admin_user';
				$data['admin_user']			= ($this->input->post('admin_user'))?$this->input->post('admin_user'):'';
				$data['admin_pass']			= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):'';
				$data['admin_nama']			= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):'';
				$data['admin_alamat']		= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):'';				
				$data['admin_telepon']		= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):'';
				$data['admin_level_kode']	= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):'';
				
				$where['admin_user']		= $data['admin_user'];
				$jml_pengguna				= $this->ADM->count_all_admin($where);
								
				$simpan						= $this->input->post('simpan');
				if ($simpan && $jml_pengguna < 1 ){								
					$insert['admin_user']		= validasi_sql($data['admin_user']);
					$insert['admin_pass']		= validasi_sql(do_hash(($data['admin_pass']), 'md5'));
					$insert['admin_nama']		= validasi_sql($data['admin_nama']);
					$insert['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$insert['admin_telepon']	= validasi_sql($data['admin_telepon']);
					$insert['admin_level_kode']	= validasi_sql($data['admin_level_kode']);			
					$insert['admin_status']		= validasi_sql('A');
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Pengguna baru telah berhasil ditambahkan!,');
					redirect("pengaturan/pengguna");
				} elseif ($simpan && $jml_pengguna > 0 ){
					echo '<script type="text/javascript">
						  	alert("Pengguna telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$data['validate']			= array('admin_user'=>'Pengguna',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']					= 'admin_nama';
				$where_admin['admin_user']		= $filter2; 
				$admin							= $this->ADM->get_admin('*', $where_admin);
				$data['admin_user']				= ($this->input->post('admin_user'))?$this->input->post('admin_user'):$admin->admin_user;
				$data['admin_pass']				= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):$admin->admin_pass;				
				$data['admin_nama']				= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):$admin->admin_nama;				
				$data['admin_alamat']			= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):$admin->admin_alamat;				
				$data['admin_telepon']			= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):$admin->admin_telepon;				
				$data['admin_level_kode']		= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):$admin->admin_level_kode;	
				$simpan							= $this->input->post('simpan');
				if ($simpan){
					$where_edit['admin_user']	= validasi_sql($data['admin_user']);
					if ($data['admin_pass'] <> '') {						
					$edit['admin_pass']			= validasi_sql(do_hash(($data['admin_pass']), 'md5')); }
					$edit['admin_nama']			= validasi_sql($data['admin_nama']);
					$edit['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$edit['admin_telepon']		= validasi_sql($data['admin_telepon']);					
					$edit['admin_level_kode']	= validasi_sql($data['admin_level_kode']);
					$this->ADM->update_admin($where_edit, $edit);
					$this->session->set_flashdata('success','Pengguna telah berhasil diedit!,');
					redirect("pengaturan/pengguna");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_edit['admin_user']= $filter2;
				$edit['admin_status']	= 'H';
				$this->ADM->update_admin($where_edit, $edit);
				$this->session->set_flashdata('success','Pengguna telah berhasil dihapus!,');
				redirect("pengaturan/pengguna");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function pengguna_detail($admin_user="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$where_admin['admin_user']	= $admin_user; 
			$data['admin'] 				= $this->ADM->get_admin('', $where_admin);
			$data['action']				= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/pengaturan/pengguna');
		} else {
			redirect("wp_login");
		}
	}
	
	//FUNCTION KELOMPOK PENGGUNA
	public function kelompok_pengguna($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
			$data['content'] 			= 'admin/content/pengaturan/kelompok_pengguna';
			$data['menu_terpilih']		= '7';
			$data['submenu_terpilih']	= '13';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('admin_level_kode'=>'Kode',
												'admin_level_nama'=>'Nama'
											);
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('admin_level_nama'=>'NAMA');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'admin_level_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$where_admin_level['admin_level_status']	= 'A';
				$like_admin_level[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_admin_level($where_admin_level, $like_admin_level);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'admin_level_nama';
				$data['admin_level_kode']	= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):'';
				$data['admin_level_nama']	= ($this->input->post('admin_level_nama'))?$this->input->post('admin_level_nama'):'';
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$insert['admin_level_kode']			= validasi_sql($data['admin_level_kode']);
					$insert['admin_level_nama']			= validasi_sql($data['admin_level_nama']);
					$insert['admin_level_status']		= validasi_sql('A');
					$this->ADM->insert_admin_level($insert);
					$this->session->set_flashdata('success','Kelompok pengguna baru telah berhasil ditambahkan!,');
					redirect("pengaturan/kelompok_pengguna");
				}
			} elseif ($data['action'] == 'edit'){
				$data['onload']				= 'admin_level_kode';
				$where_admin_level['admin_level_kode']	= $filter2; 
				$admin_level				= $this->ADM->get_admin_level('*', $where_admin_level);
				$data['admin_level_kode']	= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):$admin_level->admin_level_kode;				
				$data['admin_level_nama']	= ($this->input->post('admin_level_nama'))?$this->input->post('admin_level_nama'):$admin_level->admin_level_nama;				
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$where_edit['admin_level_kode']	= $data['admin_level_kode'];
					$edit['admin_level_nama']	= $data['admin_level_nama'];
					$this->ADM->update_admin_level($where_edit, $edit);
					$this->session->set_flashdata('success','Kelompok pengguna telah berhasil diedit!,');
					redirect("pengaturan/kelompok_pengguna");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_edit['admin_level_kode']= $filter2;
				$edit['admin_level_status']	= 'H';
				$this->ADM->update_admin_level($where_edit, $edit);
				$this->session->set_flashdata('success','Kelompok pengguna telah berhasil dihapus!,');
				redirect("pengaturan/kelompok_pengguna");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
	
	public function kelompok_pengguna_detail($admin_level_kode="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$where_admin_level['admin_level_kode']	= $admin_level_kode; 
			$data['admin_level'] 		= $this->ADM->get_admin_level('', $where_admin_level);
			$data['action']				= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/pengaturan/kelompok_pengguna');
		} else {
			redirect("wp_login");
		}
	}
	
	
	 //Fungsi Ubah Kata Sandi
	 public function edit_password($filter1='', $filter2='', $filter3='')
	 {
		 if ($this->session->userdata('logged_in') == TRUE) {
			 $where_admin['admin_user']			= $this->session->userdata('admin_user');
			 $data['web']					= $this->ADM->identitaswebsite();
			 $data['admin']						= $this->ADM->get_admin('',$where_admin);
			 @date_default_timezone_set('Asia/Jakarta');
			 $data['dashboard_info']			= FALSE;
			 $data['content']					= 'admin/content/pengaturan/edit_password';
			 $data['menu_terpilih']				= '1';
			 $data['submenu_terpilih']			= '';
			 $data['validasi']					= array('admin_pass_recent'=>'Password Sekarang','admin_pass'=>'Password Baru','admin_pass_ulang'=>'Password Baru');
			 
			 $data['admin_user']				= $this->session->userdata('admin_user');
			 $data['admin_pass_recent']			= ($this->input->post('admin_pass_recent'))?$this->input->post('admin_pass_recent'):'';
			 $data['admin_pass']				= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):'';
			 $data['admin_pass_ulang']			= ($this->input->post('admin_pass_ulang'))?$this->input->post('admin_pass_ulang'):'';
			 	
			 $simpan							= $this->input->post('simpan');
			 if($simpan){
				 if(do_hash($data['admin_pass_recent'], 'md5') == $data['admin']->admin_pass) {
					if($data['admin_pass'] == $data['admin_pass_ulang']) {
						$where_edit['admin_user']	= validasi_sql($data['admin_user']);
						if($data['admin_pass'] <> '') {
							$edit['admin_pass']		= validasi_sql(do_hash(($data['admin_pass']), 'md5')); 
						}
						$this->ADM->update_admin($where_edit, $edit);
						$this->session->set_flashdata('success','Password Berhasil Diubah!,');
							redirect("admin/edit_password");
						
					} else {
						$this->session->set_flashdata('error','Password Tidak Sesuai!,');
							redirect("admin/edit_password");
					}
					} else {
						$this->session->set_flashdata('warning','Password Sekarang Salah!,');
							redirect("admin/edit_password");
					}
				 }
				 $this->load->vars($data);
				 $this->load->view('admin/home');
			 } else {
				 redirect("wp_login");
			 }
		 }
    
}