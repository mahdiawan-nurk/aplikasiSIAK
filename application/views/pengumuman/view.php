
<!DOCTYPE > 
<html> <head> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<title>Halaman Print A4</title>
	 </head> <style type="text/css"> /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */ body { 
	width: 100%; 
	height: 100%; 
	margin: 0; 
	padding: 0; 
	background-color: #FAFAFA; 
	font: 12pt "Tahoma"; 
} 
	* { box-sizing: 
		border-box; 
		-moz-box-sizing: border-box; 
	} 
	.table-bordered {
  border-collapse: collapse;
  width: 100%;
  border:  1px #000;
  margin-bottom: 20px;
}
.huruf{
	/*font-size: 100%;*/
font-family: Times New Roman,Arial;
text-align: justify;
}
.page {
 width: 210mm;
  min-height: 297mm;
   padding: 20mm; 
   margin: 10mm auto; 
   border: 1px #D3D3D3 solid;
    border-radius: 5px; 
    background: white; 
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
} 
.subpage { padding: 1cm; 
	border: 1px black solid; 
	height: 257mm; outline: 2cm white solid;
	 } 
@page { size: A4; margin: 0; } 
@media print { html, body { width: 210mm; height: 297mm; } 
.page { margin: 0; border: initial; border-radius: initial; width: initial; min-height: initial; box-shadow: initial; background: initial; page-break-after: always; } } 
</style> 
<body>
 <div class="book"> 
 	
 	
 	<div class="page"> 
 		<div class="subpage"> 
 			
<img src="<?php echo base_url('assets/img/header.png'); ?>" width="100%">
<center><h2  style="text-decoration: underline;" >PENGUMUMAN</h2><label style="font-size: 75%;font-family: Times New Roman,Arial;" >NO : <?php echo $data->no_srt; ?></label> </center>
<br>


<!-- <span ><p class="huruf">&emsp;&emsp;Diberitahukan Kepada seluruh Mahasiswa Politeknik Kampar untuk registrasi ulang semester Ganjil akan dimulai pada tanggal <b> <?php echo date('d-m-Y',strtotime($data->tgl_mulai_daftar));?> </b> Sampai dengan tanggal <b><?php echo date('d-m-Y',strtotime($data->tgl_selesaip));?> </b>.Silahkan lakukan Pengajuan Registrasi di Menu registrasi.</p></span> -->
<span class="huruf"><?php echo $data->isi; ?></span>
<span><p class="huruf">&emsp;&emsp;Demikian Pengumuman ini disampaikan Atas perhatian dan kerjasamanya kami Ucapkan terima kasih.</p></span> 


	<div style="float: right;">
	<span>Bangkinang </span>	
	</div>

 			</div> 
 	</div> 
 	
	<!-- <div class="page"> 
		<div class="subpage">Page 2/2</div> 
</div>  -->
</div> 
</body> 
</html> 


