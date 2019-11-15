<div class="btn-group" style="float:right;">
                      <button class="btn btn-white btn-info btn-bold" id="btn-add">
                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
                        Tambah Data
                      </button>

                      
                                            <button class="btn btn-white btn-default btn-bold" id="refresh">
                                                <i class="ace-icon fa fa-refresh red2"></i>
                                                Refresh
                                            </button>
                    </div>
<div class="col-xs-12 panel-body">
							<div class="col-xs-12 col-sm-2">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Search By</h4>

                                                    
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                      

                                                        <div>
                                                            <label for="form-field-9">semester</label>

                                                            <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?>
                                                        </div>

                                                     
                                                       


                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
							
<div class="col-xs-12 col-sm-10">
								
									<table id="table1" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th width="20%">Jam Mulai-Jam Selesai</th>
                          <th >Mata Kuliah</th>
                          <th>Hari</th>
                          <th>Ruangan</th>
                          <th>Aksi</th>
                         
                        </tr>
                      </thead>
                      <tbody id="show_data" >
                       
                       

                      </tbody>
                    </table>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
            </div>
<div class="modal fade" id="Modalaadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Setting Jadwal</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body"> 
                      <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Dosen Pengajar</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('dosen', $dosen, $d['id_dosen'], 'class="form-control" id="esemester" required'); ?>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Mata Kuliah</label>
                        <div class="col-xs-9">
                          <input type="text" name="nama_mk" id="nama_mk" class="form-control" disabled>
                        </div>
                    </div>    
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Hari</label>
                        <div class="col-xs-9">
                          <?php echo form_dropdown('dosen', $hari, $d['hari_id'], 'class="form-control" id="esemester" required'); ?>
                        </div>
                    </div>    
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Ruangan</label>
                        <div class="col-xs-9">
                          <?php echo form_dropdown('dosen', $ruangan, $d['ruangan_id'], 'class="form-control" id="esemester" required'); ?>
                        </div>
                    </div>                    
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Jam Ajar</label>
                        <div class="col-xs-9">
                          <input type="text" name="nama_mk" id="nama_mk" class="form-control" >
                          <input type="text" name="nama_mk" id="nama_mk" class="form-control" disabled>
                        </div>
                    </div>    
                            
                     
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-primary" id="btn_hapus">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
       table = $('#table1').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "ordering": false,
                  "sAjaxSource": "<?php echo site_url('jadwal_mk/datatable_jadwal_mk')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push({ "name": "semester", "value": $('#semester').val()} );
                    
                  }
         });         

        $("#semester").change(function(){
          table.ajax.reload();
  });

        $('#show_data').on('click','.item_add',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/jadwal_mk/get_data')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(kode_makul, nama_makul){
                      $('#Modalaadd').modal('show');
                       $('[name="kode_mak"]').val(data.kode_makul);
                         $('[name="nama_mk"]').val(data.nama_makul);
                         
                });
                }
            });
            return false;
            // alert(id);
        });
        
   $('#btn-add').on('click',function(){
           // $('#form')[0].reset();
        $("#Modalaadd").modal('show');
         
        });
      
       
    
        
         
        


    });

</script>

