<?php
/**
* 
*/
class D_dosen extends CI_Controller
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
//Class Dosen
public function index()
  {
    $this->cek_aktif();
    $sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "kode_prodi,nama_prodi");
    $sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
      $sa['title']="Data Mahasiswa";
      $sa['p']="data_master/data_dosen";
       $this->cek_akses($sa);
    // $this->load->view('admin',$sa);     
    
  }
  function get_data_dsn(){
    $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM tbl_dosen WHERE id_dosen='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id' => $data->id_dosen,
          'nrp' => $data->nrp,
          'nidn' => $data->nidn,
          'nama' => $data->nama_dsn,
          'prodi' => $data->prodi_id,
          'agama' => $data->agama,
           'gender' => $data->gender,
            'email' => $data->email,
             'alamat' => $data->alamat,
          );
      }
    }
    
    echo json_encode($hasil);
  }
  public function save_data_dsn(){
  $nrp=$this->input->post('nrp');
  $nidn=$this->input->post('nidn');
    $nama=$this->input->post('nama');
    $prodi=$this->input->post('prodi');
     $semester=$this->input->post('semester');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'nrp'=>$nrp,
        'nidn'=>$nidn,
        'nama_dsn'=>$nama,
        'prodi_id'=>$prodi,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat
);
    $this->M_dsn->save_data($data);
      
      $sa['status'] = "main";
      $sa['pesan'] = "Data Dosen Berhasil ditambahkan";
     
      
     
     
      j($sa);
      exit();
  }
   public function update_data_dsn(){
    $id=$this->input->post('id');
  $nrp=$this->input->post('nrp');
  $nidn=$this->input->post('nidn');
    $nama=$this->input->post('nama');
    $prodi=$this->input->post('prodi');
     $semester=$this->input->post('semester');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'nrp'=>$nrp,
        'nidn'=>$nidn,
        'nama_dsn'=>$nama,
        'prodi_id'=>$prodi,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat
);
       
$this->M_dsn->update_data($data,$id);
      
      $sa['status'] = "main";
      $sa['pesan'] = "Data Mahasiswa Berhasil diupdate";
     
      
     
     
      j($sa);
      exit();
  }
  public function delete_data_dsn(){

    $id=$this->input->post('id');

    $this->M_dsn->delete_data($id);
     $sa['status'] = "hapus";
      $sa['pesan'] = "Data Mahasiswa Berhasil di Hapus ".$id;
     
      
     
     
      j($sa);
      exit();
  }

 public function data_dsn()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_dsn->get_datatable();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nrp;
              $data_ok[2] = $r->nidn;
              $data_ok[3] = $r->nama_dsn;
              $data_ok[4] = $r->prodi;
              if ($r->gender == "L") {
              $data_ok[5] = 'Laki-laki';
              }else{
                 $data_ok[5] = 'Perempuan';
              }
              
                $data_ok[6] = $r->agama;
                 $data_ok[7] = $r->email;
               $data_ok[8] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs sharp item_edit" data="'.$r->id_dosen.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs sharp item_hapus" data="'.$r->id_dosen.'" ><i class="fa fa-trash-o" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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