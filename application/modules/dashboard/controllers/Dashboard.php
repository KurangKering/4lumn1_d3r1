<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{

		$this->template->title('Sistem Informasi Alumni Universitas Islam Riau');
		$this->template->render('view_dashboard');
	}



}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */