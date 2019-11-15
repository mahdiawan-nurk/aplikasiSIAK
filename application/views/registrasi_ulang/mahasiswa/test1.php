<style type="text/css">
	.etc
		 { text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
		 overflow: show;
		 background:transparent;
		 color: rgb(252,150,65); }
	
</style>
<input type="hidden" name="mulai" id="mulai" value="<?php echo $data->tgl_mulai_daftar;  ?>">
<input type="hidden" name="selesai" value="<?php echo $data->tgl_selesaip; ?>" id="selesai">
<input type="hidden" name="sekarang" value="<?php echo date('Y-m-d H:i:s')?>" id="sekarang" >
<div class="col-md-12 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
													
													</div>
													<div class="widget-summary-col" >
														<center><h1 style="text-transform: uppercase;">daftar ulang akan di mulai dalam</h1></center>
														<div style="
    font-size: xx-large;
    text-transform: uppercase;
    text-align: center;
    padding: 20px 0;
    font-weight: bold;
    border-radius: 5px;
    line-height: 1.8em;
    font-family: Arial, sans-serif;" class="responsive " >
														
														<div class="flex-w flex-c-m cd100">
				<div class="col-md-3">
															<h1 style="font-size: 5em;" class="etc"><span id="hari" class="days" >00</span></h1>
															<span>hari</span>
														</div>
														<div class="col-md-3">
															<h1 style="font-size: 5em;" class="etc"><span id="jam" class="hours" >00</span></h1>
															<span>jam</span>
														</div>
														<div class="col-md-3">
															<h1 style="font-size: 5em;" class="etc"><span id="menit" class="minutes" >00</span></h1>
															<span>menit</span>
														</div>
														<div class="col-md-3">
															<h1 style="font-size: 5em;" class="etc"><span id="detik" class="seconds" >00</span></h1>
															<span>detik</span>
														</div>
			</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>

<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/countdowntime/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?php echo base_url();?>assets/comingsoon/vendor/countdowntime/countdowntime.js"></script>
<script>
		load();
		

function load(){
	  var mulai=$('#mulai').val();
	  var selesai=$('#selesai').val();
	  var skrang=$('#sekarang').val();
	  var waktu;

        if (skrang< mulai) {
        		waktu=$('.cd100').countdown100({
			
			endtimeYear: mulai.substr(0,4),
			endtimeMonth: mulai.substr(5,2),
			endtimeDate: mulai.substr(8,2),	
			endtimeHours: mulai.substr(10,3),
			endtimeMinutes: mulai.substr(14,2),
			endtimeSeconds: mulai.substr(17,2),
			timeZone: "Asia/Jakarta" 
		
		}); 

	
        }
else  {
        	
        
window.open("<?php echo site_url()?>registrasi/mulai_regist","_self");
        }   



		
}
		setInterval(function(){ 
  load();; 
  }, 1000);
	</script>


