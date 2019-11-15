<center id="logo"><img src="<?php echo base_url();?>assets/img/logop.png" class="img-responsive"></center>
<div class="modal fade" id="ModalaP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                 // if (data.status == "2") {
                  var id=data.pengumuman;
                  var dat=data.id;
                  var jdl=data.jdl;
                  for (var i =0; i < id; i++) {
                 notify_info( jdl[i]+'<button onclick="lihat('+dat[i]+');" class="btn btn-info">Clik untuk lihat</button>');
                  }
                
        
           
                 
                      
           
           // }else{
           //   $('#ModalaP').modal('hide');
           // }
                        
                
                }
            });
  
          });
    //       </script>