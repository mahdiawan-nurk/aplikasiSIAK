<?php
/**
 * 
 */
class Data_peminjaman extends CI_Controller
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

function index(){
    $this->cek_aktif();
  
      $sa['title']="Data Peminjaman";
      $sa['p']="asset/data_peminjam";
       $this->cek_akses($sa); 
}

public function table_peminjam($value='')
{
   $prodi=$this->session->userdata('prodi');
   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $this->db->select('*');
      $this->db->from('app_data_peminjam');
      $this->db->join('tbl_mahasiswa','app_data_peminjam.nim=tbl_mahasiswa.nim');
      $this->db->join('tbl_dosen','app_data_peminjam.dosen_pemb=tbl_dosen.nrp');
      $this->db->join('makul_matakuliah','app_data_peminjam.kegiatan=makul_matakuliah.makul_id');
      $this->db->where('app_data_peminjam.prodi_id',$prodi);
      $query = $this->db->get();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->nim;
              $data_ok[2] = $r->nama_mhs;
              $data_ok[3] = $r->institusi;
              $data_ok[4] = $r->nama_makul;
              $data_ok[5] = $r->nama_dsn;
              $data_ok[6] = $r->hp;
              $data_ok[7] = date('d F Y',strtotime($r->tgl_peminjaman));
             
              $data_ok[8] = date('d F Y',strtotime($r->tgl_pengembalian));
              $data_ok[9] = '<div class="btn-group" style="float:right;">
                              <a href="#modalLG" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs cek_barang" data="'.$r->id_peminjam.'"><i class="fa fa-pencil"></i> Cek Barang</a>
                              
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

public function tbl_data_peminjam($value='')
{
  $prodi=$this->session->userdata('prodi');
  $id=$this->input->get('id_peminjam');
   $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $this->db->select('*');
      $this->db->from('app_peminjaman_barang');
      $this->db->join('app_aset_prodi','app_peminjaman_barang.kode_barang=app_aset_prodi.kode_barang');
      $this->db->where('app_peminjaman_barang.id_peminjam',$id);
      $query = $this->db->get();
      $data = array();

      $no=1;
      foreach($query->result() as $r) {
           $data_ok = array();
              $data_ok[0] = $no++;
              $data_ok[1] = $r->kode_barang;
              $data_ok[2] = $r->nama_barang.$id;
              $data_ok[3] = $r->jumlah;
              $data_ok[4] = $r->kondisi_awal;
         
              if ($r->kondisi_akhir=='') {
                     $data_ok[5] =$this->kondisi();
              }else{
                $data_ok[5] = $r->kondisi_akhir;
              }

              if ($r->tgl_kembali=='0000-00-00') {
                $data_ok[6] = '<input type="date" class="form-control" name="tgl_kembali[]" required>';
              }else{
                 $data_ok[6] = date('d F Y',strtotime($r->tgl_kembali));
              }

              if ($r->kondisi_akhir=='') {
                     $data_ok[7] = '<input type="checkbox" name="cek[]" value="'.$r->id_brg_pinjam.'">';
              }else{
                 $data_ok[7] = '<span class="label label-success">
                        <i class="fa fa-check"></i>
                      Dikembalikan &nbsp;
                      </span>';
              }
             
             
              
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

public function save_pengembalian($value='')
{
  $id=$this->input->post('cek');
  $tgl=$this->input->post('tgl_kembali');
  $kondisi=$this->input->post('kon');
  for ($i=0; $i < count($id); $i++) { 
    $this->db->where('id_brg_pinjam',$id[$i]);
    $this->db->update('app_peminjaman_barang',array('kondisi_akhir' =>$kondisi[$i] ,'tgl_kembali'=>$tgl[$i] ));
  }
  echo "Data Berhasil Di Update";
}

public function kondisi()
{
  $value = array('B','KB','R');
  $data = array('Baik','Kurang Baik','Rusak' );
 $html='';
  $html=$html.'<select name="kon[]" id="company" class="form-control" required>';
  $html=$html.'<option>Pilih Kondisi</option>';
  for ($i=0; $i < count($value); $i++) { 
    $html=$html.'<option value="'.$value[$i].'">'.$data[$i].'</option>';
  }
  $html=$html.'</select>';
  return $html;
}

}