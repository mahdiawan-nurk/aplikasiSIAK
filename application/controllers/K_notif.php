<?php
/**
* 
*/
class K_notif extends CI_Controller
{
	
	public function list_notif()
	{	
		$prodi=$this->session->userdata('prodi');
		$id_users=$this->session->userdata('id_users');
		$jbt=$this->db->query("SELECT * FROM tr_akses WHERE email='".$id_users."' ORDER BY id_jabatan ASC");
		$notif='';
		foreach ($jbt->result() as $key) {
		$n_notif=$this->db->query("SELECT * FROM app_notif WHERE penerima='".$key->id_jabatan."' ORDER BY id_notif ASC");
		
			
			foreach ($n_notif->result() as $r) {
				$tgl=substr($r->tgl_notif, 8).'/'.substr($r->tgl_notif, 5,2).'/'.substr($r->tgl_notif, 0,4);
		if ($r->prodi=="0") {
			if ($r->status=="0") {
				$notif .='<li onclick="reset('.$r->id_notif.')"><div class="profile-info"><span class="name">'.$r->pengirim.'&nbsp;<label class="label label-danger">new</label>&emsp;&emsp;&emsp;&emsp;&emsp;</span><span class="title">'.$tgl.'<br>'.$r->isi_notif.'</span></div></li>';
				$st=true;
			}else{
				$notif .='<li onclick="reset('.$r->id_notif.')"><div class="profile-info"><span class="name">'.$r->pengirim.'&nbsp;<label class="label label-danger">old</label>&emsp;&emsp;&emsp;&emsp;&emsp;</span><span class="title">'.$tgl.'<br>'.$r->isi_notif.'</span></div></li>';
				$st=false;
			}
			
		}else {
			if ($r->status=="0") {
				$notif .='<li onclick="reset('.$r->id_notif.')"><div class="profile-info"><span class="name">'.$r->pengirim.'&nbsp;<label class="label label-danger">new</label>&emsp;&emsp;&emsp;&emsp;&emsp;</span><span class="title">'.$tgl.'<br>'.$r->isi_notif.'</span></div></li>';
				$st=true;
			}else{
				$notif .='<li onclick="reset('.$r->id_notif.')"><div class="profile-info"><span class="name">'.$r->pengirim.'&nbsp;<label class="label label-danger">old</label>&emsp;&emsp;&emsp;&emsp;&emsp;</span><span class="title">'.$tgl.'<br>'.$r->isi_notif.'</span></div></li>';
				$st=false;
			}
		}

		}

		
		
		}

		
		$sa['notif']=$notif;
		$sa['jml']=$st;
			
	
		j($sa);
		exit();
		
	}

	public function update_notif()
	{
		$id=$this->input->post('id');
		$this->db->where('id_notif',$id);
		$this->db->update('app_notif', array('status' =>"1"  ));
		$sa['status']=true;
		j($sa);
		exit();
	}

}