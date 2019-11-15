 <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/vegas.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/templatemo-style.css">

     <div id="look">
        <div class="overlay"></div>
          
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="home-info">
                              <h1>Registrasi Ulang Akan di Mulai Dalam</h1>
                       
                              <ul class="countdown">
                                   <li>
                                        <span class="days"></span>
                                        <h3>Days</h3>
                                   </li>
                                   <li>
                                        <span class="hours">10</span>
                                        <h3>hours</h3>
                                   </li>
                                   <li>
                                        <span class="minutes">15</span>
                                        <h3>minutes</h3>
                                   </li>
                                   <li>
                                        <span class="seconds">34</span>
                                        <h3>seconds</h3>
                                   </li>     
                              </ul>
                              
                         </div>
            

               </div>
          </div>
</div>

     <!-- SCRIPTS -->
     <script src="<?php echo base_url();?>assets/coundown/js/jquery.js"></script>
     <script src="<?php echo base_url();?>assets/coundown/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url();?>assets/coundown/js/vegas.min.js"></script>
     <script src="<?php echo base_url();?>assets/coundown/js/countdown.js"></script>
     <script src="<?php echo base_url();?>assets/coundown/js/init.js"></script>
     <script src="<?php echo base_url();?>assets/coundown/js/custom.js"></script>


<div class="row col-md-12 ini_bodi" id="tmpor"> 
  <div class="panel panel-info">
    <div class="panel-heading">Konfirmasi Data</div>

    <div class="panel-body">
      <input type="hidden" name="_tgl_sekarang" id="_tgl_sekarang" value="<?php echo date('Y-m-d H:i:s'); ?>">
      <input type="text" name="_semester" id="_semester" value="<?php echo $data_mhs->semester_id;  ?>">
      <input type="hidden" name="_tgl_mulai" id="_tgl_mulai" value="<?php echo $data->tgl_mulai_daftar;  ?>">
      <input type="hidden" name="_terlambat" id="_terlambat" value="<?php echo $data->tgl_selesaip; ?>">
      <input type="hidden" name="_statuse" id="_statuse" value="<?php echo $data->statuse; ?>">
      <input type="text" name="_thun_akademik" id="_thun_akademik" value="<?php echo $data->thn_akademik; ?>">
      <div class="col-md-7">
        <div class="panel panel-default">
          <div class="panel-body">
            <form>
            <table class="table table-bordered">
              <tr><td width="35%">NIM</td><td width="65%"><label id="nim"><?php echo $data_mhs->nim; ?></label></td></tr>
              <tr><td width="35%">Nama</td><td width="65%"><?php echo $data_mhs->nama_mhs; ?></td></tr>
              <tr><td>Program Studi</td><td><?php echo $data_mhs->prodi; ?></td></tr>
              <tr><td>Semester</td><td><?php echo $data_mhs->semester; ?></td></tr>
             <tr><td>Tahun Akadmik</td><td><?php echo $data->thn_akademik; ?></td></tr>
             <tr><td>IPK</td><td><input type="text" name="ipk" disabled=""></td></tr>
             <tr><td>Status</td><td><input type="text" name="status  " disabled=""></td></tr>

            </table></form>
             <?php echo cek_btn($data_mhs->nim,$data_mhs->semester_id,$data->thn_akademik); ?>
           
          </div>
         
          <!-- <button class="btn btn-success btn-lg" onclick="cek_status()">Cek Status</button> -->
        </div>
      </div>
      
     <div class="col-md-5">
        <div class="panel panel-default" >
          <div class="panel-body">
            <div class="alert alert-info" id="test">
              
            </div>

           <!-- <div id="btn_mulai">Daftar Ulang akan mulai dalam <div id="akan_mulai1"></div></div>  -->
            
            <div  id="waktu_ akan_mulai1" class="alert alert-danger" style="
    font-size: xx-large;
    text-transform: uppercase;
    text-align: center;
    padding: 20px 0;
    font-weight: bold;
    border-radius: 5px;
    line-height: 1.8em;
    font-family: Arial, sans-serif;">

    
              
              <span id="waktu_akhir_ujian1" style=""></span>
            </div>
              
           
            
            <div id="waktu_game_over" class="alert alert-info" style="
    font-size: xx-large;
    text-transform: uppercase;
    text-align: center;
    padding: 20px 0;
    font-weight: bold;
    border-radius: 5px;
    line-height: 1.8em;
    font-family: Arial, sans-serif;"></div>

            <!--
            <a href="#" class="btn btn-success btn-lg" id="tbl_mulai" onclick="return konfirmasi_token(<?php echo $du['id']; ?>)"><i class="fa fa-check-circle"></i> MULAI</a>
            <div class="btn btn-danger" id="ujian_selesai">UJIAN TELAH SELESAI</div>
            -->
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/dist/jquery.countdown.js"></script>

<script type="text/javascript">
 var tgl_mulai = $("#_tgl_mulai").val();
  $("#akan_mulai1").countdown(tgl_mulai, function(event) {
    $(this).text(event.strftime('%D days %H:%M:%S')
    );
  });

