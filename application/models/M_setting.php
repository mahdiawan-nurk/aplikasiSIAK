<?php
/**
 * 
 */
class M_setting extends CI_Model
{
	public $prodi = 'tbl_prodi';
	public $semester = 'tbl_semester';
	public $angkatan = 'app_angkatan';
	function __construct()
	{
	parent::__construct();
	}
	function ambil_prodi(){
		return $this->db->get($this->prodi);
	}
	function ambil_prodi_b(){
		$sql="SELECT a.*, b.nama_dsn FROM tbl_prodi a LEFT JOIN tbl_dosen b ON a.ketua=b.nrp ";
		return $this->db->query($sql);
	}
	function ambil_semester(){
		return $this->db->get($this->semester);
	}
	function ambil_angkatan(){
		return $this->db->get($this->angkatan);
	}
	function data_pengumuman(){
		return $this->db->get('con_reg');
	}
	function update_data_prodi($data,$id)
	{
		$this->db->where('id_prodi', $id);
		$this->db->update('tbl_prodi', $data);
	}

}