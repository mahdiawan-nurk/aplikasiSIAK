<div class="inner-toolbar ">
                        <ul>
                            <li  id="btn-add">
                               <button class="btn  btn-info gradient btn-sm " id="btn-add">
                                                <i class="fa fa-plus bigger-120 blue"></i>
                                                Tambah
                                            </button>
                            </li>
                             <li>
                                <button class="btn btn-white btn-warning gradient btn-sm" >
                                                <i class="fa  fa-upload"></i>
                                                Import
                                            </button>
                            </li>
                               <li>
                                <button class="btn btn-white btn-danger gradient btn-sm" >
                                                <i class="fa fa-trash-o "></i>
                                                Delete
                                            </button>
                            </li>
                               <li>
                                <button class="btn btn-white btn-default gradient btn-sm" id="refresh">
                                                <i class="ace-icon fa fa-refresh "></i>
                                                Refresh
                                            </button>
                            </li>
                               
                           
                        </ul>
                    </div>

                    
<br>
<div class="row panel-body">
									<div class="col-xs-12">
										
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th>NRP</th>
													<th>NIDN</th>
                                                    <th>Nama</th>
                                                    <th>Prodi</th>
													<th class="hidden-480">Gender</th>

													<th>
														Agama
													</th>
													<th class="hidden-480">E-mail</th>

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
													<td></td>
												</tr>

												

											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Dosen</h3>
            </div>
            <form class="form-horizontal" id="form" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NRP Dosen</label>
                        <div class="col-xs-9">
                            <input name="nrp" id="nrp" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIDN Dosen</label>
                        <div class="col-xs-9">
                            <input name="nidn" id="nidn" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi" required'); ?>
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
                     <input name="id" id="id" class="form-control" type="hidden" required>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NRP Dosen</label>
                        <div class="col-xs-9">
                            <input name="nrp" id="enrp" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIDN Dosen</label>
                        <div class="col-xs-9">
                            <input name="nidn" id="enidn" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-9">
                            <input name="nama" id="enama" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="eprodi" required'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gender</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="gender" id="egender">

                                <option >-</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="agama" id="eagama">

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
                            <input name="email" id="eemail" class="form-control" type="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >alamat</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="alamat" id="ealamat"></textarea>
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
							
<script src="<?php echo site_url();?>assets/vendor/jquery/jquery.js"></script> 

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
                  "sAjaxSource": "<?php echo site_url('master/d_dosen/data_dsn')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "prodi", "value": $('#prodi_id').val()},{ "name": "semester", "value": $('#semester').val()},{ "name": "angkatan", "value": $('#angkatan').val()} );
                    
                  }
         });  
        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_dosen/get_data_dsn')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id,nrp,nidn, nama, prodi, agama,gender, email, alamat){
                      $('#ModalEdit').modal('show');
                         $('[name="id"]').val(data.id);
                         $('[name="nrp"]').val(data.nrp);
                         $('[name="nidn"]').val(data.nidn);
                         $('[name="nama"]').val(data.nama);
                         $('[name="prodi"]').val(data.prodi);
                         
                         $('[name="agama"]').val(data.agama);
                         $('[name="gender"]').val(data.gender);
                         $('[name="email"]').val(data.email);
                         $('[name="alamat"]').val(data.alamat);
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
        $('#show_data').on('click','.item_edit',function(){
           $("#ModalEdit").modal('show');
        });
        $('#btn_simpan').on('click',function(){
        
            var nrp=$('#nrp').val();
            var nidn=$('#nidn').val();
            var nama=$('#nama').val();
             var prodi=$('#prodi').val();
             var gender=$('#gender').val();
            var agama=$('#agama').val();
             var email=$('#email').val();
            var alamat=$('#alamat').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_dosen/save_data_dsn')?>",
                data : {nrp:nrp, nidn:nidn ,nama:nama, prodi:prodi, gender:gender, agama:agama, email:email, alamat:alamat},
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
                url  : "<?php echo site_url('master/d_dosen/update_data_dsn')?>",
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
            url  : "<?php echo site_url('master/d_dosen/delete_data_dsn')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                           if (data.status== "hapus") {
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                     
                    notify_success(data.pesan);
                }
                    }
                });
                return false;
            });

        $('#refresh').on('click',function(){
            table.ajax.reload();
           
                
            });

    });

</script>

