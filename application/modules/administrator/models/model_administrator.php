<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_administrator extends CI_Model {



	public function get_data_grafik($condition = null)
	{
		$data = array();
		

		$table_name = 'alumni';
		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where('aktif', '1');
		$total_alumni =  $this->db->get($table_name)->num_rows();

		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where(array('aktif' => '1', 'id_status_pekerjaan' => '1'));
		$value[] = $this->db->get($table_name)->num_rows();

		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where(array('aktif' => '1', 'id_status_pekerjaan' => '2', 'id_waktu_tunggu' => '1'));
		$value[] = $this->db->get($table_name)->num_rows();

		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where(array('aktif' => '1', 'id_status_pekerjaan' => '2', 'id_waktu_tunggu' => '2'));
		$value[] = $this->db->get($table_name)->num_rows();

		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where(array('aktif' => '1', 'id_status_pekerjaan' => '2', 'id_waktu_tunggu' => '3'));
		$value[]  = $this->db->get($table_name)->num_rows();

		if (isset($condition)) {
			$this->db->where($condition);
		}
		$this->db->where(array('aktif' => '1', 'id_status_pekerjaan' => '3'));
		$value[] = $this->db->get('alumni')->num_rows();

		$populate_data = array();
		$labels = ['Tidak Bekerja', 'Bekerja, WT < 1 Tahun', 'Bekerja, WT > 1 Tahun', 'Bekerja, WT  > 2 Tahun', 'Lanjut Kuliah'];
		for ($i=0; $i < 5 ; $i++) { 
			$row['name'] = $labels[$i];
			$row['y'] = $value[$i];
			array_push($populate_data, $row);	
		}
		$data['populate_data'] = $populate_data;
		return $data;

	}
	public function set_aktif_alumni($option,$npm)
	{
		switch ($option) {
			case 'setuju':
			$this->db->where('npm', $npm);
			return $this->db->update('alumni', array('aktif' => '1'));
			break;
			case 'tolak':
			$this->db->where('username', $npm);
			$this->db->delete('users');
			$this->db->where('npm',$npm);
			$this->db->delete('alumni');
			break;
			default:

			break;
		}
		
	}
	public function get_list_alumni_persetujuan()
	{
		$this->load->library('datatables');
		$this->datatables->select('alumni.npm, alumni.nama, jurusan.nama_jurusan, fakultas.nama_fakultas, alumni.tahun_lulus, alumni.periode_lulus');
		$this->datatables->from('alumni');
		$this->datatables->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
		$this->datatables->join('fakultas', 'jurusan.id_fakultas = fakultas.id_fakultas');
		$this->datatables->where('alumni.aktif', '0');
		$this->datatables->add_column('detail', '<button class="btn btn-primary" onclick="showModals($1)">Detail</button>', 'npm');
		$this->datatables->add_column('nomor', '0');
		$this->datatables->add_column('tahun_lulus_periode', '$1 / $2', 'tahun_lulus,periode_lulus' );
		return $this->datatables->generate();
	}
	
	
	
}

/* End of file model_admin.php */
/* Location: ./application/modules/admin/models/model_admin.php */