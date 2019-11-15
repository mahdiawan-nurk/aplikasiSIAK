<?php
/**
* 
*/
class V_perpus extends CI_Controller
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
  	 $prodi=$this->session->userdata('prodi');
    $sa['prodi'] = obj_to_array($this->db->get('tbl_prodi')->result(), "kode_prodi,nama_prodi");
    $sa['semester']=$this->db->get('tbl_semester')->result();
      $sa['title']="Dashboard | SIAKAD";
    $sa['p']="registrasi_ulang/validasi/V_perpus";
    $this->cek_akses($sa);
    
  }
   public function data_perpus()
  {
    $id_users=$this->session->userdata('id_users');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $prodi=$this->input->get('prodi');
      $semester=$this->input->get('sems');

      $query = $this->M_registrasi->data_tem_perpus($prodi,$semester);
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
               $data_ok[4] = 'semester '.$sem_peng;
                $data_ok[5] = $r->tgl_pengajuan;
                if ($r->v_perpus=="0") {
                 $data_ok[6] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" />
                                                        <span class="lbl"></span>
                                                    </label>';
                }else{
                  $data_ok[6] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" checked/>
                                                        <span class="lbl"></span>
                                                    </label>';
                }

                 if ($r->v_perpus=="0") {
                 $data_ok[7] = '<a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-primary item_valid" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="fa fa-check"></i> valid</a>';
                }else{
                  $data_ok[7] = ' <a href="# " data-toggle="tooltip" title="Edit" class="mb-xs mt-xs mr-xs btn-xs btn btn-danger item_unvalid" data="'.$r->nim.'" data-s="'.$r->semester.'"><i class="ace-icon fa fa-remove bigger-120 red"></i> Unvalid</a>';
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
    public function simpan_validasi()
  {
     
    $nim=$this->input->post('nim');
     $semester=$this->input->post('sem');
    $cek_val=$this->db->get_where('tbl_reg_before',array('v_perpus' =>"1",'nim'=>$nim, 'semester'=>$semester ));
if ($cek_val->num_rows()>0) {
 $this->db->query("UPDATE tbl_reg_before SET v_perpus = '0' WHERE nim='$nim' AND semester='$semester'");
  $sa['pesan']="ini Unvalid Perpustakaan";
}else{
 
  $this->db->query("UPDATE tbl_reg_before SET v_perpus = '1' WHERE nim='$nim' AND semester='$semester'");
   $sa['pesan']="ini valid Perpustakaan";   
}
j($sa);
      exit();
  }

}