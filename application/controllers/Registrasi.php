<?php
/**
* 
*/
class Registrasi extends CI_Controller
{
	public function __construct(){
    parent::__construct();
    $this->load->model('M_registrasi');
    $this->load->model('M_setting');
    
  }
	public function cek_aktif() {
		if ($this->session->userdata('login') == false && $this->session->userdata('id_users') == "") {
			redirect('secure');
		} 
	}
public function cek_akses($sa) {
    $id_users=$this->session->userdata('id_users');

    $jml_jbt=$this->db->query("SELECT COUNT(email) AS jbt FROM tr_akses WHERE email='".$id_users."' ")->row();
    if ($jml_jbt->jbt >1) {
      $this->load->view('template/d_lain',$sa);
    }else{
      $this->load->view('template/d_admin',$sa);   
    }
   
  }
  
  public function index($value='')
  {
    $sa['title']="Registrasi";
      $sa['p']="registrasi_ulang/mahasiswa/histori_reg";
    $this->cek_akses($sa);    
      
  }
	

	public function validasi()
	{
		$id_users=$this->session->userdata('id_users');
		$cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan")->result();
		foreach ($cek_login as $key) {
		if ($key->id_jabatan == '2') {
			redirect('v_kaprodi');
		}elseif($key->id_jabatan == '3'){
      redirect('v_kalab');
    }elseif($key->id_jabatan == '6'){
      redirect('v_dosenw');
    }elseif($key->id_jabatan == '13'){
      redirect('v_perpus');
    
    }
		
		
	}
	
}


//Mahasiswa Reg
    public function data_histori()
  {
    $id_users=$this->session->userdata('id_users');
    $dta_user=$this->db->get_where('tbl_mahasiswa', array('email' =>$id_users ))->row();
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_histori($dta_user->nim);
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->semester;
              $data_ok[2] = $r->tgl_terdaftar;
              $data_ok[3] = $r->status;
               

           $data[] = $data_ok;
      }
      $result = array(

               "draw" => $draw,
                 "recordsTotal" => $query->num_rows(),
                 "recordsFiltered" => $query->num_rows(),
                 "data" => $data
            );
      j($result);
exit();      
  }

