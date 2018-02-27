<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alumni extends CI_Model {


	public function get_data_cetak_alumni($data)
	{

		$kondisi = array();
		if (isset($data['fakultas.id_fakultas'])) {
			$this->db->where('id_fakultas', $data['fakultas.id_fakultas']);
			$res = $this->db->get('fakultas')->row_array();

			$kondisi[] = ['nama' => 'Fakultas', 'nilai' => $res['nama_fakultas']];
			
		}
		if (isset($data['jurusan.id_jurusan'])) {
			$this->db->where('id_jurusan', $data['jurusan.id_jurusan']);
			$res = $this->db->get('jurusan')->row_array();
			$kondisi[] = ['nama' => 'Jurusan', 'nilai' => $res['nama_jurusan']];
			
		}
		if (isset($data['alumni.angkatan'])) {
			$kondisi[] = ['nama' => 'Angkatan', 'nilai' => $data['alumni.angkatan']];
		}
		if (isset($data['alumni.tahun_lulus'])) {
			$kondisi[] = ['nama' => 'Tahun Lulus', 'nilai' => $data['alumni.tahun_lulus']];


		}
		if (isset($data['alumni.periode_lulus'])) {
			$kondisi[] = ['nama' => 'Periode Lulus', 'nilai' => $data['alumni.periode_lulus']];


		}
		if (isset($data['alumni.id_status_pekerjaan'])) {

			$this->db->where('id', $data['alumni.id_status_pekerjaan']);
			$res = $this->db->get('status_pekerjaan')->row_array();
			$kondisi[] = ['nama' => 'Status Pekerjaan', 'nilai' => $res['keterangan']];

		}

		if (isset($data['alumni.id_waktu_tunggu'])) {
			$this->db->where('id', $data['alumni.id_waktu_tunggu']);
			$res = $this->db->get('ket_waktu_tunggu')->row_array();
			$kondisi[] = ['nama' => 'Waktu Tunggu', 'nilai' => $res['keterangan']];
		}


		$this->db->select('alumni.npm, alumni.nama, alumni.jenis_kelamin, fakultas.nama_fakultas, jurusan.nama_jurusan, CONCAT_WS("/",alumni.tahun_lulus, alumni.periode_lulus) as tahun_lulus_periode');
		$this->db->from('alumni');
		$this->db->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
		$this->db->join('fakultas', 'jurusan.id_fakultas = fakultas.id_fakultas', 'LEFT');
		$this->db->where($data);
		$this->db->where('alumni.aktif' , '1');
		
		$data_alumni =  $this->db->get()->result_array();

		$populateTable = '';
		$number = 1;
		foreach ($data_alumni as $key => $alumni) {
			$populateTable .=   '<tr>' . PHP_EOL;
			$populateTable .=		'<td>'. $number++ .'</td>'. PHP_EOL;
			$populateTable .=		'<td class="text-left">'.$alumni['npm'].'</td>'. PHP_EOL;
			$populateTable .=		'<td>'.$alumni['nama'].'</td>'. PHP_EOL;
			$populateTable .=		'<td>'.$alumni['nama_jurusan'].'</td>'. PHP_EOL;
			$populateTable .=		'<td>'.$alumni['nama_fakultas'].'</td>';
			$populateTable .=		'<td>'.$alumni['tahun_lulus_periode'].'</td>'. PHP_EOL;
			$populateTable .=	    '</tr>';
		};
		
		$result['total'] = count($data_alumni);
		$result['data_alumni'] = $populateTable;
		$result['kondisi'] = $kondisi;
		return $result;


	}
	public function get_select_option_cetak_alumni()
	{
		$this->db->select('distinct(fakultas.id_fakultas), fakultas.nama_fakultas');
		$this->db->from('alumni');
		$this->db->join('jurusan', 'jurusan.id_jurusan = alumni.id_jurusan');
		$this->db->join('fakultas', 'jurusan.id_fakultas = fakultas.id_fakultas');
		$this->db->order_by('fakultas.id_fakultas', 'ASC');
		$this->db->where('alumni.aktif' , '1');

		$data['fakultas'] = $this->db->get()->result_array(); 


		$this->db->select('distinct(jurusan.id_jurusan), jurusan.id_fakultas, jurusan.nama_jurusan');
		$this->db->from('alumni');
		$this->db->join('jurusan', 'jurusan.id_jurusan = alumni.id_jurusan');
		$this->db->order_by('jurusan.id_jurusan', 'ASC');
		$this->db->where('alumni.aktif' , '1');

		$data['jurusan'] = $this->db->get()->result_array(); 

		$this->db->select('distinct(alumni.angkatan)');
		$this->db->from('alumni');
		$this->db->order_by('angkatan', 'DESC');
		$this->db->where('alumni.aktif' , '1');

		$data['angkatan'] = $this->db->get()->result_array();


		$this->db->select('distinct(alumni.tahun_lulus)');
		$this->db->from('alumni');
		$this->db->order_by('tahun_lulus', 'DESC');
		$this->db->where('alumni.aktif' , '1');

		$data['tahun_lulus'] = $this->db->get()->result_array();


		$this->db->select('distinct(alumni.periode_lulus)');
		$this->db->from('alumni');
		$this->db->order_by('periode_lulus', 'ASC');
		$this->db->where('alumni.aktif' , '1');

		$data['periode_lulus'] = $this->db->get()->result_array();


		$this->db->select('distinct(status_pekerjaan.id), status_pekerjaan.keterangan as keterangan_pekerjaan');
		$this->db->from('alumni');
		$this->db->join('status_pekerjaan', 'alumni.id_status_pekerjaan = status_pekerjaan.id');
		$this->db->order_by('status_pekerjaan.id', 'ASC');
		$this->db->where('alumni.aktif' , '1');

		$data['status_pekerjaan'] = $this->db->get()->result_array();



		$this->db->select('distinct(ket_waktu_tunggu.id), ket_waktu_tunggu.keterangan as keterangan_waktu_tunggu');
		$this->db->from('alumni');
		$this->db->join('ket_waktu_tunggu', 'alumni.id_waktu_tunggu = ket_waktu_tunggu.id');
		$this->db->order_by('ket_waktu_tunggu.id', 'ASC');
		$this->db->where('alumni.aktif' , '1');
		
		$data['waktu_tunggu'] = $this->db->get()->result_array();

		return $data;
	}

	public function get_daftar_alumni()
	{
		$this->load->library('datatables');
		$this->datatables->select('alumni.npm, alumni.nama, jurusan.nama_jurusan, fakultas.nama_fakultas, alumni.tahun_lulus, alumni.periode_lulus');
		$this->datatables->from('alumni');
		$this->datatables->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
		$this->datatables->join('fakultas', 'jurusan.id_fakultas = fakultas.id_fakultas');
		$this->datatables->where('alumni.aktif', '1');
		$this->datatables->add_column('detail', '<button class="btn btn-primary" onclick="showModals($1)">Detail</button>', 'npm');
		$this->datatables->add_column('nomor', '0');
		$this->datatables->add_column('tahun_lulus_periode', '$1 / $2', 'tahun_lulus,periode_lulus' );
		return $this->datatables->generate();
	}
	public function get_daftar_alumni_biasa($condition = null)
	{
		$this->db->select('alumni.nama, alumni.jenis_kelamin, jurusan.nama_jurusan, alumni.tempat_lahir, alumni.tanggal_lahir, alumni.no_hp');
		$this->db->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
		if ($condition != null) {
			$this->db->where($condition);
		}
		return $this->db->get('alumni')->result_array();
	}

	public function ubah_profile($npm, $dataAlumni, $dataUser)
	{
		if (!empty($dataUser['password'])) {
			$this->db->where('username', $npm);
			$this->db->update('users',$dataUser);
		}
		$this->db->where('npm', $npm);
		$this->db->update('alumni', $dataAlumni);

	}
	public function register_alumni($dataAlumni, $dataUser)
	{

		$user = $this->db->insert('users',$dataUser);
		$alumni = $this->db->insert('alumni', $dataAlumni);
		if ($user === true && $alumni === true) {
			return true;
		}
		return false;


	}	

	public function get_detail_alumni($npm)
	{
		$this->db->select('alumni.*, jurusan.nama_jurusan, status_pekerjaan.keterangan as keterangan_pekerjaan, ket_waktu_tunggu.keterangan as waktu_tunggu, fakultas.id_fakultas, fakultas.nama_fakultas');
		$this->db->from('alumni');
		$this->db->join('jurusan', 'alumni.id_jurusan = jurusan.id_jurusan');
		$this->db->join('fakultas', 'jurusan.id_fakultas = fakultas.id_fakultas');
		$this->db->join('status_pekerjaan', 'status_pekerjaan.id = alumni.id_status_pekerjaan', 'LEFT');
		$this->db->join('ket_waktu_tunggu', 'ket_waktu_tunggu.id = alumni.id_waktu_tunggu', 'LEFT');
		$this->db->where('npm', $npm);
		$res =  $this->db->get()->row_array();
		if (isset($res['tempat_lahir']) && isset($res['tanggal_lahir']) ) {
			$res['ttl'] = $res['tempat_lahir'] .' , ' .  tanggal_indo($res['tanggal_lahir']);
		}
		$res['tanggal_sidang'] = tanggal_indo($res['tanggal_sidang']);
		return $res;
	}

	public function get_option_jurusan($id_fakultas)
	{
		$this->db->where('id_fakultas', $id_fakultas);
		$res = $this->db->get('jurusan')->result_array();
		$options = '';
		foreach ($res as $key => $option) {
			$options .= '<option value="'.$option['id_jurusan'].'">'. $option['nama_jurusan'] .'</option>';
		}
		return $options;

	}
	public function get_status_pekerjaan()
	{
		$res = $this->db->get('status_pekerjaan')->result_array();
		return $res;
	}
	public function get_waktu_tunggu()
	{
		$res = $this->db->get('ket_waktu_tunggu')->result_array();
		return $res;
	}
	public function get_list_fakultas()
	{
		$res = $this->db->get('fakultas')->result_array();
		return $res;

	}

	public function get_list_jurusan($id_fakultas)
	{
		$this->db->where('id_fakultas', $id_fakultas);
		$res = $this->db->get('jurusan')->result_array();
		return $res;
	}
}

/* End of file model_alumni.php */
/* Location: ./application/modules/alumni/models/model_alumni.php */