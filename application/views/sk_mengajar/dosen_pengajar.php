<div class="row">
						<div class="col-md-12">
							<div class="tabs">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i>Dosen Prodi</a>
									</li>
									<li>
										<a href="#recent10" data-toggle="tab" class="text-center">Dosen LB</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="popular10" class="tab-pane active">
									
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default">
												<thead>
													<tr>
														<th>#</th>
														<th>NRP Dosen</th>
														<th>Nama Dosen</th>
														<th>Prodi</th>
														<th>Matakuliah</th>
														<th>SKS</th>
														<th>Rombel</th>
														<th>Tahun Akademik</th>
														<th>SK</th>
													</tr>
												</thead>
												<tbody id="show_data">
													
												</tbody>
											</table>
										</div>	

									</div>
									<div id="recent10" class="tab-pane">
										
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default1">
												<thead>
													<tr>
														<th>#</th>
														<th>NRP Dosen</th>
														<th>Nama Dosen</th>
														<th>Prodi</th>
														<th>Matakuliah</th>
														<th>SKS</th>
														<th>Rombel</th>
														<th>Tahun Akademik</th>
														<th>SK</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
										</div>	

									</div>
								</div>
							</div>
						</div>

						
					</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    var table1;
    $(document).ready(function() {

        //datatables
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/d_dosen_pengajar/dosen_prodi')?>",
                  // "autoWidth": false,
                 
         });  

         table1 = $('#datatable-default1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/d_dosen_pengajar/dosen_lb')?>",
                  // "autoWidth": false,
                 
         });  
 
        $('#refresh').on('click',function(){
            table.ajax.reload();
           
                
            });

    });

</script>

