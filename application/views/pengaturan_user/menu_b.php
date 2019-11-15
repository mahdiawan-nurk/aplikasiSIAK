<style type="text/css">
    p{
        color: red;
    }
</style>
<div class="row">
    <div class="col-md-12">
                            <div class="tabs">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> Main Menu</a>
                                    </li>
                                    <li>
                                        <a href="#recent10" data-toggle="tab" class="text-center">Sub Menu</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="popular10" class="tab-pane active">
                                       
              <a href="#"  class="btn btn-white btn-info btn-bold" id="add_main">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Main Menu
                      </a>
                      
<table id="mydata-main" class="table table-bordered table-striped mb-none">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama menu</th>
                          <th>Link</th>
                          <th>icon</th>
                          
                           <th>aksi</th>
                        </tr>
                      </thead>

          <tbody id="show_data">
                  
                                              </tbody>
                                            
                    </table>

                                    </div>
                                    <div id="recent10" class="tab-pane">
                                        
                                 <a href="#"  class="btn btn-white btn-info btn-bold" id="add_sub">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Sub Menu
                      </a>
                    
<table id="mydata-sub" class="table table-bordered table-striped mb-none">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama menu</th>
                          <th>Link</th>
                          <th>icon</th>
                          
                           <th>aksi</th>
                        </tr>
                      </thead>

          <tbody id="show_data1">
                  
                                              </tbody>
                                            
                    </table>


                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>

<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd-main" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Main Menu</h3>
            </div>
            <form class="form-horizontal" role="form" id="lgmain" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_main" id="nama_main" class="form-control" type="text" placeholder="Nama Main Menu" style="width:335px;" required>
                            <label id="err_nama_main"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link</label>
                        <div class="col-xs-9">
                            <input name="link_main" id="link_main" class="form-control" type="text" placeholder="Link Main Menu" style="width:335px;" required>
                             <label id="err_link_main"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon</label>
                        <div class="col-xs-9">
                            <input name="icon_main" id="icon_main" class="form-control" type="text" placeholder="Icon Main Menu" style="width:335px;" required>
                             <label id="err_icon_main"></label>
                        </div>
                    </div>
                   
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan_main">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd-sub" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Sub Menu</h3>
            </div>
            <form class="form-horizontal" id="lgsub">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_sub" id="nama_sub" class="form-control" type="text" placeholder="Nama Sub Menu" style="width:335px;" required>
                            <label id="err_nama_sub"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="link_sub" id="link_sub" class="form-control" type="text" placeholder="Link Sub" style="width:335px;" required>
                            <label id="err_link_sub"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon Sub</label>
                        <div class="col-xs-9">
                            <input name="icon_sub" id="icon_sub" class="form-control" type="text" placeholder="icon Sub" style="width:335px;" required>
                            <label id="err_icon_sub"></label>
                        </div>
                    </div>
                     <div   class="form-group" name="sub" id="sub"   >
                        <label class="control-label col-xs-3" >Sub Menu Untuk</label>
                        <div class="col-xs-9">
                            
                           <?php echo form_dropdown('sub_id', $main, $d['id_menu'], 'class="form-control" style="width:335px;" id="sub_id" required'); ?>
                           <label id="err_sub_id"></label>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan_sub">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

