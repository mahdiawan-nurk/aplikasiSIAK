<div class="alert alert-warning">
                    <input type="hidden" name="time" id="time" value="<?php echo $time->tgl_selesaip ?>">
                  <p>Batas Waktu Untuk Pendistribusian Beban Ajar <strong id="mundur"></strong></p>
                  </div>
                
<div class="row" >
							<div class="col-xl-12" id="add_data">
                <form id="logForm">
              <section class="panel">
                <header class="panel-heading">
                  <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                  </div>

                  <h2 class="panel-title">Form Dosen Pengajar</h2>

                 
                </header>
                <div class="panel-body">
                  <div class="col-sm-12">
                    <div class="row">
                       <div class="form-group">
                        <label for="form-field-9">Tahun Akademik</label>
                       <input type="text" name="t_akd" id="t_akd" disabled="" class="form-control" value="<?php echo 'Semester '.$akademik1->ta_tipe.' '.$akademik1->thun_akademik ?>">
                      </div>
                      <div class="form-group">
                        <label for="form-field-9">Kurikulum</label>
                       <?php echo form_dropdown('kurikulum', $kurikulum, $d['id_kur'], 'class="form-control" id="kurikulum" required'); ?>
                      </div>
                      <div class="form-group">
                        <label for="form-field-9">Semester</label>
                       <!-- <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?> -->
                       <select class="form-control" id="semester" name="semester"></select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
           
                <section class="panel">
                  <header class="panel-heading">
                    

                    <h2 class="panel-title">Matakuliah</h2>
                    
                  </header>
                  <div class="panel-body">
                    <div class="form-group">
                       <input type="hidden" name="kode_mk" id="kode_mk">
                     <div id="tampil_mk"></div>
                    

                    </div>
                  </div>
                  
                </section>
              
            </div>
                     <div class="col-md-4">
             
                <section class="panel">
                  <header class="panel-heading">
                    

                    <h2 class="panel-title">Dosen Pengajar</h2>
                    
                  </header>
                  <div class="panel-body">
                    <div class="form-group" id="dsn_prodi">
                      <label class="col-sm-4 control-label">Dosen Prodi</label>
                     <?php echo form_dropdown('dosen', $dosen, $d['nrp'], 'class="form-control" id="dosen" required'); ?>
                   </div>
                     <div class="form-group" id="dsn_lb">
                      <label class="col-sm-4 control-label">Dosen LB</label>
                   <?php echo form_dropdown('dosen_lb', $dosen_lb, $d['id_dosen_lb'], 'class="form-control" id="dosen_lb" required'); ?>
                 </div>
                   <div class="form-group" id="dsn_sl">
                    <label class="col-sm-4 control-label">Dosen Silang</label>
                    <?php echo form_dropdown('dosen_sl', $dosen_sl, $d['nrp'], 'class="form-control" id="dosen_sl" required'); ?>
                  </div>
                  <div class="radio-custom radio-primary">
                                <input type="radio" id="radioExample2" name="radioExample" class="radiodsn-pr">
                                <label for="radioExample2">Dosen Prodi</label>
                              </div>
                      <div class="radio-custom radio-primary">
                                <input type="radio" id="radioExample2" name="radioExample" class="radiodsn-lb">
                                <label for="radioExample2">Dosen LB</label>
                              </div>
                      <div class="radio-custom radio-primary">
                                <input type="radio" id="radioExample2" name="radioExample" class="radiodsn-sl">
                                <label for="radioExample2">Dosen Silang</label>
                              </div>
                    
                  </div>
                  
                </section>
              
            </div>
                     <div class="col-md-4">
             
                <section class="panel">
                  <header class="panel-heading">
                    

                    <h2 class="panel-title">Rombel</h2>
                    
                  </header>
                  <div class="panel-body">
                    <div class="form-group">
                      <input type="hidden" name="kode_rm" id="kode_rm">
                     <div id="tampil_rombel"></div>
                  </div>
                </div>
                  
                </section>
              
            </div>
            
                  </div>
                </div>
                <footer class="panel-footer">
                  <button class="btn btn-primary" id="simpan_dba">Submit data</button>
                  <button class="btn btn-danger" id="btn-cancel">Cancel</button>
                </footer>
              </section>
            </form>
            </div>
          <div class="col-xs-12 panel-body">
              <div class="col-xs-12 col-sm-2">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Search By</h4>

                                                    
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                       <div>
                                                            <label for="form-field-9">Tahun Akademik</label>

                                                          <?php echo form_dropdown('akademik', $akademik, $d['id_thnakad'], 'class="form-control" id="akademik_c" required'); ?>
                                                        </div>
                                                       <div>
                                                            <label for="form-field-9">Kurikulum</label>

                                                         <?php echo form_dropdown('kurikulum', $kurikulum, $d['id_kur'], 'class="form-control" id="kurikulum_c" required'); ?>
                                                        </div>
                                                        <div>
                                                            <label for="form-field-9">semester</label>

                                                          <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester_c" required'); ?>
                                                        </div>
                                                      <!--   <div><button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="print"> <i class="fa fa-print"></i> Print Data</button></div> -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              
