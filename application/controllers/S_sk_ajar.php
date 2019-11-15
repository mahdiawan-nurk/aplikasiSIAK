<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S_sk_ajar extends CI_Controller {

    function __construct(){
    parent::__construct();
    
    $this->load->library('fpdf/fpdf'); // load librari fpdf di folder aplication fpdf
    }
        
    
        
   public function sk(){
        
   
         $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
       $pdf->Ln(15);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'KEPUTUSAN',0,0,'C',0); 
        $pdf->Ln(5);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'DIREKTUR POLITEKNIK KAMPAR',0,0,'C',0); 
         $pdf->Ln(5);
          $pdf->SetFont('Times','',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Nomor : 012/PK.1/KEP/BAAK-AKD/02.2019',0,0,'C',0); 
        $pdf->Ln(7);
       $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'TENTANG',0,0,'C',0); 
        $pdf->Ln(7);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'PEMBAGIAN TUGAS MENGAJAR ',0,0,'C',0); 
         $pdf->Ln(5);
       $pdf->Cell(95);
        $pdf->Cell(5,6,'SEMESTER GENAP TAHUN AKADEMIK 2018/2019 ',0,0,'C',0); 
        $pdf->Ln(5);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'POLITEKNIK KAMPAR',0,0,'C',0); 
         $pdf->Ln(10);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'DIREKTUR POLITEKNIK KAMPAR',0,0,'C',0); 
        $pdf->Ln(15);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(35,6,'Menimbang',1,0);$pdf->Cell(5,6,':',1,0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(5,6,'a.',1,0);
        $pdf->Write(6,'Bahwa perkuliahan merupakan proses belajar mengajar sebagai kegiatan yang utama di Politeknik Kampar;');

        $pdf->Ln();

     $pdf->Output();
   
        
    } 
        
      function sk2(){
        $id=$this->uri->segment(3);
        $akademik=$this->db->get_where('app_sk_mengajar', array('id_dosen' =>$id ))->row();
        $sql=$this->db->get_where('app_thn_akademik', array('id_thnakad' =>$akademik->thn_akademik ))->row();
        $data=$this->db->query("SELECT *,(SELECT nama_dsn FROM tbl_dosen where nrp=a.id_dosen) AS dosen,(SELECT nama_dlb FROM tbl_dosen_lb where id_dosen_lb=a.id_dosen) AS dosen_lb FROM app_dosen_ajar a WHERE a.id_dosen='$id' ")->row();
        if ($data->dosen!='') {
          $text="";
          $d_dsn=$this->db->query("SELECT * FROM tbl_dosen a INNER JOIN tbl_prodi b ON a.prodi_id=b.kode_prodi WHERE a.nrp='$id' ")->row();
        }else if ($data->dosen_lb!='') {
          $text="DOSEN LUAR BIASA";
          $d_dsn=$this->db->query("SELECT * FROM tbl_dosen_lb a  WHERE a.id_dosen_lb='$id' ")->row();
        }
        $pdf = new FPDF('p','mm','A4');

        $pdf->AddPage();
       $pdf->Ln(15);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'KEPUTUSAN',0,0,'C',0); 
        $pdf->Ln(5);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'DIREKTUR POLITEKNIK KAMPAR',0,0,'C',0); 
         $pdf->Ln(5);
          $pdf->SetFont('Times','',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'Nomor : '.$akademik->no_sk,0,0,'C',0); 
        $pdf->Ln(7);
       $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'TENTANG',0,0,'C',0); 
        $pdf->Ln(7);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'PEMBAGIAN TUGAS MENGAJAR '.$text,0,0,'C',0); 
         $pdf->Ln(5);
       $pdf->Cell(95);
        $pdf->Cell(5,6,'SEMESTER '.strtoupper($sql->ta_tipe).' TAHUN AKADEMIK '.$sql->keterangan ,0,0,'C',0); 
        $pdf->Ln(5);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'POLITEKNIK KAMPAR',0,0,'C',0); 
         $pdf->Ln(10);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'DIREKTUR POLITEKNIK KAMPAR',0,0,'C',0); 
        $pdf->Ln(15);

$start_awal=$pdf->GetX(); 
$get_xxx = $pdf->GetX();
$get_yyy = $pdf->GetY();

$width_cell = 40;  
$height_cell = 7;    

