<div class="row">
                    <div class="col-md-12" style="padding-left: 0px;padding-right: 0">
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
                                    <input type="hidden" name="sems" id="sems" value="1">
                                       <table id="mydata" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    

                                                    <th>
                                                        Semester Pengajuan
                                                    </th>
                                                    <th class="hidden-480">Tgl Pengajuan</th>

                                                    <th>Kalab PPM</th>
                                                    <th>Kalab TPS</th>
                                                    <th>Kalab TIF</th>
                                                    <th>Kompensasi</th>
                                                    <th>Perpustakan</th>
                                                    <th>Keuangan</th>
                                                    <th>KHS</th>
                                                    <th width="13%">Action</th>
                                                   
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
                                </div>
<!-- /.row -->

<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                              <input type="text" name="thun" id="thun" value="">            
                            <input type="text" name="kode" id="nim" value="">
                            <input type="text" name="sem" id="sem" value="">
                            <div class="alert alert-warning" id="test"></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi">Ya</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
							
<!-- <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script> -->
<script type="text/javascript">
    var table;
    $(document).ready(function() {
         table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/v_kaprodi/data_kaprodi')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()} );
                    
                  }
         });   


        
        $('#refresh').on('click',function(){
            table.ajax.reload(); 
            });

      $('#show_data').on('click','.item_unvalid',function(){
        var id="v_kaprod_tif";
            var id=$(this).attr('data');
             var v=$(this).attr('data-v');
              var s=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Unvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="thun"]').val(v);
            $('[name="sem"]').val(s);
        });
      $('#show_data').on('click','.item_valid',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-v');
              var s=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Menvalidasi?</p>');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
            $('[name="thun"]').val(v);
            $('[name="sem"]').val(s);
        });

       $('#btn_validasi').on('click',function(){
            var nim=$('#nim').val();
            var thun=$('#thun').val();
            var sem=$('#sem').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/v_kaprodi/simpan_validasi_akhir')?>",
            dataType : "JSON",
                    data : {nim: nim,thun:thun,sem:sem},
                    success: function(data){
                          
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim);
            });
});

function cek($id){
$('#sems').val($id);
table.ajax.reload();
// alert($id);
}
</script>