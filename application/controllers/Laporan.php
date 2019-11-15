<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

 	function __construct(){
	parent::__construct();
	
	$this->load->library('fpdf/fpdf'); // load librari fpdf di folder aplication fpdf
	}
	


 public function url(){
        $url=$this->uri->segment(3);  
         $semester=$this->uri->segment(4);  
         if ($url=="all_terdaftar") {
           $this->laporan1();
         }
    
        
        
    } 
        
   public function laporan1(){
        
   
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Image(base_url().'assets/img/header.png',20.0);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'PENGUMUMAN',0,0,'C',0); 
        $pdf->Ln(20);
       
        
   
    
        
        
        return $pdf->Output();
        
    } 
		
         

public function cetak_all(){
    $semester=$this->uri->segment(3);
    $thn=$this->db->query("SELECT * FROM tbl_reg_before a INNER JOIN app_thn_akademik b ON a.thun_akademik=b.thun_akademik WHERE a.semester='$semester' ")->row();
         $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetTitle('Semester');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Image(base_url().'assets/img/header.png',5,8,200);
        $pdf->Ln(40);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Laporan Pengajuan Registrasi Semester '.$thn->ta_tipe,0,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(0,6,'T.A  '.$thn->keterangan,0,0,'C',0); 
        $pdf->Ln(10);
         $d_sems=$this->db->get_where('tbl_semester', array('id' =>$semester ))->row();
         $pdf->SetFont('Arial','',10);
        $pdf->Ln();
        $pdf->Cell(35,5,'Semester',0,0,'r',0);$pdf->Cell(65,5,': '.$thn->thun_akademik.'/'.$thn->ta_tipe,0,0,'l',0);
        $pdf->Ln(5);
        $pdf->Cell(35,5,'Tahun Akademik',0,0,'l',0);$pdf->Cell(65,5,': '.$thn->keterangan,0,0,'l',0);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header = array('No', 'NIM', 'Nama Mahasiswa','Prodi', 'Status');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(8, 35, 70,25, 55);

        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $sql=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim!=a.nim AND semester='$semester') ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql->result() as $key) {
          $no++;
       
         $pdf->Cell($w[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($w[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($w[3],6,$key->prodi,'LR',0,'L',$fill);
         if ($key->ada ==0) { 
        $pdf->SetTextColor(255,70);
        $pdf->Cell($w[4],6,'belum Mengajukan','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header1 = array('No', 'NIM', 'Nama Mahasiswa','Prodi','Tanggal Pengajuan', 'Status');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $c = array(8, 25, 60,25,35, 40);

        for($i=0;$i<count($header1);$i++)
        $pdf->Cell($c[$i],7,$header1[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
     $sql2=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS ada, (SELECT tgl_pengajuan FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS tgl_pengajuan FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql2->result() as $key) {
          $no++;
       
         $pdf->Cell($c[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($c[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($c[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($c[3],6,$key->prodi,'LR',0,'L',$fill);
          $pdf->Cell($c[4],6,date('d-m-Y',strtotime($key->tgl_pengajuan)),'LR',0,'L',$fill);
         if ($key->ada ==1) { 
        $pdf->SetTextColor(70,255);
        $pdf->Cell($c[5],6,'Telah Mengajukan','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    
        
        $pdf->Output();
   
        
        
    } 

    public function cetak_by_prodi(){
         $prodi=$this->uri->segment(3);
          $semester=$this->uri->segment(4);
           $thn=$this->db->query("SELECT * FROM tbl_reg_before a INNER JOIN app_thn_akademik b ON a.thun_akademik=b.thun_akademik WHERE a.semester='$semester' ")->row();
         $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
       $pdf->Image(base_url().'assets/img/header.png',5,8,200);
        $pdf->Ln(45);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Laporan Pengajuan Registrasi Semester '.$thn->ta_tipe,0,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(0,6,'T.A  '.$thn->keterangan,0,0,'C',0);  
        $pdf->Ln(10);
        $d_prodi=$this->db->get_where('tbl_prodi', array('kode_prodi' =>$prodi ))->row();
        $d_sems=$this->db->get_where('tbl_semester', array('id' =>$semester ))->row();
         $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,5,'Prog. Studi',0,0,'l',0);$pdf->Cell(65,5,': '.$d_prodi->jenjang.' -'.$d_prodi->ket,0,0,'l',0);
        $pdf->Ln();
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header = array('No', 'NIM', 'Nama Mahasiswa','Prodi', 'Status');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(8, 35, 70,25, 55);

        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $sql=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim!=a.nim AND semester='$semester') AND a.prodi_id='$prodi' ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql->result() as $key) {
          $no++;
       
         $pdf->Cell($w[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($w[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($w[3],6,$key->prodi,'LR',0,'L',$fill);
         if ($key->ada ==0) { 
        $pdf->SetTextColor(255,70);
        $pdf->Cell($w[4],6,'belum Mengajukan','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header1 = array('No', 'NIM', 'Nama Mahasiswa','Prodi','Tanggal Pengajuan', 'Status');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $c = array(8, 25, 60,25,35, 40);

        for($i=0;$i<count($header1);$i++)
        $pdf->Cell($c[$i],7,$header1[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
     $sql2=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS ada, (SELECT tgl_pengajuan FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AS tgl_pengajuan FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_before WHERE nim=a.nim AND semester='$semester') AND a.prodi_id='$prodi' ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql2->result() as $key) {
          $no++;
       
         $pdf->Cell($c[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($c[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($c[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($c[3],6,$key->prodi,'LR',0,'L',$fill);
          $pdf->Cell($c[4],6,date('d-m-Y',strtotime($key->tgl_pengajuan)),'LR',0,'L',$fill);
         if ($key->ada ==1) { 
        $pdf->SetTextColor(70,255);
        $pdf->Cell($c[5],6,'Telah Mengajukan','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    
        
        $pdf->Output();
   
        
        
    } 


 public function cetak_all_terdaftar(){
        
   
        $semester=$this->uri->segment(3);
    $thn=$this->db->query("SELECT * FROM tbl_reg_before a INNER JOIN app_thn_akademik b ON a.thun_akademik=b.thun_akademik WHERE a.semester='$semester' ")->row();
         $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetTitle('Semester');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Image(base_url().'assets/img/header.png',5,8,200);
        $pdf->Ln(40);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Laporan Pendaftaran Registrasi Semester '.$thn->ta_tipe,0,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(0,6,'T.A  '.$thn->keterangan,0,0,'C',0); 
        $pdf->Ln(10);
         $d_sems=$this->db->get_where('tbl_semester', array('id' =>$semester ))->row();
         $pdf->SetFont('Arial','',10);
        $pdf->Ln();
        $pdf->Cell(35,5,'Semester',0,0,'r',0);$pdf->Cell(65,5,': '.$thn->thun_akademik.'/'.$thn->ta_tipe,0,0,'l',0);
        $pdf->Ln(5);
        $pdf->Cell(35,5,'Tahun Akademik',0,0,'l',0);$pdf->Cell(65,5,': '.$thn->keterangan,0,0,'l',0);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header = array('No', 'NIM', 'Nama Mahasiswa','Prodi', 'Status Pendaftaran');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(8, 35, 70,25, 55);

        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $sql=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim!=a.nim AND semester_sebelum='$semester') ORDER BY a.nim ASC  ");
         $no=0;
       foreach ($sql->result() as $key) {
          $no++;
       
         $pdf->Cell($w[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($w[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($w[3],6,$key->prodi,'LR',0,'L',$fill);
         if ($key->ada ==0) { 
        $pdf->SetTextColor(255,70);
        $pdf->Cell($w[4],6,'belum Terdaftar','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header1 = array('No', 'NIM', 'Nama Mahasiswa','Prodi','Semester Aktif','Tanggal Terdaftar', 'Status Mahasiswa');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $c = array(8, 25, 50,15,35, 30,30);

        for($i=0;$i<count($header1);$i++)
        $pdf->Cell($c[$i],7,$header1[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
     $sql2=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS ada, (SELECT tgl_terdaftar FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS tgl_terdaftar, (SELECT bb.nama FROM tbl_reg_selesai aa INNER JOIN tbl_semester bb ON aa.semester_aktif=bb.id WHERE nim=a.nim AND semester_sebelum='1') AS semester_aktif, (SELECT status FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS status FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql2->result() as $key) {
          $no++;
       
         $pdf->Cell($c[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($c[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($c[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($c[3],6,$key->prodi,'LR',0,'L',$fill);
         $pdf->Cell($c[4],6,$key->semester_aktif,'LR',0,'L',$fill);
          $pdf->Cell($c[5],6,date('d-m-Y',strtotime($key->tgl_terdaftar)),'LR',0,'L',$fill);
         if ($key->ada ==1) { 
        $pdf->SetTextColor(70,255);
        $pdf->Cell($c[6],6,$key->status.' - Terdaftar','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    
        
        $pdf->Output();
        
    } 
    

     public function cetak_by_prodi_terdaftar(){
         $prodi=$this->uri->segment(3);
          $semester=$this->uri->segment(4);
           $thn=$this->db->query("SELECT * FROM tbl_reg_before a INNER JOIN app_thn_akademik b ON a.thun_akademik=b.thun_akademik WHERE a.semester='$semester' ")->row();
         $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
       $pdf->Image(base_url().'assets/img/header.png',5,8,200);
        $pdf->Ln(45);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Laporan Pendaftaran Registrasi Semester '.$thn->ta_tipe,0,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(0,6,'T.A  '.$thn->keterangan,0,0,'C',0);  
        $pdf->Ln(10);
        $d_prodi=$this->db->get_where('tbl_prodi', array('kode_prodi' =>$prodi ))->row();
        $d_sems=$this->db->get_where('tbl_semester', array('id' =>$semester ))->row();
         $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,5,'Prog. Studi',0,0,'l',0);$pdf->Cell(65,5,': '.$d_prodi->jenjang.' -'.$d_prodi->ket,0,0,'l',0);
        $pdf->Ln();
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
         $header = array('No', 'NIM', 'Nama Mahasiswa','Prodi', 'Status Pendaftaran');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(8, 35, 70,25, 55);

        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $sql=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='$semester') AS ada FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim!=a.nim AND semester_sebelum='$semester') and a.prodi_id='$prodi' ORDER BY a.nim ASC  ");
         $no=0;
       foreach ($sql->result() as $key) {
          $no++;
       
         $pdf->Cell($w[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($w[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($w[3],6,$key->prodi,'LR',0,'L',$fill);
         if ($key->ada ==0) { 
        $pdf->SetTextColor(255,70);
        $pdf->Cell($w[4],6,'Belum Terdaftar','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,25,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
       $header1 = array('No', 'NIM', 'Nama Mahasiswa','Semester Aktif','Tanggal Terdaftar', 'Status Mahasiswa');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $c = array(8, 25, 55,35, 35,35);

        for($i=0;$i<count($header1);$i++)
        $pdf->Cell($c[$i],7,$header1[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
     $sql2=$this->db->query("SELECT a.nim,a.nama_mhs,b.nama_prodi prodi, (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS ada, (SELECT tgl_terdaftar FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS tgl_terdaftar, (SELECT bb.nama FROM tbl_reg_selesai aa INNER JOIN tbl_semester bb ON aa.semester_aktif=bb.id WHERE nim=a.nim AND semester_sebelum='1') AS semester_aktif, (SELECT status FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AS status FROM tbl_mahasiswa a INNER JOIN tbl_prodi b ON a.prodi_id = b.kode_prodi WHERE (SELECT COUNT(nim) FROM tbl_reg_selesai WHERE nim=a.nim AND semester_sebelum='1') AND a.prodi_id='$prodi' ORDER BY a.nim ASC ");
         $no=0;
       foreach ($sql2->result() as $key) {
          $no++;
       
         $pdf->Cell($c[0],6,$no,'LR',0,'C',$fill); 
        $pdf->Cell($c[1],6,$key->nim,'LR',0,'C',$fill);
        $pdf->Cell($c[2],6,$key->nama_mhs,'LR',0,'L',$fill);
         $pdf->Cell($c[3],6,$key->semester_aktif,'LR',0,'L',$fill);
          $pdf->Cell($c[4],6,date('d-m-Y',strtotime($key->tgl_pengajuan)),'LR',0,'L',$fill);
         if ($key->ada ==1) { 
        $pdf->SetTextColor(70,255);
        $pdf->Cell($c[5],6,$key->status.' - Terdaftar','LR',0,'L',$fill); 
        $pdf->SetTextColor(0);
        }
        
       
        $pdf->Ln();
        $fill = !$fill;
      
       }
        

    $pdf->Cell(array_sum($w),0,'','T');
    
        
        $pdf->Output();
   
        
        
    }      

   
}
