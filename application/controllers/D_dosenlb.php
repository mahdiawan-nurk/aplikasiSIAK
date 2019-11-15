<?php
/**
* 
*/
class D_dosenlb extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
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
  
//Class Dosen
public function index()
  {
    $this->cek_aktif();
    $sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "kode_prodi,nama_prodi");
    $sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
      $sa['title']="Data Mahasiswa";
      $sa['p']="data_master/data_dosenlb";
       $this->cek_akses($sa);
    // $this->load->view('admin',$sa);     
    
  }
  function get_data_dlb(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM tbl_dosen_lb WHERE id_dosen_lb='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_dlb' => $data->id_dosen_lb,
          'nama_dlb' => $data->nama_dlb,
          'agama' => $data->agama,
           'gender' => $data->gender,
            'email' => $data->email,
             'alamat' => $data->alamat,
          );
      }
    }
    
    echo json_encode($hasil);
  }
  public function save_data_dlb(){
    $id_dosen=$this->input->post('id_dlb');
    $nama=$this->input->post('nama_dlb');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'id_dosen_lb'=>$id_dosen,
        'nama_dlb'=>$nama,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat
);
    $this->db->insert('tbl_dosen_lb',$data);
      
      $sa['status'] = "main";
      $sa['pesan'] = "Data Dosen LB Berhasil ditambahkan";
     
      
     
     
      j($sa);
      exit();
  }
   public function update_data_dlb(){
   $id_dosen=$this->input->post('id_dlb');
    $nama=$this->input->post('nama_dlb');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'id_dosen_lb'=>$id_dosen,
        'nama_dlb'=>$nama,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat
);
    $this->db->where('id_dosen_lb',$id_dosen);
    $this->db->update('tbl_dosen_lb',$data);
      
      $sa['status'] = "main";
      $sa['pesan'] = "Data Dosen LB Berhasil diupdate";
     
      
     
     
      j($sa);
      exit();
  }
  public function delete_data_dlb(){

    $id=$this->input->post('id');

    $this->db->delete('tbl_dosen_lb',array('id_dosen_lb' =>$id ));
     $sa['status'] = "hapus";
      $sa['pesan'] = "Data Dosen LB Berhasil di Hapus ".$id;
     
      
     
     
      j($sa);
      exit();
  }

 public function data_dsn_lb()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('tbl_dosen_lb');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->id_dosen_lb;
              $data_ok[2] = $r->nama_dlb;
              $data_ok[3] = $r->agama;
              if ($r->gender == "L") {
              $data_ok[4] = 'Laki-laki';
              }else{
                 $data_ok[4] = 'Perempuan';
              }
                 $data_ok[5] = $r->email;
               $data_ok[6] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_dosen_lb.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_dosen_lb.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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