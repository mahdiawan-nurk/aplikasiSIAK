<?php
/**
* 
*/
class V_kaprodi extends CI_Controller
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
     $sa['semester']=$this->db->get('tbl_semester')->result();
  	$cek_prodi=$this->db->query("SELECT a.*,c.nama_prodi FROM tr_akses a INNER JOIN tbl_dosen b ON a.email=b.email INNER JOIN tbl_prodi c ON b.nrp=c.ketua WHERE a.keterangan=$prodi");
  	if ($cek_prodi->num_rows()>0) {
  		$sa['title']="Dashboard | SIAKAD";
		$sa['p']="registrasi_ulang/validasi/V_kaprodi";
		$this->cek_akses($sa);
  	}
  }

  public function data_kaprodi()
  {
    $prodi=$this->session->userdata('prodi');
    $id_users=$this->session->userdata('id_users');
    $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data($prodi,$semester);
       $query2=$query->row();
      $sem_peng=$query2->semester + 1;
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama;
               $data_ok[3] = 'Semester '.$sem_peng;
                $data_ok[4] = $r->tgl_pengajuan;
                 $data_ok[5] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi1($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';
               $data_ok[6] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi2($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';
                $data_ok[7] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi3($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';
                $data_ok[8] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi4($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';
        $data_ok[9] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi5($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';                                                    
               $data_ok[10] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi6($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';
          $data_ok[11] = ' <label>
                                                        <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" '.cek_val_kaprodi7($id_users,$r->nim,$r->semester).'/>
                                                        <span class="lbl"></span>
                                                    </label>';                                                  
                if ($r->v_kaprodi == 0) {
                   $data_ok[12] =  cek_val_kaprodi8($r->nim,$r->thun_akademik,$r->semester); 
                 }else{
                  $data_ok[12] =  '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-white btn-danger btn-bold item_unvalid" data="'.$r->nim.'" data-v="'.$r->thun_akademik.'" data-s="'.$r->semester.'"><i class="ace-icon fa fa-remove bigger-120 red"></i> Unvalid</a>';
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

  public function simpan_validasi_akhir1($value='')
  {
    $nim=$this->input->post('nim');
    $cek_val=$this->db->get_where('tbl_reg_before',array('v_kaprodi' =>"1",'nim'=>$nim ));
        if ($cek_val->num_rows()>0) {
         $data = array('v_kaprodi' =>"0" , );
        $this->db->where('nim',$nim);
        $this->db->update('tbl_reg_before',$data);
        $sa['pesan']="ini Unvalid kaprodi";
           }else{
         $data = array('v_kaprodi' =>"1" , );
        $this->db->where('nim',$nim);
        $this->db->update('tbl_reg_before',$data);
         $sa['pesan']="ini valid kaprodi";   
            }
            j($sa);
      exit();
  }

  public function simpan_validasi_akhir()
  {
     $id_users=$this->session->userdata('id_users');
    $nim=$this->input->post('nim');
    $thun=$this->input->post('thun');
     $semester=$this->input->post('sem');
    $tgl=date('Y-m-d H:i:s');
   $cek_val=$this->db->get_where('tbl_reg_before',array('v_kaprodi' =>"1",'nim'=>$nim,'semester'=>$semester ));
    $status=$this->db->query("SELECT a.id_pengumuman,a.jenisp_id, a.tgl_mulai_daftar, a.tgl_selesaip, a.thn_akademik, (case when (now() <= a.tgl_selesaip AND now()>= a.tgl_mulai_daftar) then 0 when (now() > a.tgl_selesaip ) then 1 else 2 end) statuse FROM pengumuman a WHERE a.jenisp_id=1 AND a.status_pengumuman=1 AND a.thn_akademik='$thun'")->result();
    foreach ($status as $key ) {
     if ($key->stause == 0) {
     $stat="aktif";
    }elseif ($key->stause == 1) {
      $stat="Tidak Aktif";
    }
    }
    
    
    if ($cek_val->num_rows()>0) {
       $this->db->query("UPDATE tbl_reg_before SET v_kaprodi = '0' WHERE nim='$nim' AND semester='$semester'");
       $sa['pesan'] = $nim; 
  }else{
         $data_kirim = array(
        'nim' => $nim,
        'tgl_terdaftar' => $tgl,
        'thn_akademik'=>$thun,
        'semester_sebelum'=>$semester,
        'semester_aktif'=>$semester + 1,
        'status' => $stat
        );
       $this->db->query("UPDATE tbl_reg_before SET v_kaprodi = '1' WHERE nim='$nim' AND semester='$semester'");
      $this->db->insert('tbl_reg_selesai', $data_kirim);
         $sa['pesan']="ini valid kaprodi".$nim.'-'.$semester;   
            }
      
      j($sa);
      exit();
  }
}