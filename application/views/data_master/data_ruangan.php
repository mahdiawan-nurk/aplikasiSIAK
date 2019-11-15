<div class="row panel-body">
<p>
											<!-- <button class="btn btn-white btn-info btn-bold" id="btn-add">
												<i class="ace-icon fa fa-plus bigger-120 blue"></i>
												Tambah Data
											</button> -->
<a class="modal-with-form btn btn-primary" href="#modalForm"><i class="fa fa-plus"></i> Tambah Data</a>
										</p>

									<div class="col-xs-12">
										<form method="POST" action="<?=base_url();?>d_ruangan/delete_ruangan" id="pilih-data">
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
                                                    <th>Kode Ruangan</th>
                                                    <th>Nama Ruangan</th>
                                                    <th>Nama Gedung</th>
                                                    <th>Kapasitas</th>
                                                    <th>Keteraangan</th>
                                                  
                                                    <th>Aksi</th>
													<th></th>
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													

													<td></td>
                                                    <td></td>
													<td></td>
													
												</tr>

												

											</tbody>
										</table>

                                        </form>
                                        <button class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus Data</button>
									</div><!-- /.span -->
								</div><!-- /.row -->



                                    <!-- Modal Form -->
         <div id="modalForm" class="modal-block  modal-header-color modal-block-primary mfp-hide">
             <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Registration Form</h2>
                </header>
                <div class="panel-body">
                    <form class="frma">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gedung</label>
                        <div class="col-xs-9">
                             <input name="id" id="id" class="form-control" type="hidden" value="0" >
                           <?php echo form_dropdown('gedung', $gedung, $d['gedung_id'], 'class="form-control" id="gedung" required'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Ruangan</label>
                        <div class="col-xs-9">
                            <input name="kode_ruangan" id="kode_ruangan" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ruangan</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kapasitas</label>
                        <div class="col-xs-9">
                            <input name="kapasitas" id="kapasitas" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-9">
                           <input name="keterangan" id="keterangan" class="form-control" type="text" >
                        </div>
                    </div> 
                    </form>
                 </div>
                    <footer class="panel-footer btn-primary fm1">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm simpan">Simpan</button>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                         </div>
                    </footer>
                    </section>
                </div>

        <div class="modal fade " id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                 
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                \
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
                 "ordering": false,
                 "processing": true, 
                "scrollY":        "500px",
                
                "scrollCollapse": true,
                "paging":         false,
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/d_ruangan/data_ruangan')?>",
                  // "autoWidth": false,
                  
         });  
        //GET UPDATE
    $('#btn-add').on('click',function(){
       ;
            $('#frm1')[0].reset();
        $("#ModalaAdd").modal('show');
       
   
        });
$('.modal-with-form').magnificPopup({});
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_ruangan/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_rg,kode_rg,nama_rg,id_gd,kapasitas,keterangan){
                      $('.item_edit').magnificPopup({});
                         $('[name="id"]').val(data.id_rg);
                         $('[name="gedung"]').val(data.id_gd);
                         $('[name="kode_ruangan"]').val(data.kode_rg);
                         $('[name="nama"]').val(data.nama_rg);
                         $('[name="kapasitas"]').val(data.kapasitas);
                         $('[name="keterangan"]').val(data.keterangan);
                        

                });
                }
            });
            return false;
        });
 $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $('.frma')[0].reset()
        $.magnificPopup.close();
        
    });

    // $('#show_data').on('click','.item_hapus',function(){
          
    //          $('[name="kode"]').val(id);
    //          $("#ModalHapus").modal('show');
    //     });


    // $('#btn_hapus').on('click',function(){
    //         var id=$('#textkode').val();
    //       $.ajax({
    //             type : "POST",
    //             url  : "<?php echo base_url('d_ruangan/delete_ruangan')?>",
    //             data : {id:id},
    //             // dataType:"JSON",
    //             success: function(data){
    //                 $('#ModalHapus').modal('hide');
    //                 table.ajax.reload();
    //                 notify_success(data.pesan);
    //             }
    //         });
    //         return false;
       
   
    //     });

$('.hapus').click(function(e){
    $('#ModalHapus').modal('show');
       
        });
 $('#btn_hapus').on('click',function(){
           $("#pilih-data").submit();
        });
  $('#pilih-data').submit(function(){
                    $.ajax({
                    url:"<?=base_url()?>d_ruangan/delete_ruangan",
                    type:"POST",
                    data:$('#pilih-data').serialize(),
                    // cache: false,
                    success:function(data){
                      if (data=='100') {
                        $('#ModalHapus').modal('hide');
                        notify_error('Tidak Ada Data Yang Di pilih');
                      }else{
                        $('#ModalHapus').modal('hide');
                        notify_success('Data Berhasil Di Hapus');
                        table.ajax.reload();
                      }
                        
                    }
            });
            return false;   
           
        });

    var finish = $('#modalForm').find('footer.fm1 button.simpan'),
        $w1validator = $("#modalForm form").validate({
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).remove();
        },
        errorPlacement: function( error, element ) {
            element.parent().append( error );
        }

    });

  
    finish.on('click', function( ev ) {
        ev.preventDefault();
        var validated = $('#modalForm form').valid();
        if ( validated ) {
                 var id=$('#id').val();
            var id_gd=$('#gedung').val();
            var kode_rg=$('#kode_ruangan').val();
            var nama=$('#nama').val();
            var kapasitas=$('#kapasitas').val();
            var keterangan=$('#keterangan').val();
            var url;
            if (id=="0") {
                url="d_ruangan/create_ruangan";
            }else{
                url="d_ruangan/update_ruangan";
            }
          $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                data : {id:id,id_gd:id_gd,kode_rg:kode_rg,nama:nama,kapasitas:kapasitas,keterangan:keterangan},
                // dataType:"JSON",
                success: function(data){
                    $('.frma')[0].reset();
                    $.magnificPopup.close();
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
    
        }else{
            notify_error('Data Tidak Boleh Kosong');
        }
    });


    });

</script>

