<?php
/**
* 
*/
class Pengumuman extends CI_Controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
         $this->load->model('M_menu');
    // $this->load->model('Pengaturan');
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
  
//Menu
  function index(){
  $this->cek_aktif();
  $id_users=$this->session->userdata('id_users');
    $cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan")->result();
    foreach ($cek_login as $key) {}
      if ($key->id_jabatan=="12") {
        $sa['title']="Pengumuman";
        $sa['pengumuman']=obj_to_array($this->db->get('jenis_pengumuman')->result(), "id_jenisp,nama_jenis");

        $sa['p'] = 'pengumuman/view_kabak';
      }elseif ($key->id_jabatan=="11") {
         $sa['title']="pengumuman";
      $sa['pengumuman']=obj_to_array($this->db->get('jenis_pengumuman')->result(), "id_jenisp,nama_jenis");
          $sa['p'] = 'pengumuman/view_wadir1';
      }elseif ($key->id_jabatan=="9") {
         $sa['title']="Pengumuman";
         $sa['thn_ak']=obj_to_array($this->db->get('app_thn_akademik')->result(), "thun_akademik,thun_akademik");
        $sa['pengumuman']=obj_to_array($this->db->get('jenis_pengumuman')->result(), "id_jenisp,nama_jenis");
          $sa['p'] = 'pengumuman/utama';
      }
 
	
  $this->cek_akses($sa);
				
	
		
  }
 
