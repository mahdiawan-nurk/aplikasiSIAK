
<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">

										<h2 class="panel-title">Data SK Mengajar Dosen</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<button class="btn btn-primary" id="btn-add">Tambah Data SK</button>
											<table class="table table-hover mb-none" id="datatable-default">
												<thead >
													<tr>
														<th>No</th>
														<th>No SK</th>
														<th>NRP Dosen</th>
														<th>Nama Dosen</th>
														<th>Tgl SK</th>
														<th>Tahun Akademik</th>
														<th>Act</th>
													</tr>
												</thead>
												<tbody id="show_data">
													
													
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>
<div class="modal animated rotateInDownLeft" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">From Add SK</h4>
                    </div>
                 		<form id="logForm">

                    <div class="modal-body">
                     	<section class="panel">
								
						
								<div class="panel-body" >
									
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Tahun Akademik</label>
												<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="hidden" class="form-control" disabled="" id="id" value="0">
														<input type="hidden" class="form-control" disabled="" id="thn_akd" value="<?php echo $thn_akd->id_thnakad ?>">
														<input type="text" class="form-control" disabled="" value="<?php echo $thn_akd->keterangan?> Semester <?php echo$thn_akd->ta_tipe ?>" requreid>
													</div>
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Tanggal SK</label>
												<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control" id="tgl_sk" required="">
													</div>
											</div>
										</div>
									</div>

										<div class="row">

										<div class="col-sm-3">
											<div class="form-group">
												<label class="control-label">Nomor Depan</label>
												<input type="text" name="lastname" class="form-control" id="no_depan" required="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Nomor Tengah</label>
												<input type="text" name="lastname" class="form-control" id="no_tengah" disabled="" value="/PK.1/KEP/BAAK-AKD/">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label class="control-label">Nomor Belakang</label>
												<input type="text" name="lastname" class="form-control" id="no_belk" required="">
											</div>
										</div>
									</div>
										
									<div class="row">
										<div class="col-sm-12">
											<br>
											<div class="checkbox-custom checkbox-primary">
																<input type="checkbox"  id="checkboxExample2">
																<label for="checkboxExample2">Dosen LB</label>
															</div>
						

											<div class="form-group">
												<label class="control-label">Dosen Pengajar</label>
												<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-user"></i>
														</span>
														 <?php echo form_dropdown('dosen', $dosen, $d['nrp'], 'class="form-control" id="dosen" required'); ?>
														 <?php echo form_dropdown('dosen_lb', $dosen_lb, $d['id_dosen_lb'], 'class="form-control" id="dosen_lb" required'); ?>
													</div>
											</div>
										</div>
										
									</div>
									
								</div>
							
                            
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-primary" id="btn-save">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


<div class="modal animated rotateInDownLeft" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="text" name="kode" id="kode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus Data ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn-hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	var table;
 $(document).ready(function() {
$('#dosen_lb').hide();


       table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('sk_mengajar/data_sk')?>",
                  // "autoWidth": false,
                  
         });  


 

 $('#checkboxExample2').on('click',function(){
         var aktiv=$('#checkboxExample2:checked').length;
         if (aktiv=="1") {
         	$('#dosen_lb').show();
         	$('#dosen').hide();
         }else{
         	$('#dosen_lb').hide();
         	$('#dosen').show();
         }
         
        });
$('#btn-add').on('click',function(){
	$('#logForm')[0].reset();
			$('#dosen_lb').hide();
         	$('#ModalAdd').modal('show');
         
        });
$("#tgl_sk").change(function(){
	var tgl=$('#tgl_sk').val();

         $('#no_belk').val(tgl.substr(0,2)+'.'+tgl.substr(6.4));
  });

 $('#btn-save').on('click',function(){
        	var id=$('#id').val()
        	var no_depan=$('#no_depan').val();
        	var no_tengah=$('#no_tengah').val();
        	var no_belk=$('#no_belk').val();

            var thn_akd=$('#thn_akd').val();
            var no_sk=no_depan+''+no_tengah+''+no_belk;
            var tgl_sk=$('#tgl_sk').val();
             var dosen=$('#dosen').val();
             var dosen_lb=$('#dosen_lb').val();
             if (dosen=='') {
             	var id_dsn=dosen_lb;
             }else if(dosen!=''){
             	var id_dsn=dosen;
             }else if (dosen_lb=='') {
             	var id_dsn=dosen;
             }else if (dosen_lb!='') {
             	var id_dsn=dosen_lb;
             }
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('sk_mengajar/create_sk')?>",
                data : {id:id,thn_akd:thn_akd,no_sk:no_sk,tgl_sk:tgl_sk,id_dsn:id_dsn},
                // dataType:"JSON",
                success: function(data){
                   if (data.status==200) {
                   	$('#ModalAdd').modal('hide');
                   table.ajax.reload();
                   	notify_success(data.pesan);
                   }else{
                   	notify_error(data.pesan);
                   }
                    
                    
                }
            });
            return false;
         
            
        
        });

$('#show_data').on('click','#lihat_sk',function(){
            var id=$(this).attr('data');
            window.open("<?php echo site_url()?>s_sk_ajar/sk2/"+id,"_blank");
        });

$('#show_data').on('click','#item_edit',function(){
           var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('sk_mengajar/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_sk, no_sk, tgl_sk, id_dosen,dosen,dosen_lb){
                     $('#ModalAdd').modal('show');
                       $('#id').val(data.id_sk);
                         $('#no_sk').val(data.no_sk);
                         $('#tgl_sk').val(data.tgl_sk);
                         if (data.dosen=="1") {
                         	$('#dosen').show();
                         	$('#dosen_lb').hide();
                         	$('#checkboxExample2').attr("checked",false);
                         	 $('#dosen').val(data.id_dosen);
                         }else if (data.dosen_lb=="1") {
                         	$('#checkboxExample2').attr("checked",true);
                         	$('#dosen_lb').show();
                         	$('#dosen').hide();
                         	 $('#dosen_lb').val(data.id_dosen);
                         }
                         
                });
                }
            });
            return false;

        });

$('#show_data').on('click','#item_hapus',function(){
            var id=$(this).attr('data');
            $('#kode').val(id);
            $('#ModalHapus').modal('show');
        });
$('#btn-hapus').on('click',function(){
        	var id=$('#kode').val()
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('sk_mengajar/delete_sk')?>",
                data : {id:id},
                // dataType:"JSON",
                success: function(data){
                   if (data.status==200) {
                   	$('#ModalHapus').modal('hide');
                   table.ajax.reload();
                   	notify_success(data.pesan);
                   }
                    
                    
                }
            });
            return false;
         
            
        
        });

});
  </script>