
<center><img src="<?php echo base_url();?>assets/img/POLKAM.png" width="500px"></center>






 <!-- <div class="modal fade" id="ModalaP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" style="width: 75%">
            <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body" id="pdf">

                    
                   
                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
          
                </div>
            </form>
            </div>
            </div>
        </div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	 $(document).ready(function () {
    $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/tampil_pengumuman')?>",
                dataType : "JSON",
               
                success: function(data){
                 if (data.status == "2") {
                  var id=data.pengumuman;
                  var dat=data.id;
                  var jdl=data.jdl;
                  for (var i =0; i < id; i++) {
                 notify_info( jdl[i]+'<button onclick="lihat('+dat[i]+');" class="btn btn-info">Clik untuk lihat</button>');
                  }
                
        
           
                 
                      
           
           }else{
             $('#ModalaP').modal('hide');
           }
                        
                
                }
            });
  
          });
	chart();
	function chart() {
		$.ajax({
                type : "POST",
                url  : "<?php echo base_url('c_chart/chart1')?>",
                dataType : "JSON",
                // data : {nim:nim,thun_a:thun_a,status:status},
                        success: function(data){
                        	var chr=data.data_mhs;
                        	var chr1=data.data_pengajuan;
                        	var hsl=chr-chr1;
                        	var chr2=data.data_terdaftar;
                       $('#chart1').attr('data-percent',hsl)
                       $('#chart2').attr('data-percent',chr1)
                       $('#chart3').attr('data-percent',chr2)
                
                    }
                });
	}
 

	setInterval(function(){ 
    chart();; 
  }, 5000);
  </script> -->