$pdf->SetFont('Times','b',12);

$pdf->MultiCell(40,5,'MENIMBANG',0); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);               

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;                           
$pdf->SetXY($get_xxx, $get_yyy);               
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'a. ',0); 
$get_xxx+=7;                           
$pdf->SetXY($get_xxx, $get_yyy);            

$pdf->MultiCell(140,5,'Bahwa perkuliahan merupakan proses belajar mengajar sebagai kegiatan yang utama di Politeknik Kampar;',0);
$get_xxx+=$width_cell;


$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'b. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Dalam rangka pelaksanaan proses belajar mengajar yang baik di Politeknik Kampar, maka Program Studi telah melakukan pembagian tugas kepada para tenaga pengajar sebagai pengampu mata kuliah;',0);
$get_xxx+=$width_cell;

$get_xxx=$start_awal;                      
$get_yyy+=15;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'c. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Bahwa sehubungan dengan butir a dan b diatas, maka perlu ditetapkan dengan Surat Keputusan Direktur Politeknik Kampar',0);
$get_xxx+=$width_cell;

// mengingat

$get_xxx=$start_awal;                      
$get_yyy+=12;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'MENGINGAT',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'1. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Undang- Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional;',0);
$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=5;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'2. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Undang-Undang No.12 tahun 2012 tentang Pendidikan Tinggi;',0);
$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=5;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'3. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Peraturan Pemerintah No. 4 tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Perguruan Tinggi;',0);


$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'4. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Peraturan Pemerintah Republik Indonesia Nomor 66 tahun 2010 Perubahan Atas Peraturan Pemerintah Nomor 17 Tahun 2010 Tentang Pengelolaan Dan Penyelenggaraan Pendidikan;',0);
$get_xxx+=$width_cell;

$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=15;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'5. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Permendikbud Nomor 49 Tahun 2014 tentang Standar Nasional Pendidikan Tinggi;',0);
$get_xxx+=$width_cell;

$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'6. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Keputusan Menteri Pendidikan Nasional Republik Indonesia Nomor 234/U/2000 Tentang Pedoman Pendirian Perguruan Tinggi;',0);
$get_xxx+=$width_cell;

$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'7. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Keputusan Direktorat Jenderal Pendidikan Tinggi Departemen Pendidikan Nasional Nomor: 68/D/O/2008 tentang Pemberian Izin Penyelenggaraan Program-program Studi dan Pendirian Politeknik Kampar; ',0);
$get_xxx+=$width_cell;


$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=15;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'8. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Keputusan Ketua Yayasan Datuk Tabano Nomor: 005/YDT.1/KEP/UM-TU/12.2016 tentang Penunjukan dan Pengangkatan Direktur Politeknik Kampar Periode 2016/2020;',0);
$get_xxx+=$width_cell;

$get_xxx+=$width_cell;
$get_xxx=$start_awal;                      
$get_yyy+=15;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,'',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'9. ',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Keputusan Direktur Politeknik Kampar Nomor : 034/PK.1/KEP/BAA/09.2015 tentang Aturan Akademik Politeknik Kampar.',0);
$get_xxx+=$width_cell;

 $pdf->Ln(30);
 $pdf->Cell(0,6,'Visi : Terwujudnya Politeknik yang Unggul, Inovatif dan Terkemuka Berbasis Teknologi ',0,0,'C',0); 
$pdf->Ln();
 $pdf->Cell(0,6,'Terapan pada Tahun 2032 ',0,0,'C',0); 




 $pdf->AddPage();
 $pdf->Ln(15);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'KEPUTUSAN',0,0,'C',0); 
        $pdf->Ln(5);
$pdf->Ln(5);
$start_awal=$pdf->GetX(); 
$get_xxx = $pdf->GetX();
$get_yyy = $pdf->GetY();

$width_cell = 40;  
$height_cell = 7;    

$pdf->SetFont('Times','b',12);

$pdf->MultiCell(40,5,'MENETAPKAN',0); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);               

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;                           
$pdf->SetXY($get_xxx, $get_yyy);               
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,' ',0); 
$get_xxx+=7;                           
$pdf->SetXY($get_xxx, $get_yyy);            

$pdf->MultiCell(140,5,'',0);
$get_xxx+=$width_cell;

