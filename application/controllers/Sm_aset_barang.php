<?php
/**
* 
*/
class Sm_aset_barang extends CI_Controller
{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('M_setting');
     $this->load->model('M_mhs');
     $this->load->model('M_dsn');
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
  


public function index($value='')
{

    $this->cek_aktif();
    $sa['ruangan']=obj_to_array($this->db->get('app_ruangan')->result(), "ruangan_id,nama_ruangan");
    $sa['title']="Data ruangan";
      $sa['p']="asset/data_barang";
       $this->cek_akses($sa);
}


function auto_kode(){
  $this->db->select('RIGHT(app_aset_barang.kode_barang,4)as kode',false);
  $this->db->order_by('kode_barang','DESC');
  $this->db->limit(1);

  $query=$this->db->get('app_aset_barang');
  if ($query->num_rows()<>0) {
    $data=$query->row();
    $kode=intval($data->kode)+1;
  }else{
    $kode=1;
  }

  $kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
  $kode_jadi="DAB".$kode_max;
  return $kode_jadi;

}
function auto_kode_j(){
  $this->db->select('RIGHT(app_aset_barang.kode_barang,4)as kode',false);
  $this->db->order_by('kode_barang','DESC');
  $this->db->limit(1);

  $query=$this->db->get('app_aset_barang');
  if ($query->num_rows()<>0) {
    $data=$query->row();
    $kode=intval($data->kode)+1;
  }else{
    $kode=1;
  }

  $kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
  $kode_jadi="DAB".$kode_max;
  j ($kode_jadi);
  exit();

}


  function get_data(){
     $id=$this->input->post('id');
    $hsl=$this->db->get_where('app_aset_barang',array('id_aset_brng' =>$id  ));
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
          'kode_br'=>$data->kode_barang,
          
          );
      }
     
    }
    
    echo json_encode($hasil);
  }


//Ini Functin CRUD nya
function create_barang(){
  $ruangan=$this->input->post('ruangan');
  $jenis_b=$this->input->post('jenis_b');
  $mode_b=$this->input->post('mode_b');
  $spesifikasi=$this->input->post('spesifikasi');
  $tahun_p=$this->input->post('tahun_p');
  $jumlah_b=$this->input->post('jumlah_b');
  $harga_b=$this->input->post('harga_b');
  $kondisi_b=$this->input->post('kondisi_b');
  $keterangan=$this->input->post('keterangan');

  $kode=$this->auto_kode();
$data = array('ruangan_id' =>$ruangan ,'kode_barang'=>$kode,'nama_barang'=>$jenis_b,'model_barang'=>$mode_b,'spesifikasi_barang'=>$spesifikasi,'thun_pembuatan'=>$tahun_p,'jumlah_barang'=>$jumlah_b,'harga_beli'=>$harga_b,'kondisi_barang'=>$kondisi_b,'keterangan'=>$keterangan );

$this->db->insert('app_aset_barang',$data);


$sa['pesan']="Data Barang Berhasil Di Input";
j($sa);
exit();  
}

function update_barang(){
   $id=$this->input->post('id');
   $ruangan=$this->input->post('ruangan');
  $jenis_b=$this->input->post('jenis_b');
  $mode_b=$this->input->post('mode_b');
  $spesifikasi=$this->input->post('spesifikasi');
  $tahun_p=$this->input->post('tahun_p');
  $jumlah_b=$this->input->post('jumlah_b');
  $harga_b=$this->input->post('harga_b');
  $kondisi_b=$this->input->post('kondisi_b');
  $keterangan=$this->input->post('keterangan');

  $kode=$this->auto_kode();
$data = array('ruangan_id' =>$ruangan ,'kode_barang'=>$kode,'nama_barang'=>$jenis_b,'model_barang'=>$mode_b,'spesifikasi_barang'=>$spesifikasi,'thun_pembuatan'=>$tahun_p,'jumlah_barang'=>$jumlah_b,'harga_beli'=>$harga_b,'kondisi_barang'=>$kondisi_b,'keterangan'=>$keterangan );

$this->db->where('id_aset_brng',$id);
$this->db->update('app_aset_barang',$data);

  $sa['pesan']="Data Barang Berhasil Di Update";
j($sa);
exit(); 
}

function delete_barang(){
  $id=$this->input->post('pilih');
  if ($id=='') {
    $stat='100';
  }else{
    for ($i=0; $i < count($id); $i++) { 
     $this->db->delete('app_aset_barang', array('id_aset_brng' =>$id[$i] ));
    }
    $stat='200';
  }

  

  // $sa['pesan']="Data Barang Berhasil Di Hapus";
  // j($sa);
  // exit();
  echo $stat;
}

//funtion CRUD nya Sampai Di sini saja
public function data_barang()
  {
    $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->query("SELECT * FROM app_aset_barang a INNER JOIN app_ruangan b ON a.ruangan_id=b.ruangan_id");
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nama_ruangan;
              $data_ok[2] = $r->kode_barang;
              $data_ok[3] = $r->thun_pembuatan;
              $data_ok[4] = $r->jumlah_barang;
              $data_ok[5] = $r->jumlah_barang;
              $data_ok[6] = $r->jumlah_barang;
              $data_ok[7] = $r->jumlah_barang;
              $data_ok[8] = $r->jumlah_barang;
              $data_ok[9] = $r->jumlah_barang;
              $data_ok[10] = $r->jumlah_barang;
              $data_ok[11] = '<div class="btn-group" style="float:right;">
                              <a href="#modalForm" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs item_edit" data="'.$r->id_aset_brng.'"><i class="fa fa-eye"></i> Edit</a>
                             
                               </div>';
              $data_ok[12] ='<input type="checkbox" name="pilih[]" value="'.$r->id_aset_brng.'">' ;

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