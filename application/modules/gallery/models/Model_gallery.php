<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gallery extends CI_Model {


	public function tambah_gallery($data)
	{
		return		$this->db->insert('gallery', $data);

	}
	public function hapus_gallery($id_gallery)
	{
		$this->db->where('id_gallery', $id_gallery);
		return $this->db->delete('gallery');
	}
	public function ubah_gallery($id,$data)
	{
		$this->db->where('id_gallery', $id);
		return $this->db->update('gallery', $data);

	}
	public function get_detail_gallery($id)
	{
		$this->db->where('id_gallery', $id);
		return $this->db->get('gallery')->row_array();
	}

	public function get_total_row_gallery()
	{
		return $this->db->get('gallery')->num_rows();
	}
	public function get_daftar_gallery($limit,$offset)
	{	
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit,$offset);
		return $this->db->get('gallery')->result_array();
	}

	public function get_total_row_gallery_saya($npm)
	{
		$this->db->where('npm_author', $npm);
		return $this->db->get('gallery')->num_rows();
	}
	public function get_daftar_gallery_saya($npm, $limit, $offset)
	{
		$this->db->where('npm_author', $npm);
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit,$offset);
		return $this->db->get('gallery')->result_array();
	}
	

}

/* End of file Model_gallery.php */
/* Location: ./application/modules/gallery/models/Model_gallery.php */