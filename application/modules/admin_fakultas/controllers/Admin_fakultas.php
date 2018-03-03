<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_fakultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$id_role = $this->session->userdata('id_role');
		$this->template->set_template('template_admin_fakultas');
		$this->load->model('users/model_users');
		if ($this->model_users->logged_in() == null) {
			redirect('');
		}
	}
	public function index()
	{
		$this->template->title('Dashboard');
		$this->template->render('view_dashboard');
	}

	public function daftar_alumni()
	{
		$this->template->title('Daftar Alumni');
		$this->template->render('view_daftar_alumni');
	}

}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */