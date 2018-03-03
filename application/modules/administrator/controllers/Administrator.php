<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_administrator');
		$this->load->model('users/model_users');
		if ($this->model_users->logged_in() == null) {
			redirect('');
		}
	}

	public function grafik()
	{

		
		$data['grafik'] = $this->model_administrator->get_data_grafik();
		
		
		$this->template->title('Grafik Pekerjaan Alumni');
		$this->template->js_add('assets/plugins/Highcharts/code/css/highcharts.css');
		$this->template->js_add('assets/plugins/Highcharts/code/highcharts.js');
		$this->template->js_add('assets/plugins/Highcharts/code/modules/exporting.js');
		$this->template->js_add('assets/plugins/Highcharts/code/modules/offline-exporting.js');
		$this->template->render('view_grafik', $data);

	}
	public function index()
	{
		redirect('dashboard','refresh');
	}
	
	public function json_get_list_persetujuan_alumni()
	{
		$res = $this->model_administrator->get_list_alumni_persetujuan();
		header('Content-Type: application/json');
		echo ($res);

	}

	public function set_aktif_alumni()
	{
		$npm = $this->input->post('npm');
		$pilihan = $this->input->post('pilihan');

		$res = $this->model_administrator->set_aktif_alumni($pilihan,$npm);
		echo json_encode('OK');

	}
	public function list_persetujuan_alumni()
	{
		
		$this->template->title('Persetujuan Alumni');
		$this->template->css_add('assets/plugins/DataTables/DataTables/css/dataTables.bootstrap.min.css');
		$this->template->css_add('assets/plugins/DataTables/DataTables/css/jquery.dataTables.min.css');
		$this->template->js_add('assets/plugins/DataTables/DataTables/js/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/plugins/DataTables/DataTables/js/jquery.dataTables.min.js');
		$this->template->render('view_list_persetujuan_alumni');

	}


}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */