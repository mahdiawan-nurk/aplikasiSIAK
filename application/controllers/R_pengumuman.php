<?php
class R_pengumuman extends CI_Controller
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
    $this->cek_aktif();
    $id_users=$this->session->userdata('id_users');
    $cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan")->result();
    foreach ($cek_login as $key) {
    if ($key->jabatan == 'Wadir1') {
      $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/pengumuman/p_wadir";
    }elseif ($key->jabatan == 'Kabag') {
      $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/pengumuman/p_kabag";
    }elseif ($key->jabatan == 'Akademik') {
      $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi_ulang/pengumuman/p_utama";
    }elseif ($key->jabatan == 'Admin') {
      $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi/pengumuman/p_utama";
    }
    
  }
    
    $this->cek_akses($sa);
  }
  public function edit_data()
  {
    $id=$this->uri->segment(3);
    if ($id == 0) {
      $sa['id']=$this->uri->segment(3);
      $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi/pengaturan_reg";
   $this->cek_akses($sa);
    }else{ 
      $sa['id']=$this->uri->segment(3);
      $sa['data']= $this->db->query("SELECT * FROM con_reg WHERE id_reg='$id'")->result();
    $sa['title']="Dashboard | SIAKAD";
      $sa['p']="registrasi/pengaturan_reg";
   $this->cek_akses($sa);
  }
   
  }
public function data_pengumuman()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_setting->data_pengumuman();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
      
        
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->tahun_akedmik;
              $data_ok[2] = $r->tgl_mulai;
              $data_ok[3] = $r->tgl_selesai;
              $data_ok[4] = '<div class="btn-group" style="float:right;"><a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_lihat" data="'.$r->id_reg.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a></div>';
              if ($r->status == 1) {
               $data_ok[5] = 'Aktif';
             }else{
              $data_ok[5] = 'Non-Aktif';
             }

              
               $data_ok[6] = '<div class="btn-group" style="float:right;">
                             '.btn_akd($r->id_reg).'
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_reg.'"><i class="fa fa-eye"></i> Edit</a>
                              
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_reg.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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
  public function data_pengumuman_wd()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_setting->data_pengumuman();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
        $aa=$this->M_pengguna->data_jabatan($r->kon_id);
        
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->tahun_akedmik;
              $data_ok[2] = $r->tgl_mulai;
              $data_ok[3] = $r->tgl_selesai;
              $data_ok[4] = '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_lihat" data="'.$r->id_reg.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a>';
              if ($r->status == 1) {
               $data_ok[5] = 'Aktif';
             }else{
              $data_ok[5] = 'Non-Aktif';
             }

              
               $data_ok[6] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kabag($r->id_reg).'/>
                                                        <span class="lbl"></span>
                                                    </label>';       
               $data_ok[7] = '<div class="btn-group" style="float:right;">
                              '.btn_v_wadir($r->id_reg).'
                              
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-warning btn-bold item_comen" data="'.$r->id_reg.'"><i class="ace-icon fa fa-bell icon bigger-120 yellow"></i>Komentar</a>
                               </div>';;   

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
    public function data_pengumuman_kab()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_setting->data_pengumuman();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
       
        
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->tahun_akedmik;
              $data_ok[2] = $r->tgl_mulai;
              $data_ok[3] = $r->tgl_selesai;
              $data_ok[4] = '
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_lihat" data="'.$r->id_reg.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a>';
              if ($r->status == 1) {
               $data_ok[5] = 'Aktif';
             }else{
              $data_ok[5] = 'Non-Aktif';
             }

              
              
               $data_ok[6] = btn_v_kabag($r->id_reg);   
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