<?php
/**
 * 
 */
class M_menu extends CI_Model
{
	public $menu = 'tbl_menu';
	
	function __construct()
	{
	parent::__construct();
	}
	function data_main_menu(){
		$sql= "  SELECT * FROM tbl_menu where main_menu='0' ORDER BY nama_menu";
		 return $this->db->query($sql);
	}
	function data_sub_menu(){
		$sql= "  SELECT * FROM tbl_menu where main_menu !='0' ORDER BY nama_menu" ;
		 return $this->db->query($sql);
	}

	function save_main_menu($data){
		return $this->db->insert('tbl_menu',$data);
	}
	function save_sub_menu($data){
		return $this->db->insert('tbl_menu',$data);
	}

	function update_main_menu($id,$data)
	{
		$this->db->where('id_menu',$id);
		return $this->db->update('tbl_menu',$data);
	}
	function update_sub_menu($id,$data)
	{
		$this->db->where('id_menu',$id);
		return $this->db->update('tbl_menu',$data);
	}
	function delete_menu($data)
	{
		return $this->db->delete('tbl_menu',$data);
	}
	function get_menu($id_menu)
	{
		return $this->db->get_where('tbl_menu', array('id_menu' =>$id_menu  ));
	}
}