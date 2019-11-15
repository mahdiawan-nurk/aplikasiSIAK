<div class="row">
<div class="panel-body">
										<div class="table-responsive">
                      <input type="hidden" name="id_peminjam" id="id_peminjam">
											<table class="table table-bordered table-striped mb-none dt-responsive nowrap">
											<thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Institusi</th>
                          <th>Kegiatan</th>
                          <th>Pembimbing</th>
                          <th>No HP</th>
                          <th>Tgl Peminjaman</th>
                          <th>Tgl Tempo Pengembalin</th>
                          <th>Act</th>
                        </tr>           
                      </thead>
												<tbody id="look">
                          
                        </tbody>
											</table>
										</div>
									</div>
                  </div>



                  <div id="modalLG" class="modal-block modal-header-color modal-block-primary modal-block-lg mfp-hide" >
                    <section class="panel">
                      <header class="panel-heading ">
                        <h2 class="panel-title">Data Barang</h2>
                      </header>
                      <div class="panel-body ">
                        <form method="post" id="form-simpan">
                       <table class="table table-bordered table-striped mb-none dt-responsive tbel">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Jumlah Barang</th>
                              <th>Kondisi Awal</th>
                              <th>Kondisi Akhir</th>
                              <th>Tgl Kembali</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                        </form>
                        <button class="btn btn-success simpan">Simpan</button>
                      </div>
                      <footer class="panel-footer btn-primary">
                        <div class="row">
                          <div class="col-md-12 text-right">
                           
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                          </div>
                        </div>
                      </footer>
                    </section>
                  </div>
                  
  <div class="modal fade" id="ModalHapus" tabindex="10" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    var table2;
    $(document).ready(function() {

        //datatables
        table = $('.nowrap').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('asset/data_peminjaman/table_peminjam')?>",
                  // "autoWidth": false,
                  
         });  
        table2 = $('.tbel').DataTable({
                   "ordering": false,
                 "processing": true, 
                "scrollY":        "500px",
                "scrollCollapse": true,
                "paging":         false,
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('asset/data_peminjaman/tbl_data_peminjam')?>",
                  // "autoWidth": false,
                   "fnServerParams": function ( aoData ) {
                    aoData.push({ "name": "id_peminjam", "value": $('#id_peminjam').val()} );
                    
                  }
                  
         });  
        
        $('.simpan').on('click',function () {
        $("#form-simpan").submit();
          
        });

        $('#form-simpan').submit(function(){
            
             
                $.ajax({
                    url:"<?php echo site_url()?>asset/data_peminjaman/save_pengembalian",
                    type:"POST",
                    data:$('#form-simpan').serialize(),
                    // cache: false,
                    success:function(data){
                         table2.ajax.reload();
                        notify_success(data);
                       
                    }
            });
            return false;   
           
        });
        $(document).on('click', '.modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
  });

  /*
  Modal Confirm
  */
  $(document).on('click', '.cek_barang', function (e) {
   var id=$(this).attr('data');
   $('#id_peminjam').val(id);
    table2.ajax.reload();
   $('.cek_barang').magnificPopup();
    
  });

    });

</script>