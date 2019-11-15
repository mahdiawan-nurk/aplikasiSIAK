<?php
/**
 * 
 */
class Secure extends CI_Controller
{
	
	 public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
  }
  function index(){
  
		$sesi=$this->session->userdata('login');
		if ($sesi==true) {
			redirect('welcome');
		}else{
			$this->load->view('login');			
		}
	
		
  }
  function act_login(){
  //load session library
		$this->load->library('session');

		$output = array('error' => false);

		$login = $this->input->post('login');
		$email = $this->input->post('username');
		$password1 = $this->input->post('password');
		$password=md5($password1);

		$data = $this->User_model->login($email, $password);
	if (!empty($email) AND !empty($password1)) {
		if($data){
			$hasil=$this->db->query("SELECT *from users where email='$email' and password='$password'")->row();
			$prodi=$this->db->query("SELECT * FROM tr_akses,tbl_prodi WHERE tr_akses.email='".$hasil->email."' AND tbl_prodi.kode_prodi=tr_akses.keterangan ")->row();
			$data1 = array(
			'nama' =>$hasil->username,
			'id_users'=>$hasil->email,
			'prodi'=>$prodi->kode_prodi,
			'login'=> true );
			$this->session->set_userdata($data1);
			$output['login_detail'] = $data1;
			$output['message'] = 'Logging in. Please wait...';
			
		}
		else{
			
			$output['error'] = true;
			$output['message'] ='Username Dan Password Tidak Valid...!!';
		}
	}else{
		if (empty($password1) AND empty($email)) {
			$output['error'] = true;
			$output['message'] ='Email Dan Password Tidak Boleh Kosong...!!';
		}elseif (empty($email)) {
			$output['error'] = true;
			$output['message'] ='Email Tidak Boleh Kosong...!!';
		}else{
			$output['error'] = true;
			$output['message'] ='Password Tidak Boleh Kosong...!!';
		}
	}
		

		j($output); 
	}
	public function logout(){
		//load session library
		$boleh=array('nama'=>'','login'=>'');
			$this->session->unset_userdata($boleh);
			$this->session->sess_destroy();
			redirect(base_url());	
	}

	public function chek_ses()
	{
		session_start();
		$output= $_SESSION['gagal'];
		j($output);
	}
}