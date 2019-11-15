<?php
/**
* 
*/
class D_menu extends CI_Controller
{
	
var $folder =   "pengaturan_user";
 public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
         $this->load->model('M_menu');
         $this->load->library('form_validation');
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
  $sa['title']="Menu";
  $sa['main'] = obj_to_array($this->db->query("SELECT * FROM tbl_menu where main_menu='0' AND link='#' ORDER BY nama_menu")->result(), "id_menu,nama_menu");
	$sa['p'] = $this->folder.'/menu_b';
	// $this->load->view('admin',$sa);
  $this->cek_akses($sa);
				
	
		
  }

	function get_data(){
		$id_menu=$this->input->get('id');

    $hsl=$this->M_menu->get_menu($id_menu);
		// $hsl=$this->db->query("SELECT * FROM tbl_menu WHERE id_menu='$id_menu'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_menu' => $data->id_menu,
					'nama_menu' => $data->nama_menu,
					'link' => $data->link,
					'icon' => $data->icon,
					'main_menu' => $data->main_menu,
					);
			}
		}
		
		echo json_encode($hasil);
	}

 function simpan_menu(){
      $this->form_validation->set_rules('nama_main','nama_main','required', array('required' =>'Nama Menu Tidak Boleh Kosong'  ));
      $this->form_validation->set_rules('link_main','link_main','required',array('required' =>'Link Menu Tidak Boleh Kosong'  ));
      $this->form_validation->set_rules('icon_main','icon_main','required',array('required' =>'Icon Menu Tidak Boleh Kosong'  ));
      if ($this->form_validation->run() == false) {
        $stat=false;
        $pesan= array(form_error('nama_main'),form_error('link_main'),form_error('icon_main') );
      }else{

      $nama=$this->input->post('nama_main');
    $link=$this->input->post('link_main');
     $icon=$this->input->post('icon_main');
     $data = array('nama_menu' =>$nama ,'link' =>$link ,'icon' =>$icon);     
     $this->M_menu->save_main_menu($data);  
 

        $stat=true;
        $pesan="Berhasil";
      }

      $sa['status'] = $stat;
      $sa['pesan'] = $pesan;
      j($sa);
      exit();
    }

 function simpan_menu_sub(){
      $this->form_validation->set_rules('nama_sub','nama_sub','required', array('required' =>'Nama Sub Menu Tidak Boleh Kosong'  ));
      $this->form_validation->set_rules('link_sub','link_sub','required',array('required' =>'Link Sub Menu Tidak Boleh Kosong'  ));
      $this->form_validation->set_rules('icon_sub','icon_sub','required',array('required' =>'Icon Sub Menu Tidak Boleh Kosong'  ));
      $this->form_validation->set_rules('sub_id','sub_id','required',array('required' =>'Main Menu Tidak Boleh Kosong'  ));
      if ($this->form_validation->run()==false) {
        $stat=false;
        $pesan= array(form_error('nama_sub'),form_error('link_sub'),form_error('icon_sub'),form_error('sub_id'));
      }else{
    $nama=$this->input->post('nama_sub');
    $link=$this->input->post('link_sub');
    $icon=$this->input->post('icon_sub');
    $sub_id=$this->input->post('sub_id');
    $data = array('nama_menu' =>$nama ,'link' =>$link ,'icon' =>$icon ,'main_menu' =>$sub_id );   
    $this->M_menu->save_sub_menu($data);    

        $stat=true;
        $pesan="Berhasil";
      }


      $sa['status'] = $stat;
      $sa['pesan'] = $pesan;
      j($sa);
      exit();
    }

    function hapus_menu(){
    $kobar=$this->input->post('kode');
    $data = array('id_menu' =>$kobar);
  $this->M_menu->delete_menu($data);
     $sa['status'] = "hapus";
      $sa['pesan'] = "Sub Menu Berhasil dihapus";
      j($sa);
  }
  function update_menu(){
    $id=$this->input->post('id');
    $nama=$this->input->post('nama');
    $link=$this->input->post('link');
    $icon=$this->input->post('icon');
    $data = array('nama_menu' =>$nama ,'link' =>$link ,'icon' =>$icon ,'main_menu' =>"0"  );
    $cek=$this->db->get_where('tbl_menu',$data);
    if ($cek->num_rows()>0) {
      $stat=false;
      $pesan="Tidak Ada Perubahan Pada Data";
    }else{
      $this->M_menu->update_main_menu($id,$data);
     
      $stat=true;
      $pesan="Data Berhasil Di update";
    }
   
     $sa['status'] = $stat;
      $sa['pesan'] = $pesan;
      j($sa);
      exit();
  }
  function update_menu_sub(){
    $id=$this->input->post('id_sub');
    $nama=$this->input->post('nama_sub');
    $link=$this->input->post('link_sub');
    $icon=$this->input->post('icon_sub');
     $sub_id=$this->input->post('sub_id');
      $data = array('nama_menu' =>$nama ,'link' =>$link ,'icon' =>$icon ,'main_menu' =>$sub_id  );
      $cek=$this->db->get_where('tbl_menu',$data);
      if ($cek->num_rows()>0) {
         $stat=false;
      $pesan="Tidak Ada Perubahan Pada Data";
      }else{
        $this->M_menu->update_sub_menu($id,$data);
         $stat=true;
      $pesan="Data Berhasil Di Update";
      }
   
     $sa['status'] = $stat;
      $sa['pesan'] = $pesan;
      j($sa);
      exit();
  }
public function data_main_menu()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_menu->data_main_menu();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_menu;
              $data_ok[2] = $r->link;
               $data_ok[3] = $r->icon;
               $data_ok[4] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_menu.'" ><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_menu.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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
  public function data_sub_menu()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_menu->data_sub_menu();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_menu;
              $data_ok[2] = $r->link;
               $data_ok[3] = $r->icon;
               $data_ok[4] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_menu.'"><i class="fa fa-eye"></i> Edit</a>
                              <a href="#"  class="btn btn-danger btn-xs item_hapus" data="'.$r->id_menu.'" ><i class="glyphicon glyphicon-trash" style="margin-left: 0px; color: #fff"></i>&nbsp;Hapus</a>
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

}