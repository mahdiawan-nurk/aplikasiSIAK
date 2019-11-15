<div class="row">

<div class="col-lg-12" id="frm-pengumuman">
					
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Form Pengumuman</h2>

										
									</header>

										<div class="panel-body">
											<form id="logform">
											<div class="row form-group">
												<div class="col-lg-3">
													
													<input type="hidden" name="id" id="id" placeholder="id_pengumuman" class="form-control" value="0">
													<label>Jenis Pengumuman</label>
													<?php echo form_dropdown('id_jenis', $pengumuman, $d['id_jenisp'], 'class="form-control" id="id_jenis" required'); ?>
													
												</div>
												<div class="mb-md hidden-lg hidden-xl"></div>
												<div class="col-lg-2">
													<label>Tahun Akademik</label>
													<?php echo form_dropdown('thn_akademik', $thn_ak, $d['id_thnakad'], 'class="form-control" id="thn_akademik" required'); ?>
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												<div class="col-lg-2">
													<label>Tgl Distribusi</label>
													<input type="text" name="tgl-dsitribusi" placeholder="Tgl Distriusi Pengumuman" class="form-control" id="datetimepicker">
												</div>

												<div class="mb-md hidden-lg hidden-xl"></div>

												<div class="col-lg-2">
													<label>Tgl Mulai </label>
													<input type="text" name="tgl-mulai" placeholder="Tgl Mulai" class="form-control" id="datetimepicker1">
												</div>
												<div class="col-lg-3">
													<label>Tgl Selesai</label>
													<input type="text" name="tgl-selesai" placeholder="Tgl Selesai" class="form-control" id="datetimepicker2">
												</div>
											</div>
                      <div class="row">
                        <div class="col-lg-12">
                          <input type="text" name="no_surat" placeholder="No Surat" class="form-control" id="no_surat">
                        </div>
                      </div>
											<div class="row">
												<div class="col-lg-12">
													<textarea class="ckeditor" id="isi" rows="5" placeholder="Type your message"></textarea>
												</div>
											</div>
											</form>
										</div>
										<footer class="panel-footer">
												<button class="btn btn-default" id="btn-cancel" aria-hidden="true">Cancel</button>
											<button class="btn btn-primary" id="save-pengumuman">Simpan</button>
										</footer>
								</section>
						
						</div>
					

<div class="col-lg-12">
							<div class="tabs">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> Jenis Pengumuman</a>
									</li>
									<li>
										<a href="#recent10" data-toggle="tab" class="text-center">Pengumuman</a>
									</li>
                  <li>
                    <a href="#recent11" data-toggle="tab" class="text-center">Pendistribusi Pengumuman</a>
                  </li>
								</ul>
								<div class="tab-content">
									<div id="popular10" class="tab-pane active">
										<div class="panel-body">
										<button class="btn btn-primary" id="btn-addp"><i class="fa fa-plus"></i>Tambah Jenis Pengumuman</button>
										<button class="btn btn-default" id="btn-refresh">Refresh</button>
										<table id="datatable-default" class="table table-bordered table-striped mb-none">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th width="25%">Jenis Pengumuman</th>
													<th>Keterangan</th>
													<th>Aksi</th>
													
												</tr>
											</thead>

											<tbody id="show_data">
												<tr>
													
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													
												</tr>

												

											</tbody>
										</table>
										</div>
									</div>
									<div id="recent10" class="tab-pane">

										<div>
                                                            <label for="form-field-8">Jenis Pengumuman</label>

                                                            <?php echo form_dropdown('jenis_id', $pengumuman, $d['id_jenisp'], 'class="form-control" id="jenis_id" required'); ?>
                                                        </div><br>
										<button class="btn btn-primary" id="add-pengumuman"><i class="fa fa-plus"></i>Tambah Pengumuman</button>
										<button class="btn btn-default" onclick="refresh();">Refresh</button>
										<table id="datatable-default1" class="table table-bordered table-striped mb-none">
											<thead>
												<tr>
													
                          <th rowspan="2">NO</th>
													<th rowspan="2">Jenis Pengumuman</th>
													<th colspan="3" width="20%">Tgl Pengumuman</th>
												
													<th rowspan="2" >Pengumuman</th>
                          <th colspan="2">Status Validasi</th>
													<th rowspan="2">Status Pengumuman</th>
													<th rowspan="2" width="120%">Aksi</th>
													
												</tr>
                          <td>Tgl Distribusi</td>
                          <td>Tgl Mulai</td>
                          <td>Tgl Selesai</td>
                          <td>Ka Akademik</td>
                          <td> WD 1</td>
                     
                          
											</thead>

											<tbody id="show_data1">
												<tr>
													
													<td></td>
													<td></td>
													<td></td>
													<td></td>
                          <td></td>
                          <td></td>
                          <td></td>
													
												</tr>

												

											</tbody>
										</table>
										</div>
                    <div id="recent11" class="tab-pane">
                    <table id="datatable-defaulte" class="table table-bordered table-striped mb-none">
                      <thead>
                        <tr>
                          
                          <th >NO</th>
                          <th >Jenis Pengumuman</th>
                          <th >Distribusi Send</th>
                        
                          
                          
                        </tr>
                          
                     
                          
                      </thead>

                      <tbody id="show_data1">
                        <tr>
                          
                          <td></td>
                          <td></td>
                          <td></td>
                         
                          
                        </tr>

                        

                      </tbody>
                    </table>
                    </div>
									</div>
								</div>
							</div>
						

