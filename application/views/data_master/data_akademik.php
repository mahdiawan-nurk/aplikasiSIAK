<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="panel-group" id="accordion2">
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
												<i class="fa fa-star"></i> Data Kurikulum
											</a>
										</h4>
									</div>
									<div id="collapse2One" class="accordion-body collapse in">
										<div class="panel-body">
											<div class="col-md-6">
								<div class="panel-body">
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default">
												<thead>
													<tr>
														<th>#</th>
														<th>Tahun Kurikulum</th>
														
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="show1">
													
												</tbody>
											</table>
										</div>
										</div>
									</div>
										<div class="col-md-6">
							<form id="lg_kur" class="form-horizontal form-bordered">
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Form Data Kurikulum</h2>

										
									</header>
								
									<div class="panel-body">
										
										<div class="form-group">
											<label class="col-sm-4 control-label">Tahun Kurikulum:</label>
											<div class="col-sm-8">
												<input type="hidden" name="id_kur" id="id_kur" value="0">
												<select class="form-control" name="kurikulum" id="kurikulum">
													<option>--Pilih Tahun--</option>
													<?php $now=date('Y'); 
													for ($i=2011; $i < $now; $i++) { 	?>
													<option value="<?=$i?>"><?=$i?></option>
													<?php }?>
												</select>
											</div>
										</div>
									
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" id="save-kur">Submit</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
						</div>
										</div>
									</div>
								</div>
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
												<i class="fa fa-cogs"></i> Data Tahun Akademik
											</a>
										</h4>
									</div>
									<div id="collapse2Two" class="accordion-body collapse">
										<div class="panel-body">
											<div class="col-md-8">
								<div class="panel-body">
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default1">
												<thead>
													<tr>
														<th>#</th>
														<th>Kode Tahun</th>
														<th>Tipe Tahun</th>
														<th>Tahun</th>
														<th>Status</th>
														
														<th width="100%">Actions</th>
													</tr>
												</thead>
												<tbody id="show2">
													
												
												
												</tbody>
											</table>
										</div>
										</div>
									</div>
										<div class="col-md-4">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Form Data Tahun Akademik</h2>

									
								</header>
								<form id="lg_ta" class="form-horizontal form-bordered">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Tahun</label>
												<input type="hidden" name="id_ta" id="id_ta" class="form-control" value="0">
												<select class="form-control" name="tahun" id="tahun">
													<option>--Pilih Tahun--</option>
													<?php $now=date('Y')+5; 
													for ($i=2011; $i < $now; $i++) { 	?>
													<option value="<?=$i?>"><?=$i?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Tipe Tahun</label>
												<select class="form-control" name="tipe_ta" id="tipe_ta">
													<option value="">--Pilih Tipe--</option>
													<option value="Ganjil">Ganjil</option>
													<option value="Genap">Genap</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Kode Tahun</label>
												
												<input type="hidden" name="kode_ta1" id="kode_ta1" class="form-control">
												<input type="text" name="kode_ta" id="kode_ta" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Tahun Akademik</label>
												<input type="text" name="thn_akd" id="thn_akd" class="form-control" readonly>
											</div>
										</div>
									
									</div>
								</div>
								<footer class="panel-footer">
									<button class="btn btn-primary" id="save-ta">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</footer>
							</form>
							</section>
						</div>
										</div>
									</div>
								</div>
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
												<i class="fa fa-cloud"></i> Data Tahun Angkatan
											</a>
										</h4>
									</div>
									<div id="collapse2Three" class="accordion-body collapse">
										<div class="panel-body">
											<div class="col-md-6">
								<div class="panel-body">
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default2">
												<thead>
													<tr>
														<th>#</th>
														<th>Tahun Angkatan</th>
														
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="show3">
													
												</tbody>
											</table>
										</div>
										</div>
									</div>
										<div class="col-md-6">
							<form id="lg_tha" class="form-horizontal form-bordered">
								<section class="panel">
									<header class="panel-heading">
										

										<h2 class="panel-title">Form Data Tahun Angkatan</h2>

										
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label">Tahun:</label>
											<div class="col-sm-8">
												<input type="hidden" name="id_tha" id="id_tha" value="0">
												<select class="form-control" name="tahun1" id="tahun1">
													<option value="">--Pilih Tahun</option>
													<?php $now=date('Y')+5; 
													for ($i=2011; $i < $now; $i++) { 	?>
													<option value="<?=$i?>"><?=$i?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Tahun Angkatan:</label>
											<div class="col-sm-8">
												<input type="text" name="thn_angkatan" id="thn_angkatan" readonly class="form-control">
											</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" id="save-tha">Submit</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
						</div>
										</div>
									</div>
								</div>
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2four">
												<i class="fa fa-cloud"></i> Data Grade Nilai
											</a>
										</h4>
									</div>
									<div id="collapse2four" class="accordion-body collapse">
										<div class="panel-body">
											<div class="col-md-8">
								<div class="panel-body">
									<div class="table-responsive">
											<table class="table table-hover mb-none" id="datatable-default3">
												<thead>
													<tr>
														<th>#</th>
														<th>Dari</th>
														<th>Sampai</th>
														<th>Grade</th>
														<th>Keterangan</th>
														
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="show4">
													
													
												</tbody>
											</table>
										</div>
										</div>
									</div>
										<div class="col-md-4">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Form Data Grade Nilai</h2>

									
								</header>
								<form id="lg_grade">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Grade Nilai</label>
												<input type="hidden" name="id_grade" id="grade" value="0">
												<select class="form-control" name="grade" id="grade">
													<option>--Grade--</option>
												<?php $grade = array('A','B','C','D','E'); 
														$range=count($grade);
														for ($i=0; $i < $range ; $i++) { ?>
												
												<option value="<?=$grade[$i]?>"><?=$grade[$i]?></option>

													<?php }?>
												</select>
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Dari</label>
												<input type="text" name="dari" id="dari" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Sampai</label>
												<input type="text" name="sampai" id="sampai" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Keterangan</label>
												<input type="text" name="keterangan" id="keterangan" class="form-control">
											</div>
										</div>
										
									</div>
								</div>
								<footer class="panel-footer">
									<button class="btn btn-primary" id="save-grade">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</footer>
								</form>
							</section>
						</div>
										</div>
									</div>
								</div>
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
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="kode" value="">
                            <input type="hidden" name="uri" id="uri" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script src="<?php echo site_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
    var table;
    var table1;
    var table2;
    var table3;
    $(document).ready(function() {

        //datatables
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('master/d_akademik/data_kurikulum')?>",
                  // "autoWidth": false,
                  
         });  

         table1 = $('#datatable-default1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('master/d_akademik/thn_akademik')?>",
                  // "autoWidth": false,
                  
         });  

          table2 = $('#datatable-default2').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('master/d_akademik/thn_angkatan')?>",
                  // "autoWidth": false,
                  
         });  

          table3 = $('#datatable-default3').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('master/d_akademik/grade_nilai')?>",
                  // "autoWidth": false,
                  
         });  

