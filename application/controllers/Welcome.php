<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function cek_aktif() {
    if ($this->session->userdata('login') == false && $this->session->userdata('id_users') == "") {
      redirect('secure');
    } 
  }
     public function cek_akses($sa) {
    $id_users=$this->session->userdata('id_users');

    $jml_jbt=$this->db->query("SELECT COUNT(email) AS jbt FROM tr_akses WHERE email='".$id_users."' ")->row();
		if ($jml_jbt->jbt >1) {
				$sa['title']="Dashboard ";
			$sa['p']="a_index";	
			$this->load->view('template/d_lain',$sa);
		}else{
			$sa['title']="Dashboard ";
			$sa['p']="a_index";	
			$this->load->view('template/d_admin',$sa);   
		}
   
  }
  
	public function index()
	{
		$this->cek_aktif();
		$thn=$this->db->get_where('app_thn_akademik', array('status' =>"1" ))->row();
		$id_users=$this->session->userdata('id_users');
		 $jml_jbt=$this->db->query("SELECT COUNT(email) AS jbt FROM tr_akses WHERE email='".$id_users."' ")->row();
		if ($jml_jbt->jbt >1) {
				$sa['title']="Dashboard ";
			$sa['p']="welcome_message";	
			$this->load->view('template/d_lain',$sa);
		}else{
			$sa['title']="Dashboard ";
			$sa['p']="welcome_message";	
			$this->load->view('template/d_admin',$sa);   
		}
		
}
public function tampil_pengumuman()
{
	 $id_users=$this->session->userdata('id_users');
	$jbt=$this->db->get_where('tr_akses', array('email' => $id_users ));
	foreach ($jbt->result() as $key) {
		$dist=$this->db->query("SELECT * FROM pengumuman a INNER JOIN pengumuman_dist b ON a.jenisp_id=b.jenisp_id INNER JOIN jenis_pengumuman c ON a.jenisp_id=c.id_jenisp where b.distribusi='$key->id_jabatan' AND a.status_pengumuman='1'  ");
		 $hsl=$dist->row();
		if ($dist->num_rows()>0) {
			 $tgl=date('Y-m-d H:i:s');
	 if ( $tgl < $hsl->tgl_distribusip) {
	 	$st="0";
	 }elseif ($tgl >= $hsl->tgl_distribusip) {
	 	if ($tgl > $hsl->tgl_selesaip) {
	 		$st="1";
	 	}elseif ($tgl <= $hsl->tgl_selesaip) {
	 		$st="2";
	 		$data_p = array();
	 		foreach ($dist->result() as $key) {
	 			$data_p[]=$key->id_pengumuman;
	 			$id=$data_p;
	 		}
	 		$data_j = array();
	 		foreach ($dist->result() as $jdl) {
	 			$data_j[]=$jdl->nama_jenis;
	 			$jdl=$data_j;
	 		}
	 	}
	 	
	 }
		}else{
			$st='--';
		}
			$sa['id']=$id;
			$sa['jdl']=$jdl;
		 $sa['pengumuman']=$dist->num_rows();
    $sa['status'] = $st;	
		 j($sa);
      exit();
	}

	 // $hasil= $this->db->get_where('pengumuman', array('status_pengumuman' =>"1" ));
	 // $hsl=$hasil->row();
	 // $tgl=date('Y-m-d H:i:s');
	 // if ( $tgl < $hsl->tgl_distribusip) {
	 // 	$st="0";
	 // }elseif ($tgl >= $hsl->tgl_distribusip) {
	 // 	if ($tgl > $hsl->tgl_selesaip) {
	 // 		$st="1";
	 // 	}elseif ($tgl <= $hsl->tgl_selesaip) {
	 // 		$st="2";
	 // 	}
	 	
	 // }
	// $html .='<iframe src="<" frameborder=true width="100%" height="400"></iframe>';
	
   
     
  }

  function isi_pengumuman($id){
  	$ulr=$this->uri->segment(3);
  	$cek=$this->db->query("SELECT * FROM pengumuman_dist a INNER JOIN pengumuman b ON a.jenisp_id=b.jenisp_id WHERE b.status_pengumuman=1 AND b.id_pengumuman='".$ulr."'")->row();

  	$sa['data']=$cek;
  	$sa['data1']=$ulr;
    $this->load->view('pengumuman/view',$sa);
  }


  function list_pengumuman(){
  	$id_users=$this->session->userdata('id_users');
	$jbt=$this->db->query("SELECT * FROM tr_akses WHERE email='".$id_users."' ORDER BY id_jabatan ASC");
	foreach ($jbt->result() as $key) {
		$html='';
		$dist=$this->db->query("SELECT * FROM pengumuman a INNER JOIN pengumuman_dist b ON a.jenisp_id=b.jenisp_id INNER JOIN jenis_pengumuman c ON a.jenisp_id=c.id_jenisp where b.distribusi='$key->id_jabatan' AND a.status_pengumuman='1'  ");
		 
		if ($dist->num_rows()>0) {
			foreach ($dist->result() as $key) {
				$html=$html.'<li >
										<table class="table ">
										<tr><td style="width: 65%"><h6>'.$key->nama_jenis.'</h6> </td><td style="width: 25%">
										<a href="#" class="view-more lihat" onclick="lihat('.$key->id_pengumuman.');">View</a>
									</td><tr>
										</table>
									</li>';
			}
	 	
										
		}else{
			$html="";
		}
			
		$sa['html'] = $html;
   
      j($sa);
      exit();
	}
	 
  }

  public function profil($value='')
  {
  	$this->cek_aktif();
		$id_users=$this->session->userdata('id_users');
		$cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where nip=$id_users AND jabatan.id_jabatan=tr_akses.id_jabatan")->result();
		foreach ($cek_login as $key) {}
		if ($key->jabatan == 'Mahasiswa') {
			$sa['title']="Dashboard ";
			$sa['p']="dashboard/profil";
			
			$this->load->view('dashboard/template_mhs',$sa);		
			
		}elseif($key->jabatan == 'Admin') {
			$sa['title']="Dashboard ";
			$sa['p']="dashboard/profil";
			$this->load->view('dashboard/template_satu',$sa);		
		}else{
			$sa['title']="Dashboard ";
			$sa['p']="dashboard/profil";
			$this->load->view('dashboard/template_dua',$sa);
		}		
  }

public function profile(){
	$this->cek_aktif();

	$sa['title']="Dashboard ";
	$sa['p']="profile/profile";

	$this->cek_akses($sa);	
}


}
