<?php 
/**
* 
*/
class Sm_aset_kendaraan extends CI_Controller
{
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
  


public function index($value='')
{

    $this->cek_aktif();
    $sa['ruangan']=obj_to_array($this->db->get('app_ruangan')->result(), "ruangan_id,nama_ruangan");
    $sa['title']="Data Kendaraan";
      $sa['p']="asset/data_kendaraan";
       $this->cek_akses($sa);
}
// ini Funsi Crud
function get_data(){
     $id=$this->input->post('id');
    $hsl=$this->db->get_where('app_aset_kendaran',array('id_aset_kndran' =>$id  ));
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id_br'=>$data->id_aset_kndran,
          'jenis_b'=>$data->jenis_kendaraan,
         'mode_b'=>$data->model_kendaraan,
          'spesifikasi'=>$data->spesifikasi_kndran,
          'tahun_p'=>$data->thun_pmbuatan,
          'no_rangka'=>$data->no_rnka_mesin,
          'no_mesin'=>$data->no_mesin,
          'harga_b'=>$data->harga_beli,
          'jumlah_b'=>$data->jumlah_kendaraan,
         'kondisi_b'=>$data->kondisi_kndaran,
          'keterangan'=>$data->ket_unit_pmkai,
          
          );
      }
     
    }
    
    echo json_encode($hasil);
  }


public function create_kendaraan(){
$jenis_b=$this->input->post('jenis_b');
$mode_b=$this->input->post('mode_b');
$spesifikasi=$this->input->post('spesifikasi');
$tahun_p=$this->input->post('tahun_p');
$no_rangka=$this->input->post('no_rangka');
$no_mesin=$this->input->post('no_mesin');
$jumlah_b=$this->input->post('jumlah_b');
$harga_b=$this->input->post('harga_b');
$kondisi_b=$this->input->post('kondisi_b');
$keterangan=$this->input->post('keterangan');

$data = array('jenis_kendaraan' =>$jenis_b ,'model_kendaraan' =>$mode_b ,'spesifikasi_kndran' =>$spesifikasi ,'thun_pmbuatan' =>$tahun_p ,'no_rnka_mesin' =>$no_rangka ,'no_mesin' =>$no_mesin ,'harga_beli'=>$harga_b,'jumlah_kendaraan' =>$jumlah_b ,'kondisi_kndaran' =>$kondisi_b ,'ket_unit_pmkai' =>$keterangan );

$this->db->insert('app_aset_kendaran',$data);

$sa['pesan']="Berhasil Di inPutkan";
j($sa);
exit();
}

function update_kendaraan(){
  $id=$this->input->post('id');
  $jenis_b=$this->input->post('jenis_b');
$mode_b=$this->input->post('mode_b');
$spesifikasi=$this->input->post('spesifikasi');
$tahun_p=$this->input->post('tahun_p');
$no_rangka=$this->input->post('no_rangka');
$no_mesin=$this->input->post('no_mesin');
$jumlah_b=$this->input->post('jumlah_b');
$harga_b=$this->input->post('harga_b');
$kondisi_b=$this->input->post('kondisi_b');
$keterangan=$this->input->post('keterangan');

$data = array('jenis_kendaraan' =>$jenis_b ,'model_kendaraan' =>$mode_b ,'spesifikasi_kndran' =>$spesifikasi ,'thun_pmbuatan' =>$tahun_p ,'no_rnka_mesin' =>$no_rangka ,'no_mesin' =>$no_mesin ,'harga_beli'=>$harga_b,'jumlah_kendaraan' =>$jumlah_b ,'kondisi_kndaran' =>$kondisi_b ,'ket_unit_pmkai' =>$keterangan );
$this->db->where('id_aset_kndran',$id);
$this->db->update('app_aset_kendaran',$data);

$sa['pesan']="Berhasil Di inPutkan";
j($sa);
exit();
}

 function delete_kendaraan()
{
 $id=$this->input->post('pilih');
 if ($id=='') {
   $stat='100';
 }else{
  for ($i=0; $i < count($id); $i++) { 
   $this->db->delete('app_aset_kendaran', array('id_aset_kndran' =>$id[$i] ));
  }
  $stat='200';
 }


 echo $stat;
}


//




function data_kendaraan(){

   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get('app_aset_kendaran');
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->jenis_kendaraan;
              $data_ok[2] = $r->model_kendaraan;
              $data_ok[3] = $r->thun_pmbuatan;
              $data_ok[4] = $r->jumlah_kendaraan;
              $data_ok[5] = $r->jumlah_kendaraan;
              $data_ok[6] = $r->jumlah_kendaraan;
              $data_ok[7] = $r->jumlah_kendaraan;
              $data_ok[8] = $r->jumlah_kendaraan;
              $data_ok[9] = $r->jumlah_kendaraan;
              $data_ok[10] = $r->jumlah_kendaraan;
              $data_ok[11] = '<div class="btn-group" style="float:right;">
                              <a href="#modalForm" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_aset_kndran.'"><i class="fa fa-eye"></i> Edit</a>
                             
                               </div>';
         
               $data_ok[12] = '<input type="checkbox" name="pilih[]" value="'.$r->id_aset_kndran.'">';

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