<?php
/**
* 
*/
class Mk_mengajar extends CI_Controller
{
	
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
  	$sa['title']="Data Rombel";
      $sa['p']="sk_mengajar/view_mk";
       $this->cek_akses($sa);
  }


  function data_ajar(){
  	$id_users=$this->session->userdata('id_users');
  	$dsn=$this->db->get_where('tbl_dosen',array('email' =>$id_users ))->row();
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get_where('data_mengajar', array('id_dosen' =>$dsn->nrp,'status'=>"1" ));
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_makul;
              $data_ok[2] = $r->sks;
              if ($r->jenis_makul=="P") {
              	 $data_ok[3] = "Praktek";
              }else{
              	 $data_ok[3] = "Teori";
              }
             $data_ok[4] = $r->nama_prodi;
             $data_ok[5] = $r->nama;
             $data_ok[6] = $r->nama_rombel;
              
             $data_ok[7]='<div class="actions-hover actions-fade">
            						<a href="#" data-toggle="tooltip" title="Lihat Kelas" id="lihat_kelas" data="'.$r->rombel_id.'" class="mb-xs mt-xs mr-xs modal-sizes btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
									
									<a class="mb-xs mt-xs mr-xs modal-sizes btn btn-default btn-xs" href="#" data-mk="'.$r->kode_makul.'" data-rm="'.$r->id_rombel.'" data-toggle="tooltip" title="Input Nilai" id="input"><i class="fa fa-pencil"></i></a>						
														</div>';
              
               
            
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

function data_mhs(){
  $id=$this->input->get('rombel');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT * FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id INNER JOIN rombel_jenis f on a.rombel_id=f.id_rombel where a.rombel_id='$id' ");
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              
               
            
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

  function input_nilai(){
  $id=$this->input->get('kode_mk');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT *,(SELECT COUNT(nim) FROM app_nilai_mhs WHERE nim=c.nim AND kode_makul=a.kode_makul)AS ada, (SELECT nilai_angka FROM app_nilai_mhs WHERE nim=c.nim AND kode_makul=a.kode_makul)AS angka, (SELECT nilai_huruf FROM app_nilai_mhs WHERE nim=c.nim AND kode_makul=a.kode_makul)AS huruf FROM app_dosen_ajar a INNER JOIN rombel_detail_mhs b ON a.rombel_id=b.rombel_id INNER JOIN tbl_mahasiswa c ON b.nim=c.nim WHERE a.kode_makul='TI2061'  ");
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              if ($r->ada=="1") {
              	$data_ok[3] = $r->angka;
              	
              }else{
              	 $data_ok[3] = '<div class="actions-hover actions-fade">
									<a class="mb-xs mt-xs mr-xs modal-sizes btn btn-default btn-xs" href="#" data="'.$r->nim.'" data-mk="'.$r->kode_makul.'" data-toggle="tooltip" title="Input Nilai" id="add"><i class="fa fa-pencil"></i></a>						
														</div>';
              }
              if ($r->huruf=='') {
              	 $data_ok[4] = '';
              }else {
              	 $data_ok[4] = $r->huruf;
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

function data_rm(){
	 $id=$this->input->post('id');
	$sql=$this->db->query("SELECT * FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id INNER JOIN rombel_jenis f on a.rombel_id=f.id_rombel where a.rombel_id='$id'  ")->row();
	$sa['rombel']=$sql->nama_rombel;
	$sa['prodi']=$sql->nama_prodi;
	$sa['semester']=$sql->nama;

	j($sa);
	exit();
}

function data_mk(){
	 $id=$this->input->post('mk');
	$sql=$this->db->query("SELECT * FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester d ON b.semester_id=d.id where b.kode_makul='$id'")->row();
	$sa['kode_mk']=$sql->kode_makul;
	$sa['nama_mk']=$sql->nama_makul;
	if ($sql->jenis_makul=="T") {
		$jenis="Teori";
	}else {
		$jenis="Praktek";
	}
	$sa['jenis_mk']=$jenis;
	$sa['sks']=$sql->sks;
	$sa['prodi']=$sql->nama_prodi;
	$sa['semester']=$sql->nama;

	j($sa);
	exit();
}

function save_nilai(){
	 $nilai=$this->input->post('nilai');
	 $nim=$this->input->post('nim');
	 $mk=$this->input->post('mk');
	
		$akd=$this->db->get_where('app_thn_akademik', array('status' => "1" ))->row();
	   $grade=$this->db->get('app_nilai_grade')->result();
	   foreach ($grade as $key) {
	   	if ($nilai >= $key->dari AND $nilai <= $key->sampai) {
	   		$nilai2=$key->grade;
	   		
	   	}
	   }
$data = array('nim' =>$nim ,'kode_makul'=>$mk,'nilai_angka'=>$nilai,'nilai_huruf'=>$nilai2,'thn_akademik'=>$akd->thun_akademik );
$this->db->insert('app_nilai_mhs',$data);
	$sa['pesan']="Nilai Berhasil DI input";

	j($sa);
	exit();
}


}

