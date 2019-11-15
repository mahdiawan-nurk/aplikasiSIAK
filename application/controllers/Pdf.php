<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

 	function __construct(){
	parent::__construct();
	
	$this->load->library('fpdf/fpdf'); // load librari fpdf di folder aplication fpdf
	}
	



	public function laporan(){
            $prodi=$this->session->userdata('prodi');
   
     
           $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
       $pdf->Ln();
     
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(95);
        $pdf->Cell(5,6,'DISTRIBUSI BEBAN MENGAJAR TEKNIK INFORMATIKA',0,0,'C',0); 
          $pdf->Ln();
        $pdf->Cell(95);
        $pdf->Cell(5,6,'SEMESTER GENAP T.A 2018/2019',0,0,'C',0); 
         $pdf->Ln();
        $pdf->Cell(95);
        $pdf->Cell(5,6,'POLITEKNIK KAMPAR',0,0,'C',0); 
          $pdf->Ln(10);
    $pdf->Ln(5);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->Cell(1);
       $pdf->Cell(50,6,'Nama Dosen',1,0,'C',0); 
       $pdf->Cell(75,6,'Mata Kuliah',1,0,'C',0); 
       $pdf->Cell(20,6,'Semester',1,0,'C',0); 
       $pdf->Cell(10,6,'SKS',1,0,'C',0); 
       $pdf->Cell(15,6,'Teori',1,0,'C',0); 
       $pdf->Cell(15,6,'Praktek',1,0,'C',0);
        
       // $aml=$this->db->query("SELECT * FROM app_dosen_ajar where prodi_id='13'")->result();
       $aml=$this->db->query("SELECT * FROM app_dosen_ajar where prodi_id='13' GROUP BY id_dosen ")->result();
       
     
       foreach ($aml as $j ) {
        $sql=$this->db->get_where('app_dosen_ajar',array('id_dosen' =>$j->id_dosen ))->num_rows();
       $dosen=$this->db->get_where('tbl_dosen',array('nrp' =>$j->id_dosen ))->result();
      $aml1=$this->db->query("SELECT * FROM app_dosen_ajar where prodi_id='13' AND id_dosen='".$j->id_dosen."'")->result();
       foreach ($aml1 as $k) {
          $mk=$this->db->query("SELECT * FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul WHERE a.id_dosen='$j->id_dosen'")->result();
          $mkk = array();
          $mkk1 = array();
          $mkk2 = array();
          $mkk3 = array();
          $mkk4 = array();
          foreach ($mk as $jk) {
            $mkk[]=$jk->nama_makul;
            $mkk1[]=$jk->semester_id;
            $mkk2[]=$jk->sks;
           if ($jk->jenis_makul=="T") {
            $mkk3=$jk->sks;
           }else{
            $mkk4=$jk->sks;
           }
            $mk1=$mkk;
            $mk2=$mkk1;
            $mk3=$mkk2;
            $mk4=$mkk3;
            $mk5=$mkk4;

          }
       }
        foreach ($dosen as $key) {
           $pdf->Ln(6);
        $pdf->Cell(1); 
         $pdf->Cell(50,$sql*5,$key->nama_dsn,1,0,'L',0); 
       for ($i=0; $i <$sql ; $i++) { 
          $pdf->Cell(75,5,$mk1[$i],1,0,'L',0); 
       $pdf->Cell(20,5,$mk2[$i],1,0,'C',0); 
       $pdf->Cell(10,5,$mk3[$i],1,0,'C',0); 
       $pdf->Cell(15,5,$mk4[$i],1,0,'C',0); 
       $pdf->Cell(15,5,$mk5[$i],1,0,'C',0);
         $pdf->Ln(5);
        $pdf->Cell(51);
       }
          
      
        }
       }
       
         

     $pdf->Output();
   
        
    } 

}