$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'Pertama',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Menugaskan tenaga pengajar Politeknik Kampar untuk mengampu mata kuliah sesuai dengan pembagian tugas mengajar semester '.$sql->ta_tipe.' Tahun Akademik ' .$sql->keterangan. ' sebagai berikut:',0);
$get_xxx+=$width_cell;


        $pdf->Ln(2);
        $pdf->Cell(52);
        $pdf->Cell(35,5,'Nama Dosen',0,0,'l',0);$pdf->Cell(65,5,': '.$d_dsn->nama_dsn.$d_dsn->nama_dlb,0,0,'l',0);
        $pdf->Ln();
        $pdf->Cell(52);
        $pdf->Cell(35,5,'NIDN/ NRP',0,0,'l',0);$pdf->Cell(65,5,': '.$d_dsn->nidn.'/'.$data_dsn->nrp,0,0,'l',0);
        $pdf->Ln();
        $pdf->Cell(52);
        $pdf->Cell(35,5,'Program Studi',0,0,'l',0);$pdf->Cell(65,5,': '.$d_dsn->ket,0,0,'l',0);

$pdf->Ln(10);
  $pdf->Cell(52);
        $pdf->SetFont('Times','B',12);
        $pdf->SetFillColor(255,255,255);
        // $pdf->SetTextColor(255);
        //Header
        $pdf->SetDrawColor(0,0,0);
        $pdf->Cell(55,10,'Matakuliah',1,0,'C',0);
        $pdf->Cell(30,10,'Semester',1,0,'C',0);
         $pdf->Cell(40,5,'SKS',1,0,'C',0);
          $pdf->Cell(1,5,'',0,1);
          $pdf->Cell(137,5,'',0,0);
          $pdf->Cell(20,5,'Teori',1,0,'C',0);
          $pdf->Cell(20,5,'Praktek',1,0,'C',0);
//content

$sql=$this->db->query("SELECT *,(SELECT sks FROM makul_matakuliah where jenis_makul='T' AND kode_makul=a.kode_makul) AS teori,(SELECT sks FROM makul_matakuliah where jenis_makul='P' AND kode_makul=a.kode_makul) AS praktek FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul INNER JOIN tbl_semester c ON b.semester_id=c.id WHERE a.id_dosen='$id' ")->result();
$w=45;
$h=10;
foreach ($sql as $key ) {
 $pdf->Ln();
   $pdf->SetFont('Times','',12);
   $pdf->Cell(52);                   
    $x=$pdf->getx();
    $pdf->myCell(15,$h,$x,$key->nama_makul);
    $x=$pdf->getx();
    $pdf->myCell(30,$h,$x,$key->semester_id);
    if ($key->teori!='') {
      $x=$pdf->getx();
    $pdf->myCell(20,$h,$x,$key->teori);
    }else{
      $x=$pdf->getx();
    $pdf->myCell(20,$h,$x,'0');
    }
    if ($key->praktek!='') {
       $x=$pdf->getx();
     $pdf->myCell(20,$h,$x,$key->praktek);
    }else{
       $x=$pdf->getx();
     $pdf->myCell(20,$h,$x,'0');
    }
   

}
  
          
//footer
$teori=$this->db->query("SELECT SUM(sks) teori FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul WHERE b.jenis_makul='T' AND a.id_dosen='110907026'")->row();
$praktek=$this->db->query("SELECT SUM(sks) praktek FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul WHERE b.jenis_makul='P' AND a.id_dosen='110907026'")->row();
      $pdf->Ln();
  $pdf->SetFont('Times','B',12);
        $pdf->Cell(52);

          $pdf->Cell(85,5,'Jumlah',1,0,'C',0);
           $pdf->Cell(20,5,$teori->teori,1,0,'C',0);
           $pdf->Cell(20,5,$praktek->praktek,1,0,'C',0);


 $pdf->Ln(5);

 $pdf->Ln(5);
 $start_awal=$pdf->GetX(); 
$get_xxx = $pdf->GetX();
$get_yyy = $pdf->GetY();

$width_cell = 40;  
$height_cell = 7;    

$pdf->SetFont('Times','b',12);

$pdf->MultiCell(40,5,'Kedua',0); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);               

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;                           
$pdf->SetXY($get_xxx, $get_yyy);               
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,' ',0); 
$get_xxx+=7;                           
$pdf->SetXY($get_xxx, $get_yyy);            

