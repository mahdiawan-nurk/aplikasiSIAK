
<div class="row">
									<div class="col-xs-12">
										
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
                                                    <th>Nama Rombel</th>
													<th>Prodi</th>
													
                                                    <th>Dosen Wali</th>
                                                    <th>Dosen Pengajar</th>
                                                   
													
													<th>Aksi</th>
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													

													
                                                    
                                                    <td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													
												</tr>

												

											</tbody>
										</table>
									</div><!-- /.span -->
                              
                          
                        
								</div><!-- /.row -->

							
                            
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
                  "sAjaxSource": "<?php echo site_url('master/d_rombel/data_rombel')?>",
                  // "autoWidth": false,
                 
         }); 
        $('#show_data').on('click','.item_kelas',function(){
            var id=$(this).attr('data');
            // window.open("<?php echo site_url()?>master/lihat_kelas/"+id,"_self");
            alert(id);
        });
        //GET UPDATE
    

        $('#refresh').on('click',function(){
            table.ajax.reload();
           
                
            });

    });

</script>