public function histori_reg()
  {
    $this->cek_aktif();
    
  
    //   $sa['title']="Registrasi";
    //   $sa['p']="registrasi_ulang/mahasiswa/histori_reg";
    // $this->load->view('template/d_mhs',$sa);    
    redirect('registrasi');
      
    
  }

  public function cek_waktu_regis(){
    $tgl=date('Y-m-d H:i:s');
    $waktu=$this->M_registrasi->config_reg()->row();
if ($waktu->statuse == "0") {
  $status="belum";
}elseif ($waktu->statuse =="1") {
   $status="mulai";
}else if ($waktu->statuse=="2") {
     $status="berakhir";
  }
 
    $sa['status']=$status;
    $sa['tgl_mulai']=$waktu->tgl_mulai_daftar;
    $sa['tgl_selesai']=$waktu->tgl_selesaip;
    $sa['tgl_skrng']=$tgl;


    j($sa);
    exit();


  }

  public function data_regis(){
    $id_users=$this->session->userdata('id_users');
    $sa['data_mhs'] = $this->M_registrasi->data_mhs($id_users)->row();
  }



  public function pendaftaran()
  {
    $this->cek_aktif();
    $query = $this->db->get_where('pengumuman', array('status_pengumuman' => "1",'jenisp_id'=>"1" ));
    if ($query->num_rows()>0) {
    $id_users=$this->session->userdata('id_users');
    $sa['data'] = $this->M_registrasi->config_reg()->row();
    $data= $this->M_registrasi->config_reg()->row();
    $sa['data_mhs'] = $this->M_registrasi->data_mhs($id_users)->row();
      $sa['title']="Registrasi";
      if ($data->statuse=="1") {
        redirect('registrasi/mulai_regist');
      }else if ($data->statuse=="2") {
        redirect('registrasi/mulai_regist');
      }else{
         $sa['p']="registrasi_ulang/mahasiswa/test1";
      }
     
    }else{
      redirect('');
    }
   
   $this->load->view('template/d_mhs',$sa);   


    
  }

    public function mulai_regist()
  {
    $this->cek_aktif();
    $query = $this->db->get_where('pengumuman', array('status_pengumuman' => "1",'jenisp_id'=>"1" ));
    if ($query->num_rows()>0) {
    $id_users=$this->session->userdata('id_users');
    $sa['data'] = $this->M_registrasi->config_reg()->row();
    $sa['data_mhs'] = $this->M_registrasi->data_mhs($id_users)->row();
      $sa['title']="Registrasi";
      $sa['p']="registrasi_ulang/mahasiswa/count_page";
    }else{
      redirect('');
    }
   
   $this->load->view('template/d_mhs',$sa);   


    
  }

  public function cek_status()
  {
    $this->cek_aktif();
    $semester=$this->uri->segment(3);
    $id_users=$this->session->userdata('id_users');
    $data= $this->M_registrasi->cek_data_regis($id_users,$semester);
    $user=$data->row();
    if ($data->num_rows() > 0) {
      $sa['id_users']=$user->nim;
       $sa['semester']=$semester;
      $sa['title']="Registrasi";
      $sa['p']="registrasi_ulang/mahasiswa/registrasi";
      
    }else{
      // $sa['title']="Registrasi";
      // $sa['p']="registrasi_ulang/Mahasiswa/registrasi";
    }
      
   $this->load->view('template/d_mhs',$sa);    
      
    
  }
  public function daftar_ulang()
  {
   $id_users=$this->session->userdata('id_users');
    $nim=$this->input->post("nim");
    $thun=$this->input->post("thun");
    $semester=$this->input->post("semester");
    $tgl=date('y-m-d h:i:s');
    $data = array('nim' =>$nim ,'tgl_pengajuan'=>$tgl,'thun_akademik'=>$thun,'semester'=>$semester );

    $this->db->insert('tbl_reg_before',$data);

    $sa['status'] = "main";
      $sa['pesan'] = "Berhasil mendaftar";
      j($sa);
      exit();
  }

function auto_valid(){
  
  $akd=$this->db->get_where('app_thn_akademik', array('status' =>"1" ))->row();
$tgl=date('Y-m-d H:i:s');
$sql=$this->db->get_where('pengumuman',array('status_pengumuman' =>"1" ,'jenisp_id'=>"2" ));
$ambil_data_pengajuan=$this->db->get_where('tbl_reg_before',array('thun_akademik' =>$akd->thun_akademik ));
if ($sql->num_rows()>0) {
  $data=$sql->row();
  if ($tgl >= $data->tgl_selesaip) {
    $st=true;
    $data = array( );
    foreach ($ambil_data_pengajuan->result() as $d) {
     $data[]=$d->nim;
     $nim=$data;
    }
    $data_valid = array('v_lab_ppm' =>"1",'v_lab_tif' =>"1",'v_lab_tps' =>"1",'v_kompensasi' =>"1",'v_perpus' =>"1",'v_keuangan' =>"1",'v_khs' =>"1",'v_kaprodi' =>"1", );
    $count=$ambil_data_pengajuan->num_rows();
    for ($i=0; $i < $count; $i++) { 
      $this->db->where('nim',$nim[$i]);
      $this->db->update('tbl_reg_before',$data_valid);
    }
  }else{
    $st=false;
  }
}else{
  $st=false;
}
    $sa['status'] = $st;
    $sa['data'] = $nim;
    $sa['data1'] = $count;
      j($sa);
      exit();
}

function send_notif(){
   $id_users=$this->session->userdata('id_users');
   $query = $this->db->get_where('tbl_mahasiswa', array('email' => $id_users))->row();

 $data = array(
        array(
                'pengirim' => $query->nama_mhs,
                'penerima' => '2',
                'isi_notif' => 'Telah Melakukan Pengajuan Registrasi',
                'prodi' => $query->prodi_id
        ),
        array(
                 'pengirim' => $query->nama_mhs,
                'penerima' => '9',
                'isi_notif' => 'Telah Melakukan Pengajuan Registrasi',
                'prodi' => "0"
        )
);

$this->db->insert_batch('app_notif', $data);
       
   
}

}