$pdf->MultiCell(140,5,'Tenaga pengajar tersebut dalam melaksanakan tugasnya bertanggung jawab kepada Direktur.',0);
$get_xxx+=$width_cell;

$get_xxx=$start_awal;                      
$get_yyy+=10;                  

$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','b',12);
$pdf->MultiCell($width_cell,5,'Ketiga',0);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(5,5,':',0); 
$get_xxx+=5;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(7,5,'',0); 
$get_xxx+=7;
$pdf->SetXY($get_xxx, $get_yyy);
$pdf->MultiCell(140,5,'Surat Keputusan ini berlaku sejak mulai ditetapkan dan apabila terdapat kekeliruan dalam penetapannya, akan diadakan perbaikan sebagaimana mestinya.',0);
$get_xxx+=$width_cell;




$pdf->Ln(10);

 $pdf->Ln(2);
        $pdf->Cell(120);
        $pdf->Cell(27,5,'Ditetapkan di : Bangkinang',0,0,'l',0);$pdf->Cell(65,5,'',0,0,'l',0);
        $pdf->Ln();
        $pdf->SetFont('Times','U',12);
        $pdf->Cell(120);
        $pdf->Cell(27,5,'Pada Tanggal : '.substr($akademik->tgl_sk, 0,2).' '.$this->bulan(substr($akademik->tgl_sk, 3,2)).' '.substr($akademik->tgl_sk, 6),0,0,'l',0);
        $pdf->Ln();
         $pdf->SetFont('Times','B',12);
         $pdf->Cell(120);
         $pdf->Cell(27,5,'POLITEKNIK KAMPAR',0,0,'l',0);
        $pdf->Ln(5);
         $pdf->SetFont('Times','B',12);
         $pdf->Cell(120);
         $pdf->Cell(27,5,'DIREKTUR,',0,0,'l',0);
        $pdf->Ln();

$pejabat=$this->db->query("SELECT * FROM app_pejabat_polkam a INNER JOIN tbl_dosen b ON a.id_pejabat=b.nrp where a.jabatan='Direktur'")->row();
$pdf->Ln(20);

 $pdf->Ln(2);
      
        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(120);
        $pdf->Cell(27,5,strtoupper($pejabat->nama_dsn),0,0,'l',0);
        $pdf->Ln();
         $pdf->SetFont('Times','B',12);
         $pdf->Cell(120);
         $pdf->Cell(27,5,'NRP: '.$pejabat->nrp,0,0,'l',0);
        
        $pdf->Ln();

 $pdf->Ln(10);
      
        $pdf->SetFont('Times','U',12);
        
        $pdf->Cell(27,5,'Tembusan disampaikan kepada Yth:',0,0,'l',0);
        $pdf->Ln();
          $pdf->SetFont('Times','',12);
        $pdf->Cell(27,5,'1. Wakil Direktur II Bidang Kepegawaian, Keuangan dan Umum',0,0,'l',0);
        $pdf->Ln();
        $pdf->Cell(27,5,'2. Yang bersangkutan',0,0,'l',0);
        $pdf->Ln();
        $pdf->Cell(27,5,'3. Arsip',0,0,'l',0);
        
        $pdf->Ln();
$pdf->Ln(13);
 $pdf->Cell(0,6,'Visi : Terwujudnya Politeknik yang Unggul, Inovatif dan Terkemuka Berbasis Teknologi ',0,0,'C',0); 
$pdf->Ln();
 $pdf->Cell(0,6,'Terapan pada Tahun 2032 ',0,0,'C',0); 

$pdf->Output();
      }   

      
function bulan($bln){



switch ($bln) {
    case '01':
    return "Januari";
    break;
  
    case '02':
    return "Febuari";
    break;

    case '03':
    return "Maret";
    break;

    case '04':
    return "April";
    break;

    case '05':
    return "Mei";
    break;

    case '06':
    return "Juni";
    break;

    case '07':
    return "Juli";
    break;

    case '08':
    return "Agustus";
    break;

    case '09':
    return "September";
    break;

    case '10':
    return "Oktober";
    break;

    case '11':
    return "November";
    break;

    case '12':
    return "Desember";
    break;
  
}

}


}
