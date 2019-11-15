<?php
class R_selesai_daftar extends CI_Controller
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
    $sa['user']=$this->db->get_where('tr_akses', array('email' =>$id_users,'id_jabatan'=>"9"  ))->num_rows();
    $sa['thn_ak']=obj_to_array($this->db->get('app_thn_akademik')->result(), "thun_akademik,thun_akademik");
    $sa['prodi1'] = obj_to_array($this->db->get('tbl_prodi')->result(), "kode_prodi,nama_prodi");
   $sa['prodi'] = $this->db->get('tbl_prodi')->result();
    $sa['semester']=$this->db->get('tbl_semester')->result();
    $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/dta_selesai_new";
    $this->cek_akses($sa);
  }

  function ambil_semester(){
    $ta=$this->input->post('ta');
    $ambil=$this->db->get_where('app_thn_akademik',array('thun_akademik' =>$ta  ))->row();
    $semester=$this->db->get_where('tbl_semester', array('ket' =>$ambil->ta_tipe ))->result();
    $data='';
    foreach ($semester as $s) {
      $data=$data.'<li>
                          <a href="mailbox-folder.html" class="menu-item ">'.$s->nama.' </a>
                        </li>';
    }

    j($data);
    exit();
  }

  public function list_kelas()
  {
     $kode_prodi=$this->input->post('prodi');
     $kelas=$this->db->get_where('rombel_jenis', array('prodi_id' =>$kode_prodi ));
     if ($kelas->num_rows()>0) {
      $hsl='';
      foreach ($kelas->result() as $k) {
         $hsl=$hsl.'<li>
                          <a href="mailbox-folder.html" class="menu-item "><i class="fa fa-list">&nbsp;</i><span>'.$k->nama_rombel.'</span> </a>
                        </li>';
       } 
     }else{
      $hsl=$hsl.'<li>
                          <a href="mailbox-folder.html" class="menu-item ">Tidak Ada Rombel </a>
                        </li>';
     }
j($hsl);
exit();
  }

   public function data_selesai_reg()
  {
    $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_selesai_daftar($semester);
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->prodi;
              $data_ok[4] = $r->semester_aktif;
             if ($r->tgl_pengajuan!='') {
                $data_ok[5] = date('d-m-Y',strtotime($r->tgl_terdaftar));
              }else{
                $data_ok[5] = '';
              }
             if ($r->ada == 1) {
               $data_ok[6] = '<span class="label label-success">
                        <i class="ace-icon fa fa-check bigger-120"></i>
                        Sudah Terdaftar &nbsp;
                      </span>';
             }else{
                $data_ok[6] = '<span class="label label-danger">
                        <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                        Belum Terdaftar
                      </span>';
             }
              if ($r->status_mhs == "aktif") {
               $data_ok[7] = '<span class="label label-success">
                        <i class="ace-icon fa fa-check bigger-120"></i>
                        '.$r->status_mhs.' &nbsp;
                      </span>';
             }else{
                $data_ok[7] = '<span class="label label-danger">
                        <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                        '.$r->status_mhs.' 
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
  }