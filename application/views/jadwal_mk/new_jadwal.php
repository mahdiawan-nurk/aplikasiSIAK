<div class="row alert alert-danger">
	<h3><i class="fa fa-info-circle"></i> Peringatan.... Waktu Setting Distribusi Ajar Terbatas<font size="12" style="float: right;" id="mundur"></font></h3>

	
</div>
<div class="row panel-body">
	<div class="table-responsive" id="new">
		<form method="post"  id="form-save" >
			
									<table class="table table-bordered table-striped table-condensed mb-none" id="table1">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Matkul</th>
												<th >Nama Matkul</th>
												<th >SKS</th>
												<th >Tipe Matkul</th>
												
												<th >Dosen Pengajar</th>

												<th >Rombel</th>
												<th >Act</th>
												<!-- <th >Act</th> -->
												
											</tr>
										</thead>
										<tbody id="show_data">
											<tr>
												<td></td>
												<td></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												
											</tr>
											
										</tbody>
									</table>
									<footer class="panel-footer">
										<button class="btn btn-primary simpan">Simpan</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
		</form>
								</div>
		<div class="table-responsive" id="update">
		<form method="post"  id="form-update" >
			
									<table class="table table-bordered table-striped table-condensed mb-none" id="table12">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Matkul</th>
												<th >Nama Matkul</th>
												<th >SKS</th>
												<th >Tipe Matkul</th>
												
												<th >Dosen Pengajar</th>

												<th >Rombel</th>
												<th >Act</th>
												
												
											</tr>
										</thead>
										<tbody id="show_data">
											<tr>
												<td></td>
												<td></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												<td ></td>
												
											</tr>
											
										</tbody>
									</table>
									<footer class="panel-footer">
										<button class="btn btn-primary update">Update</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
		</form>
								</div>

	 <div class="col-xs-12 panel-body" id="data">
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
                                                       <input type="hidden" name="id" id="id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              
<div class="col-xs-12 col-sm-10">
                 <button class="btn btn-primary" id="btn-add">Tambah data</button>
                <form method="post"  id="form-pilih" >
                
                  <table id="table11" class="table table-striped table-bordered table-hover">
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
                          <th></th>
                        </tr>
                       
                      </thead>
                      <tbody id="show_dataa" >
                       
                       

                      </tbody>
                    </table>
                    
                     <button class="btn btn-danger" id="btn-hapus">Hapus Data</button>

                    
                     </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->

            </div>
							</div>
							

<div class="modal fade" id="Modalset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <!-- <form class="form-horizontal"> -->
                    <div class="modal-body">
                    	<div class="form-group">
											<label class="col-sm-3 control-label">Tahun Akademik <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" title="Plase enter a name." placeholder="eg.: John Doe" readonly="" value="<?='Semester '.$akademik1->ta_tipe.' '.$akademik1->thun_akademik?>" />
											</div>
										</div>
                         <div class="form-group">
							<label class="col-sm-3 control-label">Kurikulum</label>
							<div class="col-sm-9">
								 <?php echo form_dropdown('kurikulum', $kurikulum, $d['id_kur'], 'class="form-control" id="kurikulum" required'); ?>
												<!-- <label class="error" for="company"></label> -->
											</div>
										</div>
							<div class="form-group">
							<label class="col-sm-3 control-label">Semester</label>
							<div class="col-sm-9">
								<select id="semester" class="form-control" name="semester" required>
													
												</select>
												<label class="error" for="company"></label>
											</div>
										</div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn-cari">Find Data</button>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>


<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
    var table;
    var table2;
    var table3;
    $(document).ready(function() {
    	$('#new').hide();
    	$('#update').hide();
    	$('#data').show();
    	$('#show_data.dsn').attr('multiple data-plugin-selectTwo');
        //datatables
       table = $('#table1').DataTable({
                  "paging": false,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "ordering": false,
                  "sAjaxSource": "<?php echo site_url('d_dbajar/new_mk')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push({ "name": "semester", "value": $('#semester').val()},{ "name": "kurikulum", "value": $('#kurikulum').val()} );
                    
                  }
                 
         });         
        table2 = $('#table11').DataTable({
                  "paging": true,
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
         table3 = $('#table12').DataTable({
                  "paging": false,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": true, 
                "ordering": false,
                  "sAjaxSource": "<?php echo site_url('d_dbajar/upd_mk')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push({ "name": "id", "value": $('#id').val()} );
                    
                  }
         });     
  $('.simpan').click(function(e){
            $("#form-save").submit(function () {
                       $.ajax({
                    url:"<?php echo site_url()?>d_dbajar/save_record",
                    type:"POST",
                    data:$('#form-save').serialize(),
                    // cache: false,
                    success:function(data){
                        // alert(respon);
                        $('#new').hide();
    					$('#data').show();
                        notify_success(data);
                        table2.ajax.reload();
                        
                    }
            });
            return false;	
            });
        });
  $('#btn-hapus').click(function(e){
            $("#form-pilih").submit(function () {
                       $.ajax({
                    url:"<?php echo site_url()?>d_dbajar/delete_record",
                    type:"POST",
                    data:$('#form-pilih').serialize(),
                    // cache: false,
                    success:function(data){
                        // alert(respon);
                        notify_success(data);
                        table2.ajax.reload();
                    }
            });
            return false;	
            });
        });
$('.update').click(function(e){
            $("#form-update").submit(function () {
                       $.ajax({
                    url:"<?php echo site_url()?>d_dbajar/update_record",
                    type:"POST",
                    data:$('#form-update').serialize(),
                    // cache: false,
                    success:function(data){
                        // alert(respon);
                        $('#update').hide();
                        notify_success(data);
                        table2.ajax.reload();
                    }
            });
            return false;	
            });
        });

 $('#btn-add').on('click',function () {
 	$('#Modalset').modal('show');
 })
 $('#btn-cari').on('click',function () {
 	$('#Modalset').modal('hide');
 	$('#new').show();
 	$('#data').hide();
 	// var kur=$('#kurikulum').val();
 	// var sem=$('#semester').val();
 	// alert(kur+'-'+sem);
 	table.ajax.reload();
 })

    });
get_semester();

function get_semester() {
	 $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/d_dbajar/get_semester')?>",
                // data : {semester:semester},
                // dataType:"JSON",
                success: function(data){
                  $('#semester').html(data);
                  // alert(data);
                }
            });
}

function edit(id) {
    $('#update').show();
	$('#id').val(id);
	table3.ajax.reload();
}
countdwn();
function countdwn() {
var countDownDate = new Date("Oct 27, 2019 00:45:25").getTime();
// Hitungan Mundur Waktu Dilakukan Setiap Satu Detik
var x = setInterval(function() {
// Mendapatkan Tanggal dan waktu Pada Hari ini
var now = new Date().getTime();
//Jarak Waktu Antara Hitungan Mundur
var distance = countDownDate - now;
// Perhitungan waktu hari, jam, menit dan detik
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Tampilkan hasilnya di elemen id = "carasingkat"
document.getElementById("mundur").innerHTML = days + ":" + hours + ":"
+ minutes + ":" + seconds + "";
// Jika hitungan mundur selesai,
if (distance < 0) {
clearInterval(x);
document.getElementById("mundur").innerHTML = "EXPIRED";
$('#btn-add').attr('disabled',true);
}
}, 1000);
}

</script>

