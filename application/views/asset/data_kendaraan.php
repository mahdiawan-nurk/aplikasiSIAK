<div class="row panel-body">
<p>
											<!-- <button class="btn btn-white btn-info btn-bold" id="btn-add">
												<i class="ace-icon fa fa-plus bigger-120 blue"></i>
												Tambah Data
											</button> -->
                                            <a class="modal-with-form btn btn-primary" href="#modalForm"><i class="fa fa-plus"></i> Tambah Data</a>

											
										</p>

									<div class="col-xs-12">
									<form method="POST" action="<?=base_url();?>sm_aset_kendaraan/delete_kendaraan" id="pilih-data">	
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
								<thead>
									<tr>
													
										<th>NO</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Merk/Model</th>
                                        <th>Spesifikasi</th>
                                        <th>Tahun Pembelian/Pembuatan</th>
                                        <th>No Rangka</th>
                                        <th>No Mesin</th>
                                        <th>Harga Beli</th>
                                        <th>jumlah kendaraan</th>              
                                        <th>Kondisi</th>              
                                        <th>Keterangan</th>              
                                        <th width="10%">Aksi</th>
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
                                               <form id="log" class="frma">
          <div class="row">
                        
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis kendaraan</label>
                                                 <input type="hidden" name="id_kendaraan" id="id_kendaraan" class="form-control" value="0">
                                                <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Merek/Model kendaraan</label>
                                                <input type="text" name="mode_kendaraan" id="mode_kendaraan" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Spesifikasi kendaraan</label>
                                                <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" required="">
                                            </div>
                                        </div>
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
                                    </div>          
                    <div class="row">
                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">No Rangka</label>
                                                <input type="text" name="no_rangka" id="no_rangka" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">No Mesin</label>
                                                <input type="text" name="no_mesin" id="no_mesin" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah kendaraan</label>
                                                <input type="text" name="jumlah_kendaraan" id="jumlah_kendaraan" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Harga Beli</label>
                                                <input type="text" name="harga_beli" id="harga_beli" class="form-control" data-a-dec="," data-a-sep="." required="">
                                            </div>
                                        </div>
                                       <?php $opsi = array( 'Baik','Kurang Baik','Rusak'); $value = array('B',"KB","R" ); $jml=count($opsi); ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi kendaraan</label>
                                                <!-- <input type="text" name="lastname" class="form-control" value="<?=$jml?>"> -->
                                                <select class="form-control" name="kondisi_kendaraan" id="kondisi_kendaraan" required="">
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
                <h3 class="modal-title" id="myModalLabel">Form Data kendaraan</h3>
            </div>
         
                <div class="modal-body">
                    <form id="log">
          <div class="row">
                        
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis kendaraan</label>
                                                 <input type="text" name="id_kendaraan" id="id_kendaraan" class="form-control" value="0">
                                                <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Merek/Model kendaraan</label>
                                                <input type="text" name="mode_kendaraan" id="mode_kendaraan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Spesifikasi kendaraan</label>
                                                <input type="text" name="spesifikasi" id="spesifikasi" class="form-control">
                                            </div>
                                        </div>
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
                                    </div>          
                    <div class="row">
                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">No Rangka</label>
                                                <input type="text" name="no_rangka" id="no_rangka" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">No Mesin</label>
                                                <input type="text" name="no_mesin" id="no_mesin" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah kendaraan</label>
                                                <input type="text" name="jumlah_kendaraan" id="jumlah_kendaraan" class="form-control">
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
                                                <label class="control-label">Kondisi kendaraan</label>
                                               
                                                <select class="form-control" name="kondisi_kendaraan" id="kondisi_kendaraan">
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
                        <h4 class="modal-title" id="myModalLabel">Hapus kendaraan</h4>
                    </div>
                    
                    <div class="modal-body">
                                          
                           
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus kendaraan ini?</p></div>
                                        
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

        //datatables
        $('#harga_beli').autoNumeric('init');
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/sm_aset_kendaraan/data_kendaraan')?>",
                  // "autoWidth": false,
                  
         });  
        //GET UPDATE
          $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/sm_aset_kendaraan/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_br,jenis_b,mode_b,spesifikasi,tahun_p,no_rangka,no_mesin,harga_b,jumlah_b,kondisi_b,keterangan){
                      $('.item_edit').magnificPopup({});
                         $('[name="id_kendaraan"]').val(data.id_br);
                         $('[name="jenis_kendaraan"]').val(data.jenis_b);
                         $('[name="mode_kendaraan"]').val(data.mode_b);
                         $('[name="spesifikasi"]').val(data.spesifikasi);
                         $('[name="tahun_pembelian"]').val(data.tahun_p);
                         $('[name="no_rangka"]').val(data.tahun_p);
                         $('[name="no_mesin"]').val(data.tahun_p);
                         $('[name="harga_beli"]').val(data.harga_b);
                         $('[name="jumlah_kendaraan"]').val(data.jumlah_b);
                         $('[name="kondisi_kendaraan"]').val(data.kondisi_b);
                         $('[name="keterangan"]').val(data.keterangan);
                         
                        

                });
                  $('[name="harga_beli"]').autoNumeric('update');
                }
            });
            return false;
        });
            
        
    
    $('#btn-add').on('click',function(){
            $('#log')[0].reset();
        $("#ModalaAdd").modal('show');
       
   
        });

    $('.modal-with-form').magnificPopup({});
    $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
             $('[name="kode"]').val(id);
             $("#ModalHapus").modal('show');
        });

    $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $('.frma')[0].reset()
        $.magnificPopup.close();
        
    });

    // $('#btn_simpan').on('click',function(){
    //         var id=$('#id_kendaraan').val();
        
    //         var jenis_b=$('#jenis_kendaraan').val();
    //         var mode_b=$('#mode_kendaraan').val();
    //         var spesifikasi=$('#spesifikasi').val();
    //         var tahun_p=$('#tahun_pembelian').val();
    //         var no_rangka=$('#no_rangka').val();
    //         var no_mesin=$('#no_mesin').val();
    //         var jumlah_b=$('#jumlah_kendaraan').val();
    //         var harga_b=$('#harga_beli').val();
    //         var kondisi_b=$('#kondisi_kendaraan').val();
    //         var keterangan=$('#keterangan').val();
    //         var url;
    //         if (id=="0") {
    //             url="sm_aset_kendaraan/create_kendaraan";
    //         }else{
    //             url="sm_aset_kendaraan/update_kendaraan";
    //         }
    //       $.ajax({
    //             type : "POST",
    //             url  : "<?php echo base_url()?>"+url,
    //             data : {id:id,jenis_b:jenis_b,mode_b:mode_b,spesifikasi:spesifikasi,tahun_p:tahun_p,no_rangka:no_rangka,no_mesin:no_mesin,jumlah_b:jumlah_b,harga_b:harga_b,kondisi_b:kondisi_b,keterangan:keterangan},
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
    //             url  : "<?php echo base_url('sm_aset_kendaraan/delete_kendaraan')?>",
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
                    url:"<?=base_url()?>sm_aset_kendaraan/delete_kendaraan",
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
            var id=$('#id_kendaraan').val();
        
            var jenis_b=$('#jenis_kendaraan').val();
            var mode_b=$('#mode_kendaraan').val();
            var spesifikasi=$('#spesifikasi').val();
            var tahun_p=$('#tahun_pembelian').val();
            var no_rangka=$('#no_rangka').val();
            var no_mesin=$('#no_mesin').val();
            var jumlah_b=$('#jumlah_kendaraan').val();
            var harga_b=$('#harga_beli').val();
            var kondisi_b=$('#kondisi_kendaraan').val();
            var keterangan=$('#keterangan').val();
            var url;
            if (id=="0") {
                url="sm_aset_kendaraan/create_kendaraan";
            }else{
                url="sm_aset_kendaraan/update_kendaraan";
            }
          $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                data : {id:id,jenis_b:jenis_b,mode_b:mode_b,spesifikasi:spesifikasi,tahun_p:tahun_p,no_rangka:no_rangka,no_mesin:no_mesin,jumlah_b:jumlah_b,harga_b:harga_b,kondisi_b:kondisi_b,keterangan:keterangan},
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