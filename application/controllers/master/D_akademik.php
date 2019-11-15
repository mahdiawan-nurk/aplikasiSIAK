<?php
/**
* 
*/
class D_akademik extends CI_Controller
{
	
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
  public function index($value='')
  {
  
    $this->cek_aktif();
   
  
 		 $sa['title']="Data Rombel";
      $sa['p']="data_master/data_akademik";

       $this->cek_akses($sa);

  }

  function data_kurikulum(){
	  $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_kurikulum');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->thn_kur;
             
               $data_ok[2] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_kur.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_kur.'" data-uri="kurikulum"><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

function get_data_kurikulum(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM app_kurikulum WHERE id_kur='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_kur' => $data->id_kur,
          'thn_kur' => $data->thn_kur,
         
          );
      }
    }
    
    echo json_encode($hasil);
  }
public function save_data_kurikulum()
{
  $id=$this->input->post('id_kur');
  $kurikulum=$this->input->post('kurikulum');
  $data = array('thn_kur' =>$kurikulum  );
  if ($id=="0") {
    $this->db->insert('app_kurikulum',$data);
    $pesan='Simpan Data kurikulum Berhasil';
  }else{
    $this->db->where('id_kur',$id);
    $this->db->update('app_kurikulum',$data);
    $pesan='update Data Berhasil';
  }

  $sa['pesan']=$pesan;
  j($sa);
exit();     
}




  function thn_akademik(){
  	 $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_thn_akademik');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->thun_akademik;
              $data_ok[2] = $r->ta_tipe;
              $data_ok[3] = $r->keterangan;
              if ($r->status=="0") {
              	$data_ok[4] = '<span class="label label-danger">
                        <i class="fa fa-times bigger-120"></i>
                        Tidak Aktif &nbsp;
                      </span>';
              }else{
              	$data_ok[4] = '<span class="label label-success">
                        <i class="fa fa-check bigger-120"></i>
                        Aktif &nbsp;
                      </span>';
              }
               if ($r->status=="0") {
               $data_ok[5] = '<div class="btn-group btn-group-justified" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="aktif" class="btn btn-warning btn-xs item_aktifkan" data="'.$r->id_angkatan.'"><i class="fa fa-eye"></i> Aktifkan</a>
                               </div>
                               <div class="btn-group btn-group-justified" >
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_thnakad.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_thnakad.'" data-uri="thn_akd" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
                               </div>'
                               ;
             }else{
               $data_ok[5] = '<div class="btn-group btn-group-justified" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="aktif" class="btn btn-warning btn-xs item_aktifkan" data="'.$r->id_angkatan.'"><i class="fa fa-eye"></i> Non-aktifkan</a>
                               </div>
                               <div class="btn-group btn-group-justified" >
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_thnakad.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_thnakad.'" data-uri="thn_akd" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

function get_data_thn_akd(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM app_thn_akademik WHERE id_thnakad='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_thnakd' => $data->id_thnakad,
          'tahun' => substr($data->thun_akademik, 0,4),
          'thun_akademik' => $data->thun_akademik,
          'ta_tipe' => $data->ta_tipe,
          'keterangan' => $data->keterangan,
         
          );
      }
    }
    
    echo json_encode($hasil);
  }

public function save_data_ta()
{
  $id=$this->input->post('id');
  $kode_ta=$this->input->post('kode_ta');
  $tipe_ta=$this->input->post('tipe_ta');
  $keterangan=$this->input->post('thn_akd');
  $data = array('thun_akademik'=>$kode_ta,'ta_tipe'=>$tipe_ta,'keterangan'=>$keterangan );
  if ($id=="0") {
    $this->db->insert('app_thn_akademik',$data);
    $pesan='Simpan Data Tahun Akademik Berhasil';
  }else{
    $this->db->where('id_thnakad',$id);
    $this->db->update('app_thn_akademik',$data);
    $pesan='update Data Berhasil';
  }

  $sa['pesan']=$pesan;
  j($sa);
exit();     
}




  function thn_angkatan(){
  	 $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_angkatan');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->thn_angkatan;
             
               $data_ok[2] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_angkatan.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_angkatan.'" data-uri="thn_ankt" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

function get_data_tha(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM app_angkatan WHERE id_angkatan='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_tha' => $data->id_angkatan,
          'tahun' => substr($data->thn_angkatan, 0,4),
          'thn_ankt' => $data->thn_angkatan,
         
         
          );
      }
    }
    
    echo json_encode($hasil);
  }
public function save_data_tha()
{
  $id=$this->input->post('id');
  $angkatan=$this->input->post('thn_angkatan');
  
  $data = array('thn_angkatan'=>$angkatan);
  if ($id=="0") {
    $this->db->insert('app_angkatan',$data);
    $pesan='Simpan Data Tahun angkatan Berhasil';
  }else{
    $this->db->where('id_angkatan',$id);
    $this->db->update('app_angkatan',$data);
    $pesan='update Data Berhasil';
  }

  $sa['pesan']=$pesan;
  j($sa);
exit();     
}


  function grade_nilai(){
  	 $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_nilai_grade');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->dari;
              $data_ok[2] = $r->sampai;
              	$data_ok[3] = $r->grade;
              $data_ok[4] = $r->keterangan;
               $data_ok[5] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->nilai_id.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->nilai_id.'" data-uri="grade"><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

function get_data_grade(){
     $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM app_nilai_grade WHERE nilai_id='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_grade' => $data->nilai_id,
          'dari' => $data->dari,
          'sampai' => $data->sampai,
          'grade' => $data->grade,
          'keterangan' => $data->keterangan,
         
         
          );
      }
    }
    
    echo json_encode($hasil);
  }

public function save_data_grade()
{
  $id=$this->input->post('id');
  $grade=$this->input->post('grade');
  $dari=$this->input->post('dari');
  $sampai=$this->input->post('sampai');
  $keterangan=$this->input->post('keterangan');
  
  $data = array('dari'=>$dari,'sampai'=>$sampai,'grade'=>$grade,'keterangan'=>$keterangan);
  if ($id=="0") {
    $this->db->insert('app_nilai_grade',$data);
    $pesan='Simpan Data Grade Nilai Berhasil';
  }else{
    $this->db->where('nilai_id',$id);
    $this->db->update('app_nilai_grade',$data);
    $pesan='update Data Berhasil';
  }

  $sa['pesan']=$pesan;
  j($sa);
exit();     
}

  public function delete_data()
{
  $id=$this->input->post('id');
  $uri=$this->input->post('uri');
  if ($uri=="kurikulum") {
    $this->db->delete('app_kurikulum',array('id_kur' =>$id ));
    $pesan="delete Data Kurikulum Berhasil";
    $tabel="1";
  }elseif ($uri=="thn_akd") {
     $this->db->delete('app_thn_akademik',array('id_thnakad' =>$id ));
    $pesan="delete Data Tahun Akademik Berhasil";
    $tabel="2";
  }elseif ($uri=="thn_ankt") {
      $this->db->delete('app_angkatan',array('id_angkatan' =>$id ));
    $pesan="delete Data Tahun angkatan Berhasil";
    $tabel="3";
  }else{
    $this->db->delete('app_nilai_grade',array('nilai_id' =>$id ));
    $pesan="delete Data Grade nilai Berhasil";
    $tabel="4"; 
  }

   $sa['pesan']=$pesan;
   $sa['refresh']=$tabel;
  j($sa);
exit(); 
}

}