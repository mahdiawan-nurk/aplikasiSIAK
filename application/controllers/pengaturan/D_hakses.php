<?php
/**
* 
*/
class D_hakses extends CI_Controller
{
	
var $folder =   "pengaturan_user";
 public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_pengguna');
    $this->load->model('M_jabatan');
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
  


 public function index()
  {
    $this->cek_aktif();
      $sa['title']="User Akses";
    

      $sa['p']=$this->folder."/u_akses";
    // $this->load->view('admin',$sa);    
    $this->cek_akses($sa);  
    
  }
  function get_data1(){
    $id=$this->input->get('id');
    $hsl=$this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_jabatan' => $data->id_jabatan,
          'jabatan' => $data->jabatan,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }
  function simpan_jabatan(){
    $nama=$this->input->post('nama');       
$this->db->query("INSERT INTO jabatan (jabatan)VALUES('$nama')");
      $sa['status'] = "main";
      $sa['pesan'] = "jabatan Berhasil ditambahkan".$nama;
      j($sa);
      exit();
    }
  function update_jabatan(){
     $id=$this->input->post('id');
    $nama=$this->input->post('jabatan');
   $this->db->query("UPDATE jabatan SET jabatan='$nama' WHERE id_jabatan='$id'");
     $sa['status'] = "main";
      $sa['pesan'] = "jabatan Berhasil di EDIT";
      j($sa);
      exit();
  }
  function hapus_jabatan(){
     $kobar=$this->input->post('kode');
   $this->db->query("DELETE FROM jabatan WHERE id_jabatan='$kobar'");
     $sa['status'] = "hapus";
      $sa['pesan'] = "jabatan Berhasil dihapus";
      j($sa);
  }
  public function datatable()
  {
      $query = $this->db->query("SELECT *FROM jabatan ORDER BY jabatan ASC ")->result();
      echo j($query);
  exit();      
  }
  function view_akses(){
    $this->cek_aktif();
    $uri = $this->uri->segment(4);
        $sa['jabatan']= $this->db->query("SELECT *FROM jabatan where id_jabatan='$uri' ")->row();
      $sa['p']=$this->folder."/u_akses";
    $this->cek_akses($sa);
        

  }

  public function simpan_level()
  {
    $nama = $this->input->post('nama');
    $keterangan = $this->input->post('keterangan');
    $data = array('level' =>$nama ,'keterangan'=>$keterangan );
    $this->db->insert('user_level',$data);
    $sa['status']= "ok";
    $sa['pesan']= "cek data post".$nama.$keterangan;
    j($sa);
    exit();
  }

public function ubah_akses(){
  $level = $this->input->post('akseslvl');
  $id_menu= $this->input->post('aksesid');

  $data= array(
    'id_jabatan'=>$level,
    'id_menu'=>$id_menu
   
  );

$hasil =$this->db->get_where('hak_akses',$data);

if ($hasil->num_rows()<1) {
  $this->db->insert('hak_akses',$data);
$sa['status'] = "insert";
$sa['pesan'] = "Hak akses ".$level.$id_menu. " telah ditambahkan";
    
}else{
  $this->db->delete('hak_akses',$data);
  $sa['status'] = "delete";
$sa['pesan'] = "Hak akses telah di hapus";
     
}
      j($sa);
      exit();
}

function hapus_grup(){
 $kobar=$this->input->post('kode');
 $level=$this->input->post('kode1');
$data = array('id_level' =>$kobar);
$data1= array('level'=>$level);
    $this->db->delete('user_akses',$data1);
    $this->db->delete('user_level',$data);
    
     $sa['status'] = "ok";
    $sa['pesan'] = "Group Akses ".$level. "telah di hapus";
    
    j($sa);
    exit();

}
public function data_jabatan()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_jabatan->data_jabatan();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->jabatan;
               $data_ok[2] = '<div class="btn-group" style="float:right;">
               <a href="'.site_url('pengaturan/d_hakses/view_akses/').$r->id_jabatan.'" class="btn btn-warning btn-xs " ><i class="fa fa-eye"></i> View Hak Akses</a>
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_jabatan.'"><i class="fa fa-pencil"></i> Edit</a>
                            
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


