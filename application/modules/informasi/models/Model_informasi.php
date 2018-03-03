<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_informasi extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	//Do your magic here
	}
	public function insertInformasi($data)
	{
		$res = $this->db->insert('informasi', $data);
		return $res;
	}
	public function getTotalRowInformasi()
	{
		$id_role = $this->session->userdata('id_role');
		$allowed_fakultas = array();
		if ($id_role == '11') {
			$npm = $this->session->userdata('username');
			$this->db->select('fakultas.id_fakultas');
			$this->db->from('alumni');
			$this->db->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
			$this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.id_fakultas');
			$this->db->where('alumni.npm', $npm);
			$id_fakultas = $this->db->get()->row_array()['id_fakultas'];
			$allowed_fakultas[] = 0;
			$allowed_fakultas[] = $id_fakultas;
		}
		$this->db->select('informasi.*, alumni.npm, alumni.nama, role.id_role, role.nama as nama_role');
		$this->db->from('informasi');
		$this->db->join('users', 'informasi.id_user = users.id_user', 'LEFT');
		$this->db->join('alumni', 'users.username = alumni.npm', 'LEFT');
		$this->db->join('role', 'users.id_role = role.id_role', 'LEFT');
		$this->db->where('informasi.aktif', 'Y');
		if (!empty($allowed_fakultas)) {
			$this->db->where_in('informasi.id_fakultas', $allowed_fakultas);
		}

		$this->db->order_by('date_created', 'DESC');
		return $this->db->get()->num_rows();

	}
	public function getTotalRowInformasiSaya()
	{

		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('date_created', 'DESC');
		$result = $this->db->get('informasi')->result_array();
		return count($result);

	}
	
	public function getDaftarInformasi($limit, $offset)
	{	
		$id_role = $this->session->userdata('id_role');
		$allowed_fakultas = array();
		if ($id_role == '11') {
			$npm = $this->session->userdata('username');
			$this->db->select('fakultas.id_fakultas');
			$this->db->from('alumni');
			$this->db->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
			$this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.id_fakultas');

			$this->db->where('npm', $npm);
			$id_fakultas = $this->db->get()->row_array()['id_fakultas'];
			
			$allowed_fakultas[] = 0;
			$allowed_fakultas[] = $id_fakultas;
		}
		$this->db->select('informasi.*, alumni.nama, role.id_role, role.nama as nama_role, fakultas.nama_fakultas');
		$this->db->from('informasi');
		$this->db->join('users', 'informasi.id_user = users.id_user', 'LEFT');
		$this->db->join('alumni', 'users.username = alumni.npm', 'LEFT');
		$this->db->join('fakultas', 'informasi.id_fakultas = fakultas.id_fakultas', 'LEFT');
		$this->db->join('role', 'users.id_role = role.id_role', 'LEFT');

		$this->db->where('informasi.aktif', 'Y');
		if (!empty($allowed_fakultas)) {
			$this->db->where_in('informasi.id_fakultas', $allowed_fakultas);
		}

		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get()->result_array();
	}
	public function getInformasiSaya($limit, $offset)
	{
		$id_user = $this->session->userdata('id_user');

		$this->db->select('informasi.*, fakultas.*');
		$this->db->from('informasi');
		$this->db->join('fakultas', 'fakultas.id_fakultas = informasi.id_fakultas', 'LEFT');
		$this->db->where('informasi.id_user', $id_user);
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get()->result_array();
	}
	public function getDetailInformasi($id)
	{
		$this->db->select('informasi.*, alumni.nama, alumni.npm , role.id_role, role.nama');
		$this->db->from('informasi');
		$this->db->join('users', 'informasi.id_user = users.id_user', 'LEFT');
		$this->db->join('alumni', 'users.username = alumni.npm', 'LEFT');
		$this->db->join('role', 'users.id_role = role.id_role', 'LEFT');

		$this->db->where('id', $id);
		$res = $this->db->get()->row_array();
		
		return $res;
	}

	public function ubahInformasi($id, $data)
	{
		$this->db->where('id', $id);
		$res = $this->db->update('informasi', $data);
		return $res;
	}
}

/* End of file model_informasi.php */
/* Location: ./application/modules/informasi/models/model_informasi.php */