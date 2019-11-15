<?php
class R_pengajuan extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('M_registrasi');
    
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
    $this->cek_aktif();
    $id_users=$this->session->userdata('id_users');
     $sa['user']=$this->db->get_where('tr_akses', array('email' =>$id_users,'id_jabatan'=>"12"  ))->num_rows();
   $sa['prodi'] = $this->db->get('tbl_prodi')->result();
   $sa['akademik'] = obj_to_array($this->db->get('app_thn_akademik')->result(), "thun_akademik,thun_akademik");
     $sa['prodi'] = $this->db->get('tbl_prodi')->result();
    $sa['semester']=$this->db->get('tbl_semester')->result();
   $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/pengajuan_reg_new";
    $this->cek_akses($sa);
  }

  public function data_pengajuan()
  {
      $id_users=$this->session->userdata('id_users');
      $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_pengajuan($semester);
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->prodi;
              if ($r->tgl_pengajuan!='') {
                $data_ok[4] = date('d-m-Y',strtotime($r->tgl_pengajuan));
              }else{
                $data_ok[4] = '';
              }
              
              if ($r->ada == 1) {
                
                $data_ok[5] = '<span class="label label-success">
                        <i class="ace-icon fa fa-check bigger-120"></i>
                        Telah Mengajukan &nbsp;
                      </span>';
             
              }elseif($r->ada == 0){
                $data_ok[5] = '<span class="label label-danger">
                        <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                        Belum Mengajukan
                      </span>';
              }
               
               
             
              
               
            
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

  function get_data_pengajuan(){
    $hsl=$this->db->get_where('pengumuman', array('jenisp_id' =>"1" ,'status_pengumuman'=>"1" ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'thn_akademik' => $data->thn_akademik,
          );
      }
    }
    
    echo json_encode($hasil);
  }
function get_data_mhs(){
  $nim=$this->input->get('id');
    $hsl=$this->db->query("SELECT  a.nim,a.nama_mhs,b.nama_prodi prodi,c.nama semester FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id=b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id=c.id WHERE a.nim='$nim'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'nama_mhs' => $data->nama_mhs,
          'prodi' => $data->prodi,
          'semester' => $data->semester,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }
function get_regis_mhs(){
  $nim=$this->input->get('nim');
    $hsl=$this->db->query("SELECT a.*,b.nama_mhs,c.nama_prodi prodi,d.nama semester FROM tbl_reg_before a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id WHERE a.nim='$nim'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'nama_mhs' => $data->nama_mhs,
          'prodi' => $data->prodi,
          'semester' => $data->semester,
          'thn_akademik'=>$data->thun_akademik,
          );
      }
    }
    
    echo json_encode($hasil);
  }
  function simpan_pengajuan(){
     $nim=$this->input->post('nim');
      $thn_akademik=$this->input->post('thun_a');
       $tgl=date('y-m-d h:i:s');

       $data = array('nim' =>$nim ,'thun_akademik'=>$thn_akademik,'tgl_pengajuan'=>$tgl );
       $this->db->insert('tbl_reg_before',$data);
    $sa['pesan']="Pengajuan Registrasi ulang Mahasiswa Berhasil";
    j($sa);
    exit();
  }

 function simpan_pendaftaran(){
     $nim=$this->input->post('nim');
      $thn_akademik=$this->input->post('thun_a');
      $status=$this->input->post('status');
       $tgl=date('y-m-d h:i:s');

       $data = array('nim' =>$nim ,'tgl_terdaftar'=>$tgl,'thn_akademik'=>$thn_akademik,'status'=>$status );

       
       $this->db->insert('tbl_reg_selesai',$data);
       $ambil=$this->db->get_where('tbl_mahasiswa', array('nim' =>$nim ))->row();
       $s_before=$ambil->semester_id;
       $s_lanjut=$ambil->semester_id+1;
       $aktif_sem = array('semester_id' =>$s_lanjut );
       $this->db->where('nim',$nim);
       $this->db->update('tbl_mahasiswa',$aktif_sem);
    $sa['pesan']="semester Sebelum=".$s_before." semester_lanjut=".$s_lanjut;
    j($sa);
    exit();
  }
  }