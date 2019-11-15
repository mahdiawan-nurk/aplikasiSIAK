<?php
/**
* 
*/
class D_prodi extends CI_Controller
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
  $sa['ketua'] = obj_to_array($this->M_dsn->get_data_dsn()->result(), "nrp,nama_dsn");
    $sa['dosen']=$this->db->query("SELECT * FROM tbl_dosen ")->result();
  $sa['title']="Data Prodi";
      $sa['p']="data_master/data_prodi";
       $this->cek_akses($sa);
}
function get_data_prodi(){
    $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM tbl_prodi WHERE kode_prodi='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'kode_prodi' => $data->kode_prodi,
          'nama_prodi' => $data->nama_prodi,
          'ket' => $data->ket,
          'ketua' => $data->ketua,
          'jenjang' => $data->jenjang,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }
   public function save_data_prodi(){
    $id=$this->input->post('id');
  $kode=$this->input->post('kode');
  $nama=$this->input->post('nama');
    $singkatan=$this->input->post('singkatan');
    $jenjang=$this->input->post('jenjang');
    
     
    $data = array(
        
          'kode_prodi' => $kode,
          'nama_prodi' => $singkatan,
          'ket' => $nama,
          'ketua' => "",
          'jenjang' =>$jenjang,

);
if ($id=="0") {
   $this->db->insert('tbl_prodi',$data);
      $sa['pesan'] = "Data Prodi Berhasil diinsert".$kode.$nama.$singkatan.$jenjang;
     
}else{
   $data1 = array(
        
          'kode_prodi' => $kode,
          'nama_prodi' => $singkatan,
          'ket' => $nama,
          'jenjang' =>$jenjang

);
    $this->db->where('kode_prodi',$id);
    $this->db->update('tbl_prodi',$data1);
      $sa['pesan'] = "Data Prodi Berhasil diupdate";
}
     
      j($sa);
      exit();
  }

public function save_ketua()
{
   
  $kode=$this->input->post('kode_prodi');
  $ketua=$this->input->post('ketua');
    
     
    $data = array(         
          'ketua' =>$ketua);



    $this->db->where('kode_prodi',$kode);
    $this->db->update('tbl_prodi',$data);
      $sa['pesan'] = "Data Prodi Berhasil diupdate".$kode.$ketua;

     
      j($sa);
      exit();
}
public function delete_data()
{
  $id=$this->input->post('id');
  $this->db->delete('tbl_prodi',array('kode_prodi' =>$id));
 $sa['pesan'] = "Data Prodi Berhasil dihapus";
  j($sa);
      exit();
}

public function data_prodi()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_setting->ambil_prodi_b();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_prodi;
              $data_ok[2] = $r->ket;
              $data_ok[3] = $r->nama_prodi;
              if ($r->nama_dsn=="") {
                $data_ok[4] = '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_add" data="'.$r->kode_prodi.'"><i class="fa fa-plus"></i> Add</a>';
              }else{
                  $data_ok[4] = $r->nama_dsn.'<a href="# " data-toggle="tooltip" title="Ganti" class="btn btn-info btn-xs item_ganti" data="'.$r->kode_prodi.'" data-nrp="'.$r->ketua.'"><i class="fa fa-pencil"></i> Change</a>';
              }
            
         
                $data_ok[5] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->kode_prodi.'"><i class="fa fa-pencil"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->kode_prodi.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
                               </div>';

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