$("#tahun").change(function(){
          var thn=$('#tahun').val();
          var thn2=parseInt(thn);
          var thn3=thn2+1;
          $('#kode_ta').val(thn);
          $('#kode_ta1').val(thn);

          $('#thn_akd').val(thn+'/'+thn3);
          
  });
$("#tipe_ta").change(function(){
          var thn=$('#kode_ta1').val();
          var tipe=$('#tipe_ta').val();
          if (tipe=="") {
          	var ta="";
          }else if (tipe=="Ganjil"){
          	var ta="-1";
          }else{
          	var ta="-2";
          }
          $('#kode_ta').val(thn+''+ta);
          
  });
$("#tahun1").change(function(){
          var thn=$('#tahun1').val();
          if (thn=="") {
          	var thn2="";
          	 $('#thn_angkatan').val('');
          }else{
          	var thn2=parseInt(thn)+1;
          	 $('#thn_angkatan').val(thn+'/'+thn2);
          }
           
         
          
  });


     //get data kurikulum
   $('#show1').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/get_data_kurikulum')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_kur,thn_kur){
                         $('[name="id_kur"]').val(data.id_kur);
                         $('[name="kurikulum"]').val(data.thn_kur);
                        
                });
                }
            });
            return false;
            
        });  

    $('#show2').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/get_data_thn_akd')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_thnakd,thun_akademik,ta_tipe,keterangan,tahun){
                         $('[name="id_ta"]').val(data.id_thnakd);
                         $('[name="tahun"]').val(data.tahun);
                         $('[name="kode_ta"]').val(data.thun_akademik);
                         $('[name="tipe_ta"]').val(data.ta_tipe);
                         $('[name="thn_akd"]').val(data.keterangan);

                        
                });
                }
            });
            return false;
            
        });  
     $('#show3').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/get_data_tha')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_tha,thn_ankt,tahun){
                         $('[name="id_tha"]').val(data.id_tha);
                         $('[name="tahun1"]').val(data.tahun);
                         $('[name="thn_angkatan"]').val(data.thn_ankt);
                        

                        
                });
                }
            });
            return false;
            
        });  

      $('#show4').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/get_data_grade')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(id_grade,grade,dari,sampai,keterangan){
                         $('[name="id_grade"]').val(data.id_grade);
                         $('[name="grade"]').val(data.grade);
                         $('[name="dari"]').val(data.dari);
                         $('[name="sampai"]').val(data.sampai);
                         $('[name="keterangan"]').val(data.keterangan);
                        

                        
                });
                }
            });
            return false;
            
        });  

    $('#save-kur').on('click',function(){
        
            var id_kur=$('#id_kur').val();
            var kurikulum=$('#kurikulum').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/save_data_kurikulum')?>",
                data : {id_kur:id_kur, kurikulum:kurikulum},
                // dataType:"JSON",
                success: function(data){

                    table.ajax.reload();
                    $('#lg_kur')[0].reset();
                    notify_success(data.pesan);
                }
            });
            return false;
            
        
        });

     $('#save-ta').on('click',function(){
        
            var id=$('#id_ta').val();
            var kode_ta=$('#kode_ta').val();
            var tipe_ta=$('#tipe_ta').val();
            var thn_akd=$('#thn_akd').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/save_data_ta')?>",
                data : {id:id,kode_ta:kode_ta,tipe_ta:tipe_ta,thn_akd:thn_akd},
                // dataType:"JSON",
                success: function(data){

                    table1.ajax.reload();
                    $('#lg_ta')[0].reset();
                    notify_success(data.pesan);
                }
            });
            return false;
            
        
        });
     $('#save-tha').on('click',function(){
        
            var id=$('#id_tha').val();
            var thn_angkatan=$('#thn_angkatan').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/save_data_tha')?>",
                data : {id:id,thn_angkatan:thn_angkatan},
                // dataType:"JSON",
                success: function(data){

                    table2.ajax.reload();
                    $('#lg_tha')[0].reset();
                    notify_success(data.pesan);
                }
            });
            return false;
           
        
        });

     $('#save-grade').on('click',function(){
        
         var id=  $('[name="id_grade"]').val();
          var grade= $('[name="grade"]').val();
          var dari= $('[name="dari"]').val();
          var sampai= $('[name="sampai"]').val();
          var keterangan= $('[name="keterangan"]').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('master/d_akademik/save_data_grade')?>",
                data : {id:id,grade:grade,dari:dari,sampai:sampai,keterangan:keterangan},
                // dataType:"JSON",
                success: function(data){

                    table3.ajax.reload();
                    $('#lg_grade')[0].reset();
                    notify_success(data.pesan);
                }
            });
            return false;
           
        
        });


     $('#show1').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            var uri=$(this).attr('data-uri');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="uri"]').val(uri);
        });
      $('#show2').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            var uri=$(this).attr('data-uri');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="uri"]').val(uri);
        });
      $('#show3').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            var uri=$(this).attr('data-uri');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="uri"]').val(uri);
        });

      $('#show4').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            var uri=$(this).attr('data-uri');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="uri"]').val(uri);
        });

     $('#btn_hapus').on('click',function(){
            var id=$('#kode').val();
            var uri=$('#uri').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('master/d_akademik/delete_data')?>",
            // dataType : "JSON",
                    data : {id:id,uri:uri},
                    success: function(data){     
                    $('#ModalHapus').modal('hide');
                    if (data.refresh=="1") {
                    	table.ajax.reload();
                    }else if (data.refresh=="2") {
                    	table1.ajax.reload();
                    }else if (data.refresh=="3") {
                    	table2.ajax.reload();
                    }else{
                    	table3.ajax.reload();
                    }
                

                    notify_success(data.pesan);
                
                    }
                });
                return false;
            });

    });

</script>

