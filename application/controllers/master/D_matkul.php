<?php
/**
* 
*/
class D_matkul extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
     $this->load->model('M_matkul');
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
  $sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "kode_prodi,nama_prodi");
    $sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
    $sa['kurikulum'] = obj_to_array($this->db->get('app_kurikulum')->result(), "id_kur,thn_kur");
    
  $sa['title']="Data Matakuliah";
      $sa['p']="data_master/data_matkul";
       $this->cek_akses($sa);
}

function get_data_mk(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM makul_matakuliah WHERE makul_id='1'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_mk' => $data->makul_id,
          'kode_mk' => $data->kode_makul,
          'nama_mk' => $data->nama_makul,
          'sks' => $data->sks,
          'semester' => $data->semester_id,
          'prodi' => $data->prodi_id,
          'jenis_mk' => $data->jenis_makul,
          'kur_mk' => $data->kur_id,
          );
      }
    }
    
    echo json_encode($hasil);
  }

public function save_data_mk()
{
$id=$this->input->post('id');
$kode_mk=$this->input->post('kode_mk');
$nama_mk=$this->input->post('nama_mk');
$sks=$this->input->post('sks');
$prodi=$this->input->post('prodi');
$semester=$this->input->post('semester');
$jenis_mk=$this->input->post('jenis_mk');
$kur_mk=$this->input->post('kur_mk');

$data = array('kode_makul' =>$kode_mk ,'nama_makul'=>$nama_mk,'sks'=>$sks,'semester_id'=>$semester,'prodi_id'=>$prodi,'jenis_makul'=>$jenis_mk,'kur_id'=>$kur_mk );
if ($id=="0") {
  $this->db->insert('makul_matakuliah',$data);
  $pesan="insert data MK";
}else{
  $this->db->where('makul_id',$id);
  $this->db->update('makul_matakuliah',$data);
  $pesan ="Update Data mk";
}

$sa['pesan']=$pesan;
j($sa);
exit();
}

public function delete_data_mk()
{
  $id=$this->input->post('id');
  $this->db->delete('makul_matakuliah', array('makul_id' =>$id ));
  $sa['pesan']="Delete data Berhasil";
  j($sa);
  exit();
}

public function data_matkul()
  {
    $prodi=$this->input->get('prodi');
    $semester=$this->input->get('semester');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_matkul->get_datatable($prodi,$semester);
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_makul;
              $data_ok[2] = $r->nama_makul;
              $data_ok[3] = $r->sks;
              $data_ok[4] = $r->prodi;
              $data_ok[5] = $r->semester;
                $data_ok[6] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->makul_id.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->makul_id.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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