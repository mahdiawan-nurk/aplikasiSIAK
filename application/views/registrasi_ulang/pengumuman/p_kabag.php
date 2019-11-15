
<div class="row">
									<div class="col-xs-12">
										
										<table id="mydata" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th>Tahun Ajaran</th>
													<th>Tgl Mulai</th>
													<th class="hidden-480">Tgl Selesai</th>

													<th>
														Pengumuman
													</th>
													<th class="hidden-480">status</th>
                                                    
                                                    <th class="hidden-480">act</th>
													
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													

													
													<td></td>
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
<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="text" name="kode" id="textkode" value="">
                            <div class="alert alert-warning" id="test"></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
        <!--MODAL HAPUS-->
        <div class="modal fade" id="Modalp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <div class="alert alert-info" id="tampil"></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
							
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	var table;
    $(document).ready(function() {

        //datatables
        table = $('#mydata').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('index.php/datatable/data_pengumuman_kab')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });
    $('#show_data').on('click','.item_lihat',function(){
      	var id=$(this).attr('data');
             $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/registrasi/get_pengumuman')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                    	 $.each(data,function(pengumuman){
                      $('#Modalp').modal('show');
                          $("#tampil").html(data.pengumuman);
                });
                     
                
                    }
                });
                return false;
        });
     
     $('#show_data').on('click','.item_valid',function(){
            var id=$(this).attr('data');
             
             $("#test").html('<p>Apakah Anda yakin Akan validasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            
        });
      $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
           window.open("<?php echo site_url()?>registrasi/edit_data/"+id,"_self");
        });

       $('#btn_validasi').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/registrasi/validasi_pengumuman')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                          
                    $('#ModalHapus').modal('hide');
                   table.ajax.reload();
                     
                    notify_success(data.pesan);
                
                    }
                });
                return false;
           
            });
});
</script>