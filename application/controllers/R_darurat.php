<?php
class R_darurat extends CI_Controller
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
     $sa['prodi'] = $this->db->get('tbl_prodi')->result();
    $sa['semester']=$this->db->get('tbl_semester')->result();
    $sa['TA']=$this->db->get_where('app_thn_akademik', array('status' =>"1"  ))->row();
   $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/registrasi_darurat";
    $this->cek_akses($sa);
  }

  public function data_sebelum()
  {
      $id_users=$this->session->userdata('id_users');
      $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT a.id_mhs,a.nim,a.nama_mhs,b.nama_prodi,c.nama,a.semester_id,(SELECT COUNT(nim) FROM tbl_reg_before INNER JOIN app_thn_akademik ON tbl_reg_before.thun_akademik=app_thn_akademik.thun_akademik WHERE tbl_reg_before.nim=a.nim AND app_thn_akademik.status='1' ) AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id=b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id=c.id ORDER BY a.nim ");
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              if ($r->ada=="1") {
               $data_ok[1] = '<div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="checkboxExample2" data-nim="'.$r->nim.'" data-sem="'.$r->semester_id.'" checked>
                                <label for="checkboxExample2"></label>
                              </div>';
              }else{
                $data_ok[1] = '<div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="checkboxExample2" data-nim="'.$r->nim.'" data-sem="'.$r->semester_id.'">
                                <label for="checkboxExample2"></label>
                              </div>';
              }
              
              $data_ok[2] = $r->nim;
              $data_ok[3] = $r->nama_mhs;
              $data_ok[4] = $r->nama_prodi;
              $data_ok[5] = $r->nama;
              
                $data_ok[6] = $this->status($r->nim);
             
              
              
               
               
             
              
               
            
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

  public function data_sesudah()
  {
      $id_users=$this->session->userdata('id_users');
      $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT a.id_mhs,a.nim,a.nama_mhs,b.nama_prodi,c.nama,a.semester_id,(SELECT COUNT(nim) FROM tbl_reg_selesai INNER JOIN app_thn_akademik ON tbl_reg_selesai.thn_akademik=app_thn_akademik.thun_akademik WHERE tbl_reg_selesai.nim=a.nim  AND app_thn_akademik.status='1' ) AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id=b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id=c.id WHERE (SELECT COUNT(nim) FROM tbl_reg_selesai INNER JOIN app_thn_akademik ON tbl_reg_selesai.thn_akademik=app_thn_akademik.thun_akademik WHERE tbl_reg_selesai.nim=a.nim  AND app_thn_akademik.status='1' )=1 ORDER BY a.nim");
      $sem='semester';
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->nama_prodi;
              $data_ok[4] = $r->nama;
               $data_ok[5] =$r->semester_id + 1;
              
               
               
             
              
               
            
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

  function simpan_data(){
    $nim=$this->input->post('nim');
    $semester=$this->input->post('semester');
    $semester2=$semester+1;
    $thun_akademik=$this->input->post('t_akd');
     $tgl=date('Y-m-d H:i:s');
    $data1 = array('nim' =>$nim ,'thun_akademik'=>$thun_akademik,'semester'=>$semester,'tgl_pengajuan'=>$tgl,'v_lab_ppm'=>"1",'v_lab_tps'=>"1",'v_lab_tif'=>"1",'v_kompensasi'=>"1",'v_perpus'=>"1",'v_keuangan'=>"1",'v_khs'=>"1",'v_kaprodi'=>"1" );
    $data2 = array('nim' =>$nim ,'semester_sebelum'=>$semester,'semester_aktif'=>$semester2,'tgl_terdaftar'=>$tgl,'thn_akademik'=>$thun_akademik,'status'=>"Aktif" );
  
  $this->db->insert('tbl_reg_before',$data1);
  $this->db->insert('tbl_reg_selesai',$data2);
  $sa['pesan']="Berhasil Disimpan".$nim.$semester.$thun_akademik;  
  j($sa);
  exit();

  }
  function status($nim){

    $sql1=$this->db->get_where('app_thn_akademik', array('status' =>"1"  ))->row();
    $sql=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi,  
(SELECT COUNT(nim) FROM tbl_reg_before aa INNER JOIN app_thn_akademik bb ON aa.thun_akademik=bb.thun_akademik WHERE aa.nim=a.nim AND bb.status=1) AS ada, 
(SELECT COUNT(nim) FROM tbl_reg_selesai cc INNER JOIN app_thn_akademik dd ON cc.thn_akademik=dd.thun_akademik  WHERE cc.nim=a.nim AND dd.status=1 ) AS terdaftar 
FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi INNER JOIN tbl_semester c ON a.semester_id = c.id WHERE a.nim='$nim' ORDER BY a.prodi_id ASC");
$aa=$sql->row();
    if ($sql->num_rows()>0) {
      
        if ($aa->ada=="1" AND $aa->terdaftar=="0") {
          $status='<span class="label label-info">
                        <i class="fa fa-spin fa-spinner bigger-120"></i>
                        Proses &nbsp;
                      </span>';
       
      }elseif ($aa->ada=="0" AND $aa->terdaftar=="0") {
       $status='belum';
      }elseif ($aa->ada=="1" AND $aa->terdaftar=="1") {
        $status='Selesai';
      }

      }
   
   return $status;
  }
  }