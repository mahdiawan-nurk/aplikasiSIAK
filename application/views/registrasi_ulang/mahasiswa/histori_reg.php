
<div class="row panel-body">
									<div class="col-xs-12">
										
										<table id="mydata" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													

													<th>
														Semester
													</th>
													<th class="hidden-480">Tgl Registrasi</th>

													 <th>Status</th>
                                                   
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													
                                                    
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    
												</tr>

												

											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->

							
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

    $('#mydata').DataTable({

        "ajax": {

            url : "<?php echo base_url('index.php/registrasi/data_histori')?>",

            type : 'GET'

        },

    });
   
});
</script>