</div>
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah/Edit Jenis Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                    <input type="hidden" name="idj" id="idj" class="form-control" placeholder="eg.: Registrasi" required value="0" />
										<div class="form-group">
											<label class="col-sm-3 control-label">Jenis <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="jenis" id="jenis" class="form-control" placeholder="eg.: Registrasi" required/>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Keterangan</label>
											<div class="col-sm-9">
												<input type="text" name="Keterangan" id="Keterangan" class="form-control" placeholder="eg.: Jenis pengumuman  " />
											</div>
										</div>
                   
                </div>

                <div class="modal-footer">
                	<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   <button class="btn btn-primary" id="btn-simpan">Submit</button>
					
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
        <div class="modal fade" id="ModalaP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" style="width: 75%">
            <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body" id="tampil">

                    
                   
                </div>

                <div class="modal-footer">
                	<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
					
                </div>
            </form>
            </div>
            </div>
        </div>
        <div class="modal fade" id="ModalHapusj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kodej" id="kodej" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus Data INI?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapusj" data="hpus-jenis">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
           <div class="modal fade" id="ModalHapusp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kodep" id="kodep" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus Data INI?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapusp" data="hpus-pengumuman">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

         <div class="modal fade" id="Modalaktiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode_id" id="kode_id" value="">
                            <input type="hidden" name="kode_j" id="kode_j" value="">
                            <input type="hidden" name="kode_ak" id="kode_ak" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_aktif">Ya</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                 <script src="<?php echo base_url();?>assets/ckeditor/config.js"></script>
                                <script src="<?php echo base_url();?>assets/ckeditor/adapters/jquery.js"></script>
                                <script type="text/javascript">
                                    $('textarea.ckeditor').ckeditor();
                                </script>
