<div id="tmpor">
<div class="row col-md-12 ini_bodi" > 
  <div class="panel panel-info">
    <div class="panel-heading">Konfirmasi Data</div>

    <div class="panel-body">
<input type="hidden" name="_tgl_sekarang" id="_tgl_sekarang" value="<?php echo date('Y-m-d H:i:s'); ?>">
      <input type="hidden" name="_semester" id="_semester" value="<?php echo $data_mhs->semester_id;  ?>">
      <input type="hidden" name="_tgl_mulai" id="_tgl_mulai" value="<?php echo $data->tgl_mulai_daftar;  ?>">
      <input type="hidden" name="_terlambat" id="_terlambat" value="<?php echo $data->tgl_selesaip; ?>">
      <input type="hidden" name="_statuse" id="_statuse" value="<?php echo $data->statuse; ?>">
      <input type="hidden" name="_thun_akademik" id="_thun_akademik" value="<?php echo $data->thn_akademik; ?>">
      <div class="col-md-7">
        <div class="table-responsive">
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
      </div>
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
  countdown();
function countdown() {
  var status=$('#_statuse').val();
  var mulai=$('#_terlambat').val();

if (status=="1") {
   
    $("#waktu_akhir_ujian1").countdown(mulai, function(event) {
    $("#test").html('Waktu Regristrasi tinggal');
    $("#waktu_game_over").html('<a  onclick="return alert(\'Waktu Telah Di mulai..!\');">Silahkan Mendaftar Ulang</a>');
    $(this).text(event.strftime('%D Hari %H:%M:%S'));
    }); 
    
}else{
  
}
  


}
function cek_status($semester) {
   
    window.open("<?php echo site_url()?>registrasi/cek_status/"+$semester,"_self");

}
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
           
            
        });
});










setInterval(function(){ 
  countdown();; 
  }, 1000);
</script>



