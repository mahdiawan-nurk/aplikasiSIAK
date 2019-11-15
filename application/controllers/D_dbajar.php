<?php 
/**
* 
*/
class D_dbajar extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
     $this->load->model('M_jadwal');
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
  

  function index()
  {
    $this->cek_aktif();
   //  $prodi=$this->session->userdata('prodi');
    $sa['akademik1'] = $this->db->get_where('app_thn_akademik',array('status' =>"1"  ))->row();
     $sa['akademik'] = obj_to_array($this->db->get('app_thn_akademik')->result(), "id_thnakad,thun_akademik");
    $sa['kurikulum'] = obj_to_array($this->db->get('app_kurikulum')->result(), "id_kur,thn_kur");
  	$sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");

    $cek_portal=$this->db->get_where('app_portal', array('id_portal'=>"2"))->row();
    $now=date('Y-m-d H:i:s');
  	if ($cek_portal->status_portal=="1") {
      $sa['title']="Set Dosen Ajar";
      $sa['p']="jadwal_mk/new_jadwal";
      $this->cek_akses($sa);
    }else{
      $sa['title']="Set Dosen Ajar";
      $sa['p']="jadwal_mk/page_close";
      $this->cek_akses($sa);
 
    }
 // $sa['p']="jadwal_mk/new_jadwal";
 //      $this->cek_akses($sa);
      
  }

 
 // function get_data(){
 //    $id=$this->input->post('id');
 //    $hsl=$this->db->query("SELECT * FROM makul_matakuliah WHERE kode_makul='$id'");
 //    if($hsl->num_rows()>0){
 //      foreach ($hsl->result() as $data) {
 //        $hasil=array(
 //          'kode_makul' => $data->kode_makul,
 //          'nama_makul' => $data->nama_makul,
 //          );
 //      }
 //    }
    
 //    echo json_encode($hasil);
 //  }
  // function get_data_ba(){
  //   $id=$this->input->post('id');
  //   $hsl=$this->db->query("SELECT a.*,b.nama_makul FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul where a.kode_makul='$id'");
  //   if($hsl->num_rows()>0){
  //     foreach ($hsl->result() as $data) {
  //       $hasil=array(
  //         'kode_makul' => $data->kode_makul,
  //         'nama_makul' => $data->nama_makul,
  //         'id_dosen' => $data->id_dosen,
  //         );
  //     }
  //   }
    
  //   echo json_encode($hasil);
  // }
  
//   public function save_dbajar(){
//     $prodi=$this->session->userdata('prodi');
//     $kode_mk=$this->input->post('kode_mk');
//     $id_dosen=$this->input->post('id_dsn');
//      $id_rombel=$this->input->post('id_rm');
//      $akd=$this->db->get_where('app_thn_akademik', array('status'=>"1" ))->row();
//      $cek=$this->db->get_where('app_dosen_ajar', array('kode_makul' =>$kode_mk ));
//       $data = array(
//         'kode_makul'=>$kode_mk,
//         'id_dosen'=>$id_dosen,
//         'rombel_id'=>$id_rombel,
//         'thn_id'=>$akd->id_thnakad,
//         'prodi_id'=>$prodi
// );
//      if ($cek->num_rows()>0) {
//      $sa['status'] = "error";
//       $sa['pesan'] = "Matakuliah Telah di Ampuh Oleh Dosen Lain";
     
