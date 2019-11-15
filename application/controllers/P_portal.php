<?php
/**
* 
*/
class P_portal extends CI_Controller
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
  

  function index()
  {
    $this->cek_aktif();
   $sa['portal']=$this->db->get('app_portal')->result();
  	$sa['title']="Portal";
			$sa['p']="data_master/view_portal";
      $this->cek_akses($sa);
  }
  function data_portal(){

  	$sql=$this->db->get('app_portal')->result();
  	foreach ($sql as $portal) {
  		$html.='<section class="panel panel-primary" id="panel-1" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">'.$portal->nama_portal.'</h2>
								</header>
								<div class="panel-body">
								
									<div class="btn-group btn-group-justified">
										<a href="# " data-toggle="tooltip" title="" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block item_on" data="'.$portal->id_portal.'" >'.$this->btn1($portal->id_portal).' Open</a>

										<a href="# " data-toggle="tooltip" title="" class="mb-xs mt-xs mr-xs btn btn-danger btn-lg btn-block item_off" data="'.$portal->id_portal.'" >'.$this->btn2($portal->id_portal).' Close</a>
									</div>
								
							</section>';
  	}

  	j($html);
  	exit();
  }
  function btn1($id){
 $sql= $this->db->get_where('app_portal',array('id_portal' =>$id ))->row();
if ($sql->status_portal==1) {
	return '<i class="fa  fa-check-square-o"></i>';
}else{
	return '';
}
 
  }
   function btn2($id){
 $sql= $this->db->get_where('app_portal',array('id_portal' =>$id ))->row();
if ($sql->status_portal==0) {
	return '<i class="fa  fa-check-square-o"></i>';
}else{
	return '';
}
 
  }

  function save_portal(){
  	$id=$this->input->post('id');
  	$stat=$this->input->post('stat');
  	$data = array('status_portal' =>$stat );
  	$this->db->where('id_portal',$id);
  	$this->db->update('app_portal',$data);
  	if ($stat==1) {
  		$sa['pesan']="Portal Telah Di Buka";
  	}else{
  		$sa['pesan']="Portal Telah Di Tutup";
  	}
  	
  	j($sa);
  	exit();

  }
}