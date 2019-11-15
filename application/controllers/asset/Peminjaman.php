<?php
/**
 * 
 */
class Peminjaman extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('M_asset');
    
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

function index(){
    $this->cek_aktif();
      $email=$this->session->userdata('id_users');
    $user=$this->db->get_where('tbl_mahasiswa', array('email' =>$email ))->row();
    
    $sa['data_peminjam']=$this->M_asset->histori_peminjaman_mhs($user->nim);
   
    $sa['title']="Data Peminjaman";
      $sa['p']="asset/histori_peminjaman";
       $this->cek_akses($sa); 
}


	public function peminjaman_barang()
	{
	  $this->cek_aktif();
    $email=$this->session->userdata('id_users');
    $sa['data']=$this->db->get_where('tbl_mahasiswa', array('email' =>$email ))->row();
     $sa['dosen']=$this->db->query("SELECT * FROM tbl_dosen ")->result();
     $sa['semester']=$this->db->get('tbl_semester')->result();
     $sa['makul']=$this->db->get('makul_matakuliah')->result();
     $sa['prodi']=$this->db->get('tbl_prodi')->result();
    $sa['title']="Data ruangan";
      $sa['p']="asset/form_peminjaman";
       $this->cek_akses($sa);	
	}

public function data_barang()
{
  $id=$this->input->post('id');

  $data=$this->db->get('app_aset_prodi')->result();
  $option = '';
  $option=$option. '<option value="">--Selected Barang--</option>';
  foreach ($data as $d) {
    $option=$option. '<option value="'.$d->kode_barang.'">'.$d->nama_barang.'</option>';
  }
j($option);
exit();
}

public function kondisi_barang()
{
  $id_barang=$this->input->post('id');
  $data=$this->db->get_where('app_aset_prodi', array('kode_barang' =>$id_barang ))->row();
  if ($data->kondisi_barang=="B") {
    $hsl="BAIK";
  }elseif ($data->kondisi_barang=="KB") {
    $hsl="KURANG BAIK";
  }else{
    $hsl="RUSAK";
  }
  j($hsl);
  exit();
}
public function detail_barang()
{
 $id_barang=$this->input->post('barang');
  $data=$this->db->get_where('app_aset_prodi', array('kode_barang' =>$id_barang ))->row();
  $hsl_nama=$data->nama_barang;
 
 if ($data->kondisi_barang=="B") {
    $hsl_kondisi="BAIK";
  }elseif ($data->kondisi_barang=="KB") {
    $hsl_kondisi="KURANG BAIK";
  }else{
    $hsl_kondisi="RUSAK";
  }
  $sa['nama']=$hsl_nama;
  $sa['kondisi']=$hsl_kondisi;

  j($sa);
  exit();
}
public function save_pinjma_barang()
{
  $prodi=$this->session->userdata('prodi');
  $nim=$this->input->post('nim');
  $institusi=$this->input->post('institusi');
  $matkul=$this->input->post('matkul');
  $dosnp=$this->input->post('dosenp');
  $hp=$this->input->post('nohp');
  $tgl_pengembalian=$this->input->post('tgl_pengembalian');
  $barang=$this->input->post('barang');
  $kondisi=$this->input->post('kondisia');
  $jumlah=$this->input->post('jumlah');
  $tgl_pengembalian2=date('Y-m-d',strtotime($tgl_pengembalian));
  // $tgl_peminjaman="2019-10-06";
  $tgl_peminjaman=date('Y-m-d');

    $data_peminjam = array('nim' =>$nim ,'institusi'=>$institusi,'kegiatan'=>$matkul,'dosen_pemb'=>$dosnp,'hp'=>$hp,'tgl_peminjaman'=>$tgl_peminjaman,'tgl_pengembalian'=>$tgl_pengembalian2,'prodi_id'=>$prodi);
    $this->db->insert('app_data_peminjam',$data_peminjam);

    $ambil_id=$this->db->get_where('app_data_peminjam', array('nim' =>$nim ,'tgl_peminjaman'=>$tgl_peminjaman ))->row();
     $hitung=count($barang);
    for ($i=0; $i <$hitung ; $i++) { 
    $barang_peminjam = array('id_peminjam' =>$ambil_id->id_peminjam ,'kode_barang'=>$barang[$i],'jumlah'=>$jumlah[$i],'kondisi_awal'=>$kondisi[$i],'kondisi_akhir'=>"",'tgl_kembali'=>"" );
    $this->db->insert('app_peminjaman_barang',$barang_peminjam);
    }
    
   
  
  $sa['pesan']=$tgl_pengembalian;

  j($sa);
  exit();

}

}