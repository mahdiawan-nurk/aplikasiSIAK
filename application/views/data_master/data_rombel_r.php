<div class="row panel-body">
<div class="col-md-12 col-xl-12">
	
			<div class="panel-body">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" id="add_rombel">Tambah/Edit Rombel</button>
									
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" id="cancel">Cancel</button>
									
								</div>				
									</div>
<div class="col-md-6 col-xl-12" >
<section class="panel" id="tampil">
                      <div class="panel-body bg-quartenary">
                        <div class="widget-summary">
                          <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                              <i class="fa fa-users"></i>
                            </div>
                          </div>
                          <div class="widget-summary-col">
                          	<form id="logForm">
                            <div class="summary" id="tampil">
                              <table id="log">
                              	<input name="id_rm" id="id_rm" class="form-control" type="hidden" required>
                                <tr><td><h4 class="title">Rombel &nbsp;</h4></td><td><?php echo form_dropdown('rombel', $room, $d['id_rombel'], 'class="form-control" id="rombel" required'); ?></td></tr>
                                <tr><td><h4 class="title">Angkatan&nbsp; </h4></td><td><h4>:&nbsp;<label id="angkatan"></label></h4></td></tr>
                                <tr><td><h4 class="title">Prodi&nbsp; </h4></td><td><h4>:&nbsp;<label id="prodi"></label></h4></td></tr>
                                <tr><td><h4 class="title">Dosen Wali&nbsp; </h4></td><td><h4>:&nbsp;<label id="dosen"></label></h4></td></tr>
                              </table>
                            </div>
                             <div class="summary-footer">
                            	<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn_rm_can" ><i class="fa fa-plus"></i> Cancel/kembali</button>
                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn_rm" ><i class="fa fa-plus"></i> Add Mahasiswa</button>
                            
                          </div>
                        </form>
                          </div>
                        </div>
                      </div>
                    </section>

<section class="panel" id="hide">
                      <div class="panel-body bg-quartenary">
                        <div class="widget-summary">
                          <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                              <i class="fa fa-users"></i>
                            </div>
                          </div>
                          <div class="widget-summary-col">
                        
                            <div class="col-xl-12" >
                              <form id="logForm1">
                              <table>
                              	<input name="id_rombel" id="id_rombel" class="form-control" type="hidden" value="0">

                                <tr><td><h4 class="title">Rombel &nbsp;</h4></td><td>&nbsp;<input name="nama" id="nama" class="form-control" type="text" required></td></tr>

                                <tr><td><h4 class="title">Angkatan&nbsp; </h4></td><td>&nbsp;<?php echo form_dropdown('aangkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="aangkatan" required'); ?></td></tr>

                                <tr><td><h4 class="title">Prodi&nbsp; </h4></td><td>&nbsp;
                                	<input name="id_prodi" id="id_prodi" class="form-control" type="hidden" value="<?=$prodi->kode_prodi?>" disabled>

                                	<input name="prodi" id="prodi" class="form-control" type="text" value="<?=$prodi->nama_prodi?>" disabled></td></tr>

                                <tr><td><h4 class="title">Dosen Wali&nbsp; </h4></td><td>&nbsp;<?php echo form_dropdown('adosen', $dosen, $d['nrp'], 'class="form-control" id="adosen" required'); ?></td></tr>

                              </table>
                              </form>
                            </div>
                            <div class="summary-footer">
                            	<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn-cancel"><i class="fa fa-floppy-o "></i> Cancel</button>
                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn-add"><i class="fa fa-floppy-o "></i> Simpan</button>
                            
                          </div>
                        

                          </div>
                        </div>
                      </div>
                    </section>	
									</div>
									<div class="col-md-6 col-lg-6 col-xl-3">
								     
										<div class="table-responsive" id="tabel1">
											<table class="table table-striped mb-none" id="datatable-default">
												<thead>
													<tr>
													
														<th>NiM</th>
														<th>Nama</th>
														<th>Semester</th>
														<th>Rombel</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														
													</tr>
													
												</tbody>
											</table>
										</div>
										<div class="table-responsive" id="tabel2">
											<table class="table table-striped mb-none" id="datatable-default1">
												<thead>
													<tr>
													
														<th>Rombel</th>
														<th>Angkatan</th>
														<th>prodi</th>
														<th>Dosen Wali</th>
														<th>Act</th>
													</tr>
												</thead>
												<tbody id="show_data1">
													<tr>
														
													</tr>
													
												</tbody>
											</table>
										</div>
										<div class="table-responsive" id="tabel4">
											   <!-- <div>
                                                            <label for="form-field-9">Rombel</label>

                                                            <?php echo form_dropdown('room', $room, $d['id'], 'class="form-control" id="room" required'); ?>
                                                        </div> -->
											<div>
                                                            <label for="form-field-9">semester</label>

                                                            <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?>
                                                        </div>
                                                     
                                             
											<table class="table table-striped mb-none" id="datatable-default2">
												<thead>
													<tr>
													
														
														<th>NIM</th>
														<th>Nama</th>
														<th>Semester</th>
														<th></th>
														
													</tr>
												</thead>
												<tbody id="show_data2">
													<tr>
														
													</tr>
													
												</tbody>
											</table>
										</div>
							</div>
								</div>
 <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " role="document">
                <div class="modal-content danger">
                    <div class="modal-header btn-danger" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
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
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	var table;
	var table1;
	var table2;
 $(document).ready(function() {

//datatables
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/b_rombel/data_rombel_mhs')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "rombel", "value": $('#rombel').val()} );
                    
                  }
         });      
         table1 = $('#datatable-default1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/b_rombel/data_rombel')?>",
                  // "autoWidth": false,
                
         });

         table2 = $('#datatable-default2').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/b_rombel/data_mhs')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "semester", "value": $('#semester').val()},{ "name": "id_rm", "value": $('#id_rm').val()} );
                    
                  }
                
         });

