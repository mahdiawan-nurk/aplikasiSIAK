<?php
/**
* 
*/
class D_mhs extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
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
public function index()
	{
		$this->cek_aktif();
		$sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "kode_prodi,nama_prodi");
		$sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
    $sa['angkatan'] = obj_to_array($this->M_setting->ambil_angkatan()->result(), "id_angkatan,thn_angkatan");
			$sa['title']="Data Mahasiswa";
			$sa['p']="data_master/data_mhs";
      $this->cek_akses($sa);
		// $this->load->view('admin',$sa);			
		
	}
  function get_data_mhs(){
    $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'nim' => $data->nim,
          'nama' => $data->nama_mhs,
          'prodi' => $data->prodi_id,
          'semester' => $data->semester_id,
          'angkatan' => $data->angkatan_id,
          'agama' => $data->agama,
           'gender' => $data->gender,
            'email' => $data->email,
             'alamat' => $data->alamat,
             'foto' => $data->foto,
          );
      }
    }
    
    echo json_encode($hasil);
  }

  public function update_data_mhs(){
  $nim=$this->input->post('nim');
    $nama=$this->input->post('nama');
    $prodi=$this->input->post('prodi');
     $semester=$this->input->post('semester');
     $angkatan=$this->input->post('angkatan');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'nim'=>$nim,
        'nama_mhs'=>$nama,
        'prodi_id'=>$prodi,
        'semester_id'=>$semester,
        'angkatan_id'=>$angkatan,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat,
        'foto'=>""
);
       
$this->M_mhs->update_data($data,$nim);
      
      $sa['status'] = "main";
      $sa['pesan'] = "Data Mahasiswa Berhasil diupdate";
     
      
     
     
      j($sa);
      exit();
  }

	public function save_data(){
    $this->form_validation->set_rules('nim','nim','trim|required|numeric|max_length[10]|callback_nimdata_ceck');
    $this->form_validation->set_rules('nama','nama','required');
    $this->form_validation->set_rules('prodi','prodi','required');
    $this->form_validation->set_rules('semester','semester','required');
    $this->form_validation->set_rules('angkatan','angkatan','required');
    $this->form_validation->set_rules('gender','gender','required');
    $this->form_validation->set_rules('agama','agama','required');
    $this->form_validation->set_rules('email','email','trim|required|valid_email|callback_maildata_ceck');
    $this->form_validation->set_rules('alamat','alamat','required');
    
    if ($this->form_validation->run()==false) {
      $pesan = array('nim'=>form_error('nim'),'nama'=>form_error('nama'),'prodi'=>form_error('prodi'),'semester'=>form_error('semester'),'angkatan'=>form_error('angkatan'),'gender'=>form_error('gender'),'agama'=>form_error('agama'),'email'=>form_error('email'),'alamat'=>form_error('alamat') );
      $stat=false;
    }else{

      $nim=$this->input->post('nim');
    $nama=$this->input->post('nama');
    $prodi=$this->input->post('prodi');
     $semester=$this->input->post('semester');
     $angkatan=$this->input->post('angkatan');
    $gender=$this->input->post('gender');
    $agama=$this->input->post('agama');
     $email=$this->input->post('email');
    $alamat=$this->input->post('alamat');
     
    $data = array(
        'nim'=>$nim,
        'nama_mhs'=>$nama,
        'prodi_id'=>$prodi,
        'semester_id'=>$semester,
        'angkatan_id'=>$angkatan,
        'agama'=>$agama,
        'gender'=>$gender,
        'email'=>$email,
        'alamat'=>$alamat,
        'foto'=>""
);

      $this->M_mhs->save_data($data);
       $stat=true;
      $pesan="Berhasil";
    }
	
      
      $sa['status'] = $stat;
      $sa['pesan'] = $pesan;
     
      
     
     
      j($sa);
      exit();
	}
  public function nimdata_ceck($nim)
  {
    $cek=$this->db->get_where('tbl_mahasiswa', array('nim' =>$nim));
    if ($cek->num_rows()>0) {
      $this->form_validation->set_message('nimdata_ceck','Data Nim Telah Di Pakai');
      return false;
    }else{
      return true;
    }
  }
   public function maildata_ceck($email)
  {
    $cek=$this->db->get_where('tbl_mahasiswa', array('email' =>$email));
    if ($cek->num_rows()>0) {
      $this->form_validation->set_message('maildata_ceck','Email Telah Di Pakai');
      return false;
    }else{
      return true;
    }
  }
	public function delete_data(){

		$nim=$this->input->post('nim');

		$this->M_mhs->delete_data($nim);
		 $sa['status'] = "hapus";
      $sa['pesan'] = "Data Mahasiswa Berhasil di Hapus ".$nim;
     
      
     
     
      j($sa);
      exit();
	}
public function data_mhs()
  {
    $prodi= $this->input->get('prodi');
    $semester= $this->input->get('semester');
    $angkatan= $this->input->get('angkatan');

    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_mhs->get_datatable($prodi,$semester,$angkatan);
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->prodi;
              $data_ok[4] = $r->semester;
              if ($r->gender == "L") {
              $data_ok[5] = 'Laki-laki';
              }else{
                 $data_ok[5] = 'Perempuan';
              }
                $data_ok[6] = $r->agama;
                 $data_ok[7] = $r->email;
               $data_ok[8] = '<div class="btn-group btn-group-justified">
                    <a href="# " data-toggle="tooltip" title="Lihat Data" class="btn btn-warning btn-xs item_lihat" data="'.$r->nim.'"><i class="fa fa-eye"></i> Lihat Profile</a>
                   
                  </div><div class="btn-group btn-group-justified" >
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->nim.'"><i class="fa fa-pencil"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->nim.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

  public function generate_email()
  {
    $this->db->select('*');
    $this->db->from('tbl_mahasiswa');
    $this->db->join('tbl_prodi','tbl_mahasiswa.prodi_id=tbl_prodi.kode_prodi');
    $mhs=$this->db->get();
    $jml=$mhs->num_rows();

    

  $data = array();

  foreach ($mhs->result() as $k) {
    $tampung = array();

    $tampung[]=$k->nim;
   
    $tampung[]='mahasiswa'.strtolower($k->nama_prodi).substr($k->nim, 0,4).'.'.substr($k->nim, 6,3).'@poltek-kampar.ac.id';
    $data[]=$tampung;
 
  }

  for ($i=0; $i <$jml; $i++) { 
   $this->db->where('nim',$data[$i][0]);
   $this->db->update('tbl_mahasiswa', array('email' =>$data[$i][1]  ));
  }
echo "Successs";
 
  }

}