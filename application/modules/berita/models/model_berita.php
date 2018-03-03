<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_berita extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	//Do your magic here
	}
	public function insertBerita($data)
	{
		$res = $this->db->insert('berita', $data);
		return $res;
	}
	public function getTotalRowBerita()
	{
		$this->db->where('aktif', 'Y');
		$this->db->order_by('date_created', 'DESC');
		$result = $this->db->get('berita')->result_array();
		return count($result);

	}
	public function getTotalRowBeritaSaya($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->order_by('date_created', 'DESC');
		$result = $this->db->get('berita')->result_array();
		return count($result);

	}
	
	public function getDaftarBerita($limit, $offset)
	{
		$this->db->select('berita.*, role.nama as nama_role');
		$this->db->from('berita');
		$this->db->join('users', 'berita.id_user = users.id_user');
		$this->db->join('role', 'role.id_role = users.id_role');
		$this->db->where('berita.aktif', 'Y');
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit, $offset);
		return 		$this->db->get()->result_array();
	}
	public function getBeritaSaya($id_user, $limit, $offset)
	{	
		$this->db->where('id_user', $id_user);
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('berita', $limit, $offset)->result_array();
	}
	public function getDetailBerita($id)
	{
		$this->db->select('berita.*, role.id_role, role.nama as nama_role');
		$this->db->from('berita');
		$this->db->join('users', 'berita.id_user = users.id_user');
		$this->db->join('role', 'users.id_role = role.id_role');
		$this->db->where('berita.id', $id);
		return 	$this->db->get()->row_array();
	}

	public function ubahBerita($id, $data)
	{
		$this->db->where('id', $id);
		$res = $this->db->update('berita', $data);
		return $res;
	}
}

/* End of file model_berita.php */
/* Location: ./application/modules/berita/models/model_berita.php */