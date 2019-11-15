<p>
											<button class="btn btn-white btn-info btn-bold" id="btn-add">
												<i class="ace-icon fa fa-plus bigger-120 blue"></i>
												Tambah Data
											</button>

										
                                            <button class="btn btn-white btn-default btn-bold" id="refresh">
                                                <i class="ace-icon fa fa-refresh red2"></i>
                                                Refresh
                                            </button>
                                            
										</p>
<div class="row">
									<div class="col-xs-12">
										
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th>Kode Prodi</th>
													<th>Nama Prodi</th>
                                                    <th>Singkatan</th>
                                                    <th>Ketua Prodi</th>
													
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
                <h3 class="modal-title" id="myModalLabel">Tambah Prodi</h3>
            </div>
            <form class="form-horizontal" id="lg_prodi">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Prodi</label>
                        <div class="col-xs-9">
                            <input name="kode_id" id="kode_id" class="form-control" type="hidden" value="0">
                            <input name="kode" id="kode" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Prodi</label>
                        <div class="col-xs-9">
                            <input name="nama_prodi" id="nama_prodi" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Singkatan</label>
                        <div class="col-xs-9">
                            <input name="singkatan" id="singkatan" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >jenjang</label>
                        <div class="col-xs-9">
                            <input name="jenjang" id="jenjang" class="form-control" type="text" required>
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
        <!--END MODAL EDIT-->
        
        <div class="modal fade" id="Modalauto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ketua Prodi</h4>
                    </div>
                   
                    <div class="modal-body">
                                       <form class="form-horizontal" id="lg_kt">    
                           
                            <input type="hidden" name="id_kode" id="id_kode" value="">
                            <div class="form-group">
                                                <label class="col-md-3 control-label">Kepala Prodi</label>
                                                <div class="col-md-6">
                                                    <select data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }' name="ketua_id" id="ketua_id">
                                                        <option value="">--pilih Kaprodi--</option>
                                                        <?php foreach ($dosen as $data): ?>
                                                            <option value="<?=$data->nrp?>"><?=$data->nrp."-".$data->nama_dsn?></option>
                                                        <?php endforeach ?>
                                                        
                                                       
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                </form>        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="save-ketua">Simpan</button>
                    </div>
                    
                </div>
            </div>
        </div>
<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?</p></div>
                                        
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
							
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
         table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('master/d_prodi/data_prodi')?>",
                  // "autoWidth": false,
                 
         }); 
        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_prodi/get_data_prodi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(kode_prodi,nama_prodi, ket, ketua,jenjang){
                      $('#ModalaAdd').modal('show');
                         
                         $('[name="kode_id"]').val(data.kode_prodi);
                         $('[name="kode"]').val(data.kode_prodi);
                         $('[name="nama_prodi"]').val(data.ket);
                         $('[name="singkatan"]').val(data.nama_prodi);
                         $('[name="ketua"]').val(data.ketua);
                         $('[name="jenjang"]').val(data.jenjang);
                         
                         
                });
                }
            });
            return false;
            // alert(id);
        });
        $('#btn-add').on('click',function(){
             $('#lg_prodi')[0].reset();
        $("#ModalaAdd").modal('show');
        });
        $('#show_data').on('click','.item_add',function(){
           var id=$(this).attr('data');
           $('#lg_kt')[0].reset();
            $('[name="id_kode"]').val(id);
             $("#Modalauto").modal('show');

        });

        $('#show_data').on('click','.item_ganti',function(){
           var id=$(this).attr('data');
           var ketua=$(this).attr('data-nrp');
            $('#lg_kt')[0].reset();
            $('[name="id_kode"]').val(id);
            $('[name="ketua_id"]').val(ketua);
             $("#Modalauto").modal('show');

        });

         $('#save-ketua').on('click',function(){
           
            var kode_prodi=$('#id_kode').val();
            var ketua=$('#ketua_id').val();
              
             $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_prodi/save_ketua')?>",
                data : {kode_prodi:kode_prodi,ketua:ketua},
                // dataType:"JSON",
                success: function(data){
                    $('#Modalauto').modal('hide');
                    
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
        });

        $('#btn_simpan').on('click',function(){
        
        var id=$('[name="kode_id"]').val();
        var kode=$('[name="kode"]').val();
        var nama=$('[name="nama_prodi"]').val();
        var singkatan=$('[name="singkatan"]').val();
        var jenjang=$('[name="jenjang"]').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_prodi/save_data_prodi')?>",
                data : {id:id,kode:kode,nama:nama,singkatan:singkatan,jenjang:jenjang},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            
        
        });
        //Update Barang
    $('#btn_update').on('click',function(){
         var id=$('#id').val();
            var kode=$('#ekode').val();
            var nama=$('#enama').val();
             var singkatan=$('#esingkatan').val();
            var ketua=$('#eketua').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/master/update_data_prodi')?>",
                data : {id:id, kode:kode, nama:nama, singkatan:singkatan, ketua:ketua},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalEdit').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            // alert(email);
        });
         $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
         $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/d_prodi/delete_data')?>",
            // dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                           
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                     
                    notify_success(data.pesan);
               
                    }
                });
                return false;
            });

        $('#refresh').on('click',function(){
            table.ajax.reload();
           
                
            });

    });

</script>

