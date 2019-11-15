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
													<th>ID Dosen</th>
													<th>Nama</th>
                                                    <th>Agama</th>
                                                    <th>Gender</th>
													<th class="hidden-480">Email</th>

													
													

													<th>Aksi</th>
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													

													
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
                <h3 class="modal-title" id="myModalLabel">Tambah Dosen LB</h3>
            </div>
            <form class="form-horizontal" id="form" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Dosen</label>
                        <div class="col-xs-9">
                            <input name="id_dlb" id="id_dlb" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-9">
                            <input name="nama_dlb" id="nama_dlb" class="form-control" type="text" required>
                        </div>
                    </div>

                   

                    
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gender</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="gender" id="gender">

                            	<option >-</option>
                            	<option value="L">Laki-laki</option>
                            	<option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="agama" id="agama">

                            	<option >-</option>
                            	<option value="Islam">Islam</option>
                            	<option value="Kristen">Kristen</option>
                            	<option value="Hindu">Hindu</option>
                            	<option value="Budha">Budha</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >E-mail</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >alamat</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="alamat" id="alamat"></textarea>
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
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Dosen</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Dosen</label>
                        <div class="col-xs-9">
                            <input name="eid_dlb" id="eid_dlb" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-9">
                            <input name="enama_dlb" id="enama_dlb" class="form-control" type="text" required>
                        </div>
                    </div>

                    
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gender</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="egender" id="egender">

                                <option >-</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="eagama" id="eagama">

                                <option >-</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >E-mail</label>
                        <div class="col-xs-9">
                            <input name="eemail" id="eemail" class="form-control" type="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >alamat</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="ealamat" id="ealamat"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Simpan</button>
                </div>
            </form>
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
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
                  "sAjaxSource": "<?php echo site_url('index.php/d_dosenlb/data_dsn_lb')?>",
                  // "autoWidth": false,
                  
         });  
        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dosenlb/get_data_dlb')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_dlb,nama_dlb,agama,gender,email,alamat){
                      $('#ModalEdit').modal('show');
                         $('[name="eid_dlb"]').val(data.id_dlb);
                         $('[name="enama_dlb"]').val(data.nama_dlb);
                         $('[name="eagama"]').val(data.agama);
                         $('[name="egender"]').val(data.gender);
                         $('[name="eemail"]').val(data.email);
                         $('[name="ealamat"]').val(data.alamat);

                });
                }
            });
            return false;
            // alert(id);
        });
        $('#btn-add').on('click',function(){
            $('#form')[0].reset();
        $("#ModalaAdd").modal('show');
       
   
        });
        // $('#show_data').on('click','.item_edit',function(){
        //    $("#ModalEdit").modal('show');
        // });
        $('#btn_simpan').on('click',function(){
        
            var id_dlb=$('#id_dlb').val();
            var nama_dlb=$('#nama_dlb').val();
             var gender=$('#gender').val();
            var agama=$('#agama').val();
             var email=$('#email').val();
            var alamat=$('#alamat').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dosenlb/save_data_dlb')?>",
                data : {id_dlb:id_dlb,nama_dlb:nama_dlb,gender:gender,agama:agama,email:email,alamat:alamat},
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
         var id_dlb=$('#eid_dlb').val();
            var nama_dlb=$('#enama_dlb').val();
             var gender=$('#egender').val();
            var agama=$('#eagama').val();
             var email=$('#eemail').val();
            var alamat=$('#ealamat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dosenlb/update_data_dlb')?>",
                data : {id_dlb:id_dlb,nama_dlb:nama_dlb,gender:gender,agama:agama,email:email,alamat:alamat},
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
            var id=$('#kode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/d_akademik/delete_data')?>",
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