<!-- MODAL EDIT main -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Main Menu</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">
                  <input name="id_main_edit" id="id_main_edit" class="form-control" type="hidden" placeholder="Nama Main Menu" style="width:335px;" required>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_main_edit" id="nama_main_edit" class="form-control" type="text" placeholder="Nama Main Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link</label>
                        <div class="col-xs-9">
                            <input name="link_main_edit" id="link_main_edit" class="form-control" type="text" placeholder="Link Main Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon</label>
                        <div class="col-xs-9">
                            <input name="icon_main_edit" id="icon_main_edit" class="form-control" type="text" placeholder="Icon Main Menu" style="width:335px;" required>
                        </div>
                    </div>
                   
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update_main">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT MAIN-->

        <!-- MODAL EDIT SUB -->
        <div class="modal fade" id="ModalaEdit-sub" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Sub Menu</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">
                  <input name="id_sub_edit" id="id_sub_edit" class="form-control" type="hidden" placeholder="Nama Sub Menu" style="width:335px;" required>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_sub_edit" id="nama_sub_edit" class="form-control" type="text" placeholder="Nama Sub Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="link_sub_edit" id="link_sub_edit" class="form-control" type="text" placeholder="Link Sub" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon Sub</label>
                        <div class="col-xs-9">
                            <input name="icon_sub_edit" id="icon_sub_edit" class="form-control" type="text" placeholder="icon Sub" style="width:335px;" required>
                        </div>
                    </div>
                     <div   class="form-group" name="sub" id="sub"   >
                        <label class="control-label col-xs-3" >Sub Menu Untuk</label>
                        <div class="col-xs-9">
                            
                           <?php echo form_dropdown('sub_id_edit', $main, $d['id_menu'], 'class="form-control" style="width:335px;" id="sub_id_edit" required'); ?>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update_sub">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT SUB-->

<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus-main" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfrimasi </h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus_main">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
          <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus-sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
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
                        <button class="btn_hapus btn btn-danger" id="btn_hapus_sub">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

