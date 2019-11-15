<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_absen extends CI_Controller {

    function __construct(){
    parent::__construct();
    
    $this->load->library('fpdf/fpdf'); // load librari fpdf di folder aplication fpdf
    }
        
    public function index()
    {
      $pdf = new FPDF('l','mm','A4');
        $pdf->AddPage();
       $pdf->Ln();
        $pdf->SetFont('Times','B',12);
         $pdf->Cell(5);
        $pdf->SetFont('Times','B',12);
        $pdf->SetFillColor(255,255,255);
        // $pdf->SetTextColor(255);
        //Header
        $pdf->SetDrawColor(0,0,0);
        $pdf->Cell(55,20,'',1,0,'C',0);
         $pdf->Cell(165,10,'POLITEKNIK KAMPAR',1,0,'C',0);
          $pdf->SetFont('Times','',12);
         $pdf->Cell(50,5,'Nomor',1,0,'L',0);
         $pdf->Cell(1,5,'',0,1);
         $pdf->Cell(230,5,'',0,0);
          $pdf->Cell(50,5,'Tanggal',1,0,'L',0);
          $pdf->Cell(1,5,'',0,1);
          $pdf->Cell(60,5,'',0,0);
          $pdf->SetFont('Times','B',12);
         $pdf->Cell(165,10,'FORM MUTU',1,0,'C',0);
         $pdf->SetFont('Times','',12);
         $pdf->Cell(50,5,'Revisi',1,0,'L',0);
          $pdf->Cell(1,5,'',0,1);
         $pdf->Cell(240,5,'',0,0);
          $pdf->Cell(50,5,'Halaman',1,0,'L',0);
          $pdf->Output();

    }
        
  

      


}


