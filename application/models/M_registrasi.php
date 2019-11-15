<?php
/**
 * 
 */
class M_registrasi extends CI_Model
{
	public $table = 'con_reg';
	function __construct()
	{
	parent::__construct();
	}

	function config_reg(){
		$sql="SELECT a.*, (case when (now() < a.tgl_mulai_daftar) then 0 when (now() >= a.tgl_mulai_daftar and now() <= a.tgl_selesaip) then 1 else 2 end) statuse FROM pengumuman a WHERE status_pengumuman='1'  AND a.jenisp_id='1'";
		return $this->db->query($sql);
	}
	function data_mhs($id_users){
		$sql ="SELECT a.*, c.nama_prodi prodi, d.nama semester
					FROM tbl_mahasiswa a
				 	INNER JOIN tbl_prodi c ON a.prodi_id = c.kode_prodi								
                    INNER JOIN tbl_semester d ON a.semester_id = d.id
                    WHERE a.email='".$id_users."'";
		return $this->db->query($sql);
	}
	function cek_data_regis($id_users,$semester){
		$sql ="SELECT * FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim WHERE a.semester='$semester' AND b.email='".$id_users."' ";
		return $this->db->query($sql);
	}
	function data($prodi,$semester){
		if ($semester!='') {
			$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE c.kode_prodi='$prodi' AND a.semester='$semester'";
		return $this->db->query($sql);
		}else{
			$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE c.kode_prodi='$prodi' AND a.semester='1'";
		return $this->db->query($sql);
		}
		
	}
	function data_team($prodi1,$prodi,$semester){
		if ($prodi !='' AND $semester !='') {
				$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama sem FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE a.semester='$semester' AND b.prodi_id='$prodi' ";
		return $this->db->query($sql);
		}else{
			$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama sem FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE a.semester='$semester' AND b.prodi_id='$prodi1'";
		return $this->db->query($sql);
		}
		
	}

function data_tem_perpus($prodi,$semester){
		if ($prodi !='' AND $semester !='') {
				$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama sem FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE a.semester='$semester' AND b.prodi_id='$prodi' ";
		return $this->db->query($sql);
		}else{
			$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama sem FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id WHERE a.semester='$semester'";
		return $this->db->query($sql);
		}
		
	}

function data_dosen_wali($id,$semester){
	if ($semester!='') {
		$sql ="SELECT a.rombel_id,b.nama_mhs,c.nama_prodi,d.nama,e.* FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id INNER JOIN tbl_reg_before e ON a.nim=e.nim WHERE rombel_id=$id AND e.semester='$semester'";
		return $this->db->query($sql);
	}else{
		$sql ="SELECT a.rombel_id,b.nama_mhs,c.nama_prodi,d.nama,e.* FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id INNER JOIN tbl_reg_before e ON a.nim=e.nim WHERE rombel_id=$id AND e.semester='1'";
		return $this->db->query($sql);
	}
		
			
		
		
	}
	function data_selesai_daftar($semester){
		if ($semester!='') {
			$sql ="SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS ada, 
(SELECT tgl_terdaftar FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS tgl_terdaftar,
(SELECT bb.nama FROM tbl_reg_selesai aa INNER JOIN tbl_semester bb ON aa.semester_aktif=bb.id WHERE nim=a.nim AND semester_sebelum='$semester') AS semester_aktif,
(SELECT status FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum=1) AS status_mhs
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY a.prodi_id ASC";
		return $this->db->query($sql);
		}else{
			$sql ="SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND thn_akademik='2019-1') AS ada, 
(SELECT tgl_terdaftar FROM tbl_reg_selesai WHERE nim=a.nim AND thn_akademik='2019-1') AS tgl_terdaftar,
(SELECT bb.nama FROM tbl_reg_selesai aa INNER JOIN tbl_semester bb ON aa.semester_aktif=bb.id WHERE nim=a.nim AND thn_akademik='2019-1') AS semester_aktif,
(SELECT status FROM tbl_reg_selesai WHERE nim=a.nim AND thn_akademik='2019-1') AS status_mhs
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY a.prodi_id ASC";
		return $this->db->query($sql);
		}
	}
	function data_histori($id){
		$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama semester FROM tbl_reg_selesai a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id  WHERE a.nim='$id'";
		return $this->db->query($sql);
	}
	function data_lst($nim){
		$sql ="SELECT a.*, b.nama_mhs nama, c.nama_prodi prodi,d.nama semester FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim = b.nim INNER JOIN tbl_prodi c ON b.prodi_id = c.id_prodi INNER JOIN tbl_semester d ON b.semester_id = d.id
WHERE a.nim=201613010
";
		return $this->db->query($sql);
	}

	function data_pengajuan($semester){
		if ($semester!='') {
			$sql ="SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS ada, 
(SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS terdaftar, 
(SELECT tgl_pengajuan FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS tgl_pengajuan
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY a.prodi_id ASC";
		return $this->db->query($sql);
		}else{
			$sql ="SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester=1) AS ada, 
(SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum=1) AS terdaftar, 
(SELECT tgl_pengajuan FROM tbl_reg_before WHERE nim=a.nim AND semester=1) AS tgl_pengajuan
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id ORDER BY a.prodi_id ASC";
		return $this->db->query($sql);
		}
		
	}
}