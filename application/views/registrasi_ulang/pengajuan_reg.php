
<div class="row">
  <div class="col-md-3" data-plugin-portlet id="portlet-1">
  <?php if ($user>0): ?>
       <section class="panel panel-primary" id="panel-1" data-portlet-item>
                 <header class="panel-heading">
                  <div class="panel-actions">
                    <a href="#" class="fa fa-caret-up"></a>
                    
                  </div>

                  <h2 class="panel-title">Registrasi Darurat</h2>
                </header>
                <div class="panel-body" id="body">
                  <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>Registrasi Darurat Dapat di lakukan Apa bila ada kondisi yang tidak memungkinakan.<br>Silahkan Membuat pengajuan Untuk mengatifkan Registrasi darurat Pengajuan di berikan kepada WD 1</p>
                  </div>
                 <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="mulai" <?php echo portal_reg(); ?>>Mulai</button>

                </div>
              </section>
    <?php endif ?>
             

              <section class="panel panel-secondary" id="panel-2" data-portlet-item>
                <header class="panel-heading portlet-handler">
                  <div class="panel-actions">
                    <a href="#" class="fa fa-caret-up"></a>
                   
                  </div>

                  <h2 class="panel-title">Cetak Laporan</h2>
                </header>
                <div class="panel-body" id="body1">
                  <div class="btn-group" style="margin-bottom: 10px;">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-print"> </i> Cetak Laporan <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="item_cetak" data="0">Seluruh Prodi</a></li>
                                        <?php foreach ($prodi as $data): ?>
                                          <li><a href="#" class="item_cetak" data="<?=$data->kode_prodi;?>"><?=$data->nama_prodi?></a></li>
                                        <?php endforeach ?>
                                        </ul>
                                                    </div>
                </div>
              </section>
              
            </div>
					
                    <div class="col-md-9" style="padding-left: 0px;padding-right: 0">
                            <div class="tabs tabs-primary">
                                <ul class="nav nav-tabs nav-justified">
                                    <?php foreach ($semester as $key){ 
                                        if ($key->id=="1"){
                                            $active='active';
                                        }else{
                                            $active='';
                                        }

                                            ?>
                                         
                                    <li class="<?=$active;?>">
                                        <a href="#data" data-toggle="tab" class="text-center" onclick="cek(<?=$key->id;?>);" ><?=$key->nama;?></a>
                                    </li>
                                    <?php } ?>
                                   
                                    
                                </ul>
                                <div class="tab-content">
                                    <div id="data" class="tab-pane active">
                                     
                 <br>

                                    <input type="hidden" name="sems" id="sems" value="1">
                                       <table id="mydata" class="table table-bordered table-striped nowrap" style="width: 100%">
                                            <thead>
                                                <tr>
                                                     <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th class="hidden-480">Prodi</th>
                                                    <th class="detail-col">tgl Pengajuan</th>
                                                    <th>Status</th>
                                               
                                                    

                                                   
                                                </tr>
                                            </thead>

                                            <tbody id="show_data">
                                               
                                                <tr>
              <td colspan="5">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Alat</th>
                      <th>Spesifikiasi Alat</th>
                      <th>Jumlah</th>
                      <th>Kondisi Awal</th>
                      <th>Tanggal Kembali</th>
                      <th>Kondisi Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Jember</td>
                      <td>1998 - 2004</td>
                      <td>Jember</td>
                      <td>1998 - 2004</td>
                      <td>Jember</td>
                      <td>1998 - 2004</td>
                    </tr>
                    
                  </tbody>
                </table>
              </td>
            </tr>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
								</div><!-- /.row -->

       
        <div class="modal fade" id="ModalAjukan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Data</h4>
                    </div>
                   
                    <div class="modal-body">
                           <div class="alert alert-warning"><p>Apakah Anda yakin Data Berikut Ingin Anda Ajukan Untuk Registrasi Ulang?</p></div>                
                          <div class="form-group">
                             <label class="col-sm-3 control-label">NIM</label>
                                <div class="col-sm-9">
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="eg.: Jenis pengumuman  "  disabled />
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Prog. Studi</label>
                                <div class="col-sm-9">
                                <input type="text" name="prodi" id="prodi" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Kelas/Semsester</label>
                                <div class="col-sm-9">
                                <input type="text" name="semester" id="semester" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Tahun Akademik</label>
                                <div class="col-sm-9">
                                <input type="text" name="thun_a" id="thun_a" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                           
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_ajukan">OK</button>
                    </div>
                    
                </div>
            </div>
        </div>

         <div class="modal fade" id="ModalDaftarkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Data</h4>
                    </div>
                   
                    <div class="modal-body">
                           <div class="alert alert-warning"><p>Apakah Anda yakin Data Berikut Ingin Anda Daftarkan Untuk Registrasi Ulang?</p></div>                
                          <div class="form-group">
                             <label class="col-sm-3 control-label">NIM</label>
                                <div class="col-sm-9">
                                <input type="text" name="dnim" id="dnim" class="form-control" placeholder="eg.: Jenis pengumuman  "  disabled />
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                <input type="text" name="dnama" id="dnama" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Prog. Studi</label>
                                <div class="col-sm-9">
                                <input type="text" name="dprodi" id="dprodi" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Kelas/Semsester</label>
                                <div class="col-sm-9">
                                <input type="text" name="dsemester" id="dsemester" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Tahun Akademik</label>
                                <div class="col-sm-9">
                                <input type="text" name="dthun_a" id="dthun_a" class="form-control" placeholder="eg.: Jenis pengumuman  " disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Status Mahasiswa</label>
                                <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="Aktif" >Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_daftar">OK</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
							
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
    var table;
	$(document).ready(function() {
     $('.la').click(function(){
       $(this).toggleClass('expand').nextUntil('tr.la').slideToggle(100);
  });
$('.la').click();
$('#body').hide();
$('#body1').hide();
    table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": false, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/r_pengajuan/data_pengajuan')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()} );
                    
                  }
         }); 

    $('#show_data').on('click','.item_daftarkan',function(){
         var nim=$(this).attr('data');
           $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/r_pengajuan/get_regis_mhs')?>",
                dataType : "JSON",
                 data : {nim:nim},
                success: function(data){
                  $.each(data,function(nama_mhs,thn_akademik,prodi,semester){
                    $('#ModalDaftarkan').modal('show');
                    $('#dnim').val(nim);
                    $('#dnama').val(data.nama_mhs);
                    $('#dprodi').val(data.prodi);
                    $('#dsemester').val(data.semester);
                     $('#dthun_a').val(data.thn_akademik);
                });
                }
            });
           
        });

    $('#show_data').on('click','.item_ajukan',function(){
         var id=$(this).attr('data');
             $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/r_pengajuan/get_data_pengajuan')?>",
                dataType : "JSON",
                success: function(data){
                  $.each(data,function(thn_akademik){
                    $('#ModalAjukan').modal('show');
                 $('#thun_a').val(data.thn_akademik);
                });
                }
            });
           $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/r_pengajuan/get_data_mhs')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(nama_mhs,prodi,semester){
                    $('#ModalAjukan').modal('show');
                    $('#nim').val(id);
                    $('#nama').val(data.nama_mhs);
                    $('#prodi').val(data.prodi);
                    $('#semester').val(data.semester);
                  
                });
                }
            });
        });
   
     $('#btn_ajukan').on('click',function(){
            var nim=$('#nim').val();
            var thun_a=$('#thun_a').val();
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/r_pengajuan/simpan_pengajuan')?>",
                dataType : "JSON",
                data : {nim:nim,thun_a:thun_a},
                        success: function(data){
                        $('#ModalAjukan').modal('hide');
                       table.ajax.reload(); 
                        notify_success(data.pesan);
                
                    }
                });
                return false;
            });

     $('#btn_daftar').on('click',function(){
            var nim=$('#dnim').val();
            var thun_a=$('#dthun_a').val();
            var status=$('#status').val();
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/r_pengajuan/simpan_pendaftaran')?>",
                dataType : "JSON",
                data : {nim:nim,thun_a:thun_a,status:status},
                        success: function(data){
                        $('#ModalDaftarkan').modal('hide');
                       table.ajax.reload(); 
                        notify_success(data.pesan);
                
                    }
                });
                return false;
           // alert(nim+'-'+thun_a+'-'+status);
            });
     $('.item_cetak').on('click',function(){
           var kode=$(this).attr('data');
           var sems=$('#sems').val();
           if (kode==0) {
             window.open("<?php echo site_url()?>laporan/cetak_all/"+sems,"_blank");
             // alert(kode+'-'+sems);
         }else{
            window.open("<?php echo site_url()?>laporan/cetak_by_prodi/"+kode+"/"+sems,"_blank");
            // alert(kode+'-'+sems);
         }
            
            });
      $('#mulai').on('click',function(){
          
             window.open("<?php echo site_url()?>r_darurat/","_self");
        
            
            });

});
function cek($id){
$('#sems').val($id);
table.ajax.reload();
}
function refresh(){
    table.ajax.reload();
}

setInterval(function(){ 
    refresh();; 
  }, 5000);

</script>