<script type="text/javascript">
	var table;
	var table1;
  var table2;
	$(document).ready(function() {
			$('#datetimepicker').datetimepicker();
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
           
		$('#frm-pengumuman').hide();
		$('#frm-pengumuman-edit').hide();
		

    table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/pengumuman/data_jenis')?>",
         });         
    table1 = $('#datatable-default1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/pengumuman/data_pengumuman')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "jenis_id", "value": $('#jenis_id').val()} );
                    
                  }
         }); 
    table2 = $('#datatable-defaulte').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/pengumuman/data_distribusi')?>",
                  // "autoWidth": false,
                  
         }); 
    
 $("#jenis_id").change(function(){
       table1.ajax.reload();
  });

 $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/pengumuman/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_jenisp, nama_jenis, keterangan){
                  	$('#ModalaAdd').modal('show');
                  $('[name="idj"]').val(data.id_jenisp);
                  $('[name="jenis"]').val(data.nama_jenis);
                  $('[name="Keterangan"]').val(data.keterangan);
                  
                });
                }
            });
            return false;
        });
  $('#show_data1').on('click','.item_aktif',function(){
            var id=$(this).attr('data');
            var idj=$(this).attr('data-j');
           $('#kode_ak').val('aktif');
           $('#kode_id').val(id);
           $('#kode_j').val(idj);
         $('#Modalaktiv').modal('show');
        });
  $('#show_data1').on('click','.item_naktif',function(){
            var id=$(this).attr('data');
            var idj=$(this).attr('data-j');
           $('#kode_ak').val('naktif');
           $('#kode_id').val(id);
           $('#kode_j').val(idj);
         $('#Modalaktiv').modal('show');
        });
 $('#show_data').on('click','.item_hapusj',function(){
            var id=$(this).attr('data');
           $('#kodej').val(id);
         $('#ModalHapusj').modal('show');
        });
 $('#show_data1').on('click','.item_hapusp',function(){
            var id=$(this).attr('data');
           $('#kodep').val(id);
         $('#ModalHapusp').modal('show');
        });

     $('#btn-refresh').on('click',function(){
            table.ajax.reload(); 
            });
     $('#btn-refresh1').on('click',function(){
            table1.ajax.reload(); 
            });
     $('#btn-addp').on('click',function(){
            $('#ModalaAdd').modal('show');
            });
     $('#btn-cancel').on('click',function(){
     	$('#tbl-jenis').show();
          $('#tbl-pengumuman').show();
		$('#frm-pengumuman').hide();
            });
     
     $('#add-pengumuman').on('click',function(){
     	$('#logform')[0].reset();
     	 CKEDITOR.instances['isi'].setData('');
           $('#frm-pengumuman').show();
            });
      $('#show_data1').on('click','.item_editp',function(){
            var id=$(this).attr('data');
            $('#tbl-jenis').hide();
           $('#frm-pengumuman').hide();
           $('#frm-pengumuman').show();
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/pengumuman/get_data_p')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_pengumuman,id_jenis, thn_akademik,tgldist,tglmul,tglsel,no_surat,isi){

                  $('#id').val(data.id_pengumuman);
                  $('#id_jenis').val(data.id_jenis);
                  $('#thn_akademik').val(data.thn_akademik);
                  $('#datetimepicker').val(data.tgldist);
                  $('#datetimepicker1').val(data.tglmul);
                  $('#datetimepicker2').val(data.tglsel);
                  $('#no_surat').val(data.no_surat);
                   CKEDITOR.instances['isi'].setData(data.isi);
                });
                }
            });
            return false;
        });
     $('#save-pengumuman').on('click',function(){
     		var id=$('#id').val();
     		var jenis=$('#id_jenis').val();
          	var thnak=$('#thn_akademik').val();
            var tgldist=$('#datetimepicker').val();
            var tglmul=$('#datetimepicker1').val();
            var tglsel=$('#datetimepicker2').val();
            var no_surat=$('#no_surat').val();
             var pengumuman=CKEDITOR.instances['isi'].getData();
              $.ajax({
	            type : "POST",
	            url  : "<?php echo base_url('index.php/pengumuman/simpan_pengumuman')?>",
	            dataType : "JSON",
	            data : {id:id,jenis:jenis,thnak:thnak,tgldist:tgldist,tglmul:tglmul,tglsel:tglsel,no_surat:no_surat,pengumuman:pengumuman},
	                    success: function(data){
	                    	 $('#tbl-jenis').show();
          					 $('#frm-pengumuman').hide();
	                   table1.ajax.reload(); 
	                    notify_success(data.pesan);
                
                    }
                });
                return false;
            });

     $('#btn_hapusj').on('click',function(){
     		var id=$('#kodej').val();
     		var uri=$(this).attr('data');
              $.ajax({
	            type : "POST",
	            url  : "<?php echo base_url('pengumuman/delete/')?>"+uri,
	            dataType : "JSON",
	            data : {id:id},
	                    success: function(data){
	                    	 $('#ModalHapusj').modal('hide');
	                   table.ajax.reload(); 
	                    notify_success(data.pesan);
                
                    }
                });
                return false;
            });
      $('#btn_hapusp').on('click',function(){
     		var id=$('#kodep').val();
     		var uri=$(this).attr('data');
              $.ajax({
	            type : "POST",
	            url  : "<?php echo base_url('pengumuman/delete/')?>"+uri,
	            dataType : "JSON",
	            data : {id:id},
	                    success: function(data){
	                    	 $('#ModalHapusp').modal('hide');
	                   table1.ajax.reload(); 
	                    notify_success(data.pesan);
                
                    }
                });
                return false;
            });
     
    $('#btn-simpan').on('click',function(){
    	 var id=$('#id').val();
            var jenis=$('#jenis').val();
            var ket=$('#Keterangan').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/pengumuman/simpan_jenis')?>",
            dataType : "JSON",
            data : {id:id,jenis:jenis, ket:ket},
                    success: function(data){
                   $('#ModalaAdd').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            });

    $('#btn_aktif').on('click',function(){
            var id=$('#kode_id').val();
            var jenis=$('#kode_j').val();
            var aktifasi=$('#kode_ak').val();
           
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/pengumuman/op_aktifasi')?>",
            dataType : "JSON",
            data : {id:id,jenis:jenis,aktifasi:aktifasi},
                    success: function(data){
                      if (data.status==false) {
                        $('#Modalaktiv').modal('hide');
                    table1.ajax.reload();
                    notify_success(data.pesan);
                      }else{
                         $('#Modalaktiv').modal('hide');
                        notify_error(data.pesan);
                      }
                   
                
                    }
                });
                return false;
            
            });
    
     $('#click').on('click',function(){
            alert();
            });
     $('#show_data1').on('click','.item_lihat',function(){
     	 var id=$(this).attr('data');
           window.open("<?php echo site_url()?>pengumuman/cek_pengumuman/"+id,"_blank");
             
        });
     $('#show_data1').on('click','.item_lihat1',function(){
     	 var id=$(this).attr('data');
          $('#ModalaP').modal('show');
        $("#tampil").html('<iframe src="<?php echo base_url();?>pengumuman/cek_pengumuman/"'+id+' frameborder=true width="100%" height="400"></iframe>');
             
        });
});

function ceklist($id_j,$id_jb){
  var id_jn=$id_j;
  var id_jb=$id_jb;
 $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/pengumuman/create_dist')?>",
            dataType : "JSON",
            data : {id_jn:id_jn,id_jb:id_jb},
                    success: function(data){
                  
                    table2.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            
}

function refresh(){
    table1.ajax.reload();
}

setInterval(function(){ 
    refresh();; 
  }, 5000);
</script>