<?php
/**
 * 
 */
class M_mhs extends CI_Model
{
	public $table = 'tbl_mahasiswa';
	function __construct()
	{
	parent::__construct();
	}

	function total_row(){
		$this->db->select('id')->from($this->table);
		return $this->db->get();
	}
	function get_datatable($prodi,$semester,$angkatan){
		
		if ($prodi !='' AND $semester !='') {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester
					FROM tbl_mahasiswa a
				 	INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi								 
                    INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.prodi_id=$prodi and a.semester_id='$semester' ORDER BY nim ASC";
                     return $this->db->query($query);
		}elseif ($prodi != '') {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester
					FROM tbl_mahasiswa a
				 	INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi								 
                    INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.prodi_id='$prodi' ORDER BY nim ASC";
                     return $this->db->query($query);
		}elseif ($semester !='') {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester
					FROM tbl_mahasiswa a
				 	INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi								 
                    INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.semester_id='$semester' ORDER BY nim ASC";
                     return $this->db->query($query);
		}elseif ($angkatan !='') {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id INNER JOIN app_angkatan d ON a.angkatan_id=d.id_angkatan WHERE a.angkatan_id='$angkatan' ORDER BY nim ASC ";
                     return $this->db->query($query);
		}
		else{
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY nim ASC ";
                     return $this->db->query($query);
		}
		
	   
	}
	public function lihat_kelas($angkatan)
	{
		$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.id_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id INNER JOIN app_angkatan d ON a.angkatan_id=d.id_angkatan WHERE d.thn_angkatan='$angkatan' ORDER BY nim ASC ";
                     return $this->db->query($query);
	}
	function save_data($data){
		return $this->db->insert('tbl_mahasiswa', $data);
	}
	function update_data($data,$nim){
		$this->db->where('nim', $nim);
		$this->db->update('tbl_mahasiswa', $data);
	}
	function delete_data($nim){
		return $this->db->query("DELETE FROM tbl_mahasiswa where nim='$nim'");
	}
	function get_data_rombel($value='')
	{
		$sql="SELECT a.id_rombel,b.thn_angkatan,c.nama_dsn,d.nama_prodi FROM app_rombel a INNER JOIN app_angkatan b ON a.angkatan_id=b.id_angkatan INNER JOIN tbl_dosen c ON a.dosen_wali=c.nrp INNER JOIN tbl_prodi d ON a.prodi_id=d.id_prodi ";
		return $this->db->query($sql);
	}
}