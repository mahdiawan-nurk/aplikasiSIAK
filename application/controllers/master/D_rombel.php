<?php
/**
* 
*/
class D_rombel extends CI_Controller
{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
  }
   public function cek_aktif() {
    if ($this->session->userdata('login') == false && $this->session->userdata('id_pengguna') == "") {
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
//Class Mahasiswa
  public function index($value='')
  {
  
    $this->cek_aktif();
   
    $sa['angkatan'] = obj_to_array($this->db->get('app_angkatan')->result(), "id_angkatan,thn_angkatan");
    $sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "id_prodi,nama_prodi");
  $sa['title']="Data Rombel";
      $sa['p']="data_master/data_rombel";

       $this->cek_akses($sa);

  }
   public function indexLihatKelas($id)
  {
    $this->cek_aktif();
  $sa['data_mhs']=$this->db->query("SELECT b.*,c.nama_prodi prodi,d.nama semester FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id WHERE a.rombel_id='".$id."' ");
    
       $sa['title']="Data Rombel";
      $sa['p']="data_master/lihat_kelas";

       $this->cek_akses($sa);

  }

  public function data_rombel($value='')
  {
   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query=$this->db->query("SELECT * FROM rombel_jenis a INNER JOIN tbl_dosen b ON a.dosen_id=b.nrp INNER JOIN tbl_prodi c on a.prodi_id=c.kode_prodi ");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
        $d_pengajar=$this->db->query("SELECT *,(SELECT nama_dsn FROM tbl_dosen WHERE nrp=a.id_dosen) AS dosen,(SELECT nama_dlb FROM tbl_dosen_lb WHERE id_dosen_lb=a.id_dosen) AS dlb FROM app_dosen_ajar a WHERE a.rombel_id='".$r->id_rombel."' GROUP BY a.id_dosen ");
           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->nama_rombel;
              $data_ok[2] = $r->nama_prodi;
              $data_ok[3] = $r->nama_dsn;
              $data_p = array();
              foreach ($d_pengajar->result() as $d) {
                $data_p[]=$d->dosen.'&nbsp;'.$d->dlb.'&nbsp;';
              }
              $data_ok[4] = $data_p;
             
                
              $data_ok[5] = '<div class="btn-group" style="float:right;">
              <a href="'.site_url().'master/d_rombel/indexlihatkelas/'.$r->id_rombel.'" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_lihat" data="'.$r->id_rombel.'" ><i class="fa  fa-eye "></i> Lihat Kelas</a>
            

              </div>'; 
             
           $data[] = $data_ok;
      }
      $result = array(

               "draw" => $draw,
                 "recordsTotal" => $query->num_rows(),
                 "recordsFiltered" => $query->num_rows(),
                 "data" => $data
            );
      echo j($result);
exit();      
  }
}