$("#semester").change(function(){
          table2.ajax.reload();
  });  
$("#room").change(function(){
          table2.ajax.reload();
  });  

 $('#show_data1').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $('#btn-cancel').show();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/b_rombel/get_rombel')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(nama_rombel, id_angkatan, id_prodi, nrp){
                    
                       $('#id_rombel').val(id);
                      $('#nama').val(data.nama_rombel);
                        $('#aangkatan').val(data.id_angkatan);
                     $('#id_prodi').val(data.id_prodi);
                      $('#adosen').val(data.nrp);
                     
                });
                }
            });
            return false;
            // alert(id);
        });
 $('#show_data2').on('click','#checkboxExample2',function(){
            var nim=$(this).attr('data');
            var id=$(this).data('id');
             $.ajax({

                type : "POST",
                url  : "<?php echo base_url('index.php/b_rombel/save_rombel_mhs')?>",
                dataType : "JSON",
                data : {id:id,nim:nim},
                success: function(data){
                	table2.ajax.reload();
                   notify_success(data.pesan);

                }
            });
            return false;
            // alert(nim+'and'+id);
        });

 $("#rombel").change(function(){
 	 table.ajax.reload();
          var id=$('#rombel').val();
          if (id!='') {
          	$('#btn_rm').show();
          	
          $.ajax({

                type : "POST",
                url  : "<?php echo base_url('index.php/b_rombel/get_rombel')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_rombel, thn_angkatan, prodi, dosen){
                  	$('#id_rm').val(id);
                    $('#angkatan').html(data.thn_angkatan);
                     $('#prodi').html(data.prodi);
                      $('#dosen').html(data.dosen);
                      
                });

                }
            });
         
      }else{
      	$('#btn_rm').hide();
      	$('#btn_rm_can').hide();
 			$('#angkatan').html('');
                     $('#prodi').html('');
                      $('#dosen').html('');
      }
            return false;
          });
 $('#btn-cancel').on('click',function(){
 	
   $('#logForm1')[0].reset();
     // $('#btn-cancel').hide();
        });
 $('#btn-add').on('click',function(){
 	var id=$('#id_rombel').val();
 	var nama_r=$('#nama').val();
 	var angkatan=$('#aangkatan').val();
 	var prodi=$('#id_prodi').val();
 	var dosen=$('#adosen').val();
     $.ajax({

                type : "POST",
                url  : "<?php echo base_url('index.php/b_rombel/save_rombel')?>",
                dataType : "JSON",
                data : {id:id,nama_r:nama_r,angkatan:angkatan,prodi:prodi,dosen:dosen},
                success: function(data){
                	table1.ajax.reload();
                   notify_success(data.pesan);

                }
            });
            return false;
     // alert(prodi);
    
        });

 $('#show_data1').on('click','.item_hapus',function(){
 	 var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);

	});

  $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/b_rombel/delete_data')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                           
                    $('#ModalHapus').modal('hide');
                    table1.ajax.reload();
                    notify_success(data.pesan);
          
                    }
                });
                return false;
              
            });
		
	$('#btn_rm').on('click',function(){
     var id_a=$('#id_rm').val();
     $('#btn_rm_can').show();
     $('#tabel2').hide();
     $('#tabel1').hide();
     $('#tabel4').show();
     table2.ajax.reload();
    
        });
	$('#btn_rm_can').on('click',function(){
     
     $('#tabel2').hide();
     $('#tabel1').show();
     $('#tabel4').hide();
  		$('#btn_rm_can').hide();
  		table.ajax.reload();
    
        });
 $('#cancel').on('click',function(){
     $('#hide').hide();
     $('#tampil').show();
     $('#cancel').hide();
     $('#add_rombel').show();
     $('#tabel2').hide();
     $('#tabel1').show();
    
        });
  $('#add_rombel').on('click',function(){
     $('#hide').show();
     $('#tampil').hide();
     $('#cancel').show();
     $('#add_rombel').hide();
     $('#tabel2').show();
     $('#tabel1').hide();
     $('#btn-cancel').hide();
   
        });

 $('#hide').hide();
  
 $('#cancel').hide();
 $('#tabel2').hide();
 $('#tabel4').hide();
 
 $('#btn_rm').hide();
 $('#btn_rm_can').hide();
 });


  </script>