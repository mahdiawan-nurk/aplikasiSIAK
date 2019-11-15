<?php 
function comboboxMainmenu()
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$level' AND hak_akses.id_menu='$id' AND tbl_menu.main_menu='0' ");
	
	
	
	
}
