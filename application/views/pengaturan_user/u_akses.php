<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-sm-6">
        <a href="#" data-toggle="modal" data-target="#ModalaAdd" class="btn btn-white btn-info btn-bold">
            <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Level
                      </a>
            <table id="datatable-default" class="table table-bordered table-striped mb-none">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Level</th>
                        
                       
                          
                           <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">

          			
                  <tr>
                  	
                  </tr>
                   </tbody>

                                            
                    </table>


	</div>
    <div class="col-sm-6">
                                        <div class="dd" id="nestable">
                                            <ol class="dd-list">
            <?php $level=$jabatan->id_jabatan;  $main_menu = $this->db->query("SELECT * FROM tbl_menu Where main_menu='0' ORDER BY nama_menu ASC");
            foreach ($main_menu->result() as $main) {
                $akses_s =$this->db->query("SELECT *FROM tbl_menu WHERE main_menu='".$main->id_menu."' ORDER BY nama_menu ASC");
                 if ($akses_s->num_rows() > 0) { ?>
                                                <li class="dd-item dd2-item" data-id="15">
                                                    <div class="dd-handle dd2-handle">
                                                         <div class="dd2-content"><input class="ace-switch-5" name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_main($level,$main->id_menu); ?> data-level="<?=$level?>" data-main="<?=$main->id_menu?>" id="id_main" /> &nbsp;<?php echo strtoupper($main->nama_menu) ?></div>
                                                    </div>
                                                   

                                                    <ol class="dd-list">
                                                    <?php foreach ($akses_s->result() as $sub) {?>
                                                        <li class="dd-item dd2-item" data-id="16">
                                                            <div class="dd-handle dd2-handle">
                                                                <div class="dd2-content"><input class="ace-switch-6" name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_sub($level,$sub->id_menu);?> data-level="<?=$level?>" data-sub="<?=$sub->id_menu?>" id="id_sub"/> &nbsp;<?php echo $sub->nama_menu;?></div>
                                                            </div>
                                                            
                                                        </li>
                                                         <?php  } ?>
                                                    </ol>
                                                </li>
                                                <?php }else{?>
                                                <li class="dd-item dd2-item" data-id="19">
                                                    <div class="dd-handle dd2-handle">
                                                         <div class="dd2-content"><input class="ace-switch-7" name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_main($level,$main->id_menu);?> data-level="<?=$level?>" data-subm="<?=$main->id_menu?>" id="id_sub_main"/> &nbsp;<?php echo strtoupper($main->nama_menu) ?></div>
                                                    </div>
                                                   
                                                </li>

                        <?php } }?>
                                            </ol>
                                        </div>
                                    </div>
</div>

</div>
</div>

<!-- MODAL ADD -->
        <div class="modal animated rotateInDownLeft" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Form data Level</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Level</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Level" style="width:335px;" required>
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
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Level</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">
                    <input name="id_edit" id="id_edit" class="form-control" type="hidden" placeholder="Nama Level" style="width:335px;" required>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Level</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama_edit" class="form-control" type="text" placeholder="Nama Level" style="width:335px;" required>
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
                  "sAjaxSource": "<?php echo site_url('pengaturan/d_hakses/data_jabatan')?>",
                  // "autoWidth": false,
                  
         });

        $('#refresh').on('click',function(){
            table.ajax.reload();
           
                
            });
        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var nama=$('#nama').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_hakses/simpan_jabatan')?>",
                dataType : "JSON",
                data : {nama:nama},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    table.ajax.reload();
                     notify_success(data.pesan);
                }
            });
            return false;
        });
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('pengaturan/d_hakses/get_data1')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_jabatan, jabatan){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_edit"]').val(data.id_jabatan);
                        $('[name="nama_edit"]').val(data.jabatan);
                        
                    });
                }
            });
            return false;
        });
        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id_edit').val();
            var jabatan=$('#nama_edit').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/d_hakses/update_jabatan')?>",
                dataType : "JSON",
                data : {id:id , jabatan:jabatan},
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                    table.ajax.reload();
           
                    notify_success(data.pesan);
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
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/d_hakses/hapus_jabatan')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            table.ajax.reload();
                            notify_success(data.pesan);
                    }
                });
                return false;
            });

        $('.ace-switch-5').on('click',function(){
        const akseslvl = $(this).data('level');
        const aksesid = $(this).data('main');
        $.ajax({
            url: "<?php echo site_url('pengaturan/d_hakses/ubah_akses');?>",
            type:"POST",
            data:{
                'akseslvl':akseslvl,
                'aksesid':aksesid
            },
            success: function(response) {
                if (response.status == "insert") {
                    // location.reload();
                    notify_success(response.pesan); 
                } else {
                    // location.reload();
                    notify_success(response.pesan);
                }
            }
        });
        // alert(aksesid);
        
    });
        $('.ace-switch-6').on('click',function(){
        const akseslvl = $(this).data('level');
        const aksesid = $(this).data('sub');
        $.ajax({
            url: "<?php echo site_url('pengaturan/d_hakses/ubah_akses');?>",
            type:"POST",
            data:{
                'akseslvl':akseslvl,
                'aksesid':aksesid
            },
            success: function(response) {
                if (response.status == "insert") {
                    // location.reload();
                    notify_success(response.pesan); 
                } else {
                    // location.reload();
                    notify_success(response.pesan);
                }
            }
        });
        // alert(aksesid);
        
    });
        $('.ace-switch-7').on('click',function(){
        const akseslvl = $(this).data('level');
        const aksesid = $(this).data('subm');
        $.ajax({
            url: "<?php echo site_url('pengaturan/d_hakses/ubah_akses');?>",
            type:"POST",
            data:{
                'akseslvl':akseslvl,
                'aksesid':aksesid
            },
            success: function(response) {
                if (response.status == "insert") {
                    // location.reload();
                    notify_success(response.pesan); 
                } else {
                    // location.reload();
                    notify_success(response.pesan);
                }
            }
        });
        // alert(aksesid);
        
    });

    });

</script>
<!-- <script>
$(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
        
        $('#mydata').dataTable();
         
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url()?>pengaturan/d_hakses/datatable',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        html += '<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+data[i].jabatan+'</td>'+
                                '<td style="text-align:right;">'+
                                '<a href="javascript:;" class="btn btn-warning btn-xs item_url" data="'+data[i].id_jabatan+'">View Hak Akses</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_jabatan+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_jabatan+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';

                    }
                    $('#show_data').html(html);
                }

            });
        }

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('pengaturan/user_akses/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_jabatan, jabatan){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_edit"]').val(data.id_jabatan);
                        $('[name="nama_edit"]').val(data.jabatan);
                        
                    });
                }
            });
            return false;
        });

        $('#show_data').on('click','.item_url',function(){
            var id=$(this).attr('data');
           window.open("<?php echo site_url()?>user_akses/View_akses/"+id,"_self");

        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var nama=$('#nama').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/user_akses/simpan_jabatan')?>",
                dataType : "JSON",
                data : {nama:nama},
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                     notify_success(data.pesan);
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id_edit').val();
            var jabatan=$('#nama_edit').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pengaturan/user_akses/update_jabatan')?>",
                dataType : "JSON",
                data : {id:id , jabatan:jabatan},
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                    notify_success(data.pesan);
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('pengaturan/user_akses/hapus_jabatan')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                            notify_success(data.pesan);
                    }
                });
                return false;
            });

    });

</script> -->