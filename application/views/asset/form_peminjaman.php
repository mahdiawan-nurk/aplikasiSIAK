<div class="col-lg-12">
								<section class="panel form-wizard" id="w1">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title"><?= date('d-m-Y',strtotime('12/10/2000'));?></h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs ">
											<ul class="wizard-steps">
												<li class="active tabs-primary">
													<a href="#w1-account" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Identitas Peminjam
													</a>
												</li>
												<li>
													<a href="#w1-profile" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Data Barang 
													</a>
												</li>
												<li>
													<a href="#w1-confirm" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Confirm
													</a>
												</li>
											</ul>
										</div>
										<form class="form-horizontal" novalidate="novalidate">
											<div class="tab-content">
												<div id="w1-account" class="tab-pane active">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-username">Nama Lengkap</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="nama" value="<?php echo $data->nama_mhs;?>"  readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">NIM</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="nim" value="<?php echo $data->nim;?>"  readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">Institusi</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="institusi"   required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">Mata Kuliah/kegiatan</label>
														<div class="col-sm-8">
															<select data-plugin-selectTwo data-plugin-options='{ "minimumInputLength": 1 }' class="form-control populate"  name="matakuliah" required placeholder="te" >
                                                        <option value="">--pilih Makul--</option>
                                                        <?php foreach ($semester as $sem): ?>
                                                           <optgroup label="<?=$sem->nama?>">
                                                           	<?php $mk=$this->db->get_where('makul_matakuliah', array('semester_id' =>$sem->id ))->result(); ?>
                                                           	<?php foreach ($mk as $k): ?>
                                                           		<option value="<?=$k->makul_id;?>"><?=$k->nama_makul;?></option>
                                                           	<?php endforeach ?>
                                                           </optgroup>
                                                        <?php endforeach ?>

                                                    </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">Dosen Pembimbing</label>
														<div class="col-sm-8">
															<select data-plugin-selectTwo data-plugin-options='{ "minimumInputLength": 1 }' class="form-control populate" required placeholder="te" name="dosen_pembimbing">
                                                        <option value="">--pilih Dosen--</option>
                                                        <?php foreach ($dosen as $d): ?>
                                                            <option value="<?=$d->nrp?>"><?=$d->nrp."-".$d->nama_dsn?></option>
                                                        <?php endforeach ?>

                                                    </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">alamat</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="alamat" value="<?php echo $data->alamat;?>"   readonly>
														</div>
														</div>
														<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">HP</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="hp" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">Email</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="email" value="<?php echo $data->email;?>"   readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-password">Tanggal Pengembalian</label>
														<div class="col-sm-8">
															<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control" name="tgl_kembali" required>
													</div>
														</div>
													</div>
													
													
												</div>
												<div id="w1-profile" class="tab-pane">
														<div class="col-md-12">
							<section class="panel">
								
								<!-- <div class="col-sm-12">
									<span>Prodi</span>
								<select class="form-control" name="prodi">
									<option>--select prodi--</option>
									<?php foreach ($prodi as $p): ?>
									<option value="<?=$p->kode_prodi?>"><?=$p->nama_prodi?></option>	
									<?php endforeach ?>
								</select>

								</div> -->
								<div class="col-sm-12">
								<form id="fm1">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="control-label">Nama Barang</label>
												<select data-plugin-selectTwo id="opt" class="form-control" data-plugin-options='{ "minimumInputLength": 1 }' name="nama_barang" required=""></select>
											</div>
										</div>
										<div class="col-sm-3" style="margin-left: 10px">
											<div class="form-group">
												<label class="control-label">Kondisi Awal</label>
												<input type="text" name="kondisi" class="form-control" readonly="">
											</div>
										</div>
										<div class="col-sm-2" style="margin-left: 10px">
											<div class="form-group">
												<label class="control-label">Jumlah</label>
												<input type="text" name="jumlah" class="form-control" required="">
											</div>
										</div>
											</form>
										<div class="col-sm-2" style="padding-top: 30px">
											<button type="button" class="btn-sm btn btn-primary btn-block" id="save"><i class="fa fa-floppy-o"></i> Save</button>
										</div>
								
								</div>
								
								<div class="panel-body col-md-12">
									<div class="table-responsive">

											<table class="table mb-none" >
												<thead>
													<tr>
													
														<th>Nama Alat</th>
														<th>Jumlah</th>
														<th>Kondisi Awal</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody  id="field">
													
													
												</tbody>
											</table>
										</div>
									
								</div>
							
							</section>
						</div>
												</div>
												<div id="w1-confirm" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-email">Email</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" name="email" id="w1-email" required>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-2"></div>
														<div class="col-sm-10">
															<div class="checkbox-custom">
																<input type="checkbox" name="terms" id="w1-terms" required>
																<label for="w1-terms">I agree to the terms of service</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled">
												<a><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<a>Finish</a>
											</li>
											<li class="next">
												<a>Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</section>

							</div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	 $(document).ready(function() {
	 	// $('[name="prodi"]').change(function(){
          // var id=$('[name="prodi"]').val();
          opt_barang();
    function opt_barang() {
    	// body...
    
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('asset/peminjaman/data_barang')?>",
                // data : {id:id},
                dataType:"JSON",
                success: function(data){
                   $('#opt').html(data);
 
          }

                
            });
           }
  // });
	 	
