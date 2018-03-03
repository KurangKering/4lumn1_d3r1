<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Informasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_informasi');

		$this->load->model('users/model_users');
		if ($this->model_users->logged_in() == null) {
			redirect('');
		}
	}
	public function index()
	{
	}
	public function daftar_informasi()
	{	
		$limit = 10;
		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$totalRows = $this->model_informasi->getTotalRowInformasi();
		$data['daftar_informasi']  = $this->model_informasi->getDaftarInformasi($limit, $offset);
		$this->load->library('pagination');
		$config['base_url'] = base_urL() . 'informasi/daftar_informasi/';
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		  // Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$this->template->title('Daftar Informasi');	
		$this->template->render('view_daftar_informasi', $data);
	}
	public function kelola_informasi()
	{
		$totalRow = $this->model_informasi->getTotalRowInformasiSaya();
		$limit  = 5;
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'informasi/kelola_informasi/';
		$config['total_rows'] = $totalRow;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		  // Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$uri = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['kelola_informasi'] =  $this->model_informasi->getInformasiSaya($limit, $uri);
		$this->template->title('Daftar Informasi Saya');	
		$this->template->render('view_kelola_informasi', $data);
	}
	public function lihat_informasi()
	{
		
		$id_fakultas = $this->session->userdata('id_fakultas');
		$id_role = $this->session->userdata('id_role');
		$id_informasi = $this->uri->segment(3);
		$data['informasi'] = $this->model_informasi->getDetailInformasi($id_informasi);
		if ($id_role == 10 && $data['informasi']['id_fakultas'] != 0 && $id_fakultas != $data['informasi']['id_fakultas']) {
			redirect('informasi/daftar_informasi');
		}
		$this->template->title('Lihat Informasi');
		$this->template->render('view_detail_informasi', $data);
	}
	public function ubah_informasi()
	{
		$id_user = $this->session->userdata('id_user');

		if ($this->input->post()) {
			$id = $this->input->post('id');
			$data['judul'] = $this->input->post('judul');
			$data['isi'] = $this->input->post('isi');
			$data['aktif'] = $this->input->post('aktif');
			$data['id_fakultas'] = $this->input->post('id_fakultas');
			$old_gambar = $this->input->post('old_gambar');
			$nama_file = isset($old_gambar) ? $old_gambar : strtotime(date('Y:m:d H:i:s'));
			$uploadPhoto = $this->upload_photo("gambar", $nama_file);
			if (!isset($uploadPhoto['error'])  ) {
				$data['gambar'] = $uploadPhoto['upload_data']['file_name'];

			}
			$this->model_informasi->ubahInformasi($id, $data);	
			redirect('informasi/kelola_informasi','refresh');
		}
		$id = $this->uri->segment(3);
		$data['informasi'] = $this->model_informasi->getDetailInformasi($id);
		if ($id_user != $data['informasi']['id_user']) {
			redirect('informasi/kelola_informasi');
		}
		if ($this->session->userdata('id_role') == 11) {
			$id_fakultas = $this->session->userdata('id_fakultas');
			$this->db->where('id_fakultas',$id_fakultas);
		}
		$data['daftar_fakultas'] = $this->db->get('fakultas')->result_array();
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->title('Ubah Informasi');	
		$this->template->js_add('assets/ckeditor/ckeditor.js');
		$this->template->render('view_ubah_informasi', $data);
	}
	public function tambah_informasi()
	{
		$id_user = $this->session->userdata('id_user');
		if ($this->input->post()) {
			$data['judul'] = $this->input->post('judul');
			$data['isi'] = $this->input->post('isi');
			$data['aktif'] = $this->input->post('aktif');
			$data['id_fakultas'] = $this->input->post('id_fakultas');
			$data['date_created'] = date('Y:m:d H:i:s');
			$data['id_user'] = $id_user;
			$uploadPhoto = $this->upload_photo("gambar", strtotime(date('Y-m-d H:i:s')));
			if (!isset($uploadPhoto['error'])  ) {
				$data['gambar'] = $uploadPhoto['upload_data']['file_name'];

			} else 
			{
				$error = $uploadPhoto['error'];
			}
			$this->model_informasi->insertInformasi($data);	
			redirect('informasi/kelola_informasi','refresh');
		}


		if ($this->session->userdata('id_role') == 11) {
			$id_fakultas = $this->session->userdata('id_fakultas');
			$this->db->where('id_fakultas',$id_fakultas);
		}
		$data['daftar_fakultas'] = $this->db->get('fakultas')->result_array();
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->title('Tambah Informasi');	
		$this->template->js_add('assets/ckeditor/ckeditor.js');
		$this->template->render('view_tambah_informasi', $data);
	}
	private function upload_photo($filename, $nama_file)
	{
		$configFilePhoto['file_name'] = $nama_file;
		$configFilePhoto['upload_path']          = './assets/files/informasi';
		$configFilePhoto['allowed_types']        = 'jpg|png';
		$configFilePhoto['overwrite']        = true;
		$this->upload->initialize($configFilePhoto);
		if ( ! $this->upload->do_upload($filename))
		{
			$data = array('error' => $this->upload->display_errors());
		}  else
		{
			$data = array('upload_data' => $this->upload->data());
		}
		return $data;
	}
	public function hapus_informasi()
	{
	}
}
/* End of file Informasi.php */
/* Location: ./application/modules/informasi/controllers/Informasi.php */