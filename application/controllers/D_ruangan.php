<?php
/**
* 
*/
class D_ruangan extends CI_Controller
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
    $sa['gedung']=obj_to_array($this->db->get('app_gedung')->result(), "gedung_id,nama_gedung");
  $sa['title']="Data ruangan";
      $sa['p']="data_master/data_ruangan";
       $this->cek_akses($sa);
}


//Ini Functin CRUD nya
function get_data(){
     $id=$this->input->post('id');
    $hsl=$this->db->get_where('app_ruangan',array('ruangan_id' =>$id  ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_rg' => $data->ruangan_id,
          'kode_rg' => $data->kode_ruangan,
          'nama_rg' => $data->nama_ruangan,
          'id_gd' => $data->gedung_id,
          'kapasitas' => $data->kapasitas,
          'keterangan' => $data->keterangan,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }


function create_ruangan(){
 $id_gdg=$this->input->post('id_gd');
 $kode_rg=$this->input->post('kode_rg');
 $nama=$this->input->post('nama');
 $kapasitas=$this->input->post('kapasitas');
 $keterangan=$this->input->post('keterangan');

  $data = array('kode_ruangan'=>$kode_rg,'nama_ruangan'=>$nama,'gedung_id' =>$id_gdg,'kapasitas'=>$kapasitas,'keterangan'=>$keterangan );
  $this->db->insert('app_ruangan',$data);
  $sa['pesan']="Data Gedung Berhasil Di TambahKan".$kode_rg.$kode_gdg.$id_gdg.$nama.$kapasitas.$keterangan;
  j($sa);
  exit();
}

function update_ruangan(){
  $id=$this->input->post('id');
  $id_gdg=$this->input->post('id_gd');
$kode_rg=$this->input->post('kode_rg');
 $nama=$this->input->post('nama');
 $kapasitas=$this->input->post('kapasitas');
 $keterangan=$this->input->post('keterangan');

 $data = array('kode_ruangan'=>$kode_rg,'nama_ruangan'=>$nama,'gedung_id' =>$id_gdg,'kapasitas'=>$kapasitas,'keterangan'=>$keterangan );
  $this->db->where('ruangan_id',$id);
  $this->db->update('app_ruangan',$data);
  $sa['pesan']="Data Gedung Berhasil Di Update";
  j($sa);
  exit();
}

function delete_ruangan(){
 $id=$this->input->post('pilih');
  if ($id=='') {
    $stat='100';
  }else{
    for ($i=0; $i < count($id) ; $i++) { 
       $this->db->delete('app_ruangan', array('ruangan_id' =>$id[$i] ));
    }
   
    $stat='200';
  }
  

  // $sa['pesan']="Data Gedung Berhasil Di Hapus";
  // j($sa);
  // exit();
 echo $stat;
}


//funtion CRUD nya Sampai Di sini saja
public function data_ruangan()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT a.*,b.nama_gedung FROM app_ruangan a INNER JOIN app_gedung b ON a.gedung_id=b.gedung_id ");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_ruangan;
              $data_ok[2] = $r->nama_ruangan;
              $data_ok[3] = $r->nama_gedung;
              $data_ok[4] = $r->kapasitas;
              $data_ok[5] = $r->keterangan;
         
               $data_ok[6] = '<div class="btn-group" style="float:right;">
                              <a href="#modalForm" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->ruangan_id.'"><i class="fa fa-pencil"></i> Edit</a>
                              
                               </div>';
                 $data_ok[7] ='<input type="checkbox" name="pilih[]" value="'.$r->ruangan_id.'">' ;

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