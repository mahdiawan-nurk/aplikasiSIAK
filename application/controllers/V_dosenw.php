<?php
/**
* 
*/
class V_dosenw extends CI_Controller
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
  	 $sa['semester']=$this->db->get('tbl_semester')->result();
      $sa['title']="Dashboard | SIAKAD";
    $sa['p']="registrasi_ulang/validasi/v_dosen_wali";
    $this->cek_akses($sa);
    
  }
  public function data_dosenw()
  {
    $id_users=$this->session->userdata('id_users');
    $rombel=$this->db->query("SELECT a.nrp,a.nama_dsn,b.id_rombel,b.nama_rombel FROM tbl_dosen a INNER JOIN rombel_jenis b ON a.nrp=b.dosen_id WHERE a.email='".$id_users."'")->row();
     $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_dosen_wali($rombel->id_rombel,$semester);
      $query2=$query->row();
      $sem_peng=$query2->semester + 1;
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              
               $data_ok[3] = 'Semester'.$sem_peng;
                $data_ok[4] = $r->tgl_pengajuan;
                 $data_ok[5] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kompensasi($r->nim). '/>
                                                        <span class="lbl">Kompensasi</span>
                                                    </label>
                                  <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_khs($r->nim). '/>
                                                        <span class="lbl">KHS</span>
                                                    </label>';

                if ($r->v_kompensasi == 0) {
                   $data_ok[6] =  '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-primary item_valid_komp" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="fa fa-check"></i> valid</a>'; 
                 }else{
                  $data_ok[6] =  '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-danger item_unvalid_komp" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="ace-icon fa fa-remove bigger-120 red"></i> Unvalid</a>';
                 }
                  if ($r->v_khs == 0) {
                   $data_ok[7] =  '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-primary item_valid_khs" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="ace-icon fa fa-check bigger-120 blue"></i> valid</a>'; 
                 }else{
                  $data_ok[7] =  '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-danger item_unvalid_khs" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="ace-icon fa fa-remove bigger-120 red"></i> Unvalid</a>';
                 }
                                                  
                                       

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
    public function simpan_validasi_komp()
  {
     
    $nim=$this->input->post('nim');
    $semester=$this->input->post('sem');
    $cek_val=$this->db->get_where('tbl_reg_before',array('v_kompensasi' =>"1",'nim'=>$nim,'semester'=>$semester ));
if ($cek_val->num_rows()>0) {
  $this->db->query("UPDATE tbl_reg_before SET v_kompensasi = '0' WHERE nim='$nim' AND semester='$semester'");
  $sa['pesan']="ini Unvalid Kompensasi";
}else{
   $this->db->query("UPDATE tbl_reg_before SET v_kompensasi = '1' WHERE nim='$nim' AND semester='$semester'");
   $sa['pesan']="ini valid Kompensasi";   
}
j($sa);
      exit();
  }

  public function simpan_validasi_khs()
  {
     
    $semester=$this->input->post('sem');
    $nim=$this->input->post('nim');
    $cek_val=$this->db->get_where('tbl_reg_before',array('v_khs' =>"1",'nim'=>$nim,'semester'=>$semester ));
if ($cek_val->num_rows()>0) {
$this->db->query("UPDATE tbl_reg_before SET v_khs = '0' WHERE nim='$nim' AND semester='$semester'");
  $sa['pesan']="ini Unvalid KHS";
}else{
  $this->db->query("UPDATE tbl_reg_before SET v_khs = '1' WHERE nim='$nim' AND semester='$semester'");
   $sa['pesan']="ini valid KHS";   
}
j($sa);
      exit();
  }
}