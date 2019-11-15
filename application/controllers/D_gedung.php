<?php
/**
* 
*/
class D_gedung extends CI_Controller
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
  

public function index($value='')
{
$this->cek_aktif();    
  $sa['title']="Data gedung";
      $sa['p']="data_master/data_gedung";
       $this->cek_akses($sa);

}

// ini Function CRUD gedungnya

function get_data(){
     $id=$this->input->post('id');
    $hsl=$this->db->get_where('app_gedung',array('gedung_id' =>$id  ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_gd' => $data->gedung_id,
          'kode_gd' => $data->kode_gedung,
          'nama_gd' => $data->nama_gedung,
          'register' => $data->kode_register,
          'kondisi_gd' => $data->kondisi_bangunan,
          'tingkat' => $data->kontruksi_tingkat,
          'beton' => $data->kontruksi_bton,
          'lantai' => $data->luas_lantai,
          'l_gd' => $data->luas_gedung,
          'status_t' => $data->status_tanah,
          'asal_usul' => $data->asal_usul,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }


function create_gedung(){
   
  $kode_gd=$this->input->post('kode_gd');
  $nama_gd=$this->input->post('nama_gd');
  $register=$this->input->post('register');
  $kondisi_gd=$this->input->post('kondisi_gd');
  $tingkat=$this->input->post('tingkat');
  $beton=$this->input->post('beton');
  $lantai=$this->input->post('lantai');
  $l_gd=$this->input->post('l_gd');
  $status_t=$this->input->post('status_t');
  $asul=$this->input->post('asal_usul');

  $data = array('nama_gedung' =>$nama_gd,
          'kode_gedung'=>$kode_gd,
          'kode_register'=>$register,
          'kondisi_bangunan'=>$kondisi_gd,
          'kontruksi_tingkat'=>$tingkat,
          'kontruksi_bton'=>$beton,
          'luas_lantai'=>$lantai,
          'luas_gedung'=>$l_gd,
          'status_tanah'=>$status_t,
          'asal_usul'=>$asul
           );
  $this->db->insert('app_gedung',$data);
  $sa['pesan']="Data Gedung Berhasil Di TambahKan";
  j($sa);
  exit();
}

function update_gedung(){
   $id=$this->input->post('id');
   
  $kode_gd=$this->input->post('kode_gd');
  $nama_gd=$this->input->post('nama_gd');
  $register=$this->input->post('register');
  $kondisi_gd=$this->input->post('kondisi_gd');
  $tingkat=$this->input->post('tingkat');
  $beton=$this->input->post('beton');
  $lantai=$this->input->post('lantai');
  $l_gd=$this->input->post('l_gd');
  $status_t=$this->input->post('status_t');
  $asul=$this->input->post('asal_usul');

  $data = array('nama_gedung' =>$nama_gd,
          'kode_gedung'=>$kode_gd,
          'kode_register'=>$register,
          'kondisi_bangunan'=>$kondisi_gd,
          'kontruksi_tingkat'=>$tingkat,
          'kontruksi_bton'=>$beton,
          'luas_lantai'=>$lantai,
          'luas_gedung'=>$l_gd,
          'status_tanah'=>$status_t,
          'asal_usul'=>$asul
           );
  $this->db->where('gedung_id',$id);
  $this->db->update('app_gedung',$data);
  $sa['pesan']="Data Gedung Berhasil Di update";
  j($sa);
  exit();
}

function delete_gedung(){
  $id=$this->input->post('pilih');
  if ($id=='') {
    $stat='100';
  }else{
    for ($i=0; $i < count($id); $i++) { 
     $this->db->delete('app_gedung', array('gedung_id' =>$id[$i] )); 
    }
    $stat='200';
  }

  // $this->db->delete('app_gedung', array('gedung_id' =>$id ));

  // $sa['pesan']="Data Gedung Berhasil Di Hapus";
  // j($sa);
  // exit();
  echo $stat;
}
// ini Akhir function CRUD nya

public function data_gedung()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_gedung');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_gedung;
              $data_ok[2] = $r->nama_gedung;
              $data_ok[3] = $r->kode_register;
              $data_ok[4] = $r->kondisi_bangunan;
              $data_ok[5] = $r->kontruksi_tingkat;
              $data_ok[6] = $r->kontruksi_bton;
              $data_ok[7] = $r->luas_lantai;
              $data_ok[8] = $r->luas_gedung;
              $data_ok[9] = $r->status_tanah;
              $data_ok[10] = $r->asal_usul;
              $data_ok[11] = '<div class="btn-group" style="float:right;">
                              <a href="#modalForm " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs modal-with-form" data="'.$r->gedung_id.'"><i class="fa fa-pencil"></i> Edit</a>
                               </div>';
              $data_ok[12] = '<input type="checkbox" name="pilih[]" value="'.$r->gedung_id.'">';

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