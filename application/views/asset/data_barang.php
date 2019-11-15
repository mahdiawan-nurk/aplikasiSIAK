<div class="row panel-body">
<p>
										<!-- 	<button class="btn btn-white btn-info btn-bold" id="btn-add">
												<i class="ace-icon fa fa-plus bigger-120 blue"></i>
												Tambah Data
											</button> -->
                                            <a class="modal-with-form btn btn-primary" href="#modalForm"><i class="fa fa-plus"></i> Open Form</a>
											
										</p>

									<div class="col-xs-12">
										<form method="POST" action="<?=base_url();?>sm_aset_barang/delete_barang" id="pilih-data">
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
													<th>NO</th>
                                                    <th>Ruangan</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Model Barang</th>
                                                    <th>Spesifikasi Barang</th>
                                                    <th>Tahun Pembelian/Pembuatan</th>
                                                    <th>jumlah Barang</th>              
                                                    <th>Harga Beli</th>              
                                                    <th>Kondisi Barang</th>             
                                                    <th>Keteranga</th>              
                                                    <th>Aksi</th>
													<th></th>
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
                                       
                                        </form>
                                         <button class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus Data</button>
									</div><!-- /.span -->
								</div><!-- /.row -->

   

                                    <!-- Modal Form -->
                                    <div id="modalForm" class="modal-block modal-header-color modal-block-primary modal-block-lg mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Registration Form</h2>
                                            </header>
                                            <div class="panel-body">
                                                <form id="log">
          <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Ruangan</label>
                                                <input type="hidden" name="id_barang" id="id_barang" class="form-control" value="0">
                                                <?php echo form_dropdown('ruangan', $ruangan, $d['ruangan_id'], 'class="form-control" id="ruangan" required'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Kode Barang</label>
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis Barang</label>
                                                <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Merek/Model Barang</label>
                                                <input type="text" name="mode_barang" id="mode_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Spesifikasi Barang</label>
                                                <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>          
                    <div class="row">
                        <?php $now=date('Y');  ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Tahun Pembelian/Pembuatan</label>
                                                <select class="form-control" name="tahun_pembelian" id="tahun_pembelian" required="">
                                                    <option value="">--Pilih Tahun--</option>
                                                    <?php for ($i=2000; $i < $now; $i++) { ?>
                                                    <option value="<?=$i?>" ><?= $i?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah Barang</label>
                                                <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Harga Beli</label>
                                                <input type="text" name="harga_beli" id="harga_beli" class="form-control" required="" data-a-dec="," data-a-sep=".">
                                            </div>
                                        </div>
                                       <?php $opsi = array( 'Baik','Kurang Baik','Rusak'); $value = array('B',"KB","R" ); $jml=count($opsi); ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi Barang</label>
                                                <!-- <input type="text" name="lastname" class="form-control" value="<?=$jml?>"> -->
                                                <select class="form-control" name="kondisi_barang" id="kondisi_barang" required="">
                                                    <option value="">--Pilih Kondisi--</option>
                                                    <?php for ($i=0; $i < $jml ; $i++){ ?>
                                                        <option value="<?=$value[$i]?>"><?=$opsi[$i]?></option>
                                                     <?php }?>   
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Keterangan</label>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control">
                                            </div>
                                        </div>
                                       
                                    </div>     
                                    </form>
                                            </div>
                                            <footer class="panel-footer btn-primary fm1">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-primary modal-confirm simpan">Submit</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>

<!-- MODAL ADD -->
       <!--  <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" style="width: auto">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Form Data Barang</h3>
            </div>
         
                <div class="modal-body">
                    <form id="log">
          <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Ruangan</label>
                                                <input type="hidden" name="id_barang" id="id_barang" class="form-control" value="0">
                                                <?php echo form_dropdown('ruangan', $ruangan, $d['ruangan_id'], 'class="form-control" id="ruangan" required'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Kode Barang</label>
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?=auto_kode_br();?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis Barang</label>
                                                <input type="text" name="jenis_barang" id="jenis_barang" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Merek/Model Barang</label>
                                                <input type="text" name="mode_barang" id="mode_barang" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Spesifikasi Barang</label>
                                                <input type="text" name="spesifikasi" id="spesifikasi" class="form-control">
                                            </div>
                                        </div>
                                    </div>          
                    <div class="row">
                        <?php $now=date('Y');  ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Tahun Pembelian/Pembuatan</label>
                                                <select class="form-control" name="tahun_pembelian" id="tahun_pembelian">
                                                    <option>--Pilih Tahun--</option>
                                                    <?php for ($i=2000; $i < $now; $i++) { ?>
                                                    <option value="<?=$i?>" ><?= $i?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah Barang</label>
                                                <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Harga Beli</label>
                                                <input type="text" name="harga_beli" id="harga_beli" class="form-control">
                                            </div>
                                        </div>
                                       <?php $opsi = array( 'Baik','Kurang Baik','Rusak'); $value = array('B',"KB","R" ); $jml=count($opsi); ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi Barang</label>
                                               
                                                <select class="form-control" name="kondisi_barang" id="kondisi_barang">
                                                    <option value="">--Pilih Kondisi--</option>
                                                    <?php for ($i=0; $i < $jml ; $i++){ ?>
                                                        <option value="<?=$value[$i]?>"><?=$opsi[$i]?></option>
                                                     <?php }?>   
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Keterangan</label>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control">
                                            </div>
                                        </div>
                                       
                                    </div>     
                                    </form>
                    </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
       
            </div>
            </div>
        </div> -->

<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
             
                    <div class="modal-body">
                                          
                            <!-- <input type="text" name="kode" id="textkode" value=""> -->
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                 
                </div>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    $(document).ready(function() {
         $('#harga_beli').autoNumeric('init');
        //datatables
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/sm_aset_barang/data_barang')?>",
                  // "autoWidth": false,
                  
         });  
        //GET UPDATE
          $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/sm_aset_barang/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_br,ruangan,jenis_b,mode_b,spesifikasi,tahun_p,jumlah_b,harga_b,kondisi_b,keterangan,kode_br){
                       $('.item_edit').magnificPopup({});
                         $('[name="id_barang"]').val(data.id_br);
                         $('[name="ruangan"]').val(data.ruangan);
                         $('[name="jenis_barang"]').val(data.jenis_b);
                         $('[name="mode_barang"]').val(data.mode_b);
                         $('[name="spesifikasi"]').val(data.spesifikasi);
                         $('[name="tahun_pembelian"]').val(data.tahun_p);
                         $('[name="jumlah_barang"]').val(data.jumlah_b);
                         $('[name="harga_beli"]').val(data.harga_b);
                         $('[name="kondisi_barang"]').val(data.kondisi_b);
                         $('[name="keterangan"]').val(data.keterangan);
                         $('[name="kode_barang"]').val(data.kode_br);
                         
                        

                });
                  $('[name="harga_beli"]').autoNumeric('update');
                }
            });
            return false;
        });
            
 
  $('.modal-with-form').on('click',function(){
   auto_kode();
});
  
    $('.modal-with-form').magnificPopup(); 
   
        

     $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $('#log')[0].reset()
        $.magnificPopup.close();
        
    });

    $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
             $('[name="kode"]').val(id);
             $("#ModalHapus").modal('show');
        });

    // $('#btn_simpan').on('click',function(){
    //         var id=$('#id_barang').val();
    //         var ruangan=$('#ruangan').val();
    //         var jenis_b=$('#jenis_barang').val();
    //         var mode_b=$('#mode_barang').val();
    //         var spesifikasi=$('#spesifikasi').val();
    //         var tahun_p=$('#tahun_pembelian').val();
    //         var jumlah_b=$('#jumlah_barang').val();
    //         var harga_b=$('#harga_beli').val();
    //         var kondisi_b=$('#kondisi_barang').val();
    //         var keterangan=$('#keterangan').val();
    //         var url;
    //         if (id=="0") {
    //             url="sm_aset_barang/create_barang";
    //         }else{
    //             url="sm_aset_barang/update_barang";
    //         }
    //       $.ajax({
    //             type : "POST",
    //             url  : "<?php echo base_url()?>"+url,
    //             data : {id:id,ruangan:ruangan,jenis_b:jenis_b,mode_b:mode_b,spesifikasi:spesifikasi,tahun_p:tahun_p,jumlah_b:jumlah_b,harga_b:harga_b,kondisi_b:kondisi_b,keterangan:keterangan},
    //             // dataType:"JSON",
    //             success: function(data){
    //                 $('#log')[0].reset();
    //                 $('#ModalaAdd').modal('hide');
    //                 table.ajax.reload();
    //                 notify_success(data.pesan);
    //             }
    //         });
    //         return false;
    //       alert(id);
       
   
    //     });
    // $('#btn_hapus').on('click',function(){
    //         var id=$('#textkode').val();
    //       $.ajax({
    //             type : "POST",
    //             url  : "<?php echo base_url('sm_aset_barang/delete_barang')?>",
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
                    url:"<?=base_url()?>sm_aset_barang/delete_barang",
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
           var id=$('#id_barang').val();
            var ruangan=$('#ruangan').val();
            var jenis_b=$('#jenis_barang').val();
            var mode_b=$('#mode_barang').val();
            var spesifikasi=$('#spesifikasi').val();
            var tahun_p=$('#tahun_pembelian').val();
            var jumlah_b=$('#jumlah_barang').val();
            var harga_b=$('#harga_beli').val();
            var kondisi_b=$('#kondisi_barang').val();
            var keterangan=$('#keterangan').val();
            var url;
            if (id=="0") {
                url="sm_aset_barang/create_barang";
            }else{
                url="sm_aset_barang/update_barang";
            }
          $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                data : {id:id,ruangan:ruangan,jenis_b:jenis_b,mode_b:mode_b,spesifikasi:spesifikasi,tahun_p:tahun_p,jumlah_b:jumlah_b,harga_b:harga_b,kondisi_b:kondisi_b,keterangan:keterangan},
                // dataType:"JSON",
                success: function(data){
                    $('#log')[0].reset();
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
auto_kode();
function auto_kode() {
     $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>sm_aset_barang/auto_kode_j",
                // data : {id:id,ruangan:ruangan,jenis_b:jenis_b,mode_b:mode_b,spesifikasi:spesifikasi,tahun_p:tahun_p,jumlah_b:jumlah_b,harga_b:harga_b,kondisi_b:kondisi_b,keterangan:keterangan},
                dataType:"JSON",
                success: function(data){
                   
                   $('[name="kode_barang"]').val(data);
                }
            });
}

</script>