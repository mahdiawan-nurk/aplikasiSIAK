<div class="col-md-12" >
							
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Tabel Data Pengumuman</h2>
										
									</header>
									<div class="panel-body">
										<input type="hidden" name="id_jenis" id="id_jenis" class="form-control" placeholder="eg.: Registrasi" required/>
								
										<button class="btn btn-default" onclick="refresh();">Refresh</button>
										<table id="datatable-default" class="table table-bordered table-striped mb-none">
											<thead>
												<tr>
													
													<th class="detail-col">NO</th>
													<th class="detail-col">Jenis Pengumuman</th>
													<th width="25%">Tgl Distribusi-Tgl Selesai</th>
													<th>Tgl Mulai</th>
                                                    <th >Pengumuman</th>
													<th >Status</th>
												
													<th >Aksi</th>
													
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
										
										
									
									
								</section>
						
						</div>
<div class="modal fade" id="Modal-V" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Validasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                             <input type="hidden" name="id" id="id" class="form-control" placeholder="eg.: Jenis pengumuman  " />  
                             <input type="hidden" name="id_jns" id="id_jns" class="form-control" placeholder="eg.: Jenis pengumuman  " />           
                             <input type="hidden" name="id_v" id="id_v" class="form-control" placeholder="eg.: Jenis pengumuman  " />            
                            <div class="alert alert-info" id="tampil"></div>
                            <div  id="ipt"></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                         <button type="button" class="btn btn-warning" id="btn-ok">OK</button>
                       
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalaP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" style="width: 75%">
            <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body" id="pdf">

                    
                   
                </div>

                <div class="modal-footer">
                	<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
					
                </div>
            </form>
            </div>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 

<script type="text/javascript">
	var table;
	var table1;
	$(document).ready(function() {

    table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/pengumuman/pengumuman_kabak')?>",
         });         

    $('#show_data').on('click','.item_terima',function(){
    	
     	var id=$(this).attr('data');
     	var id_v=$(this).attr('data-v');
        var id_jns=$(this).attr('data-jns');
     	$('#id').val(id);	
        $('#id_jns').val(id_jns);
     	$('#id_v').val(id_v);
     	$('#tampil').html('<p>Apakah Anda yakin Akan Menerima Pengumuman Ini?</p>');
      $('#ipt').html('<textarea class="form-control" name="komen" placeholder="Your Comment Its here"></textarea>').hide();
     	 $('#Modal-V').modal('show');
     
            });

    $('#show_data').on('click','.item_tolak',function(){
    	
     	var id=$(this).attr('data');
        var id_v=$(this).attr('data-v');
        var id_jns=$(this).attr('data-jns');
        $('#id').val(id);   
        $('#id_jns').val(id_jns);
        $('#id_v').val(id_v);
      $('#tampil').html('<p>Apakah Anda yakin Akan Menolak Pengumuman Ini? Silahkan Berikan Komen Di bawah Ini</p>');
     	$('#ipt').html('<textarea class="form-control" name="komen" placeholder="Your Comment Its here" required></textarea>').show();
     	 $('#Modal-V').modal('show');
     
            });

$('#btn-ok').on('click',function(){
    	 	var id=$('#id').val();
        var id_v=$('#id_v').val();
    	 	var id_jns=$('#id_jns').val();
        var komen=$('#ipt [name="komen"]').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/pengumuman/simpan_validasi_kabak')?>",
            dataType : "JSON",
            data : {id:id,id_v:id_v,id_jns:id_jns},
                    success: function(data){
                   $('#Modal-V').modal('hide');
                   
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            
            });

 $('#show_data').on('click','.item_lihat',function(){
  var id=$(this).attr('data');
           window.open("<?php echo site_url()?>pengumuman/cek_pengumuman/"+id,"_blank");
         
        });
    
});
    function refresh(){
    table.ajax.reload();
}

setInterval(function(){ 
    refresh();; 
  }, 5000);
</script>