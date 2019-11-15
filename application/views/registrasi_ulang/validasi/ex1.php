<div class="row">
									<div class="col-xs-12">
										<button class="btn btn-white btn-default btn-bold" id="refresh">
                                                <i class="ace-icon fa fa-refresh red2"></i>
                                                Refresh
                                            </button>
										<table id="mydata" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th>NIM</th>
													<th>Nama</th>
													<th>
                                                        Prodi
                                                    </th>

													<th>
														Semester Pengajuan
													</th>
													<th class="hidden-480">Tgl Pengajuan</th>

													 <th>Status</th>
                                                    <th>Action</th>
                                                   
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                            <input type="text" name="url" id="url" value="">
                            <input type="text" name="kode" id="nim" value="">
                            <input type="text" name="valid" id="valid" value="">
                            <div class="alert alert-warning" id="test"><p>Apakah Anda yakin Akan Menvalidasi?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi">Simpan</button>
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
            "ajax": {
                "url": "<?php echo site_url('index.php/v_kalab/data_kalab')?>",
                "type": "POST"
            },

            
           
        });    
        $('#refresh').on('click',function(){
            table.ajax.reload(); 
            });

      $('#show_data').on('click','.item_unvalid',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-v');
             $("#test").html('<p>Apakah Anda yakin Akan Unvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="valid"]').val(v);
        });
      $('#show_data').on('click','.item_valid',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-v');
             $("#test").html('<p>Apakah Anda yakin Akan Menvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="valid"]').val(v);
        });

       $('#btn_validasi').on('click',function(){
            var nim=$('#nim').val();
            var valid=$('#valid').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/v_kalab/simpan_validasi_kalab')?>",
            dataType : "JSON",
                    data : {nim: nim, valid:valid},
                    success: function(data){
                          
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            });
});
</script>