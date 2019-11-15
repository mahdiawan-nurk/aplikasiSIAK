<div class="row panel-body">
<p>
									
<a class="modal-with-form btn btn-primary" href="#modalForm">Tambah Data</a>
											
										</p>

									<div class="col-xs-12">
										<form method="POST" action="<?=base_url()?>d_gedung/delete_gedung" id="pilih-data">
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<thead>
												<tr>
                          <th>NO</th>
													<th>Kode Gedung</th>
                          <th>Nama Gedung</th>                     
                          <th>Register</th>                     
                          <th>Kondisi Gedung</th>                     
                          <th>Kontruksi Tingkat</th>                     
                          <th>Kontruksi Beton</th>                     
                          <th>Luas Lantai</th>                     
                          <th>Luas Gedung</th>                     
                          <th>Status Tanah</th>                     
                          <th>Asal-usul</th>                     
                          <th width="8%">Aksi</th>
													<th width="5%"></th>
												</tr>
											</thead>

											<tbody id="show_data">
							
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
                         <form class="frm">
            
                                     <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kode Gedung</label>
                                                <input type="hidden" name="id_gedung" id="id_gedung" class="form-control" value="0">

                                                <input type="text" name="kode_gedung" id="kode_gedung" class="form-control" placeholder="EX .eg = A.01" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Nama Gedung</label>
                                                <input type="text" name="nama_gedung" id="nama_gedung" class="form-control" placeholder="EX .eg = Gedung Direktorat" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Register</label>
                                                <input type="text" name="register" id="register" class="form-control" placeholder="EX .eg = 1 " required="">
                                            </div>
                                        </div>
                                    <?php $opsi = array( 'Baik','Kurang Baik','Rusak'); $value = array('B',"KB","R" ); $jml=count($opsi); ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi Gedung</label>
                                                <!-- <input type="text" name="lastname" class="form-control" value="<?=$jml?>"> -->
                                                <select class="form-control" name="kondisi_gedung" id="kondisi_gedung" required="">
                                                    <option value="">--Pilih Kondisi--</option>
                                                    <?php for ($i=0; $i < $jml ; $i++){ ?>
                                                        <option value="<?=$value[$i]?>"><?=$opsi[$i]?></option>
                                                     <?php }?>   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                         <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kontruksi Bangunan - Bertingkat</label>
                                                <input type="text" name="kntr_tingkat" id="kntr_tingkat" class="form-control" placeholder="EX .eg = 1 Tingkat" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Kontruksi Bangunan - Beton</label>
                                                <input type="text" name="kntr_beton" id="kntr_beton" class="form-control" placeholder="EX .eg = Tidak/Beton/Baja" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Luas Lantai</label>
                                                <input type="text" name="luas_lantai" id="luas_lantai" class="form-control" placeholder="EX .eg = 100 M2" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Luas Gedung</label>
                                                <input type="text" name="luas_gedung" id="luas_gedung" class="form-control" placeholder="EX .eg = 402,25 x 42,60 M2" required="">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Status Tanah</label>
                                                <input type="text" name="status_tanah" id="status_tanah" class="form-control" placeholder="EX .eg = Pakai/sewa" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Asal-Usul</label>
                                                <input type="text" name="asal_usul" id="asal_usul" class="form-control" placeholder="EX .eg = APBD">
                                            </div>
                                        </div>
                                    </div>

                                    </form>
                      </div>
                      <footer class="panel-footer btn-primary fm1">
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button class="btn btn-primary  modal-confirm simpan">Submit</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                          </div>
                        </div>
                      </footer>
                    </section>
                  </div>



         


<div class="modal fade " id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" >
                <div class="modal-content" >
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <!-- <form class="form-horizontal"> -->
                    <div class="modal-body">
                                          
                            <!-- <input type="hidden" name="kode" id="textkode" value=""> -->
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?<br>Jika Anda Menghapus Data Ini Maka Data Yang Terkait Akan Ikut Terhapus</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>

							
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#datatable-default').DataTable({
                 "ordering": false,
                 "processing": true, 
                "scrollY":        "500px",
                // "scrollX":        "1000px",
                "scrollCollapse": true,
                "paging":         false,
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/d_gedung/data_gedung')?>",
                  // "autoWidth": false,
                  
         });  
    $('#btn-add').on('click',function(){
          
        $("#ModalaAdd1").modal('show');
       
   
        });

  

    $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $('.frm')[0].reset()
        $.magnificPopup.close();
        
    });



    $('#show_data').on('click','.modal-with-form',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_gedung/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_gd,kode_gd,nama_gd,register,kondisi_gd,tingkat,beton,lantai,l_gd,status_t,asal_usul){
                       $('.modal-with-form').magnificPopup({});
                         $('[name="id_gedung"]').val(data.id_gd);
                         $('[name="kode_gedung"]').val(data.kode_gd);
                         $('[name="nama_gedung"]').val(data.nama_gd);
                         $('[name="register"]').val(data.register);
                         $('[name="kondisi_gedung"]').val(data.kondisi_gd);
                         $('[name="kntr_tingkat"]').val(data.tingkat);
                         $('[name="kntr_beton"]').val(data.beton);
                         $('[name="luas_lantai"]').val(data.lantai);
                         $('[name="luas_gedung"]').val(data.l_gd);
                         $('[name="status_tanah"]').val(data.status_t);
                         $('[name="asal_usul"]').val(data.asal_usul);
                        

                });
                }
            });
            return false;
        });



    $('.modal-with-form').magnificPopup({});
 
 
  $('.hapus').click(function(e){
    $('#ModalHapus').modal('show');
       
        });
 $('#btn_hapus').on('click',function(){
           $("#pilih-data").submit();
        });
  $('#pilih-data').submit(function(){
                    $.ajax({
                    url:"<?=base_url()?>d_gedung/delete_gedung",
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
             var id=$('#id_gedung').val();
            var kode_gd=$('#kode_gedung').val();
            var nama_gd=$('#nama_gedung').val();
            var register=$('#register').val();
            var kondisi_gd=$('#kondisi_gedung').val();
            var tingkat=$('#kntr_tingkat').val();
            var beton=$('#kntr_beton').val();
            var lantai=$('#luas_lantai').val();
            var l_gd=$('#luas_gedung').val();
            var status_t=$('#status_tanah').val();
            var asal_usul=$('#asal_usul').val();



            var url;
            if (id=="0") {
                url="d_gedung/create_gedung";
            }else{
                url="d_gedung/update_gedung";
            }
          $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                data : {id:id,kode_gd:kode_gd,nama_gd:nama_gd,register:register,kondisi_gd:kondisi_gd,tingkat:tingkat,beton:beton,lantai:lantai,l_gd:l_gd,status_t:status_t,asal_usul:asal_usul},
                // dataType:"JSON",
                success: function(data){
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

