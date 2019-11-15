<?php
/**
 * 
 */
class M_jadwal extends CI_Model
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
		$query= "SELECT a.kode_makul, b.nama_makul,c.hari,d.nama_ruangan,f.nama_dsn,a.jam_mulai,a.jam_selesai FROM app_tr_jadwal a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul INNER JOIN app_hari c ON a.hari_id=c.hari_id INNER JOIN app_ruangan d ON a.ruangan_id=d.ruangan_id INNER JOIN app_dosen_ajar e ON a.kode_makul=e.kode_makul LEFT JOIN tbl_dosen f ON e.id_dosen=f.nrp 								 
                     ORDER BY a.kode_makul ASC";
	    return $this->db->query($query);
	}
	function save_data($data){
		return $this->db->insert('app_dosen_ajar', $data);
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