<?php
/**
 * 
 */
class M_jabatan extends CI_Model
{
	
	
	function __construct()
	{
	parent::__construct();
	}
	function data_jabatan(){
		$sql= "SELECT *FROM jabatan ORDER BY jabatan ASC ";
		 return $this->db->query($sql);
	}
	function data_sub_menu(){
		$sql= "  SELECT * FROM tbl_menu where main_menu !='0' ORDER BY nama_menu" ;
		 return $this->db->query($sql);
	}
}