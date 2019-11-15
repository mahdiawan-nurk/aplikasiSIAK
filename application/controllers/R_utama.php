<?php
/**
* 
*/
class R_utama extends CI_Controller
{
	public function __construct(){
    parent::__construct();
    $this->load->model('M_registrasi');
    $this->load->model('M_setting');
    
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
  
 function contoh_ajax(){
   $id_users=$this->session->userdata('id_users');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_registrasi->data_pengajuan();
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->prodi;
              $data_ok[4] = '01-01-2019';
              $data_ok[5] = 'Selesai';
              $data_ok[6] = '01-01-2019';
              $data_ok[7] = 'Selesai';
              $data_ok[8] = '01-01-2019';
              $data_ok[9] = 'Selesai';
              $data_ok[10] = '01-01-2019';
              $data_ok[11] = 'Selesai';
              $data_ok[12] = '01-01-2019';
              $data_ok[13] = 'Selesai';
              $data_ok[14] = '01-01-2019';
              $data_ok[15] = 'Selesai';
              $data_ok[16] = '01-01-2019';
              $data_ok[17] = 'Selesai';
              $data_ok[18] = '01-01-2019';
              $data_ok[19] = 'Selesai';
              
             
              
               
            
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