$('[name="nama_barang"]').change(function(){
          var id=$('[name="nama_barang"]').val();
           $.ajax({
                type : "POST",
                url  : "<?php echo base_url('asset/peminjaman/kondisi_barang')?>",
                data : {id:id},
                dataType:"JSON",
                success: function(data){
                  $('[name="kondisi"]').val(data);
          }

                
            });
  });
 $('#save').on('click',function(){
var barang=$('[name="nama_barang"]').val();
var kondisi=$('[name="kondisi"]').val();
var jumlah=$('[name="jumlah"]').val();
$.ajax({
                type : "POST",
                url  : "<?php echo base_url('asset/peminjaman/detail_barang')?>",
                data : {barang:barang},
                dataType:"JSON",
                success: function(data){
                	
                 $('#field').append('<tr id="lt"><td><input type="text" name="namae" class="form-control" value="'+data.nama+'" readonly><input type="hidden" name="nama_barang[]" class="form-control" value="'+barang+'" ></td><td><input type="text" name="jumlah[]" class="form-control" value="'+jumlah+'" readonly></td><td><input type="text" name="kondisi[]" class="form-control" value="'+data.kondisi+'" readonly></td><td class=""><a href="#" class="delete-row" id="hapus"><i class="fa fa-trash-o"></i> Hapus</a></td></tr>');
          }

                
            });


 });
	 

 $('#field').on('click','#hapus',function(){
 $('#lt').remove();
 });		 

var $w1finish = $('#w1').find('ul.pager li.finish'),
		$w1validator = $("#w1 form").validate({
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

	$w1finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w1 form').valid();
		if ( validated ) {
			
			var nim=$('[name="nim"]').val();
			var institusi=$('[name="institusi"]').val();
			var matkul=$('[name="matakuliah"]').val();
			var dosenp=$('[name="dosen_pembimbing"]').val();
			var nohp=$('[name="hp"]').val();
			var tgl_pengembalian=$('[name="tgl_kembali"]').val();
			var barang=$('[name="nama_barang[]"]').map(function(){return this.value}).get();
			var kondisia=$('[name="kondisi[]"]').map(function(){return this.value}).get();
			var jumlah=$('[name="jumlah[]"]').map(function(){return this.value}).get();
			 $.ajax({
                type : "POST",
                url  : "<?php echo base_url('asset/peminjaman/save_pinjma_barang')?>",
                data : {nim:nim,institusi:institusi,matkul:matkul,dosenp:dosenp,nohp:nohp,tgl_pengembalian:tgl_pengembalian,barang:barang,kondisia:kondisia,jumlah:jumlah},
                dataType:"JSON",
                success: function(data){
                location.reload();
                notify_success(data.pesan);
          }

                
            });
 
			 // notify_success(nim+'-'+institusi+'-'+matkul+'-'+dosenp+'-'+nohp+'-'+tgl_pengembalian+'-'+barang+'-'+kondisia+'-'+jumlah);
		}
	});

	$('#w1').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w1 form').valid();
			if( !validated ) {
				$w1validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').size() - 1;
			$w1finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w1').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
		}
	});

	/*
	Wizard #2
	*/
	// 
	 });

</script>