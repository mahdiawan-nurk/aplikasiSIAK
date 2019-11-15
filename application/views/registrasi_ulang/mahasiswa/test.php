

<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/comingsoon/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/comingsoon/css/main.css">
<!--===============================================================================================-->

	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('../assets/comingsoon/images/bg01.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('../assets/comingsoon/images/bg02.jpg');"></div>
	</div>

	<div class="flex-col-c-sb size1 overlay1">
		<!--  -->
		
<input type="text" name="" id="mulai" value="<?php echo $data->tgl_mulai_daftar;  ?>">
<input type="text" name="" id="selesai" value="<?php echo $data->tgl_selesaip;  ?>">
<input type="text" name="" id="statuse" value="<?php echo $data->statuse; ?>">
<input type="text" name="" id="skrang" value="<?php echo date('Y-m-d H:i:s'); ?>">
		<!--  -->
		<div class="flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
			<h3 class="l1-txt1 txt-center p-b-40 respon1">
				Coming Soon
			</h3>

			<div class="flex-w flex-c-m cd100">
				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 days">00</span>
					<span class="s1-txt1 where1 p-l-35">Days</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 hours">17</span>
					<span class="s1-txt1 where1 p-l-35">Hours</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 minutes">50</span>
					<span class="s1-txt1 where1 p-l-35">Minutes</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 seconds">39</span>
					<span class="s1-txt1 where1 p-l-35">Seconds</span>
				</div>
			</div>
		</div>

	
	</div>


	

<!--===============================================================================================-->	
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
	  var skrang=$('#skrang').val();
	  var now=$('#statuse').val();
        if (mulai > skrang) {
        		$('.cd100').countdown100({
			
			endtimeYear: mulai.substr(0,4),
			endtimeMonth: mulai.substr(5,2),
			endtimeDate: mulai.substr(8,2),	
			endtimeHours: mulai.substr(10,3),
			endtimeMinutes: mulai.substr(14,2),
			endtimeSeconds: mulai.substr(17,2),
			timeZone: "Asia/Jakarta" 
		
		}); 
	
        }else  {
        	
        
window.open("<?php echo site_url()?>registrasi/mulai_regist","_self");
        }   



		
}
		setInterval(function(){ 
  load();; 
  }, 1000);
	</script>


