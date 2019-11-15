
<style type="text/css">
    p{
        color: red;
    }
</style>
<br>
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

                    

<div class="row panel-body">

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

                                                      <hr>
                                                        <div>
                                                            <label for="form-field-9">Tahun Angkatan</label>

                                                            <?php echo form_dropdown('angkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="angkatan" required'); ?>
                                                        </div>


                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-10">
                                            <p >
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
													<th>NIM</th>
													<th width="15%">Nama</th>
                                                    <th>Prodi</th>
                                                    <th>Semester</th>
													<th >Gender</th>

													<th>
														Agama
													</th>
													<th >E-mail</th>

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
                                    </div>
									</div><!-- /.span -->
								</div><!-- /.row -->
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">From Data Mahasiswa</h3>
            </div>
            <form class="form-horizontal" id="form">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nim" id="nim" class="form-control" type="text" >
                            <label id="err_nim"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" required>
                             <label id="err_nama"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi', $prodi, $d['id_prodi'], 'class="form-control" id="iprodi" required'); ?>
                             <label id="err_prodi"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="isemester" required'); ?>
                            <label id="err_semester"></label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Angkatan</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('angkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="iangkatan" required'); ?>
                            <label id="err_angkatan"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gender</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="gender" id="gender">

                            	<option value="">-</option>
                            	<option value="L">Laki-laki</option>
                            	<option value="P">Perempuan</option>
                            </select>
                             <label id="err_gender"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="agama" id="agama">

                            	<option value="">-</option>
                            	<option value="Islam">Islam</option>
                            	<option value="Kristen">Kristen</option>
                            	<option value="Hindu">Hindu</option>
                            	<option value="Budha">Budha</option>
                            </select>
                             <label id="err_agama"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >E-mail</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="email"  required>
                             <label id="err_email"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >alamat</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="alamat" id="alamat"></textarea>
                             <label id="err_alamat"></label>
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
                <h3 class="modal-title" id="myModalLabel">Form Data Mahasiswa</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nim" id="enim" class="form-control" type="number" required disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nama" id="enama" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi', $prodi, $d['id_prodi'], 'class="form-control" id="eprodi" required'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="esemester" required'); ?>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Angkatan</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('angkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="eangkatan" required'); ?>
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
                            <input name="email" id="eemail" class="form-control" type="eemail"  required>
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

        <div class="modal fade" id="Modalprofil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Mahasiswa</h4>
                    </div>
                 
                    <div class="modal-body" id="tampilkan">
                        
                    
                       
                                  
                           
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <!-- <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button> -->
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
                  "sAjaxSource": "<?php echo site_url('master/d_mhs/data_mhs')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "prodi", "value": $('#prodi_id').val()},{ "name": "semester", "value": $('#semester').val()},{ "name": "angkatan", "value": $('#angkatan').val()} );
                    
                  }
         });         

         
      

  $("#prodi_id").change(function(){
          table.ajax.reload();
  });
 $("#semester").change(function(){
          table.ajax.reload();
  });
 $("#angkatan").change(function(){
          table.ajax.reload();
  });

        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_mhs/get_data_mhs')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(nim, nama, prodi, semester,angkatan, agama,gender, email, alamat){
                      $('#ModalEdit').modal('show');
                       $('[name="nim"]').val(data.nim);
                         $('[name="nama"]').val(data.nama);
                         $('[name="prodi"]').val(data.prodi);
                         $('[name="semester"]').val(data.semester);
                         $('[name="angkatan"]').val(data.angkatan);
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

    $('#show_data').on('click','.item_lihat',function(){
           var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_mhs/get_data_mhs')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(nim, nama, prodi, semester, agama,gender, email, alamat,foto){
                     $('#Modalprofil').modal('show');
                     if (data.foto=='') {
                       var src="<?php echo site_url('assets/profile/user.png')?>";
                     }else{
                        var src="<?php echo site_url('assets/profile/')?>"+data.foto;
                     }
                     if (data.gender=="L") {
                        var gn="Laki-laki";
                     }else{
                        var gn="Perempuan";
                     }
                    $('#tampilkan').html('<div class="row"><div class="col-xs-4"> <img src="'+src+'" alt="" class="img-rounded img-responsive" /></div><div class="col-xs-8"> <div class="table-responsive"> <table class="table"><tr><td>Nama Mahasiswa</td><td>:</td><td>'+data.nama+'</td> </tr><tr><td>NIM</td><td>:</td><td>'+data.nim+'</td> </tr><tr><td>Prodi</td><td>:</td><td>'+data.prodi+'</td> </tr> <tr><td>Semester</td><td>:</td><td>Semester '+data.semester+'</td> </tr><tr><td>Gender</td><td>:</td><td>'+gn+'</td> </tr> <tr><td>E-mail</td><td>:</td><td>'+data.email+'</td> </tr></table></div> </div> </div>');
                });
                }
            });
            return false;
           
        });

    

        $('#btn-add').on('click',function(){
           $('#form')[0].reset();
           $('#err_nim').attr('hidden',true);
           $('#err_nama').attr('hidden',true);
           $('#err_prodi').attr('hidden',true);
           $('#err_semester').attr('hidden',true);
           $('#err_angkatan').attr('hidden',true);
           $('#err_gender').attr('hidden',true);
           $('#err_agama').attr('hidden',true);
           $('#err_email').attr('hidden',true);
           $('#err_alamat').attr('hidden',true);
        $("#ModalaAdd").modal('show');
         
        });
        // $('#show_data').on('click','.item_edit',function(){
        //    $("#ModalEdit").modal('show');
        // });
        $('#btn_simpan').on('click',function(){
        
            var nim=$('#nim').val();
            var nama=$('#nama').val();
             var prodi=$('#iprodi').val();
            var semester=$('#isemester').val();
            var angkatan=$('#iangkatan').val();
             var gender=$('#gender').val();
            var agama=$('#agama').val();
             var email=$('#email').val();
            var alamat=$('#alamat').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_mhs/save_data')?>",
                data : {nim:nim ,nama:nama, prodi:prodi, semester:semester, angkatan:angkatan, gender:gender, agama:agama, email:email, alamat:alamat},
                // dataType:"JSON",
                success: function(data){
                    if (data.status==true) {
                         $('#ModalaAdd').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }else{
                  $('#err_nim').html(data.pesan['nim']).attr('hidden',false); 
                  $('#err_nama').html(data.pesan['nama']).attr('hidden',false); 
                  $('#err_prodi').html(data.pesan['prodi']).attr('hidden',false); 
                  $('#err_semester').html(data.pesan['semester']).attr('hidden',false); 
                  $('#err_angkatan').html(data.pesan['angkatan']).attr('hidden',false); 
                  $('#err_gender').html(data.pesan['gender']).attr('hidden',false); 
                  $('#err_agama').html(data.pesan['agama']).attr('hidden',false); 
                  $('#err_email').html(data.pesan['email']).attr('hidden',false); 
                  $('#err_alamat').html(data.pesan['alamat']).attr('hidden',false); 
                }

                }
            });
            return false;
           
        
        });
        //Update Barang
    $('#btn_update').on('click',function(){
            var nim=$('#enim').val();
             var nama=$('#enama').val();
            var prodi=$('#eprodi').val();
            var semester=$('#esemester').val();
            var angkatan=$('#eangkatan').val();
             var agama=$('#eagama').val();
             var gender=$('#egender').val();
             var email=$('#eemail').val();
             var alamat=$('#ealamat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_mhs/update_data_mhs')?>",
                data : {nim:nim , nama:nama, prodi:prodi, semester:semester,angkatan:angkatan, agama:agama, gender:gender, email:email, alamat:alamat},
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
            var nim=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('master/d_mhs/delete_data')?>",
            dataType : "JSON",
                    data : {nim: nim},
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

        $('#refresh').on('click',function(){
             table.ajax.reload();
           
                
            });

    });

</script>

