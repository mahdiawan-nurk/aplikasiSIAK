<?php
function portal_reg()
{
	$ci=get_instance();

		$hasil = $ci->db->get_where('app_portal', array('id_portal' =>"1" ,'status_portal'=>"1" ));
		if ($hasil->num_rows()>0) {
			return "";
		}else{
			return "disabled";
		}
		
}
function act_btn_v($id_user,$nim)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT *FROM tr_akses,jabatan where nip='$id_user' AND jabatan.id_jabatan=tr_akses.id_jabatan");
		if ($hasil->num_rows()>0) {
			foreach ($hasil->result() as $data) {
			if ($data->jabatan == 'Kalab_tif') {
				return '<button class="btn btn-white btn-info btn-bold" id="btn_valid"  data="'.$nim.'">
                        <i class="ace-icon fa fa-check bigger-120 blue"></i>
                        Validasi Kalab tif
                      </button>';
			}else if ($data->jabatan == 'Kalab_ppm') {
				return '<button class="btn btn-white btn-info btn-bold" id="btn-add">
                        <i class="ace-icon fa fa-check bigger-120 blue"></i>
                        Validasi
                      </button>';
			}
		}
		}
		
}
function cek_val_kabag($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM con_reg where id_reg='$id'  ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key){
			if ($key->validasi1 == 1) {
				return "checked='checked'";
			}
		}
		
		}
	
	
	
}
function btn_v_wadir($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM con_reg Where id_reg='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key){
			if ($key->validasi1 == 1) {
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_valid"  data="'.$id.'"><i class="ace-icon fa fa-check bigger-120 blue"></i> validasi</a>'; 
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_unvalid" data-v="1" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> validasi</a>'; 
			}
		}
		
		}
	
	
	
}
function btn_v_kabag($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM con_reg where id_reg='$id'  ");
	if ($hasil->num_rows() >0) {
		
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_valid" data="'.$id.'"><i class="ace-icon fa fa-check bigger-120 blue"></i> validasi</a>'; 
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-info btn-bold item_unvalid" data-v="1" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> validasi</a>'; 
			}
		
		
		}
function btn_akd($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM con_reg Where id_reg='$id' ");
	if ($hasil->num_rows() >0) {
		foreach ($hasil->result() as $key){
			if ( $key->status == 0) {
				return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_aktif" data="'.$id.'"><i class="fa fa-eye"></i> Aktifkan</a>';
			}else{
				return '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_nonaktif" data="'.$id.'"><i class="fa fa-eye"></i> Non-Aktifkan</a>'; 
			}
		}
		
		}
	
	
	
}
function cek_level($id)
{
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT a.*,b.nip, (SELECT COUNT(id_akses) FROM tr_akses WHERE nip= '$id' AND id_jabatan = a.id_jabatan) AS ada FROM jabatan a INNER JOIN tr_akses b ON a.id_jabatan=b.id_jabatan  ");
	foreach ($hasil->result() as $key) {
		if ($key->ada == '1') {
			return 'checked';
		}else{
			return '';
		}
	}
	
	
	
}

function btn_allv($email,$nim)
{
	$ci=get_instance();

		$hasil = $ci->db->get_where('tr_akses', array('email' =>$email))->result();
	foreach ($hasil as $data) {
		if ($data->id_jabatan=="12") {
			return cek_data($nim);
		}elseif ($data->id_jabatan=="9") {
			return cek_data_op($nim);
		}
	}
	
	
	
}
function cek_data($nim){
	$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM tbl_reg_before WHERE nim=$nim ");
		$data=$hasil->row();
		if ($hasil->num_rows()>0) {
			if ($data->v_khs && $data->v_khs && $data->v_keuangan && $data->v_perpus && $data->v_kompensasi && $data->v_lab_tif && $data->v_lab_tps && $data->v_lab_ppm && $data->v_kaprodi == "1"){
				return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_valid_khs"  data="'.$nim.'" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> Daftarkan</a></div>';
			}else{
				return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_daftarkan" data="'.$nim.'"><i class="ace-icon fa fa-check bigger-120 blue"></i> Daftarkan</a></div>';
			}
		}else{
			return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_valid_khs" data="'.$nim.'" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> Daftarkan</a></div>';
		}

}

function cek_data_op($nim){
$ci=get_instance();

		$hasil = $ci->db->query("SELECT * FROM tbl_reg_before WHERE nim=$nim ");
		$data=$hasil->row();
		if ($hasil->num_rows()>0) {
			if ($data->v_khs && $data->v_khs && $data->v_keuangan && $data->v_perpus && $data->v_kompensasi && $data->v_lab_tif && $data->v_lab_tps && $data->v_lab_ppm && $data->v_kaprodi == "1"){
				return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_valid_khs"  data="'.$nim.'" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> Ajukan</a></div>';
			}else{
				return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_ajukan" data="'.$nim.'" disabled><i class="ace-icon fa fa-check bigger-120 blue"></i> Ajukan</a></div>';
			}
		}else{
			return '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn btn-primary btn-xs item_ajukan"  data="'.$nim.'"><i class="ace-icon fa fa-check bigger-120 blue"></i> Ajukan</a></div>';
		}
}

function tjs ($tgl, $tipe) {
	if ($tgl != "0000-00-00 00:00:00") {
		$pc_satu	= explode(" ", $tgl);
		if (count($pc_satu) < 2) {	
			$tgl1		= $pc_satu[0];
			$jam1		= "";
		} else {
			$jam1		= $pc_satu[1];
			$tgl1		= $pc_satu[0];
		}

		$pc_dua		= explode("-", $tgl1);
		$tgl		= $pc_dua[2];
		$bln		= $pc_dua[1];
		$thn		= $pc_dua[0];

		$bln_pendek		= array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		$bln_panjang	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$bln_angka		= intval($bln) - 1;

		if ($tipe == "l") {
			$bln_txt = $bln_panjang[$bln_angka];
		} else if ($tipe == "s") {
			$bln_txt = $bln_pendek[$bln_angka];
		}

		return $tgl." ".$bln_txt." ".$thn."  ".$jam1;
	} else {
		return "Tgl Salah";
	}


	
}
function auto_kode_pr()
	{
			$ci=get_instance();
			$prodi=$ci->session->userdata('prodi');
		  $ci->db->select('RIGHT(app_aset_prodi.kode_barang,4)as kode',false);
		  $ci->db->order_by('kode_barang','DESC');
		  $ci->db->limit(1);

		  $query=$ci->db->get('app_aset_prodi');
		  if ($query->num_rows()<>0) {
		    $data=$query->row();
		    $kode=intval($data->kode)+1;
		  }else{
		    $kode=1;
		  }

		  $kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
		  $kode_jadi="PRO".$prodi.$kode_max;
		  return $kode_jadi;
	}

function auto_kode_br(){
$ci=get_instance();
  $ci->db->select('RIGHT(app_aset_barang.kode_barang,4)as kode',false);
  $ci->db->order_by('kode_barang','DESC');
  $ci->db->limit(1);

  $query=$ci->db->get('app_aset_barang');
  if ($query->num_rows()<>0) {
    $data=$query->row();
    $kode=intval($data->kode)+1;
  }else{
    $kode=1;
  }

  $kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
  $kode_jadi="DAB".$kode_max;
  return $kode_jadi;

}
