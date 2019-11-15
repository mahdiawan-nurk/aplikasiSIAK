<div class="row">

						<div class="col-md-12 lk" id="w1">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Form Data Barang</h2>

									
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
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" readonly="" value="<?php echo auto_kode_pr();?>" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Jenis Barang</label>
                                                <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" required="" value="">
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
                                                <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Harga Beli</label>
                                                <input type="text" name="harga_beli" id="harga_beli" data-a-dec="," data-a-sep="." class="form-control"
                                                required="">
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
                                    	<div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Asal Barang</label>
                                                <input type="text" name="asal_barang" id="asal_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Keterangan</label>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control" >
                                            </div>
                                        </div>
                                       
                                    </div>     
                                    </form>
								</div>
								<footer class="panel-footer fm1">
									<button class="btn btn-primary simpan" id="">Submi</button>
                                    <button type="reset" class="btn btn-default reset">Cancel</button>
								</footer>
							</section>
						</div>

						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Data Barang Prodi</h2>

								
								</header>
								<div class="panel-body">
                                    <button class="btn btn-primary btn-add">New Data</button>
                                   
                                <form method="POST" action="<?=base_url();?>asset/asset_prodi/delete_data" id="pilih-data">   
								<table class="table table-bordered table-striped mb-none dt-responsive nowrap" id="datatable-default">
											<thead>
												<tr>
													
													<th rowspan="2">NO</th>
                                                    <th rowspan="2">Ruangan</th>
                                                    <th rowspan="2">Kode Barang</th>
                                                    <th rowspan="2">Nama Barang</th>
                                                    <th rowspan="2">Model Barang</th>
                                                    <th rowspan="2">Spesifikasi Barang</th>
                                                    <th rowspan="2">Tahun Pembelian</th>
                                                    <th rowspan="2">jumlah Barang</th>              
                                                    <th rowspan="2">Harga Beli</th>              
                                                    <th rowspan="2">Kondisi Barang</th>              
                                                    <th rowspan="2">Asal Barang</th>              
													<th colspan="2">aksi</th>

												</tr>
                                                <td></td>
                                                <td><input type="checkbox" name="pilih-all"></td>
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
                                        <button class="btn btn-danger hapus">Hapus Data</button>  
                                   
								</div>
								
							</section>
						</div>
									
								</div><!-- /.row -->

      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " role="document" >
                <div class="modal-content ">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    
                    <div class="modal-body">
                                          
                            
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
        $('.lk').hide();
          $('#harga_beli').autoNumeric('init');
        table = $('#datatable-default').DataTable({
             "ordering": false,
                 "processing": true, 
                "scrollY":        "500px",
                "scrollX":        "1000px",
                "scrollCollapse": true,
                "paging":         false,
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('asset/asset_prodi/data_asset_prodi')?>",
                  // "autoWidth": false,
                 
         });  

 $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('asset/asset_prodi/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_br,ruangan,jenis_b,mode_b,spesifikasi,tahun_p,jumlah_b,harga_b,kondisi_b,keterangan,asal_b,kode_b){
                    $('.lk').show();
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
                         $('[name="asal_barang"]').val(data.asal_b);
                         $('[name="kode_barang"]').val(data.kode_b);
                         
                        

                });
                  $('[name="harga_beli"]').autoNumeric('update');
                }
            });
            return false;
        });
            
$('.btn-add').on('click',function() {
$('.lk').show();
});
$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
             $('[name="kode"]').val(id).attr('type','hidden');
             $("#ModalHapus").modal('show');
        });
$('.hapus').click(function(e){
    $('#ModalHapus').modal('show');
       
        });
 $('#btn_hapus').on('click',function(){
           $("#pilih-data").submit();
        });
  $('#pilih-data').submit(function(){
            
             
                $.ajax({
                    url:"<?php echo site_url()?>asset/asset_prodi/delete_data",
                    type:"POST",
                    data:$('#pilih-data').serialize(),
                    // cache: false,
                    success:function(data){
                         $('#ModalHapus').modal('hide');
                        notify_success(data);
                       table.ajax.reload();
                    }
            });
            return false;   
           
        });

var finish = $('#w1').find('footer.fm1 button.simpan'),
        $w1validator = $("#w1 form").validate({
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
        var validated = $('#w1 form').valid();
        if ( validated ) {
        var id=$('[name="id_barang"]').val();
        var form=[$('[name="id_barang"]').val(),$('[name="ruangan"]').val(),$('[name="jenis_barang"]').val(),$('[name="mode_barang"]').val(),$('[name="spesifikasi"]').val(),$('[name="tahun_pembelian"]').val(),$('[name="jumlah_barang"]').val(),$('[name="harga_beli"]').val(),$('[name="kondisi_barang"]').val(),$('[name="asal_barang"]').val(),$('[name="keterangan"]').val()];
         var url;
            if (id=="0") {
                url="asset/asset_prodi/save_data";
            }else{
                url="asset/asset_prodi/update_data";
            }
        $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                data : {form:form},
                // dataType:"JSON",
                success: function(data){
                    $('.lk').hide();
                    $('#log')[0].reset();
                  table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
    
        }else{

         notify_error('Data Tidak Boleh Kosong');
        }
    });

$('.reset').on('click',function () {
$('#log')[0].reset();
 $('.lk').hide();
});
   
});
</script>