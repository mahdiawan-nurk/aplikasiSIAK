<?php
function cek_akses_main($level,$id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$level' AND hak_akses.id_menu='$id' AND tbl_menu.main_menu='0' ");
	if ($hasil->num_rows() >0) {
		return "checked='checked'";
		}
	
	
	
}

function cek_akses_sub($level,$id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM hak_akses Where hak_akses.id_jabatan='$level' AND hak_akses.id_menu='$id' ");
	if ($hasil->num_rows() >0) {
		return "checked='checked'";
		}
	
	
	
}
function cek_btn($id,$semester,$thn)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT a.*,(SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS pengajuan, (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS selesai FROM tbl_mahasiswa a WHERE a.nim='$id' ")->row();
	
			if ($hasil->pengajuan == 1 && $hasil->selesai== 0) {
				return "<button class='btn btn-success' onclick='cek_status($semester)'>Cek Status</button>";
			}elseif ($hasil->pengajuan == 0 && $hasil->selesai== 1) {
				return "<button class='btn btn-success' onclick='cek_status($semester)'>Registrasi Telah selesai</button>";
			}elseif ($hasil->pengajuan == 0 && $hasil->selesai== 0) {
				$hasil1 = $ci->db->query("SELECT a.*, (case when (now() < a.tgl_mulai_daftar) then 0 when (now() >= a.tgl_mulai_daftar and now() <= a.tgl_selesaip) then 1 else 2 end) statuse FROM pengumuman a WHERE status_pengumuman='1' AND thn_akademik='$thn'");

		foreach ($hasil1->result() as $key) {
		if ($key->statuse == "1") {
			return "<button class='btn btn-success' id='btn_reg'>Mulai Registrasi</button>";
			
		}elseif($key->statuse == "0"){
			
											return "<button class='btn btn-success ' disabled>Mulai Registrasi</button>";
		}elseif($key->statuse == "2"){
					return "<button class='btn btn-success ' disabled>Mulai Registrasi</button>";
		}
		}
			}else{
				return "<button class='btn btn-success' onclick='cek_status($semester)'>Registrasi Telah selesai</button>";
			}
	
	
	
	
}


function btn_daftar($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id'");

		
		if ($hasil->num_rows()>0) {
			return "<button class='btn btn-success' onclick='cek_status()'>Cek Status</button>";
			
		}else{
		$hasil1 = $ci->db->query("SELECT a.id_reg, a.tgl_mulai, a.tgl_selesai, 
										a.tahun_akedmik, 
										(case
											when (now() < a.tgl_mulai) then 0
											when (now() >= a.tgl_mulai and now() <= a.tgl_selesai) then 1
											else 2
										end) statuse
										FROM con_reg a");

		foreach ($hasil1->result() as $key) {
		if ($key->statuse == "1") {
			return "<button class='btn btn-success' id='btn_reg'>Mulai Registrasi</button>";
			
		}elseif($key->statuse == "0"){
			
											return "<button class='btn btn-success ' disabled>Mulai Registrasi</button>";
		}elseif($key->statuse == "2"){
			
											return "<button class='btn btn-success ' disabled>Mulai Registrasi</button>";
		}
		}
		}
		
	
	
	
}
function cek_val_ppm($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_ppm == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_tps($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_tps == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_tif($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_tif == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_lab($id_users,$id)
{
	$ci=get_instance();

		$prodi=$ci->db->query("SELECT * FROM tr_akses,tbl_prodi WHERE tr_akses.email='".$id_users."' AND tbl_prodi.kode_prodi=tr_akses.keterangan ")->row();
	if ($prodi->nama_prodi== 'TIF') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_tif=='1') {
				return 'checked';
			}else{
				return '';
			}
		}
		
	}elseif ($prodi->nama_prodi=='PPM') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_ppm=='1') {
				return 'checked';
			}else{
				return '';
			}
		}
	}elseif ($prodi->nama_prodi=='TPS') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_tps=='1') {
				return 'checked';
			}else{
				return '';
			}
		}
	}
	
	
	
}
function btn_val_lab($id_users,$id,$sem)
{
	$ci=get_instance();

		$prodi=$ci->db->query("SELECT * FROM tr_akses,tbl_prodi WHERE tr_akses.email='".$id_users."' AND tbl_prodi.kode_prodi=tr_akses.keterangan ")->row();
	if ($prodi->nama_prodi== 'TIF') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_tif=='1') {
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-danger btn-bold item_valid" data="'.$id.'" data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> unvalid</a>'; ;
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_unvalid" data="'.$id.'"  data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> valid</a>'; ;
			}
		}
		
	}elseif ($prodi->nama_prodi=='PPM') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_ppm=='1') {
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-danger btn-bold item_valid" data="'.$id.'"  data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> unvalid</a>'; ;
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_unvalid" data="'.$id.'"  data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> valid</a>'; ;
			}
		}
	}elseif ($prodi->nama_prodi=='TPS') {
		$cek = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ")->result();
		foreach ($cek as $key) {
			if ($key->v_lab_tps=='1') {
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-danger btn-bold item_valid" data="'.$id.'"  data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> unvalid</a>'; ;
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_unvalid" data="'.$id.'"  data-s="'.$sem.'"><i class=" fa fa-check bigger-120 blue"></i> valid</a>'; ;
			}
		}
	}
	
	
	
}
function cek_val_kompensasi($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_kompensasi == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_khs($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_khs == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}

function cek_val_kaprodi1($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_ppm == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_kaprodi2($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_tps == "1") {
			return "checked='checked'";
		}
		}
		}
	
	
	
}
function cek_val_kaprodi3($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_lab_tif == "1") {
			return "checked='checked'";
		}
		}
		}
	
}
function cek_val_kaprodi4($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_kompensasi == "1") {
			return "checked='checked'";
		}
		}
		}
}
function cek_val_kaprodi5($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_perpus == "1") {
			return "checked='checked'";
		}
		}
		}
}
function cek_val_kaprodi6($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_keuangan == "1") {
			return "checked='checked'";
		}
		}
		}
}
function cek_val_kaprodi7($id_user,$id,$sem)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim ='$id' AND semester='$sem' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
		if ($key->v_khs == "1") {
			return "checked='checked'";
		}
		}
		}
}
function cek_val_kaprodi9($id_user,$id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tr_akses,jabatan where email='$id_user' AND jabatan.id_jabatan=tr_akses.id_jabatan");
		if ($hasil->num_rows()>0) {
			foreach ($hasil->result() as $data) {
				if ($data->jabatan == 'Kaprodi_tif') {
					$hasil2 = $ci->db->query("SELECT * FROM tbl_reg_before  Where nim='$id'");
					if ($hasil->num_rows() >0) {
						foreach ($hasil2->result() as $key) {
							if ($key->v_kaprodi == "1") {
								return "checked='checked'";
							}
						}
					}
				}
			}
		}
	
	
	
}
function cek_val_kaprodi8($id,$thun,$sem)
{
	$ci=get_instance();
					$hasil2 = $ci->db->query("SELECT * FROM tbl_reg_before  Where nim='$id' AND semester='$sem'");
					if ($hasil2->num_rows() >0) { 
						foreach ($hasil2->result() as $key) {
							if ($key->v_khs && $key->v_khs && $key->v_keuangan && $key->v_perpus && $key->v_kompensasi && $key->v_lab_tif && $key->v_lab_tps && $key->v_lab_ppm == "1") {
								return '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary item_valid" data="'.$id.'" data-v="'.$thun.'" data-s="'.$sem.'"><i class="fa fa-check blue"></i> validasi</a>'; 
							}else{
								return '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary item_valid" disabled><i class="fa fa-check  blue"></i> validasi</a>'; 
							}
						}
						
					
			}
		
	
	
	
}
function cek_jabtn($id,$jbtn)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM tr_akses Where email='$id'");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key) {
			$ambil=$ci->db->query("SELECT * FROM jabatan Where id_jabatan='$key->id_jabatan'")->result();
			foreach ($ambil as $ab) {
				if ($ab->id_jabatan==$jbtn) {
					return "checked='checked'";
				}
			}
		}
		
		}
	
	
	
}

