<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Sk_mengajar extends CI_Controller
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
  
  public function index($value='')
  {
  	$this->cek_aktif();
  	$sa['thn_akd']=$this->db->get_where('app_thn_akademik', array('status' =>"1" ))->row();
  	$sa['dosen']=obj_to_array($this->db->query("SELECT * FROM tbl_dosen a INNER JOIN app_dosen_ajar b ON a.nrp=b.id_dosen GROUP by a.nrp")->result(), "nrp,nama_dsn");
  	$sa['dosen_lb']=obj_to_array($this->db->query("SELECT * FROM tbl_dosen_lb a INNER JOIN app_dosen_ajar b ON a.id_dosen_lb=b.id_dosen GROUP by a.id_dosen_lb ")->result(), "id_dosen_lb,nama_dlb");
    $sa['title']="Registrasi";
      $sa['p']="Sk_mengajar/view_sk";
    $this->cek_akses($sa);  
      
  }

  function create_sk(){
  	 $id=$this->input->post('id');
  	 $thn_akademik=$this->input->post('thn_akd');
  	 $no_sk=$this->input->post('no_sk');
  	 $tgl_sk=$this->input->post('tgl_sk');
  	 $sk_dosen=$this->input->post('id_dsn');
$data = array('no_sk' =>$no_sk ,'tgl_sk'=>$tgl_sk,'id_dosen'=>$sk_dosen,'thn_akademik'=>$thn_akademik );
  	 if ($id=="0") {
  	 	 $cek_data=$this->db->get_where('app_sk_mengajar', array('id_dosen' =>$sk_dosen ,'thn_akademik'=>$thn_akademik ));
  	 	if ($cek_data->num_rows()>0) {
  		$sa['status']="100";
  	 	$sa['pesan']="Data SK Yang di Input Kan telah ADA";
  	 }else{

  	 	
  	 	$this->db->insert('app_sk_mengajar',$data);

  	  $sa['status']="200";
  	 $sa['pesan']="Data SK Mengajar Berhasil Di Simpan";
  	 }
  	
  	 }else{
  	 	$this->db->where('id_sk',$id);
  	 	$this->db->update('app_sk_mengajar',$data);
  	 	$sa['status']="200";
  	 $sa['pesan']="Data SK Mengajar Berhasil Di Upadate".$id;
  	 }
  	

  	 j($sa);
  	 exit();

  }

function delete_sk(){
	 $id=$this->input->post('id');
	 $this->db->delete('app_sk_mengajar', array('id_sk' =>$id ));
	 $sa['status']="200";
  	 $sa['pesan']="Data SK Mengajar Berhasil Di Hapus";
  	 j($sa);
  	 exit();
}

function get_data(){
    $id=$this->input->get('id');
    $hsl=$this->db->query("SELECT *,(SELECT COUNT(nrp) FROM tbl_dosen WHERE nrp=a.id_dosen) AS dosen,(SELECT COUNT(id_dosen_lb) FROM tbl_dosen_lb WHERE id_dosen_lb=a.id_dosen)AS dosen_lb FROM app_sk_mengajar a WHERE a.id_sk='$id' ");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_sk' => $data->id_sk,
          'no_sk' => $data->no_sk,
          'tgl_sk' => $data->tgl_sk,
          'id_dosen' => $data->id_dosen,
          'dosen'=>$data->dosen,
          'dosen_lb'=>$data->dosen_lb,
          
          );
      }
    }
    
    echo json_encode($hasil);
  }
function data_sk(){
	$id_users=$this->session->userdata('id_users');
      $semester=$this->input->get('sems');
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT a.*,b.*,(SELECT nama_dsn FROM tbl_dosen WHERE nrp=a.id_dosen)AS dosen,(SELECT nama_dlb FROM tbl_dosen_lb WHERE id_dosen_lb=a.id_dosen)AS dosen_lb FROM app_sk_mengajar a INNER JOIN app_thn_akademik b ON a.thn_akademik=b.id_thnakad ");
      
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->no_sk;
              $data_ok[2] = $r->id_dosen;
             
              if ($r->dosen!='') {
              	 $data_ok[3] = $r->dosen;
              }elseif ($r->dosen_lb!='') {
              	$data_ok[3] = $r->dosen_lb;
              }
               
               $data_ok[4] = $r->tgl_sk;
                $data_ok[5] = 'Semester '.$r->ta_tipe.' '.$r->keterangan;
             $data_ok[6]='<div class="actions-hover actions-fade">
            						 <a href="#" id="lihat_sk" data="'.$r->id_dosen.'"><i class="fa fa-eye"></i></a>
															<a href="#"  id="item_edit" data="'.$r->id_sk.'"><i class="fa fa-pencil"></i></a>
															<a href="#" id="item_hapus"  data="'.$r->id_sk.'" class="delete-row"><i class="fa fa-trash-o"></i></a>
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

}