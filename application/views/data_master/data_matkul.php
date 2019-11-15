
<div class="row">
									<div class="col-xs-12">
										<div class="col-xs-12 col-sm-2">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Search By</h4>

                                                    
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div>
                                                            <label for="form-field-8">Prodi</label>

                                                            <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi_id" required'); ?>
                                                        </div>

                                                      <hr>

                                                        <div>
                                                            <label for="form-field-9">semester</label>

                                                            <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?>
                                                        </div>

                                                     
                                                     

                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xs-12 col-sm-10">
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
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th>Kode Matkul</th>
													<th>Nama Matkul</th>
                                                    <th>SKS</th>
                                                    <th>Prodi</th>
													<th class="hidden-480">Semester</th>

													
													

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
                <h3 class="modal-title" id="myModalLabel">Form Data Mata Kuliah</h3>
            </div>
            <form class="form-horizontal" id="lg_mk">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Makul</label>
                        <div class="col-xs-9">
                            <input name="id_mk" id="id_mk" class="form-control" type="hidden" value="0" required>
                            <input name="kode_mk" id="kode_mk" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Makul</label>
                        <div class="col-xs-9">
                            <input name="nama_mk" id="nama_mk" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >SKS</label>
                        <div class="col-xs-9">
                            <input name="sks" id="sks" class="form-control" type="text" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi_id', $prodi, $d['id_prodi'], 'class="form-control" id="prodi_id" required'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('semester_id', $semester, $d['id'], 'class="form-control" id="semester_id" required'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Makul</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="jenis_mk" id="jenis_mk">

                            	<option >-</option>
                            	<option value="T">Teori</option>
                            	<option value="P">Praktek</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kurikulum</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('kurikulum', $kurikulum, $d['id_kur'], 'class="form-control" id="kurikulum" required'); ?>
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus Data ini?</p></div>
                                        
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
                  "sAjaxSource": "<?php echo site_url('master/d_matkul/data_matkul')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "prodi", "value": $('#prodi_id').val()},{ "name": "semester", "value": $('#semester').val()} );
                    
                  }
         });  

       $("#prodi_id").change(function(){
          table.ajax.reload();
  });
 $("#semester").change(function(){
          table.ajax.reload();
  });
        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_matkul/get_data_mk')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_mk,kode_mk,nama_mk,sks,semester,prodi,jenis_mk,kur_mk){
                      $('#ModalaAdd').modal('show');
                         $('[name="id_mk"]').val(data.id_mk);
                         $('[name="kode_mk"]').val(data.kode_mk);
                         $('[name="nama_mk"]').val(data.nama_mk);
                         $('[name="sks"]').val(data.sks);
                         $('[name="prodi_id"]').val(data.prodi);
                         $('[name="semester_id"]').val(data.semester);
                         $('[name="jenis_mk"]').val(data.jenis_mk);
                         $('[name="kurikulum"]').val(data.kur_mk);
                       
                });
                }
            });
            return false;
            // alert(id);
        });
        $('#btn-add').on('click',function(){
            $('#lg_mk')[0].reset();
        $("#ModalaAdd").modal('show');
        });
        // $('#show_data').on('click','.item_edit',function(){
        //    $("#ModalEdit").modal('show');
        // });
        $('#btn_simpan').on('click',function(){
        var id=$('[name="id_mk"]').val();
        var kode_mk=$('[name="kode_mk"]').val();
        var nama_mk=$('[name="nama_mk"]').val();
        var sks=$('[name="sks"]').val();
        var prodi=$('[name="prodi_id"]').val();
        var semester=$('[name="semester_id"]').val();
        var jenis_mk=$('[name="jenis_mk"]').val();
        var kur_mk=$('[name="kurikulum"]').val();
            

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_matkul/save_data_mk')?>",
                data : {id:id,kode_mk:kode_mk,nama_mk:nama_mk,sks:sks,prodi:prodi,semester:semester,jenis_mk:jenis_mk,kur_mk:kur_mk},
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
            var nrp=$('#enrp').val();
            var nidn=$('#enidn').val();
             var nama=$('#enama').val();
            var prodi=$('#eprodi').val();
             var agama=$('#eagama').val();
             var gender=$('#egender').val();
             var email=$('#eemail').val();
             var alamat=$('#ealamat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/master/update_data_dsn')?>",
                data : {id:id, nrp:nrp, nidn:nidn ,nama:nama, prodi:prodi, gender:gender, agama:agama, email:email, alamat:alamat},
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
            url  : "<?php echo base_url('index.php/d_matkul/delete_data_mk')?>",
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

