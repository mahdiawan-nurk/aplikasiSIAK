<section class="content-with-menu mailbox">
						<div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
							<div class="inner-menu-toggle">
								<a href="#" class="inner-menu-expand" data-open="inner-menu">
									Show Menu <i class="fa fa-chevron-right"></i>
								</a>
							</div>
							
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">
							
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
											</a>
							
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Show Menu <i class="fa fa-chevron-down"></i>
											</a>
										</div>
							
										<div class="inner-menu-content">
										<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Thn Akademik</label>
												<?php echo form_dropdown('thn_akademik', $thn_ak, $d['id_thnakad'], 'class="form-control" id="thn_akademik" required'); ?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Prog. Studi</label>
												<?php echo form_dropdown('prodi', $prodi1, $d['kode_prodi'], 'class="form-control" id="prodi_id" required'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Prog. Studi</label>
												<?php echo form_dropdown('prodi', $prodi1, $d['kode_prodi'], 'class="form-control" id="prodi_id" required'); ?>
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-sm-12">
											<br>
											<button type="button" class="btn btn-primary gradient btn-block" id="cari_data">Find Data</button>
										</div>
										
									</div>
							
											
							
											<hr class="separator" />
								<h4>SEMESTER</h4>
											<ul class="list-unstyled mt-xl pt-md" id="list">
												
												
											</ul>
							
											
							
											
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mailbox-folder">
							
							<br>
								
									<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="mydata">
												<thead>
												<tr class="btn-info gradient">
                                                    <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th class="hidden-480">Prodi</th>
                                                    <th class="detail-col">tgl Pengajuan</th>
                                                    <th>Status</th>
                                                   
                                                </tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>@mdo</td>
														<td>Mark</td>
														
														<td class="actions">
															<a href=""><i class="fa fa-pencil"></i></a>
															<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
												
													
												</tbody>
											</table>
										</div>
								
							</div>
						</div>
					</section>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	var table;
	$(document).ready(function() {

	 table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": false, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/r_pengajuan/data_pengajuan')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()} );
                    
                  }
         }); 
		$('#cari_data').on('click',function () {
			var ta=$('#thn_akademik').val();
			var prodi=$('#prodi_id').val();
			$.ajax({
                type : "POST",
                url  : "<?php echo site_url('r_selesai_daftar/ambil_semester')?>",
                data : {ta:ta,prodi:prodi},
                // dataType:"JSON",
                success: function(data){
                    
                   $('#list').html(data);
                }
            });
            return false;

		})
	});
</script>