<?php
/**
* 
*/
class D_pengguna extends CI_Controller
{
	
var $folder =   "pengaturan_user";
 public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('User_model');
    $this->load->model('M_pengguna');
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
  


 public function index()
  {
    $this->cek_aktif();
     // $sa['data']= $this->db->query("SELECT * FROM users ")->result();
     //  $sa['level'] =$this->db->query("SELECT a.*,b.email FROM jabatan a INNER JOIN tr_akses b ON a.id_jabatan=b.id_jabatan ")->result();
       $sa['level'] = obj_to_array($this->db->get('jabatan')->result(), "id_jabatan,jabatan");
         $sa['prodi'] = obj_to_array($this->db->get('tbl_prodi')->result(), "kode_prodi,nama_prodi");
      $sa['jabatan']=$this->db->get_where('jabatan',array('jabatan' =>"Mahasiswa" ))->row();
      $sa['jabatan1']=$this->db->get_where('jabatan',array('jabatan' =>"Dosen" ))->row();
      $sa['p']= $this->folder."/pengguna";

      $this->cek_akses($sa);
  }

  public function aktifkan_user(){
    $id=$this->input->post("id");
    $jabatan=$this->input->post("jabatan");
    $ambil_data=$this->db->get_where('tbl_mahasiswa',array('nim' =>$id ))->row();
    $data = array('email' =>$ambil_data->email,
                  'username'=>$ambil_data->nama_mhs,
                  'password'=>md5($ambil_data->nim) );
    $j_data = array('email' => $ambil_data->email,'id_jabatan'=>$jabatan,'keterangan'=>"0" );
    $this->db->insert('users',$data);
    $this->db->insert('tr_akses',$j_data);

    $sa['status']="ok";
    $sa['pesan']='User Berhasil Di Aktifkan';
    j($sa);
    exit();
  }
  public function aktifkan_user_dsn(){
    $id=$this->input->post("id");
    $jabatan=$this->input->post("jabatan");
    $ambil_data=$this->db->get_where('tbl_dosen',array('nrp' =>$id ))->row();
    $data = array('email' =>$ambil_data->email,
                  'username'=>$ambil_data->nama_dsn,
                  'password'=>md5("12345") );
    $j_data = array('email' => $ambil_data->email,'id_jabatan'=>$jabatan,'keterangan'=>"0" );
    $this->db->insert('users',$data);
    $this->db->insert('tr_akses',$j_data);

    $sa['status']="ok";
    $sa['pesan']='User Berhasil Di Aktifkan';
    j($sa);
    exit();
  }
 public function add_level(){
    $email=$this->input->post("email");
    $jabatan=$this->input->post("id_jabatan");
    $keterangan=$this->input->post("keterangan");
    if ($keterangan!='') {
      $j_data = array('email' => $email,'id_jabatan'=>$jabatan,'keterangan'=>$keterangan );
    }else{
       $j_data = array('email' => $email,'id_jabatan'=>$jabatan,'keterangan'=>"0" );
    }
    
   
   
    $this->db->insert('tr_akses',$j_data);

    $sa['status']="ok";
    $sa['pesan']='Jabatan User Berhasil Di tambahkan';
    j($sa);
    exit();
  }
  public function hpus_jbt_user(){
    $email=$this->input->post("email");
    $jabatan=$this->input->post("jabatan");
   
   
    $this->db->delete('tr_akses',array('email' =>$email ,'id_jabatan'=>$jabatan ));

    $sa['status']="ok";
    $sa['pesan']='Jabatan User Berhasil Di Hapus';
    j($sa);
    exit();
  }

