<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<div class="row">
                                    <div class="col-sm-12">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs" id="myTab">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#home">
                                                        <i class="green ace-icon fa fa-home bigger-120"></i>
                                                        Main Menu
                                                    </a>
                                                </li>

                                                <li>
                                                    <a data-toggle="tab" href="#messages">
                                                        Sub Menu
                                                        <span class="badge badge-danger">4</span>
                                                    </a>
                                                </li>

                                                
                                            </ul>

                                            <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">
                                                    <a href="#" data-toggle="modal" data-target="#ModalaAdd-main" class="btn btn-white btn-info btn-bold">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Main Menu
                      </a>
<table id="mydata" class="table table-striped table-bordered table-hover">
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

                                                <div id="messages" class="tab-pane fade in ">
                                                   <a href="#" data-toggle="modal" data-target="#ModalaAdd-sub" class="btn btn-white btn-info btn-bold">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Sub Menu
                      </a>
<table id="mydata1" class="table table-striped table-bordered table-hover">
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
                
                    

                    
							</div><!-- /.col -->
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
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_main" id="nama_main" class="form-control" type="text" placeholder="Nama Main Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link</label>
                        <div class="col-xs-9">
                            <input name="link_main" id="link_main" class="form-control" type="text" placeholder="Link Main Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon</label>
                        <div class="col-xs-9">
                            <input name="icon_main" id="icon_main" class="form-control" type="text" placeholder="Icon Main Menu" style="width:335px;" required>
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
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="nama_sub" id="nama_sub" class="form-control" type="text" placeholder="Nama Sub Menu" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Sub Menu</label>
                        <div class="col-xs-9">
                            <input name="link_sub" id="link_sub" class="form-control" type="text" placeholder="Link Sub" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon Sub</label>
                        <div class="col-xs-9">
                            <input name="icon_sub" id="icon_sub" class="form-control" type="text" placeholder="icon Sub" style="width:335px;" required>
                        </div>
                    </div>
                     <div   class="form-group" name="sub" id="sub"   >
                        <label class="control-label col-xs-3" >Sub Menu Untuk</label>
                        <div class="col-xs-9">
                            
                           <?php echo form_dropdown('sub_id', $main, $d['id_menu'], 'class="form-control" id="sub_id" required'); ?>


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
<?php $no=0; foreach($data as $row): $no++; ?>
        <div class="modal fade" id="modal-edit-main<?=$row->id_menu;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Menu</h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url("index.php/menu/update_menu"); ?>" method="POST" >
                <div class="modal-body">
                <input name="id" id="id2" class="form-control" type="hidden" placeholder="Kode Barang" style="width:335px;" value="<?=$row->id_menu?>" readonly>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Menu</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama2" class="form-control" type="text" placeholder="Kode Barang" value="<?=$row->nama_menu?>" style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link</label>
                        <div class="col-xs-9">
                            <input name="link" id="link2" class="form-control" type="text" placeholder="Link" value="<?=$row->link?>" style="width:335px;" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon</label>
                        <div class="col-xs-9">
                            <input name="icon" id="icon2" class="form-control" type="text" placeholder="Icon" value="<?=$row->icon?>" style="width:335px;" >
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" >Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach; ?>

<!-- MODAL EDIT sub -->
<?php $no=0; foreach($data as $row): $no++; ?>
        <div class="modal fade" id="modal-edit<?=$row->id_menu;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Menu</h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url("index.php/menu/update_menu"); ?>" method="POST" >
                <div class="modal-body">
                <input name="id" id="id2" class="form-control" type="hidden" placeholder="Kode Barang" style="width:335px;" value="<?=$row->id_menu?>" readonly>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Menu</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama2" class="form-control" type="text" placeholder="Kode Barang" value="<?=$row->nama_menu?>" style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link</label>
                        <div class="col-xs-9">
                            <input name="link" id="link2" class="form-control" type="text" placeholder="Link" value="<?=$row->link?>" style="width:335px;" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Icon</label>
                        <div class="col-xs-9">
                            <input name="icon" id="icon" class="form-control" type="text" placeholder="Icon" value="<?=$row->icon?>" style="width:335px;" >
                        </div>
                    </div>
                    <div   class="form-group"  >
                        <label class="control-label col-xs-3" >Sub Menu Untuk</label>
                        <div class="col-xs-9">
                            
                           <select style="width:335px;" name="sub_id" id="sub_id" >
                            <option value="">Pilih Main Menu</option>
                            <?php foreach ($sub as $pilih) {
                              
                            ?>

                  <option value="<?php echo $pilih->id_menu?>" <?=$pilih->id_menu?>><?=$pilih->nama_menu?></option>

                <?php }?></select>


                        </div>
                    </div>
                  

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" >Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--END MODAL EDIT-->

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
                                          
                            <input type="text" name="kode" id="textkode" value="">
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