function get_data_p(){
    $id=$this->input->get('id');
    $hsl=$this->db->get_where('pengumuman',array('id_pengumuman' =>$id ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_pengumuman' => $data->id_pengumuman,
          'id_jenis' => $data->jenisp_id,
          'thn_akademik' => $data->thn_akademik,
          'tgldist' => $data->tgl_distribusip,
          'tglmul' => $data->tgl_mulai_daftar,
          'tglsel' => $data->tgl_selesaip,
          'no_surat' => $data->no_srt,
          'isi'=>$data->isi,
          );
      }
    }
    
    echo json_encode($hasil);
  }
  function get_data(){
    $id=$this->input->get('id');
    $hsl=$this->db->get_where('jenis_pengumuman', array('id_jenisp' =>$id ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_jenisp' => $data->id_jenisp,
          'nama_jenis' => $data->nama_jenis,
          'keterangan' => $data->keterangan,
          );
      }
    }
    
    echo json_encode($hasil);
  }

  public function data_jenis()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('jenis_pengumuman');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_jenis;
               $data_ok[2] = $r->keterangan;
               $data_ok[3] = '<div class="btn-group" style="float:right;">
              
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_jenisp.'"><i class="fa fa-pencil"></i> Edit</a>
                              ';
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
  public function data_pengumuman()
  {
    $id=$this->input->get('jenis_id');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if ($id!='') {
        $where=" WHERE a.jenisp_id='$id'";
      }else{
         $where="";
      }
      $query = $this->db->query("SELECT * FROM pengumuman a INNER JOIN jenis_pengumuman b ON a.jenisp_id=b.id_jenisp  ".$where."");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_jenis;
              $data_ok[2] = date('d-m-Y',strtotime($r->tgl_distribusip));
              $data_ok[3] = date('d-m-Y',strtotime($r->tgl_mulai_daftar));
              $data_ok[4] = date('d-m-Y',strtotime($r->tgl_selesaip));
               
               $data_ok[5] = '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_lihat" data="'.$r->id_pengumuman.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a>
              ';
              if ($r->ka_akademik=="1") {
                $data_ok[6] = '<span class="label label-success">
                        <i class="fa fa-check bigger-120"></i>
                        Terima &nbsp;
                      </span>' ;
              }elseif ($r->ka_akademik=="0") {
                $data_ok[6] = '<span class="label label-danger">
                        <i class="fa fa-times bigger-120"></i>
                      Tolak &nbsp;
                      </span>';
              }else{
                $data_ok[6] = '<span class="label label-info">
                        <i class="fa fa-spinner fa-spin bigger-120"></i>
                        Proses &nbsp;
                      </span>';
              }

              if ($r->wadir1=="1") {
                 $data_ok[7] = '<span class="label label-success">
                        <i class="fa fa-check bigger-120"></i>
                        Terima &nbsp;
                      </span>';
              }elseif ($r->wadir1=="0") {
                 $data_ok[7] = '<span class="label label-danger">
                        <i class="fa fa-times bigger-120"></i>
                      Tolak &nbsp;
                      </span>';
              }else{
                 $data_ok[7] =  '<span class="label label-info">
                        <i class="fa fa-spinner fa-spin bigger-120"></i>
                        Proses &nbsp;
                      </span>';
              }
               
               

               if ($r->status_pengumuman=="1") {
                 $data_ok[8] = 'Aktif';
               }else{
                $data_ok[8] = 'Tidak Aktif';
               }
               
               $data_ok[9  ] = '
                              '.$this->aktifasi($r->status_pengumuman,$r->ka_akademik,$r->wadir1,$r->id_pengumuman,$r->id_jenisp).'
                               
                               <div class="btn-group btn-group-justified">
                               <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs  item_editp" data="'.$r->id_pengumuman.'"><i class="fa fa-pencil"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapusp" data="'.$r->id_pengumuman.'" ><i class="glyphicon glyphicon-trash" ></i>&nbsp;Hapus</a></div>';
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

   public function pengumuman_kabak()
  {
    $id=$this->input->get('id_jenis');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
    
      $query = $this->db->query("SELECT * FROM pengumuman a INNER JOIN jenis_pengumuman b ON a.jenisp_id=b.id_jenisp ");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->nama_jenis;
              $data_ok[2] = date('d-m-Y',strtotime($r->tgl_distribusip)).' - '.date('d-m-Y',strtotime($r->tgl_selesaip));
               $data_ok[3] = date('d-m-Y',strtotime($r->tgl_mulai_daftar));
               $data_ok[4] = '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_lihat" data="'.$r->id_pengumuman.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a>
              '; 
              if ($r->ka_akademik=='') {
                  $data_ok[5] = '';
                } else if ($r->ka_akademik=='1') {
                   $data_ok[5] = '<span class="label label-success">
                        <i class="fa fa-check bigger-120"></i>
                        Di Terima &nbsp;
                      </span>';
                }else if ($r->ka_akademik=='0') {
                  # code...
                
                   $data_ok[5] = '<span class="label label-danger">
                        <i class="fa fa-times bigger-120"></i>
                        Di tolak &nbsp;
                      </span>';
                }
          
                 $data_ok[6] = '<div class="btn-group" style="float:right;">
                                <a href="#"  class="btn btn-danger btn-xs item_tolak" data="'.$r->id_pengumuman.'" data-v="0" data-jns="'.$r->jenisp_id.'"><i class="fa fa-times" style="margin-left: 0px; color: #fff"></i>&nbsp;Tolak</a>
                        
                              <a href="#"  class="btn btn-success btn-xs item_terima" data="'.$r->id_pengumuman.'" data-v="1" data-jns="'.$r->jenisp_id.'"><i class="fa fa-check-square" style="margin-left: 0px; color: #fff"></i>&nbsp;Terima</a>
                         </div>
             

                              ';
             
               
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
   public function pengumuman_wd1()
  {
    $id=$this->input->get('id_jenis');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
    
      $query = $this->db->query("SELECT * FROM pengumuman a INNER JOIN jenis_pengumuman b ON a.jenisp_id=b.id_jenisp ");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->nama_jenis;
              $data_ok[2] = date('d-m-Y',strtotime($r->tgl_distribusip)).' - '.date('d-m-Y',strtotime($r->tgl_selesaip));
               $data_ok[3] = date('d-m-Y',strtotime($r->tgl_mulai_daftar));
               $data_ok[4] = '<a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_lihat" data="'.$r->id_pengumuman.'"><i class="fa fa-eye"></i> Lihat Pengumuman</a>
               ';
               if ($r->ka_akademik=="1") {
                  $data_ok[5] = '<span class="label label-success">
                        <i class="ace-icon fa fa-check bigger-120"></i>
                        Telah Di Validasi &nbsp;
                      </span>';
                } else if ($r->ka_akademik=="0") {
                  $data_ok[5] = '<span class="label label-danger">
                        <i class="ace-icon fa fa-times bigger-120"></i>
                        Tolak &nbsp;
                      </span>';
                }else{
                   $data_ok[5] = '<span class="label label-info">
                        <i class="fa fa-spin fa-spinner bigger-120"></i>
                        Proses &nbsp;
                      </span>';
                }
              
              
                 $data_ok[6] = '
                              <a href="#"  class="btn btn-warning btn-xs btn-block item_komen" data="'.$r->id_pengumuman.'" data-v="1"><i class="fa  fa-comment-o" style="margin-left: 0px; color: #fff"></i>&nbsp;Komen</a>
                              <div class="btn-group btn-group-justified" style="width:auto;">
                                <a href="#"  class="btn btn-danger btn-xs item_tolak" data="'.$r->id_pengumuman.'" data-v="0" data-jns="'.$r->jenisp_id.'" role="button" '.$this->btn_disabled($r->ka_akademik).'><i class="fa fa-times" style="margin-left: 0px; color: #fff"></i>&nbsp;Tolak</a>
                        
                              <a href="#"  class="btn btn-success btn-xs item_terima" data="'.$r->id_pengumuman.'" data-v="1" data-jns="'.$r->jenisp_id.'" '.$this->btn_disabled($r->ka_akademik).'><i class="fa fa-check-square" style="margin-left: 0px; color: #fff"></i>&nbsp;Terima</a>
                         </div>
                               ';
             
               
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

  function btn_disabled($kabak){
    if ($kabak=='') {
      return 'disabled';
    }else{
      return '';
    }
  }

function data_distribusi(){
$draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
    
      $query = $this->db->get('jenis_pengumuman');
       $aa = $this->db->query("SELECT * FROM jabatan WHERE id_jabatan IN(1,2,3,4,6,13)");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {

           $data_ok = array();
              $data_ok[0] = $no++;
               $data_ok[1] = $r->nama_jenis;
           $data_oko = array();
            
              foreach($aa->result() as $d) {

               $data_oko[]='<div class="checkbox-custom checkbox-default">
                                <input type="checkbox" '.$this->checked($r->id_jenisp,$d->id_jabatan).' id="checkboxExample1" onclick="ceklist('.$r->id_jenisp.','.$d->id_jabatan.');">
                                <label for="checkboxExample1">'.$d->jabatan.'</label>
                              </div> ';
        $data_ok[2] = $data_oko;

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

function checked($id_jenisp,$id_jabatan){
  $sql=$this->db->query("SELECT * FROM pengumuman_dist WHERE jenisp_id='$id_jenisp' AND distribusi='$id_jabatan'");
  if ($sql->num_rows()>0) {
    return "checked";
  }else{
    return "";
  }
}

  function validasi($id,$status,$kabak,$id_jenis){
    if ($status=="1") {
     return '   <a href="#"  class="btn btn-success btn-xs item_nvalid" data="'.$id.'" data-v="0" data-jns="'.$id_jenis.'"><i class="fa fa-check-square" style="margin-left: 0px; color: #fff"></i>&nbsp;un-Validasi</a>';
    }else{
      if ($kabak=="1") {
         return '  <a href="#"  class="btn btn-warning btn-xs item_valid" data="'.$id.'" data-v="1" data-jns="'.$id_jenis.'"><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;validasi</a>';
      }else{
         return '  <a href="#"  class="btn btn-warning btn-xs item_valid" data="'.$id.'" data-v="1" disabled><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;validasi</a>';
      }
     
    }
  }
  function aktifasi($status,$kabak,$wd,$id,$jenis){
    if ($status=="1") {
     return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning  btn-xs btn-block item_naktif" data="'.$id.'" data-j="'.$jenis.'"><i class="fa fa-key"></i> Non-Aktifkan</a>';
    }else{
      if ($kabak=='' AND $wd=='') {
        return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs btn-block item_edit" data="'.$jenis.'" disabled><i class="fa fa-pencil"></i> Aktifkan</a>';
      }else if ($kabak=='0' AND $wd=='0') {
        return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs btn-block item_edit" data="'.$jenis.'" disabled><i class="fa fa-pencil"></i> Aktifkan</a>';
      }else if ($kabak=='1' AND $wd=='0') {
        return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs btn-block item_edit" data="'.$jenis.'" disabled><i class="fa fa-pencil"></i> Aktifkan</a>';
      }else if ($kabak=='0' AND $wd=='1') {
        return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs btn-block item_edit" data="'.$jenis.'" disabled><i class="fa fa-pencil"></i> Aktifkan</a>';
      }else{
         return ' <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-success btn-xs btn-block item_aktif" data="'.$id.'" data-j="'.$jenis.'" ><i class="fa fa-pencil"></i> Aktifkan</a>';
      }
     
    }
  }
  function cek_pengumuman(){
    $id=$this->uri->segment(3);
    $sa['data']=$this->db->get_where('pengumuman',array('id_pengumuman' =>$id ))->row();
    $this->load->view('pengumuman/view',$sa);
  }
//Function CRUD

function op_aktifasi(){
  $id=$this->input->post('id');
    $jenis=$this->input->post('jenis');
    $Pilih=$this->input->post('aktifasi');

    if ($Pilih=="naktif") {
      $this->db->where('id_pengumuman',$id);
      $this->db->update('pengumuman', array('status_pengumuman' =>"0" ));
      $pesan="Non-Aktifkan berhasil";
      $status=false;
    }else{
    $cek=$this->db->get_where('pengumuman',array('jenisp_id'=>$jenis,'status_pengumuman'=>"1" ));
    if ($cek->num_rows()>0) {
       $pesan="Maaf Ada Pengumuman Yang Sedang Aktif Untuk Jenis Pengumuman Yang Anda Pilih, Silahkan Non-Aktifkan Atau Hapus Pengumuman Yang Sedang Aktif";
       $status=true;
    }else{
       $this->db->where('id_pengumuman',$id);
      $this->db->update('pengumuman', array('status_pengumuman' =>"1" ));
       $pesan="Pengumuman Berhasil Di Aktifkan";
       $status=false;
    }
  }
    $sa['pesan']=$pesan;
    $sa['status']=$status;
    j($sa);
    exit();
}



function create_dist(){
   $id_jn=$this->input->post('id_jn');
    $id_jb=$this->input->post('id_jb');
    $sql=$this->db->get_where('pengumuman_dist', array('jenisp_id' =>$id_jn ,'distribusi'=>$id_jb ));
    $data = array('jenisp_id' =>$id_jn ,'distribusi'=>$id_jb );
    if ($sql->num_rows()>0) {
      $this->db->delete('pengumuman_dist',$data);
      $pesan="hapus";
    }else{
      $this->db->insert('pengumuman_dist',$data);

      $pesan="insert";
    }
     $sa['pesan']=$pesan;
 j($sa);
    exit();
}

  function simpan_pengumuman(){
    $id=$this->input->post('id');
    $jenis=$this->input->post('jenis');
    $thnak=$this->input->post('thnak');
    $tgldist=$this->input->post('tgldist');
    $tglmul=$this->input->post('tglmul');
    $tglsel=$this->input->post('tglsel');
     $no_srt=$this->input->post('no_surat');
    $pengumuman=$this->input->post('pengumuman');
    $data = array('jenisp_id' =>$jenis ,
                  'thn_akademik'=>$thnak,
                  'tgl_distribusip'=>$tgldist,
                  'tgl_mulai_daftar'=>$tglmul,
                  'tgl_selesaip'=>$tglsel,
                  'no_srt'=>$no_srt,
                  'isi'=>$pengumuman,
                  'status_pengumuman'=>"0",'ka_akademik'=>"",'wadir1'=>"" );
if ($id=="0") {
$this->db->insert('pengumuman',$data);
$this->send_notif();
$sa['pesan']="Pengumuman Berhasil Di Tambahkan ";
}else{
  $this->db->where('id_pengumuman',$id);
  $this->db->update('pengumuman',$data);

    $sa['pesan']="Pengumuman Berhasil Di Edit";
}
    
    j($sa);
    exit();
  }
   public function simpan_jenis(){
    $id=$this->input->post('id');
    $jenis=$this->input->post('jenis');
    $ket=$this->input->post('ket');
    $data = array('nama_jenis' =>$jenis ,'keterangan'=>$ket );
    if ($id=="0") {
    $this->db->insert('jenis_pengumuman',$data);
    $sa['pesan']="Berhasil di Tambahkan";
    }else{
    $this->db->where('id_jenisp',$id);
    $this->db->update('jenis_pengumuman',$data);
    $sa['pesan']="Berhasil di Update";
    }
    
    j($sa);
    exit();
  }
  function simpan_validasi_kabak(){
    $id=$this->input->post('id');
    $id_jns=$this->input->post('id_jns');
    $id_v=$this->input->post('id_v');
    $data = array('ka_akademik'=>$id_v);


  // $this->db->where('id_pengumuman',$id);

  // $this->db->update('pengumuman',$data);
   
    $this->db->query("UPDATE pengumuman SET ka_akademik=".$id_v." WHERE id_pengumuman =".$id." AND jenisp_id=".$id_jns."");

    $sa['pesan']="Pengumuman Berhasil Di Valiadsi";

    
    j($sa);
    exit();
  }
   function simpan_validasi_wd1(){
    $id=$this->input->post('id');
    $id_jns=$this->input->post('id_jns');
    $id_v=$this->input->post('id_v');
    if ($id_v=="1") {
      $cek_aktif=$this->db->get_where('pengumuman', array('jenisp_id' =>$id_jns ,'status_pengumuman'=>"1" ));
      if ($cek_aktif->num_rows()>0) {
        $data = array('wadir1'=>$id_v,'status_pengumuman'=>"0");
      }else{
        $data = array('wadir1'=>$id_v,'status_pengumuman'=>"1");
      }
      
    }else{
       $data = array('wadir1'=>$id_v,'status_pengumuman'=>"0");
    }
    


  $this->db->where('id_pengumuman',$id);

  $this->db->update('pengumuman',$data);

    $sa['pesan']="Pengumuman Berhasil Di Valiadsi".$id_jns;

    
    j($sa);
    exit();
  }
  function delete(){
    $uri=$this->uri->segment(3);
       $id=$this->input->post('id');
    if ($uri=="hpus-jenis") {
      $this->db->delete('jenis_pengumuman',array('id_jenisp' =>$id ));
       $sa['pesan']="Data Jenis Pengumuman Berhasil Di hapus";
    }else{
       $this->db->delete('pengumuman',array('id_pengumuman' =>$id ));
      $sa['pesan']="Data Pengumuman Berhasil Di hapus";
    }
  

    
    j($sa);
    exit();
  }
//End Function CRUD

  function send_notif(){
   $id_users=$this->session->userdata('id_users');
   $query = $this->db->get_where('users', array('email' => $id_users))->row();
   $tgl=date('Y-m-d');

 $data = array(
        array(
                'pengirim' => $query->username,
                'penerima' => '11',
                'isi_notif' => 'Telah Membuat Pengumuman',
                  'prodi' => "0",
                'tgl_notif' => $tgl
        ),
        array(
                 'pengirim' => $query->username,
                'penerima' => '12',
                'isi_notif' => 'Telah Membuat Pengumuman',
                'prodi' => "0",
                'tgl_notif' => $tgl
        )
);

$this->db->insert_batch('app_notif', $data);
       
   
}
}