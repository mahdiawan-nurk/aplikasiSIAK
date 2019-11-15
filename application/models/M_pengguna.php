<?php
/**
 * 
 */
class M_pengguna extends CI_Model
{
	
	
	
	function data_pengguna(){
		$sql= "SELECT * FROM users ORDER BY email ASC";
		 return $this->db->query($sql);
	}
	function data_jabatan($kon_id){
		$sql= "SELECT * FROM tr_akses,jabatan Where email='".$kon_id."' AND tr_akses.id_jabatan=jabatan.id_jabatan";
		 return $this->db->query($sql);
	}

	function save_pengguna($data){
		return $this->db->insert('users',$data);
	}
}