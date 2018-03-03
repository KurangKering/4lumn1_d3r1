<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_alumni');
	}

	public function menu_cetak_data_alumni()
	{

		
		$data['select'] = $this->model_alumni->get_select_option_cetak_alumni();

		$this->template->title("Cetak Data Alumni");
		$this->template->render('view_menu_cetak_data_alumni',$data);

	}
	public function cetak_data_alumni()
	{
		set_time_limit(60);
		if ($this->input->post()) {
			$tmp['fakultas.id_fakultas'] = $this->input->post('fakultas');
			$tmp['jurusan.id_jurusan'] =	 $this->input->post('jurusan');
			$tmp['alumni.angkatan'] =	 $this->input->post('angkatan');
			$tmp['alumni.tahun_lulus'] =	 $this->input->post('tahun_lulus');
			$tmp['alumni.periode_lulus']	 =	 $this->input->post('periode_lulus');
			$tmp['alumni.id_status_pekerjaan']	 =	 $this->input->post('status_pekerjaan');
			$tmp['alumni.id_waktu_tunggu']	 =	 $this->input->post('id_waktu_tunggu');
			$cetak_alumni = $this->model_alumni->get_data_cetak_alumni(array_filter($tmp));
			if (isset($cetak_alumni)) {
				$output = $this->load->view('view_laporan_alumni', $cetak_alumni, TRUE);

				
				$this->load->library('pdf');
				$this->dompdf->set_option('isRemoteEnabled', TRUE);
				$this->dompdf->load_html($output);
				$this->dompdf->set_paper("A4", "landscape");
				$this->dompdf->render();
				$this->dompdf->stream("Laporan_Daftar_Alumni",array("Attachment"=>0));
			} else
			{
				echo "<script type='text/javascript'>";
				echo "window.close();";
				echo "</script>";
			}
		}
		echo "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";
	}
	public function daftar_alumni()
	{
		$this->template->title('Daftar Alumni');
		$this->template->css_add('assets/plugins/DataTables/DataTables/css/dataTables.bootstrap.min.css');
		$this->template->css_add('assets/plugins/DataTables/DataTables/css/jquery.dataTables.min.css');
		$this->template->js_add('assets/plugins/DataTables/DataTables/js/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/plugins/DataTables/DataTables/js/jquery.dataTables.min.js');
		$this->template->render('view_daftar_alumni');
	}
	public function json_get_daftar_alumni()
	{
		$res = $this->model_alumni->get_daftar_alumni();
		header('Content-Type: application/json');
		echo ($res);	
	}
	public function json_get_detail_alumni()
	{
		$npm = $this->input->post('npm');
		$res = $this->model_alumni->get_detail_alumni($npm);
		header('Content-Type: application/json');
		echo (json_encode($res));
	}

	public function index()
	{
		redirect('dashboard','refresh');
	}

	private function upload_photo($npm,$filename)
	{
		$configFilePhoto['file_name'] = $npm;
		$configFilePhoto['upload_path']          = './assets/files/alumni';
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
	public function ubah_profile()
	{
		error_reporting(0);

		if ($this->input->post()) {
			$npm = $this->input->post('hidden_npm');
			$container['email'] = $this->input->post('email');
			$container['nama'] = $this->input->post('nama');
			$container['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$container['tempat_lahir'] = $this->input->post('tempat_lahir');
			$container['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$container['alamat'] = $this->input->post('alamat');
			$container['no_hp'] = $this->input->post('no_hp');
			$container['id_status_pekerjaan'] = $this->input->post('id_status_pekerjaan');
			$container['nama_instansi'] = $this->input->post('nama_instansi');
			$container['alamat_instansi'] = $this->input->post('alamat_instansi');
			$container['id_waktu_tunggu'] = $this->input->post('id_waktu_tunggu');
			$user['password'] = $this->input->post('password');
			$photos = $this->upload_photo($npm, 'file_photo');
			if (isset($photos['upload_data'])) {
				$container['photo'] = $photos['upload_data']['file_name'];

			}

			$this->model_alumni->ubah_profile($npm, $container, $user);
			redirect('alumni/profile');

		}
		$data['status_pekerjaan'] =$this->model_alumni->get_status_pekerjaan();
		$data['list_fakultas'] = $this->model_alumni->get_list_fakultas();
		$data['waktu_tunggu'] = $this->model_alumni->get_waktu_tunggu();
		$npm = $this->session->userdata('username');
		$data['profile'] = $this->model_alumni->get_detail_alumni($npm);


		$this->template->css_add('assets/template/inspinia_271/css/plugins/jasny/jasny-bootstrap.min.css');
		$this->template->js_add('assets/template/inspinia_271/js/plugins/jasny/jasny-bootstrap.min.js');

		$this->template->title('Ubah Profile');
		$this->template->render('view_ubah_profile', $data);
	}
	public function profile()
	{

		$npm = $this->session->userdata('username');
		$data['profile'] = $this->model_alumni->get_detail_alumni($npm);

		$this->template->title('Profile Alumni');
		$this->template->render('view_profile', $data);
	}

	public function set_option_register()
	{
		$id_fakultas = $this->input->post('id_fakultas');
		echo $this->model_alumni->get_option_jurusan($id_fakultas);
		exit;
	}
	public function register()
	{

		$this->form_validation->set_rules('npm', 'NPM', 'trim|required|is_unique[alumni.npm]',
			array('is_unique' => "%s Telah Ada Pada Database"
				)
			);
		if ($this->form_validation->run() == TRUE) {
			$container['npm']                 = $this->input->post('npm');
			$container['email']               = $this->input->post('email');
			$container['nama']                = $this->input->post('nama') ;
			$container['jenis_kelamin']                  = $this->input->post('jenis_kelamin');
			$container['tempat_lahir']        = $this->input->post('tempat_lahir');
			$container['tanggal_lahir']       = $this->input->post('tanggal_lahir');
			$container['alamat']              = $this->input->post('alamat');
			$container['no_hp']               = $this->input->post('no_hp');
			$container['id_jurusan']             = $this->input->post('id_jurusan');
			$container['angkatan']            = $this->input->post('angkatan');
			$container['tahun_lulus']         = $this->input->post('tahun_lulus');
			$container['periode_lulus']       = $this->input->post('periode_lulus');
			$container['judul_skripsi']       = $this->input->post('judul_skripsi');
			$container['tanggal_sidang']      = $this->input->post('tanggal_sidang');
			$container['id_status_pekerjaan'] = $this->input->post('id_status_pekerjaan');
			$container['nama_instansi']       = $this->input->post('nama_instansi') ;
			$container['alamat_instansi']     = $this->input->post('alamat_instansi');
			$container['id_waktu_tunggu']     = $this->input->post('id_waktu_tunggu');

			$user['username']            = $this->input->post('npm');
			$user['password']            = $this->input->post('password');
			$user['id_role']            = '11';
			$user['date_created']            = date('Y-m-d H:i:s');
			$photos = $this->upload_photo($container['npm'], 'file_photo');
			if (isset($photos['upload_data'])) {
				$container['photo'] = $photos['upload_data']['file_name'];

			}
			if ($this->model_alumni->register_alumni($container, $user) ) {
				$this->load->view('view_register_sukses');
				return;
			} 

		} else {
			$data['error'] = validation_errors();
		}
		

		$this->form_validation->set_rules('npm', 'NPM', 'trim|required|is_unique[alumni.npm]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[alumni.email]');


		$data['status_pekerjaan'] =$this->model_alumni->get_status_pekerjaan();
		$data['list_fakultas'] = $this->model_alumni->get_list_fakultas();
		$data['waktu_tunggu'] = $this->model_alumni->get_waktu_tunggu();

		$this->load->view('view_register',$data);
	}


}

/* End of file Alumni.php */
/* Location: ./application/modules/alumni/controllers/Alumni.php */