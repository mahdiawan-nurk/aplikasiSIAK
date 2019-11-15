<?php
/**
* 
*/
class V_kalab extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->model('M_registrasi');
    
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
  
  function index(){
  	$this->cek_aktif();
    $id_users=$this->session->userdata('id_users');
    $prodi=$this->session->userdata('prodi');
    $sa['prodi'] = obj_to_array($this->db->get('tbl_prodi')->result(), "kode_prodi,nama_prodi");
    $sa['semester']=$this->db->get('tbl_semester')->result();
    $cek_prodi=$this->db->query("SELECT * FROM tr_akses,tbl_prodi WHERE tr_akses.email='".$id_users."' AND tbl_prodi.kode_prodi=tr_akses.keterangan ");
    if ($cek_prodi->num_rows()>0) {
      $sa['title']="Dashboard | SIAKAD";
    $sa['p']="registrasi_ulang/validasi/V_kalab";
    $this->cek_akses($sa);
    }
  
  }
  public function data_kalab()
  {
    $id_users=$this->session->userdata('id_users');
    $prodi1=$this->session->userdata('prodi');
    $prodi=$this->input->get('prodi');
     $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_team($prodi1,$prodi,$semester);
      $query2=$query->row();
      $sem_peng=$query2->semester + 1;
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
     
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama;
              $data_ok[3] = $r->prodi;
               $data_ok[4] = 'Semester '.$sem_peng;
                $data_ok[5] = $r->tgl_pengajuan;
                 $data_ok[6] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_lab($id_users,$r->nim). '/>
                                                        <span class="lbl"></span>
                                                    </label>';
                
                   $data_ok[7] =  btn_val_lab($id_users,$r->nim,$r->semester); 
                
                
                 
                                                  
                                       

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
   public function simpan_validasi_kalab()
  {
    $id_users=$this->session->userdata('id_users');
     $nim=$this->input->post('nim');
     $semester=$this->input->post('sem');
     $prodi=$this->db->get_where('tr_akses',array('email' =>$id_users))->row();
   if ($prodi->keterangan=='13') {
        $cek_val=$this->db->get_where('tbl_reg_before',array('v_lab_tif' =>"1",'nim'=>$nim, 'semester'=>$semester ));
        if ($cek_val->num_rows()>0) {
         $this->db->query("UPDATE tbl_reg_before SET v_lab_tif = '0' WHERE nim='$nim' AND semester='$semester'");
        $sa['pesan']="ini Unvalid lab TIF";
        $this->send_notif($prodi->keterangan,'Telah Di Un-validasi');
           }else{
       $this->db->query("UPDATE tbl_reg_before SET v_lab_tif = '1' WHERE nim='$nim' AND semester='$semester'");
         $sa['pesan']="ini valid Lab TIF";
         $this->send_notif($prodi->keterangan,'Telah Di validasi');   
            }
    } elseif ($prodi->keterangan=='12') {
     $cek_val=$this->db->get_where('tbl_reg_before',array('v_lab_ppm' =>"1",'nim'=>$nim, 'semester'=>$semester ));
        if ($cek_val->num_rows()>0) {
         $this->db->query("UPDATE tbl_reg_before SET v_lab_ppm = '0' WHERE nim='$nim' AND semester='$semester'");
        $sa['pesan']="ini Unvalid lab PPM";
           }else{
         $this->db->query("UPDATE tbl_reg_before SET v_lab_ppm = '1' WHERE nim='$nim' AND semester='$semester'");
         $sa['pesan']="ini valid Lab PPM";   
            }
    }elseif ($prodi->keterangan=='11') {
      $cek_val=$this->db->get_where('tbl_reg_before',array('v_lab_tps' =>"1",'nim'=>$nim, 'semester'=>$semester ));
        if ($cek_val->num_rows()>0) {
       $this->db->query("UPDATE tbl_reg_before SET v_lab_tps = '0' WHERE nim='$nim' AND semester='$semester'");
        $sa['pesan']="ini Unvalid lab TPS";
           }else{
         $this->db->query("UPDATE tbl_reg_before SET v_lab_tps = '1' WHERE nim='$nim' AND semester='$semester'");
         $sa['pesan']="ini valid Lab TPS";   
            }
    }
   
j($sa);
      exit();
  }

  function send_notif($prodi,$isi){
    $tgl=date('Y-m-d');
   $id_users=$this->session->userdata('id_users');
   $query = $this->db->get_where('tbl_dosen', array('email' => $id_users))->row();

 $data = 
        array(
                'pengirim' => $query->nama_dsn,
                'penerima' => '4',
                'isi_notif' => $isi,
                'prodi' => $prodi,
                'tgl_notif' => $tgl
        );
       


$this->db->insert('app_notif', $data);
       
   
}
}