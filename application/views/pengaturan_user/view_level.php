		<div class="row">
							<div class="col-xs-12">
	
						
										<?=$this->session->flashdata('msg')?>
									<div class="row">
										

										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Level</h4>

													
												</div>

												<div class="widget-body">
													<div class="widget-main">
														
														<div>
															<label for="form-field-mask-2">
																Level
																
															</label>

															<div class="input-group">
																<span class="input-group-addon">
																	
																</span>

																<input class="form-control" readonly type="text" id="form-field-mask-2" value="<?php echo $level->level;?>" />
															</div>
														</div>

														<hr />
														<div>
															<label for="form-field-mask-2">
															Keterangan
																
															</label>

															<div class="input-group">
																<span class="input-group-addon">
																	
																</span>

																<input class="form-control" readonly type="text" id="form-field-mask-2" value="<?php echo $level->keterangan;?>" />
															</div>
														</div>

													
														
													</div>
												</div>
											</div>
										</div><!-- /.span -->
										<div class="col-xs-12 col-sm-8">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Hak Akses</h4>

													<button class="btn btn-white btn-info btn-bold" style="float: right;">
												<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
												Simpan
											</button>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														
															<input class="form-control" type="hidden" id="form-field-mask-2" name="level" value="<?php echo $level->level;?>" />
															<table id="mydata" class="table table-striped  table-hover">
																<thead>
																	<tr>
																		<td>Nama Menu</td>
																		<td>Status</td>
																	</tr>
																</thead>
																<?php 
																// $jml=$cari->num_rows();
																

																foreach ($ambil as $key) {
															
																?>
																
																	<tr>
																	<td><?=$key->nama_menu?></td>
																	<td>
																		<label>
														<input  class="ace ace-switch ace-switch-5" type="checkbox" <?= cek_akses($level->level,$key->id_menu);?> data-level="<?=$level->level?>" data-id="<?=$key->id_menu?>"  id="ada"  />
														<span class="lbl"></span>
													</label>	
																	</td>
																</tr>
																<?php }?>
													
															</table>
													

														
														
														

														

													
														
													</div>
												</div>
											</div>
										</div><!-- /.span -->
									</div><!-- /.row -->
								</div>
							</div>
							 

<!--end--->
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": false,
        "paging":         false
    } );
} );
</script>
<script type="text/javascript">
	function refreshPage() { 
        location.reload(); 
    }
	$('.ace-switch-5').on('click',function(){
		const akseslvl = $(this).data('level');
		const aksesid = $(this).data('id');
		$.ajax({
			url: "<?php echo base_url('user_akses/ubah_akses');?>",
			type:"POST",
			data:{
				'akseslvl':akseslvl,
				'aksesid':aksesid
			},
			success: function(response) {
				if (response.status == "insert") {
					// document.location.href="<?= base_url('index.php/user_akses/view_hak_akses/')?>"+akseslvl;
					location.reload(); 
					notify_success(response.pesan); 
					// alert(response.status);
				} else {
					location.reload(); 
					notify_success(response.pesan);
				}
			}
		});
		
	});
</script>