
<div class="row">
									<div class="col-xs-12">
										<button class="btn btn-white btn-info btn-bold" id="btn-add">
                                                <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                                                Tambah Data
                                            </button>
										<table id="mydata" class="table table-bordered table-striped mb-none">
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
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Ajaran </label>

                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Username" class="col-xs-10 col-sm-5" id="ta" name="ta" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Mulai Pengumuman</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="datetimepicker" placeholder="Username" class="col-xs-10 col-sm-5"  name="tgl_mulai" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Mulai Pendaftaran </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="datetimepicker2" placeholder="Username" class="col-xs-10 col-sm-5"  name="tgl_mulai" />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Selesai </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="datetimepicker1" placeholder="Username" class="col-xs-10 col-sm-5" id="tgl_selesai" name="tgl_selesai" />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pengumuman </label>

                                        <div class="col-sm-9">


                               <textarea class="ckeditor" id="isi" name="isi"></textarea>
                                        </div>
                                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
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
                        <h4 class="modal-title" id="myModalLabel">Pengumuman</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body" id="lampiran">
                                          
                            
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
        <div class="modal fade" id="Modalaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          <input type="hidden" name="idnya" id="idnya" value="">
                            <div class="alert alert-info" id="tampilan"></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-info" id="btn_aktif">Simpan</button>
                       
                    </div>
                    </form>
                </div>
            </div>
        </div>
							
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
 <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                 <script src="<?php echo base_url();?>assets/ckeditor/config.js"></script>
                                <script src="<?php echo base_url();?>assets/ckeditor/adapters/jquery.js"></script>
                                <script type="text/javascript">
                                    $('textarea.ckeditor').ckeditor();
                                </script>

<script type="text/javascript">
	var table;
    $(document).ready(function() {
$('#datetimepicker').datetimepicker();
            
            
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
        //datatables
        table = $('#mydata').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('index.php/r_pengumuman/data_pengumuman')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });
     $('#btn-add').on('click',function(){
          
        $("#ModalaAdd").modal('show');
        });

     $('#btn_simpan').on('click',function(){
        
            var nim=$('#nim').val();
            var nama=$('#nama').val();
             var prodi=$('#prodi').val();
            var semester=$('#semester').val();
             var gender=$('#gender').val();
            var agama=$('#agama').val();
             var email=$('#email').val();
            var alamat=$('#alamat').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/data_mhs/save_data')?>",
                data : {nim:nim ,nama:nama, prodi:prodi, semester:semester, gender:gender, agama:agama, email:email, alamat:alamat},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                   table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            
        
        });
      $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
      $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
           window.open("<?php echo site_url()?>registrasi/edit_data/"+id,"_self");
        });
       $('#show_data').on('click','.item_aktif',function(){
        var id=$(this).attr('data');
         $('[name="idnya"]').val(id);
             $('#Modalaktif').modal('show');
             $("#tampilan").html('anda yakin');
        });
       $('#show_data').on('click','.item_nonaktif',function(){
        var id=$(this).attr('data');
         $('[name="idnya"]').val(id);
             $('#Modalaktif').modal('show');
             $("#tampilan").html('anda yakin');
        });

       $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/registrasi/delete_pengumuman')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                           if (data.status== "hapus") {
                    $('#ModalHapus').modal('hide');
                   table.ajax.reload();
                     $('#messages').addClass("active");
                    notify_success(data.pesan);
                }
                    }
                });
                return false;
            });

       $('#btn_aktif').on('click',function(){
            var id=$('#idnya').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/registrasi/aktif_pengumuman')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                           if (data.status== "berhasil") {
                    $('#ModalHapus').modal('hide');
                   table.ajax.reload();
                    notify_success(data.pesan);
                }else{
                     notify_error(data.pesan);
                    }
                }
                });
                return false;
            });

        $('#show_data').on('click','.item_lihat',function(){
            $('#Modalp').modal('show');
        $("#lampiran").html('<iframe src="<?php echo base_url();?>pdf/laporan" frameborder=true width="570" height="400"></iframe>');
             
        });
});
</script>