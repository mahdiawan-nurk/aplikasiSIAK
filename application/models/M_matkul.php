<?php
/**
 * 
 */
class M_matkul extends CI_Model
{
	public $table = 'matkul_matakuliah';
	function __construct()
	{
	parent::__construct();
	}

	function total_row(){
		$this->db->select('id')->from($this->table);
		return $this->db->get();
	}
	function get_datatable($prodi,$semester){
		if ($prodi!="" AND $semester!="") {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM makul_matakuliah a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.prodi_id='$prodi' AND a.semester_id='$semester' ORDER BY a.makul_id ASC ";
	    return $this->db->query($query);
		}elseif ($prodi!="") {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM makul_matakuliah a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.prodi_id='$prodi' ORDER BY a.makul_id  ASC";
	    return $this->db->query($query);

		}elseif ($semester!="") {
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM makul_matakuliah a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.semester_id='$semester' ORDER BY a.makul_id  ASC ";
	    return $this->db->query($query);
		
		}else{
			$query= "SELECT a.*, b.nama_prodi prodi, c.nama semester FROM makul_matakuliah a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY a.makul_id ASC ";
	    return $this->db->query($query);
		}
		
	}
	function save_data($data){
		return $this->db->insert('tbl_dosen', $data);
	}
	function update_data($data,$id){
		$this->db->where('id_dosen', $id);
		$this->db->update('tbl_dosen', $data);
	}
	function delete_data($id){
		return $this->db->query("DELETE FROM tbl_dosen where id_dosen='$id'");
	}
}