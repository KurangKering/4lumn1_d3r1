<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_gallery');
	}
	public function index()
	{

		$this->daftar_gallery();
		
	}

	public function hapus_gallery($id_gallery)
	{
		$this->model_gallery->hapus_gallery($id_gallery);
		redirect('gallery/kelola_gallery');
	}
	public function ubah_gallery($id_gallery = null)
	{
		if ($this->input->post()) {
			$id = $this->input->post('id_gallery');
			$data['judul'] = $this->input->post('judul');
			$old_gambar = $this->input->post('nama_file');
			$nama_file = isset($old_gambar) ? $old_gambar : strtotime(date('Y:m:d H:i:s'));
			$uploadPhoto = $this->upload_photo("nama_file", $nama_file);
			if (!isset($uploadPhoto['error'])  ) {
				$data['nama_file'] = $uploadPhoto['upload_data']['file_name'];

			}

			$this->model_gallery->ubah_gallery($id, $data);	

			redirect('gallery/kelola_gallery');
		}
		$data['gallery'] =$this->model_gallery->get_detail_gallery($id_gallery);
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->title('Ubah Gambar');
		$this->template->render('view_ubah_gallery',$data);
	}
	public function kelola_gallery()
	{

		$id_user = $this->session->userdata('id_user');

		$npm = $this->session->userdata('username');
		$totalRow = $this->model_gallery->get_total_row_gallery_saya($npm);
		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$limit  = 8;
		$data['kelola_gallery'] = $this->model_gallery->get_daftar_gallery_saya($npm,$limit,$offset);

		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'gallery/kelola_gallery/';
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
		
		
		$this->template->title('Kelola Gallery');
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->css_add('assets/plugins/Magnific-Popup/dist/magnific-popup.css');
		$this->template->js_add('assets/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js');
		$this->template->render('view_kelola_gallery', $data);
	}

	private function upload_photo($filename, $nama_file)
	{
		$configFilePhoto['file_name'] = $nama_file;
		$configFilePhoto['upload_path']          = './assets/files/gallery';
		$configFilePhoto['allowed_types']        = 'jpg|png';
		$configFilePhoto['overwrite']        = true;
		$this->upload->initialize($configFilePhoto);
		if ( ! $this->upload->do_upload($filename))
		{
			$data = array('error' => $this->upload->display_errors());
		}  else
		{
			

			$data = array('upload_data' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/files/gallery/' . $data['upload_data']['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 100;
			$config['height']       = 100;
			$config['thumb_marker']       = '';
			$config['new_image']       = './assets/files/gallery/thumb/' . $data['upload_data']['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
		return $data;
	}
	public function tambah_gallery()
	{
		if ($this->input->post()) {
			$data['judul'] = $this->input->post('judul');
			$data['date_created'] = date('Y:m:d H:i:s');
			$data['npm_author'] = $this->session->userdata('username');
			$uploadPhoto = $this->upload_photo("gambar", strtotime(date('Y-m-d H:i:s')));
			if (!isset($uploadPhoto['error'])  ) {
				$data['nama_file'] = $uploadPhoto['upload_data']['file_name'];
			} else 
			{
				$error = $uploadPhoto['error'];
			}
			$this->model_gallery->tambah_gallery($data);	
			redirect('gallery/kelola_gallery');
		}
		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');
		$this->template->render('view_tambah_gallery');

	}

	public function daftar_gallery() 
	{

		$totalRow = $this->model_gallery->get_total_row_gallery();
		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$limit  = 45;
		$data['gallery'] = $this->model_gallery->get_daftar_gallery($limit, $offset);
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'gallery/daftar_gallery/';
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

		$this->template->title('Gallery');
		$this->template->css_add('assets/template/inspinia_271/css/plugins/blueimp/css/blueimp-gallery.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/blueimp/jquery.blueimp-gallery.min.js');
		$this->template->render('view_daftar_gallery', $data);

	}

}

/* End of file Gallery.php */
/* Location: ./application/modules/gallery/controllers/Gallery.php */