</script>
<script type="text/javascript">
  cek_time();
function cek_time(){
  var tgl_terlambat = $("#_terlambat").val();
var tgl_mulai = $("#_tgl_mulai").val();
var statuse = $("#_statuse").val();
if (statuse == 1) {
  $('#tmpor').show();
  $('#look').hide();
  $("#waktu_akhir_ujian1").countdown(tgl_terlambat, function(event) {
    $("#test").html('Waktu Regristrasi tinggal');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu Telah Di mulai..!\');">Silahkan Mendaftar Ulang</a>');
    $(this).text(event.strftime('%D Hari %H:%M:%S'));
    
  });
}else if(statuse == 0){
  $(".days").countdown(tgl_mulai, function(event) {
    $("#test").html('Waktu Regristrasi akan Di mulai Dalam');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu belum Di mulai..!\');">Harap Menunggu</a>');
    $(this).text(event.strftime('%D'));
    
  });
$('#tmpor').hide();
  $(".hours").countdown(tgl_mulai, function(event) {
    $("#test").html('Waktu Regristrasi akan Di mulai Dalam');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu belum Di mulai..!\');">Harap Menunggu</a>');
    $(this).text(event.strftime(' %H'));
    
  });
  $(".minutes").countdown(tgl_mulai, function(event) {
    $("#test").html('Waktu Regristrasi akan Di mulai Dalam');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu belum Di mulai..!\');">Harap Menunggu</a>');
    $(this).text(event.strftime(' %M'));
    
  });
  $(".seconds").countdown(tgl_mulai, function(event) {
    $("#test").html('Waktu Regristrasi akan Di mulai Dalam');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu belum Di mulai..!\');">Harap Menunggu</a>');
    $(this).text(event.strftime(' %S'));
    
  });
}
}

  
function cek_status($semester) {
   
    window.open("<?php echo site_url()?>registrasi/cek_status/"+$semester,"_self");

}
setInterval(function(){ 
    cek_time();; 
  }, 5000);
  $(document).ready(function() {

$('#btn_reg').on('click',function(){
        
            var nim=$('#nim').text();
            var thun=$('#_thun_akademik').val();
            var semester=$('#_semester').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/registrasi/daftar_ulang')?>",
                data : {nim:nim,thun:thun,semester:semester},
                dataType:"JSON",
                success: function(data){
                    
                   window.open("<?php echo site_url()?>registrasi/cek_status/"+semester,"_self");
                  
                }
            });
            return false;
            
        });
});

</script>


<!-- <script type="text/javascript">
  function timer() {
  var tgl_sekarang = $("#_tgl_sekarang").val();
  var tgl_mulai = $("#_tgl_mulai").val();
    var tgl_terlambat = $("#_terlambat").val();
  
  var statuse = $("#_statuse").val();
  statuse = parseInt(statuse);

  if (statuse == 1) {
    $("#btn_mulai").html('<a href="<?php echo base_url();?>mahasiswa/registrasi" class="btn btn-success btn-lg" id="tbl_mulai" onclick="return konfirmasi_token()"><i class="fa fa-check-circle"></i> MULAI Registrasi</a>');
    
    $('#waktu_akhir_ujian').countdowntimer({
          startDate : tgl_sekarang,
          dateAndTime : tgl_terlambat,
          size : "lg",
          labelsFormat : true,
      timeUp : hilangkan_tombol,
      });
  } else if (statuse == 0) {
    $("#btn_mulai").addClass("btn btn-success btn-lg");
    $("#waktu_").hide();
    $('#akan_mulai').countdowntimer({
          startDate : tgl_sekarang,
          dateAndTime : tgl_mulai,
          size : "lg",
          labelsFormat : true,
      timeUp : timeIsUp,
      });
  }  else if (statuse == 2) {
    hilangkan_tombol();
  } else {
    hilangkan_tombol();
  }
}

function timeIsUp() {
  var id_ujian = $("#id_ujian").val();
  $("#btn_mulai").html('<a href="<?php echo base_url();?>mahasiswa/registrasi" class="btn btn-success btn-lg" id="tbl_mulai" onclick="return konfirmasi_token()"><i class="fa fa-check-circle"></i> MULAI</a>');

  var tgl_sekarang = $("#_tgl_sekarang").val();
  var tgl_mulai = $("#_tgl_mulai").val();
    var tgl_terlambat = $("#_terlambat").val();
}

function hilangkan_tombol() {
  $("#btn_mulai").hide();
  $("#waktu_").hide();
  $("#test").html('Waktu Regristrasi Telah Selesai');
  $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu selesai..!\');">Waktu Regristrasi Telah Selesai</a>');
}
function konfirmasi_token() {
  
    window.location.assign(base_url+"index.php/Mahasiswa/registrasi"); 

}
function cek_status() {
  
    window.open("<?php echo site_url()?>registrasi/cek_status","_self");

}
</script> -->