<style type="text/css">
    p{
        color:red;
    }
</style>
<div class="row">

   <div class="col-md-12" id="l_form">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>

                                    <h2 class="panel-title">Add Level  Form</h2>

                                   
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <input type="email" class="form-control" id="email" placeholder="Username">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Jabatan</label>
                                                <?php echo form_dropdown('level', $level, $d['id_jabatan'], 'class="form-control" id="level" required'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="hide">
                                            <form id="reset">
                                            <div class="form-group" >
                                                <label class="control-label">Prodi</label>
                                               <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi" required'); ?>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                                <footer class="panel-footer">
                                    <button class="btn btn-primary" id="simpan_level">Submit Card</button>
                                    <button type="reset" class="btn btn-default" id="cancel">Cancel</button>
                                </footer>
                            </section>
                        </div>
    <div class="col-lg-12">
                            <div class="tabs">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-group"></i> Pengguna</a>
                                    </li>
                                    <li>
                                        <a href="#recent10" data-toggle="tab" class="text-center"><i class="fa fa-group"></i> Mahasiswa</a>
                                    </li>
                                     <li>
                                        <a href="#recent11" data-toggle="tab" class="text-center"><i class="fa fa-group"></i> Dosen</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="popular10" class="tab-pane active">
                                        <a href="#" data-toggle="modal" class="btn btn-white btn-info btn-bold" id="add_user">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Pengguna
                      </a>
                    <!--   <button class="btn btn-white btn-default btn-bold" id="refresh">
                                                <i class="ace-icon fa fa-refresh red2"></i>
                                                Refresh
                                            </button> -->
<table id="mydata" class="table table-bordered table-striped mb-none">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                     
                          <th>E-mail</th>
                          <th>Jabatan</th>                          
                           <th>aksi</th>
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
                                    </div>
                                    <div id="recent10" class="tab-pane">
                                       <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th width="15%">Nama</th>
                                                    <th>Prodi</th>
                                                    <th>Semester</th>
                                                    <th >Gender</th>
                                                    <th >E-mail</th>

                                                   <th width="100%">Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody id="show_data1">
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
                                     <div id="recent11" class="tab-pane">
                                       <table class="table table-bordered table-striped mb-none" id="datatable-default1">
                                            <thead>
                                                <tr>
                                                    
                                                    <th width="15%">NO</th>
                                                    <th>NRP</th>
                                                    <th >Nama</th>
                                                    <th>Prodi</th>
                                                    <th>Gender</th>
                                             
                                                    <th >E-mail</th>

                                                    <th width="100%">Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody id="show_data2">
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
                                </div>
                            </div>
                        </div>
							<div class="col-xs-12">




							</div>
						</div>
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
            </div>
            <form class="form-horizontal" id="lguser">
                <div class="modal-body">
                   <div class="form-group">
             <label class="col-sm-3 control-label">Username <span class="required">*</span></label>
                <div class="col-sm-9">
                <input type="text" name="fullname" class="form-control" placeholder="Full Name" id="fullname" required/>
                <label id="err_username"></label>
                                            </div>
                 </div>
                <div class="form-group">
                <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                 <div class="col-sm-9">
                 <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </span>
             <input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" id="mail" required/>
           
                                                </div>
                                                  <label id="err_email"></label>
                                            </div>

                                            <div class="col-sm-9">

                                            </div>
                                        </div>
            <div class="form-group">
             <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                <div class="col-sm-9">
                <input type="text" name="password" id="password" class="form-control" placeholder="Password" required/>
                <label id="err_password"></label>
                                            </div>
                 </div>
                                                  
                     
                     
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="simpan_user" >Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <div class="modal fade" id="ModalHuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="pengguna" id="pengguna" value="">
                           
                            <div class="alert alert-warning" id="tampilu"></div>
                                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="user_hapus">OK</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

 <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="mail1" id="mail1" value="">
                            <input type="hidden" name="jbt" id="jbt" value="">
                            <div class="alert alert-warning" id="tampil2"></div>
                                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="hapus_jbt">OK</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<div class="modal fade" id="ModalAktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <input type="hidden" name="jabatan" id="jabatan" value="<?php echo $jabatan->id_jabatan ?>">
                            <div class="alert alert-warning" id="tampil"></div>
                                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_ok">OK</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalAktifd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <input type="hidden" name="jabatan" id="jabatan1" value="<?php echo $jabatan1->id_jabatan ?>">
                            <div class="alert alert-warning" id="tampil1"></div>
                            <div class="alert alert-warning">Default Jabatan Adalah <?php echo $jabatan1->jabatan ?></div>
                                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_ok2">OK</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



<script src="<?php echo site_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
    var table1;
     var table2;
     var table3;
    $(document).ready(function() {

        //datatables
        table1 = $('#mydata').DataTable({ 
            "processing": true,   
            "ajax": {
                "url": "<?php echo site_url('pengaturan/d_pengguna/data_pengguna')?>",
                "type": "POST"
            },
        });
        table2 = $('#datatable-default').DataTable({ 
            "processing": true,        
            "ajax": {
                "url": "<?php echo site_url('pengaturan/d_pengguna/data_pmhs')?>",
                "type": "POST"
            },
        });
        table3 = $('#datatable-default1').DataTable({ 
            "processing": true,        
            "ajax": {
                "url": "<?php echo site_url('pengaturan/d_pengguna/data_pdsn')?>",
                "type": "POST"
            },
        });

        $('#refresh').on('click',function(){
            table1.ajax.reload();
           
                
            });

    $('#show_data').on('click','.hapus_user',function(){
            var id=$(this).attr('data');
            $('[name="pengguna"]').val(id);
           $('#tampilu').html('<p>Apakah Anda yakin Ingin Menghapus User ini? Jika iya Maka jabatan User Akan Dihapus</p>');
           $('#ModalHuser').modal('show');
        });

    $('#show_data').on('click','.item_add',function(){
            var id=$(this).attr('data');
            $('#email').val(id);
           $('#hide').hide();
            $('#l_form').show();
           
        });
     $('#show_data').on('click','.item_hapus',function(){
            var email=$(this).attr('data');
            var jbt=$(this).attr('data-jbt');
            $('#mail1').val(email);
             $('#jbt').val(jbt);
             $('#tampil2').html('<p>Apakah Anda yakin Ingin Menghapus Jabatan User ini?</p>');
           $('#ModalHapus').modal('show');

           
        });
    $('#show_data1').on('click','.item_aktif',function(){
            var id=$(this).attr('data');
             $('#tampil').html('<p>Apakah Anda yakin Ingin Mengaktifkan User ini? Dengan Jabatan Mahasiswa</p>');
            $('#ModalAktif').modal('show');
            $('[name="kode"]').val(id);
           
        });

     $('#show_data1').on('click','.item_naktif',function(){
            var id=$(this).attr('data');
             $('#tampil').html('<p>Apakah Anda yakin Ingin Menon-aktifkan User ini</p>');
            $('#ModalAktif').modal('show');
            $('[name="kode"]').val(id);
           
        });

      $('#show_data2').on('click','.item_aktif',function(){
            var id=$(this).attr('data');
             $('#tampil1').html('<p>Apakah Anda yakin Ingin Mengaktifkan User ini?</p>');
            $('#ModalAktifd').modal('show');
            $('[name="kode"]').val(id);
           
        });
    $('#user_hapus').on('click',function(){
            var email=$('#pengguna').val();
             

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/hapus_pengguna')?>",
            // dataType : "JSON",
                    data : {email:email},
                    success: function(response){
                      table1.ajax.reload(); 
                        $('#ModalHuser').modal('hide');
                        
                        notify_success(response.pesan); 
                      
                    }
                });
                return false;

            });
     $('#hapus_jbt').on('click',function(){
            var email=$('#mail1').val();
             var jabatan=$('#jbt').val();

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/hpus_jbt_user')?>",
            // dataType : "JSON",
                    data : {email:email,jabatan:jabatan},
                    success: function(response){
                      table1.ajax.reload(); 
                        $('#ModalHapus').modal('hide');
                        
                        notify_success(response.pesan); 
                      
                    }
                });
                return false;

            });
   
          $('#btn_ok').on('click',function(){
            var id=$('#textkode').val();
             var jabatan=$('#jabatan').val();

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/aktifkan_user')?>",
            // dataType : "JSON",
                    data : {id: id,jabatan:jabatan},
                    success: function(response){
                      if (response.status=="ok") {
                        table2.ajax.reload(); 
                        $('#ModalAktif').modal('hide');
                        
                                  notify_success(response.pesan); 
                      }else{
                        console.log(gagal);
                         notify_error("gagal load"); 

                      }
                            
                            
                    }
                });
                return false;

            });
          $('#simpan_level').on('click',function(){
            var email=$('#email').val();
            var id_jabatan=$('#level').val();
             var keterangan=$('#prodi').val();

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/add_level')?>",
            // dataType : "JSON",
                    data : {email: email,id_jabatan:id_jabatan,keterangan:keterangan},
                    success: function(response){
                      if (response.status=="ok") {
                        $('#ModalAktif').modal('hide');
                             table1.ajax.reload(); 
                                  notify_success(response.pesan);
                                   $('#l_form').hide();

                      }
                            
                            
                    }
                });
                return false;
           
            });
  $('#btn_ok2').on('click',function(){
            var id=$('#textkode').val();
             var jabatan=$('#jabatan1').val();

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/aktifkan_user_dsn')?>",
            // dataType : "JSON",
                    data : {id: id,jabatan:jabatan},
                    success: function(response){
                      if (response.status=="ok") {
                        $('#ModalAktif').modal('hide');
                        table3.ajax.reload(); 
                                  notify_success(response.pesan); 
                      }else{
                        console.log(gagal);
                         notify_error("gagal load"); 

                      }
                            
                            
                    }
                });
                return false;
          

            });
  $('#simpan_user').on('click',function(){
            var username=$('#fullname').val();
             var email=$('#mail').val();
             var password=$('#password').val();

            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_pengguna/simpan_pengguna')?>",
            // dataType : "JSON",
                    data : {username:username,email:email,password:password},
                    success: function(response){
                      if (response.status==true) {
                        $('#ModalaAdd').modal('hide');
                        table1.ajax.reload(); 
                                  notify_success(response.pesan); 
                      }else{
                        
                         $('#err_username').html(response.pesan[0]).attr('hidden',false)
                         $('#err_email').html(response.pesan[1]).attr('hidden',false)
                         $('#err_password').html(response.pesan[2]).attr('hidden',false)

                      }
                            
                            
                    }
                });
                return false;
          

            });
   $('#cancel').on('click',function(){
           $('#hide').hide();
$('#l_form').hide();

            });
   $('#add_user').on('click',function(){
            $('#lguser')[0].reset()
          $('#ModalaAdd').modal('show');
          $('#err_username').attr('hidden',true);
          $('#err_email').attr('hidden',true);
          $('#err_password').attr('hidden',true);

            });
   $("#level").change(function(){
          var id=$('#level').val();
         if (id=="2") {
            $('#reset')[0].reset();
            $('#hide').show();
             
         }else if (id=="3") {
            $('#reset')[0].reset();
            $('#hide').show();

         }else{
            $('#reset')[0].reset();
            $('#hide').hide();
         }
  });
         
$('#hide').hide();
$('#l_form').hide();
    });
   </script>