<div class="col-xs-12 col-sm-10">
                 <button class="btn btn-primary" id="btn-add">Tambah data</button>
                  <table id="table1" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                           <th >Kode MaKul</th>
                           <th >Mata Kuliah</th>
                           <th >Semester</th>
                            <th >SKS</th>
                          <th >Dosen Pengajar</th>
                             
                           
                          <th>Rombel</th>
                          <th>Aksi</th>
                         
                        </tr>
                      </thead>
                      <tbody id="show_data" >
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       

                      </tbody>
                    </table>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
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
                                          
                            <input type="hiden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/dist/jquery.countdown.js"></script>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

       table = $('#table1').DataTable({
                  "paging": false,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": true, 
                "ordering": false,
                  "sAjaxSource": "<?php echo site_url('d_dbajar/datatable')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push({ "name": "semester", "value": $('#semester_c').val()},{ "name": "akademik", "value": $('#akademik_c').val()},{ "name": "kurikulum_c", "value": $('#kurikulum_c').val()} );
                    
                  }
         });     

$('#akademik_c').change(function(){
 table.ajax.reload();
});

$('#kurikulum_c').change(function(){
 table.ajax.reload();
});

$('#semester_c').change(function(){
 table.ajax.reload();
});
      
  $('#kurikulum').change(function(){
         var kurikulum=$('#kurikulum').val();
         if (kurikulum=='') {
           $('#tampil_mk').hide();
         }else {
          $('#tampil_mk').show();
         }
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dbajar/get_semester')?>",
                // data : {semester:semester},
                // dataType:"JSON",
                success: function(data){
                  $('#semester').html(data);
                }
            });

         });
   $('#semester').change(function(){
        var semester=$('#semester').val();
         var kurikulum=$('#kurikulum').val();
         if (semester=='') {
           $('#tampil_mk').hide();
         }else {
          $('#tampil_mk').show();
         }
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dbajar/get_rombel')?>",
                data : {semester:semester},
                // dataType:"JSON",
                success: function(data){
                  $('#tampil_rombel').html(data);
                }
            });
         $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dbajar/get_matkul')?>",
                data : {semester:semester,kurikulum:kurikulum},
                // dataType:"JSON",
                success: function(data){
                  $('#tampil_mk').html(data);
                
                }
            });
            return false;
         // alert();
        });
        $('#tampil_mk').on('click','#checkboxExample1',function(){
            var id=$(this).attr('data');
           $('#kode_mk').val(id);
           
        });
        $('#tampil_rombel').on('click','#checkboxExample2',function(){
            var id=$(this).attr('data');
           $('#kode_rm').val(id);
           // alert(id);
           
        });
         $('#simpan_dba').on('click',function(){
           var id_dpro=$('#dosen').val();
            var id_sl=$('#dosen_sl').val();
            var id_dlb=$('#dosen_lb').val();
            if (id_dpro!='') {
              var id_dsn=id_dpro;
            }else if (id_sl!='') {
              var id_dsn=id_sl;
            }else if (id_dlb!='') {
              var id_dsn=id_dlb;
            }
            var kode_mk=$('#kode_mk').val();
             var id_rm=$('#kode_rm').val();
            
           // 
           $('#dsn_sl').hide();
           $('#dsn_lb').hide();
           $('#dsn_prodi').hide();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dbajar/save_dbajar')?>",
                data : {kode_mk:kode_mk,id_dsn:id_dsn,id_rm:id_rm},
                // dataType:"JSON",
                success: function(data){
                  if (data.status=="berhasil") {
                    $('#logForm')[0].reset();
                  table.ajax.reload();
                  notify_success(data.pesan);
                  }else{
                    notify_error(data.pesan);
                  }
                  
                }
            });
            return false;
          
           
        });

          $('#show_data').on('click','#item_hapus',function(){
            var id=$(this).attr('data');
             $('#ModalHapus').modal('show');
           $('[name="kode"]').val(id);
         
           
        });

        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/jadwal_mk/get_data_ba')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(kode_makul, nama_makul,id_dosen){
                      $('#Modaledit').modal('show');
                       $('[name="kode_mk"]').val(data.kode_makul);
                         $('[name="nama_mk"]').val(data.nama_makul);
                          $('[name="dosen"]').val(data.id_dosen);
                         
                });
                }
            });
            return false;
            // alert(id);
        });
       $('#btn_hapus').on('click',function(){
        
            var id=$('#textkode').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('d_dbajar/delete_data')?>",
                data : {id:id},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            // alert(nrp);
        
        });

         $('#print').on('click',function(){
        var ta=$('#akademik_c').val();
        var kur=$('#kurikulum_c').val();
        var sem=$('#semester_c').val();
         alert(ta+'-'+kur+'-'+sem);
        
        });

       $('#btn-add').on('click',function(){
        
    $('#add_data').show();
        
        });
        $('#btn-cancel').on('click',function(){
        
    $('#add_data').hide();
        
        });
    $('.radiodsn-pr').on('click',function(){
        
      $('#dsn_sl').hide();
      $('#dsn_lb').hide();
      $('#dsn_prodi').show();
        
        });
    $('.radiodsn-lb').on('click',function(){
        
      $('#dsn_sl').hide();
      $('#dsn_lb').show();
      $('#dsn_prodi').hide();
        
        });
         
    $('.radiodsn-sl').on('click',function(){
        
          $('#dsn_sl').show();
           $('#dsn_lb').hide();
           $('#dsn_prodi').hide();
        
        });
        
 $('#dsn_sl').hide();
 $('#dsn_lb').hide();
 $('#dsn_prodi').hide();
 $('#add_data').hide();
 


    });
countdown();
function countdown() {
  var selesai=$('#time').val();


   
    $("#mundur").countdown(selesai, function(event) {
    $(this).text(event.strftime('%D Hari %H:%M:%S'));
    }); 
    



}
</script>

