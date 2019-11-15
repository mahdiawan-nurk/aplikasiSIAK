<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Data Belum Mengajukan</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<input type="text" name="ta" id="ta" value="<?php echo $TA->thun_akademik; ?>">
											<table class="table table-hover mb-none" id="mydata">
												<thead>
													<tr>
														<th>No</th>
														<th>#</th>
														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														<th>Prodi</th>
														<th>Semester</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody id="show_data">
													
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>

<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Data Telah Mengajukan Dan Terdaftar</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover mb-none" id="mydata1">
												<thead>
													<tr>
														<th>No</th>
														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														<th>Prodi</th>
														<th>Semester</th>
														<th>Semester Terdaftar</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
    var table;
     var table1;
	$(document).ready(function() {

    table =  $('#mydata').DataTable( {
    		"processing": true, 
		        "scrollY":        "400px",
		        "scrollCollapse": false,
		        "paging":         false,
		        "sAjaxSource": "<?php echo site_url('r_darurat/data_sebelum')?>",
    		} );

    table1 =  $('#mydata1').DataTable( {
    	"processing": true, 
		        "scrollY":        "300px",
		        "scrollCollapse": false,
		        "paging":         false,
		        "sAjaxSource": "<?php echo site_url('r_darurat/data_sesudah')?>",
    		} );
 $('#show_data').on('click','#checkboxExample2',function(){
         var nim=$(this).attr('data-nim');
         var semester=$(this).attr('data-sem');
         var t_akd=$('#ta').val();
		  $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/r_darurat/simpan_data')?>",
                dataType : "JSON",
                data : {nim:nim,semester:semester,t_akd:t_akd},
                        success: function(data){
                      table.ajax.reload(); 
                       table1.ajax.reload(); 
                        notify_success(data.pesan);
                        
                
                    }
                });
                return false;       
           
        });
});


</script>