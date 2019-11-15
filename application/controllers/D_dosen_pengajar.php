<?php 
/**
* 
*/
class D_dosen_pengajar extends CI_Controller
{
  
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
public function index()
  {
    $this->cek_aktif();
   
      $sa['title']="Data Pengajar";
      $sa['p']="sk_mengajar/dosen_pengajar";
      $this->cek_akses($sa);
    // $this->load->view('admin',$sa);      
    
  }

public function dosen_prodi()
 {
  $akademik=$this->db->get_where('app_thn_akademik', array('status' =>"1"))->row();
  $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
  
      $query=$this->db->query("SELECT a.*,b.nama_dsn,e.nama_prodi,c.nama_makul,c.sks,d.nama_rombel,f.* FROM app_dosen_ajar a INNER JOIN tbl_dosen b ON a.id_dosen=b.nrp INNER JOIN makul_matakuliah c ON a.kode_makul=c.kode_makul INNER JOIN rombel_jenis d on a.rombel_id=d.id_rombel INNER JOIN tbl_prodi e ON b.prodi_id=e.kode_prodi INNER JOIN app_thn_akademik f ON a.thn_id=f.id_thnakad where a.thn_id='$akademik->id_thnakad'");
     
      
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {

           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->id_dosen;
              $data_ok[2] = $r->nama_dsn;
              $data_ok[3] = $r->nama_prodi;
              $data_ok[4] = $r->kode_makul.'-'.$r->nama_makul;
               $data_ok[5] = $r->sks;
               $data_ok[6] = $r->nama_rombel;
               $data_ok[7] = $r->thun_akademik.' Semester '.$r->ta_tipe;
               $data_ok[8] = $this->cek_sk($r->id_dosen,$r->thn_id);
             
              
                
             
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

 public function dosen_lb()
 {
  $akademik=$this->db->get_where('app_thn_akademik', array('status' =>"1"))->row();
  $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
  
      $query=$this->db->query("SELECT a.*,b.nama_dlb nama_dsn,e.nama_prodi,c.nama_makul,c.sks,d.nama_rombel,f.* FROM app_dosen_ajar a INNER JOIN tbl_dosen_lb b ON a.id_dosen=b.id_dosen_lb INNER JOIN makul_matakuliah c ON a.kode_makul=c.kode_makul INNER JOIN rombel_jenis d on a.rombel_id=d.id_rombel INNER JOIN tbl_prodi e ON c.prodi_id=e.kode_prodi INNER JOIN app_thn_akademik f ON a.thn_id=f.id_thnakad where a.thn_id='$akademik->id_thnakad'");
     
      
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {

          
           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->id_dosen;
              $data_ok[2] = $r->nama_dsn;
              $data_ok[3] = $r->nama_prodi;
              $data_ok[4] = $r->kode_makul.'-'.$r->nama_makul;
               $data_ok[5] = $r->sks;
               $data_ok[6] = $r->nama_rombel;
               $data_ok[7] = $r->thun_akademik.' Semester '.$r->ta_tipe;
               $data_ok[8] = $this->cek_sk($r->id_dosen,$r->thn_id);
             
              
                
             
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

function cek_sk($id_dsn,$akd){
  $cek=$this->db->get_where('app_sk_mengajar',array('id_dosen' =>$id_dsn ,'thn_akademik'=>$akd ));
  if ($cek->num_rows()>0) {
    return '<span class="label label-success">
                        <i class="fa fa-check bigger-120"></i>
                        SK &nbsp;
                      </span>';
  }else{
    return '<span class="label label-danger">
                        <i class="fa fa-times bigger-120"></i>
                        No SK &nbsp;
                      </span>';
  }

}

}