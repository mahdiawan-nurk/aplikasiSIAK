<?php
/**
 * 
 */
class Asset_prodi extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('M_asset');
    
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
  


public function index($value='')
{

    $this->cek_aktif();
    $sa['ruangan']=obj_to_array($this->db->get('app_ruangan')->result(), "ruangan_id,nama_ruangan");
    $sa['title']="Data ruangan";
      $sa['p']="asset/data_aset_prodi";
       $this->cek_akses($sa);
}
function auto_kode(){
  $prodi=$this->session->userdata('prodi');
  $this->db->select('RIGHT(app_aset_prodi.kode_barang,4)as kode',false);
  $this->db->order_by('kode_barang','DESC');
  $this->db->limit(1);

  $query=$this->db->get('app_aset_prodi');
  if ($query->num_rows()<>0) {
    $data=$query->row();
    $kode=intval($data->kode)+1;
  }else{
    $kode=1;
  }

  $kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
  $kode_jadi="PRO".$prodi.$kode_max;
  return $kode_jadi;

}

public function get_data()
{
  $id=$this->input->post('id');
  $hsl=$this->M_asset->get_data($id);
   if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_br'=>$data->id_aset_brng,
         'ruangan'=>$data->ruangan_id,
          'jenis_b'=>$data->nama_barang,
         'mode_b'=>$data->model_barang,
          'spesifikasi'=>$data->spesifikasi_barang,
          'tahun_p'=>$data->thun_pembuatan,
          'jumlah_b'=>$data->jumlah_barang,
         'harga_b'=>$data->harga_beli,
         'kondisi_b'=>$data->kondisi_barang,
          'keterangan'=>$data->keterangan,
          'asal_b'=>$data->keterangan,
          'kode_b'=>$data->kode_barang,
          
          );
      }
     
    }
    
    echo json_encode($hasil);
}
public function save_data()
{
  $prodi=$this->session->userdata('prodi');
  $form=$this->input->post('form');
 $data = array('ruangan_id' =>$form[1] ,'kode_barang' =>$this->auto_kode() ,'nama_barang' =>$form[2] ,'model_barang' =>$form[3] ,'spesifikasi_barang' =>$form[4] ,'thun_pembuatan' =>$form[5] ,'jumlah_barang' =>$form[6] ,'harga_beli' =>$form[7] ,'kondisi_barang' =>$form[8] ,'asal_barang' =>$form[9] , 'prodi_id' =>$prodi ,'keterangan'=>$form[10]);
 $this->M_asset->save_data($data);
  $sa['pesan']="Data Barang Berhasil Di Simpan";
  j($sa);
  exit();
}

public function update_data()
{
   $prodi=$this->session->userdata('prodi');
  $form=$this->input->post('form');
 $data = array('ruangan_id' =>$form[1] ,'nama_barang' =>$form[2] ,'model_barang' =>$form[3] ,'spesifikasi_barang' =>$form[4] ,'thun_pembuatan' =>$form[5] ,'jumlah_barang' =>$form[6] ,'harga_beli' =>$form[7] ,'kondisi_barang' =>$form[8] ,'asal_barang' =>$form[9] , 'prodi_id' =>$prodi ,'keterangan'=>$form[10]);
 $this->M_asset->update_data($data,$form[0]);
  $sa['pesan']="Data Barang Berhasil Di Update";
  j($sa);
  exit();
}

public function delete_data()
{
   $id=$this->input->post('pilih');
   $jml=count($id);
   for ($i=0; $i < $jml; $i++) { 
     $this->db->delete('app_aset_prodi', array('id_aset_brng' =>$id[$i] ));
   }

   echo "Data Berhasil Di Hapus...";

  

  // $sa['pesan']="Data Barang Berhasil Di Hapus";
  // j($sa);
  // exit();
}

public function data_asset_prodi(){
   $prodi=$this->session->userdata('prodi');
   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->M_asset->data_asset_prodi($prodi);
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_ruangan;
              $data_ok[2] = $r->kode_barang;
              $data_ok[3] = $r->nama_barang;
              $data_ok[4] = $r->model_barang;
              $data_ok[5] = $r->spesifikasi_barang;
              $data_ok[6] = $r->thun_pembuatan;
              $data_ok[7] = $r->jumlah_barang;
              $data_ok[8] = $r->harga_beli;
              $data_ok[9] = $r->kondisi_barang;
              $data_ok[10] = $r->asal_barang;
              $data_ok[11] = '<div class="btn-group" style="float:right;">
                              <a href="# " data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs item_edit" data="'.$r->id_aset_brng.'"><i class="fa fa-pencil"></i></a>
                              
                               </div>';
             
               $data_ok[12] = '<input type="checkbox" name="pilih[]" value="'.$r->id_aset_brng.'"/>';
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