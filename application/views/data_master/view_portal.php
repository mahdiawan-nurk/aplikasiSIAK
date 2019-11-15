<div class="row">

    <div class="col-md-12" data-plugin-portlet id="portlet-2" >
<p id="portal"></p>

</div>

	
							
							
						</div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	var table;
 $(document).ready(function() {

$('#portal').on('click','.item_on',function(){
            var id=$(this).attr('data');
            var stat="1";
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/p_portal/save_portal')?>",
                data : {id:id,stat:stat},
                // dataType:"JSON",
                success: function(data){
                   
                   portal();
                    notify_success(data.pesan);
                }
            });
            return false;
        });

$('#portal').on('click','.item_off',function(){
            var id=$(this).attr('data');
            var stat="0";
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/p_portal/save_portal')?>",
                data : {id:id,stat:stat},
                // dataType:"JSON",
                success: function(data){
                   
                   portal();
                    notify_success(data.pesan);
                }
            });
            return false;
            
        });



});
 portal();
function portal(){
	 $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/p_portal/data_portal')?>",
               
                // dataType:"JSON",
                success: function(data){
                   $('#portal').html(data);
                }
            });
}

  </script>