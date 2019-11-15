<?php
	class User_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
		public function get_jabatan($id_users){
			$sql = "SELECT *FROM tr_akses,jabatan where nip=$id_users AND jabatan.id_jabatan=tr_akses.id_jabatan";
			return $this->db->query($sql);
		}


	}
?>