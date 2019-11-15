<?php
/**
 * 
 */
class M_pdf extends CI_Model
{
	public $table = 'con_reg';
	function __construct()
	{
	parent::__construct();
	}

	
	function data_pengajuan($semester){
		
			$sql ="SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester=1) AS ada, 
(SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester=1) AS terdaftar, 
(SELECT tgl_pengajuan FROM tbl_reg_before WHERE nim=a.nim AND semester=1) AS tgl_pengajuan
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY ada and terdaftar DESC";
		return $this->db->query($sql);
		
		
	}
}