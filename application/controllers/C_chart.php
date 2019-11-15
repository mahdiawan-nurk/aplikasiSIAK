<?php

/**
* 
*/
class C_chart extends CI_Controller
{
	
	public function chart1()
	{
		$id_users=$this->session->userdata('id_users');
		$cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan ");
		foreach ($cek_login->result() as $key ) {
			if ($key->id_jabatan=="9") {
			$akd=$this->db->get_where('app_thn_akademik', array('status' => "1" ))->row();		
			$mhs=$this->db->query("SELECT COUNT(nim)AS data FROM tbl_mahasiswa")->row();
			$pengajuan=$this->db->query("SELECT COUNT(nim)AS tdk FROM tbl_reg_before where thun_akademik='$akd->thun_akademik'")->row();
			$terdaftar=$this->db->query("SELECT COUNT(nim)AS tdf FROM tbl_reg_selesai where thn_akademik='$akd->thun_akademik'")->row();
			$sa['data_mhs']=$mhs->data;
			$sa['data_pengajuan']=$pengajuan->tdk;
			$sa['data_terdaftar']=$terdaftar->tdf;
			$sa['status']=true;
			}else{
				$sa['status']=false;
			}
		}
		

			j($sa);
			exit();
	}

	function chart2(){
		$id_users=$this->session->userdata('id_users');
		$cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan ");
		$count=$this->db->query("SELECT *,(SELECT COUNT(nim) FROM tbl_mahasiswa WHERE prodi_id=a.kode_prodi)AS prodi FROM tbl_prodi a");
		foreach ($cek_login->result() as $log) {
			if ($log->id_jabatan=="9") {
				$data = array();
		foreach ($count->result() as $key) {
			$data[]=$key->prodi;
			$hsl=$data;
				}
		$name = array();
		foreach ($count->result() as $nama) {
			$name[]=$nama->nama_prodi;
			$hsl2=$name;
				}
				$st=true;
			}else{
				$st=false;
			}
			
		}
		
	
		
		$sa['jml_prodi']=$count->num_rows();
		$sa['prodi']=$hsl;
		$sa['nama']=$hsl2;
		$sa['status']=$st;
		j($sa);
		exit();
		
	}

	function chart3(){
		$prodi=$this->session->userdata('prodi');
		$id_users=$this->session->userdata('id_users');
		$nama=$this->db->get_where('tbl_prodi',array('kode_prodi' =>$prodi ))->row();
		$jml_mhs=$this->db->query("SELECT COUNT(nim)AS jml FROM tbl_mahasiswa WHERE prodi_id='$prodi' ")->row();
		$jml_rmbl=$this->db->query("SELECT *,(SELECT COUNT(nim) FROM rombel_detail_mhs d WHERE d.rombel_id=b.id_rombel)AS data FROM rombel_detail_mhs a INNER JOIN rombel_jenis b ON a.rombel_id=b.id_rombel WHERE b.prodi_id='$prodi' GROUP BY b.nama_rombel ");
		$cek_login= $this->db->query("SELECT *FROM tr_akses,jabatan where email='".$id_users."' AND jabatan.id_jabatan=tr_akses.id_jabatan ORDER BY jabatan.id_jabatan ASC");
		foreach ($cek_login->result() as $r) {
			if ($r->id_jabatan=="2") {
				$jml_rmbl1 = array();
				foreach ($jml_rmbl->result() as $c) {
					$jml_rmbl1[]=$c->nama_rombel;
					$count=$jml_rmbl1;

				}
				$jml_mhs_rm = array();
				foreach ($jml_rmbl->result() as $c) {
					$jml_mhs_rm[]=$c->data;
					$count1=$jml_mhs_rm;

				}
				$sa['status']=true;
			}else{
				$sa['status']=flase;
			}
			
		}
		
		
		
		

		$sa['jml_mhs']=$jml_mhs->jml;
		$sa['jml_rmbl']=$jml_rmbl->num_rows();
		$sa['nama_prodi']=$nama->nama_prodi;
		$sa['nama_rombel']=$count;
		$sa['jml_rombel_mhs']=$count1;
		
		j($sa);
		exit();
		
	}

function menu(){
	  $level=$this->session->userdata('id_users');
	    				$menu="";
	  					$menu =$menu."<ul class='nav nav-main'>";
                      
                        $akses =$this->db->query("SELECT *FROM tr_akses WHERE email='".$level."' ")->result();
                        foreach ($akses as $key) {
                         $main_menu = $this->db->query("SELECT * FROM jabatan Where id_jabatan='$key->id_jabatan'");
                        foreach ($main_menu->result() as $main) {
                            $sub_menu = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='0'");
                            foreach ($sub_menu->result() as $ma ) {
                            $sub_menu_tree = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='$ma->id_menu' ORDER BY nama_menu ASC");
                             if($sub_menu_tree->num_rows()>0)
                                    {
                                        //looping
                                        $menu= $menu."<li class='nav-parent'>
                                    <a href='#' >
                                     <i class='".$ma->icon."'></i> <span>".  strtoupper($ma->nama_menu)."</span></a>
                                    <ul class='nav nav-children'>";
                                        foreach ($sub_menu_tree->result() as $s)
                                        {
                                            $menu= $menu."<li>".  anchor($s->link,  '<i class="'.$s->icon.'"></i> '.strtoupper($s->nama_menu))."</li>";
                                        }
                                    $menu=$menu."</ul>
                                </li>";
                                        // end looping
                                    }
                                    else
                                    {
                                        $menu= $menu."<li>".  anchor($ma->link,  '<i class="'.$ma->icon.'"></i><span>'.strtoupper($ma->nama_menu))."</spam></li>";
                                    }
                                }
                            
                            }
                        
                        }
                        $menu =$menu."</ul>";
                        j($menu);
                        exit();
}


}