function j($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
}

// function cek_aja($id)
// {
// 	$ci=get_instance();
// 	$hasil = $ci->db->query("SELECT *FROM tbl_menu WHERE id_menu ='$id'")->result();
// 	$hasil1 = $ci->db->query("SELECT *FROM tbl_menu WHERE is_main_menu ='$hasil->is_main_menu'");

// 		$amb=$hasil1->result();
// 		if ($mb->is_main_menu == $hasil->is_main_menu) {
			
// 		}else{
			
// 		}
	
// }
function obj_to_array($obj, $pilih) {
	$pilihpc	= explode(",", $pilih);
	$array 		= array(""=>"No Selected");

	foreach ($obj as $o) {
		$xx = $pilihpc[0];
		$x = $o->$xx;
		$y = $pilihpc[1];

		$array[$x] = $o->$y; 
	}

	return $array;
}
function validasi_tif($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_lab_tif ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}


		}

}
function validasi_ppm1($id_users){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_lab_ppm ==1) {
			$html.='<button class="btn btn-xs btn-success" data-user='.$id_users.'>
					<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-xs btn-danger" data-user='.$id_users.'>
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
function validasi_ppm($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_lab_ppm ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
		function validasi_tps($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_lab_tps ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
		function validasi_perpus($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_perpus ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
		function validasi_kompensasi($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_kompensasi ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
function validasi_keuangan($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_keuangan ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
function validasi_khs($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_khs ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class=" fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}
function validasi_kaprodi($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_kaprodi ==1) {
			$html.='<button class="btn btn-lg btn-success">
												<i class=" fa fa-check"></i>
												sudah di validasi
											</button>';
			return $html;
		}else{
			$html.='<button class="btn btn-lg btn-danger">
												<i class="fa fa-times"></i>
												Belum Di validasi
											</button>';
			return $html;
		}

}
		}

function notif($id_users,$semester){
$ci=get_instance();
	$hasil = $ci->db->query("SELECT *FROM tbl_reg_before WHERE nim='$id_users' AND semester='$semester'");
	if ($hasil->num_rows() >0) {
		$data=$hasil->row();
		if ($data->v_khs && $data->v_khs && $data->v_keuangan && $data->v_perpus && $data->v_kompensasi && $data->v_lab_tif && $data->v_lab_tps && $data->v_lab_ppm == "1") {
			return '<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<span> Validasi Anda Telah Lengkap. Anda Telah menyelesaikan Registrasi Ulang Semester INI </span>
									</div>';

		}else{
			return '<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<span> Silahkan Lengkapi Validasi yang di Butuhkan untuk menyelesaikan Registrasi Ulang Anda </span>
									</div>';
		}

}
}				