<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script type='text/javascript'>
$(window).load(function(){
$("#menu").change(function() {
      console.log($("#menu option:selected").val());
      if ($("#menu option:selected").val() == 'Main menu') {
        $('#sub').prop('hidden', 'true');
      } else {
        $('#sub').prop('hidden', false);
      }
    });
});
</script>

<script type="text/javascript">
  function m_siswa_e(id) {
  $("#m_siswa").modal('show');
}
</script>
<script type="text/javascript">

$(document).ready(function() {

    $('#mydata').DataTable({

        "ajax": {

            url : "<?php echo base_url('index.php/menu/datatable_main')?>",

            type : 'GET'

        },

    });

});

</script>
<script type="text/javascript">

$(document).ready(function() {

    $('#mydata1').DataTable({

        "ajax": {

            url : "<?php echo base_url('index.php/menu/datatable_sub')?>",

            type : 'GET'

        },

    });

});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(window).load(function(){
    //pemanggilan fungsi tampil barang.
    
    $('#mydata').dataTable();
     
    //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/menu/get_menu')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_menu, nama_menu, akses, icon){
                      $('#ModalaEdit').modal('show');
                       $('[name="id"]').val(data.id_menu);
                         $('[name="nama"]').val(data.nama_menu);
                         $('[name="link"]').val(data.akses);
                         $('[name="icon"]').val(data.icon);
                         $('[name="sub"]').val(data.submenu);
                });
                }
            });
            return false;
        });
//GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
    $('#show_data1').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

      //Simpan Barang
    $('#btn_simpan_main').on('click',function(){
        
            var nama_main=$('#nama_main').val();
            var link_main=$('#link_main').val();
            var icon_main=$('#icon_main').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/menu/add_main')?>",
                data : {nama_main:nama_main , link_main:link_main, icon_main:icon_main},
                dataType:"JSON",
                success: function(response){
                    if (response.status== "main") {
                    $('#ModalaAdd').modal('hide');
                    location.reload();
                    notify_succes(response.pesan);
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
                url  : "<?php echo base_url('index.php/menu/add_sub')?>",
                data : {nama_sub:nama_sub , link_sub:link_sub, icon_sub:icon_sub, sub_id:sub_id},
                dataType:"JSON",
                success: function(data){
                    if (data.status== "sub") {
                    $('#ModalaAdd').modal('hide');
                    location.reload();

                    notify_success(data.pesan);
                }
            }
            });
            return false;
            // alert(nama_sub+link_sub+icon_sub+sub_id);
        });

        //Update Barang
    $('#btn_update').on('click',function(){
            var id=$('#id2').val();
             var nama=$('#kode_barang').val();
            var link=$('#nama_barang').val();
            var icon=$('#harga').val();
             var menu=$('#menu').val();
             var sub_id=$('#sub_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/menu/update_data')?>",
                data : {nama:nama , link:link, icon:icon, menu:menu, sub_id:sub_id},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    location.reload();
                }
            });
            return false;
            // alert(kobar+nabar+harga+sub+suba);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/menu/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                           if (data.status== "hapus") {
                    $('#ModalHapus').modal('hide');
                    location.reload();
                     $('#messages').addClass("active");
                    notify_success(data.pesan);
                }
                    }
                });
                return false;
            });
         });
  });

</script>
    <script>
$(document).ready(function(){
  $("li").click(function(){
    $("table").removeAttr("style");
  });
});
</script>