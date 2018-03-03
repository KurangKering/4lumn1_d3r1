<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}
	public function index()
	{
	}
	public function login()
	{
		$id_role = $this->model_users->logged_in();

		$this->model_users->redirect_in($id_role);
		
		$data['error'] = '';
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_data = $this->model_users->login($username, $password);
			if (isset($user_data['error'])) {
				$data['error'] = $user_data['error'];
			} else
			{
				$this->session->set_userdata($user_data);
				redirect('dashboard');
				

				// switch ($user_data['id_role']) {
				// 	case '0':
				// 	redirect('administrator','refresh');
				// 	break;
				// 	case '11':
				// 	redirect('alumni','refresh');
				// 	break;
				// 	default:
				// 	redirect('admin_fakultas','refresh');
				// 	break;
				// }
			}
		}
		$this->load->view('view_login', $data);
	}
	public function logout()
	{
		$this->model_users->logout();
		redirect(site_url(),'refresh');
	}
}
/* End of file Users.php */
/* Location: ./application/modules/users/controllers/Users.php */