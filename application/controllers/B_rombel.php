<?php
/**
* 
*/
class B_rombel extends CI_Controller
{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
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
  
//Class Mahasiswa
  public function index($value='')
  {
  
    $this->cek_aktif();
    $prodi=$this->session->userdata('prodi');
  //   $sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
    $sa['angkatan'] = obj_to_array($this->db->get('app_angkatan')->result(), "id_angkatan,thn_angkatan");
  //   $sa['prodi'] = obj_to_array($this->M_setting->ambil_prodi()->result(), "id_prodi,nama_prodi");
  //    $sa['room'] = obj_to_array($this->db->get_where('rombel_jenis',array('prodi_id' =>$prodi ))->result(), "id_rombel,nama_rombel");
  //   $sa['rombel']=$this->db->get_where('rombel_jenis',array('prodi_id' =>$prodi ))->result();
    $sa['prodi']=$this->db->get_where('tbl_prodi',array('kode_prodi' =>$prodi ))->row();
     $sa['dosen'] = obj_to_array($this->db->get_where('tbl_dosen',array('prodi_id' =>$prodi ))->result(), "nrp,nama_dsn");
  // $sa['title']="Data Rombel";
  //     $sa['p']="data_master/data_rombel_r";

  //      $this->cek_akses($sa);
     $sa['title']="Data Rombel";
      $sa['p']="data_master/new_rombel";

       $this->cek_akses($sa);


  }
  public function tambah_rombel($value='')
  {
  
    $this->cek_aktif();
    $prodi=$this->session->userdata('prodi');
    $sa['semester'] = obj_to_array($this->M_setting->ambil_semester()->result(), "id,nama");
   $sa['angkatan'] = obj_to_array($this->db->get('app_angkatan')->result(), "id_angkatan,thn_angkatan");
   $sa['dosen'] = obj_to_array($this->db->get_where('tbl_dosen',array('prodi_id' =>$prodi ))->result(), "nrp,nama_dsn");
   $sa['prodi']=$this->db->get_where('tbl_prodi',array('id_prodi' =>$prodi ))->row();
  $sa['title']="Data Rombel";
      $sa['p']="data_master/add_rombel";

       $this->cek_akses($sa);

  }
 function get_rombel(){
    $id=$this->input->post('id');
    $hsl=$this->db->query("SELECT * FROM rombel_jenis INNER JOIN tbl_prodi ON rombel_jenis.prodi_id=tbl_prodi.kode_prodi INNER JOIN app_angkatan ON rombel_jenis.angkatan_id=app_angkatan.id_angkatan INNER JOIN tbl_dosen ON rombel_jenis.dosen_id=tbl_dosen.nrp WHERE rombel_jenis.id_rombel='$id'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_rombel' => $data->id_rombel,
          'nama_rombel' => $data->nama_rombel,
          'thn_angkatan' => $data->thn_angkatan,
          'id_angkatan' => $data->angkatan_id,
          'prodi' => $data->nama_prodi,
          'id_prodi'=>$data->prodi_id,
          'dosen' => $data->nama_dsn,
          'nrp' => $data->nrp,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }
//function untuk CRUD ROMBEL JENIS
  public function get_rombel_jenis()
  {
     $id=$this->input->post('id');
     $hsl=$this->db->get_where('rombel_jenis', array('id_rombel' =>$id ))->row();
     $sa['id']=$hsl->id_rombel;
     $sa['nama_rombel']=$hsl->nama_rombel;
     $sa['angkatan']=$hsl->angkatan_id;
     $sa['dosen']=$hsl->dosen_id;

     j($sa);
     exit();

  }
  public function save_rombel(){
 
  $nama=$this->input->post('nama_r');
  $angkatan=$this->input->post('angkatan');
  $prodi=$this->session->userdata('prodi');
  $dosen=$this->input->post('dosen');
  $data = array('angkatan_id' =>$angkatan ,'nama_rombel'=>$nama,'prodi_id'=>$prodi,'dosen_id'=>$dosen );
  
   $this->db->insert('rombel_jenis',$data);
   $status="Berhasil Di tambah Rombel Baru".$id_rombel.$nama.$angkatan.$prodi.$dosen;
 
      
      $sa['status'] = "main";
      $sa['pesan'] = $status;
     
      
     
     
      j($sa);
      exit();
  }

  public function update_rombel()
  {
   $id_rombel=$this->input->post('id');
  $nama=$this->input->post('nama_r');
  $angkatan=$this->input->post('angkatan');
  $prodi=$this->session->userdata('prodi');
  $dosen=$this->input->post('dosen');
  $data = array('angkatan_id' =>$angkatan ,'nama_rombel'=>$nama,'prodi_id'=>$prodi,'dosen_id'=>$dosen );
    $this->db->where('id_rombel',$id_rombel);
    $this->db->update('rombel_jenis',$data);
    $status="update data Berhasil";


      
      $sa['status'] = "main";
      $sa['pesan'] = $status;
     
      
     
     
      j($sa);
      exit();
  }

   public function delete_rombel(){

    $id=$this->input->post('pilih');
    echo $id[0];

    // $this->db->delete('rombel_jenis',array('id_rombel' =>$id ));
    //  $sa['status'] = "hapus";
    //   $sa['pesan'] = "Data Rombel Berhasil di Hapus ".$id;
     
      
     
     
    //   j($sa);
    //   exit();
  }

//end function CRUD ROMBEL JENIS

public function save_rombel_mhs(){
  $id=$this->input->post('id');
  $nim=$this->input->post('nim');
  $sql=$this->db->get_where('rombel_detail_mhs',array('nim' =>$nim ))->row();
  $data = array('nim' =>$nim ,'rombel_id'=>$id );
  $data2 = array('rombel_id'=>$id );

  if ($sql->rombel_id==$id) {
    $this->db->delete('rombel_detail_mhs',$data);
    $status = 'delete';
  }elseif ($sql->rombel_id=='') {
    $this->db->insert('rombel_detail_mhs',$data);
     $status = 'simpan';
  }elseif ($sql->rombel_id!=$id) {
    $this->db->where('nim',$nim);
    $this->db->update('rombel_detail_mhs',$data2);
     $status = 'change';
  }


      
      $sa['status'] = "main";
      $sa['pesan'] = $status;
     
      
     
     
      j($sa);
      exit();
  }
 

  public function data_rombel_mhs($value='')
  {
    $prodi=$this->session->userdata('prodi');
    $id_rombel=$this->input->get("rombel");
   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if ($id_rombel!='') {
        $where= "WHERE rombel_detail_mhs.rombel_id='$id_rombel'";
      }else{
        $where= "WHERE tbl_mahasiswa.prodi_id='$prodi'";
      }
      $query = $this->db->query("SELECT * FROM rombel_detail_mhs INNER JOIN tbl_mahasiswa ON rombel_detail_mhs.nim=tbl_mahasiswa.nim INNER JOIN rombel_jenis ON rombel_detail_mhs.rombel_id=rombel_jenis.id_rombel INNER JOIN tbl_semester ON tbl_mahasiswa.semester_id=tbl_semester.id ".$where."");
           $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $r->nim;
               $data_ok[1] = $r->nama_mhs;
              $data_ok[2] = $r->nama;
             
             
                
              $data_ok[3] =$r->nama_rombel; 
             
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
  public function data_mhs()
  {
    $prodi=$this->session->userdata('prodi');
    $id_rm= $this->input->get('id_rm');
    $semester= $this->input->get('semester');
 
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if ($semester!='') {
       $where="WHERE a.prodi_id=$prodi and a.semester_id='$semester'";
      }else{
        $where="WHERE a.prodi_id='$prodi'";
      }
      $query = $this->db->query("SELECT a.*, b.nama_prodi prodi, c.nama semester
          FROM tbl_mahasiswa a
          INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi                
                    INNER JOIN tbl_semester c ON a.semester_id = c.id ".$where." ORDER BY nim ASC");
     
      $data = array();

      $no=1;
     
      foreach($query->result() as $r) {
         
         
           $data_ok = array();
              $data_ok[0] = $r->nim;
              $data_ok[1] = $r->nama_mhs;
              
              $data_ok[2] = $r->semester;

             
              $data_ok[3] = '<div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="checkboxExample2" '.$this->mhs_cek($r->nim,$id_rm).' data="'.$r->nim.'" data-id="'.$id_rm.'">
                                <label for="checkboxExample2"></label>
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
   public function data_rombel()
  {
   
    $prodi=$this->session->userdata('prodi');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      
     $this->db->select('*');
      $this->db->from('rombel_jenis');
      $this->db->join('app_angkatan', 'rombel_jenis.angkatan_id=app_angkatan.id_angkatan','inner');
       $this->db->join('tbl_prodi', 'rombel_jenis.prodi_id=tbl_prodi.kode_prodi','inner');
        $this->db->join('tbl_dosen', 'rombel_jenis.dosen_id=tbl_dosen.nrp','inner');
        $this->db->where('rombel_jenis.prodi_id',$prodi);
      $query = $this->db->get();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $r->nama_rombel;
              $data_ok[1] = $r->thn_angkatan;
              
              $data_ok[2] = $r->nama_prodi;
               $data_ok[3] = $r->nama_dsn;
              
                $data_ok[4] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_rombel.'"><i class="fa fa-eye"></i> Edit</a>
                             
                               </div>';
                 $data_ok[5] = '<input type="checkbox" name="pilih[]" value="'.$r->id_rombel.'">';
                
                 
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
 public function mhs_cek($nim,$id_rm){
   // $id_rm= $this->input->post('id_a');
       $sql=$this->db->query("SELECT * FROM `rombel_detail_mhs` WHERE rombel_id='".$id_rm."' and nim='".$nim."'");
   
if ($sql->num_rows()>0) {

  return 'checked';
}else{
 return '';
 
}
    
  }
  // public function card_rombel($value='')
  // {
    
  //    $this->db->select('*');
  //     $this->db->from('rombel_jenis');
  //     $this->db->join('app_angkatan', 'rombel_jenis.angkatan_id=app_angkatan.id_angkatan','inner');
  //      $this->db->join('tbl_prodi', 'rombel_jenis.prodi_id=tbl_prodi.id_prodi','inner');
  //       $this->db->join('tbl_dosen', 'rombel_jenis.dosen_id=tbl_dosen.nrp','inner');
  //     $query = $this->db->get();
  //       $html='';
  //     foreach ($query->result() as $key) {
  //        $html=$html.'<section class="panel">
  //                     <div class="panel-body bg-quartenary">
  //                       <div class="widget-summary">
  //                         <div class="widget-summary-col widget-summary-col-icon">
  //                           <div class="summary-icon">
  //                             <i class="fa fa-users"></i>
  //                           </div>
  //                         </div>
  //                         <div class="widget-summary-col">
  //                           <div class="summary" id="tampil">
  //                             <table>
  //                               <tr><td><h4 class="title">Rombel &nbsp;</h4></td><td><h4>:&nbsp;'.$key->nama_rombel.'</h4></td></tr>
  //                               <tr><td><h4 class="title">Angkatan&nbsp; </h4></td><td><h4>:&nbsp;'.$key->thn_angkatan.'</h4></td></tr>
  //                               <tr><td><h4 class="title">Prodi&nbsp; </h4></td><td><h4>:&nbsp;'.$key->nama_prodi.'</h4></td></tr>
  //                               <tr><td><h4 class="title">Dosen Wali&nbsp; </h4></td><td><h4>:&nbsp;'.$key->nama_dsn.'</h4></td></tr>
  //                             </table>
  //                           </div>
  //                           <div class="summary-footer">
  //                           <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-default" href="#modalFull" id="tambah">Full</a>
  //                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary item_edit" data="'.$key->id_rombel.'"><i class="fa fa-pencil "></i> Edit</button>
  //                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary item_hapus" data="'.$key->id_rombel.'"><i class="fa fa-trash-o "></i> Hapus</button>
  //                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary item_kelas" data="'.$key->id_rombel.'"><i class="fa fa-eye "></i> View Kelas</button>
  //                           </div>
  //                         </div>
  //                       </div>
  //                     </div>
  //                   </section>';
  //     }
    
     
  //     $sa['html']=$html;
  //    echo j($sa);
  // }
}