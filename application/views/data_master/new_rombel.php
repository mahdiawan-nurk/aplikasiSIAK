<div class="row">
<div class="col-md-12">
							<div class="tabs tabs-vertical tabs-left">
								<ul class="nav nav-tabs col-sm-2 col-xs-5">
									<li class="active">
										<a href="#popular11" data-toggle="tab"><i class="fa fa-star"></i> Jenis Rombel</a>
									</li>
									<li>
										<a href="#recent11" data-toggle="tab">Setting Mhs Rombel</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="popular11" class="tab-pane active">
										<p><button class="btn btn-primary btn-sm add-new"><i class="fa fa-plus"> </i> New Rombel</button></p>
										<div class="table-responsive">
									<form method="POST" id="form-pilih" action="<?=base_url('b_rombel/delete_rombel');?>">		
									<table class="table table-bordered table-striped table-condensed mb-none" id="tabel-jenis">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Rombel</th>
												<th>Angkatan</th>
												<th>Dosen Wali</th>
												<th>Act</th>
												<th></th>
												
											</tr>
										</thead>
										<tbody id="show_jenis">
											<tr>
												
												
											</tr>
										
										</tbody>
									</table>
									
									</form>
									<button class="btn btn-danger btn-sm" id="btn-hapus"><i class="fa fa-trash-o"></i> Hapus</button>
								</div>
									</div>
									<div id="recent11" class="tab-pane">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
									</div>
								</div>
							</div>
						</div>
</div>

<div class="modal fade" id="ModalaAdd-jenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Data</h4>
                    </div>
                    <form class="form-horizontal" id="rest-form">
                    <div class="modal-body">
                        				<div class="form-group">
											<label class="col-sm-4 control-label">Nama Rombel:</label>
											<div class="col-sm-8">
												<input type="hidden" name="id_rombel" class="form-control" value="0">
												<input type="text" name="nama_rombel" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Angkatan:</label>
											<div class="col-sm-8">
												<?php echo form_dropdown('angkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="angkatan" required'); ?>
											</div>
										</div>   
										<div class="form-group">
											<label class="col-sm-4 control-label">Prog. Studi:</label>
											<div class="col-sm-8">
												<input name="id_prodi" id="id_prodi" class="form-control" type="text" value="<?=$prodi->nama_prodi?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Dosen Wali:</label>
											<div class="col-sm-8">
												<?php echo form_dropdown('dosen', $dosen, $d['nrp'], 'class="form-control" id="dosen" required'); ?>
											</div>
										</div>                  
                          
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn-save">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

 <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                  
                    <div class="modal-body">
                                          
                           
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn-ok">Hapus</button>
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
                  "sAjaxSource": "<?php echo site_url('index.php/b_rombel/data_rombel_mhs')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "rombel", "value": $('#rombel').val()} );
                    
                  }
         });      
         table1 = $('#tabel-jenis').DataTable({
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

 $('#show_jenis').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('index.php/b_rombel/get_rombel_jenis')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                 
                      $('#ModalaAdd-jenis').modal('show');
                         $('[name="id_rombel"]').val(data.id);
                         $('[name="nama_rombel"]').val(data.nama_rombel);
                         $('[name="angkatan"]').val(data.angkatan);
                         $('[name="dosen"]').val(data.dosen);
                       
              
                }
            });
            return false;
            // alert(id);
        });

$('.add-new').on('click',function(){
	$('#rest-form')[0].reset()
$('#ModalaAdd-jenis').modal('show');
});

$('#btn-save').on('click',function(){
	var id=$('[name="id_rombel"]').val();
 	var nama_r=$('[name="nama_rombel"]').val();
 	var angkatan=$('[name="angkatan"]').val();
 	var dosen=$('[name="dosen"]').val();
 	var url;
 	if (id=="0") {
 		url="index.php/b_rombel/save_rombel"
 	}else{
 		url="index.php/b_rombel/update_rombel"
     $.ajax({

                type : "POST",
                url  : "<?php echo base_url()?>"+url,
                dataType : "JSON",
                data : {id:id,nama_r:nama_r,angkatan:angkatan,dosen:dosen},
                success: function(data){
                	$('#ModalaAdd-jenis').modal('hide');
                	table1.ajax.reload();
                   notify_success(data.pesan);

                }
            });
            return false;
 	}
});

// $('#btn-hapus').on('click',function(e){
//             $('#ModalHapus').modal('show');
//         });
// $('#btn-ok').on('click',function(){
            
//              $('#form-pilih').submit();
//         });

 });


  </script>