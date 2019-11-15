<div class="row">
                 <div class="col-md-2">
                                <section class="panel">
                                    <header class="panel-heading">
                                        

                                        <h2 class="panel-title">Filter By</h2>

                                       
                                    </header>
                                    <div class="panel-body">
                                        <div class="form-group">
                                                <label class="control-label">Prog. Studi</label>
                                               <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi" required'); ?>
                                        
                                    </div>
                                 
                                </section>
                       
                        </div>   
                    <div class="col-md-10" style="padding-left: 0px;padding-right: 0">
                            <div class="tabs">
                                <ul class="nav nav-tabs nav-justified">
                                    <?php foreach ($semester as $key){ 
                                        if ($key->id=="1"){
                                            $active='active';
                                        }else{
                                            $active='';
                                        }

                                            ?>
                                         
                                    <li class="<?=$active;?>">
                                        <a href="#data" data-toggle="tab" class="text-center" onclick="cek(<?=$key->id;?>);" ><?=$key->nama;?></a>
                                    </li>
                                    <?php } ?>
                                   
                                    
                                </ul>
                                <div class="tab-content">
                                    <div id="data" class="tab-pane active"> 
                                       <!--  <div class="form-group">
                                            <label class="col-sm-3 control-label">Filter By Prog. Studi:</label>
                                            <div class="col-sm-9">
                                               <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi" required'); ?>
                                            </div>
                                        </div> -->
                                    <input type="hidden" name="sems" id="sems" value="1">
                                       <table id="mydata" class="table  table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>
                                                        Prodi
                                                    </th>

                                                    <th>
                                                        Semester Pengajuan
                                                    </th>
                                                    <th class="hidden-480">Tgl Pengajuan</th>

                                                     <th>Status</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody id="show_data">
                                                <tr>
                                                    

                                                    <td></td>
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
                                   
                                </div>
                            </div>
                        </div>
                                </div><!-- /.row -->







<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                         
                            <input type="hidden" name="kode" id="nim" value="">
                            <input type="hidden" name="sem" id="sem" value="">
                            <div class="alert alert-warning" id="test"><p>Apakah Anda yakin Akan Menvalidasi?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
							
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	var table;
    $(document).ready(function() {
         table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/v_kalab/data_kalab')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()},{ "name": "prodi", "value": $('#prodi').val()} );
                    
                  }
         });   

         $("#prodi").change(function(){
          table.ajax.reload();
  });

        $('#refresh').on('click',function(){
            table.ajax.reload(); 
            });

      $('#show_data').on('click','.item_unvalid',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Unvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });
      $('#show_data').on('click','.item_valid',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Menvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });

       $('#btn_validasi').on('click',function(){
            var nim=$('#nim').val();
            var sem=$('#sem').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/v_kalab/simpan_validasi_kalab')?>",
            dataType : "JSON",
                    data : {nim: nim, sem:sem},
                    success: function(data){
                          
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            });
});
    function cek($id){
$('#sems').val($id);
table.ajax.reload();
// alert($id);
}
</script>