<script src="<?php echo site_url();?>assets/vendor/jquery/jquery.js"></script> 
<!-- JS Main Menu-->
<script type="text/javascript">
    var tablet;
    var table;
    $(document).ready(function() {

        //datatables
      
             tablet = $('#mydata-main').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('pengaturan/d_menu/data_main_menu')?>",
                  // "autoWidth": false,
              

        });
             table = $('#mydata-sub').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('pengaturan/d_menu/data_sub_menu')?>",
                  // "autoWidth": false,
              

        });

        $('#refresh2').on('click',function(){
            tablet.ajax.reload(); 
            });

         //GET UPDATE

    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('pengaturan/d_menu/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_menu, nama_menu,link, icon){
                      $('#ModalaEdit').modal('show');
                  $('[name="id_main_edit"]').val(data.id_menu);
                  $('[name="nama_main_edit"]').val(data.nama_menu);
                  $('[name="link_main_edit"]').val(data.link);
                  $('[name="icon_main_edit"]').val(data.icon);
                });
                }
            });
            return false;
        });

     $('#show_data1').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('pengaturan/d_menu/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_menu, nama_menu, link, icon, main_menu){
                      $('#ModalaEdit-sub').modal('show');
                  $('[name="id_sub_edit"]').val(data.id_menu);
                  $('[name="nama_sub_edit"]').val(data.nama_menu);
                  $('[name="link_sub_edit"]').val(data.link);
                  $('[name="icon_sub_edit"]').val(data.icon);
                  $('[name="sub_id_edit"]').val(data.main_menu);
                });
                }
            });
            return false;
        });

    //GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus-main').modal('show');
            $('[name="kode"]').val(id);
           
        });

    $('#show_data1').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus-sub').modal('show');
            $('[name="kode"]').val(id);
        });
    //end Get Hapus

    //clik add main and sub menu
    $('#add_main').on('click',function(){
        $('#lgmain')[0].reset()
        $('#ModalaAdd-main').modal('show');
        $('#err_nama_main').attr('hidden',true);
        $('#err_link_main').attr('hidden',true);
        $('#err_icon_main').attr('hidden',true);

    })

     $('#add_sub').on('click',function(){
        $('#lgsub')[0].reset();
    $('#ModalaAdd-sub').modal('show');
    $('#err_nama_sub').attr('hidden',true);
    $('#err_link_sub').attr('hidden',true);
    $('#err_icon_sub').attr('hidden',true);
    $('#err_sub_id').attr('hidden',true);
    })
     //end add main and sub menu

    //Simpan Barang
    $('#btn_simpan_main').on('click',function(){
        
            var nama_main=$('#nama_main').val();
            var link_main=$('#link_main').val();
            var icon_main=$('#icon_main').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_menu/simpan_menu')?>",
                data : {nama_main:nama_main , link_main:link_main, icon_main:icon_main},
                dataType:"JSON",
                success: function(data){
                    if (data.status== true) {
                    $('#ModalaAdd-main').modal('hide');
                    tablet.ajax.reload(); 
                      notify_success(data.pesan);     
                }else{
                    $('#err_nama_main').html(data.pesan[0]).attr('hidden',false);
                    $('#err_link_main').html(data.pesan[1]).attr('hidden',false);
                    $('#err_icon_main').html(data.pesan[2]).attr('hidden',false);
               
                }
                }
            });
            return false;
            // alert(nama+link+icon);
        });

     $('#btn_simpan_sub').on('click',function(){
           var nama_sub=$('#nama_sub').val();
            var link_sub=$('#link_sub').val();
            var icon_sub=$('#icon_sub').val();
            var sub_id=$('#sub_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_menu/simpan_menu_sub')?>",
                data : {nama_sub:nama_sub , link_sub:link_sub, icon_sub:icon_sub, sub_id:sub_id},
                dataType:"JSON",
                success: function(data){
                    if (data.status==true) {
                         $('#ModalaAdd-sub').modal('hide');
                     
                      table.ajax.reload(); 
                      notify_success(data.pesan);
                  }else{
                    $('#err_nama_sub').html(data.pesan[0]).attr('hidden',false);
                    $('#err_link_sub').html(data.pesan[1]).attr('hidden',false);
                    $('#err_icon_sub').html(data.pesan[2]).attr('hidden',false);
                    $('#err_sub_id').html(data.pesan[3]).attr('hidden',false);
                  }
                   
                   
                    
                
                }
            });
            return false;
            
        });

    //Update Barang
    $('#btn_update_main').on('click',function(){
            var id=$('#id_main_edit').val();
            var nama=$('#nama_main_edit').val();
            var link=$('#link_main_edit').val();
            var icon=$('#icon_main_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_menu/update_menu')?>",
                dataType : "JSON",
                data : {id:id, nama:nama , link:link, icon:icon},
                success: function(data){
                    
                    if (data.status==true) {
                    $('#ModalaEdit').modal('hide');
                    tablet.ajax.reload(); 
                    notify_success(data.pesan);
                     }else{
                    $('#ModalaEdit').modal('hide');
                    tablet.ajax.reload(); 
                    notify_success(data.pesan);
                     }
                }
            });
            return false;

            
        });

     $('#btn_update_sub').on('click',function(){
            var id_sub=$('#id_sub_edit').val();
            var nama_sub=$('#nama_sub_edit').val();
            var link_sub=$('#link_sub_edit').val();
            var icon_sub=$('#icon_sub_edit').val();
            var sub_id=$('#sub_id_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_menu/update_menu_sub')?>",
                dataType : "JSON",
                data : {id_sub:id_sub, nama_sub:nama_sub , link_sub:link_sub, icon_sub:icon_sub, sub_id:sub_id},
                success: function(data){
               
                   if (data.status==true) {
                        $('#ModalaEdit-sub').modal('hide');
                   table.ajax.reload(); 
                     notify_success(data.pesan);
                   }else{
                        $('#ModalaEdit-sub').modal('hide');
                   table.ajax.reload(); 
                     notify_success(data.pesan);
                   }

                }
            });
            return false;
        });

     //Hapus Barang
        $('#btn_hapus_main').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_menu/hapus_menu')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus-main').modal('hide');
                            tablet.ajax.reload(); 
                            notify_success(data.pesan);
                    }
                });
                return false;
            });

         $('#btn_hapus_sub').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_menu/hapus_menu')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus-sub').modal('hide');
                            table.ajax.reload(); 
                            notify_success(data.pesan);
                    }
                });
                return false;
            });

    });

</script>
<!-- End JS Main Menu-->

<!-- JS Main sUb Menu-->