//      }else{
//        $this->db->insert('app_dosen_ajar',$data);
//       $sa['status'] = "berhasil";
//       $sa['pesan'] = "Data Dosen Pengajar Berhasil ditambahkan".$kode_mk.'-'.$id_dosen.'-'.$id_rombel;
//      }
   
       

     
     
      
     
     
//       j($sa);
//       exit();
//   }
  function get_semester(){
  $akd = $this->db->get_where('app_thn_akademik',array('status' =>"1" ))->row();
   $sm = $this->db->get_where('tbl_semester',array('ket' =>$akd->ta_tipe  ))->result();
   $select='';
  $select=$select.'<option value="">No select</option>';
    foreach ($sm as $data) {
      $select=$select.'<option value="'.$data->id.'">'.$data->nama.'</option>';
    }
        j($select);
        exit();

 }
 // function get_matkul(){
 //  $prodi=$this->session->userdata('prodi');
 //  $kurikulum=$this->input->post('kurikulum');
 //   $semester=$this->input->post('semester');
 //   if($semester!=''){
 //   $where= "WHERE semester_id='$semester' AND prodi_id='$prodi' AND kur_id='$kurikulum'";
 //   }else{
 //     $where="WHERE semester_id='1' AND prodi_id='$prodi' AND kur_id='$kurikulum'";
 //   }
 //   $mk = $this->db->query("SELECT * FROM makul_matakuliah ".$where." ");
 //   $select='';
 //   if ($mk->num_rows()>0) {
 //    foreach ($mk->result() as $data) {
 //      $select=$select.'<div class="checkbox-custom checkbox-success">
 //                                <input type="checkbox" data="'.$data->kode_makul.'" id="checkboxExample1">
 //                                <label for="radioExample2">'.$data->kode_makul.'-'.$data->nama_makul.'</label>
 //                              </div>';
 //    }
 //   }else{
 //     $select=$select.'<div class="alert alert-warning">
 //                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 //                   <i class="fa fa-exclamation-triangle"></i>Tidak Ada Matakuliah Yang terkait Atau Matakuliah Belum Di Inputkan...
 //                  </div>';
 //   }
    
 //        j($select);
 //        exit();

 // }
 //  function get_rombel(){
 //  $prodi=$this->session->userdata('prodi');
 //   $semester=$this->input->post('semester');
 //   if ($semester!='') {
 //     $where= "WHERE a.semester_id='$semester' AND c.prodi_id='$prodi'";
 //   }else{
 //    $where="";
 //   }
 //   $rombel = $this->db->query("SELECT a.nim,c.nama_rombel,c.id_rombel FROM tbl_mahasiswa a INNER JOIN rombel_detail_mhs b ON a.nim=b.nim INNER JOIN rombel_jenis c ON b.rombel_id=c.id_rombel ".$where."");
 //   $select='';
 //    if ($rombel->num_rows()>0) {
 //      $data=$rombel->row();
 //       $select=$select.'<div class="checkbox-custom checkbox-default">
 //                                <input type="checkbox" data="'.$data->id_rombel.'" id="checkboxExample2" class="rombel">
 //                                <label for="checkboxExample1">'.$data->nama_rombel.'</label>
 //                              </div>';
 //    }else{
 //      $select=$select.'<div class="alert alert-warning">
 //                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 //                   <i class="fa fa-exclamation-triangle"></i>Tidak Ada Rombel Yang terkait
 //                  </div>';
 //    }
     
   
 //        j($select);
 //        exit();
   

 // }

// function delete_data(){
//   $id=$this->input->post('id');
// $this->db->delete('app_dosen_ajar',array('id_transaksi' =>$id ));
//   $sa['pesan']="Delte data Mengajar Berhasil";
//   j($sa);
//         exit();
// }

