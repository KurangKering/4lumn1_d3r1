<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_berita');
	//Do your magic here
	}
	public function index()
	{
		
	}

	public function daftar_berita()
	{	
	
		$limit = 6;
		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$totalRows = $this->model_berita->getTotalRowBerita();

		$data['daftar_berita']  = $this->model_berita->getDaftarBerita($limit, $offset);

		$this->load->library('pagination');
		
		$config['base_url'] = base_urL() . 'berita/daftar_berita/';
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
		
		
		$this->template->title('Seputar Kampus');	

		$this->template->render('view_daftar_berita', $data);
	}

	public function kelola_berita()
	{
		
		$id_user = $this->session->userdata('id_user');

		$totalRow = $this->model_berita->getTotalRowBeritaSaya($id_user);

		$limit  = 5;
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'berita/kelola_berita/';
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
		$data['kelola_berita'] =  $this->model_berita->getBeritaSaya($id_user, $limit, $uri);
		$this->template->title('Daftar Berita Saya');	
		$this->template->render('view_kelola_berita', $data);

	}

	public function lihat_berita()
	{
		$id = $this->uri->segment(3);
		$data['berita'] = $this->model_berita->getDetailBerita($id);
		$this->template->title('Lihat Berita');
		$this->template->render('view_detail_berita', $data);

	}

	public function ubah_berita()
	{
		$id_user = $this->session->userdata('id_user');
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$data['judul'] = $this->input->post('judul');
			$data['isi'] = $this->input->post('isi');
			$data['aktif'] = $this->input->post('aktif');

			$old_gambar = $this->input->post('gambar');
			$nama_file = isset($old_gambar) ? $old_gambar : strtotime(date('Y:m:d H:i:s'));
			$uploadPhoto = $this->upload_photo("gambar", $nama_file);
			if (!isset($uploadPhoto['error'])  ) {
				$data['gambar'] = $uploadPhoto['upload_data']['file_name'];

			}

			$this->model_berita->ubahBerita($id, $data);	

			redirect('berita/kelola_berita','refresh');
		}
		$id = $this->uri->segment(3);
		$data['berita'] = $this->model_berita->getDetailBerita($id);
		if ($id_user != $data['berita']['id_user']) {
			redirect('berita/kelola_berita');
		}
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');	
		$this->template->title('Ubah Berita');	
		$this->template->js_add('assets/ckeditor/ckeditor.js');
		$this->template->render('view_ubah_berita', $data);

	}

	public function tambah_berita()
	{

		if ($this->input->post()) {
			$data['judul'] = $this->input->post('judul');
			$data['isi'] = $this->input->post('isi');
			$data['aktif'] = $this->input->post('aktif');
			$data['date_created'] = date('Y:m:d H:i:s');
			$data['id_user'] = $this->session->userdata('id_user');


			$uploadPhoto = $this->upload_photo("gambar", strtotime(date('Y-m-d H:i:s')));

			if (!isset($uploadPhoto['error'])  ) {
				$data['gambar'] = $uploadPhoto['upload_data']['file_name'];
				

			} else 
			{
				$error = $uploadPhoto['error'];
			}
			$this->model_berita->insertBerita($data);	
			redirect('berita/kelola_berita','refresh');
		}
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->title('Tambah Berita');	
		$this->template->js_add('assets/ckeditor/ckeditor.js');
		$this->template->render('view_tambah_berita');
	}
	private function upload_photo($filename, $nama_file)
	{
		$configFilePhoto['file_name'] = $nama_file;
		$configFilePhoto['upload_path']          = './assets/files/berita';
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
	public function hapus_berita()
	{

	}

}

/* End of file Berita.php */
/* Location: ./application/modules/berita/controllers/Berita.php */