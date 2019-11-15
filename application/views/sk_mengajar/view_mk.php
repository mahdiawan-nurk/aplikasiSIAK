
		<div class="modal fade" id="Modalina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Kelas</h4>
                    </div>
                  
                    <div class="modal-body">
						<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Kode Mata Kuliah</label>
												<input type="text" name="kode_mk" id="kode_mk" class="form-control" disabled="">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Nama Mata Kuliah</label>
												<input type="text" name="nama_mk" id="nama_mk" class="form-control" disabled="">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Jenis Mata Kuliah</label>
												<input type="text" name="jenis_mk" id="jenis_mk" class="form-control" disabled="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">SKS</label>
												<input type="email" name="sks" id="sks" class="form-control" disabled="">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Prodi</label>
												<input type="url" name="prodi" id="prodi" class="form-control" disabled="">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Semester</label>
												<input type="url" name="semester" id="semester" class="form-control" disabled="">
											</div>
										</div>
									</div>		
							<br>		
                    	<table class="table table-hover mb-none" id="datatable-defaulta">
												<thead>
													<tr>
														<th>#</th>
														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														<th>Input Nilai</th>
														<th>Huruf </th>
													</tr>
												</thead>
												<tbody id="show_dataaa">
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>Mark</td>
														<td>Otto</td>
														
													</tr>
													
												</tbody>
											</table>           
											</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       
                    </div>
                    
                </div>
            </div>
        </div>
									
							

<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Data Matakulia Mengajar</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default">
												<thead>
													<tr>
														<th>#</th>
														<th>Mata Kuliah</th>
														<th>SKS</th>
														<th>Jenis MK</th>
														<th>Prodi</th>
														<th>Semester</th>
														<th>Rombel</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="show_data">
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>@mdo</td>
														<td>@mdo</td>
														<td>@mdo</td>
														<td>@mdo</td>
														<td class="actions-hover actions-fade">
															<a href=""><i class="fa fa-pencil"></i></a>
															<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>



<div class="modal fade" id="ModalLihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Kelas</h4>
                    </div>
                  
                    <div class="modal-body">

                    	<table>
                    		<tr><td><label>Rombel </label></td><td><label>: </label></td><td><label id="t1"></label></td></tr>
                    		<input type="hidden" name="rombel" id="rombel" value="">
                    		<tr><td><label>Prodi </label></td><td><label>: </label></td><td><label id="t2"></label></td></tr>
                    		<tr><td><label>Semester </label></td><td><label>: </label></td><td><label id="t3"></label></td></tr>
                    	</table>
                         <table class="table table-hover mb-none" id="datatable-default1">
												<thead>
													<tr>
														<th>#</th>
														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														
													</tr>
												</thead>
												<tbody id="show_data">
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														
													</tr>
													
												</tbody>
											</table>                 
                            
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        
                    </div>
                  
                </div>
            </div>
        </div>

<div class="modal fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Kelas</h4>
                    </div>
                  
                    <div class="modal-body">

                    	<table>
                    		<tr><td><label>Matakuliah </label></td><td><label>: </label></td><td><label ></label></td></tr>
                    		<tr><td><label>SKS </label></td><td><label>: </label></td><td><label ></label></td></tr>
                    		<tr><td><label>Prodi </label></td><td><label>: </label></td><td><label ></label></td></tr>
                    		<tr><td><label>Semester </label></td><td><label>: </label></td><td><label ></label></td></tr>
                    	</table>
                         <table class="table table-hover mb-none" id="datatable-default">
												<thead>
													<tr>
														<th>#</th>
														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														<th>Input Nilai</th>
														<th>Huruf </th>
													</tr>
												</thead>
												<tbody id="show_data">
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>Mark</td>
														<td>Otto</td>
														
													</tr>
													
												</tbody>
											</table>                 
                            
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        
                    </div>
                  
                </div>
            </div>
        </div>
<div class="modal animated rotateInDownLeft" id="Modalaja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
               
                    <div class="modal-body">
                                          
                            <input type="text" name="nilai" id="nilai" value="" class="form-control">
                            <input type="hidden" name="nim" id="nim" value="">
                            <input type="hidden" name="kode" id="kode" value="">
                           
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-primary" id="btn-save">simpan</button>
                    </div>
                 
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
                  "sAjaxSource": "<?php echo site_url('mk_mengajar/data_ajar')?>",
                  // "autoWidth": false,
                  
                    
              
         });  
         table1 = $('#datatable-default1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('mk_mengajar/data_mhs')?>",
                   "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "rombel", "value": $('#rombel').val()});
                    
                  }
                  
                    
              
         });  
         table2 = $('#datatable-defaulta').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('mk_mengajar/input_nilai')?>",
                   "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "kode_mk", "value": $('#kode_mk').val()});
                    
                  }
                  
                    
              
         });  


$('#show_data').on('click','#lihat_kelas',function(){
   var id=$(this).attr('data');
   $('#rombel').val(id);
   table1.ajax.reload();
   		$.ajax({
                type : "POST",
                url  : "<?php echo base_url('mk_mengajar/data_rm')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                         $('#ModalLihat').modal('show');
                        $('#t1').text(data.rombel);
                        $('#t2').text(data.prodi);
                        $('#t3').text(data.semester);
                
                    }
                });

          
        });


$('#show_data').on('click','#input',function(){
var mk=$(this).attr('data-mk');
var rm=$(this).attr('data-rm');
$('#kode_mk').val(mk);
table2.ajax.reload();
$.ajax({
                type : "POST",
                url  : "<?php echo base_url('mk_mengajar/data_mk')?>",
                dataType : "JSON",
                data : {mk:mk},
                        success: function(data){
                        	$('#Modalina').modal('show');
            $('#kode_mk').val(data.kode_mk);
                        $('#nama_mk').val(data.nama_mk);
                        $('#jenis_mk').val(data.jenis_mk);
                        $('#sks').val(data.sks);
                        $('#prodi').val(data.prodi);
                        $('#semester').val(data.semester);
                
                    }
                });
// alert(mk);
          
        });
$(document).on('click', '.modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
$('#show_dataaa').on('click','#add',function(){
	var mk=$(this).attr('data-mk');
	var nim=$(this).attr('data');
	$('#kode').val(mk);
    $('#nim').val(nim);
   $('#Modalaja').modal('show');
            
 
          
        });

$('#btn-save').on('click',function(){
	var nilai=$('#nilai').val();
	var mk=$('#kode').val();
	var nim=$('#nim').val();

	$.ajax({
                type : "POST",
                url  : "<?php echo base_url('mk_mengajar/save_nilai')?>",
                
                data : {nilai:nilai,mk:mk,nim:nim},
                        success: function(data){
                        	table2.ajax.reload();
                        	notify_success(data.pesan);
                        	$('#Modalaja').modal('hide');
                			$('#Modalina').modal('show');

                    }
                });
 
  });

});
  </script>