public function datatable()
 {
  $prodi=$this->session->userdata('prodi');
  $semester=$this->input->get('semester');
  $kurikulum=$this->input->get('kurikulum_c');
  $akademik=$this->input->get('akademik');
  $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if ($akademik!='') {
        $where ="WHERE a.prodi_id='$prodi' AND c.id_thnakad='$akademik'";
        if ($kurikulum!='') {
          $where ="WHERE a.prodi_id='$prodi' AND c.id_thnakad='$akademik' AND b.kur_id='$kurikulum'";
          if ($semester!='') {
            $where ="WHERE a.prodi_id='$prodi' AND c.id_thnakad='$akademik' AND b.kur_id='$kurikulum' AND b.semester_id='$semester'";
          }
        }
      }else if ($kurikulum!='') {
        $where ="WHERE a.prodi_id='$prodi' AND b.kur_id='$kurikulum'";
      }else if ($semester!='') {
         $where ="WHERE a.prodi_id='$prodi' AND b.semester_id='$semester'";
      }else{
        $where ="WHERE a.prodi_id='$prodi'";
      }
      $query=$this->db->query("SELECT *,(SELECT nama_dsn FROM tbl_dosen WHERE nrp=a.id_dosen) AS dosen_prodi,(SELECT nama_dlb FROM tbl_dosen_lb WHERE id_dosen_lb=a.id_dosen) AS dosen_lb FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.makul_id INNER JOIN app_thn_akademik c ON a.thn_id=c.id_thnakad INNER JOIN tbl_semester d ON b.semester_id=d.id INNER JOIN rombel_jenis e ON a.rombel_id=e.id_rombel ".$where."");
     
      
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {

           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->kode_makul;
              $data_ok[2] = $r->nama_makul;
              $data_ok[3] = $r->nama;
               $data_ok[4] = $r->sks;
              if ($r->dosen_prodi!='') {
                 $data_ok[5] = $r->dosen_prodi;
              }elseif ($r->dosen_lb!='') {
                 $data_ok[5] =$r->dosen_lb;
              }else{
                 $data_ok[5] ='tidak ada';
              }       
               $data_ok[6] =$r->nama_rombel; 
                $data_ok[7]='<a onclick="edit(\''.$r->id_transaksi.'\')" class="btn btn-default btn-xs">Edit</a>' ;
               
                $data_ok[8]='<input type="checkbox"  name="pilih[]" value="'.$r->id_transaksi.'">' ;
                
              
                
             
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
 
 // public function cetak()
 // {
 //    $sa['title']="Set Dosen Ajar";
 //      $sa['p']="jadwal_mk/cetak";
 //      $this->cek_akses($sa);
 // }

 public function new_mk($value='')
 {
     $prodi=$this->session->userdata('prodi');
     $semester=$this->input->get('semester');
    $kurikulum=$this->input->get('kurikulum');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $this->db->select('*');
      $this->db->from('makul_matakuliah');
      $this->db->where('prodi_id',$prodi);
      $this->db->where('semester_id',$semester);
      $this->db->where('kur_id',$kurikulum);
      $query = $this->db->get();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_makul;
              $data_ok[2] = $r->nama_makul;
              $data_ok[3] = $r->sks;
              if ($r->jenis_makul=="T") {
                 $data_ok[4] = '<p>Teori</>';
              }else{
                 $data_ok[4] = '<p>Praktik</p>';
              }
             
              $data_ok[5] = $this->group_dosen();
              $data_ok[6] = $this->get_data_rombel($r->semester_id);
              $data_ok[7] = '<input type="checkbox" name="aktif[]" value="'.$r->makul_id.'">';

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

public function upd_mk($value='')
 {
     $prodi=$this->session->userdata('prodi');
     $id=$this->input->get('id');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $this->db->select('*');
      $this->db->from('app_dosen_ajar');
      $this->db->join('makul_matakuliah','app_dosen_ajar.kode_makul=makul_matakuliah.makul_id');
      $this->db->where('app_dosen_ajar.id_transaksi',$id);
     
      $query = $this->db->get();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_makul;
              $data_ok[2] = $r->nama_makul.'-'.$id;
              $data_ok[3] = $r->sks;
              if ($r->jenis_makul=="T") {
                 $data_ok[4] = '<p>Teori</>';
              }else{
                 $data_ok[4] = '<p>Praktik</p>';
              }
             
              $data_ok[5] = $this->group_dosen();
              $data_ok[6] = $this->get_data_rombel($r->semester_id);
              $data_ok[7] = '<input type="checkbox" name="makul[]" value="'.$r->makul_id.'" checked>
                              <input type="checkbox" name="aktif[]" value="'.$r->id_transaksi.'" checked>';

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


 public function save_record()
 {
  $prodi=$this->session->userdata('prodi');  
  $akd = $this->db->get_where('app_thn_akademik',array('status' =>"1" ))->row();
   $makul=$this->input->post('aktif');
   $dosen=$this->input->post('dosen');
   $rombel=$this->input->post('rombel');
   $jml=count($makul);
$data = array();
  
   for ($i=0; $i <$jml ; $i++) { 
    // $data= $data.$makul[$i].'-'.$dosen[$i].'-'.$rombel[$i].'<br>';
     $data[]=array('kode_makul' =>$makul[$i] ,'id_dosen' =>$dosen[$i] ,'rombel_id' =>$rombel[$i] ,'thn_id' =>$akd->id_thnakad ,'prodi_id'=>$prodi );
      
   }
  $this->db->insert_batch('app_dosen_ajar',$data);
  
   // $sa=$data;
   // j($sa);
   // exit();
  echo "data Berhasil Di Simpan";
   
 }

 public function delete_record($value='')
 {
  $id=$this->input->post('pilih');
  $jml=count($id);
  for ($i=0; $i < $jml; $i++) { 
    $this->db->where('id_transaksi',$id[$i]);
    $this->db->delete('app_dosen_ajar');
  }
   echo "Data Berhasil Di Hapus";
 }

  public function update_record($value='')
 {
  $id=$this->input->post('aktif');
  $makul=$this->input->post('makul');
  $dosen=$this->input->post('dosen');
  $jml=count($id);
  for ($i=0; $i < $jml; $i++) { 
   $this->db->where('kode_makul',$makul[$i]);
   $this->db->update('app_dosen_ajar', array('id_dosen' =>$dosen[$i]  ));
  }
  
  echo "Data Berhasil DI Update";
 }

 public function get_dosen()
 {
   $get_dp=$this->db->get('tbl_dosen');
   $get_lb=$this->db->get('tbl_dosen_lb');
   $jml1=$get_dp->num_rows();
   $jml2=$get_lb->num_rows();
   $jml=$jml1 + $jml2;
   $data = array();

   foreach ($get_dp->result() as $d ) {
     $dp = array();
     $dp[0]=$d->nrp;
     $dp[1]=$d->nama_dsn;
     $data[]=$dp;
   }
    foreach ($get_lb->result() as $lb ) {
     $dl = array();
     $dl[0]=$lb->id_dosen_lb;
     $dl[1]=$lb->nama_dlb;
     $data[]=$dl;
   }
   $html='';
   $html='<option value="">Pilih Dosen</option>';
for ($i=0; $i <$jml ; $i++) { 
  $html=$html.'<option value="'.$data[$i][0].'">'.$data[$i][1].'</option>';
}

echo $html;
 }

 public function group_dosen($value='')
 {
  $prodi=$this->db->get('tbl_prodi')->result();

  $html='';
$html=$html.'<select class="form-control" name="dosen[]">';
$html=$html.'<option value="">Pilih Dosen</option>';
  foreach ($prodi as $p) {
  $html=$html.'<optgroup label="'.$p->nama_prodi.'">';
   $get_dsn=$this->db->get_where('tbl_dosen', array('prodi_id' =>$p->kode_prodi  ))->result();
   foreach ($get_dsn as $k) {
   $html=$html.'<option value="'.$k->nrp.'">'.$k->nama_dsn.'</option>';
   }
    $html=$html.'</optgroup>';
  }
 

 $get_lb=$this->db->get('tbl_dosen_lb')->result();
 $html=$html.'<optgroup label="Dosen LB">';
 foreach ($get_lb as $lb) {
   $html=$html.'<option value="'.$lb->id_dosen_lb.'">'.$lb->nama_dlb.'</option>';
 }
  $html=$html.'</optgroup>';
   $html=$html.'</select>';
  return $html;

 }

 public function get_data_rombel($sem)
 {
   $prodi=$this->session->userdata('prodi');

   $get_data=$this->db->query("SELECT * FROM rombel_detail_mhs a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN rombel_jenis c ON a.rombel_id=c.id_rombel WHERE b.semester_id='$sem' AND c.prodi_id='$prodi' GROUP BY c.nama_rombel ")->row();

   $html='<input type="checkbox" name=rombel[] value="'.$get_data->id_rombel.'" checked><label>&nbsp;'.$get_data->nama_rombel.'</label>';
   // j($html);
   // exit();
   return $html;
 }

}