   public function simpan_pengguna(){
    $this->form_validation->set_rules('username','username','required', array('required' =>'nama pengguna Tidak Boleh Kosong' ));
    $this->form_validation->set_rules('email','email','trim|required|valid_email|callback_maildata_cek', array('required' =>'Email pengguna Tidak Boleh Kosong' ));
    $this->form_validation->set_rules('password','password','trim|required|min_length[5]|max_length[25]', array('required' =>'password pengguna Tidak Boleh Kosong' ));
    if ($this->form_validation->run()==false) {

      $stat=false;
      $pesan= array(form_error('username'),form_error('email'),form_error('password') );
    }else{
    $username=$this->input->post("username");
    $email=$this->input->post("email");
    $password=$this->input->post("password");
   $data = array('email' =>$email ,'username'=>$username,'password'=>md5($password) );
   
   $this->M_pengguna->save_pengguna($data);
      $stat=true;
      $pesan="Berhasil";
    }

   //  $this->db->insert('users',$data);

    $sa['status']=$stat;
    $sa['pesan']=$pesan;
    j($sa);
    exit();
  }
  function maildata_cek($email){
    $cek=$this->db->get_where('users', array('email' =>$email  ));
    if ($cek->num_rows()>0) {
       $this->form_validation->set_message('maildata_cek','Email Telah Di Pakai');
       return false;
    }else{
      return true;
    }
  }
   public function hapus_pengguna(){
    $email=$this->input->post("email");
   
    $this->db->delete('users',array('email' =>$email ));
    $this->db->delete('tr_akses',array('email' =>$email ));

    $sa['status']="ok";
    $sa['pesan']='Jabatan User Berhasil Di Hapus';
    j($sa);
    exit();
  }

   public function data_pengguna()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_pengguna->data_pengguna();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
        $aa=$this->M_pengguna->data_jabatan($r->email);
        
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->username;
              $data_ok[2] = $r->email;
              $data_oko = array();
              if ($aa->num_rows()>0) {
              foreach($aa->result() as $d) {

               $data_oko[]='<label class="btn alert-default btn-xs" > '.$d->jabatan.'</label><button class="btn-xs btn btn-danger item_hapus"  data="'.$r->email.'" data-jbt="'.$d->id_jabatan.'"><i class="glyphicon glyphicon-trash"></i></button>  ';
        $data_ok[3] = $data_oko;

           }
       }else{
        $data_ok[3] = "Jabatan Belum Di tambahkan";
       }
               $data_ok[4] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_add" data="'.$r->email.'"><i class="fa fa-plus"></i> Add Level User</a>
                             
                              <a href="#"  class="btn btn-danger btn-xs hapus_user" data="'.$r->email.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus User</a>
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
  public function data_pmhs()
  {
    $prodi= $this->input->get('prodi');
    $semester= $this->input->get('semester');
    $angkatan= $this->input->get('angkatan');

    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_mhs->get_datatable($prodi,$semester,$angkatan);
      $query1=$this->db->query("SELECT a.*,b.nama_prodi,c.nama , (SELECT COUNT(email) FROM users WHERE  email = a.email) AS ada
                      FROM tbl_mahasiswa a
                      INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi
                      INNER JOIN tbl_semester c ON a.semester_id = c.id");
      $data = array();

      $no=1;
      foreach($query1->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->nama_prodi;
              $data_ok[4] = $r->nama;
              if ($r->gender == "L") {
              $data_ok[5] = 'Laki-laki';
              }else{
                 $data_ok[5] = 'Perempuan';
              }
                 $data_ok[6] = $r->email;
                 if ($r->ada=="0") {
                   $data_ok[7] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs item_aktif" data="'.$r->nim.'"><i class="fa fa-eye"></i> Aktifkan</a>
                              
                               </div>';
                 }else{
                   $data_ok[7] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_naktif" data="'.$r->nim.'"><i class="fa fa-eye"></i> Non-Aktifkan</a>
                                 <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-danger btn-xs item_reset" data="'.$r->nim.'"><i class="fa fa-eye"></i> Reset </a>
                               </div>';
                 }
              
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
   public function data_pdsn()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_dsn->get_datatable();
      $query1=$this->db->query("SELECT a.*,b.nama_prodi, (SELECT COUNT(email) FROM users WHERE email = a.email) AS ada FROM tbl_dosen a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi ");
      $data = array();

      $no=1;
      foreach($query1->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nrp;
              $data_ok[2] = $r->nama_dsn;
              $data_ok[3] = $r->nama_prodi;
              if ($r->gender == "L") {
              $data_ok[4] = 'Laki-laki';
              }else{
                 $data_ok[4] = 'Perempuan';
              }
                 $data_ok[5] = $r->email;
                 if ($r->ada=="0") {
                  $data_ok[6] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs item_aktif" data="'.$r->nrp.'"><i class="fa fa-eye"></i>Aktifkan</a>
                              
                               </div>';
                 }else{
                    $data_ok[6] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_naktif" data="'.$r->nrp.'"><i class="fa fa-eye"></i> Non-Aktifkan</a>
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-danger btn-xs item_reset" data="'.$r->nrp.'"><i class="fa fa-eye"></i> Reset</a>
                               </div>';
                 }
                
               
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


