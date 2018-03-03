<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

	public function login($username,$password)
	{

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$user_data = $this->db->get('users')->row_array();
		$result = array();
		if ($user_data) {
			if ($user_data['id_role'] === '11') {
				$alumni = $this->db->where('npm', $username)->get('alumni')->row_array();
				$id_fakultas = $this->db->select('id_fakultas')->from('jurusan')->where('id_jurusan', $alumni['id_jurusan'])->get()->row_array()['id_fakultas'];

				if ($alumni['aktif'] === '1') {
					$result['id_fakultas'] = $id_fakultas;
					$result['id_user'] = $user_data['id_user'];
					$result['username'] = $alumni['npm'];
					$result['nama'] = $alumni['nama'];
					$result['id_role'] = $user_data['id_role'];
				} else
				{
					$result['error'] = 'User Belum Mendapatkan Hak Akses';
				}
			} else 
			if (in_array($user_data['id_role'], range(1,10))) {
				$result['id_fakultas'] = $user_data['id_role'];
				$result['id_user'] = $user_data['id_user'];
				$result['username'] = $user_data['username'];
				$result['id_role'] = $user_data['id_role'];
			} else 
			if ($user_data['id_role'] == '0') {
				$result['id_fakultas'] = strval('0');
				$result['id_user'] = strval($user_data['id_user']);
				$result['username'] = $user_data['username'];
				$result['id_role'] = strval($user_data['id_role']);
			}
		} else {
			$result['error'] = 'Username / Password Tidak Ditemukan';
		}
		return $result;
	}	

	public function logged_in()
	{
		$id_role = $this->session->userdata('id_role');
		return $id_role;
	}
	public function redirect_in($id_role = null)
	{
			switch ($id_role) {
				case '11' :
				redirect('alumni','refresh');
				break;
				case range(1,10):
				redirect('admin_fakultas','refresh');
				break;
				case '0':
				redirect('administrator','refresh');
				break;

			}

	}


	public function logout()
	{
		session_destroy();
	}

}

/* End of file Model_users.php */
/* Location: ./application/modules/users/models/Model_users.php */