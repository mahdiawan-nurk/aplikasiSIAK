<?php
/**
 * 
 */
class M_dsn extends CI_Model
{
	public $table = 'tbl_dosen';
	function __construct()
	{
	parent::__construct();
	}

	function total_row(){
		$this->db->select('id')->from($this->table);
		return $this->db->get();
	}
	function get_datatable(){
		$query= "SELECT a.*, b.nama_prodi prodi
					FROM tbl_dosen a
				 	INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi								 
                     ORDER BY nama_dsn ASC";
	    return $this->db->query($query);
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
	function get_data_dsn(){
		return $this->db->get('tbl_dosen');
	}
}